@extends('frontend.master')

@section('title')
    {{ $teacher->display_name }} | {{ $teacher->display_designation }}
@endsection

@section('content')

@php
    $lang = session()->get('language', 'bangla');
    $isBn = ($lang == 'bangla' || empty($lang));
    $isAb = ($lang == 'arabic');
@endphp

<style>
    .teacher-profile-hero {
        background: linear-gradient(135deg, #0d2818 0%, #1b4332 60%, #2d6a4f 100%);
        padding: 45px 0;
        color: #ffffff;
    }
    .profile-card-left {
        background: #ffffff;
        border-radius: 16px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.08);
        border: 1px solid #e5e7eb;
        overflow: hidden;
        margin-top: -50px;
        position: relative;
        z-index: 10;
    }
    .profile-img-container {
        height: 320px;
        background: #f3f4f6;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
    }
    .profile-img-container img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: top center;
    }
    .profile-info-content {
        padding: 25px;
    }
    .profile-meta-item {
        display: flex;
        align-items: center;
        gap: 12px;
        margin-bottom: 12px;
        padding-bottom: 12px;
        border-bottom: 1px solid #f3f4f6;
    }
    .profile-meta-icon {
        width: 38px;
        height: 38px;
        border-radius: 50%;
        background: #e8f5e9;
        color: #1b4332;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 15px;
        flex-shrink: 0;
    }
    .detail-card {
        background: #ffffff;
        border-radius: 16px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.05);
        border: 1px solid #e5e7eb;
        padding: 30px;
        margin-bottom: 25px;
    }
    .detail-card-title {
        font-size: 20px;
        font-weight: 700;
        color: #1b4332;
        border-bottom: 2px solid #e8f5e9;
        padding-bottom: 10px;
        margin-bottom: 20px;
        display: flex;
        align-items: center;
        gap: 8px;
    }
    .related-teacher-card {
        background: #ffffff;
        border-radius: 12px;
        border: 1px solid #e5e7eb;
        overflow: hidden;
        transition: all 0.3s ease;
        text-align: center;
        padding: 15px;
    }
    .related-teacher-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(0,0,0,0.08);
        border-color: #2d6a4f;
    }
    .related-teacher-card img {
        width: 80px;
        height: 80px;
        border-radius: 50%;
        object-fit: cover;
        margin-bottom: 10px;
        border: 2px solid #2d6a4f;
    }
</style>

<!-- Hero Strip -->
<div class="teacher-profile-hero">
    <div class="container">
        <ul class="breadcrumb bg-transparent p-0 mb-2" style="font-size: 14px;">
            <li><a href="{{ route('front.page') }}" class="text-white opacity-75">@if($isBn) হোম @else Home @endif</a></li>
            <li><a href="{{ route('frontend.teachers.index') }}" class="text-white opacity-75">@if($isBn) শিক্ষকবৃন্দ @else Teachers @endif</a></li>
            @if($teacher->category)
                <li><a href="{{ route('frontend.teachers.index', ['category' => $teacher->category->slug]) }}" class="text-white opacity-75">{{ $teacher->category->display_name }}</a></li>
            @endif
            <li class="text-white active">{{ $teacher->display_name }}</li>
        </ul>
        <h1 class="fw-bold text-white mb-0" style="font-size: 32px;">{{ $teacher->display_name }}</h1>
        <p class="mb-0 text-white-50" style="font-size: 16px;">{{ $teacher->display_designation }}</p>
    </div>
</div>

