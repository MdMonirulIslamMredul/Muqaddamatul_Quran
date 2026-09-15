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
                    <i class="bi bi-person-plus-fill text-success me-2"></i>নতুন শিক্ষক যুক্ত করুন (Add New Teacher)
                </h4>
                <small class="text-secondary">শিক্ষকের সকল তথ্য, যোগ্যতা, ছবি ও যোগাযোগের বিবরণ সঠিকভাবে পূরণ করুন</small>
            </div>
            <div>
                <a href="{{ route('teachers.index') }}" class="btn btn-outline-secondary btn-sm fw-bold shadow-sm">
                    <i class="bi bi-arrow-left me-1"></i> তালিকায় ফিরে যান
                </a>
            </div>
        </div>

        <div class="card-body p-4" style="color: #212529;">
            <form action="{{ route('teachers.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

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
                                <option value="{{ $cat->id }}" {{ old('teacher_category_id') == $cat->id ? 'selected' : '' }}>
                                    {{ $cat->name_bn }} @if($cat->name_en) ({{ $cat->name_en }}) @endif
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4 form-group">
                        <label class="form-label fw-bold" style="color: #212529;">শিক্ষকের নাম (বাংলায়) <span class="text-danger">*</span></label>
                        <input type="text" name="name_bn" class="form-control" placeholder="যেমনঃ মাওলানা মুহাম্মদ আব্দুল্লাহ" value="{{ old('name_bn') }}" required style="color: #212529;">
                    </div>
                    <div class="col-md-4 form-group">
                        <label class="form-label fw-bold" style="color: #212529;">শিক্ষকের নাম (English)</label>
                        <input type="text" name="name_en" class="form-control" placeholder="e.g. Mawlana Muhammad Abdullah" value="{{ old('name_en') }}" style="color: #212529;">
                    </div>
                    <div class="col-md-4 form-group">
                        <label class="form-label fw-bold" style="color: #212529;">শিক্ষকের নাম (العربية)</label>
                        <input type="text" name="name_ar" class="form-control" placeholder="مثال: فضيلة الشيخ عبد الله" value="{{ old('name_ar') }}" style="color: #212529;">
                    </div>
                    <div class="col-md-4 form-group">
                        <label class="form-label fw-bold" style="color: #212529;">পদবি (বাংলায়) <span class="text-danger">*</span></label>
                        <input type="text" name="designation_bn" class="form-control" placeholder="যেমনঃ প্রধান শিক্ষক / মুহতামিম / ক্বারী" value="{{ old('designation_bn') }}" required style="color: #212529;">
                    </div>
                    <div class="col-md-4 form-group">
                        <label class="form-label fw-bold" style="color: #212529;">পদবি (English)</label>
                        <input type="text" name="designation_en" class="form-control" placeholder="e.g. Principal / Senior Instructor" value="{{ old('designation_en') }}" style="color: #212529;">
                    </div>
                </div>

                <!-- ২. একাডেমিক যোগ্যতা ও পাঠদান তথ্য -->
                <h5 class="fw-bold border-bottom pb-2 mb-3" style="color: #1b4332;">
                    <i class="bi bi-mortarboard me-2"></i>২. একাডেমিক যোগ্যতা ও পাঠদান বিষয়
                </h5>
                <div class="row g-3 mb-4">
                    <div class="col-md-6 form-group">
                        <label class="form-label fw-bold" style="color: #212529;">পাঠদান বিভাগ / বিষয় (বাংলায়)</label>
                        <input type="text" name="subject_department_bn" class="form-control" placeholder="যেমনঃ হিফজুল কুরআন, সহীহ বুখারী, তাজভীদ" value="{{ old('subject_department_bn') }}" style="color: #212529;">
                    </div>
                    <div class="col-md-6 form-group">
                        <label class="form-label fw-bold" style="color: #212529;">পাঠদান বিভাগ / বিষয় (English)</label>
                        <input type="text" name="subject_department_en" class="form-control" placeholder="e.g. Hifz, Hadith, Arabic Grammar" value="{{ old('subject_department_en') }}" style="color: #212529;">
                    </div>
                    <div class="col-md-6 form-group">
                        <label class="form-label fw-bold" style="color: #212529;">শিক্ষাগত যোগ্যতা (বাংলায়)</label>
                        <textarea name="qualification_bn" class="form-control" rows="2" placeholder="যেমনঃ দাওরায়ে হাদীস (বেফাকুল মাদারিসিল আরাবিয়া); এম.এ (ইসলামিক স্টাডিজ), ঢাকা বিশ্ববিদ্যালয়" style="color: #212529;">{{ old('qualification_bn') }}</textarea>
                    </div>
                    <div class="col-md-6 form-group">
                        <label class="form-label fw-bold" style="color: #212529;">শিক্ষাগত যোগ্যতা (English)</label>
                        <textarea name="qualification_en" class="form-control" rows="2" placeholder="e.g. Dawra-e-Hadith (Befaq Board), M.A in Islamic Studies (DU)" style="color: #212529;">{{ old('qualification_en') }}</textarea>
                    </div>
                    <div class="col-md-4 form-group">
                        <label class="form-label fw-bold" style="color: #212529;">অভিজ্ঞতা (Experience)</label>
                        <input type="text" name="experience" class="form-control" placeholder="যেমনঃ ১২+ বছর" value="{{ old('experience') }}" style="color: #212529;">
                    </div>
                    <div class="col-md-4 form-group">
                        <label class="form-label fw-bold" style="color: #212529;">যোগদানের তারিখ</label>
                        <input type="date" name="joining_date" class="form-control" value="{{ old('joining_date') }}" style="color: #212529;">
                    </div>
                    <div class="col-md-4 form-group">
                        <label class="form-label fw-bold" style="color: #212529;">শিক্ষকের পাসপোর্ট সাইজ ছবি</label>
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
                        <input type="text" name="phone" class="form-control" placeholder="01XXXXXXXXX" value="{{ old('phone') }}" style="color: #212529;">
                    </div>
                    <div class="col-md-4 form-group">
                        <label class="form-label fw-bold" style="color: #212529;">ইমেইল ঠিকানা</label>
                        <input type="email" name="email" class="form-control" placeholder="teacher@example.com" value="{{ old('email') }}" style="color: #212529;">
                    </div>
                    <div class="col-md-4 form-group">
                        <label class="form-label fw-bold" style="color: #212529;">WhatsApp নম্বর</label>
                        <input type="text" name="whatsapp" class="form-control" placeholder="01XXXXXXXXX" value="{{ old('whatsapp') }}" style="color: #212529;">
                    </div>
                    <div class="col-md-3 form-group">
                        <label class="form-label fw-bold" style="color: #212529;">Facebook লিংক</label>
                        <input type="url" name="facebook" class="form-control" placeholder="https://facebook.com/..." value="{{ old('facebook') }}" style="color: #212529;">
                    </div>
                    <div class="col-md-3 form-group">
                        <label class="form-label fw-bold" style="color: #212529;">YouTube লিংক</label>
                        <input type="url" name="youtube" class="form-control" placeholder="https://youtube.com/..." value="{{ old('youtube') }}" style="color: #212529;">
                    </div>
                    <div class="col-md-3 form-group">
                        <label class="form-label fw-bold" style="color: #212529;">LinkedIn লিংক</label>
                        <input type="url" name="linkedin" class="form-control" placeholder="https://linkedin.com/in/..." value="{{ old('linkedin') }}" style="color: #212529;">
                    </div>
                    <div class="col-md-3 form-group">
                        <label class="form-label fw-bold" style="color: #212529;">সাজানোর ক্রম (Serial)</label>
                        <input type="number" name="sort_order" class="form-control" placeholder="0, 1, 2..." value="{{ old('sort_order', 0) }}" style="color: #212529;">
                    </div>
                </div>

                <!-- ৪. সংক্ষিপ্ত জীবনী ও প্রকাশনা -->
                <h5 class="fw-bold border-bottom pb-2 mb-3" style="color: #1b4332;">
                    <i class="bi bi-card-text me-2"></i>৪. সংক্ষিপ্ত পরিচিতি ও জীবনী
                </h5>
                <div class="row g-3 mb-4">
                    <div class="col-md-6 form-group">
                        <label class="form-label fw-bold" style="color: #212529;">পরিচিতি ও জীবনবৃত্তান্ত (বাংলায়)</label>
                        <textarea name="bio_bn" class="form-control" rows="4" placeholder="শিক্ষকের পরিচিতি, ইসলামি খেদমত ও বিশেষ অবদান..." style="color: #212529;">{{ old('bio_bn') }}</textarea>
                    </div>
                    <div class="col-md-6 form-group">
                        <label class="form-label fw-bold" style="color: #212529;">Biography (English)</label>
                        <textarea name="bio_en" class="form-control" rows="4" placeholder="Teacher's biography, contributions and academic journey..." style="color: #212529;">{{ old('bio_en') }}</textarea>
                    </div>
                    <div class="col-md-6 form-group">
                        <div class="form-check mt-2">
                            <input class="form-check-input" type="checkbox" name="is_featured" id="is_featured" value="1" {{ old('is_featured') ? 'checked' : '' }}>
                            <label class="form-check-label fw-bold" for="is_featured" style="color: #1b4332;">
                                হোমপেজে শিক্ষক তালিকায় প্রদর্শন করুন (Show on Homepage)
                            </label>
                        </div>
                    </div>
                    <div class="col-md-6 form-group">
                        <label class="form-label fw-bold" style="color: #212529;">স্ট্যাটাস</label>
                        <select name="status" class="form-select" style="color: #212529; font-weight: 500;">
                            <option value="1" {{ old('status', 1) == 1 ? 'selected' : '' }}>সক্রিয় (Active)</option>
                            <option value="0" {{ old('status') === '0' ? 'selected' : '' }}>নিষ্ক্রিয় (Inactive)</option>
                        </select>
                    </div>
                </div>

                <!-- ৫. প্রয়োজনীয় ডকুমেন্টস ও সংযুক্তি -->
                <h5 class="fw-bold border-bottom pb-2 mb-3" style="color: #1b4332;">
                    <i class="bi bi-paperclip me-2"></i>৫. প্রয়োজনীয় ডকুমেন্টস ও সংযুক্তি (Documents & Attachments)
                </h5>
                <div class="row g-3 mb-4">
                    <div class="col-md-4 form-group">
                        <div class="p-3 border rounded-3 bg-light h-100">
                            <label class="form-label fw-bold text-dark d-flex align-items-center">
                                <i class="bi bi-person-vcard text-primary me-2 font-18"></i>এনআইডি / জন্ম নিবন্ধন (NID / Birth Certificate)
                            </label>
                            <input type="file" name="nid_or_birth_certificate" class="form-control" accept=".pdf,image/png,image/jpeg,image/jpg,image/webp">
                            <small class="text-muted font-11 d-block mt-1" style="color: #64748b !important;">সমর্থিত ফরম্যাট: PDF, JPG, PNG, WEBP (সর্বোচ্চ ১০MB)</small>
                        </div>
                    </div>
                    <div class="col-md-4 form-group">
                        <div class="p-3 border rounded-3 bg-light h-100">
                            <label class="form-label fw-bold text-dark d-flex align-items-center">
                                <i class="bi bi-award text-success me-2 font-18"></i>একাডেমিক সার্টিফিকেট (Academic Certificate)
                            </label>
                            <input type="file" name="academic_certificate" class="form-control" accept=".pdf,image/png,image/jpeg,image/jpg,image/webp">
                            <small class="text-muted font-11 d-block mt-1" style="color: #64748b !important;">সমর্থিত ফরম্যাট: PDF, JPG, PNG, WEBP (সর্বোচ্চ ১০MB)</small>
                        </div>
                    </div>
                    <div class="col-md-4 form-group">
                        <div class="p-3 border rounded-3 bg-light h-100">
                            <label class="form-label fw-bold text-dark d-flex align-items-center">
                                <i class="bi bi-file-earmark-person text-danger me-2 font-18"></i>সিভি / জীবনবৃত্তান্ত (CV / Resume)
                            </label>
                            <input type="file" name="resume" class="form-control" accept=".pdf,.doc,.docx,image/png,image/jpeg,image/jpg,image/webp">
                            <small class="text-muted font-11 d-block mt-1" style="color: #64748b !important;">সমর্থিত ফরম্যাট: PDF, DOCX, DOC, JPG, PNG (সর্বোচ্চ ১০MB)</small>
                        </div>
                    </div>
                </div>

                <!-- Submit Bar -->
                <div class="d-flex justify-content-end gap-2 pt-3 border-top">
                    <a href="{{ route('teachers.index') }}" class="btn btn-outline-secondary px-4 fw-bold">বাতিল</a>
                    <button type="submit" class="btn px-5 fw-bold shadow-sm text-white" style="background-color: #1b4332; border: 1px solid #1b4332;">
                        <i class="bi bi-check-lg me-1"></i> শিক্ষক সংরক্ষণ করুন (Save Teacher)
                    </button>
                </div>

            </form>
        </div>
    </div>

</div>
@endsection
