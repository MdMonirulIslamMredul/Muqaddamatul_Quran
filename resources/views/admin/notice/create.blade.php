@extends('admin.master')

@section('body')
<div class="container-fluid mt-3 mb-5">

    <!-- Header / Breadcrumb -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="fw-bold mb-0" style="color: #1b4332;">
                <i class="bi bi-plus-circle text-success me-2"></i>নতুন নোটিশ প্রকাশ করুন (Publish Notice)
            </h4>
            <small class="text-muted">মাদ্রাসার অফিসিয়াল নোটিশ, বিজ্ঞপ্তি বা রুটিন তৈরি ও প্রকাশ করুন</small>
        </div>
        <a href="{{ route('notices.index') }}" class="btn btn-outline-secondary btn-sm fw-bold shadow-sm">
            <i class="bi bi-arrow-left me-1"></i> নোটিশ তালিকায় ফিরে যান
        </a>
    </div>

    <!-- Error Validation Alert -->
    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show shadow-sm" role="alert">
            <h6 class="fw-bold mb-1"><i class="bi bi-exclamation-octagon-fill me-2"></i>অনুগ্রহ করে নিচের ত্রুটিগুলো সংশোধন করুন:</h6>
            <ul class="mb-0 ps-3">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <form action="{{ route('notices.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row g-4">
            <!-- Left Column: Main Notice Content -->
            <div class="col-lg-8">
                
                <!-- Notice Basic Information -->
                <div class="card border shadow-sm rounded-3 mb-4">
                    <div class="card-header bg-white py-3 border-bottom">
                        <h5 class="card-title mb-0 fw-bold text-dark">
                            <i class="bi bi-card-heading text-primary me-2"></i>১. নোটিশের শিরোনাম ও স্মারক (Title & Details)
                        </h5>
                    </div>
                    <div class="card-body p-4">
                        
                        <!-- Title Bangla (Primary) -->
                        <div class="mb-3">
                            <label class="form-label fw-bold text-dark">
                                নোটিশের শিরোনাম (বাংলা) <span class="text-danger">*</span>
                            </label>
                            <input type="text" name="title_bn" class="form-control @error('title_bn') is-invalid @enderror" 
                                   placeholder="উদাঃ ২০২৬ শিক্ষাবর্ষে নূরানী ও হিফজ বিভাগে নতুন ছাত্র ভর্তি চলছে..." 
                                   value="{{ old('title_bn') }}" required>
                            @error('title_bn')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Title English & Arabic -->
                        <div class="row g-3 mb-3">
                            <div class="col-md-6">
                                <label class="form-label fw-semibold text-dark">নোটিশ শিরোনাম (English - ঐচ্ছিক)</label>
                                <input type="text" name="title" class="form-control" 
                                       placeholder="e.g. Admission Open for Academic Session 2026-2027" 
                                       value="{{ old('title') }}">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold text-dark">عنوان الإشعار (العربية - ঐচ্ছিক)</label>
                                <input type="text" name="title_ar" class="form-control text-end" dir="rtl" 
                                       placeholder="مثال: فتح باب القبول والتسجيل للعام الدراسي الجديد" 
                                       value="{{ old('title_ar') }}">
                            </div>
                        </div>

                        <!-- Short Description / Summary -->
                        <div class="mb-3">
                            <label class="form-label fw-bold text-dark">সংক্ষিপ্ত সারসংক্ষেপ (Short Summary)</label>
                            <textarea name="short_des_bn" class="form-control" rows="3" 
                                      placeholder="নোটিশের মূল বিষয়বস্তুর ২-৩ লাইনের সংক্ষিপ্ত বিবরণ...">{{ old('short_des_bn') }}</textarea>
                            <small class="text-muted">হোমপেজ ও নোটিশ তালিকার কার্ডে এই সংক্ষিপ্ত বিবরণ প্রদর্শিত হবে।</small>
                        </div>

                        <!-- Long Description (Full Body) -->
                        <div class="mb-0">
                            <label class="form-label fw-bold text-dark">পূর্ণাঙ্গ নোটিশের বিবরণ (Full Notice Content)</label>
                            <textarea id="tinymce_editor" name="long_des_bn" class="form-control" rows="8" 
                                      placeholder="নোটিশের বিস্তারিত বিবরণ, নিয়মাবলী বা শর্তসমূহ এখানে লিখুন...">{{ old('long_des_bn') }}</textarea>
                        </div>

                    </div>
                </div>

                <!-- Attachment Upload Card -->
                <div class="card border shadow-sm rounded-3">
                    <div class="card-header bg-white py-3 border-bottom">
                        <h5 class="card-title mb-0 fw-bold text-dark">
                            <i class="bi bi-paperclip text-danger me-2"></i>২. নোটিশ ফাইল ও ডকুমেন্ট সংযুক্তি (Attachment)
                        </h5>
                    </div>
                    <div class="card-body p-4">
                        <div class="mb-3">
                            <label class="form-label fw-bold text-dark">পিডিএফ বা ইমেজ ফাইল আপলোড করুন (Upload PDF / Image / Doc)</label>
                            <input type="file" name="pdf_file" class="form-control @error('pdf_file') is-invalid @enderror" accept=".pdf,.doc,.docx,.jpg,.jpeg,.png,.webp">
                            @error('pdf_file')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <div class="form-text text-muted mt-2">
                                <i class="bi bi-info-circle me-1"></i>সমর্থিত ফাইল ফরম্যাট: <strong>PDF, DOC, DOCX, JPG, PNG, WEBP</strong> (সর্বোচ্চ সাইজ: 15MB)। 
                                পিডিএফ সংযুক্ত করলে বিস্তারিত পেজে সরাসরি প্রিভিউ ও ডাউনলোডের ব্যবস্থা থাকবে।
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Right Column: Settings, Dates & Actions -->
            <div class="col-lg-4">
                
                <!-- Category & Meta Info Card -->
                <div class="card border shadow-sm rounded-3 mb-4">
                    <div class="card-header bg-white py-3 border-bottom">
                        <h5 class="card-title mb-0 fw-bold text-dark">
                            <i class="bi bi-sliders text-success me-2"></i>ক্যাটাগরি ও স্মারক নম্বর
                        </h5>
                    </div>
                    <div class="card-body p-4">
                        
                        <!-- Notice Category -->
                        <div class="mb-3">
                            <label class="form-label fw-bold text-dark">
                                নোটিশ ক্যাটাগরি <span class="text-danger">*</span>
                            </label>
                            <select name="notice_category" class="form-select @error('notice_category') is-invalid @enderror" required>
                                @foreach($categoriesList as $catKey => $cat)
                                    <option value="{{ $catKey }}" {{ old('notice_category', 'general') == $catKey ? 'selected' : '' }}>
                                        {{ $cat['bn'] }} ({{ $cat['en'] }})
                                    </option>
                                @endforeach
                            </select>
                            @error('notice_category')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Notice / Ref Number -->
                        <div class="mb-3">
                            <label class="form-label fw-semibold text-dark">স্মারক নং / রেফারেন্স নম্বর</label>
                            <input type="text" name="notice_no" class="form-control font-monospace" 
                                   placeholder="উদাঃ MQIA-NOT-2026/01" 
                                   value="{{ old('notice_no', $nextNo) }}">
                            <small class="text-muted">অফিসিয়াল নথির রেফারেন্স নং</small>
                        </div>

                        <!-- Publish Date -->
                        <div class="mb-3">
                            <label class="form-label fw-bold text-dark">
                                প্রকাশের তারিখ <span class="text-danger">*</span>
                            </label>
                            <input type="date" name="publish_date" class="form-control @error('publish_date') is-invalid @enderror" 
                                   value="{{ old('publish_date', date('Y-m-d')) }}" required>
                            @error('publish_date')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Expire Date -->
                        <div class="mb-0">
                            <label class="form-label fw-semibold text-dark">মেয়াদ উত্তীর্ণের তারিখ (ঐচ্ছিক)</label>
                            <input type="date" name="expire_date" class="form-control @error('expire_date') is-invalid @enderror" 
                                   value="{{ old('expire_date') }}">
                            <small class="text-muted">নির্দিষ্ট তারিখের পর নোটিশ স্বয়ংক্রিয়ভাবে আর্কাইভ হবে</small>
                            @error('expire_date')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>
                </div>

                <!-- Display & Status Flags Card -->
                <div class="card border shadow-sm rounded-3 mb-4">
                    <div class="card-header bg-white py-3 border-bottom">
                        <h5 class="card-title mb-0 fw-bold text-dark">
                            <i class="bi bi-toggles text-warning me-2"></i>প্রদর্শন ও প্রকাশনা অপশন
                        </h5>
                    </div>
                    <div class="card-body p-4">
                        
                        <!-- Show in Ticker -->
                        <div class="form-check form-switch mb-3">
                            <input class="form-check-input" type="checkbox" name="is_ticker" id="is_ticker" value="1" {{ old('is_ticker', '1') ? 'checked' : '' }}>
                            <label class="form-check-label fw-bold text-dark" for="is_ticker">
                                হোমপেজ স্ক্রলিং টিকারে দেখান (Breaking Ticker)
                            </label>
                            <small class="d-block text-muted">ওয়েবসাইটের শীর্ষ স্ক্রলিং সংবাদে প্রদর্শিত হবে</small>
                        </div>

                        <hr class="my-2 text-muted opacity-25">

                        <!-- Pinned Notice -->
                        <div class="form-check form-switch mb-3 mt-3">
                            <input class="form-check-input" type="checkbox" name="is_pinned" id="is_pinned" value="1" {{ old('is_pinned') ? 'checked' : '' }}>
                            <label class="form-check-label fw-bold text-dark" for="is_pinned">
                                নোটিশ পিন করুন (Pin to Top)
                            </label>
                            <small class="d-block text-muted">তালিকার শীর্ষে বিশেষ হাইলাইট হিসেবে দেখাবে</small>
                        </div>

                        <hr class="my-2 text-muted opacity-25">

                        <!-- Publish Status -->
                        <div class="form-check form-switch mt-3">
                            <input class="form-check-input" type="checkbox" name="status" id="status" value="1" {{ old('status', '1') ? 'checked' : '' }}>
                            <label class="form-check-label fw-bold text-success" for="status">
                                তাৎক্ষণিক প্রকাশ করুন (Active Status)
                            </label>
                            <small class="d-block text-muted">আনচেক করলে ড্রাফট হিসেবে থাকবে</small>
                        </div>

                    </div>
                </div>

                <!-- Submit Button Card -->
                <div class="card border shadow-sm rounded-3">
                    <div class="card-body p-3">
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-success btn-lg fw-bold shadow" style="background-color: #1b4332; border-color: #1b4332;">
                                <i class="bi bi-send-check-fill me-2"></i>নোটিশ প্রকাশ করুন
                            </button>
                            <a href="{{ route('notices.index') }}" class="btn btn-outline-secondary">
                                বাতিল করুন
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </form>

</div>
@endsection
