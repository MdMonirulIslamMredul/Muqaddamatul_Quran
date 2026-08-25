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
                <form class="form-horizontal" action="{{route('store.donation.data')}}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" name="title" class="form-control" placeholder="Title" required>
                    </div>
                    <div class="form-group">
                        <label>Bangla Title</label>
                        <input type="text" name="bangla_title" class="form-control" placeholder="Bangla Title" required>
                    </div>
                    {{-- <div class="form-group">
                        <label>Arabic Title</label>
                        <input type="text" name="arabic_title" class="form-control" placeholder="Arabic Title" required>
                    </div> --}}
                    <div class="form-group">
                        <label>Image</label>
                        <input type="file" name="image" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Video</label>
                        <textarea class="editor form-control" col="10" row="3" name="video_link" ></textarea>
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
                        <label>Short Description-1 Bangla</label>
                        <textarea id="tinymce" class="editor form-control" row="3" name="short_des_bangla1" ></textarea>
                    </div>
                    <div class="form-group">
                        <label>Short Description-2 Bangla</label>
                        <textarea id="tinymce" class="editor form-control" row="3" name="short_des_bangla2" ></textarea>
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
                    {{-- <div class="form-group">
                        <label>Short Description-1 Arabic</label>
                        <textarea id="tinymce" class="editor form-control" row="3" name="short_des_ab1" ></textarea>
                    </div> --}}
                    {{-- <div class="form-group">
                        <label>Short Description-2 Arabic</label>
                        <textarea id="tinymce" class="editor form-control" row="3" name="short_des_ab2" ></textarea>
                    </div> --}}
                    {{-- <div class="form-group">
                        <label>Long Description-1 Arabic</label>
                        <textarea id="tinymce" class="editor form-control" row="3" name="long_des_ab1" ></textarea>
                    </div>
                    <div class="form-group">
                        <label>Long Description-2 Arabic</label>
                        <textarea id="tinymce" class="editor form-control" row="3" name="long_des_ab2" ></textarea>
                    </div>
                    <div class="form-group">
                        <label>Long Description-3 Arabic</label>
                        <textarea id="tinymce" class="editor form-control" row="3" name="long_des_ab3" ></textarea>
                    </div> --}}

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
                    @foreach ($donate_datas as $donate_data)
                        <tr>
                            <td><img src="{{ $donate_data->image ?? null }}" style="height: 100px;"></td>
                            <td>{{ $donate_data->title ?? null }}</td>
                            <td>{!! $donate_data->short_des ?? null !!}</td>
                            <td>
                                <a href="{{ route('edit.donate.data',['id'=>$donate_data->id]) }}" class="btn btn-primary btn-sm editProduct">Edit</a>
                                <a href="{{ route('delete.donate.data',['id'=>$donate_data->id]) }}" class="btn btn-primary btn-sm editProduct">Delete</a>

                            </td>
                        </tr>
                    @endforeach

                    </tbody>

                </table>
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/7.1.1/tinymce.min.js" referrerpolicy="origin"></script>
<script type="text/javascript">
    tinymce.init({
        selector: 'textarea#default'
    });
</script>
@endsection
