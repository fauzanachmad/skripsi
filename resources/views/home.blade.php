@extends('layouts.admin')
@section('content')
<div class="content">
    <div class="row">
        <div class="col-md-3">
            <div class="card bg-success">
                <div class="card-header">
                    <h4 class="text-center">Precision</h4>
                </div>
                <div class="card-body">
                    <p class="text-center">0,74</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-info">
                <div class="card-header">
                    <h4 class="text-center">Recall</h4>
                </div>
                <div class="card-body">
                    <p class="text-center">0,74</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-warning">
                <div class="card-header">
                    <h4 class="text-center">Accuracy</h4>
                </div>
                <div class="card-body">
                    <p class="text-center">0,74</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-danger">
                <div class="card-header">
                    <h4 class="text-center">F1Score</h4>
                </div>
                <div class="card-body">
                    <p class="text-center">0,74</p>
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    Dashboard
                </div>

                <div class="card-body">
                    @if(session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in! --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent

@endsection