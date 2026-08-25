@extends('admin.master')
@section('body')

<div class="conatiner">
    <div class="card">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="table-responsive m-t-40">
                        <table id="config-table" class="table display table-striped border">
                            <thead>
                            <tr>

                                <th>name</th>
                                <th>Gmail</th>
                                <th>number</th>
                                <th>Amount</th>
                                <th>Payment_type</th>
                                <th>Time</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($payments as $payment)
                                <tr>
                                    <td>{{ $payment->dname }}</td>
                                    <td>{{ $payment->demail }}</td>
                                    <td>{{ $payment->dphone }}</td>
                                    <td>{{ $payment->amount }}</td>
                                    <td>{{ $payment->payment_type }}</td>
                                    <td>{{ $payment->created_at }}</td>

                                </tr>
                            @endforeach

                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
