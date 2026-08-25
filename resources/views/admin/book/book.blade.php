@extends('admin.master')
@section('title')
    Book
@endsection

@push('admin_style')
@include('admin.common.style')
@endpush

@section('body')
    <div class="row mt-2">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form class="form-horizontal" action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <h3>Book Information</h3>
                        <div class="row">
                            <div class="col-md-6">
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
                            </div>
                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <label for="title_en"> Title (EN)</label>
                                    <input type="text" name="title_en" class="form-control @error('title_en')
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
                                    <label for="title_bn">Title (BN)</label>
                                    <input type="text" name="title_bn" class="form-control @error('title_bn')
                                    is-invalid
                                @enderror" value="{{ old('title_bn') }}">
                                    @error('title_bn')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="title_ab"> Title (AB)</label>
                                    <input type="text" name="title_ab" class="form-control @error('title_ab')
                                    is-invalid
                                @enderror" value="{{ old('title_ab') }}">
                                    @error('title_ab')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label> Details (EN)</label>
                                    <textarea  id="tinymce" class="editor form-control" col="10" row="3" name="des_en"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label> Details (BN)</label>
                                    <textarea  id="tinymce" class="editor form-control" col="10" row="3" name="des_bn"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Details (AB)</label>
                                    <textarea  id="tinymce" class="editor form-control" col="10" row="3" name="des_ab"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label> thumbnail</label>
                                    <input type="file" class="form-control" name="book_image">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label> PDF</label>
                                    <input type="file" class="form-control" name="pdf_file">
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

    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <table id="config-table" class="table display table-striped border no-wrap">
                    <thead>
                    <tr>
                        <th>List</th>
                        <th>Last Updated</th>
                        <th>Category</th>
                        <th>Subcategory</th>
                        <th>Book Image</th>
                        <th>Title</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($books as $key => $book)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $book->updated_at->format('d-M-Y') }}</td>
                            <td>{{ $book->bookCategory->category_name??null }}</td>
                            <td>{{ $book->bookSubcategory->subcategory_name??null }}</td>
                            <td>
                                <img src="{{ asset('book_image') }}/{{ $book->book_image }}" style="height: 100px">
                            </td>
                            <td>{{ $book->title_en??null }}</td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div>
                                        <a href="{{ route('books.show', $book->id) }}"
                                            class="text-success me-2" data-toggle="tooltip"
                                            data-placement="top" data-bs-original-title="View">
                                            <i class="fa-solid fa-eye"></i>
                                        </a>
                                    </div>
                                    <div>
                                        <a href="{{ route('books.edit', $book->id) }}"
                                            class="action-btn bs-tooltip me-1" data-toggle="tooltip"
                                            data-placement="top" title="" data-bs-original-title="Edit">
                                            <i class="fa-regular fa-pen-to-square text-info"></i>
                                        </a>
                                    </div>
                                    <div>
                                        <form action="{{ route('books.destroy', $book->id) }}" method="POST">
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
        const getBookSubcategory = (category_id, selected = null) => {
            axios.get(`${window.location.origin}/get-booksubcategories/${category_id}`).then(res => {
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
            getBookSubcategory($(this).val())
        })
</script>
@endpush
