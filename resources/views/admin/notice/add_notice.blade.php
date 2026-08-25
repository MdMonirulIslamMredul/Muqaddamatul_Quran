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
                    <form class="form-horizontal" action="{{route('store.notice')}}" enctype="multipart/form-data" method="POST">
                        @csrf

                        <div class="form-group">
                            <label class="mb-2">Upload PDF</label>
                            <input type="file" name="pdf_file" class="form-control">
                        </div>

                        <div class="form-group">
                            <label class="mb-2">Short Description</label>
                            <textarea id="tinymce" class="editor form-control" row="3" name="short_des"></textarea>
                        </div>
                        <div class="form-group">
                            <label class="mb-2">Long Description</label>
                            <textarea id="tinymce" class="editor form-control" row="3" name="long_des"></textarea>
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
                            <th>short Description</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($notices as $notice)
                            <tr>
                                <td>{!! $notice->short_des ?? null !!}</td>
                                <td>
                                    <a href="{{ route('edit.notice',['id'=>$notice->id]) }}" class="btn btn-primary btn-sm editProduct">Edit</a>

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
