@extends('admin.master')
@section('title')
    Subcategory
@endsection

@push('admin_style')
@include('admin.common.style')
@endpush

@section('body')
    <div class="row mt-2">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form class="form-horizontal" action="{{ route('tvsubcategories.store') }}" method="POST">
                        @csrf
                        <h3>Subcategory Information</h3>
                        <div class="form-group mb-3">
                            <label for="category_id" class="form-label mb-2">Select Category</label>
                            <select id="defaultSelect" name="category_id"
                                class="form-select
                            @error('category_id')
                                is-invalid
                            @enderror">
                                <option selected>Choose a Category</option>
                                @forelse ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                @empty
                                @endforelse
                            </select>
                            @error('category_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="subcategory_name">Subcategory Name (EN)</label>
                            <input type="text" name="subcategory_name" class="form-control @error('subcategory_name')
                            is-invalid
                        @enderror" value="{{ old('subcategory_name') }}">
                            @error('subcategory_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="subcategory_name_ban">Subcategory Name (BN)</label>
                            <input type="text" name="subcategory_name_ban" class="form-control @error('subcategory_name_ban')
                            is-invalid
                        @enderror" value="{{ old('subcategory_name_ban') }}">
                            @error('subcategory_name_ban')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="subcategory_name_ab">Subcategory Name (AB)</label>
                            <input type="text" name="subcategory_name_ab" class="form-control @error('subcategory_name_ab')
                            is-invalid
                        @enderror" value="{{ old('subcategory_name_ab') }}">
                            @error('subcategory_name_ab')
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
                <table id="config-table" class="table display table-striped border no-wrap">
                    <thead>
                    <tr>
                        <th>List</th>
                        <th>Last Updated</th>
                        <th>Category Name</th>
                        <th>Subcategory Name (EN)</th>
                        <th>Subcategory Name (BN)</th>
                        <th>Subcategory Name (AB)</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($subcategories as $key => $subcategory)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $subcategory->updated_at->format('d-M-Y') }}</td>
                            <td>{{ $subcategory->tvCategory->category_name??null }}</td>
                            <td>{{ $subcategory->subcategory_name??null }}</td>
                            <td>{{ $subcategory->subcategory_name_ban??null }}</td>
                            <td>{{ $subcategory->subcategory_name_ab??null }}</td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div>
                                        <a href="{{ route('tvsubcategories.edit', $subcategory->id) }}"
                                            class="action-btn bs-tooltip me-1" data-toggle="tooltip"
                                            data-placement="top" title="" data-bs-original-title="Edit">
                                            <i class="fa-regular fa-pen-to-square text-info"></i>
                                        </a>
                                    </div>
                                    <div>
                                        <form action="{{ route('tvsubcategories.destroy', $subcategory->id) }}" method="POST">
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
@include('admin.common.script')
@endpush
