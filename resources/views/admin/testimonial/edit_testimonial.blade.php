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
                    <form action="{{route('update.testimonial')}}" enctype="multipart/form-data" method="POST">
                        @csrf
                        <input type="hidden" value="{{$testimonial->id}}" name="id">

                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" rows="5" name="name" value="{{$testimonial->name}}" id="name" placeholder="Name">
                        </div>
                        <div class="form-group">
                            <label>Designation</label>
                            <input type="text" class="form-control" rows="5" name="designation" value="{{$testimonial->designation}}" id="designation" placeholder="Designation">
                        </div>
                        <div class="form-group">
                            <label>Star</label>
                            <select class="form-control" name="star">
                                <option selected disabled>select review..</option>
                                <option value="0" {{$testimonial->star == 0?'selected':''}}>0</option>
                                <option value="1" {{$testimonial->star == 1?'selected':''}}>1</option>
                                <option value="2" {{$testimonial->star == 2?'selected':''}}>2</option>
                                <option value="3" {{$testimonial->star == 3?'selected':''}}>3</option>
                                <option value="4" {{$testimonial->star == 4?'selected':''}}>4</option>
                                <option value="5" {{$testimonial->star == 5?'selected':''}}>5</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Review</label>
                            <textarea id="tinymce" class="editor form-control" row="3" name="review">{{$testimonial->review}}</textarea>
                        </div>

                        <div class="form-group">
                            <label>Image</label>
                            <input type="file" name="image" class="form-control">
                        </div>
                        <img src="{{asset($testimonial->image)}}" class="mb-2" height="100" width="100" alt="">

                        <div class="form-group">
                            <label>Add to Homepage</label>
                            <select class="form-control" name="add_home">
                                <option value="1" @if ($testimonial->add_home == 1) selected @endif>Yes</option>
                                <option value="0" @if ($testimonial->add_home == 0) selected @endif>No</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Active/Deactive</label>
                            <select class="form-control" name="status">
                                <option value="1" @if ($testimonial->status == 1) selected @endif>Active</option>
                                <option value="0" @if ($testimonial->status == 0) selected @endif>Deactive</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-info">Update</button>
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
