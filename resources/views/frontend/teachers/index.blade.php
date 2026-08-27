@extends('frontend.master')

@section('title')
    @if(session()->get('language')=='bangla') আমাদের সুযোগ্য শিক্ষকমণ্ডলী | @elseif (session()->get('language')=='arabic') الهيئة التعليمية | @else Faculty & Instructors | @endif
@endsection

@section('content')

@php
    $lang = session()->get('language', 'bangla');
    $isBn = ($lang == 'bangla' || empty($lang));
    $isAb = ($lang == 'arabic');
@endphp

<style>
    .teachers-hero-section {
        background: linear-gradient(135deg, #0d2818 0%, #1b4332 60%, #2d6a4f 100%);
        padding: 60px 0 50px;
        position: relative;
        overflow: hidden;
    }
    .teachers-hero-section::before {
        content: "";
        position: absolute;
        top: 0; left: 0; right: 0; bottom: 0;
        background: radial-gradient(circle at top right, rgba(255,255,255,0.08) 0%, transparent 60%);
    }
    .teacher-filter-nav {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        justify-content: center;
        margin-bottom: 35px;
    }
    .teacher-filter-btn {
        padding: 9px 22px;
        font-size: 15px;
        font-weight: 600;
        border-radius: 50px;
        background: #ffffff;
        color: #2d3748;
        border: 2px solid #e2e8f0;
        text-decoration: none;
        transition: all 0.3s ease;
        box-shadow: 0 2px 4px rgba(0,0,0,0.04);
        display: inline-flex;
        align-items: center;
        gap: 6px;
    }
    .teacher-filter-btn:hover {
        background: #e8f5e9;
        color: #1b4332;
        border-color: #2d6a4f;
        transform: translateY(-2px);
    }
    .teacher-filter-btn.active {
        background: #1b4332;
        color: #ffffff;
        border-color: #1b4332;
        box-shadow: 0 4px 12px rgba(27, 67, 50, 0.3);
    }
    .teacher-filter-btn .cat-count {
        font-size: 12px;
        padding: 2px 7px;
        border-radius: 20px;
        background: rgba(0,0,0,0.08);
    }
    .teacher-filter-btn.active .cat-count {
        background: rgba(255,255,255,0.25);
        color: #ffffff;
    }

    /* Teacher Card Modern */
    .teacher-card-modern {
        background: #ffffff;
        border-radius: 16px;
        overflow: hidden;
        border: 1px solid #e5e7eb;
        box-shadow: 0 4px 15px rgba(0,0,0,0.05);
        transition: all 0.35s ease;
        display: flex;
        flex-direction: column;
        height: 100%;
        margin-bottom: 30px;
    }
    .teacher-card-modern:hover {
        transform: translateY(-7px);
        box-shadow: 0 15px 30px rgba(27, 67, 50, 0.15);
        border-color: #52b788;
    }
    .teacher-card-img-wrap {
        position: relative;
        height: 270px;
        background: linear-gradient(180deg, #f3f4f6 0%, #e5e7eb 100%);
        overflow: hidden;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .teacher-card-img-wrap img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: top center;
        transition: transform 0.5s ease;
    }
    .teacher-card-modern:hover .teacher-card-img-wrap img {
        transform: scale(1.05);
    }
    .teacher-cat-badge {
        position: absolute;
        top: 14px;
        left: 14px;
        background: rgba(27, 67, 50, 0.9);
        color: #ffffff;
        font-size: 12px;
        font-weight: 600;
        padding: 4px 12px;
        border-radius: 20px;
        backdrop-filter: blur(4px);
        box-shadow: 0 2px 8px rgba(0,0,0,0.2);
    }
    .teacher-card-body {
        padding: 22px;
        display: flex;
        flex-direction: column;
        flex-grow: 1;
    }
    .teacher-name {
        font-size: 20px;
        font-weight: 700;
        color: #111827;
        margin-top: 0;
        margin-bottom: 6px;
        line-height: 1.3;
    }
    .teacher-designation {
        font-size: 14px;
        font-weight: 600;
        color: #1b4332;
        margin-bottom: 12px;
        display: inline-block;
    }
    .teacher-subject {
        background: #f0fdf4;
        border: 1px solid #bbf7d0;
        color: #166534;
        font-size: 12px;
        font-weight: 600;
        padding: 4px 10px;
        border-radius: 6px;
        display: inline-block;
        margin-bottom: 12px;
    }
    .teacher-qualification {
        font-size: 13px;
        color: #4b5563;
        line-height: 1.5;
        margin-bottom: 15px;
        flex-grow: 1;
    }
    .teacher-contact-bar {
        border-top: 1px solid #f3f4f6;
        padding-top: 14px;
        margin-top: auto;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    .teacher-socials {
        display: flex;
        gap: 6px;
    }
    .teacher-socials a {
        width: 32px;
        height: 32px;
        border-radius: 50%;
        background: #f3f4f6;
        color: #374151;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 13px;
        text-decoration: none;
        transition: all 0.2s ease;
    }
    .teacher-socials a:hover {
        background: #1b4332;
        color: #ffffff;
    }
    .btn-profile-view {
        background: #1b4332;
        color: #ffffff !important;
        font-size: 13px;
        font-weight: 600;
        padding: 6px 14px;
        border-radius: 6px;
        text-decoration: none;
        transition: all 0.2s ease;
        border: 1px solid #1b4332;
    }
    .btn-profile-view:hover {
        background: #2d6a4f;
        box-shadow: 0 3px 8px rgba(27,67,50,0.3);
    }
</style>

<!-- Hero / Breadcrumb Section -->
<div class="teachers-hero-section">
    <div class="container text-center text-white" style="position: relative; z-index: 2;">
        <span class="badge px-3 py-2 mb-3" style="background: rgba(255,255,255,0.15); color: #95d5b2; font-size: 14px; border: 1px solid rgba(255,255,255,0.2);">
            <i class="fa fa-graduation-cap me-1"></i>
            @if($isBn) আসাতীযা ও শিক্ষকমণ্ডলী @elseif($isAb) الهيئة التعليمية @else Faculty & Mentors @endif
        </span>
        <h1 class="fw-bold mb-2 text-white" style="font-size: 36px; margin-top: 0;">
            @if($isBn) আমাদের অভিজ্ঞ ও নিবেদিতপ্রাণ শিক্ষকবৃন্দ
            @elseif($isAb) نخبة الأساتذة والمشرفين الأكفاء
            @else Our Experienced & Dedicated Instructors
            @endif
        </h1>
        <p class="mb-0" style="color: #d8f3dc; font-size: 16px; max-width: 650px; margin: 0 auto;">
            @if($isBn) জাতীয় ও আন্তর্জাতিক মানের হাফেজ, ক্বারী, মুফাসসির এবং দক্ষ শিক্ষকমণ্ডলীর সার্বিক তত্ত্বাবধান
            @elseif($isAb) نخبة من خيرة الحفاظ والتربويين المؤهلين لتعليم أبنائكم
            @else Qualified scholars, certified Qaris, and caring educators dedicated to Islamic excellence.
            @endif
        </p>
    </div>
</div>

<!-- Main Teachers Section -->
<section class="pt-50 pb-70" style="background-color: #f8fafc; min-height: 500px;">
    <div class="container">

        <!-- Search & Filter Controls -->
        <div class="row justify-content-center mb-4">
            <div class="col-md-6 text-center">
                <form action="{{ route('frontend.teachers.index') }}" method="GET" class="d-flex gap-2">
                    @if(request('category'))
                        <input type="hidden" name="category" value="{{ request('category') }}">
                    @endif
                    <input type="text" name="search" class="form-control rounded-pill shadow-sm px-4 py-2" placeholder="@if($isBn) শিক্ষকের নাম, পদবি বা বিষয় অনুসন্ধান করুন... @else Search teacher by name, designation or subject... @endif" value="{{ request('search') }}" style="border: 2px solid #e2e8f0; font-size: 14px;">
                    <button type="submit" class="btn rounded-pill px-4 fw-bold text-white shadow-sm" style="background-color: #1b4332; border: 1px solid #1b4332;">
                        <i class="fa fa-search me-1"></i> @if($isBn) খুঁজুন @else Search @endif
                    </button>
                    @if(request('search') || (request('category') && request('category') !== 'all'))
                        <a href="{{ route('frontend.teachers.index') }}" class="btn btn-outline-secondary rounded-pill px-3" title="রিসেট">
                            <i class="fa fa-refresh"></i>
                        </a>
                    @endif
                </form>
            </div>
        </div>

        <!-- Category Filter Tabs -->
        <div class="teacher-filter-nav">
            <a href="{{ route('frontend.teachers.index', ['category' => 'all', 'search' => request('search')]) }}" class="teacher-filter-btn {{ $selectedCategorySlug == 'all' ? 'active' : '' }}">
                <i class="fa fa-th-large"></i>
                @if($isBn) সকল বিভাগ @elseif($isAb) جميع الأقسام @else All Departments @endif
                <span class="cat-count">{{ $allTeachers->count() }}</span>
            </a>

            @foreach($categories as $category)
                <a href="{{ route('frontend.teachers.index', ['category' => $category->slug, 'search' => request('search')]) }}" class="teacher-filter-btn {{ $selectedCategorySlug == $category->slug ? 'active' : '' }}">
                    <i class="fa fa-folder-open-o"></i>
                    {{ $category->display_name }}
                    <span class="cat-count">{{ $category->active_teachers_count ?? $category->activeTeachers->count() }}</span>
                </a>
            @endforeach
        </div>

        <!-- Teachers Grid -->
        @if($allTeachers->count() > 0)
            <div class="row">
                @foreach($allTeachers as $teacher)
                <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                    <div class="teacher-card-modern">
                        
                        <div class="teacher-card-img-wrap">
                            @if($teacher->category)
                                <span class="teacher-cat-badge">
                                    <i class="fa fa-tag me-1"></i> {{ $teacher->category->display_name }}
                                </span>
                            @endif

                            @if($teacher->image && file_exists(public_path($teacher->image)))
                                <img src="{{ asset($teacher->image) }}" alt="{{ $teacher->display_name }}">
                            @else
                                <div class="d-flex align-items-center justify-content-center h-100 w-100 bg-light text-muted" style="font-size: 54px;">
                                    <i class="fa fa-user-circle-o"></i>
                                </div>
                            @endif
                        </div>

                        <div class="teacher-card-body">
                            <h3 class="teacher-name">{{ $teacher->display_name }}</h3>
                            <span class="teacher-designation">{{ $teacher->display_designation }}</span>

                            @if($teacher->display_subject)
                                <div>
                                    <span class="teacher-subject">
                                        <i class="fa fa-book me-1"></i> {{ $teacher->display_subject }}
                                    </span>
                                </div>
                            @endif

                            @if($teacher->display_qualification)
                                <div class="teacher-qualification">
                                    <i class="fa fa-mortarboard text-muted me-1"></i>
                                    {{ Str::limit($teacher->display_qualification, 75) }}
                                </div>
                            @endif

                            <div class="teacher-contact-bar">
                                <div class="teacher-socials">
                                    @if($teacher->facebook)
                                        <a href="{{ $teacher->facebook }}" target="_blank" title="Facebook"><i class="fa fa-facebook"></i></a>
                                    @endif
                                    @if($teacher->youtube)
                                        <a href="{{ $teacher->youtube }}" target="_blank" title="YouTube"><i class="fa fa-youtube-play"></i></a>
                                    @endif
                                    @if($teacher->linkedin)
                                        <a href="{{ $teacher->linkedin }}" target="_blank" title="LinkedIn"><i class="fa fa-linkedin"></i></a>
                                    @endif
                                    @if($teacher->whatsapp)
                                        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $teacher->whatsapp) }}" target="_blank" title="WhatsApp"><i class="fa fa-whatsapp"></i></a>
                                    @endif
                                    @if($teacher->phone)
                                        <a href="tel:{{ $teacher->phone }}" title="{{ $teacher->phone }}"><i class="fa fa-phone"></i></a>
                                    @endif
                                </div>

                                <a href="{{ route('frontend.teachers.details', $teacher->id) }}" class="btn-profile-view">
                                    @if($isBn) প্রোফাইল <i class="fa fa-angle-right ms-1"></i> @elseif($isAb) الملف الشخصي @else Profile <i class="fa fa-angle-right ms-1"></i> @endif
                                </a>
                            </div>

                        </div>

                    </div>
                </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-5 my-5 bg-white rounded-3 p-5 shadow-sm">
                <i class="fa fa-user-times fa-4x text-muted mb-3"></i>
                <h4 class="fw-bold text-dark mb-2">
                    @if($isBn) এই ক্যাটাগরিতে কোনো শিক্ষক পাওয়া যায়নি @else No teachers found in this category @endif
                </h4>
                <p class="text-muted mb-4">
                    @if($isBn) অন্য কোনো ক্যাটাগরি নির্বাচন করুন অথবা অনুসন্ধান রিসেট করুন। @else Please try another category or clear your search. @endif
                </p>
                <a href="{{ route('frontend.teachers.index') }}" class="btn text-white px-4 py-2 fw-bold" style="background: #1b4332; border-radius: 30px;">
                    <i class="fa fa-arrow-left me-1"></i> @if($isBn) সকল শিক্ষক দেখুন @else View All Teachers @endif
                </a>
            </div>
        @endif

    </div>
</section>

@endsection
