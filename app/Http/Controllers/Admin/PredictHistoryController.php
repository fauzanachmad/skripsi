<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyPredictHistoryRequest;
use App\Http\Requests\StorePredictHistoryRequest;
use App\Http\Requests\UpdatePredictHistoryRequest;
use App\Models\PredictHistory;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class PredictHistoryController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('predict_history_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = PredictHistory::with(['user'])->select(sprintf('%s.*', (new PredictHistory())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'predict_history_show';
                $editGate = 'predict_history_edit';
                $deleteGate = 'predict_history_delete';
                $crudRoutePart = 'predict-histories';

                return view('partials.datatablesActions', compact(
                'viewGate',
                'editGate',
                'deleteGate',
                'crudRoutePart',
                'row'
            ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : '';
            });
            $table->editColumn('title', function ($row) {
                return $row->title ? $row->title : '';
            });
            $table->editColumn('view', function ($row) {
                return $row->view ? $row->view : '';
            });
            $table->addColumn('user_name', function ($row) {
                return $row->user ? $row->user->name : '';
            });

            $table->editColumn('user_agent', function ($row) {
                return $row->user_agent ? $row->user_agent : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'user']);

            return $table->make(true);
        }

        $users = User::get();

        return view('admin.predictHistories.index', compact('users'));
    }

    public function create()
    {
        abort_if(Gate::denies('predict_history_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.predictHistories.create', compact('users'));
    }

    public function store(StorePredictHistoryRequest $request)
    {
        $predictHistory = PredictHistory::create($request->all());

        return redirect()->route('admin.predict-histories.index');
    }

    public function edit(PredictHistory $predictHistory)
    {
        abort_if(Gate::denies('predict_history_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $predictHistory->load('user');

        return view('admin.predictHistories.edit', compact('predictHistory', 'users'));
    }

    public function update(UpdatePredictHistoryRequest $request, PredictHistory $predictHistory)
    {
        $predictHistory->update($request->all());

        return redirect()->route('admin.predict-histories.index');
    }

    public function show(PredictHistory $predictHistory)
    {
        abort_if(Gate::denies('predict_history_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $predictHistory->load('user');

        return view('admin.predictHistories.show', compact('predictHistory'));
    }

    public function destroy(PredictHistory $predictHistory)
    {
        abort_if(Gate::denies('predict_history_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $predictHistory->delete();

        return back();
    }

    public function massDestroy(MassDestroyPredictHistoryRequest $request)
    {
        PredictHistory::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
