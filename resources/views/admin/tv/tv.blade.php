@extends('admin.master')
@section('title')
    Tv
@endsection

@push('admin_style')
@include('admin.common.style')
@endpush

@section('body')
    <div class="row mt-2">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form class="form-horizontal" action="{{ route('tvs.update',$tv->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <h3>Tv Information</h3>
                        <div class="row">
                            {{-- <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="category_id" class="form-label">Category <span
                                            class="text-danger">*</span></label>
                                    <select id="category_id" name="category_id"
                                        class="form-select">
                                        <option value="1">Select a Category</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="subcategory_id" class="form-label">Subcategory <span
                                            class="text-danger">*</span></label>
                                    <select id="subcategory_id" name="subcategory_id"
                                        class="form-control" disabled>
                                        <option value="">Select a Subcategory</option>
                                    </select>
                                </div>
                            </div> --}}
                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <label for="title_en">Title (EN)</label>
                                    <input type="text" name="title_en" value="{{ $tv->title_en }}" class="form-control @error('title_en')
                                    is-invalid
                                @enderror" value="{{ old('title_en') }}">
                                    @error('title_en')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <label for="title_bn">Title (BN)</label>
                                    <input type="text" name="title_bn" value="{{ $tv->title_bn }}" class="form-control @error('title_bn')
                                    is-invalid
                                @enderror" value="{{ old('title_bn') }}">
                                    @error('title_bn')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group">
                                <label> short Details(EN)</label>
                                <textarea   class="editor form-control" col="10" row="6" name="short_details_en">{{ $tv->short_details_en }}</textarea>
                            </div>
                            <div class="form-group">
                                <label> short Details(BN)</label>
                                <textarea   class="editor form-control" col="10" row="5" name="short_details_bn">{{ $tv->short_details_bn }}</textarea>
                            </div>

                            <div class="form-group">
                                <label> Details(EN)</label>
                                <textarea  id="tinymce" class="editor form-control" col="10" row="3" name="details_en">{{ $tv->details_en }}</textarea>
                            </div>
                            <div class="form-group">
                                <label> Details(BN)</label>
                                <textarea  id="tinymce" class="editor form-control" col="10" row="3" name="details_bn">{{ $tv->details_bn }}</textarea>
                            </div>


                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Embed File</label>
                                    <textarea class="editor form-control" col="10" rows="3" name="embed_video">{{ $tv->embed_video}}</textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Upload Video</label>
                                    <input type="file" class="form-control" name="file_upload">
                                    @if(isset($tv->file_upload))
                                        <video width="320" height="240" controls>
                                            <source src="{{ asset('file_upload/' . $tv->file_upload) }}" type="video/mp4">
                                            Your browser does not support the video tag.
                                        </video>
                                    @endif
                                </div>
                            </div>

                        </div>
                        <div class="table-responsive">
                            <button type="submit" class="btn btn-info">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

     {{-- <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <table id="config-table" class="table display table-striped border no-wrap">
                    <thead>
                    <tr>
                        <th>List</th>
                        <th>Last Updated</th>
                        <th>Category</th>
                        <th>Subcategory</th>
                        <th>Title</th>

                        <th>Upload File</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($tvs as $key => $tv)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $tv->updated_at->format('d-M-Y') }}</td>
                            <td>{{ $tv->tvCategory->category_name??null }}</td>
                            <td>{{ $tv->tvSubcategory->subcategory_name??null }}</td>
                            <td>{{ $tv->title_en??null }}</td>

                            <td>
                                @if($tv->file_upload && file_exists(public_path('file_upload/' . $tv->file_upload)))
                                    <video controls width="560">
                                        <source src="{{ asset('file_upload/' . $tv->file_upload) }}" type="video/{{ pathinfo($tv->file_upload, PATHINFO_EXTENSION) }}">
                                        Your browser does not support the video element.
                                    </video>
                                @else
                                    <p>{!! $tv->embed_video??null !!}</p>
                                @endif
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div>
                                        <a href="{{ route('tvs.show', $tv->id) }}"
                                            class="text-success me-2" data-toggle="tooltip"
                                            data-placement="top" data-bs-original-title="View">
                                            <i class="fa-solid fa-eye"></i>
                                        </a>
                                    </div>
                                    <div>
                                        <a href="{{ route('tvs.edit', $tv->id) }}"
                                            class="action-btn bs-tooltip me-1" data-toggle="tooltip"
                                            data-placement="top" title="" data-bs-original-title="Edit">
                                            <i class="fa-regular fa-pen-to-square text-info"></i>
                                        </a>
                                    </div>
                                    <div>
                                        <form action="{{ route('tvs.destroy', $tv->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="action-btn bs-tooltip btn_custom show_confirm"
                                                data-toggle="tooltip" data-placement="top" title=""
                                                data-bs-original-title="Delete"><i
                                                    class="fa-solid fa-trash-can text-warning"></i></button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>

                </table>
            </div>
        </div>
    </div>  --}}

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
        const getTvSubcategory = (category_id, selected = null) => {
            axios.get(`${window.location.origin}/get-tvsubcategories/${category_id}`).then(res => {
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
            getTvSubcategory($(this).val())
        })
</script>
@endpush
