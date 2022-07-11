<?php

namespace App\Http\Requests;

use App\Models\PredictHistory;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyPredictHistoryRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('predict_history_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:predict_histories,id',
        ];
    }
}
