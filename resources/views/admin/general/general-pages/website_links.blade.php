
<div class="row">
    <div class="col-lg-12">
        <div class="card">

            @if(session('message'))
                <div class="alert alert-success" role="alert">
                    {{session('message')}}
                </div>
            @endif
            <div class="card-body">
                <form class="form-horizontal" action="{{route('store.links')}}" enctype="multipart/form-data" method="POST">
                    @csrf
                    @if($links!=null)
                        <input type="hidden" name="id" value="{{$links->id}}">
                    @endif
                    <div class="form-group">
                        <label>Email</label>
                        @if($links!=null)
                            <input type="email" class="form-control" rows="5" value="{{$links->email}}" name="email" id="email" placeholder="Email">
                        @else
                            <input type="email" class="form-control" rows="5" name="email" id="email" placeholder="Email">
                        @endif

                    </div>
                    <div class="form-group">
                        <label>Facebook</label>
                        @if($links!=null)
                            <input type="text" class="form-control" rows="5" value="{{$links->facebook}}" name="facebook" id="facebook" placeholder="Facebook">
                        @else
                            <input type="text" class="form-control" rows="5" name="facebook" id="facebook" placeholder="Facebook">
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Instagram</label>
                        @if($links!=null)
                            <input type="text" class="form-control" rows="5" name="instagram" value="{{$links->instagram}}" id="instagram" placeholder="Instagram">
                        @else
                            <input type="text" class="form-control" rows="5" name="instagram" id="instagram" placeholder="Instagram">
                        @endif
                    </div>
                    <div class="form-group">
                        <label>LinkedIn</label>
                        @if($links!=null)
                            <input type="text" class="form-control" rows="5" name="linkedIn" value="{{$links->linkedIn}}" id="linkedIn" placeholder="LinkedIn">
                        @else
                            <input type="text" class="form-control" rows="5" name="linkedIn" id="linkedIn" placeholder="LinkedIn">
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Youtube</label>
                        @if($links!=null)
                            <input type="text" class="form-control" rows="5" name="youtube" value="{{$links->youtube}}" id="youtube" placeholder="Youtube">
                        @else
                            <input type="text" class="form-control" rows="5" name="youtube" id="youtube" placeholder="Youtube">
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Number</label>
                        @if($links!=null)
                            <input type="text" class="form-control" rows="5" name="number" value="{{$links->number}}" id="number" placeholder="Number">
                        @else
                            <input type="text" class="form-control" rows="5" name="number" id="number" placeholder="Number">
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        @if($links!=null)
                            <textarea class="form-control" row="3" name="address">{{$links->address}}</textarea>
                        @else
                            <textarea class="form-control" row="3" name="address"></textarea>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Address Map Link</label>
                        @if($links!=null)
                            <textarea  class="form-control" rows="10" name="map_link">{{$links->map_link}}</textarea>
                        @else
                            <textarea  class="form-control" rows="10" name="map_link"></textarea>
                        @endif
                    </div>
                    <div class="table-responsive">

                        @if($links!=null)
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