<section class="py-5" style="background-color: #f8fafc;">
    <div class="container">
        <div class="row g-4">

            <!-- Left Profile Card -->
            <div class="col-lg-4">
                <div class="profile-card-left">
                    <div class="profile-img-container">
                        @if($teacher->image && file_exists(public_path($teacher->image)))
                            <img src="{{ asset($teacher->image) }}" alt="{{ $teacher->display_name }}">
                        @else
                            <i class="fa fa-user fa-5x text-muted"></i>
                        @endif
                    </div>
                    <div class="profile-info-content">
                        <h3 class="fw-bold mb-1" style="color: #1b4332; font-size: 22px;">{{ $teacher->display_name }}</h3>
                        <span class="badge px-3 py-2 fw-bold mb-3" style="background-color: #e8f5e9; color: #1b4332; font-size: 13px;">
                            {{ $teacher->display_designation }}
                        </span>

                        <!-- Details List -->
                        @if($teacher->category)
                            <div class="profile-meta-item">
                                <div class="profile-meta-icon"><i class="fa fa-folder-open"></i></div>
                                <div>
                                    <small class="text-muted d-block">ক্যাটাগরি</small>
                                    <strong style="color: #2d3748;">{{ $teacher->category->display_name }}</strong>
                                </div>
                            </div>
                        @endif

                        @if($teacher->display_subject)
                            <div class="profile-meta-item">
                                <div class="profile-meta-icon"><i class="fa fa-book"></i></div>
                                <div>
                                    <small class="text-muted d-block">পাঠদান বিষয় / বিভাগ</small>
                                    <strong style="color: #2d3748;">{{ $teacher->display_subject }}</strong>
                                </div>
                            </div>
                        @endif

                        @if($teacher->experience)
                            <div class="profile-meta-item">
                                <div class="profile-meta-icon"><i class="fa fa-clock-o"></i></div>
                                <div>
                                    <small class="text-muted d-block">অভিজ্ঞতা</small>
                                    <strong style="color: #2d3748;">{{ $teacher->experience }}</strong>
                                </div>
                            </div>
                        @endif

                        <!-- @if($teacher->phone)
                            <div class="profile-meta-item">
                                <div class="profile-meta-icon"><i class="fa fa-phone"></i></div>
                                <div>
                                    <small class="text-muted d-block">মোবাইল নম্বর</small>
                                    <a href="tel:{{ $teacher->phone }}" class="fw-bold text-decoration-none" style="color: #0f5132;">{{ $teacher->phone }}</a>
                                </div>
                            </div>
                        @endif -->

                        <!-- @if($teacher->email)
                            <div class="profile-meta-item">
                                <div class="profile-meta-icon"><i class="fa fa-envelope-o"></i></div>
                                <div>
                                    <small class="text-muted d-block">ইমেইল</small>
                                    <a href="mailto:{{ $teacher->email }}" class="fw-bold text-decoration-none text-primary">{{ $teacher->email }}</a>
                                </div>
                            </div>
                        @endif -->

                        <!-- Social Buttons -->
                        @if($teacher->facebook || $teacher->youtube || $teacher->linkedin || $teacher->whatsapp)
                            <div class="d-flex justify-content-center gap-2 mt-4 pt-3 border-top">
                                @if($teacher->facebook)
                                    <a href="{{ $teacher->facebook }}" target="_blank" class="btn btn-outline-primary btn-sm rounded-circle" style="width: 38px; height: 38px; line-height: 26px;"><i class="fa fa-facebook"></i></a>
                                @endif
                                @if($teacher->youtube)
                                    <a href="{{ $teacher->youtube }}" target="_blank" class="btn btn-outline-danger btn-sm rounded-circle" style="width: 38px; height: 38px; line-height: 26px;"><i class="fa fa-youtube-play"></i></a>
                                @endif
                                @if($teacher->linkedin)
                                    <a href="{{ $teacher->linkedin }}" target="_blank" class="btn btn-outline-info btn-sm rounded-circle" style="width: 38px; height: 38px; line-height: 26px;"><i class="fa fa-linkedin"></i></a>
                                @endif
                                @if($teacher->whatsapp)
                                    <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $teacher->whatsapp) }}" target="_blank" class="btn btn-outline-success btn-sm rounded-circle" style="width: 38px; height: 38px; line-height: 26px;"><i class="fa fa-whatsapp"></i></a>
                                @endif
                            </div>
                        @endif

                        <div class="mt-4">
                            <a href="{{ route('frontend.teachers.index') }}" class="btn w-100 fw-bold shadow-sm" style="background: #1b4332; color: #ffffff; border-radius: 8px;">
                                <i class="fa fa-arrow-left me-1"></i> সকল শিক্ষকবৃন্দ দেখুন
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Column: Biography & Academic Qualifications -->
            <div class="col-lg-8">
                
                <!-- শিক্ষাগত যোগ্যতা -->
                @if($teacher->display_qualification)
                    <div class="detail-card">
                        <h4 class="detail-card-title">
                            <i class="fa fa-graduation-cap text-success"></i>
                            @if($isBn) শিক্ষাগত যোগ্যতা ও সনদ @else Academic Qualifications @endif
                        </h4>
                        <div style="font-size: 15px; line-height: 1.8; color: #2d3748; white-space: pre-line;">
                            {{ $teacher->display_qualification }}
                        </div>
                    </div>
                @endif

                <!-- পরিচিতি ও জীবনবৃত্তান্ত -->
                <div class="detail-card">
                    <h4 class="detail-card-title">
                        <i class="fa fa-user-circle text-success"></i>
                        @if($isBn) সংক্ষিপ্ত পরিচিতি ও জীবনী @else Biography & Overview @endif
                    </h4>
                    @if($teacher->display_bio)
                        <div style="font-size: 15px; line-height: 1.9; color: #374151; white-space: pre-line;">
                            {{ $teacher->display_bio }}
                        </div>
                    @else
                        <p class="text-muted mb-0">
                            @if($isBn) শিক্ষকের সংক্ষিপ্ত পরিচিতি শীঘ্রই যুক্ত করা হবে। @else Biography details will be updated soon. @endif
                        </p>
                    @endif
                </div>

                <!-- একই বিভাগের অন্যান্য শিক্ষকবৃন্দ -->
                @if(isset($relatedTeachers) && $relatedTeachers->count() > 0)
                    <div class="detail-card">
                        <h4 class="detail-card-title">
                            <i class="fa fa-users text-success"></i>
                            @if($isBn) একই বিভাগের অন্যান্য শিক্ষকবৃন্দ @else Faculty in Same Department @endif
                        </h4>
                        <div class="row g-3">
                            @foreach($relatedTeachers as $relTeacher)
                                <div class="col-md-3 col-sm-6">
                                    <a href="{{ route('frontend.teachers.details', $relTeacher->id) }}" class="text-decoration-none">
                                        <div class="related-teacher-card">
                                            @if($relTeacher->image && file_exists(public_path($relTeacher->image)))
                                                <img src="{{ asset($relTeacher->image) }}" alt="{{ $relTeacher->display_name }}">
                                            @else
                                                <div class="bg-light rounded-circle mx-auto d-flex align-items-center justify-content-center text-muted mb-2" style="width: 80px; height: 80px;">
                                                    <i class="fa fa-user fa-2x"></i>
                                                </div>
                                            @endif
                                            <h6 class="fw-bold mb-1 text-truncate" style="color: #1b4332;">{{ $relTeacher->display_name }}</h6>
                                            <small class="text-muted d-block text-truncate">{{ $relTeacher->display_designation }}</small>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif

            </div>

        </div>
    </div>
</section>

@endsection
