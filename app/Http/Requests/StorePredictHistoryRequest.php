<?php

namespace App\Http\Requests;

use App\Models\PredictHistory;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StorePredictHistoryRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('predict_history_create');
    }

    public function rules()
    {
        return [
            'title' => [
                'string',
                'nullable',
            ],
            'view' => [
                'nullable',
                'string',
            ],
        ];
    }
}
