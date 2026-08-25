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
                    <form class="form-horizontal" action="{{route('store.result')}}" enctype="multipart/form-data" method="POST">
                        @csrf

                        @if($results != null)
                        <input type="hidden" name="id" value="{{ $results->id }}">
                        @endif
                        <div class="form-group">
                            <label>Title</label>                            
                            <input type="text" class="form-control" rows="5" name="title" id="name"  value="{{ $results !=null ? $results->title : '' }}" placeholder="Title">
                        </div>
                        <div class="table-responsive">
                            @if($results !=null)
                            <button type="submit" class="btn btn-info">Update</button>
                            @else
                            <button type="submit" class="btn btn-info">submit</button>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- <div class="col-lg-12">
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
                        @foreach ($menus as $menu)
                            <tr>
                                <td>{{ $menu->title ?? null }}</td>
                                <td>
                                    <a href="{{ route('edit.menu',['id'=>$menu->id]) }}" class="btn btn-primary btn-sm editProduct">Edit</a>

                                </td>
                            </tr>
                        @endforeach

                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div> --}}
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script type="text/javascript">
        tinymce.init({
            selector: 'textarea#default'
        });
    </script>
@endsection
