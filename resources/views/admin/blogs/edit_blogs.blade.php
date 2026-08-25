@extends('admin.master')
@section('body')
    <div class="row mt-2">
        <div class="col-lg-12">
            <div class="card">

                @if(session('message'))
                    <div class="alert alert-success" role="alert">
                        {{session('message')}}
                    </div>
                @endif
                <div class="card-body">
                    <form action="{{route('update.blogs')}}" enctype="multipart/form-data" method="POST">
                        @csrf
                        <input type="hidden" value="{{$blog->id}}" name="id">

                        <h3>Front page information</h3>
                        <div class="form-group">
                            <label> Title(EN)</label>
                            <input type="text" class="form-control" rows="5" name="title" id="title" value="{{$blog->title}}" placeholder="Blogs Title">
                        </div>
                        <div class="form-group">
                            <label> Title(BN)</label>
                            <input type="text" class="form-control" rows="5" name="title_bn" id="title" value="{{$blog->title_bn}}" placeholder="Blogs Title">
                        </div>
                        {{-- <div class="form-group">
                            <label> Title(AB)</label>
                            <input type="text" class="form-control" rows="5" name="title_ab" id="title" value="{{$blog->title_ab}}" placeholder="Blogs Title">
                        </div> --}}
                        <div class="form-group">
                            <label> Image</label>
                            <input type="file" name="main_image" class="form-control">
                        </div>
                        <img src="{{asset($blog->main_image)}}" class="mb-2" height="100" width="100" alt="">
                        <div class="form-group">
                            <label> Small Details(EN)</label>
                            <textarea id="tinymce" class="editor form-control" col="10" row="3" name="short_details">{!! $blog->short_details !!}</textarea>
                        </div>
                        <div class="form-group">
                            <label> short Details(BN)</label>
                            <textarea  id="tinymce" class="editor form-control" col="10" row="3" name="short_details_bn">{!! $blog->short_details_bn !!}</textarea>
                        </div>
                        {{-- <div class="form-group">
                            <label>Blog short Details(AB)</label>
                            <textarea  id="tinymce" class="editor form-control" col="10" row="3" name="short_details_ab">{!! $blog->short_details_ab !!}</textarea>
                        </div> --}}
                        <h3>Details page information</h3>
                        <div class="form-group">
                            <label>banner Image</label>
                            <input type="file" name="banner_image" class="form-control">
                        </div>
                        <img src="{{asset($blog->banner_image)}}" class="mb-2" height="100" width="100" alt="">
                        <div class="form-group">
                            <label>Details Image one</label>
                            <input type="file" name="details_image1" class="form-control">
                        </div>
                        <img src="{{asset($blog->details_image1)}}" class="mb-2" height="100" width="100" alt="">

                        <div class="form-group">
                            <label>Details Image two</label>
                            <input type="file" name="details_image2" class="form-control">
                        </div>
                        <img src="{{asset($blog->details_image2)}}" class="mb-2" height="100" width="100" alt="">
                        <div class="form-group">
                            <label>Details Image Three</label>
                            <input type="file" name="details_image3" class="form-control">
                        </div>
                        <img src="{{asset($blog->details_image3)}}" class="mb-2" height="100" width="100" alt="">

                        <div class="form-group">
                            <label>Blogs Long Details one</label>
                            <textarea id="tinymce" class="editor form-control" col="10" row="3" name="details1">{!! $blog->details1 !!}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Blog Long Details one(BN)</label>
                            <textarea id="tinymce" class="editor form-control" row="3" name="details1_bn">{!! $blog->details1_bn !!}</textarea>
                        </div>
                        {{-- <div class="form-group">
                            <label>Blog Long Details one(AB)</label>
                            <textarea id="tinymce" class="editor form-control" row="3" name="details1_ab">{!! $blog->details1_ab !!}</textarea>
                        </div> --}}
                        <div class="form-group">
                            <label>Blogs Long Details two</label>
                            <textarea id="tinymce" class="editor form-control" col="10" row="3" name="details2">{!! $blog->details2 !!}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Blog Long Details two(BN)</label>
                            <textarea id="tinymce" class="editor form-control" row="3" name="details2_bn">{!! $blog->details2_bn !!}</textarea>
                        </div>
                        {{-- <div class="form-group">
                            <label>Blog Long Details two(AB)</label>
                            <textarea id="tinymce" class="editor form-control" row="3" name="details2_ab">{!! $blog->details2_ab !!}</textarea>
                        </div> --}}

                        <div class="form-group">
                            <label>Add to Homepage</label>
                            <select class="form-control" name="add_home">
                                <option value="1" @if ($blog->add_home == 1) selected @endif>Yes</option>
                                <option value="0" @if ($blog->add_home == 0) selected @endif>No</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Active/Deactive</label>
                            <select class="form-control" name="status">
                                <option value="1" @if ($blog->status == 1) selected @endif>Active</option>
                                <option value="0" @if ($blog->status == 0) selected @endif>Deactive</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-info">Update</button>
                    </form>
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
