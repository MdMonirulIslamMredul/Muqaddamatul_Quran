@extends('admin.master')

@section('body')
<div class="container-fluid mt-3 mb-5">

    <!-- Messages -->
    @if(session('message'))
        <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert" style="background-color: #d1e7dd; color: #0f5132; border-color: #badbcc;">
            <i class="bi bi-check-circle-fill me-2"></i> {{ session('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Top Action Card with High Contrast -->
    <div class="card border shadow-sm rounded-3 mb-4" style="background-color: #ffffff;">
        <div class="card-body p-4">
            <div class="row align-items-center">
                <div class="col-md-2 text-center">
                    @if($admission->student_photo && file_exists(public_path($admission->student_photo)))
                        <img src="{{ asset($admission->student_photo) }}" alt="{{ $admission->display_name }}" class="rounded-3 shadow-sm border" style="width: 110px; height: 130px; object-fit: cover;">
                    @else
                        <div class="rounded-3 d-inline-flex align-items-center justify-content-center shadow-sm" style="width: 110px; height: 130px; background-color: #e8f5e9; border: 1px solid #c8e6c9;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="#1b4332" class="bi bi-person-fill" viewBox="0 0 16 16">
                                <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
                            </svg>
                        </div>
                    @endif
                </div>
                <div class="col-md-6">
                    <div class="d-flex align-items-center gap-2 mb-1">
                        <h3 class="fw-bold mb-0" style="color: #1b4332;">{{ $admission->student_name_bn }}</h3>
                        @if($admission->status == 'approved')
                            <span class="badge fw-bold px-3 py-2" style="background-color: #198754; color: #ffffff; font-size: 13px;">অনুমোদিত (Approved)</span>
                        @elseif($admission->status == 'pending')
                            <span class="badge fw-bold px-3 py-2" style="background-color: #ffc107; color: #000000; font-size: 13px;">অপেক্ষমান (Pending)</span>
                        @elseif($admission->status == 'under_review')
                            <span class="badge fw-bold px-3 py-2" style="background-color: #0dcaf0; color: #000000; font-size: 13px;">পর্যালোচনাধীন</span>
                        @elseif($admission->status == 'test_scheduled')
                            <span class="badge fw-bold px-3 py-2" style="background-color: #0d6efd; color: #ffffff; font-size: 13px;">পরীক্ষা নির্ধারিত</span>
                        @elseif($admission->status == 'passed')
                            <span class="badge fw-bold px-3 py-2" style="background-color: #20c997; color: #ffffff; font-size: 13px;">উত্তীর্ণ (Passed)</span>
                        @elseif($admission->status == 'rejected')
                            <span class="badge fw-bold px-3 py-2" style="background-color: #dc3545; color: #ffffff; font-size: 13px;">বাতিল (Rejected)</span>
                        @else
                            <span class="badge fw-bold px-3 py-2" style="background-color: #6c757d; color: #ffffff; font-size: 13px;">{{ ucfirst($admission->status) }}</span>
                        @endif
                    </div>
                    <p class="fw-semibold mb-2" style="color: #495057;">{{ $admission->student_name_en ?: 'NAME IN ENGLISH' }}</p>
                    
                    <div class="d-flex flex-wrap gap-3 small p-2 rounded" style="background-color: #f8f9fa; border: 1px solid #e9ecef; color: #212529;">
                        <span><strong style="color: #212529;">আবেদন নং:</strong> <span class="fw-bold" style="color: #0d6efd;">{{ $admission->application_no }}</span></span>
                        <span><strong style="color: #212529;">শিক্ষাবর্ষ:</strong> <span class="fw-semibold" style="color: #212529;">{{ $admission->academic_year }}</span></span>
                        <span><strong style="color: #212529;">কাঙ্ক্ষিত শ্রেণি:</strong> <span class="badge" style="background-color: #e8f5e9; color: #1b4332; border: 1px solid #c8e6c9; font-size: 12px;">{{ $admission->desired_class }}</span></span>
                        <span><strong style="color: #212529;">বিভাগ:</strong> <span class="fw-semibold" style="color: #212529;">{{ $admission->department_division ?: 'সাধারণ' }}</span></span>
                        <span><strong style="color: #212529;">ধরন:</strong> <span class="badge bg-secondary text-white">{{ ucfirst($admission->residential_type) }}</span></span>
                        @if($admission->assigned_roll_no)
                            <span><strong style="color: #212529;">রোল:</strong> <span class="badge bg-success text-white">{{ $admission->assigned_roll_no }}</span></span>
                        @endif
                    </div>
                </div>
                <div class="col-md-4 text-md-end mt-3 mt-md-0">
                    <div class="d-flex flex-wrap justify-content-md-end gap-2">
                        @if($admission->student)
                            <a href="{{ route('students.show', $admission->student->id) }}" class="btn btn-sm btn-success fw-bold shadow-sm">
                                <i class="bi bi-person-check-fill me-1"></i> শিক্ষার্থী প্রোফাইল ({{ $admission->student->student_id_number }})
                            </a>
                        @else
                            <button type="button" class="btn btn-sm text-white fw-bold shadow-sm" style="background-color: #0d6efd;" data-bs-toggle="modal" data-bs-target="#enrollModal">
                                <i class="bi bi-mortarboard-fill me-1"></i> ক্লাসে নথিভুক্ত করুন (Enroll Student)
                            </button>
                        @endif
                        <a href="{{ route('admission.print', $admission->id) }}" target="_blank" class="btn btn-sm fw-bold shadow-sm" style="background-color: #1b4332; color: #ffffff; border: 1px solid #1b4332;">
                            <i class="bi bi-printer me-1"></i> ৫-পৃষ্ঠার ফরম প্রিন্ট (A4)
                        </a>
                        <a href="{{ route('admissions.edit', $admission->id) }}" class="btn btn-sm fw-bold shadow-sm" style="background-color: #ffc107; color: #000000; border: 1px solid #ffc107;">
                            <i class="bi bi-pencil-square me-1"></i> তথ্য এডিট
                        </a>
                        <a href="{{ route('admissions.index') }}" class="btn btn-sm btn-outline-secondary shadow-sm fw-bold">
                            <i class="bi bi-arrow-left me-1"></i> তালিকা
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- 5-Page Navigation Tabs for Admin View -->
    <div class="row g-4">
        
        <!-- Left 7 Cols: Full 5-Page Content Tabs -->
        <div class="col-lg-7">
            <div class="card border shadow-sm rounded-3">
                <div class="card-header border-bottom p-0" style="background-color: #f8f9fa;">
                    <ul class="nav nav-tabs border-0" id="adminViewTabs" role="tablist">
                        <li class="nav-item">
                            <button class="nav-link active fw-bold" id="vtab-p1" data-bs-toggle="tab" data-bs-target="#vcontent-p1" type="button" role="tab" style="color: #1b4332;">
                                <span class="badge text-white me-1" style="background-color: #1b4332;">১</span> পৃষ্ঠা ১: আবেদন ফরম
                            </button>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link fw-bold" id="vtab-p2" data-bs-toggle="tab" data-bs-target="#vcontent-p2" type="button" role="tab" style="color: #212529;">
                                <span class="badge text-white me-1" style="background-color: #495057;">২</span> পৃষ্ঠা ২: অভিভাবক ও রেফারেল
                            </button>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link fw-bold" id="vtab-p3" data-bs-toggle="tab" data-bs-target="#vcontent-p3" type="button" role="tab" style="color: #212529;">
                                <span class="badge text-white me-1" style="background-color: #495057;">৩</span> পৃষ্ঠা ৩: জ্ঞাতব্য ও সম্মতি
                            </button>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link fw-bold" id="vtab-p4" data-bs-toggle="tab" data-bs-target="#vcontent-p4" type="button" role="tab" style="color: #212529;">
                                <span class="badge text-white me-1" style="background-color: #495057;">৪</span> পৃষ্ঠা ৪: শারীরিক তথ্য
                            </button>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link fw-bold" id="vtab-p5" data-bs-toggle="tab" data-bs-target="#vcontent-p5" type="button" role="tab" style="color: #212529;">
                                <span class="badge text-white me-1" style="background-color: #495057;">৫</span> পৃষ্ঠা ৫: ডকুমেন্টস ও সংযুক্তি
                            </button>
                        </li>
                    </ul>
                </div>

                <div class="card-body p-4">
                    <div class="tab-content" id="adminViewTabContent">

                        <!-- ==================== PAGE 1 VIEW ==================== -->
                        <div class="tab-pane fade show active" id="vcontent-p1" role="tabpanel">
                            <h5 class="fw-bold border-bottom pb-2 mb-3" style="color: #1b4332;">
                                <i class="bi bi-file-earmark-person me-2"></i>১. শিক্ষার্থীর সাধারণ ও ব্যক্তিগত তথ্য
                            </h5>
                            <div class="row g-3 mb-4">
                                <div class="col-md-6">
                                    <span class="d-block small fw-bold" style="color: #495057;">১. শিক্ষার্থীর নাম (বাংলা ও ইংরেজি):</span>
                                    <strong style="color: #212529; font-size: 15px;">{{ $admission->student_name_bn }}</strong> 
                                    <span class="fw-semibold" style="color: #495057;">({{ $admission->student_name_en ?: 'N/A' }})</span>
                                </div>
                                <div class="col-md-6">
                                    <span class="d-block small fw-bold" style="color: #495057;">৪. জন্ম তারিখ ও বয়স:</span>
                                    <strong style="color: #212529;">{{ $admission->dob ? $admission->dob->format('d M, Y') : 'N/A' }} ({{ $admission->age ?: 'N/A' }})</strong>
                                </div>
                                <div class="col-md-4">
                                    <span class="d-block small fw-bold" style="color: #495057;">৫. রক্তের গ্রুপ:</span>
                                    <span class="badge bg-danger text-white fw-bold">{{ $admission->blood_group ?: 'N/A' }}</span>
                                </div>
                                <div class="col-md-4">
                                    <span class="d-block small fw-bold" style="color: #495057;">জাতীয়তা:</span>
                                    <strong style="color: #212529;">{{ $admission->nationality ?: 'বাংলাদেশী' }}</strong>
                                </div>
                                <div class="col-md-4">
                                    <span class="d-block small fw-bold" style="color: #495057;">ধর্ম:</span>
                                    <strong style="color: #212529;">{{ $admission->religion ?: 'ইসলাম' }}</strong>
                                </div>
                                <div class="col-md-6">
                                    <span class="d-block small fw-bold" style="color: #495057;">৬. যে শ্রেণিতে ভর্তি হতে ইচ্ছুক:</span>
                                    <span class="badge fw-bold" style="background-color: #e8f5e9; color: #1b4332; border: 1px solid #c8e6c9;">{{ $admission->desired_class }}</span> 
                                    <span class="fw-semibold" style="color: #495057;">(বিভাগ: {{ $admission->department_division ?: 'সাধারণ' }})</span>
                                </div>
                                <div class="col-md-6">
                                    <span class="d-block small fw-bold" style="color: #495057;">৭. ধরন:</span>
                                    <span class="badge bg-dark text-white fw-bold">{{ ucfirst($admission->residential_type) }}</span>
                                </div>
                                <div class="col-md-12">
                                    <span class="d-block small fw-bold" style="color: #495057;">৮. বর্তমান ঠিকানা:</span>
                                    <span class="fw-semibold" style="color: #212529;">{{ $admission->present_address ?: 'N/A' }}</span>
                                </div>
                                <div class="col-md-4">
                                    <span class="d-block small fw-bold" style="color: #495057;">মোবাইল:</span>
                                    <span class="fw-bold" style="color: #0f5132; font-size: 15px;"><i class="bi bi-telephone-fill me-1"></i>{{ $admission->mobile }}</span>
                                </div>
                                <div class="col-md-4">
                                    <span class="d-block small fw-bold" style="color: #495057;">ফোন:</span>
                                    <span class="fw-semibold" style="color: #212529;">{{ $admission->phone ?: 'N/A' }}</span>
                                </div>
                                <div class="col-md-4">
                                    <span class="d-block small fw-bold" style="color: #495057;">ই-মেইল:</span>
                                    <span class="fw-semibold" style="color: #212529;">{{ $admission->email ?: 'N/A' }}</span>
                                </div>
                                <div class="col-md-12">
                                    <span class="d-block small fw-bold" style="color: #495057;">৯. স্থায়ী ঠিকানা:</span>
                                    <span class="fw-semibold" style="color: #212529;">গ্রাম: {{ $admission->permanent_village }}, ডাকঘর: {{ $admission->permanent_post_office }} ({{ $admission->permanent_post_code }}), থানা: {{ $admission->permanent_upazila }}, জেলা: {{ $admission->permanent_district }}</span>
                                </div>
                                <div class="col-md-12">
                                    <span class="d-block small fw-bold" style="color: #495057;">১০. পূর্ববর্তী প্রতিষ্ঠানের তথ্য:</span>
                                    <span class="fw-semibold" style="color: #212529;">{{ $admission->previous_institute_name ?: 'পূর্বে কোথাও পড়েনি' }} {{ $admission->previous_institute_address ? '(' . $admission->previous_institute_address . ')' : '' }} - সর্বশেষ শ্রেণি: {{ $admission->previous_class ?: 'N/A' }}</span>
                                </div>
                            </div>

                            <!-- পিতা ও মাতা -->
                            <h5 class="fw-bold border-bottom pb-2 mb-3" style="color: #1b4332;">
                                <i class="bi bi-people me-2"></i>২ & ৩. পিতা ও মাতার তথ্যাবলি
                            </h5>
                            <div class="row g-4">
                                <div class="col-md-6 border-end">
                                    <div class="d-flex gap-3 align-items-center mb-2">
                                        @if($admission->father_photo)
                                            <img src="{{ asset($admission->father_photo) }}" alt="Father" class="rounded shadow-sm border" style="width: 60px; height: 70px; object-fit: cover;">
                                        @else
                                            <div class="bg-light border rounded d-flex align-items-center justify-content-center fw-semibold" style="width: 60px; height: 70px; color: #6c757d;">
                                                <small>ছবি নেই</small>
                                            </div>
                                        @endif
                                        <div>
                                            <h6 class="fw-bold mb-0" style="color: #1b4332;">২. পিতা: {{ $admission->father_name_bn ?: 'N/A' }}</h6>
                                            <small class="fw-semibold" style="color: #495057;">{{ $admission->father_name_en }}</small>
                                        </div>
                                    </div>
                                    <p class="small mb-1" style="color: #212529;"><strong style="color: #495057;">পেশা ও পদবি:</strong> {{ $admission->father_profession }} {{ $admission->father_designation ? "({$admission->father_designation})" : '' }}</p>
                                    <p class="small mb-1" style="color: #212529;"><strong style="color: #495057;">শিক্ষাগত যোগ্যতা:</strong> {{ $admission->father_education ?: 'N/A' }}</p>
                                    <p class="small mb-0" style="color: #212529;"><strong style="color: #495057;">যোগাযোগ:</strong> {{ $admission->father_contact ?: 'N/A' }}</p>
                                </div>

                                <div class="col-md-6">
                                    <div class="d-flex gap-3 align-items-center mb-2">
                                        @if($admission->mother_photo)
                                            <img src="{{ asset($admission->mother_photo) }}" alt="Mother" class="rounded shadow-sm border" style="width: 60px; height: 70px; object-fit: cover;">
                                        @else
                                            <div class="bg-light border rounded d-flex align-items-center justify-content-center fw-semibold" style="width: 60px; height: 70px; color: #6c757d;">
                                                <small>ছবি নেই</small>
                                            </div>
                                        @endif
                                        <div>
                                            <h6 class="fw-bold mb-0" style="color: #1b4332;">৩. মাতা: {{ $admission->mother_name_bn ?: 'N/A' }}</h6>
                                            <small class="fw-semibold" style="color: #495057;">{{ $admission->mother_name_en }}</small>
                                        </div>
                                    </div>
                                    <p class="small mb-1" style="color: #212529;"><strong style="color: #495057;">পেশা ও পদবি:</strong> {{ $admission->mother_profession }} {{ $admission->mother_designation ? "({$admission->mother_designation})" : '' }}</p>
                                    <p class="small mb-1" style="color: #212529;"><strong style="color: #495057;">শিক্ষাগত যোগ্যতা:</strong> {{ $admission->mother_education ?: 'N/A' }}</p>
                                    <p class="small mb-0" style="color: #212529;"><strong style="color: #495057;">যোগাযোগ:</strong> {{ $admission->mother_contact ?: 'N/A' }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- ==================== PAGE 2 VIEW ==================== -->
                        <div class="tab-pane fade" id="vcontent-p2" role="tabpanel">
                            <!-- ১১. প্রকৃত অভিভাবক -->
                            <div class="mb-4 pb-3 border-bottom">
                                <div class="d-flex justify-content-between align-items-start">
                                    <div>
                                        <h5 class="fw-bold mb-1" style="color: #1b4332;">
                                            <i class="bi bi-shield-check me-2"></i>১১. প্রকৃত অভিভাবক: {{ $admission->guardian_name ?: 'পিতা/মাতা স্বয়ং' }}
                                        </h5>
                                        <div class="small fw-semibold mt-1" style="color: #212529;">
                                            <strong>পিতার নাম:</strong> {{ $admission->guardian_father_name ?: 'N/A' }} | <strong>সম্পর্ক:</strong> {{ $admission->guardian_relation_info ?: 'পিতা/মাতা' }}
                                        </div>
                                        <div class="small mt-2" style="color: #212529; line-height: 1.6;">
                                            <div><strong>পেশা:</strong> {{ $admission->guardian_profession ?: 'N/A' }} ({{ $admission->guardian_designation ?: 'পদবি নেই' }}) | <strong>শিক্ষাগত যোগ্যতা:</strong> {{ $admission->guardian_education ?: 'N/A' }}</div>
                                            <div><strong>বার্ষিক আয়:</strong> {{ $admission->guardian_annual_income ?: 'N/A' }} (উৎস: {{ $admission->guardian_income_source ?: 'N/A' }})</div>
                                            <div><strong>বর্তমান ঠিকানা:</strong> {{ $admission->guardian_present_address ?: 'N/A' }}</div>
                                            <div><strong>স্থায়ী ঠিকানা:</strong> গ্রাম: {{ $admission->guardian_permanent_village ?: 'N/A' }}, ডাকঘর: {{ $admission->guardian_permanent_post_office ?: 'N/A' }} ({{ $admission->guardian_permanent_post_code ?: 'N/A' }}), থানা: {{ $admission->guardian_permanent_upazila ?: 'N/A' }}, জেলা: {{ $admission->guardian_permanent_district ?: 'N/A' }}</div>
                                            <div class="mt-1"><strong style="color: #0f5132;">যোগাযোগ মোবাইল:</strong> <span class="fw-bold" style="color: #0f5132;">{{ $admission->guardian_mobile ?: 'N/A' }}</span> (ই-মেইল: {{ $admission->guardian_email ?: 'N/A' }})</div>
                                        </div>
                                    </div>
                                    @if($admission->guardian_photo)
                                        <img src="{{ asset($admission->guardian_photo) }}" alt="Guardian" class="rounded shadow-sm border ms-2" style="width: 65px; height: 75px; object-fit: cover;">
                                    @endif
                                </div>
                            </div>

                            <!-- ১২. আনা-নেওয়া করবেন যিনি -->
                            <div class="mb-4 pb-3 border-bottom">
                                <div class="d-flex justify-content-between align-items-start">
                                    <div>
                                        <h5 class="fw-bold mb-1" style="color: #1b4332;">
                                            <i class="bi bi-bus-front me-2"></i>১২. ক্যাম্পাস/হোস্টেলে আনা-নেওয়া করবেন: {{ $admission->pick_drop_name ?: 'অভিভাবক স্বয়ং' }}
                                        </h5>
                                        <div class="small fw-semibold mt-1" style="color: #212529;">
                                            <strong>সম্পর্ক:</strong> {{ $admission->pick_drop_relation ?: 'পিতা/মাতা' }} | <strong>মোবাইল:</strong> <span class="fw-bold" style="color: #0f5132;">{{ $admission->pick_drop_mobile ?: 'N/A' }}</span> ({{ $admission->pick_drop_phone ?: 'ফোন নেই' }})
                                        </div>
                                        <p class="small mb-0 mt-1" style="color: #212529;"><strong>ঠিকানা:</strong> {{ $admission->pick_drop_address ?: 'N/A' }}</p>
                                    </div>
                                    @if($admission->pick_drop_photo)
                                        <img src="{{ asset($admission->pick_drop_photo) }}" alt="Pick Drop" class="rounded shadow-sm border ms-2" style="width: 65px; height: 75px; object-fit: cover;">
                                    @endif
                                </div>
                            </div>

                            <!-- ১৩. স্থানীয় অভিভাবক -->
                            <div class="mb-4 pb-3 border-bottom">
                                <div class="d-flex justify-content-between align-items-start">
                                    <div>
                                        <h5 class="fw-bold mb-1" style="color: #1b4332;">
                                            <i class="bi bi-house-door me-2"></i>১৩. স্থানীয় অভিভাবক: {{ $admission->local_guardian_name ?: 'প্রযোজ্য নয়' }}
                                        </h5>
                                        <div class="small fw-semibold mt-1" style="color: #212529;">
                                            <strong>সম্পর্ক:</strong> {{ $admission->local_guardian_relation ?: 'N/A' }} | <strong>মোবাইল:</strong> <span class="fw-bold" style="color: #0f5132;">{{ $admission->local_guardian_mobile ?: 'N/A' }}</span> ({{ $admission->local_guardian_phone ?: 'ফোন নেই' }})
                                        </div>
                                        <p class="small mb-0 mt-1" style="color: #212529;"><strong>ঠিকানা:</strong> {{ $admission->local_guardian_address ?: 'N/A' }}</p>
                                    </div>
                                    @if($admission->local_guardian_photo)
                                        <img src="{{ asset($admission->local_guardian_photo) }}" alt="Local Guardian" class="rounded shadow-sm border ms-2" style="width: 65px; height: 75px; object-fit: cover;">
                                    @endif
                                </div>
                            </div>

                            <!-- ১৪. রেফারেল -->
                            <div>
                                <div class="d-flex justify-content-between align-items-start">
                                    <div>
                                        <h5 class="fw-bold mb-1" style="color: #1b4332;">
                                            <i class="bi bi-person-lines-fill me-2"></i>১৪. রেফারেল: {{ $admission->ref_name ?: 'নেই' }}
                                        </h5>
                                        <div class="small fw-semibold mt-1" style="color: #212529;">
                                            <strong>পেশা:</strong> {{ $admission->ref_profession ?: 'N/A' }} ({{ $admission->ref_designation ?: 'পদবি নেই' }}) | <strong>প্রতিষ্ঠান:</strong> {{ $admission->ref_organization_address ?: 'N/A' }}
                                        </div>
                                        <div class="small mt-1" style="color: #212529;">
                                            <strong>সম্পর্ক:</strong> {{ $admission->ref_relation ?: 'N/A' }} | <strong>মোবাইল:</strong> <span class="fw-bold" style="color: #0f5132;">{{ $admission->ref_mobile ?: 'N/A' }}</span> ({{ $admission->ref_phone ?: 'ফোন নেই' }})
                                        </div>
                                        @if($admission->ref_special_info)
                                            <p class="small mb-0 mt-1" style="color: #495057;"><strong>বিশেষ তথ্য:</strong> {{ $admission->ref_special_info }}</p>
                                        @endif
                                    </div>
                                    @if($admission->ref_photo)
                                        <img src="{{ asset($admission->ref_photo) }}" alt="Reference" class="rounded shadow-sm border ms-2" style="width: 65px; height: 75px; object-fit: cover;">
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- ==================== PAGE 3 VIEW ==================== -->
                        <div class="tab-pane fade" id="vcontent-p3" role="tabpanel">
                            <h5 class="fw-bold border-bottom pb-2 mb-3" style="color: #1b4332;">
                                <i class="bi bi-file-earmark-ruled me-2"></i>১৫. অভিভাবকের জ্ঞাতব্য বিষয় ও সম্মতি
                            </h5>
                            <div class="p-3 rounded-3 mb-3" style="background-color: #f8f9fa; border: 1px solid #e9ecef; color: #212529;">
                                <ul class="small mb-0 ps-3" style="line-height: 1.8; color: #212529;">
                                    <li>প্রতিষ্ঠানের সকল নিয়ম-কানুন ও অনুশাসন জেনে সন্তানকে ভর্তির সিদ্ধান্ত গ্রহণ করা হয়েছে।</li>
                                    <li>মহিলা অভিভাবকদের আগমনকালীন শালীন পোশাক ও হিজাব/পর্দা রক্ষা।</li>
                                    <li>প্রতি মাসের ৭ তারিখের মধ্যে যাবতীয় বেতন/ফি পরিশোধ।</li>
                                    <li>শিক্ষার্থীর স্বাস্থ্য ও ছুটির বিধি-বিধান মেনে চলার ডিজিটাল স্বাক্ষর প্রদান করা হয়েছে।</li>
                                </ul>
                            </div>
                        </div>

                        <!-- ==================== PAGE 4 VIEW ==================== -->
                        <div class="tab-pane fade" id="vcontent-p4" role="tabpanel">
                            <h5 class="fw-bold border-bottom pb-2 mb-3" style="color: #1b4332;">
                                <i class="bi bi-heart-pulse me-2"></i>১৮. শিক্ষার্থীর শারীরিক ও স্বাস্থ্যগত বিশেষ তথ্য
                            </h5>
                            <div class="row g-3" style="color: #212529;">
                                <div class="col-md-6">
                                    <span class="d-block small fw-bold" style="color: #495057;">ভাই বোন (সংখ্যা ও অবস্থান):</span>
                                    <strong style="color: #212529;">{{ $admission->siblings_info ?: 'N/A' }}</strong>
                                </div>
                                <div class="col-md-6">
                                    <span class="d-block small fw-bold" style="color: #495057;">জন্ম বৃত্তান্ত:</span>
                                    <strong style="color: #212529;">{{ $admission->birth_details ?: 'N/A' }}</strong>
                                </div>
                                <div class="col-md-4">
                                    <span class="d-block small fw-bold" style="color: #495057;">উচ্চতা:</span>
                                    <strong style="color: #212529;">{{ $admission->height ?: 'N/A' }}</strong>
                                </div>
                                <div class="col-md-4">
                                    <span class="d-block small fw-bold" style="color: #495057;">ওজন:</span>
                                    <strong style="color: #212529;">{{ $admission->weight ?: 'N/A' }}</strong>
                                </div>
                                <div class="col-md-4">
                                    <span class="d-block small fw-bold" style="color: #495057;">গায়ের রং:</span>
                                    <strong style="color: #212529;">{{ $admission->complexion ?: 'N/A' }}</strong>
                                </div>
                                <div class="col-md-6">
                                    <span class="d-block small fw-bold" style="color: #495057;">বিশেষ চিহ্ন:</span>
                                    <strong style="color: #212529;">{{ $admission->identification_mark ?: 'চিহ্ন নেই' }}</strong>
                                </div>
                                <div class="col-md-12">
                                    <span class="d-block small fw-bold" style="color: #495057;">বিশেষ রোগ / এলার্জি:</span>
                                    <span class="fw-bold" style="color: #dc3545;">{{ $admission->special_disease ?: 'কোনো বিশেষ রোগ নেই' }}</span>
                                </div>
                            </div>
                        </div>

                        <!-- ==================== PAGE 5 VIEW ==================== -->
                        <div class="tab-pane fade" id="vcontent-p5" role="tabpanel">
                            <h5 class="fw-bold border-bottom pb-2 mb-3" style="color: #1b4332;">
                                <i class="bi bi-paperclip me-2"></i>২১. সংযুক্তিকৃত ডকুমেন্টস ও চেকলিস্ট
                            </h5>
                            <div class="d-flex flex-wrap gap-2 mb-4">
                                @if($admission->birth_certificate_file)
                                    <a href="{{ asset($admission->birth_certificate_file) }}" target="_blank" class="btn btn-sm fw-bold shadow-sm" style="background-color: #0d6efd; color: #ffffff;">
                                        <i class="bi bi-file-earmark-pdf me-1"></i> জন্মনিবন্ধন সনদ ফাইল
                                    </a>
                                @else
                                    <span class="badge p-2 fw-semibold" style="background-color: #f8f9fa; color: #6c757d; border: 1px solid #dee2e6;">জন্মনিবন্ধন ফাইল নেই</span>
                                @endif

                                @if($admission->nid_file)
                                    <a href="{{ asset($admission->nid_file) }}" target="_blank" class="btn btn-sm fw-bold shadow-sm" style="background-color: #0d6efd; color: #ffffff;">
                                        <i class="bi bi-card-heading me-1"></i> NID ফাইল
                                    </a>
                                @else
                                    <span class="badge p-2 fw-semibold" style="background-color: #f8f9fa; color: #6c757d; border: 1px solid #dee2e6;">NID ফাইল নেই</span>
                                @endif

                                @if($admission->tc_file)
                                    <a href="{{ asset($admission->tc_file) }}" target="_blank" class="btn btn-sm fw-bold shadow-sm" style="background-color: #0d6efd; color: #ffffff;">
                                        <i class="bi bi-file-earmark-text me-1"></i> ছাড়পত্র (TC) ফাইল
                                    </a>
                                @else
                                    <span class="badge p-2 fw-semibold" style="background-color: #f8f9fa; color: #6c757d; border: 1px solid #dee2e6;">ছাড়পত্র ফাইল নেই</span>
                                @endif
                            </div>

                            <div class="p-3 rounded-3 border" style="background-color: #f8f9fa;">
                                <h6 class="fw-bold mb-2" style="color: #212529;">চেকলিস্ট স্ট্যাটাস:</h6>
                                <div class="d-flex flex-wrap gap-3 small" style="color: #212529;">
                                    <span><strong>শিক্ষার্থীর ছবি:</strong> {!! $admission->doc_student_photos ? '<i class="bi bi-check-circle-fill text-success"></i> জমা হয়েছে' : '<i class="bi bi-x-circle text-danger"></i> নেই' !!}</span>
                                    <span><strong>অভিভাবকের ছবি:</strong> {!! $admission->doc_guardian_photos ? '<i class="bi bi-check-circle-fill text-success"></i> জমা হয়েছে' : '<i class="bi bi-x-circle text-danger"></i> নেই' !!}</span>
                                    <span><strong>জন্ম সনদ:</strong> {!! $admission->doc_birth_certificate ? '<i class="bi bi-check-circle-fill text-success"></i> জমা হয়েছে' : '<i class="bi bi-x-circle text-danger"></i> নেই' !!}</span>
                                    <span><strong>NID:</strong> {!! $admission->doc_nid ? '<i class="bi bi-check-circle-fill text-success"></i> জমা হয়েছে' : '<i class="bi bi-x-circle text-danger"></i> নেই' !!}</span>
                                    <span><strong>ছাড়পত্র:</strong> {!! $admission->doc_tc ? '<i class="bi bi-check-circle-fill text-success"></i> জমা হয়েছে' : '<i class="bi bi-x-circle text-danger"></i> নেই' !!}</span>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <!-- Right 5 Cols: Examination Evaluation & Official Approval Panel -->
        <div class="col-lg-5">
            <div class="card shadow-sm rounded-3 sticky-top" style="top: 20px; border: 2px solid #1b4332;">
                <div class="card-header py-3 text-white" style="background-color: #1b4332;">
                    <h5 class="card-title mb-0 fw-bold text-white"><i class="bi bi-clipboard-check me-2"></i>ভর্তি পরীক্ষা মূল্যায়ন ও অনুমোদন (পৃষ্ঠা ৫)</h5>
                    <small class="text-white-50">১৯, ২০, ২১ ও ২২ নং অনুচ্ছেদ অফিস কর্তৃক পূরণীয়</small>
                </div>
                <div class="card-body p-4" style="background-color: #ffffff;">
                    <form action="{{ route('admissions.evaluate', $admission->id) }}" method="POST">
                        @csrf

                        <!-- ১৯. ভর্তি পরীক্ষার নম্বর বণ্টন -->
                        <h6 class="fw-bold border-bottom pb-2 mb-3" style="color: #1b4332;">১৯. ভর্তি পরীক্ষার ফলাফল (নম্বর বণ্টন)</h6>
                        
                        <div class="row g-2 mb-3">
                            <div class="col-6">
                                <label class="small fw-bold" style="color: #212529;">হিফয/নাযেরা (৫০):</label>
                                <input type="number" step="0.5" name="marks_hifz_nazera" class="form-control form-control-sm border-secondary-subtle" value="{{ old('marks_hifz_nazera', $admission->marks_hifz_nazera) }}" max="50" style="color: #212529; font-weight: bold;">
                            </div>
                            <div class="col-6">
                                <label class="small fw-bold" style="color: #212529;">তাজভীদ (৩০):</label>
                                <input type="number" step="0.5" name="marks_tajweed" class="form-control form-control-sm border-secondary-subtle" value="{{ old('marks_tajweed', $admission->marks_tajweed) }}" max="30" style="color: #212529; font-weight: bold;">
                            </div>
                            <div class="col-4">
                                <label class="small fw-bold" style="color: #212529;">উচ্চারণ (২০):</label>
                                <input type="number" step="0.5" name="marks_pronunciation" class="form-control form-control-sm border-secondary-subtle" value="{{ old('marks_pronunciation', $admission->marks_pronunciation) }}" max="20" style="color: #212529; font-weight: bold;">
                            </div>
                            <div class="col-4">
                                <label class="small fw-bold" style="color: #212529;">বাংলা (২০):</label>
                                <input type="number" step="0.5" name="marks_bangla" class="form-control form-control-sm border-secondary-subtle" value="{{ old('marks_bangla', $admission->marks_bangla) }}" max="20" style="color: #212529; font-weight: bold;">
                            </div>
                            <div class="col-4">
                                <label class="small fw-bold" style="color: #212529;">ইংরেজি (২০):</label>
                                <input type="number" step="0.5" name="marks_english" class="form-control form-control-sm border-secondary-subtle" value="{{ old('marks_english', $admission->marks_english) }}" max="20" style="color: #212529; font-weight: bold;">
                            </div>
                            <div class="col-6">
                                <label class="small fw-bold" style="color: #212529;">গণিত (২০):</label>
                                <input type="number" step="0.5" name="marks_math" class="form-control form-control-sm border-secondary-subtle" value="{{ old('marks_math', $admission->marks_math) }}" max="20" style="color: #212529; font-weight: bold;">
                            </div>
                            <div class="col-6">
                                <label class="small fw-bold" style="color: #212529;">সাধারণ জ্ঞান (৪০):</label>
                                <input type="number" step="0.5" name="marks_general_knowledge" class="form-control form-control-sm border-secondary-subtle" value="{{ old('marks_general_knowledge', $admission->marks_general_knowledge) }}" max="40" style="color: #212529; font-weight: bold;">
                            </div>
                        </div>

                        <!-- ২০. ভর্তি পরীক্ষার ফলাফল ও তিলাওয়াত -->
                        <h6 class="fw-bold border-bottom pb-2 mb-3 mt-4" style="color: #1b4332;">২০. ভর্তি পরীক্ষার ফলাফল ও তিলাওয়াতের মূল্যায়ন</h6>
                        <div class="row g-2 mb-3">
                            <div class="col-6">
                                <label class="small fw-bold" style="color: #212529;">পরীক্ষার তারিখ:</label>
                                <input type="date" name="admission_test_date" class="form-control form-control-sm border-secondary-subtle" value="{{ old('admission_test_date', $admission->admission_test_date ? $admission->admission_test_date->format('Y-m-d') : '') }}" style="color: #212529;">
                            </div>
                            <div class="col-6">
                                <label class="small fw-bold" style="color: #212529;">ফলাফল মূল্যায়ন:</label>
                                <select name="admission_test_result" class="form-select form-select-sm border-secondary-subtle" style="color: #212529; font-weight: 500;">
                                    <option value="">-- নির্বাচন --</option>
                                    <option value="উত্তীর্ণ" {{ old('admission_test_result', $admission->admission_test_result) == 'উত্তীর্ণ' ? 'selected' : '' }}>উত্তীর্ণ (Passed)</option>
                                    <option value="অনুত্তীর্ণ" {{ old('admission_test_result', $admission->admission_test_result) == 'অনুত্তীর্ণ' ? 'selected' : '' }}>অনুত্তীর্ণ (Failed)</option>
                                    <option value="অপেক্ষমান" {{ old('admission_test_result', $admission->admission_test_result) == 'অপেক্ষমান' ? 'selected' : '' }}>অপেক্ষমান (Waiting)</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <label class="small fw-bold" style="color: #212529;">কুরআন তিলাওয়াতের অবস্থা:</label>
                                <input type="text" name="quran_recitation_status" class="form-control form-control-sm border-secondary-subtle" value="{{ old('quran_recitation_status', $admission->quran_recitation_status) }}" placeholder="যেমনঃ সহীহ ও সুন্দর" style="color: #212529;">
                            </div>
                        </div>

                        <!-- ২২. ভর্তির অনুমোদন -->
                        <h6 class="fw-bold border-bottom pb-2 mb-3 mt-4" style="color: #1b4332;">২২. ভর্তির অনুমোদন</h6>
                        <div class="row g-2 mb-3">
                            <div class="col-6">
                                <label class="small fw-bold" style="color: #212529;">আবেদনের স্ট্যাটাস:</label>
                                <select name="status" class="form-select form-select-sm border-secondary-subtle" style="color: #212529; font-weight: 500;">
                                    <option value="pending" {{ old('status', $admission->status) == 'pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="under_review" {{ old('status', $admission->status) == 'under_review' ? 'selected' : '' }}>Under Review</option>
                                    <option value="test_scheduled" {{ old('status', $admission->status) == 'test_scheduled' ? 'selected' : '' }}>Test Scheduled</option>
                                    <option value="passed" {{ old('status', $admission->status) == 'passed' ? 'selected' : '' }}>Passed</option>
                                    <option value="approved" {{ old('status', $admission->status) == 'approved' ? 'selected' : '' }}>Approved</option>
                                    <option value="rejected" {{ old('status', $admission->status) == 'rejected' ? 'selected' : '' }}>Rejected</option>
                                    <option value="completed" {{ old('status', $admission->status) == 'completed' ? 'selected' : '' }}>Completed</option>
                                </select>
                            </div>
                            <div class="col-6">
                                <label class="small fw-bold" style="color: #212529;">রোল নং:</label>
                                <input type="text" name="assigned_roll_no" class="form-control form-control-sm border-secondary-subtle" value="{{ old('assigned_roll_no', $admission->assigned_roll_no) }}" placeholder="e.g. 101" style="color: #212529; font-weight: bold;">
                            </div>
                            <div class="col-6">
                                <label class="small fw-bold" style="color: #212529;">অনুমোদিত শ্রেণি:</label>
                                <input type="text" name="approved_class" class="form-control form-control-sm border-secondary-subtle" value="{{ old('approved_class', $admission->approved_class ?: $admission->desired_class) }}" style="color: #212529;">
                            </div>
                            <div class="col-6">
                                <label class="small fw-bold" style="color: #212529;">অনুমোদিত বিভাগ:</label>
                                <input type="text" name="approved_department" class="form-control form-control-sm border-secondary-subtle" value="{{ old('approved_department', $admission->approved_department ?: $admission->department_division) }}" style="color: #212529;">
                            </div>
                            <div class="col-12">
                                <label class="small fw-bold" style="color: #212529;">মন্তব্য / নোট:</label>
                                <textarea name="admin_notes" class="form-control form-control-sm border-secondary-subtle" rows="2" style="color: #212529;">{{ old('admin_notes', $admission->admin_notes) }}</textarea>
                            </div>
                        </div>

                        <div class="mt-4">
                            <button type="submit" class="btn w-100 fw-bold shadow py-2 text-white" style="background-color: #1b4332; border: 1px solid #1b4332;">
                                <i class="bi bi-check-circle me-1"></i> মূল্যায়ন ও অনুমোদন সংরক্ষণ করুন
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>

    </div>

    <!-- 1-Click Student Enrollment Modal -->
    <div class="modal fade" id="enrollModal" tabindex="-1" aria-labelledby="enrollModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-3 shadow">
                <div class="modal-header bg-white border-bottom">
                    <h5 class="modal-title fw-bold" style="color: #1b4332;" id="enrollModalLabel">
                        <i class="bi bi-mortarboard-fill text-success me-2"></i>শিক্ষার্থী হিসেবে নথিভুক্ত করুন (Enroll)
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('admissions.enroll', $admission->id) }}" method="POST">
                    @csrf
                    <div class="modal-body p-4" style="color: #212529;">
                        <div class="alert alert-success py-2 px-3 mb-3 small" style="background-color: #d1e7dd; color: #0f5132;">
                            <i class="bi bi-info-circle-fill me-1"></i> এই বাটনে ক্লিক করলে আবেদনকারীর ছবি, অভিভাবক ও ঠিকানাসহ সমস্ত তথ্য মূল <strong>Students</strong> ডাটাবেজে স্থায়ীভাবে যুক্ত হয়ে যাবে।
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">শিক্ষার্থীর নাম:</label>
                            <input type="text" class="form-control bg-light" value="{{ $admission->student_name_bn }}" readonly>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">শ্রেণি বরাদ্দ করুন <span class="text-danger">*</span></label>
                            @php
                                $classesList = \App\Models\StudentClass::where('status', 1)->orderBy('order_level', 'asc')->get();
                            @endphp
                            <select name="approved_class" class="form-select" required style="color: #212529; font-weight: 500;">
                                @if($classesList->count() > 0)
                                    @foreach($classesList as $c)
                                        <option value="{{ $c->name_bn }}" {{ ($admission->approved_class ?: $admission->desired_class) == $c->name_bn ? 'selected' : '' }}>
                                            {{ $c->name_bn }} @if($c->department) ({{ $c->department }}) @endif
                                        </option>
                                    @endforeach
                                @else
                                    <option value="{{ $admission->approved_class ?: $admission->desired_class }}" selected>
                                        {{ $admission->approved_class ?: $admission->desired_class }}
                                    </option>
                                @endif
                            </select>
                        </div>

                        <div class="row g-2 mb-3">
                            <div class="col-6">
                                <label class="form-label fw-bold">শ্রেণি রোল নম্বর</label>
                                <input type="text" name="assigned_roll_no" class="form-control" placeholder="e.g. 1" value="{{ old('assigned_roll_no', $admission->assigned_roll_no) }}" style="color: #212529; font-weight: bold;">
                            </div>
                            <div class="col-6">
                                <label class="form-label fw-bold">শিক্ষাবর্ষ</label>
                                <input type="text" name="academic_year" class="form-control" value="{{ old('academic_year', $admission->academic_year ?: date('Y')) }}" style="color: #212529;">
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer bg-light border-top">
                        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">বাতিল</button>
                        <button type="submit" class="btn btn-success btn-sm fw-bold shadow-sm px-4 text-white" style="background-color: #1b4332; border-color: #1b4332;">
                            <i class="bi bi-check2-circle me-1"></i> নিশ্চিত ও নথিভুক্ত করুন
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
@endsection
