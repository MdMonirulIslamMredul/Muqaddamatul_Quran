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
                <form class="form-horizontal" action="{{route('store.upcoming.project')}}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" name="title" class="form-control" placeholder="Title" required>
                    </div>
                    <div class="form-group">
                        <label>Bangla Title</label>
                        <input type="text" name="bangla_title" class="form-control" placeholder="Bangla Title" required>
                    </div>
                    <div class="form-group">
                        <label>Project Location</label>
                        <input type="text" name="location" class="form-control" placeholder="Project Location" >
                    </div>
                    <div class="form-group">
                        <label>Project Strting Date</label>
                        <input type="date" name="project_start_date" class="form-control" placeholder="Project Starting Date" >
                    </div>
                    <div class="form-group">
                        <label>Image 1</label>
                        <input type="file" name="image1" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Image 2</label>
                        <input type="file" name="image2" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label>Image 3</label>
                        <input type="file" name="image3" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label>Video 1</label>
                        <textarea class="editor form-control" col="10" row="3" name="video_link1" ></textarea>
                    </div>
                    <div class="form-group">
                        <label>Video 2</label>
                        <textarea class="editor form-control" col="10" row="3" name="video_link2" ></textarea>
                    </div>
                    <div class="form-group">
                        <label>Short Description-1 English</label>
                        <textarea id="tinymce" class="editor form-control" row="3" name="short_des1" ></textarea>
                    </div>
                    <div class="form-group">
                        <label>Short  Description-2 English</label>
                        <textarea id="tinymce" class="editor form-control" row="3" name="short_des2" ></textarea>
                    </div>
                    <div class="form-group">
                        <label>Short Description-1 Bangla</label>
                        <textarea id="tinymce" class="editor form-control" row="3" name="short_des_bangla1" ></textarea>
                    </div>
                    <div class="form-group">
                        <label>Short Description-2 Bangla</label>
                        <textarea id="tinymce" class="editor form-control" row="3" name="short_des_bangla2" ></textarea>
                    </div>
                    <div class="form-group">
                        <label>Long Description-1 English</label>
                        <textarea id="tinymce" class="editor form-control" row="3" name="long_des1" ></textarea>
                    </div>
                    <div class="form-group">
                        <label>Long Description-2 English</label>
                        <textarea id="tinymce" class="editor form-control" row="3" name="long_des2" ></textarea>
                    </div>
                    <div class="form-group">
                        <label>Long Description-3 English</label>
                        <textarea id="tinymce" class="editor form-control" row="3" name="long_des3" ></textarea>
                    </div>                    
                    <div class="form-group">
                        <label>Long Description-1 Bangla</label>
                        <textarea id="tinymce" class="editor form-control" row="3" name="long_des_bangla1" ></textarea>
                    </div>
                    <div class="form-group">
                        <label>Long Description-2 Bangla</label>
                        <textarea id="tinymce" class="editor form-control" row="3" name="long_des_bangla2" ></textarea>
                    </div>
                    <div class="form-group">
                        <label>Long Description-3 Bangla</label>
                        <textarea id="tinymce" class="editor form-control" row="3" name="long_des_bangla3" ></textarea>
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
                        <th>Image-1</th>
                        <th>Title</th>
                        <th>Description</th>                        
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($upcome_project as $upcome_project)
                        <tr>
                            <td><img src="{{ $upcome_project->image1 ?? null }}" style="height: 100px;"></td>
                            <td>{{ $upcome_project->title ?? null }}</td>
                            <td>{!! $upcome_project->short_des1 ?? null !!}</td>
                            <td>
                                <a href="{{ route('edit.upcome.porject',['id'=>$upcome_project->id]) }}" class="btn btn-primary btn-sm editProduct">Edit</a>

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
