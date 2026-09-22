@extends('admin.master')
@section('title')
    Category
@endsection

@push('admin_style')
@include('admin.common.style')
@endpush

@section('body')
    <div class="row mt-2">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form class="form-horizontal" action="{{ route('bookcategories.store') }}" method="POST">
                        @csrf
                        <h3>Category Information</h3>
                        <div class="form-group mb-3">
                            <label for="category_name">Category Name (EN)</label>
                            <input type="text" name="category_name" class="form-control @error('category_name')
                            is-invalid
                        @enderror" value="{{ old('category_name') }}">
                            @error('category_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="category_name_ban">Category Name (BN)</label>
                            <input type="text" name="category_name_ban" class="form-control @error('category_name_ban')
                            is-invalid
                        @enderror" value="{{ old('category_name_ban') }}">
                            @error('category_name_ban')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="category_name_ab">Category Name (AB)</label>
                            <input type="text" name="category_name_ab" class="form-control @error('category_name_ab')
                            is-invalid
                        @enderror" value="{{ old('category_name_ab') }}">
                            @error('category_name_ab')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
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
                        <th data-priority="5">Last Updated</th>
                        <th data-priority="2">Category Name (EN)</th>
                        <th data-priority="4">Category Name (BN)</th>
                        <th data-priority="6">Category Name (AB)</th>
                        <th data-priority="3">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($categories as $key => $category)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $category->updated_at->format('d-M-Y') }}</td>
                            <td>{{ $category->category_name??null }}</td>
                            <td>{{ $category->category_name_ban??null }}</td>
                            <td>{{ $category->category_name_ab??null }}</td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div>
                                        <a href="{{ route('bookcategories.edit', $category->id) }}"
                                            class="action-btn bs-tooltip me-1" data-toggle="tooltip"
                                            data-placement="top" title="" data-bs-original-title="Edit">
                                            <i class="fa-regular fa-pen-to-square text-info"></i>
                                        </a>
                                    </div>
                                    <div>
                                        <form action="{{ route('bookcategories.destroy', $category->id) }}" method="POST">
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
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script type="text/javascript">
        tinymce.init({
            selector: 'textarea#default'
        });
    </script>
@endsection

@push('admin_script')
@include('admin.common.script')
<script>
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
                { responsivePriority: 2, targets: 2 },
                { responsivePriority: 3, targets: 5 },
                { responsivePriority: 4, targets: 3 },
                { responsivePriority: 5, targets: 1 },
                { responsivePriority: 6, targets: 4 }
            ]
        });
    });
</script>
@endpush
