@extends('frontend.master')

@php
    $lang = session()->get('language', 'bangla');
    if (!in_array($lang, ['bangla', 'english', 'arabic'])) {
        $lang = 'bangla';
    }
    $isAr = ($lang === 'arabic');
    $isEn = ($lang === 'english');
    $isBn = ($lang === 'bangla');
@endphp

@push('frontend_style')
<style>
    .syllabus-hero {
        background: linear-gradient(135deg, #0d5c3a 0%, #15803d 50%, #047857 100%);
        color: #ffffff;
        padding: 65px 0 45px;
        position: relative;
    }
    .hero-badge-syllabus {
        display: inline-block;
        background-color: #ffffff !important;
        color: #15803d !important;
        padding: 7px 20px;
        border-radius: 30px;
        font-size: 14px;
        font-weight: 700;
        margin-bottom: 14px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.15);
        letter-spacing: 0.3px;
    }
    .hero-badge-syllabus i {
        color: #15803d !important;
        margin-right: 6px;
    }
    @if($isAr)
    .hero-badge-syllabus i {
        margin-right: 0 !important;
        margin-left: 6px !important;
    }
    @endif
    .syllabus-card {
        background: #ffffff;
        border-radius: 16px;
        border: 1.5px solid #e2e8f0;
        box-shadow: 0 4px 20px rgba(0,0,0,0.05);
        transition: all 0.3s ease;
        overflow: hidden;
        margin-bottom: 30px;
    }
    .syllabus-card:hover {
        border-color: #22c55e;
        box-shadow: 0 12px 30px rgba(21, 128, 61, 0.12);
        transform: translateY(-3px);
    }
    .syllabus-card-header {
        background: #f8fafc;
        padding: 22px 26px;
        border-bottom: 1.5px solid #e2e8f0;
    }
    .syllabus-badge-num {
        width: 38px;
        height: 38px;
        border-radius: 50%;
        background: #dcfce7;
        color: #15803d;
        font-weight: 800;
        font-size: 16px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
    }
    .syllabus-details-body {
        padding: 26px;
        color: #334155;
        font-size: 15px;
        line-height: 1.8;
    }
    .syllabus-details-body h1, 
    .syllabus-details-body h2, 
    .syllabus-details-body h3, 
    .syllabus-details-body h4 {
        color: #0f172a;
        margin-top: 18px;
        margin-bottom: 10px;
        font-weight: 700;
    }
    .syllabus-details-body ul, 
    .syllabus-details-body ol {
        padding-left: 24px;
        margin-bottom: 16px;
    }
    /* Table Styling & Smooth Horizontal Scrollability */
    .syllabus-details-body .table-responsive {
        margin: 20px 0 25px;
        border-radius: 12px;
        box-shadow: 0 4px 16px rgba(0, 0, 0, 0.06);
        border: 1.5px solid #cbd5e1;
        overflow-x: auto !important;
        -webkit-overflow-scrolling: touch !important;
        background: #ffffff;
        width: 100% !important;
        display: block !important;
        position: relative;
    }
    .syllabus-details-body .table-responsive::-webkit-scrollbar {
        height: 7px;
    }
    .syllabus-details-body .table-responsive::-webkit-scrollbar-track {
        background: #f1f5f9;
        border-radius: 4px;
    }
    .syllabus-details-body .table-responsive::-webkit-scrollbar-thumb {
        background: #059669;
        border-radius: 4px;
    }
    .syllabus-details-body table {
        width: 100% !important;
        min-width: 620px !important; /* CRITICAL: ensures table columns never get squished and enables smooth horizontal touch scroll on mobile */
        border-collapse: collapse !important;
        margin: 0 !important;
        background-color: #ffffff !important;
        font-size: 14.5px !important;
    }
    .syllabus-details-body table thead,
    .syllabus-details-body table thead tr {
        background-color: #065f46 !important;
    }
    .syllabus-details-body table thead th,
    .syllabus-details-body table th {
        background-color: #065f46 !important;
        color: #ffffff !important;
        font-weight: 700 !important;
        font-size: 15px !important;
        padding: 13px 16px !important;
        border: 1px solid #047857 !important;
        vertical-align: middle !important;
        text-align: center !important;
        line-height: 1.5 !important;
        letter-spacing: 0.2px;
    }
    .syllabus-details-body table tbody tr {
        transition: background-color 0.15s ease;
    }
    .syllabus-details-body table tbody tr:nth-child(even) td {
        background-color: #f8fafc !important;
    }
    .syllabus-details-body table tbody tr:nth-child(odd) td {
        background-color: #ffffff !important;
    }
    .syllabus-details-body table tbody tr:hover td {
        background-color: #ecfdf5 !important;
    }
    .syllabus-details-body table tbody td {
        color: #0f172a !important;
        font-size: 15px !important;
        font-weight: 500 !important;
        padding: 13px 16px !important;
        border: 1px solid #cbd5e1 !important;
        vertical-align: middle !important;
        line-height: 1.6 !important;
    }
    .syllabus-details-body table tbody td.text-success,
    .syllabus-details-body table tbody td .text-success {
        color: #047857 !important;
        font-weight: 700 !important;
    }
    .syllabus-details-body table tbody td strong {
        color: #0f172a !important;
        font-weight: 700 !important;
    }
    .syllabus-details-body table tbody td .badge {
        font-size: 13px !important;
        padding: 6px 12px !important;
    }
    .doc-box {
        background: #f8fafc;
        border-top: 1.5px solid #e2e8f0;
        padding: 20px 26px;
    }
    .doc-btn-active {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 12px 18px;
        background: #ffffff;
        border: 1.5px solid #cbd5e1;
        border-radius: 12px;
        text-decoration: none !important;
        transition: all 0.25s ease;
        color: #0f172a !important;
        height: 100%;
    }
    .doc-btn-active:hover {
        border-color: #15803d;
        background: #f0fdf4;
        box-shadow: 0 4px 12px rgba(21, 128, 61, 0.12);
        color: #15803d !important;
    }
    .doc-btn-empty {
        display: flex;
        align-items: center;
        padding: 12px 18px;
        background: #f1f5f9;
        border: 1.5px dashed #cbd5e1;
        border-radius: 12px;
        color: #64748b;
        height: 100%;
    }
    .file-icon-pdf {
        color: #dc2626;
        font-size: 24px;
    }
    .file-icon-img {
        color: #16a34a;
        font-size: 24px;
    }
    .quick-cta-card {
        background: linear-gradient(135deg, #14532d, #15803d);
        border-radius: 18px;
        color: white;
        padding: 35px 30px;
    }
    .btn-hero-outline {
        color: #ffffff !important;
        border: 2px solid #ffffff !important;
        background: rgba(255, 255, 255, 0.15) !important;
        transition: all 0.3s ease;
    }
    .btn-hero-outline:hover {
        background: #ffffff !important;
        color: #15803d !important;
        border-color: #ffffff !important;
    }
    .btn-hero-outline i {
        color: inherit !important;
    }

    /* Course Spotlight & Navigator */
    html {
        scroll-behavior: smooth;
    }
    .course-spotlight-card {
        background: #ffffff;
        border-radius: 16px;
        transition: all 0.3s ease;
        border: 1.5px solid #e2e8f0;
        display: flex;
        flex-direction: column;
    }
    .course-spotlight-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 14px 30px rgba(0,0,0,0.08) !important;
    }
    .card-border-green {
        border-top: 5px solid #059669 !important;
    }
    .card-border-blue {
        border-top: 5px solid #0284c7 !important;
    }
    .spotlight-icon {
        width: 52px;
        height: 52px;
        border-radius: 14px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 22px;
        flex-shrink: 0;
    }
    .icon-green {
        background: #ecfdf5;
        color: #059669;
        border: 1.5px solid #a7f3d0;
    }
    .icon-blue {
        background: #f0f9ff;
        color: #0284c7;
        border: 1.5px solid #bae6fd;
    }
    .syllabus-card {
        scroll-margin-top: 95px;
    }
    .syllabus-card.highlight-pulse {
        animation: pulseHighlight 1.8s ease-in-out;
    }
    @keyframes pulseHighlight {
        0% { box-shadow: 0 0 0 0 rgba(21, 128, 61, 0.7); border-color: #15803d; }
        50% { box-shadow: 0 0 0 15px rgba(21, 128, 61, 0); border-color: #15803d; }
        100% { box-shadow: 0 0 0 0 rgba(21, 128, 61, 0); }
    }

    /* Spotlight Card Action Buttons */
    .btn-spotlight-detail {
        transition: all 0.25s cubic-bezier(0.4, 0, 0.2, 1);
    }
    .btn-spotlight-detail:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 18px rgba(0, 0, 0, 0.18) !important;
    }
    .btn-spotlight-pdf {
        background: linear-gradient(135deg, #fff1f2 0%, #fee2e2 100%) !important;
        color: #b91c1c !important;
        border: 1.5px solid #f87171 !important;
        font-weight: 700 !important;
        font-size: 13.5px !important;
        padding: 7px 18px !important;
        border-radius: 30px !important;
        display: inline-flex !important;
        align-items: center !important;
        gap: 7px !important;
        text-decoration: none !important;
        box-shadow: 0 2px 8px rgba(220, 38, 38, 0.14) !important;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1) !important;
        position: relative;
        overflow: hidden;
        white-space: nowrap;
    }
    .btn-spotlight-pdf i {
        color: #dc2626 !important;
        font-size: 15px;
        transition: all 0.3s ease;
    }
    .btn-spotlight-pdf:hover {
        background: linear-gradient(135deg, #dc2626 0%, #991b1b 100%) !important;
        color: #ffffff !important;
        border-color: #991b1b !important;
        box-shadow: 0 6px 20px rgba(220, 38, 38, 0.35) !important;
        transform: translateY(-2px);
    }
    .btn-spotlight-pdf:hover i {
        color: #ffffff !important;
        transform: scale(1.22) rotate(-8deg);
    }
    .btn-spotlight-pdf:active {
        transform: translateY(0);
        box-shadow: 0 2px 6px rgba(220, 38, 38, 0.25) !important;
    }

    /* Prominent Syllabus Title Highlights */
    .badge-duration {
        display: inline-flex;
        align-items: center;
        background: #ffffff !important;
        color: #1e293b !important;
        border: 1.5px solid #cbd5e1 !important;
        font-size: 12px;
        font-weight: 600;
        padding: 4px 10px;
        border-radius: 20px;
    }
    .spotlight-title-highlight {
        padding: 14px 18px;
        border-radius: 12px;
        margin: 10px 0 16px;
        box-shadow: 0 4px 14px rgba(0,0,0,0.05);
        transition: all 0.25s ease;
    }
    .spotlight-title-highlight:hover {
        transform: translateY(-2px);
    }
    .title-hl-green {
        background: linear-gradient(135deg, #ecfdf5 0%, #d1fae5 100%);
        border: 1.5px solid #6ee7b7;
        border-left: 6px solid #059669;
    }
    .title-hl-blue {
        background: linear-gradient(135deg, #f0f9ff 0%, #e0f2fe 100%);
        border: 1.5px solid #7dd3fc;
        border-left: 6px solid #0284c7;
    }
    .spotlight-title-label {
        font-size: 11px;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: 0.6px;
        margin-bottom: 6px;
        display: flex;
        align-items: center;
    }
    .label-green {
        color: #047857;
    }
    .label-blue {
        color: #0369a1;
    }
    .spotlight-title-text-green {
        color: #064e3b !important;
        font-size: 20px;
        font-weight: 800;
        line-height: 1.45;
        letter-spacing: -0.2px;
    }
    .spotlight-title-text-blue {
        color: #0c4a6e !important;
        font-size: 20px;
        font-weight: 800;
        line-height: 1.45;
        letter-spacing: -0.2px;
    }
    .card-header-course-1 {
        background: linear-gradient(135deg, #f0fdf4 0%, #ffffff 100%) !important;
        border-left: 6px solid #16a34a !important;
        padding: 22px 26px !important;
    }
    .card-header-course-2 {
        background: linear-gradient(135deg, #f0f9ff 0%, #ffffff 100%) !important;
        border-left: 6px solid #0284c7 !important;
        padding: 22px 26px !important;
    }
    .syllabus-badge-num-lg {
        width: 44px;
        height: 44px;
        border-radius: 50%;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-weight: 800;
        font-size: 18px;
        flex-shrink: 0;
        box-shadow: 0 4px 10px rgba(0,0,0,0.08);
    }
    .badge-num-green {
        background: #059669;
        color: #ffffff;
        border: 2px solid #34d399;
    }
    .badge-num-blue {
        background: #0284c7;
        color: #ffffff;
        border: 2px solid #7dd3fc;
    }
    .syllabus-title-highlight-box {
        padding: 14px 22px;
        border-radius: 12px;
        margin-top: 10px;
        margin-bottom: 2px;
        box-shadow: 0 4px 16px rgba(0,0,0,0.06);
        transition: all 0.25s ease;
    }
    .syllabus-title-highlight-box:hover {
        transform: translateY(-2px);
    }
    .highlight-box-green {
        background: linear-gradient(135deg, #ffffff 0%, #ecfdf5 50%, #d1fae5 100%);
        border: 2px solid #86efac;
        border-left: 7px solid #059669;
    }
    .highlight-box-blue {
        background: linear-gradient(135deg, #ffffff 0%, #f0f9ff 50%, #e0f2fe 100%);
        border: 2px solid #93c5fd;
        border-left: 7px solid #0284c7;
    }
    .syllabus-title-pill {
        display: inline-flex;
        align-items: center;
        font-size: 11px;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: 0.6px;
        padding: 3px 10px;
        border-radius: 20px;
    }
    .title-pill-green {
        background: #059669;
        color: #ffffff;
    }
    .title-pill-blue {
        background: #0284c7;
        color: #ffffff;
    }
    .syllabus-main-heading {
        font-size: 24px;
        font-weight: 800;
        letter-spacing: -0.2px;
        line-height: 1.5;
    }
    .highlight-marker-green {
        background: linear-gradient(120deg, rgba(167, 243, 208, 0.6) 0%, rgba(209, 250, 229, 0.3) 100%);
        padding: 2px 8px;
        border-radius: 6px;
        box-decoration-break: clone;
        -webkit-box-decoration-break: clone;
        border-bottom: 2px solid #34d399;
    }
    .highlight-marker-blue {
        background: linear-gradient(120deg, rgba(186, 230, 253, 0.6) 0%, rgba(224, 242, 254, 0.3) 100%);
        padding: 2px 8px;
        border-radius: 6px;
        box-decoration-break: clone;
        -webkit-box-decoration-break: clone;
        border-bottom: 2px solid #60a5fa;
    }
    .text-success-dark {
        color: #044e3b !important;
    }
    .text-primary-dark {
        color: #075985 !important;
    }
    .course-meta-badge {
        display: inline-flex;
        align-items: center;
        padding: 5px 14px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 700;
        letter-spacing: 0.3px;
        box-shadow: 0 2px 6px rgba(0,0,0,0.06);
    }
    .meta-badge-green {
        background: #059669 !important;
        color: #ffffff !important;
    }
    .meta-badge-blue {
        background: #0284c7 !important;
        color: #ffffff !important;
    }
    .course-status-badge {
        display: inline-flex;
        align-items: center;
        padding: 5px 12px;
        border-radius: 20px;
        font-size: 11.5px;
        font-weight: 600;
        background: #ecfdf5 !important;
        color: #065f46 !important;
        border: 1px solid #a7f3d0 !important;
    }
    @if($isAr)
    .title-hl-green {
        border-left: 1.5px solid #6ee7b7 !important;
        border-right: 6px solid #059669 !important;
    }
    .title-hl-blue {
        border-left: 1.5px solid #7dd3fc !important;
        border-right: 6px solid #0284c7 !important;
    }
    .highlight-box-green {
        border-left: 2px solid #86efac !important;
        border-right: 7px solid #059669 !important;
    }
    .highlight-box-blue {
        border-left: 2px solid #93c5fd !important;
        border-right: 7px solid #0284c7 !important;
    }
    .card-header-course-1 {
        border-left: none !important;
        border-right: 6px solid #16a34a !important;
    }
    .card-header-course-2 {
        border-left: none !important;
        border-right: 6px solid #0284c7 !important;
    }
    @endif

    /* Section and Table Headings Enhancement */
    .syllabus-details-body h5 {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        gap: 8px 12px;
        line-height: 1.6;
        color: #0f172a;
    }
    .syllabus-details-body h5 .badge {
        white-space: normal;
        display: inline-flex;
        align-items: center;
        margin-right: 0 !important;
        line-height: 1.4;
        flex-shrink: 0;
    }
    .mobile-table-scroll-hint {
        display: none;
    }

    /* Mobile Responsive Optimizations */
    @media (max-width: 767.98px) {
        .syllabus-details-body {
            padding: 18px 14px !important;
        }
        .syllabus-card-header {
            padding: 16px 14px !important;
        }
        .syllabus-title-highlight-box {
            padding: 12px 14px !important;
        }
        .syllabus-main-heading {
            font-size: 19px !important;
            line-height: 1.45 !important;
        }
        .doc-box {
            padding: 16px 14px !important;
        }
        .course-spotlight-card {
            padding: 18px 14px !important;
        }
        .spotlight-title-text-green,
        .spotlight-title-text-blue {
            font-size: 17px !important;
        }
        .syllabus-details-body h5 {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            gap: 8px;
        }
        .mobile-table-scroll-hint {
            display: flex !important;
            align-items: center;
            background: #f0fdf4;
            color: #065f46;
            padding: 7px 12px;
            border-radius: 8px;
            border: 1px solid #bbf7d0;
            font-size: 12px;
            font-weight: 600;
            margin-bottom: 10px;
        }
    }
</style>
@endpush

@section('content')

<!-- Hero Section -->
<section class="syllabus-hero text-center" @if($isAr) dir="rtl" @endif>
    <div class="container">
        <span class="hero-badge-syllabus">
            <i class="fa fa-book"></i>
            @if($isEn)
                Academic Curriculum & Routine
            @elseif($isAr)
                المنهج الدراسي والخطط التعليمية
            @else
                পাঠ্যসূচি ও সিলেবাস নির্দেশিকা
            @endif
        </span>
        <h1 class="text-white fw-bold mb-3 font-34">
            @if($isEn)
                Offline & Regular Course Syllabus
            @elseif($isAr)
                مناهج الدورات والبرامج الدراسية
            @else
                অফলাইন সিলেবাস ও পাঠ্যসূচি
            @endif
        </h1>
        <p class="text-white font-16 mb-4 max-width-700 mx-auto" style="opacity: 0.92;">
            @if($isEn)
                Explore our detailed offline curriculum, class subjects, course outlines, and download official syllabus documents.
            @elseif($isAr)
                تصفح المناهج الدراسية المعتمدة لجميع المراحل والمواد، وحمل وثائق المناهج والخطط المعتمدة.
            @else
                মাদ্রাসার নিয়মিত ও অফলাইন পাঠ্যক্রম, বিভাগভিত্তিক বিষয়সূচি ও পরীক্ষার পাঠ্যপরিকল্পনা দেখুন এবং সরাসরি ডকুমেন্ট ডাউনলোড করুন।
            @endif
        </p>

        <div class="d-flex justify-content-center gap-3 flex-wrap">
            <a href="{{ route('admission.guidelines') }}" class="btn btn-warning btn-lg px-4 py-2 rounded-pill fw-bold text-dark shadow">
                <i class="fa fa-book @if($isAr) ms-1 @else me-1 @endif"></i>
                @if($isEn) Admission Guidelines @elseif($isAr) شروط القبول @else ভর্তি নির্দেশিকা @endif
            </a>
            <a href="{{ route('online.admission') }}" class="btn btn-hero-outline btn-lg px-4 py-2 rounded-pill fw-bold">
                <i class="fa fa-pencil-square-o @if($isAr) ms-1 @else me-1 @endif"></i>
                @if($isEn) Apply Online @elseif($isAr) تقديم طلب القبول @else অনলাইন ভর্তি আবেদন @endif
            </a>
        </div>
    </div>
</section>

@if($syllabi->count() > 0)
<!-- 2 Offline Course Syllabi Spotlight Section -->
<section class="py-5 bg-white border-bottom shadow-sm" @if($isAr) dir="rtl" @endif>
    <div class="container">
        <!-- Section Header -->
        <div class="text-center max-width-750 mx-auto mb-4">
            <span class="badge bg-success bg-opacity-10 text-success fw-bold px-3 py-2 rounded-pill font-13 mb-2">
                <i class="fa fa-th-large me-1"></i>
                @if($isEn) 2 Distinct Offline Course Programs @elseif($isAr) مساران دراسيان حضوريان معتمدان @else অফলাইন পাঠ্যক্রমের ২টি প্রধান বিভাগ @endif
            </span>
            <h2 class="fw-bold text-dark font-28 mb-2">
                @if($isEn)
                    Our 2 Specialized Offline Course Syllabi
                @elseif($isAr)
                    منهجان دراسيان تخصصيان للبرامج الحضورية
                @else
                    অফলাইন শিক্ষা কার্যক্রমের ২টি বিশেষায়িত কোর্স সিলেবাস
                @endif
            </h2>
            <p class="text-muted font-15 mb-0" style="line-height: 1.7;">
                @if($isEn)
                    Muqaddamatul Quran Islamic Academy currently provides 2 distinct offline curriculums. Select a course below to easily navigate to the full subjects or directly download official syllabus PDFs:
                @elseif($isAr)
                    تطرح أكاديمية مقدمة القرآن الإسلامية مسارين تعليميين حضوريين معتمدين. اختر المسار المناسب للاطلاع على تفاصيل المنهج أو تحميل ملف PDF المعتمد:
                @else
                    মুকাদ্দামাতুল কুরআন ইসলামিক একাডেমির নিয়মিত অফলাইন শাখায় বর্তমানে ২টি ভিন্ন কোর্স পরিচালিত হচ্ছে। আপনার প্রয়োজনীয় কোর্স সিলেবাসটি সহজে পেতে নিচের কার্ডে ক্লিক করুন:
                @endif
            </p>
        </div>

        <!-- 2 Course Cards Row -->
        <div class="row g-4">
            @foreach($syllabi as $cIndex => $course)
                @php
                    $isFirst = ($cIndex === 0);
                    $badgeText = $isFirst ? 
                        ($isEn ? 'Course 1 • Nazra & Tajweed Diploma' : ($isAr ? 'المسار ١ • دبلوم التلاوة والتجويد' : 'কোর্স ১ • পূর্ণাঙ্গ নাজরা ও তাজবীদ ডিপ্লোমা')) : 
                        ($isEn ? 'Course 2 • Noorani & Quran Learning' : ($isAr ? 'المسار ٢ • القاعدة النورانية وتعلّم القرآن' : 'কোর্স ২ • নূরানী ও কুরআন শিক্ষা বিভাগ'));
                    $badgeSub = $isFirst ?
                        ($isEn ? '6-Month Master Course' : ($isAr ? 'برنامج معتمد (٦ أشهر)' : '৬ মাস মেয়াদী মাস্টার কোর্স')) :
                        ($isEn ? '6-Month Foundation Course' : ($isAr ? 'دورة تأسيسية (٦ أشهر)' : '৬ মাস মেয়াদী বুনিয়াদী কোর্স'));
                    $iconClass = $isFirst ? 'fa fa-book' : 'fa fa-graduation-cap';
                @endphp
                <div class="col-lg-6">
                    <div class="course-spotlight-card h-100 p-4 border rounded-3 shadow-sm position-relative overflow-hidden {{ $isFirst ? 'card-border-green' : 'card-border-blue' }}">
                        <div class="d-flex align-items-start gap-3 mb-3">
                            <div class="spotlight-icon {{ $isFirst ? 'icon-green' : 'icon-blue' }}">
                                <i class="{{ $iconClass }}"></i>
                            </div>
                            <div class="flex-grow-1">
                                <div class="d-flex align-items-center justify-content-between flex-wrap gap-1 mb-2">
                                    <span class="badge {{ $isFirst ? 'bg-success' : 'bg-primary' }} text-white fw-bold px-3 py-1 font-12 rounded-pill shadow-sm">
                                        <i class="{{ $isFirst ? 'fa fa-bookmark' : 'fa fa-star' }} me-1"></i>{{ $badgeText }}
                                    </span>
                                    <span class="badge-duration">
                                        <i class="fa fa-clock-o me-1 text-muted"></i>{{ $badgeSub }}
                                    </span>
                                </div>
                                <div class="spotlight-title-highlight {{ $isFirst ? 'title-hl-green' : 'title-hl-blue' }}">
                                    <div class="spotlight-title-label {{ $isFirst ? 'label-green' : 'label-blue' }}">
                                        <i class="fa fa-book me-1"></i>
                                        @if($isEn) SYLLABUS TITLE @elseif($isAr) عنوان المنهج @else সিলেবাস শিরোনাম @endif
                                    </div>
                                    <h4 class="fw-bold mb-0 {{ $isFirst ? 'spotlight-title-text-green' : 'spotlight-title-text-blue' }}">
                                        <i class="{{ $isFirst ? 'fa fa-book text-success' : 'fa fa-graduation-cap text-primary' }} me-2"></i>
                                        <span class="{{ $isFirst ? 'highlight-marker-green' : 'highlight-marker-blue' }}">{{ $course->localized_title }}</span>
                                    </h4>
                                </div>
                            </div>
                        </div>

                        <div class="spotlight-features mb-4">
                            @if($isFirst)
                                <ul class="list-unstyled mb-0 font-14 text-secondary">
                                    <li class="mb-2 d-flex align-items-start gap-2">
                                        <i class="fa fa-check-circle text-success mt-1 flex-shrink-0"></i>
                                        <span><strong>৩০ পারা পূর্ণাঙ্গ তিলাওয়াত:</strong> ৬ মাসের মধ্যে দেখে দেখে পূর্ণ কুরআন মাজীদ সহীহ ও সাবলীল পাঠের লক্ষ্যমাত্রা।</span>
                                    </li>
                                    <li class="mb-2 d-flex align-items-start gap-2">
                                        <i class="fa fa-check-circle text-success mt-1 flex-shrink-0"></i>
                                        <span><strong>তাজবীদ বিজ্ঞান:</strong> মাখরাজ, নূন সাকিন, মীম সাকিন, ক্বলক্বলাহ, মাদ্দ ও তারতীলের বৈজ্ঞানিক মশক।</span>
                                    </li>
                                    <li class="mb-0 d-flex align-items-start gap-2">
                                        <i class="fa fa-check-circle text-success mt-1 flex-shrink-0"></i>
                                        <span><strong>অফিসিয়াল সিলেবাস PDF:</strong> মাসিক পারাভিত্তিক তিলাওয়াত পরিধি ও পাঠ্যতালিকা সংযুক্ত।</span>
                                    </li>
                                </ul>
                            @else
                                <ul class="list-unstyled mb-0 font-14 text-secondary">
                                    <li class="mb-2 d-flex align-items-start gap-2">
                                        <i class="fa fa-check-circle text-primary mt-1 flex-shrink-0"></i>
                                        <span><strong>আরবি ২৯ হরফের মাখরাজ:</strong> বর্ণ চেনা, মোরাক্কাব, হরকত ও তানভীনের নিখুঁত উচ্চারণ শিক্ষা।</span>
                                    </li>
                                    <li class="mb-2 d-flex align-items-start gap-2">
                                        <i class="fa fa-check-circle text-primary mt-1 flex-shrink-0"></i>
                                        <span><strong>কায়দা থেকে সরাসরি কুরআন:</strong> জযম, তাশদীদ ও গুন্নাহর প্রয়োগসহ আমপারা (৩০তম পারা) সমাপ্তি।</span>
                                    </li>
                                    <li class="mb-0 d-flex align-items-start gap-2">
                                        <i class="fa fa-check-circle text-primary mt-1 flex-shrink-0"></i>
                                        <span><strong>প্র্যাকটিক্যাল দীনিয়াত:</strong> কুরআন পড়ার পাশাপাশি বিশুদ্ধ নামায ও দৈনন্দিন মাসনূন দু'আ শিক্ষা।</span>
                                    </li>
                                </ul>
                            @endif
                        </div>

                        <div class="d-flex align-items-center gap-2 flex-wrap pt-3 border-top mt-auto">
                            <button type="button" onclick="scrollToSyllabus('syllabus-card-{{ $course->id }}')" class="btn {{ $isFirst ? 'btn-success' : 'btn-primary' }} btn-spotlight-detail btn-sm fw-bold px-3 py-2 rounded-pill flex-grow-1 shadow-sm">
                                <i class="fa fa-arrow-down me-1"></i>
                                @if($isEn) Read Full Syllabus Below @elseif($isAr) استعراض تفاصيل المنهج @else বিস্তারিত সিলেবাস নিচে দেখুন @endif
                            </button>
                            @if($course->document_one)
                                <a href="{{ asset($course->document_one) }}" target="_blank" class="btn-spotlight-pdf">
                                    <i class="fa fa-file-pdf-o"></i>
                                    <span>@if($isEn) PDF Download @elseif($isAr) تحميل PDF @else PDF ডাউনলোড @endif</span>
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- Syllabus List Section -->
<section class="py-50" style="background-color: #f8fafc;" @if($isAr) dir="rtl" @endif>
    <div class="container">

        <!-- Section Header -->
        <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">
            <div>
                <h3 class="fw-bold mb-1" style="color: #0f172a;">
                    <i class="fa fa-graduation-cap text-success @if($isAr) ms-2 @else me-2 @endif"></i>
                    @if($isEn)
                        Detailed Syllabus Outlines ({{ $syllabi->count() }})
                    @elseif($isAr)
                        تفاصيل المناهج المعتمدة ({{ $syllabi->count() }})
                    @else
                        সম্পূর্ণ বিস্তারিত সিলেবাস বিবরণী ({{ $syllabi->count() }}টি)
                    @endif
                </h3>
                <p class="text-muted mb-0 font-14">
                    @if($isEn)
                        Review the subjects, monthly targets, and download official syllabus documents.
                    @elseif($isAr)
                        اطلع على تفاصيل المواد والخطط الشهرية وحمل الوثائق الرسمية للمناهج.
                    @else
                        নিচে বিভাগ ও কোর্সভিত্তিক বিস্তারিত পাঠ্যসূচি, মাসিক লক্ষ্যমাত্রা ও সংযুক্ত ফাইল দেওয়া হলো।
                    @endif
                </p>
            </div>
        </div>

        @if($syllabi->count() > 0)
            <div class="row">
                <div class="col-lg-12">
                    @foreach($syllabi as $index => $item)
                        @php
                            $isFirstCard = ($index === 0);
                        @endphp
                        <div class="syllabus-card" id="syllabus-card-{{ $item->id }}">
                            
                            <!-- Card Header -->
                            <div class="syllabus-card-header {{ $isFirstCard ? 'card-header-course-1' : 'card-header-course-2' }}">
                                <!-- Top Row: Meta badges -->
                                <div class="d-flex align-items-center gap-2 flex-wrap mb-2">
                                    <div class="syllabus-badge-num-lg {{ $isFirstCard ? 'badge-num-green' : 'badge-num-blue' }}">
                                        {{ $index + 1 }}
                                    </div>
                                    <span class="course-meta-badge {{ $isFirstCard ? 'meta-badge-green' : 'meta-badge-blue' }}">
                                        <i class="{{ $isFirstCard ? 'fa fa-bookmark' : 'fa fa-star' }} me-1"></i>
                                        {{ $isFirstCard ? ($isEn ? 'OFFLINE COURSE 1 • DIPLOMA' : ($isAr ? 'المسار ١ • دبلوم' : 'অফলাইন কোর্স ১ • ডিপ্লোমা স্তর')) : ($isEn ? 'OFFLINE COURSE 2 • FOUNDATION' : ($isAr ? 'المسار ٢ • تأسيسي' : 'অফলাইন কোর্স ২ • বুনিয়াদী স্তর')) }}
                                    </span>
                                    <span class="course-status-badge">
                                        <i class="fa fa-check-circle text-success me-1"></i>@if($isEn) Official Approved Syllabus @elseif($isAr) منهج رسمي معتمد @else অফিসিয়াল অনুমোদিত সিলেবাস @endif
                                    </span>
                                    <span class="badge-duration">
                                        <i class="fa fa-clock-o text-muted me-1"></i>{{ $isFirstCard ? ($isEn ? '6-Month Master Course' : '৬ মাস মেয়াদী মাস্টার কোর্স') : ($isEn ? '6-Month Foundation Course' : '৬ মাস মেয়াদী বুনিয়াদী কোর্স') }}
                                    </span>
                                </div>

                                <!-- Full Width Highlighted Syllabus Title Box -->
                                <div class="syllabus-title-highlight-box {{ $isFirstCard ? 'highlight-box-green' : 'highlight-box-blue' }}">
                                    <div class="d-flex align-items-center justify-content-between gap-2 flex-wrap mb-2 pb-2 border-bottom" style="border-color: {{ $isFirstCard ? 'rgba(5, 150, 105, 0.18)' : 'rgba(2, 132, 199, 0.18)' }} !important;">
                                        <div class="d-flex align-items-center gap-2">
                                            <span class="syllabus-title-pill {{ $isFirstCard ? 'title-pill-green' : 'title-pill-blue' }}">
                                                <i class="fa fa-bookmark me-1"></i>
                                                @if($isEn)
                                                    OFFICIAL SYLLABUS TITLE
                                                @elseif($isAr)
                                                    عنوان المنهج الدراسي
                                                @else
                                                    সিলেবাসের মূল শিরোনাম
                                                @endif
                                            </span>
                                            <small class="text-muted font-12 ms-1">
                                                <i class="fa fa-calendar-check-o {{ $isFirstCard ? 'text-success' : 'text-primary' }} me-1"></i>
                                                {{ $item->created_at ? $item->created_at->format('d M, Y') : 'Active' }}
                                            </small>
                                        </div>

                                        @if($item->document_one)
                                            <a href="{{ asset($item->document_one) }}" target="_blank" class="btn btn-danger btn-sm fw-bold rounded-pill px-3 py-1 shadow-sm text-white font-12">
                                                <i class="fa fa-file-pdf-o me-1"></i>
                                                @if($isEn) Download PDF @elseif($isAr) تحميل المنهج PDF @else সিলেবাস PDF ডাউনলোড @endif
                                            </a>
                                        @endif
                                    </div>
                                    <h3 class="syllabus-main-heading mb-0 {{ $isFirstCard ? 'text-success-dark' : 'text-primary-dark' }}">
                                        <i class="{{ $isFirstCard ? 'fa fa-book text-success' : 'fa fa-graduation-cap text-primary' }} me-2"></i>
                                        <span class="{{ $isFirstCard ? 'highlight-marker-green' : 'highlight-marker-blue' }}">{{ $item->localized_title }}</span>
                                    </h3>
                                </div>
                            </div>

                            <!-- Card Details (Text Editor Content) -->
                            @if(!empty($item->localized_details))
                                <div class="syllabus-details-body">
                                    {!! $item->localized_details !!}
                                </div>
                            @endif

                            <!-- Documents Section -->
                            @if($item->document_one || $item->document_two)
                            <div class="doc-box">
                                <div class="row g-3 align-items-stretch">
                                    
                                    <!-- Document 1 Slot -->
                                    @if($item->document_one)
                                    <div class="{{ $item->document_two ? 'col-md-6' : 'col-12' }}">
                                        <a href="{{ asset($item->document_one) }}" target="_blank" class="doc-btn-active">
                                            <div class="d-flex align-items-center gap-3 text-truncate">
                                                @if($item->isDocOnePdf())
                                                    <i class="fa fa-file-pdf-o file-icon-pdf"></i>
                                                @else
                                                    <i class="fa fa-file-image-o file-icon-img"></i>
                                                @endif
                                                <div class="text-truncate">
                                                    <div class="fw-bold text-dark font-14 text-truncate">
                                                        {{ $item->document_one_title ?: ($isEn ? 'Syllabus Document 1' : ($isAr ? 'وثيقة المنهج ١' : 'সিলেবাস ডকুমেন্ট ১')) }}
                                                    </div>
                                                    <small class="text-muted font-12">
                                                        @if($item->isDocOnePdf()) PDF Document @else Image / Scan @endif &bull; 
                                                        @if($isEn) Click to View / Download @elseif($isAr) انقر للمعاينة والتحميل @else দেখতে বা ডাউনলোড করতে ক্লিক করুন @endif
                                                    </small>
                                                </div>
                                            </div>
                                            <span class="badge bg-success rounded-circle p-2 ms-2 flex-shrink-0" style="width: 32px; height: 32px; display: inline-flex; align-items: center; justify-content: center;">
                                                <i class="fa fa-arrow-down text-white font-12"></i>
                                            </span>
                                        </a>
                                    </div>
                                    @endif

                                    <!-- Document 2 Slot (Only displayed if uploaded) -->
                                    @if($item->document_two)
                                    <div class="{{ $item->document_one ? 'col-md-6' : 'col-12' }}">
                                        <a href="{{ asset($item->document_two) }}" target="_blank" class="doc-btn-active">
                                            <div class="d-flex align-items-center gap-3 text-truncate">
                                                @if($item->isDocTwoPdf())
                                                    <i class="fa fa-file-pdf-o file-icon-pdf"></i>
                                                @else
                                                    <i class="fa fa-file-image-o file-icon-img"></i>
                                                @endif
                                                <div class="text-truncate">
                                                    <div class="fw-bold text-dark font-14 text-truncate">
                                                        {{ $item->document_two_title ?: ($isEn ? 'Supplementary Document 2' : ($isAr ? 'وثيقة تكميلية ٢' : 'সম্পূরক ডকুমেন্ট ২')) }}
                                                    </div>
                                                    <small class="text-muted font-12">
                                                        @if($item->isDocTwoPdf()) PDF Document @else Image / Scan @endif &bull; 
                                                        @if($isEn) Click to View / Download @elseif($isAr) انقر للمعاينة والتحميل @else দেখতে বা ডাউনলোড করতে ক্লিক করুন @endif
                                                    </small>
                                                </div>
                                            </div>
                                            <span class="badge bg-info rounded-circle p-2 ms-2 flex-shrink-0" style="width: 32px; height: 32px; display: inline-flex; align-items: center; justify-content: center;">
                                                <i class="fa fa-arrow-down text-white font-12"></i>
                                            </span>
                                        </a>
                                    </div>
                                    @endif

                                </div>
                            </div>
                            @endif

                        </div>
                    @endforeach
                </div>
            </div>
        @else
            <!-- Empty State -->
            <div class="text-center py-5 bg-white rounded-3 shadow-sm border p-4 my-4">
                <div class="p-4 d-inline-flex bg-success bg-opacity-10 rounded-circle mb-3">
                    <i class="fa fa-book font-36 text-success"></i>
                </div>
                <h4 class="fw-bold text-dark mb-2">
                    @if($isEn)
                        No Syllabus Published Yet
                    @elseif($isAr)
                        لم يتم نشر أي منهج بعد
                    @else
                        আপাতত কোনো অফলাইন সিলেবাস প্রকাশিত হয়নি
                    @endif
                </h4>
                <p class="text-muted font-14 max-width-500 mx-auto mb-4">
                    @if($isEn)
                        New syllabus outlines and academic files will appear here as soon as they are published by the administration.
                    @elseif($isAr)
                        سيتم إدراج المناهج الدراسية المعتمدة هنا فور نشرها من قبل إدارة المعهد.
                    @else
                        কর্তৃপক্ষ কর্তৃক নতুন শিক্ষাবর্ষের সিলেবাস ও রুটিন প্রকাশিত হওয়া মাত্র এখানে দেখতে পাবেন।
                    @endif
                </p>
                <a href="{{ route('online.admission') }}" class="btn btn-success fw-bold px-4 py-2 rounded-pill">
                    <i class="fa fa-pencil-square-o me-1"></i>
                    @if($isEn) Apply for Admission @elseif($isAr) التقديم للقبول @else ভর্তি আবেদন করুন @endif
                </a>
            </div>
        @endif

        <!-- Quick Help & CTA Box -->
        <div class="quick-cta-card mt-5 shadow">
            <div class="row align-items-center">
                <div class="col-lg-8 mb-3 mb-lg-0">
                    <h3 class="fw-bold text-white mb-2 font-22">
                        @if($isEn)
                            Have Questions About Courses or Academic Planning?
                        @elseif($isAr)
                            هل لديك استفسار حول المناهج أو البرامج الدراسية؟
                        @else
                            সিলেবাস বা কোনো কোর্স সম্পর্কিত বিস্তারিত জানতে চান?
                        @endif
                    </h3>
                    <p class="mb-0 text-white font-15" style="opacity: 0.9;">
                        @if($isEn)
                            Our academic advisors and administration are available to assist you with curriculum guidance and admissions.
                        @elseif($isAr)
                            فريق الإرشاد الأكاديمي وإدارة المعهد على استعداد للإجابة على كافة استفساراتكم.
                        @else
                            আমাদের উস্তাদমণ্ডলী ও সাপোর্ট টিম সরাসরি সিলেবাস পরামর্শ ও ভর্তি সংক্রান্ত যেকোনো সহায়তার জন্য প্রস্তুত।
                        @endif
                    </p>
                </div>
                <div class="col-lg-4 text-lg-end">
                    <a href="{{ route('online.admission') }}" class="btn btn-warning btn-lg px-4 py-3 fw-bold text-dark rounded-pill shadow">
                        <i class="fa fa-pencil-square-o @if($isAr) ms-1 @else me-1 @endif"></i>
                        @if($isEn) Apply Online Now @elseif($isAr) التقديم عبر الإنترنت @else অনলাইনে ভর্তি আবেদন @endif
                    </a>
                </div>
            </div>
        </div>

    </div>
</section>
@endsection

@push('frontend_script')
<script>
    function scrollToSyllabus(cardId) {
        var el = document.getElementById(cardId);
        if (el) {
            el.scrollIntoView({ behavior: 'smooth', block: 'start' });
            el.classList.remove('highlight-pulse');
            void el.offsetWidth; // trigger browser reflow
            el.classList.add('highlight-pulse');
        }
    }

    document.addEventListener('DOMContentLoaded', function() {
        // Ensure every table in syllabus content is wrapped in .table-responsive and has mobile scroll hint
        document.querySelectorAll('.syllabus-details-body table').forEach(function(tbl) {
            var wrapper = tbl.closest('.table-responsive');
            if (!wrapper) {
                wrapper = document.createElement('div');
                wrapper.className = 'table-responsive';
                tbl.parentNode.insertBefore(wrapper, tbl);
                wrapper.appendChild(tbl);
            }
            if (!wrapper.previousElementSibling || !wrapper.previousElementSibling.classList.contains('mobile-table-scroll-hint')) {
                var hint = document.createElement('div');
                hint.className = 'mobile-table-scroll-hint d-md-none';
                hint.innerHTML = '<i class="fa fa-arrows-h me-2 text-success"></i><span>সম্পূর্ণ তথ্য দেখতে টেবিলটি ডানে-বামে স্ক্রোল করুন &rarr;</span>';
                wrapper.parentNode.insertBefore(hint, wrapper);
            }
        });
    });
</script>
@endpush
