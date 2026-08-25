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
                    <form class="form-horizontal" action="{{route('store.consultancy')}}" enctype="multipart/form-data" method="POST">
                        @csrf
                        @if($consultancy!=null)
                            <input type="hidden" name="id" value="{{$consultancy->id}}">
                        @endif

                        <div class="form-group">
                            <label>banner Image</label>
                            <input type="file" name="banner_image" class="form-control">
                            @if($consultancy!=null)
                                <img src="{{asset($consultancy->banner_image)}}" class="mt-2" width="200" height="100" alt="">
                            @endif
                        </div>

                        <div class="form-group">
                            <label>Details Image one</label>
                            <input type="file" name="details_image1" class="form-control">
                            @if($consultancy!=null)
                                <img src="{{asset($consultancy->details_image1)}}" class="mt-2" width="100" height="100" alt="">
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Details Image two</label>
                            <input type="file" name="details_image2" class="form-control">
                            @if($consultancy!=null)
                                <img src="{{asset($consultancy->details_image2)}}" class="mt-2" width="100" height="100" alt="">
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Details Image three</label>
                            <input type="file" name="details_image3" class="form-control">
                            @if($consultancy!=null)
                                <img src="{{asset($consultancy->details_image3)}}" class="mt-2" width="100" height="100" alt="">
                            @endif
                        </div>



                        <div class="form-group">
                            <label>Blog Long Details one</label>
                            @if($consultancy!=null)
                                <textarea id="tinymce" class="editor form-control" row="3" name="details1">{!! $consultancy->details1 !!}</textarea>
                            @else
                                <textarea id="tinymce" class="editor form-control" row="3" name="details1"></textarea>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Blog Long Details two</label>
                            @if($consultancy!=null)
                                <textarea id="tinymce" class="editor form-control" row="3" name="details2">{!! $consultancy->details2 !!}</textarea>
                            @else
                                <textarea id="tinymce" class="editor form-control" row="3" name="details2"></textarea>
                            @endif
                        </div>


{{--                        <div class="form-group">--}}
{{--                            <label>Add to Homepage</label>--}}
{{--                            <select class="form-control" name="add_home">--}}
{{--                                <option value="1">Yes</option>--}}
{{--                                <option value="0">No</option>--}}
{{--                            </select>--}}
{{--                        </div>--}}
                        <div class="table-responsive">
                            @if($consultancy!=null)
                                <button type="submit" class="btn btn-info">Update</button>
                            @else
                                <button type="submit" class="btn btn-info">Submit</button>
                            @endif
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
