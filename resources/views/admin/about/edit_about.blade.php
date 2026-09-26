@extends('admin.master')

@section('body')
    <div class="row mt-3">
        <div class="col-lg-12">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
                    <div>
                        <h4 class="card-title mb-0 text-dark fw-bold">Edit About Information</h4>
                        <small class="text-muted">Update about details, multi-language institution features, and media assets</small>
                    </div>
                    <div>
                        <a href="{{ route('add.about') }}" class="btn btn-outline-secondary btn-sm px-3">
                            <i class="fa fa-arrow-left me-1"></i> Back to Overview
                        </a>
                    </div>
                </div>

                @if(session('message'))
                    <div class="alert alert-success alert-dismissible fade show m-3" role="alert">
                        <i class="bi bi-check-circle-fill me-2"></i> {{ session('message') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show m-3" role="alert">
                        <i class="bi bi-exclamation-triangle-fill me-2"></i> {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="card-body p-4">
                    <form class="form-horizontal" action="{{ route('update.about') }}" enctype="multipart/form-data" method="POST">
                        @csrf
                        <input type="hidden" value="{{ $about->id }}" name="id">

                        {{-- Section 1: Titles --}}
                        <div class="border-bottom pb-2 mb-3">
                            <h5 class="fw-bold text-dark mb-1"><i class="fa fa-heading text-primary me-2"></i>1. Page Titles</h5>
                            <small class="text-muted">Titles in English, Bengali, and Arabic</small>
                        </div>
                        <div class="row g-3 mb-4">
                            <div class="col-md-4">
                                <label class="form-label fw-semibold">Title (English)</label>
                                <input type="text" class="form-control" name="title" id="title" value="{{ $about->title }}" placeholder="e.g. Introduction">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label fw-semibold">Title (Bangla)</label>
                                <input type="text" class="form-control" name="title_bangla" id="title_bangla" value="{{ $about->title_bangla }}" placeholder="e.g. পরিচিতি">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label fw-semibold">Title (Arabic)</label>
                                <input type="text" class="form-control" name="title_ab" id="title_ab" value="{{ $about->title_ab }}" placeholder="e.g. مقدمة">
                            </div>
                        </div>

                        {{-- Section 2: Descriptions --}}
                        <div class="border-bottom pb-2 mb-3">
                            <h5 class="fw-bold text-dark mb-1"><i class="fa fa-align-left text-primary me-2"></i>2. Detailed Descriptions</h5>
                            <small class="text-muted">Main descriptive content in multiple languages</small>
                        </div>
                        <div class="row g-3 mb-4">
                            <div class="col-md-4">
                                <label class="form-label fw-semibold">Description (English)</label>
                                <textarea class="form-control rich-editor" rows="5" name="des_eng">{!! $about->des_eng !!}</textarea>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label fw-semibold">Description (Bangla)</label>
                                <textarea class="form-control rich-editor" rows="5" name="des_bangla">{!! $about->des_bangla !!}</textarea>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label fw-semibold">Description (Arabic)</label>
                                <textarea class="form-control rich-editor" dir="rtl" rows="5" name="des_ab">{!! $about->des_ab !!}</textarea>
                            </div>
                        </div>

                        {{-- Section 3: Specialties (Multi-language) --}}
                        <div class="border-bottom pb-2 mb-3">
                            <h5 class="fw-bold text-primary mb-1"><i class="fa fa-star me-2"></i>3. Institutional Specialties (বিশেষত্ব)</h5>
                            <small class="text-muted">Multi-language specialties details (English, Bangla, Arabic)</small>
                        </div>
                        <div class="row g-3 mb-4">
                            <div class="col-md-4">
                                <label class="form-label fw-semibold text-primary"><i class="fa fa-globe me-1"></i> Specialties (English)</label>
                                <textarea class="form-control rich-editor" rows="5" name="specialties" placeholder="Describe institutional specialties in English...">{!! $about->specialties !!}</textarea>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label fw-semibold text-success"><i class="fa fa-language me-1"></i> Specialties (Bangla - বাংলা)</label>
                                <textarea class="form-control rich-editor" rows="5" name="specialties_bn" placeholder="বাংলায় বিশেষত্ব বিস্তারিত...">{!! $about->specialties_bn !!}</textarea>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label fw-semibold text-dark"><i class="fa fa-book-open me-1"></i> Specialties (Arabic - العربية)</label>
                                <textarea class="form-control rich-editor" dir="rtl" rows="5" name="specialties_ab" placeholder="المميزات الخاصة بالعربية...">{!! $about->specialties_ab !!}</textarea>
                            </div>
                        </div>

                        {{-- Section 4: Features (Multi-language) --}}
                        <div class="border-bottom pb-2 mb-3">
                            <h5 class="fw-bold text-success mb-1"><i class="fa fa-check-circle me-2"></i>4. Key Features (বৈশিষ্ট্যসমূহ)</h5>
                            <small class="text-muted">Multi-language institutional features (English, Bangla, Arabic)</small>
                        </div>
                        <div class="row g-3 mb-4">
                            <div class="col-md-4">
                                <label class="form-label fw-semibold text-primary"><i class="fa fa-globe me-1"></i> Features (English)</label>
                                <textarea class="form-control rich-editor" rows="5" name="features" placeholder="Describe key features in English...">{!! $about->features !!}</textarea>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label fw-semibold text-success"><i class="fa fa-language me-1"></i> Features (Bangla - বাংলা)</label>
                                <textarea class="form-control rich-editor" rows="5" name="features_bn" placeholder="বাংলায় বৈশিষ্ট্যসমূহ বিস্তারিত...">{!! $about->features_bn !!}</textarea>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label fw-semibold text-dark"><i class="fa fa-book-open me-1"></i> Features (Arabic - العربية)</label>
                                <textarea class="form-control rich-editor" dir="rtl" rows="5" name="features_ab" placeholder="الخصائص والمميزات بالعربية...">{!! $about->features_ab !!}</textarea>
                            </div>
                        </div>

                        {{-- Section 5: Hifz Education Details (Multi-language) --}}
                        <div class="border-bottom pb-2 mb-3">
                            <h5 class="fw-bold text-info mb-1"><i class="fa fa-book me-2"></i>5. Hifz Education Details (হিফজ শিক্ষা বিস্তারিত)</h5>
                            <small class="text-muted">Multi-language Hifz curriculum & department details (English, Bangla, Arabic)</small>
                        </div>
                        <div class="row g-3 mb-4">
                            <div class="col-md-4">
                                <label class="form-label fw-semibold text-primary"><i class="fa fa-globe me-1"></i> Hifz Edu Details (English)</label>
                                <textarea class="form-control rich-editor" rows="5" name="hifz_edu_details" placeholder="Describe Hifz education curriculum in English...">{!! $about->hifz_edu_details !!}</textarea>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label fw-semibold text-success"><i class="fa fa-language me-1"></i> Hifz Edu Details (Bangla - বাংলা)</label>
                                <textarea class="form-control rich-editor" rows="5" name="hifz_edu_details_bn" placeholder="বাংলায় হিফজ শিক্ষা বিস্তারিত...">{!! $about->hifz_edu_details_bn !!}</textarea>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label fw-semibold text-dark"><i class="fa fa-book-open me-1"></i> Hifz Edu Details (Arabic - العربية)</label>
                                <textarea class="form-control rich-editor" dir="rtl" rows="5" name="hifz_edu_details_ab" placeholder="تفاصيل برنامج تحفيظ القرآن الكريم بالعربية...">{!! $about->hifz_edu_details_ab !!}</textarea>
                            </div>
                        </div>

                        {{-- Section 6: Institutional Achievements (Multi-language) --}}
                        <div class="border-bottom pb-2 mb-3">
                            <h5 class="fw-bold mb-1" style="color: #ea580c !important;"><i class="fa fa-trophy me-2"></i>6. মুক্বাদ্দামাতুল কুরআন হিফয মাদরাসার সফলতা (Institutional Achievements)</h5>
                            <small class="text-muted">Multi-language institutional achievements & milestones (English, Bangla, Arabic)</small>
                        </div>
                        <div class="row g-3 mb-4">
                            <div class="col-md-4">
                                <label class="form-label fw-semibold text-primary"><i class="fa fa-globe me-1"></i> Achievements (English)</label>
                                <textarea class="form-control rich-editor" rows="5" name="achievement" placeholder="Describe institutional achievements in English...">{!! $about->achievement !!}</textarea>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label fw-semibold text-success"><i class="fa fa-language me-1"></i> Achievements (Bangla - বাংলা)</label>
                                <textarea class="form-control rich-editor" rows="5" name="achievement_bn" placeholder="বাংলায় সাফল্য ও অর্জনসমূহ বিস্তারিত...">{!! $about->achievement_bn !!}</textarea>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label fw-semibold text-dark"><i class="fa fa-book-open me-1"></i> Achievements (Arabic - العربية)</label>
                                <textarea class="form-control rich-editor" dir="rtl" rows="5" name="achievement_ab" placeholder="الإنجازات والنجاحات بالعربية...">{!! $about->achievement_ab !!}</textarea>
                            </div>
                        </div>

                        {{-- Section 7: International Achievements (Multi-language) --}}
                        <div class="border-bottom pb-2 mb-3">
                            <h5 class="fw-bold mb-1" style="color: #0b462c !important;"><i class="fa fa-globe me-2"></i>7. আন্তর্জাতিক হিফযুল কুরআন প্রতিযোগিতা (International Achievements)</h5>
                            <small class="text-muted">Multi-language international achievements & competitions (English, Bangla, Arabic)</small>
                        </div>
                        <div class="row g-3 mb-4">
                            <div class="col-md-4">
                                <label class="form-label fw-semibold text-primary"><i class="fa fa-globe me-1"></i> Int. Achievements (English)</label>
                                <textarea class="form-control rich-editor" rows="5" name="int_achievement" placeholder="Describe international achievements in English...">{!! $about->int_achievement !!}</textarea>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label fw-semibold text-success"><i class="fa fa-language me-1"></i> Int. Achievements (Bangla - বাংলা)</label>
                                <textarea class="form-control rich-editor" rows="5" name="int_achievement_bn" placeholder="বাংলায় আন্তর্জাতিক সাফল্য ও অর্জনসমূহ...">{!! $about->int_achievement_bn !!}</textarea>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label fw-semibold text-dark"><i class="fa fa-book-open me-1"></i> Int. Achievements (Arabic - العربية)</label>
                                <textarea class="form-control rich-editor" dir="rtl" rows="5" name="int_achievement_ab" placeholder="الإنجازات الدولية والمسابقات بالعربية...">{!! $about->int_achievement_ab !!}</textarea>
                            </div>
                        </div>

                        {{-- Section 8: Image Uploads with Live & Existing Preview --}}
                        <div class="border-bottom pb-2 mb-3">
                            <h5 class="fw-bold text-dark mb-1"><i class="fa fa-images text-primary me-2"></i>8. Media & Images (with Live Preview)</h5>
                            <small class="text-muted">Upload new images to replace existing ones. Preview updates automatically.</small>
                        </div>
                        <div class="row g-4 mb-4">
                            {{-- Image 1 --}}
                            <div class="col-md-4">
                                <div class="border rounded p-3 bg-light h-100">
                                    <label class="form-label fw-bold text-dark d-block">About Image 1</label>
                                    <input type="file" class="form-control mb-3" name="image1" id="image1_input" accept="image/*" onchange="previewImage(this, 'preview_image1', 'current_box_image1')">

                                    <div class="row g-2">
                                        {{-- Current Image Display --}}
                                        <div class="col-6" id="current_box_image1">
                                            <span class="d-block text-muted small mb-1 fw-semibold">Current Image</span>
                                            @if($about->image1 && file_exists(public_path($about->image1)))
                                                <img src="{{ asset($about->image1) }}" alt="Current Image 1" class="img-fluid rounded border shadow-sm w-100" style="height: 120px; object-fit: cover;">
                                            @else
                                                <div class="border rounded p-3 text-center text-muted bg-white" style="height: 120px; display: flex; align-items: center; justify-content: center;">
                                                    <small>No image</small>
                                                </div>
                                            @endif
                                        </div>
                                        {{-- Live Upload Preview --}}
                                        <div class="col-6">
                                            <span class="d-block text-primary small mb-1 fw-semibold">New Preview</span>
                                            <div class="border rounded p-1 text-center bg-white" style="height: 120px; display: flex; align-items: center; justify-content: center;">
                                                <img id="preview_image1" src="" alt="New Preview" class="img-fluid rounded d-none" style="max-height: 110px; max-width: 100%; object-fit: contain;">
                                                <span id="text_preview_image1" class="text-muted small">Select file</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Image 2 --}}
                            <div class="col-md-4">
                                <div class="border rounded p-3 bg-light h-100">
                                    <label class="form-label fw-bold text-dark d-block">About Image 2</label>
                                    <input type="file" class="form-control mb-3" name="image2" id="image2_input" accept="image/*" onchange="previewImage(this, 'preview_image2', 'current_box_image2')">

                                    <div class="row g-2">
                                        {{-- Current Image Display --}}
                                        <div class="col-6" id="current_box_image2">
                                            <span class="d-block text-muted small mb-1 fw-semibold">Current Image</span>
                                            @if($about->image2 && file_exists(public_path($about->image2)))
                                                <img src="{{ asset($about->image2) }}" alt="Current Image 2" class="img-fluid rounded border shadow-sm w-100" style="height: 120px; object-fit: cover;">
                                            @else
                                                <div class="border rounded p-3 text-center text-muted bg-white" style="height: 120px; display: flex; align-items: center; justify-content: center;">
                                                    <small>No image</small>
                                                </div>
                                            @endif
                                        </div>
                                        {{-- Live Upload Preview --}}
                                        <div class="col-6">
                                            <span class="d-block text-primary small mb-1 fw-semibold">New Preview</span>
                                            <div class="border rounded p-1 text-center bg-white" style="height: 120px; display: flex; align-items: center; justify-content: center;">
                                                <img id="preview_image2" src="" alt="New Preview" class="img-fluid rounded d-none" style="max-height: 110px; max-width: 100%; object-fit: contain;">
                                                <span id="text_preview_image2" class="text-muted small">Select file</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Banner Image --}}
                            <div class="col-md-4">
                                <div class="border rounded p-3 bg-light h-100">
                                    <label class="form-label fw-bold text-dark d-block">Banner Image</label>
                                    <input type="file" class="form-control mb-3" name="banner_image" id="banner_image_input" accept="image/*" onchange="previewImage(this, 'preview_banner_image', 'current_box_banner_image')">

                                    <div class="row g-2">
                                        {{-- Current Image Display --}}
                                        <div class="col-6" id="current_box_banner_image">
                                            <span class="d-block text-muted small mb-1 fw-semibold">Current Banner</span>
                                            @if($about->banner_image && file_exists(public_path($about->banner_image)))
                                                <img src="{{ asset($about->banner_image) }}" alt="Current Banner" class="img-fluid rounded border shadow-sm w-100" style="height: 120px; object-fit: cover;">
                                            @else
                                                <div class="border rounded p-3 text-center text-muted bg-white" style="height: 120px; display: flex; align-items: center; justify-content: center;">
                                                    <small>No image</small>
                                                </div>
                                            @endif
                                        </div>
                                        {{-- Live Upload Preview --}}
                                        <div class="col-6">
                                            <span class="d-block text-primary small mb-1 fw-semibold">New Preview</span>
                                            <div class="border rounded p-1 text-center bg-white" style="height: 120px; display: flex; align-items: center; justify-content: center;">
                                                <img id="preview_banner_image" src="" alt="New Preview" class="img-fluid rounded d-none" style="max-height: 110px; max-width: 100%; object-fit: contain;">
                                                <span id="text_preview_banner_image" class="text-muted small">Select file</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Action Buttons --}}
                        <div class="d-flex align-items-center gap-2 pt-3 border-top">
                            <button type="submit" class="btn btn-primary px-4 py-2 fw-semibold shadow-sm">
                                <i class="fa fa-save me-1"></i> Update About Information
                            </button>
                            <a href="{{ route('add.about') }}" class="btn btn-light px-4 py-2 border">
                                Cancel
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/7.1.1/tinymce.min.js" referrerpolicy="origin"></script>
    <script type="text/javascript">
        document.addEventListener("DOMContentLoaded", function() {
            tinymce.init({
                selector: 'textarea.rich-editor',
                height: 250,
                menubar: false,
                plugins: 'advlist autolink lists link image charmap preview anchor searchreplace visualblocks code fullscreen insertdatetime media table code wordcount',
                toolbar: 'undo redo | formatselect | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | code'
            });
        });

        function previewImage(input, previewId) {
            const preview = document.getElementById(previewId);
            const placeholderText = document.getElementById('text_' + previewId);
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.classList.remove('d-none');
                    if (placeholderText) {
                        placeholderText.classList.add('d-none');
                    }
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection
