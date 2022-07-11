@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.create') }} {{ trans('cruds.predictHistory.title_singular') }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route("admin.predict-histories.store") }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="title">{{ trans('cruds.predictHistory.fields.title') }}</label>
                    <input class="form-control title-to-predict {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title"
                           id="title" value="{{ old('title', '') }}">
                    @if($errors->has('title'))
                        <div class="invalid-feedback">
                            {{ $errors->first('title') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.predictHistory.fields.title_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="view">{{ trans('cruds.predictHistory.fields.view') }}</label>
                    <input class="form-control view-predicted {{ $errors->has('view') ? 'is-invalid' : '' }}" type="text" name="view"
                           id="view" value="{{ old('view', '') }}" step="1" readonly>
                    @if($errors->has('view'))
                        <div class="invalid-feedback">
                            {{ $errors->first('view') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.predictHistory.fields.view_helper') }}</span>
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
@section('scripts')
    @parent
    <script>
        $(function () {
            $('.title-to-predict').on('change', function () {
                $.ajax({
                    type: "POST",
                    url: "http://localhost:5000",
                    data: JSON.stringify({ title: $(this).val() }),
                    contentType: "application/json; charset=utf-8",
                    dataType: "json",
                    success: function(data){
                        $('.view-predicted').val(data);
                    },
                    error: function(errMsg){
                        console.log(errMsg);
                    }
                });
            });
        });
    </script>
@endsection
