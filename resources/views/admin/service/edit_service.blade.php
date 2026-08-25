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
                    <form action="{{route('update.services')}}" enctype="multipart/form-data" method="POST">
                        @csrf
                        <input type="hidden" value="{{$service->id}}" name="id">

                        <h3>Front page information</h3>
                        <div class="form-group">
                            <label>Service Title</label>
                            <input type="text" class="form-control" rows="5" name="service_title" id="service_title" value="{{$service->service_title}}" placeholder="Service Title">
                        </div>
                        <div class="form-group">
                            <label>Service Image</label>
                            <input type="file" name="main_image" class="form-control">
                        </div>
                        <img src="{{asset($service->main_image)}}" class="mb-2" height="100" width="100" alt="">
                        <div class="form-group">
                            <label>Service Small Details</label>
                            <textarea id="tinymce" class="editor form-control" col="10" row="3" name="service_details_small">{!! $service->service_details_small !!}</textarea>
                        </div>

                        <h3>Details page information</h3>
                        <div class="form-group">
                            <label>banner Image</label>
                            <input type="file" name="banner_image" class="form-control">
                        </div>
                        <img src="{{asset($service->banner_image)}}" class="mb-2" height="100" width="100" alt="">


                        <div class="form-group">
                            <label>Details Image one</label>
                            <input type="file" name="details_image1" class="form-control">
                        </div>
                        <img src="{{asset($service->details_image1)}}" class="mb-2" height="100" width="100" alt="">

                        <div class="form-group">
                            <label>Details Image two</label>
                            <input type="file" name="details_image2" class="form-control">
                        </div>
                        <img src="{{asset($service->details_image2)}}" class="mb-2" height="100" width="100" alt="">

                        <div class="form-group">
                            <label>Details Image three</label>
                            <input type="file" name="details_image3" class="form-control">
                        </div>
                        <img src="{{asset($service->details_image3)}}" class="mb-2" height="100" width="100" alt="">




                        <div class="form-group">
                            <label>Service Long Details one</label>
                            <textarea id="tinymce" class="editor form-control" col="10" row="3" name="service_details1">{!! $service->service_details1 !!}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Service Long Details two</label>
                            <textarea id="tinymce" class="editor form-control" col="10" row="3" name="service_details2">{!! $service->service_details2 !!}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Service Long Details three</label>
                            <textarea id="tinymce" class="editor form-control" col="10" row="3" name="service_details3">{!! $service->service_details3 !!}</textarea>
                        </div>

                        <div class="form-group">
                            <label>Add to Homepage</label>
                            <select class="form-control" name="service_home">
                                <option value="1" @if ($service->service_home == 1) selected @endif>Yes</option>
                                <option value="0" @if ($service->service_home == 0) selected @endif>No</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Active/Deactive</label>
                            <select class="form-control" name="status">
                                <option value="1" @if ($service->status == 1) selected @endif>Active</option>
                                <option value="0" @if ($service->status == 0) selected @endif>Deactive</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-info">Update</button>
                    </form>                </div>
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
