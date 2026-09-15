@extends('admin.master')

@section('body')
<div class="container-fluid mt-3 mb-5">

    @if ($errors->any())
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
                    <i class="bi bi-pencil-square text-warning me-2"></i>শিক্ষার্থীর তথ্য সম্পাদনা (Edit Student): {{ $student->student_name_bn }}
                </h4>
                <small class="text-secondary">আইডি: {{ $student->student_id_number }} | রোল: {{ $student->roll_no }}</small>
            </div>
            <div class="d-flex gap-2">
                <a href="{{ route('students.show', $student->id) }}" class="btn btn-outline-info btn-sm fw-bold shadow-sm">
                    <i class="bi bi-person-vcard me-1"></i> প্রোফাইল দেখুন
                </a>
                <a href="{{ route('students.index', ['class_id' => $student->student_class_id]) }}" class="btn btn-outline-secondary btn-sm fw-bold shadow-sm">
                    <i class="bi bi-arrow-left me-1"></i> তালিকায় ফিরে যান
                </a>
            </div>
        </div>

        <div class="card-body p-4" style="color: #212529;">
            <form action="{{ route('students.update', $student->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- ১. একাডেমিক ও শ্রেণি তথ্য -->
                <h5 class="fw-bold border-bottom pb-2 mb-3" style="color: #1b4332;">
                    <i class="bi bi-mortarboard me-2"></i>১. একাডেমিক ও শ্রেণি বরাদ্দ
                </h5>
                <div class="row g-3 mb-4">
                    <div class="col-md-3 form-group">
                        <label class="form-label fw-bold" style="color: #212529;">শ্রেণি <span class="text-danger">*</span></label>
                        <select name="student_class_id" class="form-select" required style="color: #212529; font-weight: 500;">
                            <option value="">-- শ্রেণি নির্বাচন করুন --</option>
                            @foreach($classes as $c)
                                <option value="{{ $c->id }}" {{ old('student_class_id', $student->student_class_id) == $c->id ? 'selected' : '' }}>
                                    {{ $c->name_bn }} @if($c->department) ({{ $c->department }}) @endif
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3 form-group">
                        <label class="form-label fw-bold" style="color: #212529;">শিক্ষাবর্ষ <span class="text-danger">*</span></label>
                        <input type="text" name="academic_year" class="form-control" value="{{ old('academic_year', $student->academic_year) }}" required style="color: #212529;">
                    </div>
                    <div class="col-md-3 form-group">
                        <label class="form-label fw-bold" style="color: #212529;">শ্রেণি রোল নম্বর</label>
                        <input type="text" name="roll_no" class="form-control" value="{{ old('roll_no', $student->roll_no) }}" style="color: #212529;">
                    </div>
                    <div class="col-md-3 form-group">
                        <label class="form-label fw-bold" style="color: #212529;">স্টুডেন্ট আইডি</label>
                        <input type="text" class="form-control text-primary fw-bold bg-light" value="{{ $student->student_id_number }}" readonly>
                    </div>
                </div>

                <!-- ২. শিক্ষার্থীর ব্যক্তিগত তথ্য -->
                <h5 class="fw-bold border-bottom pb-2 mb-3" style="color: #1b4332;">
                    <i class="bi bi-person me-2"></i>২. শিক্ষার্থীর ব্যক্তিগত তথ্য
                </h5>
                <div class="row g-3 mb-4">
                    <div class="col-md-6 form-group">
                        <label class="form-label fw-bold" style="color: #212529;">শিক্ষার্থীর নাম (বাংলায়) <span class="text-danger">*</span></label>
                        <input type="text" name="student_name_bn" class="form-control" value="{{ old('student_name_bn', $student->student_name_bn) }}" required style="color: #212529;">
                    </div>
                    <div class="col-md-6 form-group">
                        <label class="form-label fw-bold" style="color: #212529;">শিক্ষার্থীর নাম (English)</label>
                        <input type="text" name="student_name_en" class="form-control text-uppercase" value="{{ old('student_name_en', $student->student_name_en) }}" style="color: #212529;">
                    </div>
                    <div class="col-md-3 form-group">
                        <label class="form-label fw-bold" style="color: #212529;">জন্ম তারিখ</label>
                        <input type="date" name="dob" class="form-control" value="{{ old('dob', $student->dob ? $student->dob->format('Y-m-d') : '') }}" style="color: #212529;">
                    </div>
                    <div class="col-md-3 form-group">
                        <label class="form-label fw-bold" style="color: #212529;">রক্তের গ্রুপ</label>
                        <select name="blood_group" class="form-select" style="color: #212529;">
                            <option value="">-- নির্বাচন --</option>
                            <option value="A+" {{ old('blood_group', $student->blood_group) == 'A+' ? 'selected' : '' }}>A+</option>
                            <option value="A-" {{ old('blood_group', $student->blood_group) == 'A-' ? 'selected' : '' }}>A-</option>
                            <option value="B+" {{ old('blood_group', $student->blood_group) == 'B+' ? 'selected' : '' }}>B+</option>
                            <option value="B-" {{ old('blood_group', $student->blood_group) == 'B-' ? 'selected' : '' }}>B-</option>
                            <option value="O+" {{ old('blood_group', $student->blood_group) == 'O+' ? 'selected' : '' }}>O+</option>
                            <option value="O-" {{ old('blood_group', $student->blood_group) == 'O-' ? 'selected' : '' }}>O-</option>
                            <option value="AB+" {{ old('blood_group', $student->blood_group) == 'AB+' ? 'selected' : '' }}>AB+</option>
                            <option value="AB-" {{ old('blood_group', $student->blood_group) == 'AB-' ? 'selected' : '' }}>AB-</option>
                        </select>
                    </div>
                    <div class="col-md-3 form-group">
                        <label class="form-label fw-bold" style="color: #212529;">ভর্তির ধরন <span class="text-danger">*</span></label>
                        <select name="residential_type" class="form-select" required style="color: #212529;">
                            <option value="residential" {{ old('residential_type', $student->residential_type) == 'residential' ? 'selected' : '' }}>আবাসিক (Residential)</option>
                            <option value="non_residential" {{ old('residential_type', $student->residential_type) == 'non_residential' ? 'selected' : '' }}>অনাবাসিক (Non-Residential)</option>
                            <option value="day_care" {{ old('residential_type', $student->residential_type) == 'day_care' ? 'selected' : '' }}>ডে-কেয়ার (Day Care)</option>
                        </select>
                    </div>
                    <div class="col-md-3 form-group">
                        <label class="form-label fw-bold" style="color: #212529;">ছবি পরিবর্তন</label>
                        @if($student->photo && file_exists(public_path($student->photo)))
                            <div class="mb-2">
                                <img src="{{ asset($student->photo) }}" alt="{{ $student->student_name_bn }}" class="rounded shadow-sm border" style="width: 50px; height: 60px; object-fit: cover;">
                            </div>
                        @endif
                        <input type="file" name="photo" class="form-control" accept="image/*">
                    </div>
                </div>

                <!-- ৩. পিতা, মাতা ও অভিভাবক -->
                <h5 class="fw-bold border-bottom pb-2 mb-3" style="color: #1b4332;">
                    <i class="bi bi-people me-2"></i>৩. পিতা, মাতা ও অভিভাবকের তথ্যাবলি
                </h5>
                <div class="row g-3 mb-4">
                    <div class="col-md-4 form-group">
                        <label class="form-label fw-bold" style="color: #212529;">পিতার নাম (বাংলা)</label>
                        <input type="text" name="father_name_bn" class="form-control" value="{{ old('father_name_bn', $student->father_name_bn) }}" style="color: #212529;">
                    </div>
                    <div class="col-md-4 form-group">
                        <label class="form-label fw-bold" style="color: #212529;">পিতার মোবাইল নম্বর</label>
                        <input type="text" name="father_contact" class="form-control" value="{{ old('father_contact', $student->father_contact) }}" style="color: #212529;">
                    </div>
                    <div class="col-md-4 form-group">
                        <label class="form-label fw-bold" style="color: #212529;">পিতার পেশা</label>
                        <input type="text" name="father_profession" class="form-control" value="{{ old('father_profession', $student->father_profession) }}" style="color: #212529;">
                    </div>

                    <div class="col-md-6 form-group">
                        <label class="form-label fw-bold" style="color: #212529;">মাতার নাম (বাংলা)</label>
                        <input type="text" name="mother_name_bn" class="form-control" value="{{ old('mother_name_bn', $student->mother_name_bn) }}" style="color: #212529;">
                    </div>
                    <div class="col-md-6 form-group">
                        <label class="form-label fw-bold" style="color: #212529;">মাতার মোবাইল নম্বর</label>
                        <input type="text" name="mother_contact" class="form-control" value="{{ old('mother_contact', $student->mother_contact) }}" style="color: #212529;">
                    </div>

                    <div class="col-md-4 form-group">
                        <label class="form-label fw-bold" style="color: #212529;">প্রকৃত অভিভাবক (পিতা অনুপস্থিত থাকলে)</label>
                        <input type="text" name="guardian_name" class="form-control" value="{{ old('guardian_name', $student->guardian_name) }}" style="color: #212529;">
                    </div>
                    <div class="col-md-4 form-group">
                        <label class="form-label fw-bold" style="color: #212529;">অভিভাবকের মোবাইল নম্বর</label>
                        <input type="text" name="guardian_contact" class="form-control" value="{{ old('guardian_contact', $student->guardian_contact) }}" style="color: #212529;">
                    </div>
                    <div class="col-md-4 form-group">
                        <label class="form-label fw-bold" style="color: #212529;">অভিভাবকের সাথে সম্পর্ক</label>
                        <input type="text" name="guardian_relation" class="form-control" value="{{ old('guardian_relation', $student->guardian_relation) }}" style="color: #212529;">
                    </div>
                </div>

                <!-- ৪. ঠিকানা ও স্ট্যাটাস -->
                <h5 class="fw-bold border-bottom pb-2 mb-3" style="color: #1b4332;">
                    <i class="bi bi-geo-alt me-2"></i>৪. ঠিকানা ও বর্তমান স্ট্যাটাস
                </h5>
                <div class="row g-3 mb-4">
                    <div class="col-md-6 form-group">
                        <label class="form-label fw-bold" style="color: #212529;">বর্তমান ঠিকানা</label>
                        <textarea name="present_address" class="form-control" rows="2" style="color: #212529;">{{ old('present_address', $student->present_address) }}</textarea>
                    </div>
                    <div class="col-md-6 form-group">
                        <label class="form-label fw-bold" style="color: #212529;">স্থায়ী ঠিকানা</label>
                        <textarea name="permanent_address" class="form-control" rows="2" style="color: #212529;">{{ old('permanent_address', $student->permanent_address) }}</textarea>
                    </div>
                    <div class="col-md-6 form-group">
                        <label class="form-label fw-bold" style="color: #212529;">শিক্ষার্থীর স্ট্যাটাস</label>
                        <select name="status" class="form-select" style="color: #212529; font-weight: 500;">
                            <option value="1" {{ old('status', $student->status) == 1 ? 'selected' : '' }}>অধ্যয়নরত (Active)</option>
                            <option value="2" {{ old('status', $student->status) == 2 ? 'selected' : '' }}>উত্তীর্ণ (Passed)</option>
                            <option value="3" {{ old('status', $student->status) == 3 ? 'selected' : '' }}>ছাড়পত্রপ্রাপ্ত (TC)</option>
                            <option value="0" {{ old('status', $student->status) === 0 ? 'selected' : '' }}>নিষ্ক্রিয় (Inactive)</option>
                        </select>
                    </div>
                    <div class="col-md-6 form-group">
                        <label class="form-label fw-bold" style="color: #212529;">অফিস মন্তব্য</label>
                        <input type="text" name="admin_notes" class="form-control" value="{{ old('admin_notes', $student->admin_notes) }}" style="color: #212529;">
                    </div>
                </div>

                <!-- Submit Bar -->
                <div class="d-flex justify-content-end gap-2 pt-3 border-top">
                    <a href="{{ route('students.index', ['class_id' => $student->student_class_id]) }}" class="btn btn-outline-secondary px-4 fw-bold">বাতিল</a>
                    <button type="submit" class="btn px-5 fw-bold shadow-sm text-white" style="background-color: #1b4332; border: 1px solid #1b4332;">
                        <i class="bi bi-check-lg me-1"></i> তথ্য হালনাগাদ করুন (Update Student)
                    </button>
                </div>

            </form>
        </div>
    </div>

</div>
@endsection
