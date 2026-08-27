@extends('frontend.master')

@php
    $currentLang = session()->get('language', 'en');
    $isBn = $currentLang === 'bangla';
    $isAb = $currentLang === 'arabic';

    // Extract multi-language fields
    $title = $isBn ? ($guideline->section_title_bn ?? $guideline->section_title) : ($isAb ? ($guideline->section_title_ab ?? $guideline->section_title) : ($guideline->section_title ?? 'Admission Guidelines & Fee Structure'));
    $details = $isBn ? ($guideline->details_bn ?? $guideline->details) : ($isAb ? ($guideline->details_ab ?? $guideline->details) : ($guideline->details ?? ''));
    $process = $isBn ? ($guideline->process_bn ?? $guideline->process) : ($isAb ? ($guideline->process_ab ?? $guideline->process) : ($guideline->process ?? ''));
    $admissionFees = $isBn ? ($guideline->admission_fees_bn ?? $guideline->admission_fees) : ($isAb ? ($guideline->admission_fees_ab ?? $guideline->admission_fees) : ($guideline->admission_fees ?? ''));
    $monthlyFees = $isBn ? ($guideline->monthly_fees_bn ?? $guideline->monthly_fees) : ($isAb ? ($guideline->monthly_fees_ab ?? $guideline->monthly_fees) : ($guideline->monthly_fees ?? ''));
    $othersFees = $isBn ? ($guideline->others_fees_bn ?? $guideline->others_fees) : ($isAb ? ($guideline->others_fees_ab ?? $guideline->others_fees) : ($guideline->others_fees ?? ''));
    $paymentRules = $isBn ? ($guideline->payment_rules_bn ?? $guideline->payment_rules) : ($isAb ? ($guideline->payment_rules_ab ?? $guideline->payment_rules) : ($guideline->payment_rules ?? ''));
    $points = $isBn ? ($guideline->points_bn ?? $guideline->points) : ($isAb ? ($guideline->points_ab ?? $guideline->points) : ($guideline->points ?? []));
    if (is_string($points)) {
        $points = json_decode($points, true) ?? [];
    }
@endphp

@section('title')
    {{ $title }}
@endsection

