@extends('frontend.master')
@section('content')

<div class="container pb-100 pt-100">
    <div class="panel panel-default">
        <div class="panel-heading" style="background: #29B54E">
            <h1 class="panel-title text-center" style="color:#fff">Congratulation !! Your donation Done</h1>
        </div>
        <div class="panel-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Field</th>
                        <th>Details</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><strong>Donation ID:</strong></td>
                        <td>{{ $info->donate_id }}</td>
                    </tr>
                    <tr>
                        <td><strong>Tracking ID:</strong></td>
                        <td>{{ $info->tracking_id }}</td>
                    </tr>
                    <tr>
                        <td><strong>Amount:</strong></td>
                        <td>{{ $info->amount }}</td>
                    </tr>
                    <tr>
                        <td><strong>Name:</strong></td>
                        <td>{{ $info->dname }}</td>
                    </tr>
                    <tr>
                        <td><strong>Email:</strong></td>
                        <td>{{ $info->demail }}</td>
                    </tr>
                    <tr>
                        <td><strong>Phone:</strong></td>
                        <td>{{ $info->dphone }}</td>
                    </tr>
                    <tr>
                        <td><strong>Transaction ID:</strong></td>
                        <td>{{ $info->transaction_id }}</td>
                    </tr>
                    <tr>
                        <td><strong>Payment Type:</strong></td>
                        <td>{{ $info->payment_type }}</td>
                    </tr>
                </tbody>
            </table>
            {{-- <div class="row">
                <div class="col-sm-12 text-center">
                    <p><strong>Tracking ID:</strong> {{ $info->tracking_id }}</p>
                    <p><strong>Amount:</strong> {{ $info->amount }}</p>
                    <p><strong>Name:</strong> {{ $info->dname }}</p>
                    <p><strong>Email:</strong> {{ $info->demail }}</p>
                    <p><strong>Phone:</strong> {{ $info->dphone }}</p>
                    <p><strong>Transaction ID:</strong> {{ $info->transaction_id }}</p>
                    <p><strong>Payment Type:</strong> {{ $info->payment_type }}</p>
                </div>
            </div> --}}
        </div>
    </div>
</div>


@endsection
