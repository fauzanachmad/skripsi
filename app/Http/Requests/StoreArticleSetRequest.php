<?php

namespace App\Http\Requests;

use App\Models\ArticleSet;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreArticleSetRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('article_set_create');
    }

    public function rules()
    {
        return [
            'articles.*' => [
                'integer',
            ],
            'articles' => [
                'array',
            ],
        ];
    }
}
