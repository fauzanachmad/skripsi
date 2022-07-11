<?php

namespace App\Http\Requests;

use App\Models\ArticleSet;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyArticleSetRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('article_set_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:article_sets,id',
        ];
    }
}
