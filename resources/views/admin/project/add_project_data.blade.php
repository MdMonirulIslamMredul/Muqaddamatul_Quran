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
                <form class="form-horizontal" action="{{route('store.project.data')}}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" name="title" class="form-control" placeholder="Title" required>
                    </div>
                    <div class="form-group">
                        <label>Bangla Title</label>
                        <input type="text" name="title_bangla" class="form-control" placeholder="Bangla Title" required>
                    </div>
                    <div class="form-group">
                        <label>Image</label>
                        <input type="file" name="image" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Designation English</label>
                        <textarea id="tinymce" class="editor form-control" row="3" name="short_des_eng"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Designation Bangla</label>
                        <textarea id="tinymce" class="editor form-control" row="3" name="short_des_bangla" ></textarea>
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
                        <th>Title</th>
                        <th>Description</th>                        
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($project_datas as $project_data)
                        <tr>
                            <td><img src="{{ $project_data->image ?? null }}" style="height: 100px;"></td>
                            <td>{{ $project_data->title ?? null }}</td>
                            <td>{!! $project_data->short_des_eng ?? null !!}</td>
                            <td>
                                <a href="{{ route('edit.project.data',['id'=>$project_data->id]) }}" class="btn btn-primary btn-sm editProduct">Edit</a>

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
