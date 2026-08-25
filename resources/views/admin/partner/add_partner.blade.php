@extends('admin.master')
@section('body')
<div class="row mt-2">
    <div class="col-lg-12">
        <div class="card">            

            @if(session('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{session('message')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>                    
            @endif
            
            <div class="card-body">
                <form class="form-horizontal" action="{{route('store.partner')}}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Partner Name</label>
                        <input type="text" name="partner_name" class="form-control" placeholder="Partner Name">
                    </div>
                    <div class="form-group">
                        <label>Partner Name Bangla</label>
                        <input type="text" name="partner_name_bangla" class="form-control" placeholder="Partner Name Bangla">
                    </div>
                    
                    <div class="form-group">
                        <label>Image</label>
                        <input type="file" name="image" class="form-control" required>
                    </div>                   
                   
                    <div class="table-responsive">
                            <button type="submit" class="btn btn-info">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <div class="table-responsive m-t-40">
                <table id="config-table" class="table display table-striped border">
                    <thead>
                    <tr>
                        <th>Image</th>
                        <th>Name</th>                          
                        <th>Active/Deactive</th>                     
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($partners as $partner)
                        <tr>
                            <td><img src="{{ $partner->image ?? null }}" style="height: 100px;"></td>
                            <td>{{ $partner->partner_name ?? null }}</td>                            
                            <td>
                                    @if ($partner->status == 1)
                                        <button class="btn btn-sm btn-primary">Active</button>
                                    @elseif($partner->status == 0)
                                        <button class="btn btn-sm btn-danger">Deactive</button>
                                    @endif
                                </td>
                            <td>
                                <a href="{{ route('edit.partner',['id'=>$partner->id]) }}" class="btn btn-primary btn-sm editProduct">Edit</a>

                            </td>
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
