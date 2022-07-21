@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.predictHistory.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.predict-histories.update", [$predictHistory->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="title">{{ trans('cruds.predictHistory.fields.title') }}</label>
                <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="title" value="{{ old('title', $predictHistory->title) }}">
                @if($errors->has('title'))
                    <div class="invalid-feedback">
                        {{ $errors->first('title') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.predictHistory.fields.title_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="view">{{ trans('cruds.predictHistory.fields.view') }}</label>
                <input class="form-control {{ $errors->has('view') ? 'is-invalid' : '' }}" type="number" name="view" id="view" value="{{ old('view', $predictHistory->view) }}" step="1">
                @if($errors->has('view'))
                    <div class="invalid-feedback">
                        {{ $errors->first('view') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.predictHistory.fields.view_helper') }}</span>
            <!-- </div>
            <div class="form-group">
                <label for="user_id">{{ trans('cruds.predictHistory.fields.user') }}</label>
                <select class="form-control select2 {{ $errors->has('user') ? 'is-invalid' : '' }}" name="user_id" id="user_id">
                    @foreach($users as $id => $entry)
                        <option value="{{ $id }}" {{ (old('user_id') ? old('user_id') : $predictHistory->user->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('user'))
                    <div class="invalid-feedback">
                        {{ $errors->first('user') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.predictHistory.fields.user_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="user_agent">{{ trans('cruds.predictHistory.fields.user_agent') }}</label>
                <textarea class="form-control {{ $errors->has('user_agent') ? 'is-invalid' : '' }}" name="user_agent" id="user_agent">{{ old('user_agent', $predictHistory->user_agent) }}</textarea>
                @if($errors->has('user_agent'))
                    <div class="invalid-feedback">
                        {{ $errors->first('user_agent') }}
                    </div> -->
                <!-- @endif
                <span class="help-block">{{ trans('cruds.predictHistory.fields.user_agent_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    <!-- {{ trans('global.save') }} -->
                <!-- </button> --> -->
            </div>
        </form>
    </div>
</div>



@endsection