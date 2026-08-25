
<div class="row">
    <div class="col-lg-12">
        <div class="card">

            @if(session('message'))
                <div class="alert alert-success" role="alert">
                    {{session('message')}}
                </div>
            @endif
            <div class="card-body">
                <form class="form-horizontal" action="{{route('store.logo')}}" enctype="multipart/form-data" method="POST">
                    @csrf
                    @if($logo!=null)
                        <input type="hidden" name="id" value="{{$logo->id}}">
                    @endif
                    <div class="form-group">
                        <label>Website name</label>
                        @if($logo!=null)
                            <input type="text" class="form-control" rows="5" value="{{$logo->site_name}}" name="site_name" id="email" placeholder="Website name">
                        @else
                            <input type="text" class="form-control" rows="5" name="site_name" id="email" placeholder="Website name">
                        @endif

                    </div>
                    <div class="form-group">
                        <label>Dark Logo Image</label>
                        <input type="file" name="logo_image" class="form-control">
                        @if($logo!=null)
                            <img src="{{asset($logo->logo_image)}}" height="50px" width="100px" alt="">
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Light Logo Image</label>
                        <input type="file" name="logo_image1" class="form-control">
                        @if($logo!=null)
                            <img src="{{asset($logo->logo_image1)}}"  height="100px" alt="">
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Favicon</label>
                        <input type="file" name="favicon" class="form-control">
                        @if($logo!=null)
                            <img src="{{asset($logo->favicon)}}" width="100px" height="100" alt="">
                        @endif
                    </div>

                    <div class="table-responsive">
                        <button type="submit" class="btn btn-info">Submit</button>
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

