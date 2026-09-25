@extends('frontend.master')

@section('title')
    ভর্তি আবেদন ট্র্যাকিং | {{ $logo->site_name ?? 'মুকাদ্দামাতুল কুরআন হিফজ মাদ্রাসা' }}
@endsection

@section('content')
<style>
    .track-hero {
        background: linear-gradient(135deg, rgba(16, 75, 40, 0.94) 0%, rgba(26, 122, 63, 0.90) 100%), url('{{ $banner && $banner->image ? asset($banner->image) : asset("frontend/images/bg/bg1.jpg") }}') center/cover no-repeat;
        color: #fff;
        padding: 60px 0 45px;
        text-align: center;
    }
    .track-card {
        background: #ffffff;
        border-radius: 16px;
        border: 1px solid #e2e8f0;
        box-shadow: 0 10px 30px rgba(0,0,0,0.06);
        padding: 35px;
        margin-top: -30px;
        margin-bottom: 50px;
    }
    .result-applicant-card {
        background: #ffffff;
        border-radius: 12px;
        border: 1px solid #e2e8f0;
        box-shadow: 0 4px 15px rgba(0,0,0,0.04);
        padding: 24px;
        margin-top: 25px;
        transition: transform 0.2s, box-shadow 0.2s;
    }
    .result-applicant-card:hover {
        box-shadow: 0 8px 25px rgba(0,0,0,0.08);
    }
</style>

<section class="track-hero">
    <div class="container">
        <h1 class="text-white fw-bold mb-2">ভর্তি আবেদন ট্র্যাকিং ও ফলাফল যাচাই</h1>
        <p class="text-white-50 mb-0">আপনার আবেদনের ট্র্যাকিং নম্বর অথবা নিবন্ধিত মোবাইল নম্বর দিয়ে বর্তমান অবস্থা জানুন।</p>
    </div>
</section>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-9">
            <div class="track-card">
                
                <form action="{{ route('admission.status') }}" method="GET" class="mb-4">
                    <div class="row g-2 align-items-center">
                        <div class="col-md-9">
                            <div class="input-group input-group-lg">
                                <span class="input-group-text bg-light border-end-0"><i class="fa fa-search text-success"></i></span>
                                <input type="text" name="query" class="form-control border-start-0" placeholder="আবেদন নম্বর (e.g. MQHM-2026-1001) বা মোবাইল নম্বর" value="{{ $searchQuery }}" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <button type="submit" class="btn btn-success btn-lg w-100 fw-bold">অনুসন্ধান করুন</button>
                        </div>
                    </div>
                </form>

                @if($searchQuery)
                    @if($admissions && count($admissions) > 0)
                        <h5 class="fw-bold text-success mb-3">
                            <i class="fa fa-check-circle me-1"></i> {{ count($admissions) }} টি আবেদন পাওয়া গেছে:
                        </h5>

                        @foreach($admissions as $adm)
                            <div class="result-applicant-card">
                                <div class="row align-items-center">
                                    <div class="col-md-2 text-center">
                                        @if($adm->student_photo)
                                            <img src="{{ asset($adm->student_photo) }}" alt="{{ $adm->display_name }}" class="rounded-circle shadow-sm" style="width: 80px; height: 80px; object-fit: cover;">
                                        @else
                                            <div class="rounded-circle bg-light text-muted d-inline-flex align-items-center justify-content-center" style="width: 80px; height: 80px; font-size: 28px;">
                                                <i class="fa fa-user"></i>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-md-6">
                                        <h4 class="fw-bold text-dark mb-1">{{ $adm->student_name_bn }}</h4>
                                        <p class="text-muted mb-1">{{ $adm->student_name_en }}</p>
                                        <div class="small text-secondary">
                                            <strong>ট্র্যাকিং নং:</strong> <span class="text-success fw-bold">{{ $adm->application_no }}</span> |
                                            <strong>শ্রেণি:</strong> {{ $adm->desired_class }} |
                                            <strong>শিক্ষাবর্ষ:</strong> {{ $adm->academic_year }}
                                        </div>
                                        <div class="small text-secondary mt-1">
                                            <strong>পিতা:</strong> {{ $adm->father_name_bn }} | <strong>মোবাইল:</strong> {{ $adm->mobile }}
                                        </div>
                                    </div>
                                    <div class="col-md-4 text-md-end mt-3 mt-md-0">
                                        <div class="mb-2">
                                            {!! $adm->status_badge !!}
                                        </div>
                                        <a href="{{ route('admission.print', $adm->id) }}" target="_blank" class="btn btn-outline-primary btn-sm fw-bold">
                                            <i class="fa fa-print me-1"></i> ফরম দেখুন / প্রিন্ট
                                        </a>
                                    </div>
                                </div>

                                <!-- Evaluation & Exam Details if available -->
                                @if($adm->admission_test_date || $adm->obtained_marks !== null || $adm->assigned_roll_no)
                                    <div class="mt-3 pt-3 border-top bg-light rounded p-3">
                                        <div class="row g-2 small">
                                            @if($adm->admission_test_date)
                                                <div class="col-md-4">
                                                    <strong>ভর্তি পরীক্ষার তারিখ:</strong> {{ $adm->admission_test_date->format('d M, Y') }}
                                                </div>
                                            @endif
                                            @if($adm->obtained_marks !== null)
                                                <div class="col-md-4">
                                                    <strong>প্রাপ্ত নম্বর:</strong> {{ $adm->obtained_marks }} / ২০০ ({{ $adm->percentage_marks }}%)
                                                </div>
                                            @endif
                                            @if($adm->assigned_roll_no)
                                                <div class="col-md-4">
                                                    <strong class="text-success">বরাদ্দকৃত রোল নং:</strong> <span class="badge bg-success">{{ $adm->assigned_roll_no }}</span>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                @endif
                            </div>
                        @endforeach

                    @else
                        <div class="alert alert-warning text-center py-4 rounded-3">
                            <i class="fa fa-exclamation-circle fa-2x mb-2 text-warning d-block"></i>
                            <h5 class="fw-bold">কোনো আবেদন পাওয়া যায়নি!</h5>
                            <p class="mb-0 text-muted">আপনার প্রবেশ করানো নম্বরটি ("{{ $searchQuery }}") সঠিক কিনা যাচাই করুন অথবা মাদ্রাসা অফিসে যোগাযোগ করুন।</p>
                        </div>
                    @endif
                @endif

            </div>
        </div>
    </div>
</div>

@endsection
