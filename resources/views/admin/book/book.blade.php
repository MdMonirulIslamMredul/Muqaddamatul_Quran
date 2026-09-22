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
                                        class="form-select @error('category_id') is-invalid @enderror">
                                        <option value="">Select a Category</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->category_name_ban ? $category->category_name_ban . ' (' . $category->category_name . ')' : $category->category_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="subcategory_id" class="form-label">Subcategory <span
                                            class="text-muted font-weight-normal">(Optional)</span></label>
                                    <select id="subcategory_id" name="subcategory_id"
                                        class="form-control" disabled>
                                        <option value="">Select a Subcategory (Optional)</option>
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
                <table id="config-table" class="table display table-striped border">
                    <thead>
                    <tr>
                        <th data-priority="1">List</th>
                        <th data-priority="2">Title</th>
                        <th data-priority="4">Category</th>
                        <th data-priority="5">Subcategory</th>
                        <th data-priority="6">Book Image</th>
                        {{-- <th>Last Updated</th> --}}
                        <th data-priority="3">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($books as $key => $book)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $book->title_en??null }}</td>
                            <td>{{ $book->bookCategory->category_name_ban ?? $book->bookCategory->category_name ?? '-' }}</td>
                            <td>
                                @if($book->bookSubcategory)
                                    <span class="badge bg-light text-dark border">{{ $book->bookSubcategory->subcategory_name_ban ?? $book->bookSubcategory->subcategory_name }}</span>
                                @else
                                    <span class="text-muted">—</span>
                                @endif
                            </td>
                            <td>
                                <img src="{{ asset('book_image') }}/{{ $book->book_image }}" style="height: 100px">
                            </td>
                            {{-- <td>{{ $book->updated_at->format('d-M-Y') }}</td> --}}
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
    // Override the global #config-table DataTable init with a proper responsive setup
    $(document).ready(function () {
        if ($.fn.DataTable.isDataTable('#config-table')) {
            $('#config-table').DataTable().destroy();
        }
        $('#config-table').DataTable({
            responsive: {
                details: {
                    display: $.fn.dataTable.Responsive.display.childRowImmediate,
                    type: 'none',
                    target: ''
                }
            },
            columnDefs: [
                { responsivePriority: 1, targets: 0 },
                { responsivePriority: 2, targets: 1 },
                { responsivePriority: 3, targets: 5 },
                { responsivePriority: 4, targets: 2 },
                { responsivePriority: 5, targets: 3 },
                { responsivePriority: 6, targets: 4 }
            ]
        });
    });
</script>
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

    // Auto-populate on load if old value exists
    $(document).ready(function() {
        let initialCat = $('#category_id').val();
        if (initialCat) {
            getBookSubcategory(initialCat, "{{ old('subcategory_id') }}");
        }
    });
</script>
@endpush
