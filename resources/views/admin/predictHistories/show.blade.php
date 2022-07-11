@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.predictHistory.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.predict-histories.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.predictHistory.fields.id') }}
                        </th>
                        <td>
                            {{ $predictHistory->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.predictHistory.fields.title') }}
                        </th>
                        <td>
                            {{ $predictHistory->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.predictHistory.fields.view') }}
                        </th>
                        <td>
                            {{ $predictHistory->view }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.predictHistory.fields.user') }}
                        </th>
                        <td>
                            {{ $predictHistory->user->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.predictHistory.fields.user_agent') }}
                        </th>
                        <td>
                            {{ $predictHistory->user_agent }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.predict-histories.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection