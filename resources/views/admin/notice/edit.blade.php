@extends('admin.master')

@section('body')
<div class="container-fluid mt-3 mb-5">

    <!-- Header / Breadcrumb -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="fw-bold mb-0" style="color: #1b4332;">
                <i class="bi bi-pencil-square text-primary me-2"></i>নোটিশ সম্পাদনা (Edit Notice)
            </h4>
            <small class="text-muted">স্মারক নং: {{ $notice->notice_no ?: 'N/A' }} | আইডি: #{{ $notice->id }}</small>
        </div>
        <div class="d-flex gap-2">
            <a href="{{ route('notices.show', $notice->id) }}" class="btn btn-outline-info btn-sm fw-bold shadow-sm">
                <i class="bi bi-eye me-1"></i> প্রিভিউ দেখুন
            </a>
            <a href="{{ route('notices.index') }}" class="btn btn-outline-secondary btn-sm fw-bold shadow-sm">
                <i class="bi bi-arrow-left me-1"></i> তালিকায় ফিরুন
            </a>
        </div>
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

    <form action="{{ route('notices.update', $notice->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

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
                                   placeholder="উদাঃ ২০২৬ শিক্ষাবর্ষে নতুন ছাত্র ভর্তি চলছে..." 
                                   value="{{ old('title_bn', $notice->title_bn ?: $notice->title) }}" required>
                            @error('title_bn')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Title English & Arabic -->
                        <div class="row g-3 mb-3">
                            <div class="col-md-6">
                                <label class="form-label fw-semibold text-dark">নোটিশ শিরোনাম (English - ঐচ্ছিক)</label>
                                <input type="text" name="title" class="form-control" 
                                       placeholder="e.g. Admission Open for Academic Session" 
                                       value="{{ old('title', $notice->title) }}">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold text-dark">عنوان الإشعار (العربية - ঐচ্ছিক)</label>
                                <input type="text" name="title_ar" class="form-control text-end" dir="rtl" 
                                       placeholder="مثال: إشعار القبول للعام الدراسي الجديد" 
                                       value="{{ old('title_ar', $notice->title_ar) }}">
                            </div>
                        </div>

                        <!-- Short Description / Summary -->
                        <div class="mb-3">
                            <label class="form-label fw-bold text-dark">সংক্ষিপ্ত সারসংক্ষেপ (Short Summary)</label>
                            <textarea name="short_des_bn" class="form-control" rows="3" 
                                      placeholder="নোটিশের মূল বিষয়বস্তুর সংক্ষিপ্ত বিবরণ...">{{ old('short_des_bn', $notice->short_des_bn ?: strip_tags($notice->short_des)) }}</textarea>
                            <small class="text-muted">হোমপেজ ও নোটিশ তালিকার কার্ডে এই সংক্ষিপ্ত বিবরণ প্রদর্শিত হবে।</small>
                        </div>

                        <!-- Long Description (Full Body) -->
                        <div class="mb-0">
                            <label class="form-label fw-bold text-dark">পূর্ণাঙ্গ নোটিশের বিবরণ (Full Notice Content)</label>
                            <textarea id="tinymce_editor" name="long_des_bn" class="form-control" rows="8" 
                                      placeholder="নোটিশের বিস্তারিত বিবরণ, নিয়মাবলী বা শর্তসমূহ এখানে লিখুন...">{{ old('long_des_bn', $notice->long_des_bn ?: $notice->long_des) }}</textarea>
                        </div>

                    </div>
                </div>

                <!-- Attachment Upload Card -->
                <div class="card border shadow-sm rounded-3">
                    <div class="card-header bg-white py-3 border-bottom">
                        <h5 class="card-title mb-0 fw-bold text-dark">
                            <i class="bi bi-paperclip text-danger me-2"></i>২. নোটিশ ফাইল সংযুক্তি ও পরিবর্তন (Attachment)
                        </h5>
                    </div>
                    <div class="card-body p-4">
                        
                        @if($notice->pdf_file)
                            <div class="alert alert-info d-flex justify-content-between align-items-center mb-3">
                                <div>
                                    <i class="bi bi-file-earmark-check-fill text-primary me-2" style="font-size: 20px;"></i>
                                    <strong>সংযুক্ত বর্তমান ফাইল:</strong> 
                                    <span class="badge bg-danger ms-1">{{ strtoupper($notice->file_type ?: 'PDF') }}</span>
                                    @if($notice->file_size)
                                        <span class="text-muted ms-1">({{ $notice->file_size }})</span>
                                    @endif
                                </div>
                                <div>
                                    <a href="{{ asset($notice->pdf_file) }}" target="_blank" class="btn btn-sm btn-primary">
                                        <i class="bi bi-eye me-1"></i>ফাইলটি দেখুন
                                    </a>
                                </div>
                            </div>
                        @endif

                        <div class="mb-3">
                            <label class="form-label fw-bold text-dark">
                                {{ $notice->pdf_file ? 'নতুন ফাইল আপলোড করে পরিবর্তন করুন (ঐচ্ছিক)' : 'পিডিএফ বা ইমেজ ফাইল আপলোড করুন' }}
                            </label>
                            <input type="file" name="pdf_file" class="form-control @error('pdf_file') is-invalid @enderror" accept=".pdf,.doc,.docx,.jpg,.jpeg,.png,.webp">
                            @error('pdf_file')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <div class="form-text text-muted mt-2">
                                <i class="bi bi-info-circle me-1"></i>সমর্থিত ফাইল ফরম্যাট: <strong>PDF, DOC, DOCX, JPG, PNG, WEBP</strong> (সর্বোচ্চ সাইজ: 15MB)। 
                                নতুন ফাইল নির্বাচন না করলে পূর্বের ফাইল বহাল থাকবে।
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
                                    <option value="{{ $catKey }}" {{ old('notice_category', $notice->notice_category) == $catKey ? 'selected' : '' }}>
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
                                   value="{{ old('notice_no', $notice->notice_no) }}">
                            <small class="text-muted">অফিসিয়াল নথির রেফারেন্স নং</small>
                        </div>

                        <!-- Publish Date -->
                        <div class="mb-3">
                            <label class="form-label fw-bold text-dark">
                                প্রকাশের তারিখ <span class="text-danger">*</span>
                            </label>
                            <input type="date" name="publish_date" class="form-control @error('publish_date') is-invalid @enderror" 
                                   value="{{ old('publish_date', $notice->publish_date ? \Carbon\Carbon::parse($notice->publish_date)->format('Y-m-d') : date('Y-m-d')) }}" required>
                            @error('publish_date')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Expire Date -->
                        <div class="mb-0">
                            <label class="form-label fw-semibold text-dark">মেয়াদ উত্তীর্ণের তারিখ (ঐচ্ছিক)</label>
                            <input type="date" name="expire_date" class="form-control @error('expire_date') is-invalid @enderror" 
                                   value="{{ old('expire_date', $notice->expire_date ? \Carbon\Carbon::parse($notice->expire_date)->format('Y-m-d') : '') }}">
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
                            <input class="form-check-input" type="checkbox" name="is_ticker" id="is_ticker" value="1" {{ old('is_ticker', $notice->is_ticker) ? 'checked' : '' }}>
                            <label class="form-check-label fw-bold text-dark" for="is_ticker">
                                হোমপেজ স্ক্রলিং টিকারে দেখান (Breaking Ticker)
                            </label>
                            <small class="d-block text-muted">ওয়েবসাইটের শীর্ষ স্ক্রলিং সংবাদে প্রদর্শিত হবে</small>
                        </div>

                        <hr class="my-2 text-muted opacity-25">

                        <!-- Pinned Notice -->
                        <div class="form-check form-switch mb-3 mt-3">
                            <input class="form-check-input" type="checkbox" name="is_pinned" id="is_pinned" value="1" {{ old('is_pinned', $notice->is_pinned) ? 'checked' : '' }}>
                            <label class="form-check-label fw-bold text-dark" for="is_pinned">
                                নোটিশ পিন করুন (Pin to Top)
                            </label>
                            <small class="d-block text-muted">তালিকার শীর্ষে বিশেষ হাইলাইট হিসেবে দেখাবে</small>
                        </div>

                        <hr class="my-2 text-muted opacity-25">

                        <!-- Publish Status -->
                        <div class="form-check form-switch mt-3">
                            <input class="form-check-input" type="checkbox" name="status" id="status" value="1" {{ old('status', $notice->status) ? 'checked' : '' }}>
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
                            <button type="submit" class="btn btn-primary btn-lg fw-bold shadow" style="background-color: #2d6a4f; border-color: #2d6a4f;">
                                <i class="bi bi-check2-circle me-2"></i>পরিবর্তন সংরক্ষণ করুন
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
