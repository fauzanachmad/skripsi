@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.articleSet.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.article-sets.update", [$articleSet->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="articles">{{ trans('cruds.articleSet.fields.article') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('articles') ? 'is-invalid' : '' }}" name="articles[]" id="articles" multiple>
                    @foreach($articles as $id => $article)
                        <option value="{{ $id }}" {{ (in_array($id, old('articles', [])) || $articleSet->articles->contains($id)) ? 'selected' : '' }}>{{ $article }}</option>
                    @endforeach
                </select>
                @if($errors->has('articles'))
                    <div class="invalid-feedback">
                        {{ $errors->first('articles') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.articleSet.fields.article_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.articleSet.fields.method') }}</label>
                <select class="form-control {{ $errors->has('method') ? 'is-invalid' : '' }}" name="method" id="method">
                    <option value disabled {{ old('method', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\ArticleSet::METHOD_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('method', $articleSet->method) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('method'))
                    <div class="invalid-feedback">
                        {{ $errors->first('method') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.articleSet.fields.method_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.articleSet.fields.status') }}</label>
                <select class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status" id="status">
                    <option value disabled {{ old('status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\ArticleSet::STATUS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('status', $articleSet->status) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('status'))
                    <div class="invalid-feedback">
                        {{ $errors->first('status') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.articleSet.fields.status_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection