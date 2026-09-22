@extends('admin.master')
@section('title')
    Book Edit
@endsection

@push('admin_style')
@include('admin.common.style')
@endpush

@section('body')
    <div class="row mt-2">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h3>Book Information Update</h3>
                        <a href="{{ route('books.index') }}" class="btn btn-outline-secondary btn-sm">
                            <i class="fa-solid fa-arrow-left me-1"></i> Back to List
                        </a>
                    </div>

                    <form class="form-horizontal" action="{{ route('books.update', $book->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="category_id" class="form-label">Category <span
                                            class="text-danger">*</span></label>
                                    <select id="category_id" name="category_id"
                                        class="form-select @error('category_id') is-invalid @enderror">
                                        <option value="">Select a Category</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}" @if($book->category_id == $category->id) selected @endif>
                                                {{ $category->category_name_ban ? $category->category_name_ban . ' (' . $category->category_name . ')' : $category->category_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="subcategory_id" class="form-label">Subcategory <span
                                            class="text-muted font-weight-normal">(Optional)</span></label>
                                    <select id="subcategory_id" name="subcategory_id"
                                        class="form-control @error('subcategory_id') is-invalid @enderror">
                                        <option value="">Select a Subcategory (Optional)</option>
                                    </select>
                                    @error('subcategory_id')
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <label for="title_en">Book Title (EN)</label>
                                    <input type="text" name="title_en" class="form-control @error('title_en') is-invalid @enderror" value="{{ old('title_en', $book->title_en) }}">
                                    @error('title_en')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="title_bn">Book Title (BN)</label>
                                    <input type="text" name="title_bn" class="form-control @error('title_bn') is-invalid @enderror" value="{{ old('title_bn', $book->title_bn) }}">
                                    @error('title_bn')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="title_ab">Book Title (AB)</label>
                                    <input type="text" name="title_ab" class="form-control @error('title_ab') is-invalid @enderror" value="{{ old('title_ab', $book->title_ab) }}">
                                    @error('title_ab')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <label>Book Details (EN)</label>
                                    <textarea class="editor form-control" rows="4" name="des_en">{{ old('des_en', $book->des_en) }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <label>Book Details (BN)</label>
                                    <textarea class="editor form-control" rows="4" name="des_bn">{{ old('des_bn', $book->des_bn) }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <label>Book Details (AB)</label>
                                    <textarea class="editor form-control" rows="4" name="des_ab">{{ old('des_ab', $book->des_ab) }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label>Book Cover Image</label>
                                    <input type="file" class="form-control" name="book_image" accept="image/*">
                                    @if($book->book_image && file_exists(public_path('book_image/' . $book->book_image)))
                                        <div class="mt-2">
                                            <img src="{{ asset('book_image/' . $book->book_image) }}" style="height: 120px; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.15);">
                                            <small class="text-muted d-block mt-1">{{ $book->book_image }}</small>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label>Book PDF File</label>
                                    <input type="file" class="form-control" name="pdf_file" accept=".pdf">
                                    @if($book->pdf_file && file_exists(public_path('pdf_file/' . $book->pdf_file)))
                                        <div class="mt-2">
                                            <a href="{{ asset('pdf_file/' . $book->pdf_file) }}" target="_blank" class="btn btn-sm btn-outline-primary">
                                                <i class="fa-solid fa-file-pdf me-1"></i> Current PDF: {{ $book->pdf_file }}
                                            </a>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="table-responsive mt-3">
                            <button type="submit" class="btn btn-success px-4">Update Book</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('admin_script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.2.2/axios.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/7.1.1/tinymce.min.js" referrerpolicy="origin"></script>
<script type="text/javascript">
    if (typeof tinymce !== 'undefined') {
        tinymce.init({
            selector: 'textarea.editor',
            height: 200,
            menubar: false,
            plugins: 'advlist autolink lists link image charmap preview anchor searchreplace visualblocks code fullscreen insertdatetime media table',
            toolbar: 'undo redo | formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat'
        });
    }
</script>
@include('admin.common.script')
<script>
    const getBookSubcategory = (category_id, selected = null) => {
        if (!category_id) {
            let element = $('#subcategory_id');
            element.empty().append('<option value="">Select a Subcategory (Optional)</option>').attr('disabled', 'disabled');
            return;
        }
        axios.get(`${window.location.origin}/get-booksubcategories/${category_id}`).then(res => {
            let subcategories = res.data;
            let element = $('#subcategory_id');
            element.removeAttr('disabled');
            element.empty();
            element.append('<option value="">Select a Subcategory (Optional)</option>');
            subcategories.map((subcategory) => {
                let displayName = subcategory.subcategory_name_ban ? `${subcategory.subcategory_name_ban} (${subcategory.subcategory_name})` : subcategory.subcategory_name;
                element.append(
                    `<option value="${subcategory.id}" ${selected == subcategory.id ? 'selected' : ''}>${displayName}</option>`
                );
            });
        }).catch(err => {
            console.error(err);
        });
    };

    $('#category_id').on('change', function() {
        getBookSubcategory($(this).val());
    });

    // Populate subcategories on page load for the existing book
    $(document).ready(function() {
        let initialCat = "{{ old('category_id', $book->category_id) }}";
        let initialSub = "{{ old('subcategory_id', $book->subcategory_id) }}";
        if (initialCat) {
            getBookSubcategory(initialCat, initialSub);
        }
    });
</script>
@endpush
