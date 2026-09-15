@extends('admin.master')

@section('body')
<div class="container-fluid mt-3 mb-5">

    <div class="card border shadow-sm rounded-3">
        <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center border-bottom">
            <div>
                <h4 class="card-title mb-0 fw-bold" style="color: #1b4332;">
                    <i class="bi bi-person-circle text-success me-2"></i>শিক্ষকের প্রোফাইল বিবরণ: {{ $teacher->name_bn }}
                </h4>
                <small class="text-secondary">{{ $teacher->designation_bn }} | {{ $teacher->category ? $teacher->category->name_bn : 'সাধারণ' }}</small>
            </div>
            <div class="d-flex gap-2">
                <a href="{{ route('teachers.edit', $teacher->id) }}" class="btn btn-warning btn-sm fw-bold text-dark shadow-sm">
                    <i class="bi bi-pencil-square me-1"></i> তথ্য সম্পাদনা
                </a>
                <a href="{{ route('teachers.index') }}" class="btn btn-outline-secondary btn-sm fw-bold shadow-sm">
                    <i class="bi bi-arrow-left me-1"></i> তালিকায় ফিরে যান
                </a>
            </div>
        </div>

        <div class="card-body p-4" style="color: #212529;">
            <div class="row g-4">

                <!-- Left Column: Photo & Quick Info -->
                <div class="col-lg-4 text-center">
                    <div class="card border shadow-sm rounded-3 p-4 bg-light">
                        <div class="mb-3">
                            @if($teacher->image && file_exists(public_path($teacher->image)))
                                <img src="{{ asset($teacher->image) }}" alt="{{ $teacher->name_bn }}" class="rounded-circle shadow border border-3 border-success" style="width: 160px; height: 160px; object-fit: cover;">
                            @else
                                <div class="rounded-circle d-inline-flex align-items-center justify-content-center shadow border border-3 border-success" style="width: 160px; height: 160px; background-color: #e8f5e9;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" fill="#1b4332" class="bi bi-person-fill" viewBox="0 0 16 16">
                                        <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
                                    </svg>
                                </div>
                            @endif
                        </div>
                        <h4 class="fw-bold mb-1" style="color: #1b4332;">{{ $teacher->name_bn }}</h4>
                        @if($teacher->name_en)
                            <h6 class="text-muted mb-2">{{ $teacher->name_en }}</h6>
                        @endif
                        <span class="badge px-3 py-2 fw-bold mb-3" style="background-color: #e8f5e9; color: #1b4332; border: 1px solid #c8e6c9; font-size: 14px;">
                            {{ $teacher->designation_bn }}
                        </span>

                        <div class="border-top pt-3 text-start">
                            <p class="mb-2"><strong style="color: #212529;">ক্যাটাগরি:</strong> <span class="badge bg-dark">{{ $teacher->category ? $teacher->category->name_bn : 'N/A' }}</span></p>
                            <p class="mb-2"><strong style="color: #212529;">স্ট্যাটাস:</strong> {!! $teacher->status_badge !!}</p>
                            <p class="mb-2"><strong style="color: #212529;">হোমপেজে প্রদর্শন:</strong> {{ $teacher->is_featured ? 'হ্যাঁ (Featured)' : 'না' }}</p>
                            <p class="mb-2"><strong style="color: #212529;">সিরিয়াল ক্রম:</strong> {{ $teacher->sort_order }}</p>
                            @if($teacher->experience)
                                <p class="mb-2"><strong style="color: #212529;">অভিজ্ঞতা:</strong> {{ $teacher->experience }}</p>
                            @endif
                            @if($teacher->joining_date)
                                <p class="mb-0"><strong style="color: #212529;">যোগদানের তারিখ:</strong> {{ $teacher->joining_date->format('d M, Y') }}</p>
                            @endif
                        </div>

                        <!-- Social Media -->
                        @if($teacher->facebook || $teacher->youtube || $teacher->linkedin || $teacher->whatsapp)
                            <div class="border-top pt-3 mt-3 d-flex justify-content-center gap-2">
                                @if($teacher->facebook)
                                    <a href="{{ $teacher->facebook }}" target="_blank" class="btn btn-outline-primary btn-sm rounded-circle" style="width: 36px; height: 36px; line-height: 24px;"><i class="bi bi-facebook"></i></a>
                                @endif
                                @if($teacher->youtube)
                                    <a href="{{ $teacher->youtube }}" target="_blank" class="btn btn-outline-danger btn-sm rounded-circle" style="width: 36px; height: 36px; line-height: 24px;"><i class="bi bi-youtube"></i></a>
                                @endif
                                @if($teacher->linkedin)
                                    <a href="{{ $teacher->linkedin }}" target="_blank" class="btn btn-outline-info btn-sm rounded-circle" style="width: 36px; height: 36px; line-height: 24px;"><i class="bi bi-linkedin"></i></a>
                                @endif
                                @if($teacher->whatsapp)
                                    <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $teacher->whatsapp) }}" target="_blank" class="btn btn-outline-success btn-sm rounded-circle" style="width: 36px; height: 36px; line-height: 24px;"><i class="bi bi-whatsapp"></i></a>
                                @endif
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Right Column: Academic Details, Contact, Biography -->
                <div class="col-lg-8">
                    
                    <!-- যোগাযোগ তথ্য -->
                    <div class="card border shadow-sm rounded-3 mb-4">
                        <div class="card-header bg-white py-2 fw-bold" style="color: #1b4332;">
                            <i class="bi bi-telephone-inbound me-2 text-success"></i>যোগাযোগের তথ্য
                        </div>
                        <div class="card-body p-3">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <strong class="d-block text-dark small">মোবাইল নম্বর</strong>
                                    <span class="fw-bold" style="color: #0f5132;">{{ $teacher->phone ?: 'তথ্য নেই' }}</span>
                                </div>
                                <div class="col-md-6">
                                    <strong class="d-block text-dark small">ইমেইল ঠিকানা</strong>
                                    <span class="fw-bold" style="color: #0d6efd;">{{ $teacher->email ?: 'তথ্য নেই' }}</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- একাডেমিক যোগ্যতা ও বিষয় -->
                    <div class="card border shadow-sm rounded-3 mb-4">
                        <div class="card-header bg-white py-2 fw-bold" style="color: #1b4332;">
                            <i class="bi bi-mortarboard me-2 text-success"></i>পাঠদান বিষয় ও শিক্ষাগত যোগ্যতা
                        </div>
                        <div class="card-body p-3">
                            <div class="mb-3">
                                <strong class="d-block text-dark small">পাঠদান বিষয় / বিভাগ</strong>
                                <span class="fs-6 fw-bold" style="color: #1b4332;">{{ $teacher->subject_department_bn ?: 'সকল বিষয়' }}</span>
                                @if($teacher->subject_department_en)
                                    <small class="d-block text-muted">{{ $teacher->subject_department_en }}</small>
                                @endif
                            </div>
                            <div>
                                <strong class="d-block text-dark small">শিক্ষাগত যোগ্যতা</strong>
                                <p class="mb-0 fw-semibold" style="color: #212529; white-space: pre-line;">{{ $teacher->qualification_bn ?: 'তথ্য লিপিবদ্ধ নেই' }}</p>
                                @if($teacher->qualification_en)
                                    <small class="text-muted d-block mt-1">{{ $teacher->qualification_en }}</small>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- সংযুক্ত ডকুমেন্টস (Attached Documents) -->
                    <div class="card border shadow-sm rounded-3 mb-4">
                        <div class="card-header bg-white py-2 fw-bold" style="color: #1b4332;">
                            <i class="bi bi-paperclip me-2 text-success"></i>সংযুক্ত ডকুমেন্টস ও ফাইলসমূহ (Attached Documents)
                        </div>
                        <div class="card-body p-3">
                            <div class="row g-3">
                                
                                <!-- NID / Birth Certificate -->
                                <div class="col-md-4">
                                    <div class="p-3 border rounded-3 bg-light text-center h-100 d-flex flex-column justify-content-between">
                                        <div>
                                            <i class="bi bi-person-vcard text-primary font-24 mb-2 d-inline-block"></i>
                                            <h6 class="fw-bold text-dark mb-1 font-13">জাতীয় পরিচয়পত্র / জন্ম নিবন্ধন</h6>
                                            <small class="text-muted d-block mb-3 font-11">NID / Birth Certificate</small>
                                        </div>
                                        @if($teacher->nid_or_birth_certificate && file_exists(public_path($teacher->nid_or_birth_certificate)))
                                            <div>
                                                <a href="{{ asset($teacher->nid_or_birth_certificate) }}" target="_blank" class="btn btn-sm btn-outline-primary fw-bold w-100">
                                                    @if($teacher->isNidPdf())
                                                        <i class="bi bi-file-earmark-pdf me-1 text-danger"></i> PDF দেখুন
                                                    @else
                                                        <i class="bi bi-eye me-1"></i> ছবি দেখুন
                                                    @endif
                                                </a>
                                            </div>
                                        @else
                                            <div>
                                                <span class="badge bg-secondary text-white font-11 py-1 px-2">সংযুক্ত নেই</span>
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                <!-- Academic Certificate -->
                                <div class="col-md-4">
                                    <div class="p-3 border rounded-3 bg-light text-center h-100 d-flex flex-column justify-content-between">
                                        <div>
                                            <i class="bi bi-award text-success font-24 mb-2 d-inline-block"></i>
                                            <h6 class="fw-bold text-dark mb-1 font-13">একাডেমিক সার্টিফিকেট</h6>
                                            <small class="text-muted d-block mb-3 font-11">Academic Certificate</small>
                                        </div>
                                        @if($teacher->academic_certificate && file_exists(public_path($teacher->academic_certificate)))
                                            <div>
                                                <a href="{{ asset($teacher->academic_certificate) }}" target="_blank" class="btn btn-sm btn-outline-success fw-bold w-100">
                                                    @if($teacher->isAcademicCertPdf())
                                                        <i class="bi bi-file-earmark-pdf me-1 text-danger"></i> PDF দেখুন
                                                    @else
                                                        <i class="bi bi-eye me-1"></i> ছবি দেখুন
                                                    @endif
                                                </a>
                                            </div>
                                        @else
                                            <div>
                                                <span class="badge bg-secondary text-white font-11 py-1 px-2">সংযুক্ত নেই</span>
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                <!-- CV / Resume -->
                                <div class="col-md-4">
                                    <div class="p-3 border rounded-3 bg-light text-center h-100 d-flex flex-column justify-content-between">
                                        <div>
                                            <i class="bi bi-file-earmark-person text-danger font-24 mb-2 d-inline-block"></i>
                                            <h6 class="fw-bold text-dark mb-1 font-13">সিভি / জীবনবৃত্তান্ত</h6>
                                            <small class="text-muted d-block mb-3 font-11">CV / Resume</small>
                                        </div>
                                        @if($teacher->resume && file_exists(public_path($teacher->resume)))
                                            <div>
                                                <a href="{{ asset($teacher->resume) }}" target="_blank" class="btn btn-sm btn-outline-danger fw-bold w-100">
                                                    @if($teacher->isResumePdf())
                                                        <i class="bi bi-file-earmark-pdf me-1 text-danger"></i> PDF দেখুন
                                                    @else
                                                        <i class="bi bi-download me-1"></i> ফাইল দেখুন / ডাউনলোড
                                                    @endif
                                                </a>
                                            </div>
                                        @else
                                            <div>
                                                <span class="badge bg-secondary text-white font-11 py-1 px-2">সংযুক্ত নেই</span>
                                            </div>
                                        @endif
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- সংক্ষিপ্ত পরিচিতি ও জীবনী -->
                    <div class="card border shadow-sm rounded-3">
                        <div class="card-header bg-white py-2 fw-bold" style="color: #1b4332;">
                            <i class="bi bi-card-text me-2 text-success"></i>পরিচিতি ও জীবনবৃত্তান্ত
                        </div>
                        <div class="card-body p-3">
                            @if($teacher->bio_bn)
                                <p class="mb-3" style="color: #212529; line-height: 1.8; white-space: pre-line;">{{ $teacher->bio_bn }}</p>
                            @else
                                <p class="text-muted mb-3">কোনো বিস্তারিত পরিচিতি লিপিবদ্ধ নেই।</p>
                            @endif

                            @if($teacher->bio_en)
                                <div class="border-top pt-2 mt-2">
                                    <strong class="d-block text-dark small mb-1">Biography (English):</strong>
                                    <p class="text-muted mb-0" style="line-height: 1.6; white-space: pre-line;">{{ $teacher->bio_en }}</p>
                                </div>
                            @endif
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>

</div>
@endsection
