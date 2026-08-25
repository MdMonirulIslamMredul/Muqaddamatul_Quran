@extends('admin.master')
@section('body')
    <div class="row mt-2">
        <div class="col-lg-12">
            <div class="card">
                @php $menus = \App\Models\Menu::get() @endphp
                @if(session('message'))
                    <div class="alert alert-success" role="alert">
                        {{session('message')}}
                    </div>
                @endif
                <div class="card-body">
                    <form class="form-horizontal" action="{{route('update.sub.menu')}}" enctype="multipart/form-data" method="POST">
                        @csrf

                            <input type="hidden" name="id" value="{{$sub_menu->id}}">
                            
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" name="title" class="form-control" value="{{$sub_menu->title}}">
                        </div>
                        <div class="form-group">
                            <label>Designation</label>
                            <input type="text" name="designation" class="form-control" value="{{$sub_menu->designation}}">
                        </div>
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" value="{{$sub_menu->name}}">
                        </div>
                        <div class="form-group">
                            <label>Menu</label>
                            <select name="menu_id"  class="form-control">
                                <option disabled>Select Menu</option>

                                @foreach($menus as $menu)
                                    <option value="{{$menu->id}}" {{$menu->id==$sub_menu->menu_id?'selected':''}}>{{$menu->title}}</option>
                                @endforeach

                            </select>
                        </div>

                        <div class="form-group">
                            <label>Image</label>
                            <input type="file" name="image" class="form-control">
                            @if($sub_menu!=null)
                                <img src="{{asset($sub_menu->image)}}" class="mt-2" width="200" height="200" alt="">
                            @endif
                        </div>
                        <div class="form-group">
                            <label>banner Image</label>
                            <input type="file" name="banner_image" class="form-control">
                            @if($sub_menu!=null)
                                <img src="{{asset($sub_menu->banner_image)}}" class="mt-2" width="200" height="100" alt="">
                            @endif
                        </div>

                        {{-- <div class="form-group">
                            <label>Details Image one</label>
                            <input type="file" name="details_image1" class="form-control">
                            @if($sub_menu!=null)
                                <img src="{{asset($sub_menu->details_image1)}}" class="mt-2" width="100" height="100" alt="">
                            @endif
                        </div> --}}
                        {{-- <div class="form-group">
                            <label>Details Image two</label>
                            <input type="file" name="details_image2" class="form-control">
                            @if($sub_menu!=null)
                                <img src="{{asset($sub_menu->details_image2)}}" class="mt-2" width="100" height="100" alt="">
                            @endif
                        </div> --}}
                        {{-- <div class="form-group">
                            <label>Details Image three</label>
                            <input type="file" name="details_image3" class="form-control">
                            @if($sub_menu!=null)
                                <img src="{{asset($sub_menu->details_image3)}}" class="mt-2" width="100" height="100" alt="">
                            @endif
                        </div> --}}



                        <div class="form-group">
                            <label> Details</label>
                            @if($sub_menu!=null)
                                <textarea id="tinymce" class="editor form-control" row="3" name="details1">{!! $sub_menu->details1 !!}</textarea>
                            @else
                                <textarea id="tinymce" class="editor form-control" row="3" name="details1"></textarea>
                            @endif
                        </div>
                        {{-- <div class="form-group">
                            <label>Blog Long Details two</label>
                            @if($sub_menu!=null)
                                <textarea id="tinymce" class="editor form-control" row="3" name="details2">{!! $sub_menu->details2 !!}</textarea>
                            @else
                                <textarea id="tinymce" class="editor form-control" row="3" name="details2"></textarea>
                            @endif
                        </div> --}}


                        {{--                        <div class="form-group">--}}
                        {{--                            <label>Add to Homepage</label>--}}
                        {{--                            <select class="form-control" name="add_home">--}}
                        {{--                                <option value="1">Yes</option>--}}
                        {{--                                <option value="0">No</option>--}}
                        {{--                            </select>--}}
                        {{--                        </div>--}}
                        <div class="table-responsive">
                            @if($sub_menu!=null)
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
