@extends('admin.master')

@section('body')
<div class="container-fluid mt-3 mb-5">

    <!-- Header / Breadcrumb -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="fw-bold mb-1" style="color: #1b4332;">
                <i class="bi bi-pencil-square text-primary me-2"></i>সিলেবাস সম্পাদনা করুন (Edit Offline Syllabus)
            </h4>
            <small class="text-muted">অফলাইন সিলেবাসের পাঠ্যসূচি, বিবরণ ও সংযুক্ত ডকুমেন্টস আপডেট করুন</small>
        </div>
        <a href="{{ route('admin.offline-syllabi.index') }}" class="btn btn-outline-secondary btn-sm fw-bold shadow-sm">
            <i class="bi bi-arrow-left me-1"></i> সিলেবাস তালিকায় ফিরে যান
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

    <form action="{{ route('admin.offline-syllabi.update', $syllabus->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row g-4">
            <!-- Left Column: Syllabus Content -->
            <div class="col-lg-8">
                
                <!-- 1. Title Card -->
                <div class="card border shadow-sm rounded-3 mb-4">
                    <div class="card-header bg-white py-3 border-bottom">
                        <h5 class="card-title mb-0 fw-bold text-dark">
                            <i class="bi bi-card-heading text-primary me-2"></i>১. সিলেবাসের শিরোনাম (Course Titles)
                        </h5>
                    </div>
                    <div class="card-body p-4">
                        
                        <!-- Title Bangla (Primary) -->
                        <div class="mb-3">
                            <label class="form-label fw-bold text-dark">
                                অফলাইন সিলেবাস শিরোনাম (বাংলা) <span class="text-danger">*</span>
                            </label>
                            <input type="text" name="title_bn" class="form-control @error('title_bn') is-invalid @enderror" 
                                   value="{{ old('title_bn', $syllabus->title_bn) }}" required>
                            @error('title_bn')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Title English & Arabic -->
                        <div class="row g-3 mb-0">
                            <div class="col-md-6">
                                <label class="form-label fw-bold text-dark">Title (English / Default) <span class="text-danger">*</span></label>
                                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" 
                                       value="{{ old('title', $syllabus->title) }}" required>
                                @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold text-dark">عنوان المنهج (العربية - ঐচ্ছিক)</label>
                                <input type="text" name="title_ar" class="form-control text-end" dir="rtl" 
                                       value="{{ old('title_ar', $syllabus->title_ar) }}">
                            </div>
                        </div>

                    </div>
                </div>

                <!-- 2. Details (Text Editor with Language Tabs) -->
                <div class="card border shadow-sm rounded-3 mb-4">
                    <div class="card-header bg-white py-3 border-bottom d-flex justify-content-between align-items-center flex-wrap gap-2">
                        <h5 class="card-title mb-0 fw-bold text-dark">
                            <i class="bi bi-file-text text-primary me-2"></i>২. সিলেবাসের বিস্তারিত বিবরণ ও পাঠ্যসূচি (Description / Details)
                        </h5>
                        <ul class="nav nav-pills" id="detailsTabs" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active py-1 px-3 fw-bold small" id="tab-details-bn" data-bs-toggle="tab" data-bs-target="#content-details-bn" type="button" role="tab">বাংলা বিবরণ</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link py-1 px-3 fw-bold small" id="tab-details-en" data-bs-toggle="tab" data-bs-target="#content-details-en" type="button" role="tab">English Details</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link py-1 px-3 fw-bold small" id="tab-details-ar" data-bs-toggle="tab" data-bs-target="#content-details-ar" type="button" role="tab">التفاصيل بالعربية</button>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body p-4">
                        <div class="tab-content" id="detailsTabsContent">
                            <!-- Bangla Details Tab -->
                            <div class="tab-pane fade show active" id="content-details-bn" role="tabpanel">
                                <label class="form-label fw-bold text-dark mb-1">সিলেবাসের বিস্তারিত বিবরণ (বাংলা)</label>
                                <textarea name="details_bn" class="form-control tinymce_editor" rows="12">{{ old('details_bn', $syllabus->details_bn) }}</textarea>
                            </div>

                            <!-- English Details Tab -->
                            <div class="tab-pane fade" id="content-details-en" role="tabpanel">
                                <label class="form-label fw-bold text-dark mb-1">Syllabus Details (English)</label>
                                <textarea name="details" class="form-control tinymce_editor" rows="12">{{ old('details', $syllabus->details) }}</textarea>
                            </div>

                            <!-- Arabic Details Tab -->
                            <div class="tab-pane fade" id="content-details-ar" role="tabpanel">
                                <label class="form-label fw-bold text-dark mb-1">تفاصيل المنهج (العربية)</label>
                                <textarea name="details_ar" class="form-control tinymce_editor" dir="rtl" rows="12">{{ old('details_ar', $syllabus->details_ar) }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 3. Documents Upload Card -->
                <div class="card border shadow-sm rounded-3">
                    <div class="card-header bg-white py-3 border-bottom">
                        <h5 class="card-title mb-0 fw-bold text-dark">
                            <i class="bi bi-paperclip text-danger me-2"></i>৩. সিলেবাস ডকুমেন্ট / PDF আপলোড (Document Uploads)
                        </h5>
                    </div>
                    <div class="card-body p-4">
                        <div class="row g-4">
                            
                            <!-- Document 1 -->
                            <div class="col-md-6">
                                <div class="p-3 border rounded-3 bg-light h-100">
                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                        <span class="badge bg-primary">ডকুমেন্ট ১</span>
                                        <span class="fw-bold text-dark">প্রধান ফাইল (Doc 1)</span>
                                    </div>

                                    @if($syllabus->document_one)
                                        <div class="p-2 mb-3 bg-white rounded border d-flex align-items-center justify-content-between">
                                            <div class="d-flex align-items-center text-truncate">
                                                @if($syllabus->isDocOnePdf())
                                                    <i class="bi bi-file-earmark-pdf text-danger font-20 me-2"></i>
                                                @else
                                                    <i class="bi bi-file-earmark-image text-success font-20 me-2"></i>
                                                @endif
                                                <div class="text-truncate">
                                                    <a href="{{ asset($syllabus->document_one) }}" target="_blank" class="fw-bold text-decoration-none small text-dark d-block text-truncate">
                                                        {{ $syllabus->document_one_title ?: 'ডকুমেন্ট ১ দেখুন' }}
                                                    </a>
                                                    <small class="text-muted font-11">সংযুক্ত ফাইল রয়েছে</small>
                                                </div>
                                            </div>
                                            <div class="form-check ms-2">
                                                <input class="form-check-input" type="checkbox" name="remove_doc_one" value="1" id="removeDocOne">
                                                <label class="form-check-label text-danger font-11 fw-semibold" for="removeDocOne">মুছুন</label>
                                            </div>
                                        </div>
                                    @else
                                        <div class="alert alert-secondary py-2 px-3 small mb-3">
                                            <i class="bi bi-info-circle me-1"></i> বর্তমানে কোনো ফাইল সংযুক্ত নেই
                                        </div>
                                    @endif

                                    <div class="mb-3">
                                        <label class="form-label small fw-bold text-dark">ডকুমেন্টের নাম / লেবেল</label>
                                        <input type="text" name="document_one_title" class="form-control form-control-sm" 
                                               value="{{ old('document_one_title', $syllabus->document_one_title) }}">
                                    </div>
                                    <div class="mb-0">
                                        <label class="form-label small fw-bold text-dark">{{ $syllabus->document_one ? 'নতুন ফাইল দিয়ে পরিবর্তন করুন' : 'ফাইল আপলোড (PDF বা ছবি)' }}</label>
                                        <input type="file" name="document_one" class="form-control" accept=".pdf,image/png,image/jpeg,image/jpg,image/webp">
                                        <small class="font-11 d-block mt-1 text-muted">সমর্থিত ফাইল: PDF, JPG, PNG (সর্বোচ্চ ১০MB)</small>
                                    </div>
                                </div>
                            </div>

                            <!-- Document 2 -->
                            <div class="col-md-6">
                                <div class="p-3 border rounded-3 bg-light h-100">
                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                        <span class="badge bg-info">ডকুমেন্ট ২</span>
                                        <span class="fw-bold text-dark">সম্পূরক ফাইল (Doc 2)</span>
                                    </div>

                                    @if($syllabus->document_two)
                                        <div class="p-2 mb-3 bg-white rounded border d-flex align-items-center justify-content-between">
                                            <div class="d-flex align-items-center text-truncate">
                                                @if($syllabus->isDocTwoPdf())
                                                    <i class="bi bi-file-earmark-pdf text-danger font-20 me-2"></i>
                                                @else
                                                    <i class="bi bi-file-earmark-image text-success font-20 me-2"></i>
                                                @endif
                                                <div class="text-truncate">
                                                    <a href="{{ asset($syllabus->document_two) }}" target="_blank" class="fw-bold text-decoration-none small text-dark d-block text-truncate">
                                                        {{ $syllabus->document_two_title ?: 'ডকুমেন্ট ২ দেখুন' }}
                                                    </a>
                                                    <small class="text-muted font-11">সংযুক্ত ফাইল রয়েছে</small>
                                                </div>
                                            </div>
                                            <div class="form-check ms-2">
                                                <input class="form-check-input" type="checkbox" name="remove_doc_two" value="1" id="removeDocTwo">
                                                <label class="form-check-label text-danger font-11 fw-semibold" for="removeDocTwo">মুছুন</label>
                                            </div>
                                        </div>
                                    @else
                                        <div class="alert alert-secondary py-2 px-3 small mb-3">
                                            <i class="bi bi-info-circle me-1"></i> বর্তমানে কোনো ফাইল সংযুক্ত নেই
                                        </div>
                                    @endif

                                    <div class="mb-3">
                                        <label class="form-label small fw-bold text-dark">ডকুমেন্টের নাম / লেবেল</label>
                                        <input type="text" name="document_two_title" class="form-control form-control-sm" 
                                               value="{{ old('document_two_title', $syllabus->document_two_title) }}">
                                    </div>
                                    <div class="mb-0">
                                        <label class="form-label small fw-bold text-dark">{{ $syllabus->document_two ? 'নতুন ফাইল দিয়ে পরিবর্তন করুন' : 'ফাইল আপলোড (PDF বা ছবি)' }}</label>
                                        <input type="file" name="document_two" class="form-control" accept=".pdf,image/png,image/jpeg,image/jpg,image/webp">
                                        <small class="font-11 d-block mt-1 text-muted">সমর্থিত ফাইল: PDF, JPG, PNG (সর্বোচ্চ ১০MB)</small>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>

            <!-- Right Column: Settings & Publish -->
            <div class="col-lg-4">
                
                <div class="card border shadow-sm rounded-3 mb-4">
                    <div class="card-header bg-white py-3 border-bottom">
                        <h5 class="card-title mb-0 fw-bold text-dark">
                            <i class="bi bi-gear-fill text-secondary me-2"></i>প্রকাশনা সেটিংস (Settings)
                        </h5>
                    </div>
                    <div class="card-body p-4">
                        
                        <!-- Sort Order -->
                        <div class="mb-3">
                            <label class="form-label fw-semibold text-dark">প্রদর্শনের ক্রম (Sort Order)</label>
                            <input type="number" name="sort_order" class="form-control" value="{{ old('sort_order', $syllabus->sort_order) }}" min="0">
                            <small class="text-muted font-12">কম সংখ্যা (যেমন: 0, 1, 2) প্রথমে প্রদর্শিত হবে।</small>
                        </div>

                        <!-- Status Switch -->
                        <div class="mb-4">
                            <label class="form-label fw-semibold text-dark d-block">স্ট্যাটাস (Status)</label>
                            <div class="form-check form-switch fs-5">
                                <input class="form-check-input" type="checkbox" name="status" id="statusSwitch" value="1" {{ old('status', $syllabus->status) == '1' ? 'checked' : '' }}>
                                <label class="form-check-label fs-6 fw-bold ms-2 text-success" for="statusSwitch">
                                    সক্রিয় রাখুন (Active)
                                </label>
                            </div>
                            <small class="text-muted font-12">সক্রিয় থাকলে পাবলিক ওয়েবসাইটে প্রদর্শিত হবে।</small>
                        </div>

                        <hr>

                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-primary btn-lg w-100 fw-bold py-3 shadow-sm">
                            <i class="bi bi-check2-circle me-2"></i>পরিবর্তন সংরক্ষণ করুন (Update)
                        </button>

                    </div>
                </div>

                <!-- Info Box -->
                <div class="card border-0 bg-light rounded-3 p-3">
                    <div class="d-flex">
                        <i class="bi bi-clock-history text-muted font-20 me-2"></i>
                        <small class="text-muted">
                            তৈরি: {{ $syllabus->created_at ? $syllabus->created_at->format('d M, Y h:i A') : 'N/A' }}<br>
                            সর্বশেষ আপডেট: {{ $syllabus->updated_at ? $syllabus->updated_at->format('d M, Y h:i A') : 'N/A' }}
                        </small>
                    </div>
                </div>

            </div>
        </div>
    </form>

</div>
@endsection

@push('admin_script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/7.1.1/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    tinymce.init({
        selector: '.tinymce_editor',
        height: 360,
        menubar: true,
        plugins: 'advlist autolink lists link image charmap preview anchor searchreplace visualblocks code fullscreen insertdatetime media table help wordcount',
        toolbar: 'undo redo | blocks | bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | table link image | removeformat | help',
        content_style: 'body { font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif; font-size: 14px }'
    });
</script>
@endpush
