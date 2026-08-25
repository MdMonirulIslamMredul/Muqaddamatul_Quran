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
    <form class="form-horizontal" action="{{route('store.counter')}}" method="POST">
        @csrf

        @if($counter!=null)
        <input type="hidden" name="id" value="{{$counter->id}}">
        @endif

        <div class="form-group">
            <label>Counter Title 1</label>
            <input type="text" class="form-control" rows="5" name="title_1" id="title_1" value="{{ $counter != null ? $counter->title_1 : '' }}" placeholder="Counter Title">
        </div>
        <div class="form-group">
            <label>Counter Title 1 (BN)</label>
            <input type="text" class="form-control" rows="5" name="title_bn1" id="title_bn1" value="{{ $counter != null ? $counter->title_bn1 : '' }}" placeholder="Counter Title">
        </div>
        {{-- <div class="form-group">
            <label>Counter Title 1 (AB)</label>
            <input type="text" class="form-control" rows="5" name="title_ab1" id="title_ab1" value="{{ $counter != null ? $counter->title_ab1 : '' }}" placeholder="Counter Title">
        </div> --}}
        <div class="form-group">
            <label>Counter Value</label>
            <input type="text" class="form-control" rows="5" name="value_1" id="value_1" value="{{ $counter != null ? $counter->value_1 : '' }}" placeholder="Counter Value">
        </div>
        <div class="form-group">
            <label>Counter Value (BN)</label>
            <input type="text" class="form-control" rows="5" name="value_bn1" id="value_bn1" value="{{ $counter != null ? $counter->value_bn1 : '' }}" placeholder="Counter Value">
        </div>
        {{-- <div class="form-group">
            <label>Counter Value (AB)</label>
            <input type="text" class="form-control" rows="5" name="value_ab1" id="value_ab1" value="{{ $counter != null ? $counter->value_ab1 : '' }}" placeholder="Counter Value">
        </div> --}}
        <div class="form-group">
            <label>Icon 1</label>
            <input type="text" class="form-control" rows="5" name="incon_1" id="incon_1" value="{{ $counter != null ? $counter->incon_1 : '' }}" placeholder="Icon ">
        </div>

        <div class="form-group">
            <label>Counter Title 2</label>
            <input type="text" class="form-control" rows="5" name="title_2" id="title_2" value="{{ $counter != null ? $counter->title_2 : '' }}" placeholder="Counter Title">
        </div>
        <div class="form-group">
            <label>Counter Title 2 (BN)</label>
            <input type="text" class="form-control" rows="5" name="title_bn2" id="title_bn2" value="{{ $counter != null ? $counter->title_bn2 : '' }}" placeholder="Counter Title">
        </div>
        {{-- <div class="form-group">
            <label>Counter Title 2 (AB)</label>
            <input type="text" class="form-control" rows="5" name="title_ab2" id="title_ab2" value="{{ $counter != null ? $counter->title_ab2 : '' }}" placeholder="Counter Title">
        </div> --}}
        <div class="form-group">
            <label>Counter Value</label>
            <input type="text" class="form-control" rows="5" name="value_2" id="value_2" value="{{ $counter != null ? $counter->value_2 : '' }}" placeholder="Counter Value">
        </div>
        <div class="form-group">
            <label>Counter Value (BN)</label>
            <input type="text" class="form-control" rows="5" name="value_bn2" id="value_bn2" value="{{ $counter != null ? $counter->value_bn2 : '' }}" placeholder="Counter Value">
        </div>
        {{-- <div class="form-group">
            <label>Counter Value (AB)</label>
            <input type="text" class="form-control" rows="5" name="value_ab2" id="value_ab2" value="{{ $counter != null ? $counter->value_ab2 : '' }}" placeholder="Counter Value">
        </div> --}}
        <div class="form-group">
            <label>Icon 2</label>
            <input type="text" class="form-control" rows="5" name="incon_2" id="incon_2" value="{{ $counter != null ? $counter->incon_2 : '' }}" placeholder="Icon ">
        </div>

        <div class="form-group">
            <label>Counter Title 3</label>
            <input type="text" class="form-control" rows="5" name="title_3" id="title_3" value="{{ $counter != null ? $counter->title_3 : '' }}" placeholder="Counter Title">
        </div>
        <div class="form-group">
            <label>Counter Title 3 (BN)</label>
            <input type="text" class="form-control" rows="5" name="title_bn3" id="title_bn3" value="{{ $counter != null ? $counter->title_bn3 : '' }}" placeholder="Counter Title">
        </div>
        {{-- <div class="form-group">
            <label>Counter Title 3 (AB)</label>
            <input type="text" class="form-control" rows="5" name="title_ab3" id="title_ab3" value="{{ $counter != null ? $counter->title_ab3 : '' }}" placeholder="Counter Title">
        </div> --}}
        <div class="form-group">
            <label>Counter Value</label>
            <input type="text" class="form-control" rows="5" name="value_3" id="value_3" value="{{ $counter != null ? $counter->value_3 : '' }}" placeholder="Counter Value">
        </div>
        <div class="form-group">
            <label>Counter Value (BN)</label>
            <input type="text" class="form-control" rows="5" name="value_bn3" id="value_bn3" value="{{ $counter != null ? $counter->value_bn3 : '' }}" placeholder="Counter Value">
        </div>
        {{-- <div class="form-group">
            <label>Counter Value (AB)</label>
            <input type="text" class="form-control" rows="5" name="value_ab3" id="value_ab3" value="{{ $counter != null ? $counter->value_ab3 : '' }}" placeholder="Counter Value">
        </div> --}}
        <div class="form-group">
            <label>Icon 3</label>
            <input type="text" class="form-control" rows="5" name="incon_3" id="incon_3" value="{{ $counter != null ? $counter->incon_3 : '' }}" placeholder="Icon ">
        </div>

        <div class="form-group">
            <label>Counter Title 4</label>
            <input type="text" class="form-control" rows="5" name="title_4" id="title_4" value="{{ $counter != null ? $counter->title_4 : '' }}" placeholder="Counter Title">
        </div>
        <div class="form-group">
            <label>Counter Title 4 (BN)</label>
            <input type="text" class="form-control" rows="5" name="title_bn4" id="title_bn4" value="{{ $counter != null ? $counter->title_bn4 : '' }}" placeholder="Counter Title">
        </div>
        {{-- <div class="form-group">
            <label>Counter Title 4 (AB)</label>
            <input type="text" class="form-control" rows="5" name="title_ab4" id="title_ab4" value="{{ $counter != null ? $counter->title_ab4 : '' }}" placeholder="Counter Title">
        </div> --}}
        <div class="form-group">
            <label>Counter Value</label>
            <input type="text" class="form-control" rows="5" name="value_4" id="value_4" value="{{ $counter != null ? $counter->value_4 : '' }}" placeholder="Counter Value">
        </div>
        <div class="form-group">
            <label>Counter Value (BN)</label>
            <input type="text" class="form-control" rows="5" name="value_bn4" id="value_bn4" value="{{ $counter != null ? $counter->value_bn4 : '' }}" placeholder="Counter Value">
        </div>
        {{-- <div class="form-group">
            <label>Counter Value (AB)</label>
            <input type="text" class="form-control" rows="5" name="value_ab4" id="value_ab4" value="{{ $counter != null ? $counter->value_ab4 : '' }}" placeholder="Counter Value">
        </div> --}}
        <div class="form-group">
            <label>Icon 4</label>
            <input type="text" class="form-control" rows="5" name="incon_4" id="incon_4" value="{{ $counter != null ? $counter->incon_4 : '' }}" placeholder="Icon ">
        </div>

        <div class="table-responsive">
        @if($counter !=null)
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
