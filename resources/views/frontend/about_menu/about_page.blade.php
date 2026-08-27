@extends('frontend.master')

@section('title')
    @if(session()->get('language') == 'bangla') আমাদের সম্পর্কে | মুক্বাদ্দামাতুল কোরআন ইসলামী একাডেমি
    @elseif (session()->get('language') == 'arabic') معلومات عنا | أكاديمية مقدمة القرآن الإسلامية
    @else About Us | Muqaddamatul Quran Islami Academy
    @endif
@endsection

@section('content')
@php
    $currentLang = session()->get('language');
    $isBn = ($currentLang == 'bangla');
    $isAb = ($currentLang == 'arabic');

    $pageTitle = $isBn ? ($about->title_bangla ?? 'আমাদের পরিচিতি') : ($isAb ? ($about->title_ab ?? 'نبذة عن الأكاديمية') : ($about->title ?? 'About Our Institution'));
    $mainDes   = $isBn ? ($about->des_bangla ?? $about->des_eng) : ($isAb ? ($about->des_ab ?? $about->des_eng) : ($about->des_eng ?? ''));
    $specialties     = $isBn ? ($about->specialties_bn ?? $about->specialties) : ($isAb ? ($about->specialties_ab ?? $about->specialties) : ($about->specialties ?? ''));
    $features        = $isBn ? ($about->features_bn ?? $about->features) : ($isAb ? ($about->features_ab ?? $about->features) : ($about->features ?? ''));
    $hifzDetails     = $isBn ? ($about->hifz_edu_details_bn ?? $about->hifz_edu_details) : ($isAb ? ($about->hifz_edu_details_ab ?? $about->hifz_edu_details) : ($about->hifz_edu_details ?? ''));
    $achievements    = $isBn ? ($about->achievement_bn ?? $about->achievement) : ($isAb ? ($about->achievement_ab ?? $about->achievement) : ($about->achievement ?? ''));
    $intAchievements = $isBn ? ($about->int_achievement_bn ?? $about->int_achievement) : ($isAb ? ($about->int_achievement_ab ?? $about->int_achievement) : ($about->int_achievement ?? ''));

    $bannerImg = ($about && $about->banner_image && file_exists(public_path($about->banner_image)))
        ? asset($about->banner_image)
        : (($banner && $banner->image && file_exists(public_path($banner->image)))
            ? asset($banner->image)
            : asset('frontend/images/bg/bg1.jpg'));
@endphp

