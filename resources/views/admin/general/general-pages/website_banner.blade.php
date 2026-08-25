
<div class="row">
    <div class="col-lg-12">
        <div class="card">

            @if(session('message'))
                <div class="alert alert-success" role="alert">
                    {{session('message')}}
                </div>
            @endif
            <div class="card-body">
                <form class="form-horizontal" action="{{route('store.main.banner')}}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <h3>Banner one</h3>
                    <div class="form-group">
                        <label>Title</label>
                        <textarea class="form-control" row="3" name="title"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Title Bangla</label>
                        <textarea class="form-control" row="3" name="title_bn"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Title Arabic</label>
                        <textarea class="form-control" row="3" name="title_ab"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Short Details</label>
                        <textarea class="form-control" row="3" name="short_details"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Short Details Bangla</label>
                        <textarea class="form-control" row="3" name="short_details_bn"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Short Details Arabic</label>
                        <textarea class="form-control" row="3" name="short_details_ab"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Banner Image</label>
                        <input type="file" name="image" class="form-control">
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
                    <th>Title</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($banners as $data)
                    <tr>
                        <td>{{ $data->title ?? null }}</td>
                        <td><img src="{{ asset($data->image) }}" style="height: 100px"></td>
                        <td>
                            <a href="{{ route('edit.main.banner',['id'=>$data->id]) }}" class="btn btn-primary btn-sm editProduct">Edit</a>
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

