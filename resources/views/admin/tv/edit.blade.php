@extends('admin.master')
@section('title')
    Tv Edit
@endsection

@push('admin_style')
@include('admin.common.style')
@endpush

@section('body')
    <div class="row mt-2">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form class="form-horizontal" action="{{ route('tvs.update', $tv->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <h3>Tv Information Update</h3>
                        <div class="row">
                            {{-- <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="category_id" class="form-label">Category <span
                                            class="text-danger">*</span></label>
                                    <select id="category_id" name="category_id"
                                        class="form-select" disabled>
                                        <option value="1">Select a Category</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                @if ($category->id == $audio->category_id)
                                                selected
                                            @endif>{{ $category->category_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="subcategory_id" class="form-label">Subcategory <span
                                            class="text-danger">*</span></label>
                                    <select id="subcategory_id" name="subcategory_id"
                                        class="form-select" disabled>
                                        <option value="1">Select a Subcategory</option>
                                        @foreach ($subcategories as $subcategory)
                                            <option value="{{ $category->id }}"
                                                @if ($subcategory->id == $audio->subcategory_id)
                                                selected
                                            @endif>{{ $subcategory->subcategory_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div> --}}
                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <label for="title_en">Tv Title (EN)</label>
                                    <input type="text" name="title_en" class="form-control @error('title_en')
                                    is-invalid
                                @enderror" value="{{ $tv->title_en }}">
                                    @error('title_en')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="title_bn">Tv Title (BN)</label>
                                    <input type="text" name="title_bn" class="form-control @error('title_bn')
                                    is-invalid
                                @enderror" value="{{ $tv->title_bn }}">
                                    @error('title_bn')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="title_ab">Tv Title (AB)</label>
                                    <input type="text" name="title_ab" class="form-control @error('title_ab')
                                    is-invalid
                                @enderror" value="{{ $tv->title_ab }}">
                                    @error('title_ab')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Embed File</label>
                                    <textarea class="editor form-control" col="10" rows="3" name="embed_video">{{ $tv->embed_video }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Video Upload</label>
                                    <input type="file" class="form-control @error('file_upload')
                                is-invalid
                            @enderror" name="file_upload">
                            @error('file_upload')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                @if($tv->file_upload && file_exists(public_path('file_upload/' . $tv->file_upload)))
                                    <video controls width="560">
                                        <source src="{{ asset('file_upload/' . $tv->file_upload) }}" type="video/{{ pathinfo($tv->file_upload, PATHINFO_EXTENSION) }}">
                                        Your browser does not support the video element.
                                    </video>
                                @else
                                No video   
                                @endif
                            </div>
                        </div>
                        
                        <div class="table-responsive">
                            <button type="submit" class="btn btn-success">Update</button>
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
