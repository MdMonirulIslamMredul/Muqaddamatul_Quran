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
                    <form class="form-horizontal" action="{{route('store.testimonial')}}" enctype="multipart/form-data" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" rows="5" name="name" id="name" placeholder="Name">
                        </div>
                        <div class="form-group">
                            <label>Designation</label>
                            <input type="text" class="form-control" rows="5" name="designation" id="designation" placeholder="Designation">
                        </div>
                        <div class="form-group">
                            <label>Star</label>
                            <select class="form-control" name="star">
                                <option selected disabled>select review..</option>
                                <option value="0">0</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Review</label>
                            <textarea id="tinymce" class="editor form-control" row="3" name="review"></textarea>
                        </div>

                        <div class="form-group">
                            <label>Image</label>
                            <input type="file" name="image" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Add to Homepage</label>
                            <select class="form-control" name="add_home">
                                <option value="1">Yes</option>
                                <option value="0">No</option>
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

    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <div class="table-responsive m-t-40">
                <table id="config-table" class="table display table-striped border no-wrap">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Image</th>

                        <th>Designation</th>
                        <th>Star</th>
                        <th>Active/Deactive</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($testimonials as $testimonial)
                        <tr>
                            <td>{{ $testimonial->name ?? null }}</td>
                            <td><img src="{{ asset($testimonial->image) }}" style="height: 100px"></td>

                            <td>{!! $testimonial->designation ?? null !!}</td>
                            <td>{!! $testimonial->star ?? null !!}</td>
                            <td>
                                @if ($testimonial->status == 1)
                                    <button class="btn btn-sm btn-primary">Active</button>
                                @elseif($testimonial->status == 0)
                                    <button class="btn btn-sm btn-danger">Deactive</button>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('edit.testimonial',['id'=>$testimonial->id]) }}" class="btn btn-primary btn-sm editProduct">Edit</a>
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
