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
                    <form class="form-horizontal" action="{{route('store.enrollmetn.info')}}" method="POST">
                        @csrf

                        @if($enrollment_info!=null)
                        <input type="hidden" name="id" value="{{$enrollment_info->id}}">
                        @endif
                        
                        <div class="form-group">
                            <label>Institute Name</label>
                           
                                <input type="text" class="form-control" rows="5" name="institute_name" id="institute_name" value="{{ $enrollment_info != null ? $enrollment_info->institute_name : '' }}" placeholder="Institute Name">
                            

                        </div>
                        <div class="form-group">
                            <label>Institute Address</label>
                            
                                <input type="text" class="form-control" rows="5" name="institute_address" id="institute_address" value="{{ $enrollment_info != null ? $enrollment_info->institute_address : '' }}" placeholder="Institute Address">
                           
                        </div>
                        <div class="form-group">
                            <label>Institute Owner</label>
                           
                            <input type="text" name="institute_owner" class="form-control" value="{{ $enrollment_info != null ? $enrollment_info->institute_owner : '' }}" placeholder="Institute Owner Name">
                           
                        </div>

                        <div class="form-group">
                            <label>Institutional Instructions</label>
                          
                            <textarea  id="tinymce" class="editor form-control" col="10" row="3" name="institute_Instructions">
                                {{ $enrollment_info != null ? $enrollment_info->institute_Instructions : '' }}  
                            </textarea>
                            

                        </div>

                        <div class="table-responsive">     
                        @if($enrollment_info !=null)
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
{{-- 
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <div class="table-responsive m-t-40">
                <table id="config-table" class="table display table-striped border no-wrap">
                    <thead>
                    <tr>
                        <th>Image</th>
                        <th>Title</th>

                        <th>Active/Deactive</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($services as $service)
                        <tr>
                            <td><img src="{{ asset($service->main_image) }}" style="height: 100px"></td>
                            <td>{{ $service->service_title ?? null }}</td>

                            <td>
                                @if ($service->status == 1)
                                    <button class="btn btn-sm btn-primary">Active</button>
                                @elseif($service->status == 0)
                                    <button class="btn btn-sm btn-danger">Deactive</button>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('edit.services',['id'=>$service->id]) }}" class="btn btn-primary btn-sm editProduct">Edit</a>

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
