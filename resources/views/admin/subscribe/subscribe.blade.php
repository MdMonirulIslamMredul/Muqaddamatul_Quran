@extends('admin.master')
@section('body')

<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <div class="table-responsive m-t-40">
            <table id="config-table" class="table display table-striped border no-wrap">
                <thead>
                <tr>
                    <th>Email</th>

                    <th>Active/Deactive</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($subscribes as $subscribe)
                    <tr>
                        <td>{{ $subscribe->email ?? null }}</td>

                        <td>
                            @if ($subscribe->status == 1)
                                <button class="btn btn-sm btn-primary">Active</button>
                            @elseif($subscribe->status == 0)
                                <button class="btn btn-sm btn-danger">Deactive</button>
                            @endif
                        </td>
                        <td>
                            {{-- <a href="{{ route('subscribe.team',['id'=>$subscribe->id]) }}" class="btn btn-primary btn-sm editProduct">Edit</a> --}}

                        </td>
                    </tr>
                @endforeach

                </tbody>

            </table>
            </div>
        </div>
    </div>
</div>

@endsection
