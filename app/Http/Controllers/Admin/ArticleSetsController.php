<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyArticleSetRequest;
use App\Http\Requests\StoreArticleSetRequest;
use App\Http\Requests\UpdateArticleSetRequest;
use App\Models\Article;
use App\Models\ArticleSet;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class ArticleSetsController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('article_set_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = ArticleSet::with(['articles'])->select(sprintf('%s.*', (new ArticleSet())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'article_set_show';
                $editGate = 'article_set_edit';
                $deleteGate = 'article_set_delete';
                $crudRoutePart = 'article-sets';

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
            $table->editColumn('article', function ($row) {
                $labels = [];
                foreach ($row->articles as $article) {
                    $labels[] = sprintf('<span class="label label-info label-many">%s</span>', $article->title);
                }

                return implode(' ', $labels);
            });
            $table->editColumn('method', function ($row) {
                return $row->method ? ArticleSet::METHOD_SELECT[$row->method] : '';
            });
            $table->editColumn('status', function ($row) {
                return $row->status ? ArticleSet::STATUS_SELECT[$row->status] : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'article']);

            return $table->make(true);
        }

        $articles = Article::get();

        return view('admin.articleSets.index', compact('articles'));
    }

    public function create()
    {
        abort_if(Gate::denies('article_set_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $articles = Article::pluck('title', 'id');

        return view('admin.articleSets.create', compact('articles'));
    }

    public function store(StoreArticleSetRequest $request)
    {
        $articleSet = ArticleSet::create($request->all());
        $articleSet->articles()->sync($request->input('articles', []));

        return redirect()->route('admin.article-sets.index');
    }

    public function edit(ArticleSet $articleSet)
    {
        abort_if(Gate::denies('article_set_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $articles = Article::pluck('title', 'id');

        $articleSet->load('articles');

        return view('admin.articleSets.edit', compact('articleSet', 'articles'));
    }

    public function update(UpdateArticleSetRequest $request, ArticleSet $articleSet)
    {
        $articleSet->update($request->all());
        $articleSet->articles()->sync($request->input('articles', []));

        return redirect()->route('admin.article-sets.index');
    }

    public function show(ArticleSet $articleSet)
    {
        abort_if(Gate::denies('article_set_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $articleSet->load('articles');

        return view('admin.articleSets.show', compact('articleSet'));
    }

    public function destroy(ArticleSet $articleSet)
    {
        abort_if(Gate::denies('article_set_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $articleSet->delete();

        return back();
    }

    public function massDestroy(MassDestroyArticleSetRequest $request)
    {
        ArticleSet::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
