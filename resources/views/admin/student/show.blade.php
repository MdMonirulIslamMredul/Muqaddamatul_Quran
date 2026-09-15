@extends('admin.master')

@section('body')
<style>
/* Print Stylesheet for Student Profile & ID Card */
@media print {
    /* Hide all admin chrome, navigations, sidebars, headers, footers and action buttons */
    .topbar,
    .left-sidebar,
    .navbar,
    .page-titles,
    .footer,
    .btn,
    .btn-group,
    nav,
    .alert,
    .no-print {
        display: none !important;
    }

    /* Reset layout margins for paper */
    body, html {
        background-color: #ffffff !important;
        color: #000000 !important;
        margin: 0 !important;
        padding: 0 !important;
        font-size: 13px !important;
    }

    .page-wrapper {
        margin-left: 0 !important;
        padding: 0 !important;
        background-color: #ffffff !important;
    }

    .container-fluid {
        padding: 0 !important;
        width: 100% !important;
        max-width: 100% !important;
    }

    .card {
        border: 1px solid #dee2e6 !important;
        box-shadow: none !important;
        page-break-inside: avoid;
    }

    .print-only-header {
        display: block !important;
    }

    .print-signature-section {
        display: flex !important;
        justify-content: space-between;
        margin-top: 40px;
        padding-top: 20px;
    }

    /* Ensure backgrounds and borders print accurately */
    * {
        -webkit-print-color-adjust: exact !important;
        print-color-adjust: exact !important;
    }
}

.print-only-header {
    display: none;
}

.print-signature-section {
    display: none;
}
</style>

