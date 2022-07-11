@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.setting.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.settings.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="flask_api_key">{{ trans('cruds.setting.fields.flask_api_key') }}</label>
                <input class="form-control {{ $errors->has('flask_api_key') ? 'is-invalid' : '' }}" type="text" name="flask_api_key" id="flask_api_key" value="{{ old('flask_api_key', '') }}">
                @if($errors->has('flask_api_key'))
                    <div class="invalid-feedback">
                        {{ $errors->first('flask_api_key') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.flask_api_key_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="last_sync">{{ trans('cruds.setting.fields.last_sync') }}</label>
                <input class="form-control datetime {{ $errors->has('last_sync') ? 'is-invalid' : '' }}" type="text" name="last_sync" id="last_sync" value="{{ old('last_sync') }}">
                @if($errors->has('last_sync'))
                    <div class="invalid-feedback">
                        {{ $errors->first('last_sync') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.last_sync_helper') }}</span>
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