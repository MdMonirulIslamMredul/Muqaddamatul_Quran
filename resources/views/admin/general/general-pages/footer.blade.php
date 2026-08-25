
<div class="row">
    <div class="col-lg-12">
        <div class="card">

            @if(session('message'))
                <div class="alert alert-success" role="alert">
                    {{session('message')}}
                </div>
            @endif
            <div class="card-body">
                <form class="form-horizontal" action="{{route('store.footer')}}" enctype="multipart/form-data" method="POST">
                    @csrf
                    @if($footer!=null)
                        <input type="hidden" name="id" value="{{$footer->id}}">
                    @endif
                    <div class="form-group">
                        <label>Footer Details</label>
                        @if($footer!=null)
                            <textarea  class="form-control" rows="10" name="details">{{$footer->details}}</textarea>
                        @else
                            <textarea  class="form-control" rows="10" name="details"></textarea>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Footer Details Bangla</label>
                        @if($footer!=null)
                            <textarea  class="form-control" rows="10" name="details_b">{{$footer->details_b}}</textarea>
                        @else
                            <textarea  class="form-control" rows="10" name="details_b"></textarea>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Footer Details Arabic</label>
                        @if($footer!=null)
                            <textarea  class="form-control" rows="10" name="details_ab">{{$footer->details_ab}}</textarea>
                        @else
                            <textarea  class="form-control" rows="10" name="details_ab"></textarea>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Credit Details</label>
                        @if($footer!=null)
                            <textarea class="form-control" row="3" name="credit">{{$footer->credit}}</textarea>
                        @else
                            <textarea class="form-control" row="3" name="credit"></textarea>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Credit Details Bangla</label>
                        @if($footer!=null)
                            <textarea class="form-control" row="3" name="credit_b">{{$footer->credit_b}}</textarea>
                        @else
                            <textarea class="form-control" row="3" name="credit_b"></textarea>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Credit Details Arabic</label>
                        @if($footer!=null)
                            <textarea class="form-control" row="3" name="credit_ab">{{$footer->credit_ab}}</textarea>
                        @else
                            <textarea class="form-control" row="3" name="credit_ab"></textarea>
                        @endif
                    </div>

                    <div class="table-responsive">

                        @if($footer!=null)
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

