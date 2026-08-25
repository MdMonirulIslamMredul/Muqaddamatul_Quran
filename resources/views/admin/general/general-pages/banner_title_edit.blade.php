@extends('admin.master')
@section('body')
<div class="row mt-3">
    <div class="col-lg-12">
        <div class="card">

            @if(session('message'))
                <div class="alert alert-success" role="alert">
                    {{session('message')}}
                </div>
            @endif
            <div class="card-body">
                <form class="form-horizontal" action="{{route('update.banner.title',['id'=>$banner_title->id])}}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" class="form-control" rows="5" value="{{$banner_title->title}}" name="title" id="name" placeholder="Title">
                    </div>
                    <div class="form-group">
                        <label>Image</label>
                        <input type="file" name="image" class="form-control">
                        <img src="{{asset($banner_title->image)}}" height="100" width="400" alt="">
                    </div>
                    <div class="form-group">
                        <label>Select Page for the title and banner</label>
                        <select class="form-control" name="page">
                            <option value="" disabled selected>Select Page</option>
                            <option value="about" {{$banner_title->page == 'about'?'selected':''}}>About</option>
                            <option value="service" {{$banner_title->page == 'service'?'selected':''}}>service</option>
                            <option value="department" {{$banner_title->page == 'department'?'selected':''}}>department</option>
                            <option value="projects" {{$banner_title->page == 'projects'?'selected':''}}>projects</option>
                            <option value="gallery" {{$banner_title->page == 'gallery'?'selected':''}}>gallery</option>
                            <option value="volunteer" {{$banner_title->page == 'volunteer'?'selected':''}}>volunteer</option>
                            <option value="news" {{$banner_title->page == 'news'?'selected':''}}>news</option>
                            <option value="user" {{$banner_title->page == 'user'?'selected':''}}>user</option>
                            <option value="audio" {{$banner_title->page == 'audio'?'selected':''}}>audio</option>
                            <option value="book" {{$banner_title->page == 'book'?'selected':''}}>book</option>
                            <option value="live_tv" {{$banner_title->page == 'live_tv'?'selected':''}}>live_tv</option>
                            <option value="image_gallery" {{$banner_title->page == 'image_gallery'?'selected':''}}>image_gallery</option>
                            <option value="video_gallery" {{$banner_title->page == 'video_gallery'?'selected':''}}>video_gallery</option>
                        </select>
                    </div>
                    <div class="table-responsive">
                        <button type="submit" class="btn btn-info">Submit</button>
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
