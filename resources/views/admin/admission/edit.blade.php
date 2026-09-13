@extends('admin.master')

@section('body')
<div class="container-fluid mt-3 mb-5">

    @if (isset($errors) && $errors->any())
        <div class="alert alert-danger alert-dismissible fade show shadow-sm" role="alert" style="background-color: #f8d7da; color: #842029; border-color: #f5c2c7;">
            <h6 class="fw-bold mb-1"><i class="bi bi-exclamation-triangle-fill me-2"></i>ফর্ম পূরণে কিছু ত্রুটি রয়েছে:</h6>
            <ul class="mb-0 ps-3">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card border shadow-sm rounded-3">
        <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center border-bottom">
            <div>
                <h4 class="card-title mb-0 fw-bold" style="color: #1b4332;">
                    <i class="bi bi-pencil-square text-success me-2"></i>ভর্তি আবেদন তথ্য সম্পাদনা: {{ $admission->student_name_bn ?: $admission->student_name_en }} ({{ $admission->application_no }})
                </h4>
                <small class="text-secondary">৫টি পৃষ্ঠার বুকলেট বিন্যাস অনুযায়ী তথ্য হালনাগাদ করুন</small>
            </div>
            <div class="d-flex gap-2">
                <a href="{{ route('admissions.show', $admission->id) }}" class="btn btn-outline-info btn-sm shadow-sm fw-bold">
                    <i class="bi bi-eye me-1"></i> বিস্তারিত দেখুন
                </a>
                <a href="{{ route('admissions.index') }}" class="btn btn-outline-secondary btn-sm shadow-sm fw-bold">
                    <i class="bi bi-arrow-left me-1"></i> তালিকায় ফিরে যান
                </a>
            </div>
        </div>

        <!-- 5-Page Tab Navigation with High Contrast -->
        <ul class="nav nav-tabs px-3 pt-3 border-bottom" id="admissionFormTabs" role="tablist" style="background-color: #f8f9fa;">
            <li class="nav-item" role="presentation">
                <button class="nav-link active fw-bold" id="tab-page-1" data-bs-toggle="tab" data-bs-target="#content-page-1" type="button" role="tab" style="color: #1b4332;">
                    <span class="badge text-white me-1" style="background-color: #1b4332;">১</span> পৃষ্ঠা ১: আবেদন ফরম
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link fw-bold" id="tab-page-2" data-bs-toggle="tab" data-bs-target="#content-page-2" type="button" role="tab" style="color: #212529;">
                    <span class="badge text-white me-1" style="background-color: #495057;">২</span> পৃষ্ঠা ২: অভিভাবক ও রেফারেল
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link fw-bold" id="tab-page-3" data-bs-toggle="tab" data-bs-target="#content-page-3" type="button" role="tab" style="color: #212529;">
                    <span class="badge text-white me-1" style="background-color: #495057;">৩</span> পৃষ্ঠা ৩: জ্ঞাতব্য ও সম্মতি
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link fw-bold" id="tab-page-4" data-bs-toggle="tab" data-bs-target="#content-page-4" type="button" role="tab" style="color: #212529;">
                    <span class="badge text-white me-1" style="background-color: #495057;">৪</span> পৃষ্ঠা ৪: ওয়াদা ও বিশেষ তথ্য
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link fw-bold" id="tab-page-5" data-bs-toggle="tab" data-bs-target="#content-page-5" type="button" role="tab" style="color: #212529;">
                    <span class="badge text-white me-1" style="background-color: #495057;">৫</span> পৃষ্ঠা ৫: অফিস ও অনুমোদন
                </button>
            </li>
        </ul>

        <div class="card-body p-4" style="background-color: #ffffff; color: #212529;">
            <form action="{{ route('admissions.update', $admission->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="tab-content" id="admissionFormTabContent">

                    <!-- ========================================================================= -->
                    <!-- ==================== TAB PAGE 1: আবেদন ফরম ============================== -->
                    <!-- ========================================================================= -->
                    <div class="tab-pane fade show active" id="content-page-1" role="tabpanel">
                        
                        <!-- একাডেমিক তথ্য -->
                        <h5 class="fw-bold border-bottom pb-2 mb-3" style="color: #1b4332;">
                            <i class="bi bi-mortarboard me-2"></i>একাডেমিক ও ভর্তির ধরন
                        </h5>
                        <div class="row g-3 mb-4">
                            <div class="col-md-3 form-group">
                                <label class="form-label fw-bold" style="color: #212529;">শিক্ষাবর্ষ <span class="text-danger">*</span></label>
                                <input type="text" name="academic_year" class="form-control" value="{{ old('academic_year', $admission->academic_year) }}" required style="color: #212529;">
                            </div>
                            <div class="col-md-3 form-group">
                                <label class="form-label fw-bold" style="color: #212529;">৬. ভর্তির শ্রেণি <span class="text-danger">*</span></label>
                                @php
                                    $availableClasses = \App\Models\StudentClass::where('status', 1)->orderBy('order_level', 'asc')->get();
                                @endphp
                                <select name="desired_class" class="form-select" required style="color: #212529;">
                                    <option value="">-- শ্রেণি নির্বাচন করুন --</option>
                                    @if($availableClasses->count() > 0)
                                        @foreach($availableClasses as $ac)
                                            <option value="{{ $ac->name_bn }}" {{ old('desired_class', $admission->desired_class) == $ac->name_bn ? 'selected' : '' }}>
                                                {{ $ac->name_bn }} @if($ac->department) ({{ $ac->department }}) @endif
                                            </option>
                                        @endforeach
                                    @else
                                        <option value="নূরানী ১ম শ্রেণি" {{ old('desired_class', $admission->desired_class) == 'নূরানী ১ম শ্রেণি' ? 'selected' : '' }}>নূরানী ১ম শ্রেণি</option>
                                        <option value="নূরানী ২য় শ্রেণি" {{ old('desired_class', $admission->desired_class) == 'নূরানী ২য় শ্রেণি' ? 'selected' : '' }}>নূরানী ২য় শ্রেণি</option>
                                        <option value="নূরানী ৩য় শ্রেণি" {{ old('desired_class', $admission->desired_class) == 'নূরানী ৩য় শ্রেণি' ? 'selected' : '' }}>নূরানী ৩য় শ্রেণি</option>
                                        <option value="নাজেরা" {{ old('desired_class', $admission->desired_class) == 'নাজেরা' ? 'selected' : '' }}>নাজেরা</option>
                                        <option value="হিফজুল কুরআন" {{ old('desired_class', $admission->desired_class) == 'হিফজুল কুরআন' ? 'selected' : '' }}>হিফজুল কুরআন</option>
                                        <option value="শুনানী জামাত" {{ old('desired_class', $admission->desired_class) == 'শুনানী জামাত' ? 'selected' : '' }}>শুনানী জামাত</option>
                                        <option value="কিতাব বিভাগ" {{ old('desired_class', $admission->desired_class) == 'কিতাব বিভাগ' ? 'selected' : '' }}>কিতাব বিভাগ</option>
                                    @endif
                                </select>
                            </div>
                            <div class="col-md-3 form-group">
                                <label class="form-label fw-bold" style="color: #212529;">বিভাগ</label>
                                <select name="department_division" class="form-select" style="color: #212529;">
                                    <option value="">-- বিভাগ নির্বাচন করুন --</option>
                                    <option value="নূরানী বিভাগ" {{ old('department_division', $admission->department_division) == 'নূরানী বিভাগ' ? 'selected' : '' }}>নূরানী বিভাগ</option>
                                    <option value="নাজেরা বিভাগ" {{ old('department_division', $admission->department_division) == 'নাজেরা বিভাগ' ? 'selected' : '' }}>নাজেরা বিভাগ</option>
                                    <option value="হিফজ বিভাগ" {{ old('department_division', $admission->department_division) == 'হিফজ বিভাগ' ? 'selected' : '' }}>হিফজ বিভাগ</option>
                                    <option value="শুনানী বিভাগ" {{ old('department_division', $admission->department_division) == 'শুনানী বিভাগ' ? 'selected' : '' }}>শুনানী বিভাগ</option>
                                    <option value="প্রতিযোগিতা বিভাগ" {{ old('department_division', $admission->department_division) == 'প্রতিযোগিতা বিভাগ' ? 'selected' : '' }}>প্রতিযোগিতা বিভাগ</option>
                                </select>
                            </div>
                            <div class="col-md-3 form-group">
                                <label class="form-label fw-bold" style="color: #212529;">৭. ধরন <span class="text-danger">*</span></label>
                                <select name="residential_type" class="form-select" required style="color: #212529;">
                                    <option value="residential" {{ old('residential_type', $admission->residential_type) == 'residential' ? 'selected' : '' }}>আবাসিক (Residential)</option>
                                    <option value="non_residential" {{ old('residential_type', $admission->residential_type) == 'non_residential' ? 'selected' : '' }}>অনাবাসিক (Non-Residential)</option>
                                    <option value="day_care" {{ old('residential_type', $admission->residential_type) == 'day_care' ? 'selected' : '' }}>ডে-কেয়ার (Day Care)</option>
                                </select>
                            </div>
                        </div>

                        <!-- ১. শিক্ষার্থীর নাম ও ব্যক্তিগত তথ্য -->
                        <h5 class="fw-bold border-bottom pb-2 mb-3" style="color: #1b4332;">
                            <i class="bi bi-person me-2"></i>১. শিক্ষার্থীর নাম ও ব্যক্তিগত তথ্য
                        </h5>
                        <div class="row g-3 mb-4">
                            <div class="col-md-6 form-group">
                                <label class="form-label fw-bold" style="color: #212529;">শিক্ষার্থীর নাম (বাংলায়) <span class="text-danger">*</span></label>
                                <input type="text" name="student_name_bn" class="form-control" value="{{ old('student_name_bn', $admission->student_name_bn) }}" required style="color: #212529;">
                            </div>
                            <div class="col-md-6 form-group">
                                <label class="form-label fw-bold" style="color: #212529;">শিক্ষার্থীর নাম (ইংরেজিতে)</label>
                                <input type="text" name="student_name_en" class="form-control text-uppercase" value="{{ old('student_name_en', $admission->student_name_en) }}" style="color: #212529;">
                            </div>
                            <div class="col-md-3 form-group">
                                <label class="form-label fw-bold" style="color: #212529;">৪. জন্ম তারিখ</label>
                                <input type="date" name="dob" class="form-control" value="{{ old('dob', $admission->dob ? $admission->dob->format('Y-m-d') : '') }}" style="color: #212529;">
                            </div>
                            <div class="col-md-3 form-group">
                                <label class="form-label fw-bold" style="color: #212529;">বয়স</label>
                                <input type="text" name="age" class="form-control" value="{{ old('age', $admission->age) }}" style="color: #212529;">
                            </div>
                            <div class="col-md-2 form-group">
                                <label class="form-label fw-bold" style="color: #212529;">৫. রক্তের গ্রুপ</label>
                                <select name="blood_group" class="form-select" style="color: #212529;">
                                    <option value="">-- নির্বাচন --</option>
                                    <option value="A+" {{ old('blood_group', $admission->blood_group) == 'A+' ? 'selected' : '' }}>A+</option>
                                    <option value="A-" {{ old('blood_group', $admission->blood_group) == 'A-' ? 'selected' : '' }}>A-</option>
                                    <option value="B+" {{ old('blood_group', $admission->blood_group) == 'B+' ? 'selected' : '' }}>B+</option>
                                    <option value="B-" {{ old('blood_group', $admission->blood_group) == 'B-' ? 'selected' : '' }}>B-</option>
                                    <option value="O+" {{ old('blood_group', $admission->blood_group) == 'O+' ? 'selected' : '' }}>O+</option>
                                    <option value="O-" {{ old('blood_group', $admission->blood_group) == 'O-' ? 'selected' : '' }}>O-</option>
                                    <option value="AB+" {{ old('blood_group', $admission->blood_group) == 'AB+' ? 'selected' : '' }}>AB+</option>
                                    <option value="AB-" {{ old('blood_group', $admission->blood_group) == 'AB-' ? 'selected' : '' }}>AB-</option>
                                </select>
                            </div>
                            <div class="col-md-2 form-group">
                                <label class="form-label fw-bold" style="color: #212529;">জাতীয়তা</label>
                                <input type="text" name="nationality" class="form-control" value="{{ old('nationality', $admission->nationality) }}" style="color: #212529;">
                            </div>
                            <div class="col-md-2 form-group">
                                <label class="form-label fw-bold" style="color: #212529;">ধর্ম</label>
                                <input type="text" name="religion" class="form-control" value="{{ old('religion', $admission->religion) }}" style="color: #212529;">
                            </div>
                            <div class="col-md-12 form-group">
                                <label class="form-label fw-bold" style="color: #212529;">শিক্ষার্থীর ছবি</label>
                                @if($admission->student_photo)
                                    <div class="mb-2">
                                        <img src="{{ asset($admission->student_photo) }}" alt="Student Photo" class="rounded border shadow-sm" style="width: 80px; height: 95px; object-fit: cover;">
                                    </div>
                                @endif
                                <input type="file" name="student_photo" class="form-control" accept="image/*">
                            </div>
                        </div>

                        <!-- ২ & ৩. পিতা ও মাতার তথ্যাবলি -->
                        <h5 class="fw-bold border-bottom pb-2 mb-3" style="color: #1b4332;">
                            <i class="bi bi-people me-2"></i>২ & ৩. পিতা ও মাতার তথ্যাবলি
                        </h5>
                        <div class="row g-3 mb-4">
                            <!-- ২. পিতা -->
                            <div class="col-12">
                                <div class="p-2 rounded fw-bold" style="background-color: #e8f5e9; color: #1b4332; border: 1px solid #c8e6c9;">
                                    ২. পিতার তথ্যাবলি
                                </div>
                            </div>
                            <div class="col-md-6 form-group">
                                <label class="form-label fw-bold" style="color: #212529;">পিতার নাম (বাংলায়)</label>
                                <input type="text" name="father_name_bn" class="form-control" value="{{ old('father_name_bn', $admission->father_name_bn) }}" style="color: #212529;">
                            </div>
                            <div class="col-md-6 form-group">
                                <label class="form-label fw-bold" style="color: #212529;">পিতার নাম (ইংরেজিতে)</label>
                                <input type="text" name="father_name_en" class="form-control text-uppercase" value="{{ old('father_name_en', $admission->father_name_en) }}" style="color: #212529;">
                            </div>
                            <div class="col-md-3 form-group">
                                <label class="form-label fw-bold" style="color: #212529;">পিতার শিক্ষাগত যোগ্যতা</label>
                                <input type="text" name="father_education" class="form-control" value="{{ old('father_education', $admission->father_education) }}" style="color: #212529;">
                            </div>
                            <div class="col-md-3 form-group">
                                <label class="form-label fw-bold" style="color: #212529;">পিতার পেশা</label>
                                <input type="text" name="father_profession" class="form-control" value="{{ old('father_profession', $admission->father_profession) }}" style="color: #212529;">
                            </div>
                            <div class="col-md-3 form-group">
                                <label class="form-label fw-bold" style="color: #212529;">পিতার পদবি</label>
                                <input type="text" name="father_designation" class="form-control" value="{{ old('father_designation', $admission->father_designation) }}" style="color: #212529;">
                            </div>
                            <div class="col-md-3 form-group">
                                <label class="form-label fw-bold" style="color: #212529;">পিতার মোবাইল/যোগাযোগ</label>
                                <input type="text" name="father_contact" class="form-control" value="{{ old('father_contact', $admission->father_contact) }}" style="color: #212529;">
                            </div>
                            <div class="col-md-12 form-group">
                                <label class="form-label fw-bold" style="color: #212529;">পিতার ছবি</label>
                                @if($admission->father_photo)
                                    <div class="mb-2">
                                        <img src="{{ asset($admission->father_photo) }}" alt="Father Photo" class="rounded border shadow-sm" style="width: 70px; height: 80px; object-fit: cover;">
                                    </div>
                                @endif
                                <input type="file" name="father_photo" class="form-control" accept="image/*">
                            </div>

                            <!-- ৩. মাতা -->
                            <div class="col-12 mt-3">
                                <div class="p-2 rounded fw-bold" style="background-color: #e8f5e9; color: #1b4332; border: 1px solid #c8e6c9;">
                                    ৩. মাতার তথ্যাবলি
                                </div>
                            </div>
                            <div class="col-md-6 form-group">
                                <label class="form-label fw-bold" style="color: #212529;">মাতার নাম (বাংলায়)</label>
                                <input type="text" name="mother_name_bn" class="form-control" value="{{ old('mother_name_bn', $admission->mother_name_bn) }}" style="color: #212529;">
                            </div>
                            <div class="col-md-6 form-group">
                                <label class="form-label fw-bold" style="color: #212529;">মাতার নাম (ইংরেজিতে)</label>
                                <input type="text" name="mother_name_en" class="form-control text-uppercase" value="{{ old('mother_name_en', $admission->mother_name_en) }}" style="color: #212529;">
                            </div>
                            <div class="col-md-3 form-group">
                                <label class="form-label fw-bold" style="color: #212529;">মাতার শিক্ষাগত যোগ্যতা</label>
                                <input type="text" name="mother_education" class="form-control" value="{{ old('mother_education', $admission->mother_education) }}" style="color: #212529;">
                            </div>
                            <div class="col-md-3 form-group">
                                <label class="form-label fw-bold" style="color: #212529;">মাতার পেশা</label>
                                <input type="text" name="mother_profession" class="form-control" value="{{ old('mother_profession', $admission->mother_profession) }}" style="color: #212529;">
                            </div>
                            <div class="col-md-3 form-group">
                                <label class="form-label fw-bold" style="color: #212529;">মাতার পদবি</label>
                                <input type="text" name="mother_designation" class="form-control" value="{{ old('mother_designation', $admission->mother_designation) }}" style="color: #212529;">
                            </div>
                            <div class="col-md-3 form-group">
                                <label class="form-label fw-bold" style="color: #212529;">মাতার মোবাইল/যোগাযোগ</label>
                                <input type="text" name="mother_contact" class="form-control" value="{{ old('mother_contact', $admission->mother_contact) }}" style="color: #212529;">
                            </div>
                            <div class="col-md-12 form-group">
                                <label class="form-label fw-bold" style="color: #212529;">মাতার ছবি</label>
                                @if($admission->mother_photo)
                                    <div class="mb-2">
                                        <img src="{{ asset($admission->mother_photo) }}" alt="Mother Photo" class="rounded border shadow-sm" style="width: 70px; height: 80px; object-fit: cover;">
                                    </div>
                                @endif
                                <input type="file" name="mother_photo" class="form-control" accept="image/*">
                            </div>
                        </div>

                        <!-- ৮. বর্তমান ঠিকানা ও ৯. স্থায়ী ঠিকানা -->
                        <h5 class="fw-bold border-bottom pb-2 mb-3" style="color: #1b4332;">
                            <i class="bi bi-geo-alt me-2"></i>৮. বর্তমান ঠিকানা ও ৯. স্থায়ী ঠিকানা
                        </h5>
                        <div class="row g-3 mb-4">
                            <div class="col-md-12 form-group">
                                <label class="form-label fw-bold" style="color: #212529;">৮. বর্তমান ঠিকানা <span class="text-danger">*</span></label>
                                <textarea name="present_address" class="form-control" rows="2" required style="color: #212529;">{{ old('present_address', $admission->present_address) }}</textarea>
                            </div>
                            <div class="col-md-4 form-group">
                                <label class="form-label fw-bold" style="color: #212529;">মোবাইল নম্বর <span class="text-danger">*</span></label>
                                <input type="text" name="mobile" class="form-control" value="{{ old('mobile', $admission->mobile) }}" required style="color: #212529;">
                            </div>
                            <div class="col-md-4 form-group">
                                <label class="form-label fw-bold" style="color: #212529;">ফোন</label>
                                <input type="text" name="phone" class="form-control" value="{{ old('phone', $admission->phone) }}" style="color: #212529;">
                            </div>
                            <div class="col-md-4 form-group">
                                <label class="form-label fw-bold" style="color: #212529;">ই-মেইল</label>
                                <input type="email" name="email" class="form-control" value="{{ old('email', $admission->email) }}" style="color: #212529;">
                            </div>
                            <div class="col-12"><strong style="color: #495057;">৯. স্থায়ী ঠিকানা</strong></div>
                            <div class="col-md-3 form-group">
                                <label class="form-label fw-bold" style="color: #212529;">স্থায়ী গ্রাম</label>
                                <input type="text" name="permanent_village" class="form-control" value="{{ old('permanent_village', $admission->permanent_village) }}" style="color: #212529;">
                            </div>
                            <div class="col-md-3 form-group">
                                <label class="form-label fw-bold" style="color: #212529;">ডাকঘর</label>
                                <input type="text" name="permanent_post_office" class="form-control" value="{{ old('permanent_post_office', $admission->permanent_post_office) }}" style="color: #212529;">
                            </div>
                            <div class="col-md-2 form-group">
                                <label class="form-label fw-bold" style="color: #212529;">পোস্টকোড</label>
                                <input type="text" name="permanent_post_code" class="form-control" value="{{ old('permanent_post_code', $admission->permanent_post_code) }}" style="color: #212529;">
                            </div>
                            <div class="col-md-2 form-group">
                                <label class="form-label fw-bold" style="color: #212529;">উপজেলা</label>
                                <input type="text" name="permanent_upazila" class="form-control" value="{{ old('permanent_upazila', $admission->permanent_upazila) }}" style="color: #212529;">
                            </div>
                            <div class="col-md-2 form-group">
                                <label class="form-label fw-bold" style="color: #212529;">জেলা</label>
                                <input type="text" name="permanent_district" class="form-control" value="{{ old('permanent_district', $admission->permanent_district) }}" style="color: #212529;">
                            </div>
                        </div>

                        <!-- ১০. পূর্ববর্তী প্রতিষ্ঠানের তথ্য -->
                        <h5 class="fw-bold border-bottom pb-2 mb-3" style="color: #1b4332;">
                            <i class="bi bi-building me-2"></i>১০. পূর্ববর্তী প্রতিষ্ঠানের তথ্য
                        </h5>
                        <div class="row g-3 mb-4">
                            <div class="col-md-5 form-group">
                                <label class="form-label fw-bold" style="color: #212529;">পূর্ববর্তী প্রতিষ্ঠানের নাম</label>
                                <input type="text" name="previous_institute_name" class="form-control" value="{{ old('previous_institute_name', $admission->previous_institute_name) }}" style="color: #212529;">
                            </div>
                            <div class="col-md-4 form-group">
                                <label class="form-label fw-bold" style="color: #212529;">ঠিকানা</label>
                                <input type="text" name="previous_institute_address" class="form-control" value="{{ old('previous_institute_address', $admission->previous_institute_address) }}" style="color: #212529;">
                            </div>
                            <div class="col-md-3 form-group">
                                <label class="form-label fw-bold" style="color: #212529;">সর্বশেষ শ্রেণি</label>
                                <input type="text" name="previous_class" class="form-control" value="{{ old('previous_class', $admission->previous_class) }}" style="color: #212529;">
                            </div>
                        </div>

                    </div>


                    <!-- ========================================================================= -->
                    <!-- ==================== TAB PAGE 2: অভিভাবক ও রেফারেল ======================== -->
                    <!-- ========================================================================= -->
                    <div class="tab-pane fade" id="content-page-2" role="tabpanel">

                        <!-- ১১. প্রকৃত অভিভাবক -->
                        <h5 class="fw-bold border-bottom pb-2 mb-3" style="color: #1b4332;">
                            <i class="bi bi-shield-check me-2"></i>১১. প্রকৃত অভিভাবক
                        </h5>
                        <div class="row g-3 mb-4">
                            <div class="col-md-6 form-group">
                                <label class="form-label fw-bold" style="color: #212529;">নাম</label>
                                <input type="text" name="guardian_name" class="form-control" value="{{ old('guardian_name', $admission->guardian_name) }}" style="color: #212529;">
                            </div>
                            <div class="col-md-6 form-group">
                                <label class="form-label fw-bold" style="color: #212529;">পিতার নাম</label>
                                <input type="text" name="guardian_father_name" class="form-control" value="{{ old('guardian_father_name', $admission->guardian_father_name) }}" style="color: #212529;">
                            </div>
                            <div class="col-md-4 form-group">
                                <label class="form-label fw-bold" style="color: #212529;">শিক্ষাগত যোগ্যতা</label>
                                <input type="text" name="guardian_education" class="form-control" value="{{ old('guardian_education', $admission->guardian_education) }}" style="color: #212529;">
                            </div>
                            <div class="col-md-4 form-group">
                                <label class="form-label fw-bold" style="color: #212529;">পেশা</label>
                                <input type="text" name="guardian_profession" class="form-control" value="{{ old('guardian_profession', $admission->guardian_profession) }}" style="color: #212529;">
                            </div>
                            <div class="col-md-4 form-group">
                                <label class="form-label fw-bold" style="color: #212529;">পদবি</label>
                                <input type="text" name="guardian_designation" class="form-control" value="{{ old('guardian_designation', $admission->guardian_designation) }}" style="color: #212529;">
                            </div>
                            <div class="col-md-6 form-group">
                                <label class="form-label fw-bold" style="color: #212529;">ঠিকানা (কর্মস্থল)</label>
                                <input type="text" name="guardian_workplace_address" class="form-control" value="{{ old('guardian_workplace_address', $admission->guardian_workplace_address) }}" style="color: #212529;">
                            </div>
                            <div class="col-md-6 form-group">
                                <label class="form-label fw-bold" style="color: #212529;">বর্তমান ঠিকানা</label>
                                <input type="text" name="guardian_present_address" class="form-control" value="{{ old('guardian_present_address', $admission->guardian_present_address) }}" style="color: #212529;">
                            </div>
                            <div class="col-md-3 form-group">
                                <label class="form-label fw-bold" style="color: #212529;">স্থায়ী গ্রাম</label>
                                <input type="text" name="guardian_permanent_village" class="form-control" value="{{ old('guardian_permanent_village', $admission->guardian_permanent_village) }}" style="color: #212529;">
                            </div>
                            <div class="col-md-3 form-group">
                                <label class="form-label fw-bold" style="color: #212529;">ডাকঘর</label>
                                <input type="text" name="guardian_permanent_post_office" class="form-control" value="{{ old('guardian_permanent_post_office', $admission->guardian_permanent_post_office) }}" style="color: #212529;">
                            </div>
                            <div class="col-md-2 form-group">
                                <label class="form-label fw-bold" style="color: #212529;">পোস্টকোড</label>
                                <input type="text" name="guardian_permanent_post_code" class="form-control" value="{{ old('guardian_permanent_post_code', $admission->guardian_permanent_post_code) }}" style="color: #212529;">
                            </div>
                            <div class="col-md-2 form-group">
                                <label class="form-label fw-bold" style="color: #212529;">উপজেলা</label>
                                <input type="text" name="guardian_permanent_upazila" class="form-control" value="{{ old('guardian_permanent_upazila', $admission->guardian_permanent_upazila) }}" style="color: #212529;">
                            </div>
                            <div class="col-md-2 form-group">
                                <label class="form-label fw-bold" style="color: #212529;">জেলা</label>
                                <input type="text" name="guardian_permanent_district" class="form-control" value="{{ old('guardian_permanent_district', $admission->guardian_permanent_district) }}" style="color: #212529;">
                            </div>
                            <div class="col-md-4 form-group">
                                <label class="form-label fw-bold" style="color: #212529;">সম্পর্ক ও বিশেষ তথ্য</label>
                                <input type="text" name="guardian_relation_info" class="form-control" value="{{ old('guardian_relation_info', $admission->guardian_relation_info) }}" style="color: #212529;">
                            </div>
                            <div class="col-md-4 form-group">
                                <label class="form-label fw-bold" style="color: #212529;">বার্ষিক আয়</label>
                                <input type="text" name="guardian_annual_income" class="form-control" value="{{ old('guardian_annual_income', $admission->guardian_annual_income) }}" style="color: #212529;">
                            </div>
                            <div class="col-md-4 form-group">
                                <label class="form-label fw-bold" style="color: #212529;">আয়ের উৎস</label>
                                <input type="text" name="guardian_income_source" class="form-control" value="{{ old('guardian_income_source', $admission->guardian_income_source) }}" style="color: #212529;">
                            </div>
                            <div class="col-md-6 form-group">
                                <label class="form-label fw-bold" style="color: #212529;">যোগাযোগ মোবাইল</label>
                                <input type="text" name="guardian_mobile" class="form-control" value="{{ old('guardian_mobile', $admission->guardian_mobile) }}" style="color: #212529;">
                            </div>
                            <div class="col-md-6 form-group">
                                <label class="form-label fw-bold" style="color: #212529;">ই-মেইল</label>
                                <input type="email" name="guardian_email" class="form-control" value="{{ old('guardian_email', $admission->guardian_email) }}" style="color: #212529;">
                            </div>
                            <div class="col-md-12 form-group">
                                <label class="form-label fw-bold" style="color: #212529;">প্রকৃত অভিভাবকের ছবি</label>
                                @if($admission->guardian_photo)
                                    <div class="mb-2">
                                        <img src="{{ asset($admission->guardian_photo) }}" alt="Guardian Photo" class="rounded border shadow-sm" style="width: 70px; height: 80px; object-fit: cover;">
                                    </div>
                                @endif
                                <input type="file" name="guardian_photo" class="form-control" accept="image/*">
                            </div>
                        </div>

                        <!-- ১২. ক্যাম্পাস/হোস্টেল থেকে যিনি বাড়িতে আনা-নেওয়া করবেন -->
                        <h5 class="fw-bold border-bottom pb-2 mb-3" style="color: #1b4332;">
                            <i class="bi bi-bus-front me-2"></i>১২. ক্যাম্পাস/হোস্টেল থেকে শিক্ষার্থীকে যিনি বাড়িতে আনা-নেওয়া করবেন
                        </h5>
                        <div class="row g-3 mb-4">
                            <div class="col-md-6 form-group">
                                <label class="form-label fw-bold" style="color: #212529;">নাম</label>
                                <input type="text" name="pick_drop_name" class="form-control" value="{{ old('pick_drop_name', $admission->pick_drop_name) }}" style="color: #212529;">
                            </div>
                            <div class="col-md-6 form-group">
                                <label class="form-label fw-bold" style="color: #212529;">ঠিকানা</label>
                                <input type="text" name="pick_drop_address" class="form-control" value="{{ old('pick_drop_address', $admission->pick_drop_address) }}" style="color: #212529;">
                            </div>
                            <div class="col-md-4 form-group">
                                <label class="form-label fw-bold" style="color: #212529;">সম্পর্ক</label>
                                <input type="text" name="pick_drop_relation" class="form-control" value="{{ old('pick_drop_relation', $admission->pick_drop_relation) }}" style="color: #212529;">
                            </div>
                            <div class="col-md-4 form-group">
                                <label class="form-label fw-bold" style="color: #212529;">মোবাইল</label>
                                <input type="text" name="pick_drop_mobile" class="form-control" value="{{ old('pick_drop_mobile', $admission->pick_drop_mobile) }}" style="color: #212529;">
                            </div>
                            <div class="col-md-4 form-group">
                                <label class="form-label fw-bold" style="color: #212529;">ফোন</label>
                                <input type="text" name="pick_drop_phone" class="form-control" value="{{ old('pick_drop_phone', $admission->pick_drop_phone) }}" style="color: #212529;">
                            </div>
                            <div class="col-md-12 form-group">
                                <label class="form-label fw-bold" style="color: #212529;">আনা-নেওয়াকারীর ছবি</label>
                                @if($admission->pick_drop_photo)
                                    <div class="mb-2">
                                        <img src="{{ asset($admission->pick_drop_photo) }}" alt="Pick Drop Photo" class="rounded border shadow-sm" style="width: 70px; height: 80px; object-fit: cover;">
                                    </div>
                                @endif
                                <input type="file" name="pick_drop_photo" class="form-control" accept="image/*">
                            </div>
                        </div>

                        <!-- ১৩. স্থানীয় অভিভাবক -->
                        <h5 class="fw-bold border-bottom pb-2 mb-3" style="color: #1b4332;">
                            <i class="bi bi-house-door me-2"></i>১৩. স্থানীয় অভিভাবক (Local Guardian)
                        </h5>
                        <div class="row g-3 mb-4">
                            <div class="col-md-6 form-group">
                                <label class="form-label fw-bold" style="color: #212529;">নাম</label>
                                <input type="text" name="local_guardian_name" class="form-control" value="{{ old('local_guardian_name', $admission->local_guardian_name) }}" style="color: #212529;">
                            </div>
                            <div class="col-md-6 form-group">
                                <label class="form-label fw-bold" style="color: #212529;">ঠিকানা</label>
                                <input type="text" name="local_guardian_address" class="form-control" value="{{ old('local_guardian_address', $admission->local_guardian_address) }}" style="color: #212529;">
                            </div>
                            <div class="col-md-4 form-group">
                                <label class="form-label fw-bold" style="color: #212529;">সম্পর্ক</label>
                                <input type="text" name="local_guardian_relation" class="form-control" value="{{ old('local_guardian_relation', $admission->local_guardian_relation) }}" style="color: #212529;">
                            </div>
                            <div class="col-md-4 form-group">
                                <label class="form-label fw-bold" style="color: #212529;">মোবাইল</label>
                                <input type="text" name="local_guardian_mobile" class="form-control" value="{{ old('local_guardian_mobile', $admission->local_guardian_mobile) }}" style="color: #212529;">
                            </div>
                            <div class="col-md-4 form-group">
                                <label class="form-label fw-bold" style="color: #212529;">ফোন</label>
                                <input type="text" name="local_guardian_phone" class="form-control" value="{{ old('local_guardian_phone', $admission->local_guardian_phone) }}" style="color: #212529;">
                            </div>
                            <div class="col-md-12 form-group">
                                <label class="form-label fw-bold" style="color: #212529;">স্থানীয় অভিভাবকের ছবি</label>
                                @if($admission->local_guardian_photo)
                                    <div class="mb-2">
                                        <img src="{{ asset($admission->local_guardian_photo) }}" alt="Local Guardian Photo" class="rounded border shadow-sm" style="width: 70px; height: 80px; object-fit: cover;">
                                    </div>
                                @endif
                                <input type="file" name="local_guardian_photo" class="form-control" accept="image/*">
                            </div>
                        </div>

                        <!-- ১৪. রেফারেল -->
                        <h5 class="fw-bold border-bottom pb-2 mb-3" style="color: #1b4332;">
                            <i class="bi bi-person-lines-fill me-2"></i>১৪. রেফারেল (Reference)
                        </h5>
                        <div class="row g-3 mb-4">
                            <div class="col-md-4 form-group">
                                <label class="form-label fw-bold" style="color: #212529;">নাম</label>
                                <input type="text" name="ref_name" class="form-control" value="{{ old('ref_name', $admission->ref_name) }}" style="color: #212529;">
                            </div>
                            <div class="col-md-4 form-group">
                                <label class="form-label fw-bold" style="color: #212529;">পেশা</label>
                                <input type="text" name="ref_profession" class="form-control" value="{{ old('ref_profession', $admission->ref_profession) }}" style="color: #212529;">
                            </div>
                            <div class="col-md-4 form-group">
                                <label class="form-label fw-bold" style="color: #212529;">পদবি</label>
                                <input type="text" name="ref_designation" class="form-control" value="{{ old('ref_designation', $admission->ref_designation) }}" style="color: #212529;">
                            </div>
                            <div class="col-md-6 form-group">
                                <label class="form-label fw-bold" style="color: #212529;">ঠিকানা/প্রতিষ্ঠান</label>
                                <input type="text" name="ref_organization_address" class="form-control" value="{{ old('ref_organization_address', $admission->ref_organization_address) }}" style="color: #212529;">
                            </div>
                            <div class="col-md-6 form-group">
                                <label class="form-label fw-bold" style="color: #212529;">বিশেষ তথ্য</label>
                                <input type="text" name="ref_special_info" class="form-control" value="{{ old('ref_special_info', $admission->ref_special_info) }}" style="color: #212529;">
                            </div>
                            <div class="col-md-4 form-group">
                                <label class="form-label fw-bold" style="color: #212529;">সম্পর্ক</label>
                                <input type="text" name="ref_relation" class="form-control" value="{{ old('ref_relation', $admission->ref_relation) }}" style="color: #212529;">
                            </div>
                            <div class="col-md-4 form-group">
                                <label class="form-label fw-bold" style="color: #212529;">মোবাইল</label>
                                <input type="text" name="ref_mobile" class="form-control" value="{{ old('ref_mobile', $admission->ref_mobile) }}" style="color: #212529;">
                            </div>
                            <div class="col-md-4 form-group">
                                <label class="form-label fw-bold" style="color: #212529;">ফোন</label>
                                <input type="text" name="ref_phone" class="form-control" value="{{ old('ref_phone', $admission->ref_phone) }}" style="color: #212529;">
                            </div>
                            <div class="col-md-12 form-group">
                                <label class="form-label fw-bold" style="color: #212529;">রেফারেলের ছবি</label>
                                @if($admission->ref_photo)
                                    <div class="mb-2">
                                        <img src="{{ asset($admission->ref_photo) }}" alt="Reference Photo" class="rounded border shadow-sm" style="width: 70px; height: 80px; object-fit: cover;">
                                    </div>
                                @endif
                                <input type="file" name="ref_photo" class="form-control" accept="image/*">
                            </div>
                        </div>

                    </div>


                    <!-- ========================================================================= -->
                    <!-- ==================== TAB PAGE 3: জ্ঞাতব্য ও সম্মতি ======================= -->
                    <!-- ========================================================================= -->
                    <div class="tab-pane fade" id="content-page-3" role="tabpanel">

                        <h5 class="fw-bold border-bottom pb-2 mb-3" style="color: #1b4332;">
                            <i class="bi bi-file-earmark-ruled me-2"></i>১৫. অভিভাবকের জ্ঞাতব্য বিষয় ও সম্মতি
                        </h5>
                        <div class="alert alert-light border p-3 rounded-3 mb-4" style="background-color: #f8f9fa; color: #212529;">
                            <p class="mb-2 fw-bold" style="color: #212529;">অফলাইন বুকলেটের পৃষ্ঠা ৩ এর মূল নীতিমালা:</p>
                            <ul class="small mb-2 ps-3" style="color: #212529;">
                                <li>প্রতিষ্ঠানের সকল বিধি-বিধান ও নিয়ম-কানুন জেনে সন্তানকে ভর্তির সিদ্ধান্ত নেবেন।</li>
                                <li>মহিলা অভিভাবকগণ হিজাব/পর্দা সহকারে শালীন পোশাক পরিধান করে প্রতিষ্ঠানে আগমন করবেন।</li>
                                <li>বেতন/পাওনা পরিশোধ: প্রতি মাসের ৭ তারিখের মধ্যে ফি পরিশোধ ও ক্যাশমেমো গ্রহণ।</li>
                                <li>শিক্ষার্থীর অসুস্থতা, দুর্ঘটনা ও ছুটির নীতিমালা অনুসরণ।</li>
                            </ul>
                            <div class="form-check mt-3">
                                <input class="form-check-input" type="checkbox" id="admin_agree_p3_edit" checked>
                                <label class="form-check-label fw-bold small" for="admin_agree_p3_edit" style="color: #212529;">
                                    অভিভাবক অত্র নীতিমালা অবগত হয়েছেন ও সম্মতিপত্রে স্বাক্ষর করেছেন
                                </label>
                            </div>
                        </div>

                    </div>


                    <!-- ========================================================================= -->
                    <!-- ==================== TAB PAGE 4: ওয়াদা ও বিশেষ তথ্য ===================== -->
                    <!-- ========================================================================= -->
                    <div class="tab-pane fade" id="content-page-4" role="tabpanel">

                        <!-- ১৮. শিক্ষার্থীর বিশেষ তথ্য -->
                        <h5 class="fw-bold border-bottom pb-2 mb-3" style="color: #1b4332;">
                            <i class="bi bi-heart-pulse me-2"></i>১৮. শিক্ষার্থীর বিশেষ তথ্য
                        </h5>
                        <div class="row g-3 mb-4">
                            <div class="col-md-6 form-group">
                                <label class="form-label fw-bold" style="color: #212529;">ভাই বোন</label>
                                <input type="text" name="siblings_info" class="form-control" value="{{ old('siblings_info', $admission->siblings_info) }}" style="color: #212529;">
                            </div>
                            <div class="col-md-6 form-group">
                                <label class="form-label fw-bold" style="color: #212529;">জন্ম বৃত্তান্ত</label>
                                <input type="text" name="birth_details" class="form-control" value="{{ old('birth_details', $admission->birth_details) }}" style="color: #212529;">
                            </div>
                            <div class="col-md-3 form-group">
                                <label class="form-label fw-bold" style="color: #212529;">উচ্চতা</label>
                                <input type="text" name="height" class="form-control" value="{{ old('height', $admission->height) }}" style="color: #212529;">
                            </div>
                            <div class="col-md-3 form-group">
                                <label class="form-label fw-bold" style="color: #212529;">ওজন</label>
                                <input type="text" name="weight" class="form-control" value="{{ old('weight', $admission->weight) }}" style="color: #212529;">
                            </div>
                            <div class="col-md-3 form-group">
                                <label class="form-label fw-bold" style="color: #212529;">গায়ের রং</label>
                                <input type="text" name="complexion" class="form-control" value="{{ old('complexion', $admission->complexion) }}" style="color: #212529;">
                            </div>
                            <div class="col-md-3 form-group">
                                <label class="form-label fw-bold" style="color: #212529;">বিশেষ চিহ্ন</label>
                                <input type="text" name="identification_mark" class="form-control" value="{{ old('identification_mark', $admission->identification_mark) }}" style="color: #212529;">
                            </div>
                            <div class="col-md-12 form-group">
                                <label class="form-label fw-bold" style="color: #212529;">বিশেষ রোগ / এলার্জি</label>
                                <textarea name="special_disease" class="form-control" rows="2" style="color: #212529;">{{ old('special_disease', $admission->special_disease) }}</textarea>
                            </div>
                        </div>

                    </div>


                    <!-- ========================================================================= -->
                    <!-- ==================== TAB PAGE 5: অফিস ও অনুমোদন ======================== -->
                    <!-- ========================================================================= -->
                    <div class="tab-pane fade" id="content-page-5" role="tabpanel">

                        <!-- ১৯. ভর্তি পরীক্ষার ফলাফল ছক -->
                        <h5 class="fw-bold border-bottom pb-2 mb-3" style="color: #1b4332;">
                            <i class="bi bi-calculator me-2"></i>১৯. ভর্তি পরীক্ষার ফলাফল (নম্বর বণ্টন)
                        </h5>
                        <div class="row g-3 mb-4">
                            <div class="col-md-3 form-group">
                                <label class="form-label fw-bold" style="color: #212529;">হিফয/নাযেরা (৫০)</label>
                                <input type="number" step="0.5" name="marks_hifz_nazera" class="form-control" value="{{ old('marks_hifz_nazera', $admission->marks_hifz_nazera) }}" max="50" style="color: #212529;">
                            </div>
                            <div class="col-md-3 form-group">
                                <label class="form-label fw-bold" style="color: #212529;">তাজভীদ (৩০)</label>
                                <input type="number" step="0.5" name="marks_tajweed" class="form-control" value="{{ old('marks_tajweed', $admission->marks_tajweed) }}" max="30" style="color: #212529;">
                            </div>
                            <div class="col-md-2 form-group">
                                <label class="form-label fw-bold" style="color: #212529;">উচ্চারণ (২০)</label>
                                <input type="number" step="0.5" name="marks_pronunciation" class="form-control" value="{{ old('marks_pronunciation', $admission->marks_pronunciation) }}" max="20" style="color: #212529;">
                            </div>
                            <div class="col-md-2 form-group">
                                <label class="form-label fw-bold" style="color: #212529;">বাংলা (২০)</label>
                                <input type="number" step="0.5" name="marks_bangla" class="form-control" value="{{ old('marks_bangla', $admission->marks_bangla) }}" max="20" style="color: #212529;">
                            </div>
                            <div class="col-md-2 form-group">
                                <label class="form-label fw-bold" style="color: #212529;">ইংরেজি (২০)</label>
                                <input type="number" step="0.5" name="marks_english" class="form-control" value="{{ old('marks_english', $admission->marks_english) }}" max="20" style="color: #212529;">
                            </div>
                            <div class="col-md-3 form-group">
                                <label class="form-label fw-bold" style="color: #212529;">গণিত (২০)</label>
                                <input type="number" step="0.5" name="marks_math" class="form-control" value="{{ old('marks_math', $admission->marks_math) }}" max="20" style="color: #212529;">
                            </div>
                            <div class="col-md-3 form-group">
                                <label class="form-label fw-bold" style="color: #212529;">সাধারণ জ্ঞান (৪০)</label>
                                <input type="number" step="0.5" name="marks_general_knowledge" class="form-control" value="{{ old('marks_general_knowledge', $admission->marks_general_knowledge) }}" max="40" style="color: #212529;">
                            </div>
                        </div>

                        <!-- ২০. ভর্তি পরীক্ষার ফলাফল ও তিলাওয়াত -->
                        <h5 class="fw-bold border-bottom pb-2 mb-3" style="color: #1b4332;">
                            <i class="bi bi-award me-2"></i>২০. ভর্তি পরীক্ষার ফলাফল ও তিলাওয়াতের মূল্যায়ন
                        </h5>
                        <div class="row g-3 mb-4">
                            <div class="col-md-4 form-group">
                                <label class="form-label fw-bold" style="color: #212529;">ভর্তি পরীক্ষার তারিখ</label>
                                <input type="date" name="admission_test_date" class="form-control" value="{{ old('admission_test_date', $admission->admission_test_date ? $admission->admission_test_date->format('Y-m-d') : '') }}" style="color: #212529;">
                            </div>
                            <div class="col-md-4 form-group">
                                <label class="form-label fw-bold" style="color: #212529;">ফলাফল মূল্যায়ন</label>
                                <select name="admission_test_result" class="form-select" style="color: #212529;">
                                    <option value="">-- ফলাফল নির্বাচন --</option>
                                    <option value="উত্তীর্ণ" {{ old('admission_test_result', $admission->admission_test_result) == 'উত্তীর্ণ' ? 'selected' : '' }}>উত্তীর্ণ (Passed)</option>
                                    <option value="অনুত্তীর্ণ" {{ old('admission_test_result', $admission->admission_test_result) == 'অনুত্তীর্ণ' ? 'selected' : '' }}>অনুত্তীর্ণ (Failed)</option>
                                    <option value="অপেক্ষমান" {{ old('admission_test_result', $admission->admission_test_result) == 'অপেক্ষমান' ? 'selected' : '' }}>অপেক্ষমান (Waiting)</option>
                                </select>
                            </div>
                            <div class="col-md-4 form-group">
                                <label class="form-label fw-bold" style="color: #212529;">কুরআন তিলাওয়াতের অবস্থা</label>
                                <input type="text" name="quran_recitation_status" class="form-control" value="{{ old('quran_recitation_status', $admission->quran_recitation_status) }}" style="color: #212529;">
                            </div>
                        </div>

                        <!-- ২১. সংযুক্তির চেকলিস্ট -->
                        <h5 class="fw-bold border-bottom pb-2 mb-3" style="color: #1b4332;">
                            <i class="bi bi-paperclip me-2"></i>২১. সংযুক্তির চেকলিস্ট ও ডকুমেন্টস
                        </h5>
                        <div class="row g-3 mb-4">
                            <div class="col-md-12">
                                <div class="d-flex flex-wrap gap-4 mb-3" style="color: #212529;">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="doc_student_photos" id="chk_sp_edit" value="1" {{ old('doc_student_photos', $admission->doc_student_photos) ? 'checked' : '' }}>
                                        <label class="form-check-label fw-bold" for="chk_sp_edit" style="color: #212529;">শিক্ষার্থীর ছবি (৪ কপি)</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="doc_guardian_photos" id="chk_gp_edit" value="1" {{ old('doc_guardian_photos', $admission->doc_guardian_photos) ? 'checked' : '' }}>
                                        <label class="form-check-label fw-bold" for="chk_gp_edit" style="color: #212529;">অভিভাবকের ছবি (২ কপি)</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="doc_birth_certificate" id="chk_bc_edit" value="1" {{ old('doc_birth_certificate', $admission->doc_birth_certificate) ? 'checked' : '' }}>
                                        <label class="form-check-label fw-bold" for="chk_bc_edit" style="color: #212529;">জন্ম-নিবন্ধন সনদ</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="doc_nid" id="chk_nid_edit" value="1" {{ old('doc_nid', $admission->doc_nid) ? 'checked' : '' }}>
                                        <label class="form-check-label fw-bold" for="chk_nid_edit" style="color: #212529;">অভিভাবকের NID</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="doc_tc" id="chk_tc_edit" value="1" {{ old('doc_tc', $admission->doc_tc) ? 'checked' : '' }}>
                                        <label class="form-check-label fw-bold" for="chk_tc_edit" style="color: #212529;">ছাড়পত্র (TC)</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- ২২. ভর্তির অনুমোদন -->
                        <h5 class="fw-bold border-bottom pb-2 mb-3" style="color: #1b4332;">
                            <i class="bi bi-check-circle me-2"></i>২২. ভর্তির অনুমোদন
                        </h5>
                        <div class="row g-3 mb-4">
                            <div class="col-md-3 form-group">
                                <label class="form-label fw-bold" style="color: #212529;">আবেদনের বর্তমান স্ট্যাটাস</label>
                                <select name="status" class="form-select" style="color: #212529;">
                                    <option value="pending" {{ old('status', $admission->status) == 'pending' ? 'selected' : '' }}>Pending (অপেক্ষমান)</option>
                                    <option value="under_review" {{ old('status', $admission->status) == 'under_review' ? 'selected' : '' }}>Under Review (পর্যালোচনাধীন)</option>
                                    <option value="test_scheduled" {{ old('status', $admission->status) == 'test_scheduled' ? 'selected' : '' }}>Test Scheduled (পরীক্ষার তারিখ নির্ধারিত)</option>
                                    <option value="passed" {{ old('status', $admission->status) == 'passed' ? 'selected' : '' }}>Passed (উত্তীর্ণ)</option>
                                    <option value="approved" {{ old('status', $admission->status) == 'approved' ? 'selected' : '' }}>Approved (ভর্তি অনুমোদিত)</option>
                                    <option value="rejected" {{ old('status', $admission->status) == 'rejected' ? 'selected' : '' }}>Rejected (বাতিল)</option>
                                    <option value="completed" {{ old('status', $admission->status) == 'completed' ? 'selected' : '' }}>Completed (সম্পন্ন)</option>
                                </select>
                            </div>
                            <div class="col-md-3 form-group">
                                <label class="form-label fw-bold" style="color: #212529;">নির্ধারিত রোল নং</label>
                                <input type="text" name="assigned_roll_no" class="form-control" value="{{ old('assigned_roll_no', $admission->assigned_roll_no) }}" style="color: #212529;">
                            </div>
                            <div class="col-md-3 form-group">
                                <label class="form-label fw-bold" style="color: #212529;">অনুমোদিত ক্লাস</label>
                                <input type="text" name="approved_class" class="form-control" value="{{ old('approved_class', $admission->approved_class) }}" style="color: #212529;">
                            </div>
                            <div class="col-md-3 form-group">
                                <label class="form-label fw-bold" style="color: #212529;">অনুমোদিত বিভাগ</label>
                                <input type="text" name="approved_department" class="form-control" value="{{ old('approved_department', $admission->approved_department) }}" style="color: #212529;">
                            </div>
                            <div class="col-md-12 form-group">
                                <label class="form-label fw-bold" style="color: #212529;">অফিস নোট / মন্তব্য</label>
                                <textarea name="admin_notes" class="form-control" rows="2" style="color: #212529;">{{ old('admin_notes', $admission->admin_notes) }}</textarea>
                            </div>
                        </div>

                    </div>

                </div>

                <!-- Submit Button Bar with High Contrast -->
                <div class="d-flex justify-content-end gap-2 mt-4 pt-3 border-top">
                    <a href="{{ route('admissions.show', $admission->id) }}" class="btn btn-outline-secondary px-4 fw-bold">বাতিল</a>
                    <button type="submit" class="btn px-5 fw-bold shadow-sm text-white" style="background-color: #1b4332; border: 1px solid #1b4332;">
                        <i class="bi bi-check-lg me-1"></i> তথ্য হালনাগাদ করুন (Update Admission)
                    </button>
                </div>

            </form>
        </div>
    </div>

</div>
@endsection
