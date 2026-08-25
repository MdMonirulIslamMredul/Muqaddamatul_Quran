@extends('admin.master')
@section('body')

<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <div class="table-responsive m-t-40">
                <table id="config-table" class="table display table-striped border">
                    <thead>
                    <tr>
                        <th>Name</th>                          
                        <th>Phone</th>                          
                        <th>Email</th>                          
                        <th>Occupation</th>                          
                        <th>Permanent District</th>                          
                        <th>Present District</th>                         
                 
                        {{-- <th>Action</th> --}}
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($volunteers as $volunteer)
                        <tr>
                            <td>{{ $volunteer->name ?? null }}</td>
                            <td>{{ $volunteer->phone_number?? null  }}</td>
                            <td>{{ $volunteer->email_address ?? null }}</td>
                            <td>{{ $volunteer->profession ?? null }}</td>
                            <td>{{ $volunteer->permanent_discrict ?? null }}</td>
                            <td>{{ $partner->present_discrict ?? null }}</td>                            
                           
                            {{-- <td>
                                <a href="{{ route('edit.partner',['id'=>$partner->id]) }}" class="btn btn-primary btn-sm editProduct">Delete</a>

                            </td> --}}
                        </tr>
                    @endforeach

                    </tbody>

                </table>
            </div>
        </div>
    </div>
</div>
   
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script type="text/javascript">
        tinymce.init({
            selector: 'textarea#default'
        });
    </script>
@endsection
