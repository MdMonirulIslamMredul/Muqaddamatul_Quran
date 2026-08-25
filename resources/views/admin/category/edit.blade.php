@extends('admin.master')
@section('title')
    Category Edit
@endsection

@push('admin_style')
@include('admin.common.style')
@endpush

@section('body')
    <div class="row mt-2">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form class="form-horizontal" action="{{ route('categories.update', $category->id) }}"enctype="multipart/form-data"  method="POST">
                        @csrf
                        @method('PUT')
                        <h3>Category Information Update</h3>
                        <div class="form-group">
                            <label for="category_name">Category Name</label>
                            <input type="text" name="category_name" class="form-control @error('category_name')
                            is-invalid
                        @enderror" value="{{ $category->category_name }}">
                            @error('category_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="category_name">Category Img</label>
                            <input type="file" name="img" class="form-control">
                            <img src="{{ asset('images/'.$category->img) }}" alt="" width="90px">
                        </div>

                        <div class="form-group">
                            <label for="category_name_ban">Category Name Bangla</label>
                            <input type="text" name="category_name_ban" class="form-control @error('category_name_ban')
                            is-invalid
                        @enderror" value="{{ $category->category_name_ban }}">
                            @error('category_name_ban')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        {{-- <div class="form-group">
                            <label for="category_name_ab">Category Name Arabic</label>
                            <input type="text" name="category_name_ab" class="form-control @error('category_name_ab')
                            is-invalid
                        @enderror" value="{{ $category->category_name_ab }}">
                            @error('category_name_ab')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div> --}}
                        <div class="table-responsive">
                            <button type="submit" class="btn btn-success">Update</button>
                        </div>
                    </form>
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

@push('admin_script')
@include('admin.common.script')
@endpush
