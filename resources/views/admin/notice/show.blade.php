@extends('admin.master')

@section('body')
<div class="container-fluid mt-3 mb-5">

    <!-- Action Bar (Hidden during print) -->
    <div class="d-flex justify-content-between align-items-center mb-4 d-print-none">
        <div>
            <h4 class="fw-bold mb-0" style="color: #1b4332;">
                <i class="bi bi-file-text text-primary me-2"></i>নোটিশ প্রিভিউ (Notice Preview)
            </h4>
            <small class="text-muted">অফিসিয়াল ফরম্যাটে নোটিশটি প্রদর্শন ও প্রিন্ট করুন</small>
        </div>
        <div class="d-flex gap-2">
            <button type="button" onclick="window.print()" class="btn btn-outline-dark btn-sm fw-bold shadow-sm">
                <i class="bi bi-printer-fill me-1"></i> প্রিন্ট করুন
            </button>
            <a href="{{ route('frontend.notices.show', $notice->id) }}" target="_blank" class="btn btn-outline-success btn-sm fw-bold shadow-sm">
                <i class="bi bi-globe me-1"></i> পাবলিক ভিউ
            </a>
            <a href="{{ route('notices.edit', $notice->id) }}" class="btn btn-primary btn-sm fw-bold shadow-sm" style="background-color: #2d6a4f; border-color: #2d6a4f;">
                <i class="bi bi-pencil-square me-1"></i> সম্পাদনা
            </a>
            <a href="{{ route('notices.index') }}" class="btn btn-outline-secondary btn-sm fw-bold shadow-sm">
                <i class="bi bi-arrow-left me-1"></i> তালিকায় ফিরুন
            </a>
        </div>
    </div>

    <!-- Official Notice Paper Card -->
    <div class="card border shadow-sm rounded-3 p-4 bg-white notice-paper" style="max-width: 900px; margin: 0 auto;">
        
        <!-- Institutional Letterhead Header -->
        <div class="text-center pb-3 border-bottom border-2 border-success position-relative">
            <div class="d-flex justify-content-center align-items-center gap-3 mb-2">
                @php $logo = \App\Models\Logo::latest()->first() @endphp
                @if($logo && $logo->logo_image1)
                    <img src="{{ asset($logo->logo_image1) }}" alt="Logo" style="height: 70px; width: 70px; object-fit: contain;">
                @endif
                <div>
                    <h3 class="fw-bold mb-0 text-success" style="font-family: 'SolaimanLipi', sans-serif;">
                        মুকাদ্দামাতুল কুরআন ইসলামী একাডেমি
                    </h3>
                    <h5 class="fw-semibold text-dark mb-0" style="letter-spacing: 0.5px;">
                        Muqaddamatul Quran Islami Academy
                    </h5>
                    <small class="text-muted">একটি আদর্শ ও আধুনিক দ্বীনি শিক্ষাপ্রতিষ্ঠান</small>
                </div>
            </div>

            <div class="badge bg-danger text-uppercase px-3 py-1 mt-2 fs-6 letter-spacing-1 shadow-sm">
                {{ $notice->category_name }}
            </div>
        </div>

        <!-- Notice Meta Details (Ref No & Date) -->
        <div class="d-flex justify-content-between align-items-center py-3 border-bottom bg-light px-3 mt-3 rounded">
            <div>
                <strong class="text-dark">স্মারক নং:</strong> 
                <span class="font-monospace fw-bold text-dark">{{ $notice->notice_no ?: 'MQIA/NOT/' . $notice->id }}</span>
            </div>
            <div class="d-flex gap-3 align-items-center">
                <div>
                    <strong class="text-dark">প্রকাশের তারিখ:</strong> 
                    <span class="fw-bold text-dark">{{ \Carbon\Carbon::parse($notice->publish_date)->format('d F, Y') }}</span>
                </div>
                @if($notice->is_pinned)
                    <span class="badge bg-warning text-dark"><i class="bi bi-pin-angle-fill me-1"></i>পিন্ড নোটিশ</span>
                @endif
            </div>
        </div>

        <!-- Notice Title -->
        <div class="text-center my-4">
            <h4 class="fw-bold text-dark mb-1" style="line-height: 1.5;">
                {{ $notice->title_bn ?: $notice->title }}
            </h4>
            @if($notice->title && $notice->title_bn && $notice->title !== $notice->title_bn)
                <p class="text-muted fst-italic mb-0">{{ $notice->title }}</p>
            @endif
        </div>

        <!-- Notice Short Description / Highlights -->
        @if($notice->short_des_bn || $notice->short_des)
            <div class="alert alert-success border-0 shadow-sm p-3 mb-4 rounded-3" style="background-color: #e8f5e9; color: #1b5e20;">
                <h6 class="fw-bold mb-1"><i class="bi bi-info-circle-fill me-2"></i>সারসংক্ষেপ:</h6>
                <p class="mb-0">{{ $notice->short_des_bn ?: strip_tags($notice->short_des) }}</p>
            </div>
        @endif

        <!-- Notice Long Description / Body -->
        <div class="notice-body text-dark my-4 px-2" style="font-size: 16px; line-height: 1.8;">
            @if($notice->long_des_bn)
                {!! $notice->long_des_bn !!}
            @elseif($notice->long_des)
                {!! $notice->long_des !!}
            @else
                <p class="text-muted">এই নোটিশের জন্য কোনো অতিরিক্ত বিস্তারিত বিবরণ নেই। অনুগ্রহ করে সংযুক্ত ফাইলটি দেখুন।</p>
            @endif
        </div>

        <!-- Notice Attachment View & Download Section -->
        @if($notice->pdf_file)
            <div class="card border border-2 border-danger-subtle bg-light p-3 my-4 rounded-3 d-print-none">
                <div class="d-flex justify-content-between align-items-center flex-wrap gap-2">
                    <div class="d-flex align-items-center gap-3">
                        <i class="bi {{ $notice->is_pdf ? 'bi-file-earmark-pdf-fill text-danger' : 'bi-file-earmark-image text-primary' }}" style="font-size: 38px;"></i>
                        <div>
                            <h6 class="mb-0 fw-bold text-dark">সংযুক্ত ফাইল: {{ basename($notice->pdf_file) }}</h6>
                            <small class="text-muted">
                                ফরম্যাট: {{ strtoupper($notice->file_type ?: 'PDF') }} 
                                @if($notice->file_size) | সাইজ: {{ $notice->file_size }} @endif
                            </small>
                        </div>
                    </div>
                    <div class="d-flex gap-2">
                        <a href="{{ asset($notice->pdf_file) }}" target="_blank" class="btn btn-outline-danger btn-sm fw-bold">
                            <i class="bi bi-box-arrow-up-right me-1"></i>নতুন ট্যাবে খুলুন
                        </a>
                        <a href="{{ route('frontend.notices.download', $notice->id) }}" class="btn btn-danger btn-sm fw-bold shadow-sm">
                            <i class="bi bi-download me-1"></i>ডাউনলোড করুন
                        </a>
                    </div>
                </div>

                @if($notice->is_pdf)
                    <div class="mt-3 ratio ratio-16x9 border rounded overflow-hidden" style="min-height: 480px;">
                        <iframe src="{{ asset($notice->pdf_file) }}#toolbar=1" allowfullscreen></iframe>
                    </div>
                @elseif($notice->is_image)
                    <div class="mt-3 text-center">
                        <img src="{{ asset($notice->pdf_file) }}" alt="Notice Image" class="img-fluid rounded border shadow-sm" style="max-height: 600px;">
                    </div>
                @endif
            </div>
        @endif

        <!-- Letterhead Footer Signatures -->
        <div class="row pt-5 mt-5 border-top">
            <div class="col-6 text-center">
                <br><br>
                <div class="border-top border-dark border-1 pt-1 mx-auto" style="max-width: 180px;">
                    <small class="fw-bold d-block text-dark">প্রস্তুতকারী / অফিস সহকারী</small>
                    <small class="text-muted">মুকাদ্দামাতুল কুরআন একাডেমি</small>
                </div>
            </div>
            <div class="col-6 text-center">
                <br><br>
                <div class="border-top border-dark border-1 pt-1 mx-auto" style="max-width: 180px;">
                    <small class="fw-bold d-block text-dark">মুহতামিম / প্রিন্সিপাল</small>
                    <small class="text-muted">মুকাদ্দামাতুল কুরআন একাডেমি</small>
                </div>
            </div>
        </div>

    </div>

</div>

<style>
@media print {
    body * {
        visibility: hidden;
    }
    .notice-paper, .notice-paper * {
        visibility: visible;
    }
    .notice-paper {
        position: absolute;
        left: 0;
        top: 0;
        width: 100% !important;
        max-width: 100% !important;
        box-shadow: none !important;
        border: none !important;
        padding: 0 !important;
    }
}
</style>
@endsection