@section('content')
<style>
    /* ================= ADMISSION PAGE CUSTOM STYLES ================= */
    .admission-hero {
        position: relative;
        background: linear-gradient(135deg, rgba(16, 75, 40, 0.92) 0%, rgba(26, 122, 63, 0.88) 100%), url('{{ $banner && $banner->image ? asset($banner->image) : asset("frontend/images/bg/bg1.jpg") }}') center/cover no-repeat;
        color: #fff;
        padding: 85px 0 65px;
        text-align: center;
    }
    .admission-hero h1 {
        color: #ffffff;
        font-weight: 800;
        font-size: 36px;
        margin-bottom: 12px;
        letter-spacing: -0.5px;
        text-shadow: 0 2px 4px rgba(0,0,0,0.3);
    }
    .admission-hero p {
        color: #e2f7e7;
        font-size: 16px;
        max-width: 680px;
        margin: 0 auto 20px;
    }
    .admission-hero .breadcrumb {
        background: transparent;
        padding: 0;
        margin: 0;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 14px;
    }
    .admission-hero .breadcrumb a {
        color: #b7efc5;
        text-decoration: none;
    }
    .admission-hero .breadcrumb a:hover {
        color: #ffffff;
        text-decoration: underline;
    }
    .admission-hero .breadcrumb li.active {
        color: #ffffff;
        font-weight: 600;
    }

    /* Sticky Quick Navigation Pills */
    .admission-nav-wrapper {
        background: #ffffff;
        box-shadow: 0 4px 15px rgba(0,0,0,0.06);
        border-bottom: 1px solid #eef2f5;
        position: sticky;
        top: 0;
        z-index: 99;
    }
    .admission-nav-pills {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        justify-content: space-between;
        padding: 10px 0;
        gap: 8px;
    }
    .admission-nav-links {
        display: flex;
        flex-wrap: wrap;
        gap: 6px;
        margin: 0;
        padding: 0;
        list-style: none;
    }
    .admission-nav-links a {
        display: inline-block;
        padding: 7px 15px;
        font-size: 13px;
        font-weight: 600;
        color: #334155;
        background: #f8fafc;
        border: 1px solid #e2e8f0;
        border-radius: 20px;
        text-decoration: none;
        transition: all 0.2s ease;
    }
    .admission-nav-links a:hover,
    .admission-nav-links a.active {
        background: #198754;
        color: #ffffff;
        border-color: #198754;
        box-shadow: 0 3px 8px rgba(25, 135, 84, 0.25);
    }
    .admission-action-btns {
        display: flex;
        gap: 8px;
    }
    .admission-action-btns .btn-print {
        padding: 6px 14px;
        font-size: 13px;
        font-weight: 600;
        border-radius: 20px;
        background: #0d6efd;
        color: #fff;
        border: none;
        cursor: pointer;
        transition: background 0.2s;
    }
    .admission-action-btns .btn-print:hover {
        background: #0b5ed7;
    }

    /* Content Cards */
    .guideline-card {
        background: #ffffff;
        border-radius: 12px;
        border: 1px solid #e2e8f0;
        box-shadow: 0 4px 20px rgba(0,0,0,0.04);
        margin-bottom: 35px;
        overflow: hidden;
        transition: transform 0.2s, box-shadow 0.2s;
    }
    .guideline-card:hover {
        box-shadow: 0 6px 24px rgba(0,0,0,0.07);
    }
    .guideline-card-header {
        padding: 16px 24px;
        background: linear-gradient(to right, #f8fafc, #ffffff);
        border-bottom: 2px solid #e2e8f0;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }
    .guideline-card-header.header-primary {
        border-bottom-color: #198754;
    }
    .guideline-card-header.header-info {
        border-bottom-color: #0dcaf0;
    }
    .guideline-card-header.header-warning {
        border-bottom-color: #ffc107;
    }
    .guideline-card-header.header-danger {
        border-bottom-color: #dc3545;
    }
    .guideline-card-header h3 {
        margin: 0;
        font-size: 19px;
        font-weight: 700;
        color: #1e293b;
        display: flex;
        align-items: center;
        gap: 10px;
    }
    .guideline-card-body {
        padding: 28px;
        color: #334155;
        font-size: 15px;
        line-height: 1.7;
    }

    /* Tables within Rich Content */
    .guideline-card-body table {
        width: 100% !important;
        margin: 15px 0 !important;
        border-collapse: collapse !important;
    }
    .guideline-card-body table th,
    .guideline-card-body table td {
        border: 1px solid #222 !important;
        padding: 8px 10px !important;
        text-align: center !important;
    }

    /* Points List */
    .points-list {
        list-style: none;
        padding: 0;
        margin: 0;
    }
    .points-list-item {
        display: flex;
        align-items: flex-start;
        gap: 12px;
        padding: 12px 16px;
        background: #f8fafc;
        border: 1px solid #edf2f7;
        border-radius: 8px;
        margin-bottom: 10px;
        font-size: 15px;
        color: #334155;
    }
    .points-list-item .point-badge {
        flex-shrink: 0;
        width: 26px;
        height: 26px;
        border-radius: 50%;
        background: #198754;
        color: #ffffff;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 12px;
        font-weight: bold;
    }

    /* Helpdesk Box */
    .helpdesk-box {
        background: linear-gradient(135deg, #f0fdf4 0%, #dcfce7 100%);
        border: 1px solid #86efac;
        border-radius: 12px;
        padding: 24px;
        text-align: center;
        margin-top: 20px;
    }
    .helpdesk-box h4 {
        color: #166534;
        font-weight: 700;
        margin-bottom: 8px;
    }

    /* Print styling */
    @media print {
        header, footer, .inner-header, .admission-nav-wrapper, .admission-action-btns, .breadcrumb, .helpdesk-box, .btn {
            display: none !important;
        }
        body, .main-content, .container {
            width: 100% !important;
            padding: 0 !important;
            margin: 0 !important;
            background: #fff !important;
        }
        .guideline-card {
            border: 1px solid #999 !important;
            box-shadow: none !important;
            margin-bottom: 20px !important;
            page-break-inside: avoid;
        }
        .print-header-banner {
            display: block !important;
            text-align: center;
            border-bottom: 2px solid #222;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }
    }
    .print-header-banner {
        display: none;
    }
</style>

<!-- Printable Header for physical paper -->
<div class="print-header-banner">
    <h2>{{ $logo->site_name ?? 'Madrasah' }}</h2>
    <h4>{{ $title }}</h4>
</div>

<!-- ================= BANNER / INNER HEADER ================= -->
<section class="admission-hero">
    <div class="container">
        <h1>
            @if($isBn)
                {{ $title ?: 'ভর্তি নির্দেশিকা ও ফি কাঠামো' }}
            @elseif($isAb)
                {{ $title ?: 'دليل القبول والرسوم الدراسية' }}
            @else
                {{ $title ?: 'Admission Guidelines & Fee Structure' }}
            @endif
        </h1>
        <p>
            @if($isBn)
                ইসলামিক ও আধুনিক যুগোপযোগী শিক্ষার সমন্বয়ে আপনার সন্তানের উজ্জ্বল ভবিষ্যৎ গঠনে আমাদের ভর্তি কার্যক্রম ও ফি সংক্রান্ত বিস্তারিত তথ্য।
            @elseif($isAb)
                معلومات شاملة ومفصلة حول شروط وإجراءات القبول والرسوم الدراسية لبناء مستقبل مشرق لأبنائكم.
            @else
                Comprehensive information regarding admission eligibility, step-by-step procedure, tuition & fee structure.
            @endif
        </p>
        <ul class="breadcrumb">
            <li>
                <a href="{{ url('/') }}">
                    <i class="fa fa-home me-1"></i>
                    @if($isBn) হোম @elseif($isAb) الرئيسية @else Home @endif
                </a>
            </li>
            <li class="mx-2 text-white-50">/</li>
            <li class="active">
                @if($isBn) ভর্তি নির্দেশিকা @elseif($isAb) دليل القبول @else Admission Guidelines @endif
            </li>
        </ul>
        <div class="mt-4 d-flex justify-content-center flex-wrap gap-2">
            <a href="{{ route('online.admission') }}" class="btn btn-warning fw-bold px-4 py-2 shadow" style="border-radius: 25px;">
                <i class="fa fa-pencil-square-o me-1"></i> @if($isBn) অনলাইনে ভর্তি আবেদন করুন @elseif($isAb) تقديم طلب القبول @else Apply Online @endif
            </a>
            <a href="{{ route('admission.offline.form') }}" target="_blank" class="btn btn-outline-light fw-bold px-4 py-2 shadow" style="border-radius: 25px;">
                <i class="fa fa-print me-1"></i> @if($isBn) অফলাইন ৫ পৃষ্ঠার ফরম প্রিন্ট @elseif($isAb) تحميل استمارة القبول @else Offline Blank Form @endif
            </a>
            <a href="{{ route('admission.status') }}" class="btn btn-light fw-bold px-4 py-2 shadow text-success" style="border-radius: 25px;">
                <i class="fa fa-search me-1"></i> @if($isBn) আবেদন ট্র্যাকিং @elseif($isAb) متابعة الطلب @else Track Status @endif
            </a>
        </div>
    </div>
</section>

<!-- ================= STICKY QUICK NAVIGATION BAR ================= -->
<div class="admission-nav-wrapper">
    <div class="container">
        <div class="admission-nav-pills" @if($isAb) dir="rtl" @endif>
            <ul class="admission-nav-links">
                @if(!empty($details))
                    <li><a href="#section-details"><i class="fa fa-info-circle me-1"></i> @if($isBn) ভর্তির নিয়মাবলী @elseif($isAb) شروط القبول @else Overview & Rules @endif</a></li>
                @endif
                @if(!empty($process))
                    <li><a href="#section-process"><i class="fa fa-tasks me-1"></i> @if($isBn) ভর্তি প্রক্রিয়া @elseif($isAb) إجراءات القبول @else Admission Process @endif</a></li>
                @endif
                @if(!empty($admissionFees))
                    <li><a href="#section-admission-fees"><i class="fa fa-tag me-1"></i> @if($isBn) ভর্তিকালীন ফি @elseif($isAb) رسوم القبول @else Admission Fees @endif</a></li>
                @endif
                @if(!empty($monthlyFees))
                    <li><a href="#section-monthly-fees"><i class="fa fa-calendar me-1"></i> @if($isBn) মাসিক বেতন @elseif($isAb) الرسوم الشهرية @else Monthly Fees @endif</a></li>
                @endif
                @if(!empty($othersFees))
                    <li><a href="#section-others-fees"><i class="fa fa-plus-circle me-1"></i> @if($isBn) অন্যান্য ফি @elseif($isAb) رسوم أخرى @else Other Fees @endif</a></li>
                @endif
                @if(!empty($paymentRules))
                    <li><a href="#section-payment-rules"><i class="fa fa-file-text me-1"></i> @if($isBn) পরিশোধের নিয়ম @elseif($isAb) قواعد الدفع @else Payment Rules @endif</a></li>
                @endif
                @if(!empty($points))
                    <li><a href="#section-points"><i class="fa fa-check-circle me-1"></i> @if($isBn) নির্দেশনাবলী @elseif($isAb) التعليمات @else Checklist @endif</a></li>
                @endif
            </ul>

            <div class="admission-action-btns">
                <a href="{{ route('online.admission') }}" class="btn-print" style="background: #198754; text-decoration: none;">
                    <i class="fa fa-pencil-square-o me-1"></i> @if($isBn) অনলাইনে আবেদন @elseif($isAb) تقديم طلب @else Apply Online @endif
                </a>
                <a href="{{ route('admission.offline.form') }}" target="_blank" class="btn-print" style="background: #6c757d; text-decoration: none;">
                    <i class="fa fa-file-pdf-o me-1"></i> @if($isBn) অফলাইন ফরম @elseif($isAb) الاستمارة @else Offline Form @endif
                </a>
                <button type="button" class="btn-print" onclick="window.print()">
                    <i class="fa fa-print me-1"></i> @if($isBn) প্রিন্ট করুন @elseif($isAb) طباعة @else Print @endif
                </button>
            </div>
        </div>
    </div>
</div>

<!-- ================= MAIN CONTENT SECTION ================= -->
<div class="container my-5" style="padding-top: 35px; padding-bottom: 50px;" @if($isAb) dir="rtl" @endif>
    <div class="row">
        <div class="col-lg-9 col-md-12">

            <!-- 1. ADMISSION DETAILS & ELIGIBILITY (ভর্তির নিয়মাবলী) -->
            @if(!empty($details))
                <div class="guideline-card" id="section-details">
                    <div class="guideline-card-header header-primary">
                        <h3>
                            <i class="fa fa-graduation-cap text-success"></i>
                            @if($isBn)
                                ভর্তির নিয়মাবলী ও নম্বর বণ্টন (Admission Rules & Eligibility)
                            @elseif($isAb)
                                شروط القبول وتوزيع الدرجات
                            @else
                                Admission Rules & Marks Distribution
                            @endif
                        </h3>
                    </div>
                    <div class="guideline-card-body table-responsive">
                        {!! $details !!}
                    </div>
                </div>
            @endif

            <!-- 2. ADMISSION PROCESS (ভর্তি প্রক্রিয়া) -->
            @if(!empty($process))
                <div class="guideline-card" id="section-process">
                    <div class="guideline-card-header header-info">
                        <h3>
                            <i class="fa fa-list-ol text-info"></i>
                            @if($isBn)
                                ভর্তি প্রক্রিয়া ও ধাপসমূহ (Step-by-Step Admission Process)
                            @elseif($isAb)
                                إجراءات وخطوات القبول
                            @else
                                Admission Process & Steps
                            @endif
                        </h3>
                    </div>
                    <div class="guideline-card-body">
                        {!! $process !!}
                    </div>
                </div>
            @endif

            <!-- 3. ADMISSION FEES (ভর্তিকালীন ফি) -->
            @if(!empty($admissionFees))
                <div class="guideline-card" id="section-admission-fees">
                    <div class="guideline-card-header header-primary">
                        <h3>
                            <i class="fa fa-money text-primary"></i>
                            @if($isBn)
                                ভর্তিকালীন ফি কাঠামো (Admission Fee Structure)
                            @elseif($isAb)
                                جدول رسوم القبول
                            @else
                                Admission Fee Structure
                            @endif
                        </h3>
                    </div>
                    <div class="guideline-card-body table-responsive">
                        {!! $admissionFees !!}
                    </div>
                </div>
            @endif

            <!-- 4. MONTHLY FEES (মাসিক বেতন) -->
            @if(!empty($monthlyFees))
                <div class="guideline-card" id="section-monthly-fees">
                    <div class="guideline-card-header header-primary">
                        <h3>
                            <i class="fa fa-calendar-check-o text-success"></i>
                            @if($isBn)
                                মাসিক বেতন ও অন্যান্য চার্জ (Monthly Tuition & Hostel Fees)
                            @elseif($isAb)
                                الرسوم الشهرية والسكن
                            @else
                                Monthly Tuition & Fees
                            @endif
                        </h3>
                    </div>
                    <div class="guideline-card-body table-responsive">
                        {!! $monthlyFees !!}
                    </div>
                </div>
            @endif

            <!-- 5. OTHERS FEES (অন্যান্য ফি) -->
            @if(!empty($othersFees))
                <div class="guideline-card" id="section-others-fees">
                    <div class="guideline-card-header header-warning">
                        <h3>
                            <i class="fa fa-plus-square text-warning"></i>
                            @if($isBn)
                                অন্যান্য ফি ও খরচাদি (Other Fees & Expenses)
                            @elseif($isAb)
                                الرسوم والمصروفات الأخرى
                            @else
                                Other Fees & Expenses
                            @endif
                        </h3>
                    </div>
                    <div class="guideline-card-body">
                        {!! $othersFees !!}
                    </div>
                </div>
            @endif

            <!-- 6. PAYMENT RULES (ফি পরিশোধের নিয়মাবলী) -->
            @if(!empty($paymentRules))
                <div class="guideline-card" id="section-payment-rules">
                    <div class="guideline-card-header header-danger">
                        <h3>
                            <i class="fa fa-exclamation-triangle text-danger"></i>
                            @if($isBn)
                                মাসিক ফি পরিশোধের নিয়মাবলী (Fee Payment Rules & Policies)
                            @elseif($isAb)
                                قواعد وضوابط سداد الرسوم
                            @else
                                Fee Payment Rules & Policies
                            @endif
                        </h3>
                    </div>
                    <div class="guideline-card-body">
                        {!! $paymentRules !!}
                    </div>
                </div>
            @endif

            <!-- 7. KEY POINTS / CHECKLIST -->
            @if(!empty($points) && count($points) > 0)
                <div class="guideline-card" id="section-points">
                    <div class="guideline-card-header header-info">
                        <h3>
                            <i class="fa fa-check-square-o text-info"></i>
                            @if($isBn)
                                বিশেষ নির্দেশনাবলী ও চেকলিস্ট (Important Checklist)
                            @elseif($isAb)
                                التعليمات والإرشادات الهامة
                            @else
                                Important Instructions & Checklist
                            @endif
                        </h3>
                    </div>
                    <div class="guideline-card-body">
                        <ul class="points-list">
                            @foreach($points as $index => $point)
                                @if(trim($point) !== '')
                                    <li class="points-list-item">
                                        <span class="point-badge">{{ $index + 1 }}</span>
                                        <div>{{ $point }}</div>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif

        </div>

        <!-- ================= SIDEBAR HELPDESK & QUICK LINKS ================= -->
        <div class="col-lg-3 col-md-12">
            <!-- Admission Helpdesk Widget -->
            <div class="card shadow-sm border-0 mb-4" style="border-radius: 12px; overflow: hidden;">
                <div class="card-header bg-success text-white py-3">
                    <h5 class="mb-0 fw-bold">
                        <i class="fa fa-phone me-2"></i>
                        @if($isBn) ভর্তি হেল্পডেস্ক @elseif($isAb) مكتب الاستعلامات @else Admission Helpdesk @endif
                    </h5>
                </div>
                <div class="card-body bg-light">
                    <p class="small text-muted mb-3">
                        @if($isBn)
                            ভর্তি সংক্রান্ত যেকোনো তথ্যের জন্য সরাসরি আমাদের অফিসে যোগাযোগ করুন অথবা কল করুন।
                        @elseif($isAb)
                            للحصول على مزيد من المعلومات والتفاصيل يرجى التواصل معنا مباشرة.
                        @else
                            For any admission queries or assistance, please contact our office directly.
                        @endif
                    </p>
                    <div class="mb-3">
                        <strong class="d-block text-dark"><i class="fa fa-phone text-success me-2"></i> @if($isBn) হেল্পলাইন: @elseif($isAb) الهاتف: @else Helpline: @endif</strong>
                        <span class="text-secondary">{{ $logo->phone ?? '+880 1XXXXXXXXX' }}</span>
                    </div>
                    <div class="mb-3">
                        <strong class="d-block text-dark"><i class="fa fa-envelope text-success me-2"></i> @if($isBn) ইমেইল: @elseif($isAb) البريد: @else Email: @endif</strong>
                        <span class="text-secondary">{{ $logo->email ?? 'info@madrasah.edu' }}</span>
                    </div>
                    <div class="mb-3">
                        <strong class="d-block text-dark"><i class="fa fa-clock-o text-success me-2"></i> @if($isBn) অফিস সময়: @elseif($isAb) ساعات العمل: @else Office Hours: @endif</strong>
                        <span class="text-secondary">@if($isBn) সকাল ৮:০০ - বিকাল ৫:০০ @elseif($isAb) ٨:٠٠ ص - ٥:٠٠ م @else 8:00 AM - 5:00 PM @endif</span>
                    </div>

                    <hr>
                    <a href="{{ route('contacts') }}" class="btn btn-success w-100 fw-bold py-2 shadow-sm">
                        <i class="fa fa-paper-plane me-1"></i> @if($isBn) যোগাযোগ করুন @elseif($isAb) اتصل بنا @else Contact Office @endif
                    </a>
                </div>
            </div>

            <!-- Departments / Courses list -->
            @if(isset($departments) && count($departments) > 0)
                <div class="card shadow-sm border-0 mb-4" style="border-radius: 12px; overflow: hidden;">
                    <div class="card-header bg-dark text-white py-3">
                        <h5 class="mb-0 fw-bold">
                            <i class="fa fa-book me-2"></i>
                            @if($isBn) আমাদের বিভাগসমূহ @elseif($isAb) الأقسام الدراسية @else Departments @endif
                        </h5>
                    </div>
                    <div class="list-group list-group-flush">
                        @foreach($departments as $dept)
                            <a href="{{ route('department.details', $dept->id) }}" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center py-2">
                                <span>
                                    <i class="fa fa-angle-right text-success me-2"></i>
                                    @if($isBn) {{ $dept->title_bn }} @else {{ $dept->title_en }} @endif
                                </span>
                            </a>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>

@endsection
