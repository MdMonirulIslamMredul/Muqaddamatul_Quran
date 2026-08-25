@extends('admin.master')
@section('title')
    Department Edit
@endsection

@push('admin_style')
@include('admin.common.style')
@endpush

@section('body')
    <div class="row mt-2">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form class="form-horizontal" action="{{ route('department.update',$department->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <h3>Department Information</h3>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <label for="title_en">Department Title (EN)</label>
                                    <input type="text" name="title_en" value="{{ $department->title_en }}" class="form-control @error('title_en')
                                    is-invalid
                                @enderror" value="{{ old('title_en') }}">
                                    @error('title_en')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="title_bn">Department Title (BN)</label>
                                    <input type="text" name="title_bn"  value="{{ $department->title_bn }}" class="form-control @error('title_bn')
                                    is-invalid
                                @enderror" value="{{ old('title_bn') }}">
                                    @error('title_bn')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Department Details  (EN)</label>
                                    <textarea  id="tinymce" class="editor form-control" col="10" row="3" name="des_en">{{ $department->des_en }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Department Details  (BN)</label>
                                    <textarea  id="tinymce" class="editor form-control" col="10" row="3" name="des_bn">{{ $department->des_bn }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Department Details 2 (EN)</label>
                                    <textarea  id="tinymce" class="editor form-control" col="10" row="3" name="des2_en">{{ $department->des2_en }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Department Details 2 (BN)</label>
                                    <textarea  id="tinymce" class="editor form-control" col="10" row="3" name="des2_bn">{{ $department->des2_bn }}</textarea>
                                </div>
                            </div>



                         <div class="row">

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Thumbnil Image</label>
                                    <input type="file" class="form-control @error('thumbnil_img')
                                is-invalid
                                  @enderror" name="thumbnil_img">
                                  @error('thumbnil_img')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                <img src="{{ asset('images/'.$department->thumbnil_img) }}" alt="" width="80px">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label> Image 1</label>
                                    <input type="file" class="form-control @error('thumbnil_img')
                                is-invalid
                                  @enderror" name="image1">
                                  @error('thumbnil_img')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <img src="{{ asset('images/'.$department->image1) }}" alt="" width="80px">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label> Image2</label>
                                    <input type="file" class="form-control @error('thumbnil_img')
                                is-invalid
                                  @enderror"  name="image2">
                                  @error('thumbnil_img')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <img src="{{ asset('images/'.$department->image2) }}" alt="" width="80px">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label> Image 3</label>
                                    <input type="file" class="form-control @error('thumbnil_img')
                                is-invalid
                                  @enderror"  name="image3">
                                  @error('thumbnil_img')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <img src="{{ asset('images/'.$department->image3) }}" alt="" width="80px">
                                </div>
                            </div>
                         </div>



                        </div>

                        <div class="table-responsive">
                            <button type="submit" class="btn btn-info">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection

@push('admin_script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.2.2/axios.min.js">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/7.1.1/tinymce.min.js" referrerpolicy="origin"></script>
<script type="text/javascript">
    tinymce.init({
        selector: 'textarea#default'
    });
</script>
@include('admin.common.script')
<script>
    // For Create
        // To Get Subcategory Data
        const getSubcategories = (category_id, selected = null) => {
            axios.get(`${window.location.origin}/get-subcategories/${category_id}`).then(res => {
                let subcategories = res.data
                let element = $('#subcategory_id')
                // let upazila_element = $('#upazila_id').empty().append(`<option>Select a Thana</option>`).attr(
                //     'disabled', 'disabled')
                element.removeAttr('disabled')
                element.empty()
                element.append(`<option>Select a District</option>`)
                subcategories.map((subcategory, index) => {
                    // console.log(subcategory)
                    element.append(
                        `<option value="${subcategory.id}" ${selected == subcategory.id ?'selected' : ''}>${subcategory.subcategory_name}</option>`
                    )
                })
            })
        }

        $('#category_id').on('change', function() {
            getSubcategories($(this).val())
        })
</script>
@endpush
