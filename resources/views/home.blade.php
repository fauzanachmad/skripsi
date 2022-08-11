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
                    <p class="text-center">0,76</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-info">
                <div class="card-header">
                    <h4 class="text-center">Recall</h4>
                </div>
                <div class="card-body">
                    <p class="text-center">0,76</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-warning">
                <div class="card-header">
                    <h4 class="text-center">Accuracy</h4>
                </div>
                <div class="card-body">
                    <p class="text-center">0,76</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-danger">
                <div class="card-header">
                    <h4 class="text-center">F1Score</h4>
                </div>
                <div class="card-body">
                    <p class="text-center">0,76</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Clasification Report
                </div>
            
                <div class="card-body">
                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                        <tr>
                            <td>#</td>
                            <td>Precission</td>
                            <td>Recall</td>
                            <td>F1-Score</td>
                            <td>Support</td>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>Kurang Populer</td>
                            <td>{{ $logger[0]['classification_report']['kurang_populer']['precision'] ?? ''}}</td>
                            <td>{{ $logger[0]['classification_report']['kurang_populer']['recall'] ?? ''}}</td>
                            <td>{{ $logger[0]['classification_report']['kurang_populer']['f1-score'] ?? '' }}</td>
                            <td>{{ $logger[0]['classification_report']['kurang_populer']['support'] ?? ''}}</td>
                        </tr>
                        <tr>
                            <td>Populer</td>
                            <td>{{ $logger[0]['classification_report']['populer']['precision'] ?? ''}}</td>
                            <td>{{ $logger[0]['classification_report']['populer']['recall'] ?? ''}}</td>
                            <td>{{ $logger[0]['classification_report']['populer']['f1-score'] ?? '' }}</td>
                            <td>{{ $logger[0]['classification_report']['populer']['support'] ?? ''}}</td>
                        </tr>
                        <tr>
                            <td>Standar</td>
                            <td>{{ $logger[0]['classification_report']['standar']['precision'] ?? ''}}</td>
                            <td>{{ $logger[0]['classification_report']['standar']['recall'] ?? ''}}</td>
                            <td>{{ $logger[0]['classification_report']['standar']['f1-score'] ?? '' }}</td>
                            <td>{{ $logger[0]['classification_report']['standar']['support'] ?? ''}}</td>
                        </tr>
                        <tr>
                            <td>Macro Averrage</td>
                            <td>{{ $logger[0]['classification_report']['macro avg']['precision'] ?? ''}}</td>
                            <td>{{ $logger[0]['classification_report']['macro avg']['recall'] ?? ''}}</td>
                            <td>{{ $logger[0]['classification_report']['macro avg']['f1-score'] ?? '' }}</td>
                            <td>{{ $logger[0]['classification_report']['macro avg']['support'] ?? ''}}</td>
                        </tr>
                        <tr>
                            <td>Weighted Averrage</td>
                            <td>{{ $logger[0]['classification_report']['weighted avg']['precision'] ?? ''}}</td>
                            <td>{{ $logger[0]['classification_report']['weighted avg']['recall'] ?? ''}}</td>
                            <td>{{ $logger[0]['classification_report']['weighted avg']['f1-score'] ?? '' }}</td>
                            <td>{{ $logger[0]['classification_report']['weighted avg']['support'] ?? ''}}</td>
                        </tr>
                        <tr>
                            <td colspan="4">Accuracy</td>
                            <td>{{ $logger[0]['classification_report']['accuracy'] ?? ''}}</td>
                        </tr>
                        
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent
@endsection