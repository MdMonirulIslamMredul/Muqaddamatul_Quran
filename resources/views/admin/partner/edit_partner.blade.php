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
                <form class="form-horizontal" action="{{route('update.partner')}}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <input type="hidden" value="{{$edit_partner->id}}" name="id">
                    <input type="hidden" value="{{$edit_partner->image}}" name="old_img">

                    <div class="form-group">
                        <label>Partner Name</label>
                        <input type="text" name="partner_name" class="form-control" value="{{ $edit_partner->partner_name }}">
                    </div>
                    <div class="form-group">
                        <label>Partner Name Bangla</label>
                        <input type="text" name="partner_name_bangla" class="form-control" value="{{ $edit_partner->partner_name_bangla }}">
                    </div>
                    
                    <div class="form-group">
                        <label>Image</label>
                        <input type="file" name="image" class="form-control" required>
                    </div>  
                    <div>
                        <img src="{{ asset($edit_partner->image) }}" alt="" style="height: 100px;">
                    </div>
                    <div class="form-group">
                        <label>Active/Deactive</label>
                        <select class="form-control" name="status">
                            <option value="1" @if ($edit_partner->status == 1) selected @endif>Active</option>
                            <option value="0" @if ($edit_partner->status == 0) selected @endif>Deactive</option>
                        </select>
                    </div>                
                   
                    <div class="table-responsive">
                            <button type="submit" class="btn btn-info">Update</button>
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