<div class="container-fluid mt-3 mb-5">

    <!-- Printable Official Header (Shown Only on Print) -->
    <div class="print-only-header text-center mb-4 pb-3 border-bottom border-2 border-dark">
        @php $logo = \App\Models\Logo::latest()->first(); @endphp
        @if($logo && $logo->logo_image && file_exists(public_path($logo->logo_image)))
            <img src="{{ asset($logo->logo_image) }}" alt="Logo" style="height: 70px; margin-bottom: 8px;">
        @endif
        <h3 class="fw-bold mb-0 text-dark" style="color: #1b4332;">মুকাদ্দামাতুল কুরআন ইসলামি একাডেমি</h3>
        <p class="mb-1 text-dark small fw-semibold" style="color: #334155;">Muqaddamatul Quran Islami Academy</p>
        <span class="badge bg-dark text-white px-3 py-1 fw-bold fs-6">শিক্ষার্থী প্রোফাইল ও তথ্যাবলি (Student Profile Sheet)</span>
    </div>

    <!-- Header Actions (Screen Only) -->
    <div class="d-flex justify-content-between align-items-center mb-4 no-print">
        <div>
            <h3 class="fw-bold mb-1" style="color: #1b4332;">
                <i class="bi bi-person-vcard text-success me-2"></i>শিক্ষার্থী প্রোফাইল ও আইডি কার্ড
            </h3>
            <div class="d-flex align-items-center gap-2 mt-1">
                <span class="fw-bold" style="color: #212529; font-size: 14px;">আইডি নম্বর:</span>
                <span class="badge px-3 py-1 fw-bold shadow-sm" style="background-color: #1b4332; color: #ffffff; font-size: 13px; font-family: monospace; letter-spacing: 0.5px;">
                    {{ $student->student_id_number }}
                </span>
            </div>
        </div>
        <div class="d-flex gap-2">
            <button onclick="window.print()" class="btn btn-dark btn-sm fw-bold shadow-sm" style="background-color: #1b4332; border-color: #1b4332;">
                <i class="bi bi-printer me-1"></i> প্রিন্ট করুন (Print A4)
            </button>
            <a href="{{ route('students.edit', $student->id) }}" class="btn btn-warning btn-sm text-dark fw-bold shadow-sm">
                <i class="bi bi-pencil-square me-1"></i> এডিট করুন
            </a>
            @if($student->admission_id)
                <a href="{{ route('admissions.show', $student->admission_id) }}" class="btn btn-outline-success btn-sm fw-bold shadow-sm">
                    <i class="bi bi-file-earmark-person me-1"></i> মূল ভর্তি আবেদন
                </a>
            @endif
            <a href="{{ route('students.index', ['class_id' => $student->student_class_id]) }}" class="btn btn-outline-secondary btn-sm fw-bold shadow-sm">
                <i class="bi bi-arrow-left me-1"></i> তালিকায় ফিরুন
            </a>
        </div>
    </div>

    @if(session('message'))
        <div class="alert alert-success alert-dismissible fade show shadow-sm no-print" role="alert" style="background-color: #d1e7dd; color: #0f5132; border-color: #badbcc;">
            <i class="bi bi-check-circle-fill me-2"></i> {{ session('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="row g-4">
        
        <!-- Left: Student ID Card & Photo -->
        <div class="col-lg-4">
            
            <!-- Student ID Card Badge -->
            <div class="card border-0 shadow rounded-3 overflow-hidden text-center mb-4" style="background: linear-gradient(180deg, #1b4332 0%, #2d6a4f 100%); color: #ffffff;">
                <div class="p-4">
                    <h5 class="fw-bold mb-0 text-white">মুকাদ্দামাতুল কুরআন ইসলামি একাডেমি</h5>
                    <small class="text-white-50 d-block mb-3">শিক্ষার্থী পরিচয়পত্র (Student ID Card)</small>

                    <div class="my-3">
                        @if($student->photo && file_exists(public_path($student->photo)))
                            <img src="{{ asset($student->photo) }}" alt="{{ $student->student_name_bn }}" class="rounded-circle border border-3 border-white shadow" style="width: 120px; height: 120px; object-fit: cover;">
                        @else
                            <div class="rounded-circle border border-3 border-white shadow d-inline-flex align-items-center justify-content-center" style="width: 120px; height: 120px; background-color: #e8f5e9;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="#1b4332" class="bi bi-person-fill" viewBox="0 0 16 16">
                                    <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
                                </svg>
                            </div>
                        @endif
                    </div>

                    <h4 class="fw-bold text-white mb-0 mt-2">{{ $student->student_name_bn }}</h4>
                    @if($student->student_name_en)<small class="text-white-50 d-block">{{ $student->student_name_en }}</small>@endif

                    <div class="mt-3 py-2 px-3 rounded" style="background: rgba(255,255,255,0.15);">
                        <div class="row text-center g-2">
                            <div class="col-6 border-end border-white-50">
                                <small class="text-white-50 d-block">শ্রেণি</small>
                                <strong class="text-white">{{ $student->studentClass ? $student->studentClass->name_bn : 'N/A' }}</strong>
                            </div>
                            <div class="col-6">
                                <small class="text-white-50 d-block">রোল নম্বর</small>
                                <strong class="text-white fs-5">{{ $student->roll_no ?: '-' }}</strong>
                            </div>
                        </div>
                    </div>

                    <div class="mt-3 text-start small text-white-50 ps-2">
                        <div><strong>আইডি:</strong> <span class="text-white">{{ $student->student_id_number }}</span></div>
                        <div><strong>শিক্ষাবর্ষ:</strong> <span class="text-white">{{ $student->academic_year }}</span></div>
                        <div><strong>মোবাইল:</strong> <span class="text-white">{{ $student->father_contact ?: $student->guardian_contact }}</span></div>
                        <div><strong>রক্তের গ্রুপ:</strong> <span class="text-white">{{ $student->blood_group ?: 'N/A' }}</span></div>
                    </div>
                </div>
                <div class="p-2 border-top border-white-50 text-white-50 small" style="background: rgba(0,0,0,0.1);">
                    Muqaddamatul Quran Islami Academy
                </div>
            </div>

            <!-- Quick Meta Info -->
            <div class="card border shadow-sm rounded-3 p-3 mb-3">
                <h6 class="fw-bold border-bottom pb-2 mb-3" style="color: #1b4332;">
                    <i class="bi bi-info-circle me-1"></i>স্ট্যাটাস ও বিবরণ
                </h6>
                <div class="d-flex justify-content-between mb-2">
                    <span class="text-muted">স্ট্যাটাস:</span>
                    <span>{!! $student->status_badge !!}</span>
                </div>
                <div class="d-flex justify-content-between mb-2">
                    <span class="text-muted">ভর্তির ধরন:</span>
                    <span class="badge bg-light text-dark border">{{ $student->residential_type_bn }}</span>
                </div>
                <div class="d-flex justify-content-between mb-2">
                    <span class="text-muted">জন্ম তারিখ:</span>
                    <strong>{{ $student->dob ? $student->dob->format('d M, Y') : 'তথ্য নেই' }}</strong>
                </div>
                <div class="d-flex justify-content-between mb-2">
                    <span class="text-muted">রক্তের গ্রুপ:</span>
                    <strong class="text-danger">{{ $student->blood_group ?: 'তথ্য নেই' }}</strong>
                </div>
                <div class="d-flex justify-content-between">
                    <span class="text-muted">নথিভুক্তির তারিখ:</span>
                    <strong>{{ $student->created_at->format('d M, Y') }}</strong>
                </div>
            </div>

        </div>

        <!-- Right: Comprehensive Profile Details -->
        <div class="col-lg-8">
            
            <!-- একাডেমিক ও শ্রেণি তথ্য -->
            <div class="card border shadow-sm rounded-3 mb-4">
                <div class="card-header bg-white py-3 border-bottom">
                    <h5 class="card-title mb-0 fw-bold" style="color: #1b4332;">
                        <i class="bi bi-mortarboard text-success me-2"></i>একাডেমিক বিবরণ
                    </h5>
                </div>
                <div class="card-body p-4" style="color: #212529;">
                    <div class="row g-3">
                        <div class="col-md-4">
                            <small class="text-muted d-block">বর্তমান শ্রেণি</small>
                            <h5 class="fw-bold" style="color: #1b4332;">{{ $student->studentClass ? $student->studentClass->name_bn : 'শ্রেণিহীন' }}</h5>
                        </div>
                        <div class="col-md-4">
                            <small class="text-muted d-block">শ্রেণি রোল নম্বর</small>
                            <h5 class="fw-bold text-dark">{{ $student->roll_no ?: '-' }}</h5>
                        </div>
                        <div class="col-md-4">
                            <small class="text-muted d-block">শিক্ষাবর্ষ</small>
                            <h5 class="fw-bold text-dark">{{ $student->academic_year }}</h5>
                        </div>
                        <div class="col-md-4">
                            <small class="text-muted d-block">বিভাগ / ডিপার্টমেন্ট</small>
                            <strong>{{ $student->studentClass ? ($student->studentClass->department ?: 'সাধারণ') : '-' }}</strong>
                        </div>
                        <div class="col-md-4">
                            <small class="text-muted d-block">মাসিক ফি</small>
                            <strong class="text-success">৳ {{ $student->studentClass ? number_format($student->studentClass->monthly_fee, 0) : '0' }}</strong>
                        </div>
                        <div class="col-md-4">
                            <small class="text-muted d-block">সংযুক্ত ভর্তি আবেদন</small>
                            @if($student->admission)
                                <a href="{{ route('admissions.show', $student->admission_id) }}" class="badge bg-success text-decoration-none">
                                    {{ $student->admission->application_no }}
                                </a>
                            @else
                                <span class="badge bg-light text-muted border">সরাসরি এন্ট্রি</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- অভিভাবকের তথ্যাবলি -->
            <div class="card border shadow-sm rounded-3 mb-4">
                <div class="card-header bg-white py-3 border-bottom">
                    <h5 class="card-title mb-0 fw-bold" style="color: #1b4332;">
                        <i class="bi bi-people text-success me-2"></i>পিতা, মাতা ও অভিভাবকের তথ্যাবলি
                    </h5>
                </div>
                <div class="card-body p-4" style="color: #212529;">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="p-3 bg-light rounded border">
                                <h6 class="fw-bold text-dark mb-2"><i class="bi bi-person-fill me-1"></i>পিতার তথ্য</h6>
                                <p class="mb-1"><strong>নাম:</strong> {{ $student->father_name_bn ?: 'তথ্য নেই' }}</p>
                                <p class="mb-1"><strong>পেশা:</strong> {{ $student->father_profession ?: 'তথ্য নেই' }}</p>
                                <p class="mb-0"><strong>মোবাইল:</strong> <a href="tel:{{ $student->father_contact }}" class="fw-bold text-success text-decoration-none">{{ $student->father_contact ?: 'তথ্য নেই' }}</a></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="p-3 bg-light rounded border">
                                <h6 class="fw-bold text-dark mb-2"><i class="bi bi-person-heart me-1"></i>মাতার তথ্য</h6>
                                <p class="mb-1"><strong>নাম:</strong> {{ $student->mother_name_bn ?: 'তথ্য নেই' }}</p>
                                <p class="mb-0"><strong>মোবাইল:</strong> {{ $student->mother_contact ?: 'তথ্য নেই' }}</p>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="p-3 rounded border" style="background-color: #f8fafc;">
                                <h6 class="fw-bold mb-2" style="color: #1b4332;"><i class="bi bi-shield-check me-1"></i>প্রকৃত অভিভাবক ও জরুরি যোগাযোগ</h6>
                                <div class="row g-2">
                                    <div class="col-md-4"><strong>নাম:</strong> {{ $student->guardian_name ?: ($student->father_name_bn ?: 'তথ্য নেই') }}</div>
                                    <div class="col-md-4"><strong>সম্পর্ক:</strong> {{ $student->guardian_relation ?: 'পিতা' }}</div>
                                    <div class="col-md-4"><strong>মোবাইল:</strong> <strong class="text-success">{{ $student->guardian_contact ?: ($student->father_contact ?: 'তথ্য নেই') }}</strong></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ঠিকানা ও মন্তব্য -->
            <div class="card border shadow-sm rounded-3">
                <div class="card-header bg-white py-3 border-bottom">
                    <h5 class="card-title mb-0 fw-bold" style="color: #1b4332;">
                        <i class="bi bi-geo-alt text-success me-2"></i>ঠিকানা ও প্রশাসনিক মন্তব্য
                    </h5>
                </div>
                <div class="card-body p-4" style="color: #212529;">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <small class="text-muted d-block fw-bold">বর্তমান ঠিকানা</small>
                            <p class="mb-0 p-2 bg-light rounded border" style="min-height: 50px;">{{ $student->present_address ?: 'তথ্য নেই' }}</p>
                        </div>
                        <div class="col-md-6">
                            <small class="text-muted d-block fw-bold">স্থায়ী ঠিকানা</small>
                            <p class="mb-0 p-2 bg-light rounded border" style="min-height: 50px;">{{ $student->permanent_address ?: 'তথ্য নেই' }}</p>
                        </div>
                        @if($student->admin_notes)
                            <div class="col-12 mt-3">
                                <small class="text-muted d-block fw-bold">প্রশাসনিক নোট</small>
                                <div class="alert alert-info py-2 px-3 mb-0">{{ $student->admin_notes }}</div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

        </div>

    </div>

    <!-- Official Signature Footers (Shown Only on Print) -->
    <div class="print-signature-section">
        <div class="text-center" style="width: 200px;">
            <div style="border-top: 1px dashed #000000; padding-top: 5px;">
                <strong>অভিভাবকের স্বাক্ষর</strong>
            </div>
        </div>
        <div class="text-center" style="width: 200px;">
            <div style="border-top: 1px dashed #000000; padding-top: 5px;">
                <strong>নাযেমে তা'লীমাত</strong>
            </div>
        </div>
        <div class="text-center" style="width: 200px;">
            <div style="border-top: 1px dashed #000000; padding-top: 5px;">
                <strong>মুহতামিম / অধ্যক্ষের স্বাক্ষর</strong>
            </div>
        </div>
    </div>

</div>
@endsection
