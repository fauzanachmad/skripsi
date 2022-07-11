<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePredictHistoryRequest;
use App\Http\Requests\UpdatePredictHistoryRequest;
use App\Http\Resources\Admin\PredictHistoryResource;
use App\Models\PredictHistory;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PredictHistoryApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('predict_history_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PredictHistoryResource(PredictHistory::with(['user'])->get());
    }

    public function store(StorePredictHistoryRequest $request)
    {
        $predictHistory = PredictHistory::create($request->all());

        return (new PredictHistoryResource($predictHistory))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(PredictHistory $predictHistory)
    {
        abort_if(Gate::denies('predict_history_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PredictHistoryResource($predictHistory->load(['user']));
    }

    public function update(UpdatePredictHistoryRequest $request, PredictHistory $predictHistory)
    {
        $predictHistory->update($request->all());

        return (new PredictHistoryResource($predictHistory))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(PredictHistory $predictHistory)
    {
        abort_if(Gate::denies('predict_history_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $predictHistory->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
