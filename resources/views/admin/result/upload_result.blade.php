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
                    <form class="form-horizontal" action="{{route('store.uploaded.result')}}" enctype="multipart/form-data" method="POST">
                        @csrf
                       
                                            

                        <div class="form-group">
                            <label>Student Name</label>
                           <select name="user_id"  class="form-control">
                               <option value="" disabled>Select Name</option>
                               @foreach($users as $user)
                               <option value="{{$user->id}}">{{$user->name}}</option>
                               @endforeach

                           </select>
                        </div>
                        {{-- <div class="form-group">
                            <label>Student Roll</label>
                           <select name="roll_no"  class="form-control">
                               <option value="" disabled>Select Roll</option>
                               @foreach($users as $user)
                               <option value="{{$user->id}}">{{$user->roll_no}}</option>
                               @endforeach

                           </select>
                        </div> --}}

                        <div class="form-group">
                            <label>Result Grade</label>
                            <input type="text" class="form-control" rows="5" name="result_grade" id="result_grate" placeholder="Grade/A+,A..." required>
                            <input type="hidden" class="form-control" rows="5" name="result_type_id" value={{ $result_types->id }}>
                            <input type="hidden" class="form-control" rows="5" name="subject_id" value={{ $result_types->subject->id }}>
                        </div>

                        
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
            <h2 class="text-center py-3">{{ $result_types->subject->subject_name_english }} Results</h2>
            <div class="card-header">
                <div class="table-responsive m-t-40">
                    <table id="config-table" class="table display table-striped border no-wrap">
                        <thead>
                        <tr>
                            <th>Sl</th>                           
                            <th>Student Name</th>
                            <th>Student Roll</th>                           
                            <th>Grade</th>                           
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($uploaded_results as $uploaded_result)
                            <tr>
                                <td>{{ $uploaded_result->id }}</td>                                
                                 <td>{{ $uploaded_result->user->name ?? null }}</td>
                                <td>{{ $uploaded_result->user->roll_no ?? null }}</td>                               
                                <td>{{ $uploaded_result->result_grate ?? null }}</td>                               
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
