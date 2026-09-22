@extends('admin.master')

@section('title')
    Book Details - {{ $book->title_bn ?? $book->title_en }}
@endsection

@push('admin_style')
@include('admin.common.style')
<style>
    .book-detail-cover {
        width: 100%;
        max-width: 280px;
        height: 380px;
        object-fit: cover;
        border-radius: 12px;
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.15);
    }
    .lang-pill {
        display: inline-block;
        font-size: 11px;
        font-weight: 700;
        padding: 3px 8px;
        border-radius: 4px;
        margin-right: 6px;
    }
    .lang-bn { background-color: #e8f5e9; color: #2e7d32; }
    .lang-en { background-color: #e3f2fd; color: #1565c0; }
    .lang-ab { background-color: #fff3e0; color: #e65100; }
</style>
@endpush

@section('body')
<div class="container-fluid mt-3 mb-5">
    <div class="card border shadow-sm rounded-3">
        <div class="card-header bg-white py-3 d-flex flex-wrap justify-content-between align-items-center border-bottom">
            <div>
                <h4 class="card-title mb-0 fw-bold" style="color: #1b4332;">
                    <i class="fa-solid fa-book-open text-success me-2"></i>বইয়ের বিস্তারিত বিবরণ
                </h4>
                <small class="text-dark fw-semibold" style="color: #475569;">
                    {{ $book->bookCategory->category_name_ban ?? $book->bookCategory->category_name ?? 'ক্যাটাগরি নেই' }}
                    @if($book->bookSubcategory)
                        &raquo; {{ $book->bookSubcategory->subcategory_name_ban ?? $book->bookSubcategory->subcategory_name }}
                    @endif
                </small>
            </div>
            <div class="d-flex gap-2 mt-2 mt-md-0">
                <a href="{{ route('book.details', $book->id) }}" target="_blank" class="btn btn-outline-success btn-sm fw-bold shadow-sm">
                    <i class="fa-solid fa-globe me-1"></i> ওয়েবসাইটে দেখুন
                </a>
                <a href="{{ route('books.edit', $book->id) }}" class="btn btn-warning btn-sm fw-bold text-dark shadow-sm">
                    <i class="fa-regular fa-pen-to-square me-1"></i> তথ্য সম্পাদনা
                </a>
                <a href="{{ route('books.index') }}" class="btn btn-outline-secondary btn-sm fw-bold shadow-sm">
                    <i class="fa-solid fa-arrow-left me-1"></i> তালিকায় ফিরে যান
                </a>
            </div>
        </div>

        <div class="card-body p-4">
            <div class="row g-4">
                <!-- Left Column: Book Cover & Actions -->
                <div class="col-lg-4 text-center">
                    <div class="card border shadow-sm rounded-3 p-4 bg-light">
                        <div class="mb-3 text-center">
                            @if($book->book_image && file_exists(public_path('book_image/' . $book->book_image)))
                                <img src="{{ asset('book_image/' . $book->book_image) }}" alt="{{ $book->title_bn }}" class="book-detail-cover">
                            @else
                                <div class="book-detail-cover d-inline-flex align-items-center justify-content-center bg-white text-muted">
                                    <i class="fa-solid fa-book fa-4x text-muted"></i>
                                </div>
                            @endif
                        </div>

                        <h5 class="fw-bold mb-1" style="color: #1b4332;">{{ $book->title_bn ?? $book->title_en }}</h5>
                        @if($book->title_en && $book->title_bn)
                            <small class="text-muted d-block mb-2">{{ $book->title_en }}</small>
                        @endif

                        <div class="border-top pt-3 text-start">
                            <p class="mb-2">
                                <strong>ক্যাটাগরি:</strong>
                                <span class="badge bg-success">{{ $book->bookCategory->category_name_ban ?? 'N/A' }}</span>
                                <small class="text-muted">({{ $book->bookCategory->category_name ?? '' }})</small>
                            </p>
                            @if($book->bookSubcategory)
                            <p class="mb-2">
                                <strong>সাবক্যাটাগরি:</strong>
                                <span class="badge bg-info text-dark">{{ $book->bookSubcategory->subcategory_name_ban ?? $book->bookSubcategory->subcategory_name }}</span>
                                @if($book->bookSubcategory->subcategory_name && $book->bookSubcategory->subcategory_name_ban)
                                <small class="text-muted">({{ $book->bookSubcategory->subcategory_name }})</small>
                                @endif
                            </p>
                            @endif
                            <p class="mb-2">
                                <strong>সর্বশেষ আপডেট:</strong>
                                <span class="text-dark fw-semibold">{{ $book->updated_at ? $book->updated_at->format('d-M-Y, h:i A') : 'N/A' }}</span>
                            </p>
                            <p class="mb-3">
                                <strong>যুক্ত করার সময়:</strong>
                                <span class="text-dark fw-semibold">{{ $book->created_at ? $book->created_at->format('d-M-Y') : 'N/A' }}</span>
                            </p>

                            @if($book->pdf_file && file_exists(public_path('pdf_file/' . $book->pdf_file)))
                                <div class="d-grid gap-2">
                                    <a href="{{ asset('pdf_file/' . $book->pdf_file) }}" target="_blank" class="btn btn-primary btn-sm fw-bold">
                                        <i class="fa-solid fa-file-pdf me-1"></i> পিডিএফ সরাসরি দেখুন
                                    </a>
                                    <a href="{{ asset('pdf_file/' . $book->pdf_file) }}" download class="btn btn-outline-primary btn-sm fw-bold">
                                        <i class="fa-solid fa-download me-1"></i> পিডিএফ ডাউনলোড করুন
                                    </a>
                                </div>
                            @else
                                <div class="alert alert-warning py-2 mb-0 text-center font-12">
                                    <i class="fa-solid fa-triangle-exclamation me-1"></i> পিডিএফ ফাইল সংযুক্ত নেই
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Right Column: Titles & Descriptions -->
                <div class="col-lg-8">
                    <div class="card border shadow-sm rounded-3 p-4 mb-4">
                        <h5 class="fw-bold pb-2 border-bottom text-dark">
                            <i class="fa-solid fa-heading text-primary me-2"></i>বইয়ের শিরোনামসমূহ
                        </h5>

                        <div class="mb-3">
                            <span class="lang-pill lang-bn">বাংলা শিরোনাম</span>
                            <h5 class="fw-bold mt-1 text-dark">{{ $book->title_bn ?: '—' }}</h5>
                        </div>

                        <div class="mb-3">
                            <span class="lang-pill lang-en">English Title</span>
                            <h6 class="fw-semibold mt-1 text-dark">{{ $book->title_en ?: '—' }}</h6>
                        </div>

                        <div class="mb-2">
                            <span class="lang-pill lang-ab">العنوان بالعربية</span>
                            <h5 class="fw-bold mt-1 text-dark" dir="rtl" style="font-family: 'Amiri', 'Traditional Arabic', serif;">
                                {{ $book->title_ab ?: '—' }}
                            </h5>
                        </div>
                    </div>

                    <div class="card border shadow-sm rounded-3 p-4">
                        <h5 class="fw-bold pb-2 border-bottom text-dark">
                            <i class="fa-solid fa-align-left text-success me-2"></i>বইয়ের বিবরণ / পরিচিতি
                        </h5>

                        <!-- Bengali Description -->
                        <div class="mb-4">
                            <div class="d-flex align-items-center mb-2">
                                <span class="lang-pill lang-bn">বাংলা বিবরণ</span>
                            </div>
                            <div class="p-3 bg-light rounded border text-dark">
                                {!! $book->des_bn ?: '<span class="text-muted">কোনো বিবরণ পাওয়া যায়নি।</span>' !!}
                            </div>
                        </div>

                        <!-- English Description -->
                        <div class="mb-4">
                            <div class="d-flex align-items-center mb-2">
                                <span class="lang-pill lang-en">English Description</span>
                            </div>
                            <div class="p-3 bg-light rounded border text-dark">
                                {!! $book->des_en ?: '<span class="text-muted">No description available.</span>' !!}
                            </div>
                        </div>

                        <!-- Arabic Description -->
                        <div class="mb-2">
                            <div class="d-flex align-items-center mb-2">
                                <span class="lang-pill lang-ab">الوصف بالعربية</span>
                            </div>
                            <div class="p-3 bg-light rounded border text-dark" dir="rtl" style="font-family: 'Amiri', 'Traditional Arabic', serif;">
                                {!! $book->des_ab ?: '<span class="text-muted">لا يوجد وصف متاح.</span>' !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('admin_script')
@include('admin.common.script')
@endpush
