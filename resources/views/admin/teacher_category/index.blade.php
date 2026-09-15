@extends('admin.master')

@section('body')
<div class="container-fluid mt-3 mb-5">

    <!-- Messages -->
    @if(session('message'))
        <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert" style="background-color: #d1e7dd; color: #0f5132; border-color: #badbcc;">
            <i class="bi bi-check-circle-fill me-2"></i> {{ session('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="row g-4">
        
        <!-- Left: Add New Category Card -->
        <div class="col-lg-4">
            <div class="card border shadow-sm rounded-3">
                <div class="card-header bg-white py-3 border-bottom">
                    <h5 class="card-title mb-0 fw-bold" style="color: #1b4332;">
                        <i class="bi bi-plus-circle-fill text-success me-2"></i>নতুন ক্যাটাগরি তৈরি করুন
                    </h5>
                    <small class="text-secondary">শিক্ষকদের বিভাগ বা স্তর অনুযায়ী গ্রুপ তৈরি করুন</small>
                </div>
                <div class="card-body p-4" style="color: #212529;">
                    <form action="{{ route('teacher-categories.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label fw-bold" style="color: #212529;">ক্যাটাগরির নাম (বাংলা) <span class="text-danger">*</span></label>
                            <input type="text" name="name_bn" class="form-control" placeholder="যেমনঃ হিফজুল কুরআন বিভাগ" value="{{ old('name_bn') }}" required style="color: #212529;">
                            @error('name_bn')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold" style="color: #212529;">ক্যাটাগরির নাম (English)</label>
                            <input type="text" name="name_en" class="form-control" placeholder="e.g. Hifzul Quran Department" value="{{ old('name_en') }}" style="color: #212529;">
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold" style="color: #212529;">ক্যাটাগরির নাম (العربية)</label>
                            <input type="text" name="name_ar" class="form-control" placeholder="مثال: قسم تحفيظ القرآن الكريم" value="{{ old('name_ar') }}" style="color: #212529;">
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold" style="color: #212529;">সাজানোর ক্রম (Serial / Order)</label>
                            <input type="number" name="order_level" class="form-control" placeholder="0, 1, 2..." value="{{ old('order_level', 0) }}" style="color: #212529;">
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold" style="color: #212529;">বিবরণ (ঐচ্ছিক)</label>
                            <textarea name="description" class="form-control" rows="2" placeholder="ক্যাটাগরির সংক্ষিপ্ত বিবরণ..." style="color: #212529;">{{ old('description') }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold" style="color: #212529;">স্ট্যাটাস</label>
                            <select name="status" class="form-select" style="color: #212529;">
                                <option value="1" {{ old('status', 1) == 1 ? 'selected' : '' }}>সক্রিয় (Active)</option>
                                <option value="0" {{ old('status') === '0' ? 'selected' : '' }}>নিষ্ক্রিয় (Inactive)</option>
                            </select>
                        </div>

                        <button type="submit" class="btn w-100 fw-bold text-white shadow-sm py-2" style="background-color: #1b4332; border: 1px solid #1b4332;">
                            <i class="bi bi-save me-1"></i> ক্যাটাগরি সংরক্ষণ করুন
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Right: Category List Table -->
        <div class="col-lg-8">
            <div class="card border shadow-sm rounded-3">
                <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center border-bottom">
                    <div>
                        <h5 class="card-title mb-0 fw-bold" style="color: #1b4332;">
                            <i class="bi bi-folder2-open text-success me-2"></i>শিক্ষক ক্যাটাগরি তালিকা (Teacher Categories)
                        </h5>
                        <small class="text-secondary">মোট ক্যাটাগরি: {{ $categories->total() }} টি</small>
                    </div>
                    <div>
                        <a href="{{ route('teachers.index') }}" class="btn btn-outline-dark btn-sm fw-bold shadow-sm">
                            <i class="bi bi-people-fill me-1"></i> সকল শিক্ষক দেখুন
                        </a>
                    </div>
                </div>

                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover table-striped align-middle mb-0" style="color: #212529;">
                            <thead style="background-color: #e9ecef; color: #212529;">
                                <tr>
                                    <th class="text-center fw-bold" style="width: 60px; color: #212529;">ক্রম</th>
                                    <th class="fw-bold" style="color: #212529;">ক্যাটাগরির নাম (বাংলা ও ইংরেজি)</th>
                                    <th class="fw-bold" style="color: #212529;">স্লাগ (Slug)</th>
                                    <th class="text-center fw-bold" style="width: 110px; color: #212529;">শিক্ষক সংখ্যা</th>
                                    <th class="text-center fw-bold" style="width: 100px; color: #212529;">স্ট্যাটাস</th>
                                    <th class="text-center fw-bold" style="width: 120px; color: #212529;">অ্যাকশন</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($categories as $cat)
                                    <tr>
                                        <td class="text-center fw-bold" style="color: #495057;">{{ $cat->order_level }}</td>
                                        <td>
                                            <strong class="d-block" style="color: #1b4332; font-size: 15px;">{{ $cat->name_bn }}</strong>
                                            @if($cat->name_en)
                                                <small class="fw-semibold" style="color: #495057;">{{ $cat->name_en }}</small>
                                            @endif
                                            @if($cat->name_ar)
                                                <small class="d-block text-muted" dir="rtl">{{ $cat->name_ar }}</small>
                                            @endif
                                        </td>
                                        <td>
                                            <code class="text-primary bg-light px-2 py-1 rounded border">{{ $cat->slug }}</code>
                                        </td>
                                        <td class="text-center">
                                            <a href="{{ route('teachers.index', ['category_id' => $cat->id]) }}" class="badge rounded-pill fw-bold text-decoration-none px-3 py-2" style="background-color: #e8f5e9; color: #1b4332; border: 1px solid #c8e6c9; font-size: 13px;">
                                                <i class="bi bi-people me-1"></i> {{ $cat->teachers_count }} জন
                                            </a>
                                        </td>
                                        <td class="text-center">
                                            @if($cat->status == 1)
                                                <span class="badge bg-success text-white fw-bold px-2 py-1">সক্রিয়</span>
                                            @else
                                                <span class="badge bg-danger text-white fw-bold px-2 py-1">নিষ্ক্রিয়</span>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <div class="btn-group btn-group-sm shadow-sm" role="group">
                                                <a href="{{ route('teacher-categories.edit', $cat->id) }}" class="btn btn-warning text-dark fw-bold" title="এডিট করুন">
                                                    <i class="bi bi-pencil-square"></i>
                                                </a>
                                                <form action="{{ route('teacher-categories.destroy', $cat->id) }}" method="POST" class="d-inline" onsubmit="return confirm('আপনি কি নিশ্চিত যে এই ক্যাটাগরি মুছে ফেলতে চান?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger" title="মুছে ফেলুন">
                                                        <i class="bi bi-trash-fill"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center py-5 text-secondary">
                                            <i class="bi bi-folder-x fs-1 d-block mb-2 text-muted"></i>
                                            <h5 class="fw-bold" style="color: #495057;">কোনো শিক্ষক ক্যাটাগরি তৈরি করা হয়নি</h5>
                                            <p class="small mb-0" style="color: #6c757d;">বাম পাশের ফর্ম থেকে নতুন ক্যাটাগরি যুক্ত করুন।</p>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    @if($categories->hasPages())
                        <div class="card-footer bg-white py-3 border-top">
                            {{ $categories->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>

    </div>

</div>
@endsection
