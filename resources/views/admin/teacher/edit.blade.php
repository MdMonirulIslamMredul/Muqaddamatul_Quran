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
                    <i class="bi bi-pencil-square text-warning me-2"></i>শিক্ষকের তথ্য সম্পাদনা (Edit Teacher): {{ $teacher->name_bn }}
                </h4>
                <small class="text-secondary">শিক্ষকের সকল তথ্য, ছবি ও বিবরণ হালনাগাদ করুন</small>
            </div>
            <div class="d-flex gap-2">
                <a href="{{ route('teachers.show', $teacher->id) }}" class="btn btn-outline-info btn-sm fw-bold shadow-sm">
                    <i class="bi bi-eye me-1"></i> প্রোফাইল দেখুন
                </a>
                <a href="{{ route('teachers.index') }}" class="btn btn-outline-secondary btn-sm fw-bold shadow-sm">
                    <i class="bi bi-arrow-left me-1"></i> তালিকায় ফিরে যান
                </a>
            </div>
        </div>

        <div class="card-body p-4" style="color: #212529;">
            <form action="{{ route('teachers.update', $teacher->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- ১. প্রাথমিক ও ক্যাটাগরি তথ্য -->
                <h5 class="fw-bold border-bottom pb-2 mb-3" style="color: #1b4332;">
                    <i class="bi bi-folder-check me-2"></i>১. ক্যাটাগরি ও প্রাথমিক পরিচিতি
                </h5>
                <div class="row g-3 mb-4">
                    <div class="col-md-4 form-group">
                        <label class="form-label fw-bold" style="color: #212529;">শিক্ষক ক্যাটাগরি <span class="text-danger">*</span></label>
                        <select name="teacher_category_id" class="form-select" required style="color: #212529; font-weight: 500;">
                            <option value="">-- ক্যাটাগরি নির্বাচন করুন --</option>
                            @foreach($categories as $cat)
                                <option value="{{ $cat->id }}" {{ old('teacher_category_id', $teacher->teacher_category_id) == $cat->id ? 'selected' : '' }}>
                                    {{ $cat->name_bn }} @if($cat->name_en) ({{ $cat->name_en }}) @endif
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4 form-group">
                        <label class="form-label fw-bold" style="color: #212529;">শিক্ষকের নাম (বাংলায়) <span class="text-danger">*</span></label>
                        <input type="text" name="name_bn" class="form-control" value="{{ old('name_bn', $teacher->name_bn) }}" required style="color: #212529;">
                    </div>
                    <div class="col-md-4 form-group">
                        <label class="form-label fw-bold" style="color: #212529;">শিক্ষকের নাম (English)</label>
                        <input type="text" name="name_en" class="form-control" value="{{ old('name_en', $teacher->name_en) }}" style="color: #212529;">
                    </div>
                    <div class="col-md-4 form-group">
                        <label class="form-label fw-bold" style="color: #212529;">শিক্ষকের নাম (العربية)</label>
                        <input type="text" name="name_ar" class="form-control" value="{{ old('name_ar', $teacher->name_ar) }}" style="color: #212529;">
                    </div>
                    <div class="col-md-4 form-group">
                        <label class="form-label fw-bold" style="color: #212529;">পদবি (বাংলায়) <span class="text-danger">*</span></label>
                        <input type="text" name="designation_bn" class="form-control" value="{{ old('designation_bn', $teacher->designation_bn) }}" required style="color: #212529;">
                    </div>
                    <div class="col-md-4 form-group">
                        <label class="form-label fw-bold" style="color: #212529;">পদবি (English)</label>
                        <input type="text" name="designation_en" class="form-control" value="{{ old('designation_en', $teacher->designation_en) }}" style="color: #212529;">
                    </div>
                </div>

                <!-- ২. একাডেমিক যোগ্যতা ও পাঠদান তথ্য -->
                <h5 class="fw-bold border-bottom pb-2 mb-3" style="color: #1b4332;">
                    <i class="bi bi-mortarboard me-2"></i>২. একাডেমিক যোগ্যতা ও পাঠদান বিষয়
                </h5>
                <div class="row g-3 mb-4">
                    <div class="col-md-6 form-group">
                        <label class="form-label fw-bold" style="color: #212529;">পাঠদান বিভাগ / বিষয় (বাংলায়)</label>
                        <input type="text" name="subject_department_bn" class="form-control" value="{{ old('subject_department_bn', $teacher->subject_department_bn) }}" style="color: #212529;">
                    </div>
                    <div class="col-md-6 form-group">
                        <label class="form-label fw-bold" style="color: #212529;">পাঠদান বিভাগ / বিষয় (English)</label>
                        <input type="text" name="subject_department_en" class="form-control" value="{{ old('subject_department_en', $teacher->subject_department_en) }}" style="color: #212529;">
                    </div>
                    <div class="col-md-6 form-group">
                        <label class="form-label fw-bold" style="color: #212529;">শিক্ষাগত যোগ্যতা (বাংলায়)</label>
                        <textarea name="qualification_bn" class="form-control" rows="2" style="color: #212529;">{{ old('qualification_bn', $teacher->qualification_bn) }}</textarea>
                    </div>
                    <div class="col-md-6 form-group">
                        <label class="form-label fw-bold" style="color: #212529;">শিক্ষাগত যোগ্যতা (English)</label>
                        <textarea name="qualification_en" class="form-control" rows="2" style="color: #212529;">{{ old('qualification_en', $teacher->qualification_en) }}</textarea>
                    </div>
                    <div class="col-md-4 form-group">
                        <label class="form-label fw-bold" style="color: #212529;">অভিজ্ঞতা (Experience)</label>
                        <input type="text" name="experience" class="form-control" value="{{ old('experience', $teacher->experience) }}" style="color: #212529;">
                    </div>
                    <div class="col-md-4 form-group">
                        <label class="form-label fw-bold" style="color: #212529;">যোগদানের তারিখ</label>
                        <input type="date" name="joining_date" class="form-control" value="{{ old('joining_date', $teacher->joining_date ? $teacher->joining_date->format('Y-m-d') : '') }}" style="color: #212529;">
                    </div>
                    <div class="col-md-4 form-group">
                        <label class="form-label fw-bold" style="color: #212529;">শিক্ষকের ছবি পরিবর্তন</label>
                        @if($teacher->image && file_exists(public_path($teacher->image)))
                            <div class="mb-2">
                                <img src="{{ asset($teacher->image) }}" alt="{{ $teacher->name_bn }}" class="rounded shadow-sm border" style="width: 60px; height: 75px; object-fit: cover;">
                            </div>
                        @endif
                        <input type="file" name="image" class="form-control" accept="image/*">
                    </div>
                </div>

                <!-- ৩. যোগাযোগের তথ্য ও সোশ্যাল লিংক -->
                <h5 class="fw-bold border-bottom pb-2 mb-3" style="color: #1b4332;">
                    <i class="bi bi-telephone-outbound me-2"></i>৩. যোগাযোগ ও সামাজিক যোগাযোগ মাধ্যম
                </h5>
                <div class="row g-3 mb-4">
                    <div class="col-md-4 form-group">
                        <label class="form-label fw-bold" style="color: #212529;">মোবাইল নম্বর</label>
                        <input type="text" name="phone" class="form-control" value="{{ old('phone', $teacher->phone) }}" style="color: #212529;">
                    </div>
                    <div class="col-md-4 form-group">
                        <label class="form-label fw-bold" style="color: #212529;">ইমেইল ঠিকানা</label>
                        <input type="email" name="email" class="form-control" value="{{ old('email', $teacher->email) }}" style="color: #212529;">
                    </div>
                    <div class="col-md-4 form-group">
                        <label class="form-label fw-bold" style="color: #212529;">WhatsApp নম্বর</label>
                        <input type="text" name="whatsapp" class="form-control" value="{{ old('whatsapp', $teacher->whatsapp) }}" style="color: #212529;">
                    </div>
                    <div class="col-md-3 form-group">
                        <label class="form-label fw-bold" style="color: #212529;">Facebook লিংক</label>
                        <input type="url" name="facebook" class="form-control" value="{{ old('facebook', $teacher->facebook) }}" style="color: #212529;">
                    </div>
                    <div class="col-md-3 form-group">
                        <label class="form-label fw-bold" style="color: #212529;">YouTube লিংক</label>
                        <input type="url" name="youtube" class="form-control" value="{{ old('youtube', $teacher->youtube) }}" style="color: #212529;">
                    </div>
                    <div class="col-md-3 form-group">
                        <label class="form-label fw-bold" style="color: #212529;">LinkedIn লিংক</label>
                        <input type="url" name="linkedin" class="form-control" value="{{ old('linkedin', $teacher->linkedin) }}" style="color: #212529;">
                    </div>
                    <div class="col-md-3 form-group">
                        <label class="form-label fw-bold" style="color: #212529;">সাজানোর ক্রম (Serial)</label>
                        <input type="number" name="sort_order" class="form-control" value="{{ old('sort_order', $teacher->sort_order) }}" style="color: #212529;">
                    </div>
                </div>

                <!-- ৪. সংক্ষিপ্ত জীবনী ও প্রকাশনা -->
                <h5 class="fw-bold border-bottom pb-2 mb-3" style="color: #1b4332;">
                    <i class="bi bi-card-text me-2"></i>৪. সংক্ষিপ্ত পরিচিতি ও জীবনী
                </h5>
                <div class="row g-3 mb-4">
                    <div class="col-md-6 form-group">
                        <label class="form-label fw-bold" style="color: #212529;">পরিচিতি ও জীবনবৃত্তান্ত (বাংলায়)</label>
                        <textarea name="bio_bn" class="form-control" rows="4" style="color: #212529;">{{ old('bio_bn', $teacher->bio_bn) }}</textarea>
                    </div>
                    <div class="col-md-6 form-group">
                        <label class="form-label fw-bold" style="color: #212529;">Biography (English)</label>
                        <textarea name="bio_en" class="form-control" rows="4" style="color: #212529;">{{ old('bio_en', $teacher->bio_en) }}</textarea>
                    </div>
                    <div class="col-md-6 form-group">
                        <div class="form-check mt-2">
                            <input class="form-check-input" type="checkbox" name="is_featured" id="is_featured" value="1" {{ old('is_featured', $teacher->is_featured) ? 'checked' : '' }}>
                            <label class="form-check-label fw-bold" for="is_featured" style="color: #1b4332;">
                                হোমপেজে শিক্ষক তালিকায় প্রদর্শন করুন (Show on Homepage)
                            </label>
                        </div>
                    </div>
                    <div class="col-md-6 form-group">
                        <label class="form-label fw-bold" style="color: #212529;">স্ট্যাটাস</label>
                        <select name="status" class="form-select" style="color: #212529; font-weight: 500;">
                            <option value="1" {{ old('status', $teacher->status) == 1 ? 'selected' : '' }}>সক্রিয় (Active)</option>
                            <option value="0" {{ old('status', $teacher->status) === 0 ? 'selected' : '' }}>নিষ্ক্রিয় (Inactive)</option>
                        </select>
                    </div>
                </div>

                <!-- ৫. প্রয়োজনীয় ডকুমেন্টস ও সংযুক্তি -->
                <h5 class="fw-bold border-bottom pb-2 mb-3" style="color: #1b4332;">
                    <i class="bi bi-paperclip me-2"></i>৫. প্রয়োজনীয় ডকুমেন্টস ও সংযুক্তি (Documents & Attachments)
                </h5>
                <div class="row g-3 mb-4">
                    
                    <!-- NID / Birth Certificate -->
                    <div class="col-md-4 form-group">
                        <div class="p-3 border rounded-3 bg-light h-100">
                            <label class="form-label fw-bold text-dark d-flex align-items-center">
                                <i class="bi bi-person-vcard text-primary me-2 font-18"></i>এনআইডি / জন্ম নিবন্ধন (NID / Birth Certificate)
                            </label>

                            @if($teacher->nid_or_birth_certificate)
                                <div class="p-2 mb-2 bg-white rounded border d-flex align-items-center justify-content-between">
                                    <div class="d-flex align-items-center text-truncate">
                                        @if($teacher->isNidPdf())
                                            <i class="bi bi-file-earmark-pdf text-danger font-20 me-2"></i>
                                        @else
                                            <i class="bi bi-file-earmark-image text-success font-20 me-2"></i>
                                        @endif
                                        <div class="text-truncate">
                                            <a href="{{ asset($teacher->nid_or_birth_certificate) }}" target="_blank" class="fw-bold text-decoration-none small text-dark d-block text-truncate">
                                                সংযুক্ত ফাইল দেখুন
                                            </a>
                                            <small class="text-muted font-11" style="color: #64748b !important;">ফাইল সংযুক্ত রয়েছে</small>
                                        </div>
                                    </div>
                                    <div class="form-check ms-2">
                                        <input class="form-check-input" type="checkbox" name="remove_nid" value="1" id="removeNid">
                                        <label class="form-check-label text-danger font-11 fw-semibold" for="removeNid">মুছুন</label>
                                    </div>
                                </div>
                            @else
                                <div class="alert alert-secondary py-1 px-2 small mb-2" style="font-size: 12px;">
                                    <i class="bi bi-info-circle me-1"></i> বর্তমানে কোনো ফাইল সংযুক্ত নেই
                                </div>
                            @endif

                            <label class="form-label small fw-bold text-dark mb-1">{{ $teacher->nid_or_birth_certificate ? 'নতুন ফাইল দিয়ে পরিবর্তন করুন' : 'ফাইল আপলোড করুন' }}</label>
                            <input type="file" name="nid_or_birth_certificate" class="form-control" accept=".pdf,image/png,image/jpeg,image/jpg,image/webp">
                            <small class="text-muted font-11 d-block mt-1" style="color: #64748b !important;">সমর্থিত ফরম্যাট: PDF, JPG, PNG, WEBP (সর্বোচ্চ ১০MB)</small>
                        </div>
                    </div>

                    <!-- Academic Certificate -->
                    <div class="col-md-4 form-group">
                        <div class="p-3 border rounded-3 bg-light h-100">
                            <label class="form-label fw-bold text-dark d-flex align-items-center">
                                <i class="bi bi-award text-success me-2 font-18"></i>একাডেমিক সার্টিফিকেট (Academic Certificate)
                            </label>

                            @if($teacher->academic_certificate)
                                <div class="p-2 mb-2 bg-white rounded border d-flex align-items-center justify-content-between">
                                    <div class="d-flex align-items-center text-truncate">
                                        @if($teacher->isAcademicCertPdf())
                                            <i class="bi bi-file-earmark-pdf text-danger font-20 me-2"></i>
                                        @else
                                            <i class="bi bi-file-earmark-image text-success font-20 me-2"></i>
                                        @endif
                                        <div class="text-truncate">
                                            <a href="{{ asset($teacher->academic_certificate) }}" target="_blank" class="fw-bold text-decoration-none small text-dark d-block text-truncate">
                                                সংযুক্ত ফাইল দেখুন
                                            </a>
                                            <small class="text-muted font-11" style="color: #64748b !important;">ফাইল সংযুক্ত রয়েছে</small>
                                        </div>
                                    </div>
                                    <div class="form-check ms-2">
                                        <input class="form-check-input" type="checkbox" name="remove_academic_cert" value="1" id="removeAcadCert">
                                        <label class="form-check-label text-danger font-11 fw-semibold" for="removeAcadCert">মুছুন</label>
                                    </div>
                                </div>
                            @else
                                <div class="alert alert-secondary py-1 px-2 small mb-2" style="font-size: 12px;">
                                    <i class="bi bi-info-circle me-1"></i> বর্তমানে কোনো ফাইল সংযুক্ত নেই
                                </div>
                            @endif

                            <label class="form-label small fw-bold text-dark mb-1">{{ $teacher->academic_certificate ? 'নতুন ফাইল দিয়ে পরিবর্তন করুন' : 'ফাইল আপলোড করুন' }}</label>
                            <input type="file" name="academic_certificate" class="form-control" accept=".pdf,image/png,image/jpeg,image/jpg,image/webp">
                            <small class="text-muted font-11 d-block mt-1" style="color: #64748b !important;">সমর্থিত ফরম্যাট: PDF, JPG, PNG, WEBP (সর্বোচ্চ ১০MB)</small>
                        </div>
                    </div>

                    <!-- Resume / CV -->
                    <div class="col-md-4 form-group">
                        <div class="p-3 border rounded-3 bg-light h-100">
                            <label class="form-label fw-bold text-dark d-flex align-items-center">
                                <i class="bi bi-file-earmark-person text-danger me-2 font-18"></i>সিভি / জীবনবৃত্তান্ত (CV / Resume)
                            </label>

                            @if($teacher->resume)
                                <div class="p-2 mb-2 bg-white rounded border d-flex align-items-center justify-content-between">
                                    <div class="d-flex align-items-center text-truncate">
                                        @if($teacher->isResumePdf())
                                            <i class="bi bi-file-earmark-pdf text-danger font-20 me-2"></i>
                                        @else
                                            <i class="bi bi-file-earmark-text text-primary font-20 me-2"></i>
                                        @endif
                                        <div class="text-truncate">
                                            <a href="{{ asset($teacher->resume) }}" target="_blank" class="fw-bold text-decoration-none small text-dark d-block text-truncate">
                                                সংযুক্ত ফাইল দেখুন
                                            </a>
                                            <small class="text-muted font-11" style="color: #64748b !important;">ফাইল সংযুক্ত রয়েছে</small>
                                        </div>
                                    </div>
                                    <div class="form-check ms-2">
                                        <input class="form-check-input" type="checkbox" name="remove_resume" value="1" id="removeResume">
                                        <label class="form-check-label text-danger font-11 fw-semibold" for="removeResume">মুছুন</label>
                                    </div>
                                </div>
                            @else
                                <div class="alert alert-secondary py-1 px-2 small mb-2" style="font-size: 12px;">
                                    <i class="bi bi-info-circle me-1"></i> বর্তমানে কোনো ফাইল সংযুক্ত নেই
                                </div>
                            @endif

                            <label class="form-label small fw-bold text-dark mb-1">{{ $teacher->resume ? 'নতুন ফাইল দিয়ে পরিবর্তন করুন' : 'ফাইল আপলোড করুন' }}</label>
                            <input type="file" name="resume" class="form-control" accept=".pdf,.doc,.docx,image/png,image/jpeg,image/jpg,image/webp">
                            <small class="text-muted font-11 d-block mt-1" style="color: #64748b !important;">সমর্থিত ফরম্যাট: PDF, DOCX, DOC, JPG, PNG (সর্বোচ্চ ১০MB)</small>
                        </div>
                    </div>

                </div>

                <!-- Submit Bar -->
                <div class="d-flex justify-content-end gap-2 pt-3 border-top">
                    <a href="{{ route('teachers.index') }}" class="btn btn-outline-secondary px-4 fw-bold">বাতিল</a>
                    <button type="submit" class="btn px-5 fw-bold shadow-sm text-white" style="background-color: #1b4332; border: 1px solid #1b4332;">
                        <i class="bi bi-check-lg me-1"></i> তথ্য হালনাগাদ করুন (Update Teacher)
                    </button>
                </div>

            </form>
        </div>
    </div>

</div>
@endsection