<style>
    /* Custom Styling for Redesigned About Page */
    .about-hero-section {
        position: relative;
        background: linear-gradient(135deg, rgba(16, 44, 30, 0.88), rgba(6, 78, 59, 0.85)), url('{{ $bannerImg }}') center/cover no-repeat;
        padding: 90px 0 70px 0;
        color: #ffffff;
        text-align: center;
    }
    .about-hero-section h1 {
        font-size: 38px;
        font-weight: 800;
        color: #ffffff;
        margin-bottom: 12px;
        letter-spacing: -0.5px;
    }
    .about-hero-section .breadcrumb {
        background: rgba(255, 255, 255, 0.12);
        display: inline-block;
        padding: 8px 24px;
        border-radius: 30px;
        margin-bottom: 0;
        backdrop-filter: blur(4px);
    }
    .about-hero-section .breadcrumb a {
        color: #e2e8f0;
        font-weight: 500;
        text-decoration: none;
    }
    .about-hero-section .breadcrumb .active {
        color: #a7f3d0;
        font-weight: 700;
    }

    /* Core Intro Section */
    .intro-badge {
        display: inline-block;
        background: #ecfdf5;
        color: #065f46;
        font-size: 13px;
        font-weight: 700;
        padding: 6px 16px;
        border-radius: 20px;
        border: 1px solid #a7f3d0;
        margin-bottom: 15px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    .about-main-title {
        font-size: 32px;
        font-weight: 800;
        color: #111827;
        line-height: 1.35;
        margin-bottom: 20px;
        position: relative;
        padding-bottom: 15px;
    }
    .about-main-title::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 60px;
        height: 4px;
        background: #10b981;
        border-radius: 2px;
    }
    .rtl-text .about-main-title::after {
        left: auto;
        right: 0;
    }
    .about-des-body {
        font-size: 16px;
        line-height: 1.8;
        color: #374151;
    }
    .about-des-body p {
        margin-bottom: 16px;
    }

    /* Image Showcase Frame */
    .about-img-frame {
        position: relative;
        padding: 15px;
    }
    .about-img-main {
        width: 100%;
        border-radius: 16px;
        box-shadow: 0 20px 35px -10px rgba(0, 0, 0, 0.18);
        border: 4px solid #ffffff;
        object-fit: cover;
    }
    .about-img-secondary {
        position: absolute;
        bottom: -20px;
        right: 0;
        width: 55%;
        border-radius: 12px;
        border: 4px solid #ffffff;
        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
        object-fit: cover;
    }
    .rtl-text .about-img-secondary {
        right: auto;
        left: 0;
    }
    .experience-badge {
        position: absolute;
        top: 25px;
        left: 25px;
        background: #065f46;
        color: #ffffff;
        padding: 12px 20px;
        border-radius: 12px;
        box-shadow: 0 10px 20px rgba(6, 95, 70, 0.3);
        text-align: center;
        z-index: 2;
    }
    .experience-badge h4 {
        color: #ffffff;
        font-weight: 800;
        margin: 0;
        font-size: 22px;
    }
    .experience-badge span {
        font-size: 11px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        opacity: 0.9;
    }

    /* Quick Feature Highlight Points */
    .about-feature-box {
        display: flex;
        align-items: center;
        background: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 14px;
        padding: 16px 18px;
        margin-bottom: 20px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.04);
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        position: relative;
        overflow: hidden;
    }
    .about-feature-box:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
        border-color: #10b981;
    }
    .about-feature-box::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        height: 3px;
        width: 0%;
        background: linear-gradient(90deg, #10b981, #059669);
        transition: width 0.3s ease;
    }
    .about-feature-box:hover::after {
        width: 100%;
    }
    .feature-icon-badge {
        width: 48px;
        height: 48px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 20px;
        flex-shrink: 0;
        margin-right: 15px;
        transition: transform 0.3s ease;
    }
    .about-feature-box:hover .feature-icon-badge {
        transform: scale(1.08);
    }
    .rtl-text .feature-icon-badge {
        margin-right: 0;
        margin-left: 15px;
    }
    .badge-emerald {
        background: #ecfdf5;
        color: #059669;
        border: 1px solid #a7f3d0;
    }
    .badge-blue {
        background: #eff6ff;
        color: #2563eb;
        border: 1px solid #bfdbfe;
    }
    .feature-text-wrap {
        flex-grow: 1;
    }
    .feature-title {
        font-size: 15px;
        font-weight: 700;
        color: #111827;
        margin: 0 0 3px 0;
        line-height: 1.35;
    }
    .feature-subtitle {
        font-size: 13px;
        color: #64748b;
        margin: 0;
        line-height: 1.35;
        font-weight: 500;
    }

    /* Feature & Specialty Cards */
    .info-card-box {
        background: #ffffff;
        border-radius: 16px;
        padding: 35px 30px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
        border: 1px solid #e5e7eb;
        height: 100%;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }
    .info-card-box:hover {
        transform: translateY(-5px);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
    }
    .info-card-box::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 5px;
    }
    .card-specialties::before {
        background: linear-gradient(90deg, #10b981, #059669);
    }
    .card-features::before {
        background: linear-gradient(90deg, #3b82f6, #1d4ed8);
    }
    .card-hifz::before {
        background: linear-gradient(90deg, #f59e0b, #d97706);
    }

    .card-header-icon {
        width: 56px;
        height: 56px;
        border-radius: 14px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
        margin-bottom: 20px;
    }
    .icon-emerald {
        background: #ecfdf5;
        color: #059669;
    }
    .icon-blue {
        background: #eff6ff;
        color: #2563eb;
    }
    .icon-gold {
        background: #fffbeb;
        color: #d97706;
    }
    .icon-purple {
        background: #f5f3ff;
        color: #7c3aed;
    }
    .icon-orange {
        background: #fff7ed;
        color: #ea580c;
    }

    .card-title-text {
        font-size: 22px;
        font-weight: 800;
        color: #111827;
        margin-bottom: 18px;
    }

    .styled-content-list ul {
        list-style: none;
        padding-left: 0;
        margin: 0;
    }
    .rtl-text .styled-content-list ul {
        padding-right: 0;
    }
    .styled-content-list li {
        position: relative;
        padding-left: 28px;
        margin-bottom: 14px;
        font-size: 15px;
        line-height: 1.6;
        color: #374151;
    }
    .rtl-text .styled-content-list li {
        padding-left: 0;
        padding-right: 28px;
    }
    .styled-content-list li::before {
        content: "\f00c";
        font-family: 'FontAwesome';
        position: absolute;
        left: 0;
        top: 2px;
        font-size: 13px;
        width: 20px;
        height: 20px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .rtl-text .styled-content-list li::before {
        left: auto;
        right: 0;
    }
    .card-specialties .styled-content-list li::before {
        background: #ecfdf5;
        color: #059669;
    }
    .card-features .styled-content-list li::before {
        background: #eff6ff;
        color: #2563eb;
    }
    .card-hifz .styled-content-list li::before {
        background: #fffbeb;
        color: #d97706;
    }
    .card-achievement .styled-content-list li::before {
        background: #fff7ed;
        color: #ea580c;
    }
    .card-int-achievement .styled-content-list li::before {
        background: #f5f3ff;
        color: #7c3aed;
    }

    /* Image-Matching Achievements Section Styles */
    .achievements-super-header {
        background: linear-gradient(135deg, #09472a, #063821);
        color: #ffffff;
        padding: 16px 24px;
        border-radius: 12px;
        box-shadow: 0 6px 20px rgba(9, 71, 42, 0.2);
        border-bottom: 4px solid #ea580c;
    }
    .achievements-super-header h3 {
        color: #ffffff;
        font-size: 24px;
        font-weight: 800;
        letter-spacing: 0.2px;
    }
    .achievement-card-modern {
        background: #ffffff;
        border: 2px solid #e5e7eb;
        border-radius: 14px;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(0,0,0,0.06);
        height: 100%;
        display: flex;
        flex-direction: column;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .achievement-card-modern:hover {
        transform: translateY(-4px);
        box-shadow: 0 16px 35px rgba(0,0,0,0.12);
    }
    .achievement-header-wrapper {
        background: linear-gradient(90deg, #ea580c, #f59e0b);
        padding: 3px;
        padding-bottom: 0;
    }
    .achievement-header-banner {
        background: #084c2e;
        background: linear-gradient(135deg, #09472a, #053b21);
        color: #ffffff;
        padding: 14px 20px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        clip-path: polygon(0 0, calc(100% - 24px) 0, 100% 50%, calc(100% - 24px) 100%, 0 100%);
    }
    .rtl-text .achievement-header-banner {
        clip-path: polygon(24px 0, 100% 0, 100% 100%, 24px 100%, 0 50%);
    }
    .achievement-header-banner h4 {
        color: #ffffff;
        font-size: 20px;
        font-weight: 800;
        margin-bottom: 0;
        letter-spacing: 0.2px;
    }
    .achievement-card-body {
        padding: 24px 24px 20px 24px;
        flex-grow: 1;
        background: #ffffff;
    }
    .achievement-card-modern .styled-content-list li {
        font-size: 15.5px;
        font-weight: 500;
        line-height: 1.7;
        color: #1f2937;
        padding-left: 28px;
        margin-bottom: 12px;
        border-bottom: 1px dashed #f3f4f6;
        padding-bottom: 10px;
    }
    .rtl-text .achievement-card-modern .styled-content-list li {
        padding-left: 0;
        padding-right: 28px;
    }
    .achievement-card-modern .styled-content-list li:last-child {
        border-bottom: none;
        margin-bottom: 0;
        padding-bottom: 0;
    }
    .achievement-card-modern .styled-content-list li::before {
        background: #ecfdf5;
        color: #059669;
        font-size: 11px;
    }

    /* Highlight Banner Strip */
    .highlight-strip {
        background: linear-gradient(135deg, #064e3b, #047857);
        color: #ffffff;
        border-radius: 18px;
        padding: 40px;
        margin: 50px 0;
        box-shadow: 0 20px 40px rgba(6, 78, 59, 0.25);
    }
    .highlight-strip h3 {
        color: #ffffff;
        font-weight: 800;
        font-size: 26px;
        margin-bottom: 12px;
    }
    .highlight-strip p {
        color: #d1fae5;
        font-size: 16px;
        line-height: 1.7;
        margin-bottom: 0;
    }

    /* CTA Section */
    .cta-button-group .btn {
        padding: 12px 30px;
        font-size: 15px;
        font-weight: 700;
        border-radius: 30px;
        margin-right: 12px;
        transition: all 0.3s;
    }
    .btn-gold {
        background: #f59e0b;
        color: #111827;
        border: none;
    }
    .btn-gold:hover {
        background: #d97706;
        color: #ffffff;
        transform: translateY(-2px);
    }
    .btn-outline-white {
        background: transparent;
        color: #ffffff;
        border: 2px solid rgba(255, 255, 255, 0.7);
    }
    .btn-outline-white:hover {
        background: #ffffff;
        color: #065f46;
    }

    /* Teacher Cards */
    .team-box-modern {
        background: #ffffff;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 10px 25px rgba(0,0,0,0.06);
        border: 1px solid #f3f4f6;
        margin-bottom: 30px;
        transition: all 0.3s;
        text-align: center;
    }
    .team-box-modern:hover {
        transform: translateY(-6px);
        box-shadow: 0 18px 35px rgba(0,0,0,0.12);
    }
    .team-box-modern .team-img-wrap {
        height: 260px;
        overflow: hidden;
        background: #f9fafb;
    }
    .team-box-modern .team-img-wrap img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.4s;
    }
    .team-box-modern:hover .team-img-wrap img {
        transform: scale(1.05);
    }
    .team-box-modern .team-body {
        padding: 20px;
    }
    .team-box-modern .team-name {
        font-size: 18px;
        font-weight: 800;
        color: #111827;
        margin-bottom: 4px;
    }
    .team-box-modern .team-role {
        font-size: 13px;
        color: #059669;
        font-weight: 600;
        margin-bottom: 12px;
        display: block;
    }
    .team-social-icons a {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 32px;
        height: 32px;
        border-radius: 50%;
        background: #f3f4f6;
        color: #4b5563;
        margin: 0 3px;
        font-size: 13px;
        transition: all 0.2s;
    }
    .team-social-icons a:hover {
        background: #059669;
        color: #ffffff;
    }
</style>

<div class="main-content {{ $isAb ? 'rtl-text' : '' }}" @if($isAb) dir="rtl" @endif>

    <!-- 1. Hero / Breadcrumb Section -->
    <section class="about-hero-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>
                        @if($isBn) আমাদের পরিচিতি ও কার্যক্রম
                        @elseif ($isAb) معلومات عنا وبرامجنا
                        @else About Us & Academic Programs
                        @endif
                    </h1>
                    <ul class="breadcrumb">
                        <li>
                            <a href="{{ route('front.page') }}">
                                <i class="fa fa-home me-1"></i>
                                @if($isBn) হোম @elseif ($isAb) الرئيسية @else Home @endif
                            </a>
                        </li>
                        <li class="active">
                            @if($isBn) আমাদের সম্পর্কে @elseif ($isAb) معلومات عنا @else About Us @endif
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- 2. Core About Introduction Section -->
    <section class="pt-80 pb-60 bg-white">
        <div class="container">
            <div class="row align-items-center">
                <!-- Left: Visual Image Frame -->
                <div class="col-lg-6 mb-40">
                    <div class="about-img-frame">
                        <div class="experience-badge">
                            <h4><i class="fa fa-quran"></i></h4>
                            <span>
                                @if($isBn) দ্বীনি ও আধুনিক শিক্ষা @elseif($isAb) تعليم قرآني وعصري @else Islamic & Modern @endif
                            </span>
                        </div>
                        @if($about && $about->image1 && file_exists(public_path($about->image1)))
                            <img src="{{ asset($about->image1) }}" alt="About Image 1" class="about-img-main">
                        @else
                            <img src="{{ asset('frontend/images/about/about1.jpg') }}" alt="About Image" class="about-img-main">
                        @endif

                        @if($about && $about->image2 && file_exists(public_path($about->image2)))
                            <img src="{{ asset($about->image2) }}" alt="About Image 2" class="about-img-secondary d-none d-md-block">
                        @endif
                    </div>
                </div>

                <!-- Right: Description Content -->
                <div class="col-lg-6 mb-40">
                    <div class="ps-lg-4">
                        <span class="intro-badge">
                            <i class="fa fa-shield-alt me-1"></i>
                            @if($isBn) আদর্শ দ্বীনি শিক্ষাপ্রতিষ্ঠান @elseif($isAb) مؤسسة تعليمية نموذجية @else Model Islamic Institution @endif
                        </span>

                        <h2 class="about-main-title">{{ $pageTitle }}</h2>

                        <div class="about-des-body">
                            {!! $mainDes !!}
                        </div>

                        <!-- Quick Feature Points -->
                        <div class="row pt-20">
                            <div class="col-sm-6 col-xs-12 mb-20">
                                <div class="about-feature-box">
                                    <div class="feature-icon-badge badge-emerald">
                                        <i class="fa fa-certificate"></i>
                                    </div>
                                    <div class="feature-text-wrap">
                                        <h6 class="feature-title">
                                            @if($isBn) আন্তর্জাতিক মানের তাজবীদ @elseif($isAb) تجويد وإتقان دولي @else Authentic Tajweed @endif
                                        </h6>
                                        <p class="feature-subtitle">
                                            @if($isBn) বিশুদ্ধ মাশক ও তালিম @elseif($isAb) نطق متقن صحيح @else Pure Recitation @endif
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-xs-12 mb-20">
                                <div class="about-feature-box">
                                    <div class="feature-icon-badge badge-blue">
                                        <i class="fa fa-user-graduate"></i>
                                    </div>
                                    <div class="feature-text-wrap">
                                        <h6 class="feature-title">
                                            @if($isBn) অভিজ্ঞ ও দক্ষ শিক্ষক @elseif($isAb) كادر تعليمي متميز @else Expert Faculty @endif
                                        </h6>
                                        <p class="feature-subtitle">
                                            @if($isBn) আন্তর্জাতিক ক্বারীগণ @elseif($isAb) حفاظ وقراء دوليون @else Certified Huffaz @endif
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="pt-25 cta-button-group">
                            <a href="{{ route('admission.guidelines') }}" class="btn btn-gold shadow-sm">
                                <i class="fa fa-file-alt me-1"></i>
                                @if($isBn) ভর্তি নির্দেশিকা ও ফি কাঠামো @elseif($isAb) شروط القبول والرسوم @else Admission & Fee Structure @endif
                            </a>
                            <a href="{{ route('contacts') }}" class="btn btn-outline-secondary">
                                <i class="fa fa-envelope me-1"></i>
                                @if($isBn) যোগাযোগ করুন @elseif($isAb) تواصل معنا @else Contact Us @endif
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 3. Tri-Pillar Information Section (Specialties, Features, Hifz Curriculum) -->
    <section class="pt-60 pb-80" style="background-color: #f8fafc;">
        <div class="container">
            <div class="row mb-50">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center" style="width: 100%; text-align: center; float: none; clear: both;">
                    <div style="max-width: 800px; margin: 0 auto; text-align: center; display: inline-block;">
                        <span class="intro-badge" style="margin: 0 auto 15px auto; display: inline-block;">
                            <i class="fa fa-star me-1"></i>
                            @if($isBn) আমাদের অনন্য বৈশিষ্ট্য @elseif($isAb) ركائز التميز لدينا @else Pillars of Excellence @endif
                        </span>
                        <h2 class="fw-bold mb-3" style="font-size: 32px; color: #111827; text-align: center; margin-top: 0;">
                            @if($isBn) বিশেষত্ব, প্রাতিষ্ঠানিক সুবিধা ও হিফজ পাঠ্যক্রম
                            @elseif ($isAb) المميزات والخصائص والمناهج القرآنية
                            @else Institutional Specialties & Hifz Curriculum
                            @endif
                        </h2>
                        <p class="text-muted" style="font-size: 16px; margin: 0 auto; text-align: center; max-width: 680px;">
                            @if($isBn) কুরআনুল কারীমের বিশুদ্ধ হিফজ ও আধুনিক সমন্বিত শিক্ষার পরিপূর্ণ দিকনির্দেশনা
                            @elseif ($isAb) رؤية تعليمية وتربوية متكاملة لصناعة جيل قرآني فريد
                            @else Dedicated to holistic spiritual nurturing and modern academic excellence
                            @endif
                        </p>
                    </div>
                </div>
            </div>

            <div class="row g-4">
                <!-- 1. Specialties (আমাদের বিশেষত্ব) -->
                <div class="col-lg-4 col-md-6 mb-30">
                    <div class="info-card-box card-specialties">
                        <div class="card-header-icon icon-emerald">
                            <i class="fa fa-star"></i>
                        </div>
                        <h3 class="card-title-text">
                            @if($isBn) আমাদের বিশেষত্ব
                            @elseif ($isAb) مميزاتنا الخاصة
                            @else Our Specialties
                            @endif
                        </h3>
                        <div class="styled-content-list">
                            {!! $specialties !!}
                        </div>
                    </div>
                </div>

                <!-- 2. Features (আমাদের বৈশিষ্ট্য) -->
                <div class="col-lg-4 col-md-6 mb-30">
                    <div class="info-card-box card-features">
                        <div class="card-header-icon icon-blue">
                            <i class="fa fa-check-circle"></i>
                        </div>
                        <h3 class="card-title-text">
                            @if($isBn) আমাদের বৈশিষ্ট্য
                            @elseif ($isAb) خصائصنا ومميزاتنا
                            @else Our Features
                            @endif
                        </h3>
                        <div class="styled-content-list">
                            {!! $features !!}
                        </div>
                    </div>
                </div>

                <!-- 3. Hifz Education (হিফয শিক্ষা কার্যক্রম) -->
                <div class="col-lg-4 col-md-12 mb-30">
                    <div class="info-card-box card-hifz">
                        <div class="card-header-icon icon-gold">
                            <i class="fa fa-book-open"></i>
                        </div>
                        <h3 class="card-title-text">
                            @if($isBn) হিফয শিক্ষা কার্যক্রম
                            @elseif ($isAb) برنامج تحفيظ القرآن الكريم
                            @else Hifz Education Program
                            @endif
                        </h3>
                        <div class="styled-content-list">
                            {!! $hifzDetails !!}
                        </div>
                    </div>
                </div>
            </div>

            @if(!empty(strip_tags($intAchievements)) || !empty(strip_tags($achievements)))
            <!-- Achievements Super Header (হুবহু ইমেজ ডিজাইন অনুসারে) -->
            <div class="row pt-40 mb-30">
                <div class="col-12">
                    <div class="achievements-super-header text-center">
                        <h3 class="mb-0 fw-bold">
                            <i class="fa fa-award me-2 text-warning"></i>
                            @if($isBn) হাফেজ ক্বারী মাওঃ আবু তাহের গুলজারী সাহেবের ছাত্রদের কৃতিত্ব
                            @elseif ($isAb) إنجازات طلاب فضيلة الشيخ القارئ الحافظ أبو طاهر الجلذاري
                            @else Achievements of the Students of Hafez Qari Mawlana Abu Taher Gulzari
                            @endif
                        </h3>
                    </div>
                </div>
            </div>

            <div class="row g-4 mb-30">
                @if(!empty(strip_tags($intAchievements)))
                <!-- 4. International Achievements (আন্তর্জাতিক হিফযুল কুরআন প্রতিযোগিতা) -->
                <div class="col-lg-{{ !empty(strip_tags($achievements)) ? '6' : '12' }} mb-30">
                    <div class="achievement-card-modern">
                        <div class="achievement-header-wrapper">
                            <div class="achievement-header-banner">
                                <h4>
                                    <i class="fa fa-globe me-2 text-warning"></i>
                                    @if($isBn) আন্তর্জাতিক হিফযুল কুরআন প্রতিযোগিতা
                                    @elseif ($isAb) المسابقات الدولية لحفظ القرآن الكريم
                                    @else International Holy Quran Competition
                                    @endif
                                </h4>
                            </div>
                        </div>
                        <div class="achievement-card-body">
                            <div class="styled-content-list">
                                {!! $intAchievements !!}
                            </div>
                        </div>
                    </div>
                </div>
                @endif

                @if(!empty(strip_tags($achievements)))
                <!-- 5. Institutional Achievements (মুক্বাদ্দামাতুল কুরআন হিফয মাদরাসার সফলতা) -->
                <div class="col-lg-{{ !empty(strip_tags($intAchievements)) ? '6' : '12' }} mb-30">
                    <div class="achievement-card-modern">
                        <div class="achievement-header-wrapper">
                            <div class="achievement-header-banner">
                                <h4>
                                    <i class="fa fa-trophy me-2 text-warning"></i>
                                    @if($isBn) মুক্বাদ্দামাতুল কুরআন হিফয মাদরাসার সফলতা
                                    @elseif ($isAb) نجاحات وإنجازات أكاديمية مقدمة القرآن الكريم
                                    @else Success & Achievements of Muqaddamatul Quran Madrasah
                                    @endif
                                </h4>
                            </div>
                        </div>
                        <div class="achievement-card-body">
                            <div class="styled-content-list">
                                {!! $achievements !!}
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            </div>
            @endif

            <!-- Highlight Strip Banner -->
            <div class="highlight-strip">
                <div class="row align-items-center">
                    <div class="col-lg-8 mb-20 mb-lg-0">
                        <h3>
                            <i class="fa fa-quote-left me-2 text-warning"></i>
                            @if($isBn) ৩ বছরে সম্পূর্ণ কুরআন হিফজ ও ক্লাসভিত্তিক আধুনিক শিক্ষা
                            @elseif ($isAb) حفظ القرآن الكريم كاملاً خلال ٣ سنوات مع مناهج دراسية متطورة
                            @else Complete Quran Hifz in 3 Years with Class-Based General Education
                            @endif
                        </h3>
                        <p>
                            @if($isBn) আন্তর্জাতিক মানের হাফেজ-ক্বারী দ্বারা পরিচালিত এবং প্রবাসী অভিভাবকদের সন্তানদের জন্য রয়েছে বিশেষ যত্নশীল আবাসিক ব্যবস্থা।
                            @elseif ($isAb) تحت إشراف نخبة من كبار القراء، مع رعاية سكنية وتربوية فائقة لأبناء المغتربين.
                            @else Supervised by international-standard Huffaz & Qaris with dedicated residential care for children of expatriates.
                            @endif
                        </p>
                    </div>
                    <div class="col-lg-4 text-lg-end text-start">
                        <a href="{{ route('admission.guidelines') }}" class="btn btn-gold px-4 py-3 fw-bold shadow">
                            <i class="fa fa-graduation-cap me-1"></i>
                            @if($isBn) ভর্তি তথ্য জানুন @elseif($isAb) تفاصيل التسجيل @else Admission Info @endif
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 5. Instructors / Teachers Section (If Available) -->
    @if(isset($teams) && count($teams) > 0)
    <section class="pt-80 pb-70 bg-white">
        <div class="container">
            <div class="row mb-50">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center" style="width: 100%; text-align: center; float: none; clear: both;">
                    <div style="max-width: 800px; margin: 0 auto; text-align: center; display: inline-block;">
                        <span class="intro-badge" style="margin: 0 auto 15px auto; display: inline-block;">
                            <i class="fa fa-users me-1"></i>
                            @if($isBn) আমাদের শিক্ষকমণ্ডলী @elseif($isAb) الهيئة التعليمية @else Faculty & Mentors @endif
                        </span>
                        <h2 class="fw-bold mb-3" style="font-size: 32px; color: #111827; text-align: center; margin-top: 0;">
                            @if($isBn) অভিজ্ঞ ও নিবেদিতপ্রাণ শিক্ষকবৃন্দ
                            @elseif ($isAb) نخبة الأساتذة والمشرفين الأكفاء
                            @else Our Experienced & Dedicated Instructors
                            @endif
                        </h2>
                        <p class="text-muted" style="font-size: 16px; margin: 0 auto; text-align: center; max-width: 680px;">
                            @if($isBn) জাতীয় ও আন্তর্জাতিক মানের হাফেজ, ক্বারী ও দক্ষ শিক্ষকমণ্ডলী
                            @elseif ($isAb) نخبة من خيرة الحفاظ والتربويين المؤهلين
                            @else Distinguished scholars, certified Qaris, and academic educators
                            @endif
                        </p>
                    </div>
                </div>
            </div>

            <div class="row">
                @foreach($teams as $team)
                <div class="col-lg-3 col-md-6 col-sm-6 mb-30">
                    <div class="team-box-modern">
                        <div class="team-img-wrap">
                            @if($team->image && file_exists(public_path($team->image)))
                                <img src="{{ asset($team->image) }}" alt="{{ $team->name }}">
                            @else
                                <div class="d-flex align-items-center justify-content-center h-100 bg-light text-muted">
                                    <i class="fa fa-user fa-3x"></i>
                                </div>
                            @endif
                        </div>
                        <div class="team-body">
                            <h4 class="team-name">{{ $team->name }}</h4>
                            <span class="team-role">{{ $team->designation ?? 'Instructor' }}</span>
                            <div class="team-social-icons">
                                @if($team->facebook)
                                    <a href="{{ $team->facebook }}" target="_blank"><i class="fa fa-facebook"></i></a>
                                @endif
                                @if($team->youtube)
                                    <a href="{{ $team->youtube }}" target="_blank"><i class="fa fa-youtube-play"></i></a>
                                @endif
                                @if($team->linkedIn)
                                    <a href="{{ $team->linkedIn }}" target="_blank"><i class="fa fa-linkedin"></i></a>
                                @endif
                                @if($team->instagram)
                                    <a href="{{ $team->instagram }}" target="_blank"><i class="fa fa-instagram"></i></a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

</div>
@endsection
