
<div class="row">
    <div class="col-lg-12">
        <div class="card">

            @if(session('message'))
                <div class="alert alert-success" role="alert">
                    {{session('message')}}
                </div>
            @endif
            <div class="card-body">
                <form class="form-horizontal" action="{{route('store.numbers')}}" enctype="multipart/form-data" method="POST">
                    @csrf
                    @if($number!=null)
                        <input type="hidden" name="id" value="{{$number->id}}">
                    @endif
                    <div class="form-group">
                        <label>Bkash Number</label>
                        @if($number!=null)
                            <input type="text" class="form-control" rows="5" value="{{$number->bkash}}" name="bkash" id="name" placeholder="Bkash">
                        @else
                            <input type="text" class="form-control" rows="5" name="bkash" id="name" placeholder="Bkash">
                        @endif
                    </div>

                    <div class="form-group">
                        <label>Nagad Number</label>
                        @if($number!=null)
                            <input type="text" class="form-control" rows="5" value="{{$number->nagad}}" name="nagad" id="name" placeholder="Nagad">
                        @else
                            <input type="text" class="form-control" rows="5" name="nagad" id="name" placeholder="Nagad">
                        @endif
                    </div>

                    <div class="form-group">
                        <label>Rocket Number</label>
                        @if($number!=null)
                            <input type="text" class="form-control" rows="5" value="{{$number->rocket}}" name="rocket" id="name" placeholder="Rocket">
                        @else
                            <input type="text" class="form-control" rows="5" name="rocket" id="name" placeholder="Rocket">
                        @endif
                    </div>


                    <div class="table-responsive">

                        @if($number!=null)
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

