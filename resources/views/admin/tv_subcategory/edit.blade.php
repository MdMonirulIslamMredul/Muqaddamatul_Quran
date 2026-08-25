@extends('admin.master')
@section('title')
    Subcategory Edit
@endsection

@push('admin_style')
@include('admin.common.style')
@endpush

@section('body')
    <div class="row mt-2">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form class="form-horizontal" action="{{ route('tvsubcategories.update', $subcategory->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <h3>Subcategory Information Update</h3>
                        <div class="form-group mb-3">
                            <label for="category_id" class="form-label mb-2">Select Category</label>
                            <select id="defaultSelect" name="category_id"
                                class="form-select
                            @error('category_id')
                                is-invalid
                            @enderror">
                                <option selected>Choose a Category</option>
                                @forelse ($categories as $category)
                                    <option value="{{ $category->id }}" @if($subcategory->category_id == $category->id)
                                        selected
                                    @endif>{{ $category->category_name }}</option>
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
                        @enderror" value="{{ $subcategory->subcategory_name }}">
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
                        @enderror" value="{{ $subcategory->subcategory_name_ban }}">
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
                        @enderror" value="{{ $subcategory->subcategory_name_ab }}">
                            @error('subcategory_name_ab')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
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
@include('admin.common.script')
@endpush
