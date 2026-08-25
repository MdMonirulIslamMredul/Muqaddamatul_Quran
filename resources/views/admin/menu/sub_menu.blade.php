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
                    <form class="form-horizontal" action="{{route('store.sub.menu')}}" enctype="multipart/form-data" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" name="title" class="form-control" placeholder="Title">
                        </div>
                        <div class="form-group">
                            <label>Designation</label>
                            <input type="text" name="designation" class="form-control" placeholder="Designation">
                        </div>
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Name">
                        </div>
                        <div class="form-group">
                            <label>Menu</label>
                           <select name="menu_id"  class="form-control">
                               <option disabled>Select Menu</option>
                               @foreach($menus as $menu)
                               <option value="{{$menu->id}}">{{$menu->title}}</option>
                               @endforeach

                           </select>
                        </div>

                        <div class="form-group">
                            <label>Image</label>
                            <input type="file" name="image" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Banner Image</label>
                            <input type="file" name="banner_image" class="form-control">
                        </div>

                        {{-- <div class="form-group">
                            <label>Details Image one</label>
                            <input type="file" name="details_image1" class="form-control">

                        </div> --}}
                        {{-- <div class="form-group">
                            <label>Details Image two</label>
                            <input type="file" name="details_image2" class="form-control">

                        </div> --}}
                        {{-- <div class="form-group">
                            <label>Details Image three</label>
                            <input type="file" name="details_image3" class="form-control">
                        </div> --}}



                        <div class="form-group">
                            <label>Details</label>
                            <textarea id="tinymce" class="editor form-control" row="3" name="details1"></textarea>
                        </div>
                        {{-- <div class="form-group">
                            <label>Blog Long Details two</label>
                            <textarea id="tinymce" class="editor form-control" row="3" name="details2"></textarea>

                        </div> --}}


                        {{--                        <div class="form-group">--}}
                        {{--                            <label>Add to Homepage</label>--}}
                        {{--                            <select class="form-control" name="add_home">--}}
                        {{--                                <option value="1">Yes</option>--}}
                        {{--                                <option value="0">No</option>--}}
                        {{--                            </select>--}}
                        {{--                        </div>--}}
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
                    <table id="config-table" class="table display table-striped border no-wrap">
                        <thead>
                        <tr>
                            <th>Title</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($sub_menus as $menu)
                            <tr>
                                <td>{{ $menu->title ?? null }}</td>
                                <td>
                                    <a href="{{ route('edit.sub.menu',['id'=>$menu->id]) }}" class="btn btn-primary btn-sm editProduct">Edit</a>

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
