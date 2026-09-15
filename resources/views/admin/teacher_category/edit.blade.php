@extends('admin.master')

@section('body')
<div class="container-fluid mt-3 mb-5">

    <div class="row g-4">
        
        <!-- Left: Edit Category Card -->
        <div class="col-lg-4">
            <div class="card border shadow-sm rounded-3">
                <div class="card-header bg-white py-3 border-bottom">
                    <h5 class="card-title mb-0 fw-bold" style="color: #1b4332;">
                        <i class="bi bi-pencil-square text-warning me-2"></i>ক্যাটাগরি সম্পাদনা
                    </h5>
                    <small class="text-secondary">{{ $category->name_bn }}</small>
                </div>
                <div class="card-body p-4" style="color: #212529;">
                    <form action="{{ route('teacher-categories.update', $category->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label class="form-label fw-bold" style="color: #212529;">ক্যাটাগরির নাম (বাংলা) <span class="text-danger">*</span></label>
                            <input type="text" name="name_bn" class="form-control" value="{{ old('name_bn', $category->name_bn) }}" required style="color: #212529;">
                            @error('name_bn')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold" style="color: #212529;">ক্যাটাগরির নাম (English)</label>
                            <input type="text" name="name_en" class="form-control" value="{{ old('name_en', $category->name_en) }}" style="color: #212529;">
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold" style="color: #212529;">ক্যাটাগরির নাম (العربية)</label>
                            <input type="text" name="name_ar" class="form-control" value="{{ old('name_ar', $category->name_ar) }}" style="color: #212529;">
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold" style="color: #212529;">স্লাগ (Slug)</label>
                            <input type="text" name="slug" class="form-control" value="{{ old('slug', $category->slug) }}" style="color: #212529;">
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold" style="color: #212529;">সাজানোর ক্রম (Serial / Order)</label>
                            <input type="number" name="order_level" class="form-control" value="{{ old('order_level', $category->order_level) }}" style="color: #212529;">
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold" style="color: #212529;">বিবরণ (ঐচ্ছিক)</label>
                            <textarea name="description" class="form-control" rows="2" style="color: #212529;">{{ old('description', $category->description) }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold" style="color: #212529;">স্ট্যাটাস</label>
                            <select name="status" class="form-select" style="color: #212529;">
                                <option value="1" {{ old('status', $category->status) == 1 ? 'selected' : '' }}>সক্রিয় (Active)</option>
                                <option value="0" {{ old('status', $category->status) === 0 ? 'selected' : '' }}>নিষ্ক্রিয় (Inactive)</option>
                            </select>
                        </div>

                        <div class="d-flex gap-2">
                            <a href="{{ route('teacher-categories.index') }}" class="btn btn-outline-secondary w-50 fw-bold">বাতিল</a>
                            <button type="submit" class="btn w-50 fw-bold text-white shadow-sm" style="background-color: #1b4332; border: 1px solid #1b4332;">
                                <i class="bi bi-check-lg me-1"></i> আপডেট করুন
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Right: Category List Table -->
        <div class="col-lg-8">
            <div class="card border shadow-sm rounded-3">
                <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center border-bottom">
                    <h5 class="card-title mb-0 fw-bold" style="color: #1b4332;">
                        <i class="bi bi-folder2-open text-success me-2"></i>ক্যাটাগরি তালিকা
                    </h5>
                    <a href="{{ route('teacher-categories.index') }}" class="btn btn-outline-success btn-sm fw-bold">
                        <i class="bi bi-plus-lg me-1"></i> নতুন ক্যাটাগরি তৈরি
                    </a>
                </div>

                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover table-striped align-middle mb-0" style="color: #212529;">
                            <thead style="background-color: #e9ecef; color: #212529;">
                                <tr>
                                    <th class="text-center fw-bold" style="width: 60px;">ক্রম</th>
                                    <th class="fw-bold">ক্যাটাগরির নাম</th>
                                    <th class="fw-bold">স্লাগ (Slug)</th>
                                    <th class="text-center fw-bold" style="width: 110px;">শিক্ষক সংখ্যা</th>
                                    <th class="text-center fw-bold" style="width: 100px;">স্ট্যাটাস</th>
                                    <th class="text-center fw-bold" style="width: 120px;">অ্যাকশন</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($categories as $cat)
                                    <tr class="{{ $cat->id == $category->id ? 'table-warning' : '' }}">
                                        <td class="text-center fw-bold">{{ $cat->order_level }}</td>
                                        <td>
                                            <strong class="d-block" style="color: #1b4332;">{{ $cat->name_bn }}</strong>
                                            <small class="text-muted">{{ $cat->name_en }}</small>
                                        </td>
                                        <td><code>{{ $cat->slug }}</code></td>
                                        <td class="text-center">
                                            <span class="badge bg-light text-dark border">{{ $cat->teachers_count }} জন</span>
                                        </td>
                                        <td class="text-center">
                                            @if($cat->status == 1)
                                                <span class="badge bg-success text-white">সক্রিয়</span>
                                            @else
                                                <span class="badge bg-danger text-white">নিষ্ক্রিয়</span>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <div class="btn-group btn-group-sm">
                                                <a href="{{ route('teacher-categories.edit', $cat->id) }}" class="btn btn-warning text-dark fw-bold">
                                                    <i class="bi bi-pencil-square"></i>
                                                </a>
                                                <form action="{{ route('teacher-categories.destroy', $cat->id) }}" method="POST" class="d-inline" onsubmit="return confirm('মুছে ফেলতে চান?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">
                                                        <i class="bi bi-trash-fill"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
@endsection
