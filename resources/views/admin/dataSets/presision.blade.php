@extends('layouts.admin')
@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    Dashboard
                </div>

                <div class="card-body">
                    <table>
                        <thead>
                            <tr>
                                <th></th>
                                <th>Precision</th>
                                <th>Recall</th>
                                <th>Fi-Score</th>
                                <th>Support</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Popular</td>
                                <td>0.79</td>
                                <td>0.76</td>
                                <td>0.77</td>
                                <td>208</td>
                            </tr>
                            <tr>
                                <td>Standart</td>
                                <td>0.73</td>
                                <td>0.70</td>
                                <td>0.71</td>
                                <td>207</td>
                            </tr>
                            <tr>
                                <td>Kurang Popular</td>
                                <td>0.69</td>
                                <td>0.75</td>
                                <td>0.72</td>
                                <td>185</td>
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