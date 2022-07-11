@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.articleSet.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.article-sets.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.articleSet.fields.id') }}
                        </th>
                        <td>
                            {{ $articleSet->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.articleSet.fields.article') }}
                        </th>
                        <td>
                            @foreach($articleSet->articles as $key => $article)
                                <span class="label label-info">{{ $article->title }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.articleSet.fields.method') }}
                        </th>
                        <td>
                            {{ App\Models\ArticleSet::METHOD_SELECT[$articleSet->method] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.articleSet.fields.status') }}
                        </th>
                        <td>
                            {{ App\Models\ArticleSet::STATUS_SELECT[$articleSet->status] ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.article-sets.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection