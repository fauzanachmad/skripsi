<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreArticleSetRequest;
use App\Http\Requests\UpdateArticleSetRequest;
use App\Http\Resources\Admin\ArticleSetResource;
use App\Models\ArticleSet;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ArticleSetsApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('article_set_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ArticleSetResource(ArticleSet::with(['articles'])->get());
    }

    public function store(StoreArticleSetRequest $request)
    {
        $articleSet = ArticleSet::create($request->all());
        $articleSet->articles()->sync($request->input('articles', []));

        return (new ArticleSetResource($articleSet))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(ArticleSet $articleSet)
    {
        abort_if(Gate::denies('article_set_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ArticleSetResource($articleSet->load(['articles']));
    }

    public function update(UpdateArticleSetRequest $request, ArticleSet $articleSet)
    {
        $articleSet->update($request->all());
        $articleSet->articles()->sync($request->input('articles', []));

        return (new ArticleSetResource($articleSet))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(ArticleSet $articleSet)
    {
        abort_if(Gate::denies('article_set_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $articleSet->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
