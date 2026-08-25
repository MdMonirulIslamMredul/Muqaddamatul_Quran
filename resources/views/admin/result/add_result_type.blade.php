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
                    <form class="form-horizontal" action="{{route('store.result.type')}}" enctype="multipart/form-data" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Subject</label>
                            <select name="subject_id"  class="form-control">
                               <option value="" disabled>Select Subject</option>
                               @foreach($subjects as $subject)
                               <option value="{{$subject->id}}">{{$subject->subject_name_english}}</option>
                               @endforeach

                           </select>
                        </div>
                        <div class="form-group">
                            <label>Result</label>
                           <select name="result_id"  class="form-control">
                               <option value="" disabled>Select Result</option>
                               @foreach($results as $result)
                               <option value="{{$result->id}}">{{$result->title}}</option>
                               @endforeach

                           </select>
                        </div>
                        {{-- <div class="form-group">
                            <label>Student Name</label>
                           <select name="name"  class="form-control">
                               <option value="" disabled>Select Student Name</option>
                               @foreach($users as $user)
                               <option value="{{$user->id}}">{{$user->name}}</option>
                               @endforeach

                           </select>
                        </div> --}}
                        {{-- <div class="form-group">
                            <label>Student Roll</label>
                           <select name="roll_no"  class="form-control">
                               <option value="" disabled>Select Student Roll</option>
                               @foreach($users as $user)
                               <option value="{{$user->id}}">{{$user->roll_no}}</option>
                               @endforeach

                           </select>
                        </div> --}}
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
                            <th>Result Type</th>
                            {{-- <th>Student Name</th>
                            <th>Student Roll</th> --}}
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($result_types as $result_type)
                            <tr>
                                <td>{{ $result_type->subject->subject_name_english ?? null }}</td>
                                {{-- <td>{{ $result_type->user->name ?? null }}</td>
                                <td>{{ $result_type->user->roll_no ?? null }}</td> --}}
                                <td>
                                    <a href="{{ route('upload.result',['id'=>$result_type->id]) }}" class="btn btn-primary btn-sm editProduct">Add Result</a>

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
