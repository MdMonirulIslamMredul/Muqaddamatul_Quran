@extends('admin.master')

@section('body')
    <div class="row mt-3">
        <div class="col-lg-12">
            @if(session('message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="bi bi-check-circle-fill me-2"></i> {{ session('message') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="bi bi-exclamation-triangle-fill me-2"></i> {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if($about)
                {{-- Single Record Overview Card --}}
                <div class="card border shadow-sm mb-4">
                    <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center border-bottom">
                        <div>
                            <h4 class="card-title mb-0 fw-bold" style="color: #212529;">About Page Information</h4>
                            <small class="text-muted">Single record managed for the Madrasah About section</small>
                        </div>
                        <div>
                            <a href="{{ route('edit.about', ['id' => $about->id]) }}" class="btn btn-primary px-3 shadow-sm">
                                <i class="fa fa-edit me-1"></i> Edit About Information
                            </a>
                        </div>
                    </div>
                    <div class="card-body p-4">
                        <div class="row g-4">
                            {{-- Titles --}}
                            <div class="col-md-4">
                                <div class="p-3 border rounded bg-light h-100">
                                    <h6 class="text-uppercase text-muted fw-bold mb-2 small">Title (English)</h6>
                                    <p class="fs-6 fw-semibold text-dark mb-0">{{ $about->title ?? 'Not specified' }}</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="p-3 border rounded bg-light h-100">
                                    <h6 class="text-uppercase text-muted fw-bold mb-2 small">Title (Bangla)</h6>
                                    <p class="fs-6 fw-semibold text-dark mb-0">{{ $about->title_bangla ?? 'Not specified' }}</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="p-3 border rounded bg-light h-100">
                                    <h6 class="text-uppercase text-muted fw-bold mb-2 small">Title (Arabic)</h6>
                                    <p class="fs-6 fw-semibold text-dark mb-0">{{ $about->title_ab ?? 'Not specified' }}</p>
                                </div>
                            </div>

                            {{-- Images Gallery Preview --}}
                            <div class="col-12">
                                <h6 class="text-uppercase text-muted fw-bold mb-3 small">Current Images</h6>
                                <div class="row g-3">
                                    <div class="col-md-4">
                                        <div class="border rounded p-3 text-center bg-light">
                                            <span class="d-block text-muted small mb-2 fw-bold">About Image 1</span>
                                            @if($about->image1 && file_exists(public_path($about->image1)))
                                                <img src="{{ asset($about->image1) }}" alt="About Image 1" class="img-fluid rounded border shadow-sm" style="max-height: 140px; object-fit: cover;">
                                            @else
                                                <div class="text-muted py-4"><i class="fa fa-image fa-2x d-block mb-1"></i> No image uploaded</div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="border rounded p-3 text-center bg-light">
                                            <span class="d-block text-muted small mb-2 fw-bold">About Image 2</span>
                                            @if($about->image2 && file_exists(public_path($about->image2)))
                                                <img src="{{ asset($about->image2) }}" alt="About Image 2" class="img-fluid rounded border shadow-sm" style="max-height: 140px; object-fit: cover;">
                                            @else
                                                <div class="text-muted py-4"><i class="fa fa-image fa-2x d-block mb-1"></i> No image uploaded</div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="border rounded p-3 text-center bg-light">
                                            <span class="d-block text-muted small mb-2 fw-bold">Banner Image</span>
                                            @if($about->banner_image && file_exists(public_path($about->banner_image)))
                                                <img src="{{ asset($about->banner_image) }}" alt="Banner Image" class="img-fluid rounded border shadow-sm" style="max-height: 140px; object-fit: cover;">
                                            @else
                                                <div class="text-muted py-4"><i class="fa fa-image fa-2x d-block mb-1"></i> No banner image uploaded</div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Descriptions --}}
                            <div class="col-md-4">
                                <div class="border rounded p-3 bg-light h-100">
                                    <h6 class="text-uppercase text-muted fw-bold mb-2 small">Description (English)</h6>
                                    <div class="text-secondary small" style="max-height: 150px; overflow-y: auto;">
                                        {!! $about->des_eng ?? '<em>No description provided</em>' !!}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="border rounded p-3 bg-light h-100">
                                    <h6 class="text-uppercase text-muted fw-bold mb-2 small">Description (Bangla)</h6>
                                    <div class="text-secondary small" style="max-height: 150px; overflow-y: auto;">
                                        {!! $about->des_bangla ?? '<em>No description provided</em>' !!}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="border rounded p-3 bg-light h-100">
                                    <h6 class="text-uppercase text-muted fw-bold mb-2 small">Description (Arabic)</h6>
                                    <div class="text-secondary small" style="max-height: 150px; overflow-y: auto;">
                                        {!! $about->des_ab ?? '<em>No description provided</em>' !!}
                                    </div>
                                </div>
                            </div>

                            {{-- Specialties (Multi-language) --}}
                            <div class="col-12">
                                <div class="card border shadow-sm" style="border-left: 4px solid #007bff !important;">
                                    <div class="card-header bg-white py-2 border-bottom">
                                        <h6 class="fw-bold mb-0" style="color: #007bff;"><i class="fa fa-star me-2"></i> Institutional Specialties (বিশেষত্ব)</h6>
                                    </div>
                                    <div class="card-body p-3">
                                        <div class="row g-3">
                                            <div class="col-md-4">
                                                <span class="badge mb-2" style="background-color: #007bff; color: #ffffff;">English</span>
                                                <div class="text-secondary small border rounded p-2 bg-light" style="max-height: 120px; overflow-y: auto;">
                                                    {!! $about->specialties ?? '<em>Not specified</em>' !!}
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <span class="badge mb-2" style="background-color: #28a745; color: #ffffff;">Bangla (বাংলা)</span>
                                                <div class="text-secondary small border rounded p-2 bg-light" style="max-height: 120px; overflow-y: auto;">
                                                    {!! $about->specialties_bn ?? '<em>Not specified</em>' !!}
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <span class="badge mb-2" style="background-color: #6c757d; color: #ffffff;">Arabic (العربية)</span>
                                                <div class="text-secondary small border rounded p-2 bg-light" style="max-height: 120px; overflow-y: auto;">
                                                    {!! $about->specialties_ab ?? '<em>Not specified</em>' !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Features (Multi-language) --}}
                            <div class="col-12">
                                <div class="card border shadow-sm" style="border-left: 4px solid #28a745 !important;">
                                    <div class="card-header bg-white py-2 border-bottom">
                                        <h6 class="fw-bold mb-0" style="color: #28a745;"><i class="fa fa-check-circle me-2"></i> Key Features (বৈশিষ্ট্যসমূহ)</h6>
                                    </div>
                                    <div class="card-body p-3">
                                        <div class="row g-3">
                                            <div class="col-md-4">
                                                <span class="badge mb-2" style="background-color: #007bff; color: #ffffff;">English</span>
                                                <div class="text-secondary small border rounded p-2 bg-light" style="max-height: 120px; overflow-y: auto;">
                                                    {!! $about->features ?? '<em>Not specified</em>' !!}
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <span class="badge mb-2" style="background-color: #28a745; color: #ffffff;">Bangla (বাংলা)</span>
                                                <div class="text-secondary small border rounded p-2 bg-light" style="max-height: 120px; overflow-y: auto;">
                                                    {!! $about->features_bn ?? '<em>Not specified</em>' !!}
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <span class="badge mb-2" style="background-color: #6c757d; color: #ffffff;">Arabic (العربية)</span>
                                                <div class="text-secondary small border rounded p-2 bg-light" style="max-height: 120px; overflow-y: auto;">
                                                    {!! $about->features_ab ?? '<em>Not specified</em>' !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Hifz Education Details (Multi-language) --}}
                            <div class="col-12">
                                <div class="card border shadow-sm" style="border-left: 4px solid #17a2b8 !important;">
                                    <div class="card-header bg-white py-2 border-bottom">
                                        <h6 class="fw-bold mb-0" style="color: #17a2b8;"><i class="fa fa-book me-2"></i> Hifz Education Details (হিফজ শিক্ষা বিস্তারিত)</h6>
                                    </div>
                                    <div class="card-body p-3">
                                        <div class="row g-3">
                                            <div class="col-md-4">
                                                <span class="badge mb-2" style="background-color: #007bff; color: #ffffff;">English</span>
                                                <div class="text-secondary small border rounded p-2 bg-light" style="max-height: 120px; overflow-y: auto;">
                                                    {!! $about->hifz_edu_details ?? '<em>Not specified</em>' !!}
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <span class="badge mb-2" style="background-color: #28a745; color: #ffffff;">Bangla (বাংলা)</span>
                                                <div class="text-secondary small border rounded p-2 bg-light" style="max-height: 120px; overflow-y: auto;">
                                                    {!! $about->hifz_edu_details_bn ?? '<em>Not specified</em>' !!}
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <span class="badge mb-2" style="background-color: #6c757d; color: #ffffff;">Arabic (العربية)</span>
                                                <div class="text-secondary small border rounded p-2 bg-light" style="max-height: 120px; overflow-y: auto;">
                                                    {!! $about->hifz_edu_details_ab ?? '<em>Not specified</em>' !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Single Table Row Management Card --}}
                <div class="card border shadow-sm">
                    <div class="card-header bg-white py-3 border-bottom">
                        <h5 class="card-title mb-0 fw-bold" style="color: #212529;">About Table Record</h5>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover align-middle mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th style="width: 120px;">Image</th>
                                        <th>Title (English / Bangla)</th>
                                        <th>Multi-language Configured</th>
                                        <th>Last Updated</th>
                                        <th class="text-center" style="width: 100px;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            @if($about->image1 && file_exists(public_path($about->image1)))
                                                <img src="{{ asset($about->image1) }}" alt="Thumbnail" class="rounded border" style="height: 65px; width: 65px; object-fit: cover;">
                                            @elseif($about->banner_image && file_exists(public_path($about->banner_image)))
                                                <img src="{{ asset($about->banner_image) }}" alt="Thumbnail" class="rounded border" style="height: 65px; width: 65px; object-fit: cover;">
                                            @else
                                                <span class="badge" style="background-color: #6c757d; color: #ffffff;">No Image</span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="fw-bold text-dark">{{ $about->title ?? 'N/A' }}</div>
                                            <small class="text-muted">{{ $about->title_bangla ?? '' }}</small>
                                        </td>
                                        <td>
                                            <div class="d-flex flex-wrap gap-1">
                                                @if($about->specialties || $about->specialties_bn || $about->specialties_ab)
                                                    <span class="badge me-1" style="background-color: #007bff; color: #ffffff; padding: 5px 8px; font-size: 11px;"><i class="fa fa-star me-1"></i> Specialties (EN/BN/AB)</span>
                                                @endif
                                                @if($about->features || $about->features_bn || $about->features_ab)
                                                    <span class="badge me-1" style="background-color: #28a745; color: #ffffff; padding: 5px 8px; font-size: 11px;"><i class="fa fa-check me-1"></i> Features (EN/BN/AB)</span>
                                                @endif
                                                @if($about->hifz_edu_details || $about->hifz_edu_details_bn || $about->hifz_edu_details_ab)
                                                    <span class="badge" style="background-color: #17a2b8; color: #ffffff; padding: 5px 8px; font-size: 11px;"><i class="fa fa-book me-1"></i> Hifz Details (EN/BN/AB)</span>
                                                @endif
                                            </div>
                                        </td>
                                        <td>
                                            <small class="text-muted">{{ $about->updated_at ? $about->updated_at->format('d M, Y h:i A') : 'N/A' }}</small>
                                        </td>
                                        <td class="text-center">
                                            <a href="{{ route('edit.about', ['id' => $about->id]) }}" class="btn btn-sm btn-primary px-3 shadow-sm" title="Edit About">
                                                <i class="fa fa-edit me-1"></i> Edit
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            @else
                {{-- If no About record exists yet, show creation form --}}
                <div class="card border shadow-sm">
                    <div class="card-header bg-white py-3 border-bottom">
                        <h4 class="card-title mb-0 fw-bold" style="color: #212529;">Create About Information</h4>
                        <small class="text-muted">Set up the initial About record</small>
                    </div>
                    <div class="card-body p-4">
                        <form class="form-horizontal" action="{{ route('store.about') }}" enctype="multipart/form-data" method="POST">
                            @csrf

                            <h5 class="fw-bold text-dark border-bottom pb-2 mb-3">1. Titles</h5>
                            <div class="row g-3 mb-4">
                                <div class="col-md-4">
                                    <label class="form-label fw-semibold">Title (English)</label>
                                    <input type="text" class="form-control" name="title" placeholder="e.g. Introduction">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label fw-semibold">Title (Bangla)</label>
                                    <input type="text" class="form-control" name="title_bangla" placeholder="e.g. পরিচিতি">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label fw-semibold">Title (Arabic)</label>
                                    <input type="text" class="form-control" name="title_ab" placeholder="e.g. مقدمة">
                                </div>
                            </div>

                            <h5 class="fw-bold text-dark border-bottom pb-2 mb-3">2. Detailed Descriptions</h5>
                            <div class="row g-3 mb-4">
                                <div class="col-md-4">
                                    <label class="form-label fw-semibold">Description (English)</label>
                                    <textarea class="form-control rich-editor" rows="4" name="des_eng"></textarea>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label fw-semibold">Description (Bangla)</label>
                                    <textarea class="form-control rich-editor" rows="4" name="des_bangla"></textarea>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label fw-semibold">Description (Arabic)</label>
                                    <textarea class="form-control rich-editor" rows="4" name="des_ab"></textarea>
                                </div>
                            </div>

                            <h5 class="fw-bold text-dark border-bottom pb-2 mb-3">3. Institutional Specialties (বিশেষত্ব)</h5>
                            <div class="row g-3 mb-4">
                                <div class="col-md-4">
                                    <label class="form-label fw-semibold text-primary"><i class="fa fa-star me-1"></i> Specialties (English)</label>
                                    <textarea class="form-control rich-editor" rows="4" name="specialties" placeholder="Specialties in English..."></textarea>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label fw-semibold text-success"><i class="fa fa-star me-1"></i> Specialties (Bangla - বাংলা)</label>
                                    <textarea class="form-control rich-editor" rows="4" name="specialties_bn" placeholder="বাংলায় বিশেষত্ব..."></textarea>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label fw-semibold text-secondary"><i class="fa fa-star me-1"></i> Specialties (Arabic - العربية)</label>
                                    <textarea class="form-control rich-editor" rows="4" name="specialties_ab" placeholder="المميزات بالعربية..."></textarea>
                                </div>
                            </div>

                            <h5 class="fw-bold text-dark border-bottom pb-2 mb-3">4. Key Features (বৈশিষ্ট্যসমূহ)</h5>
                            <div class="row g-3 mb-4">
                                <div class="col-md-4">
                                    <label class="form-label fw-semibold text-primary"><i class="fa fa-check-circle me-1"></i> Features (English)</label>
                                    <textarea class="form-control rich-editor" rows="4" name="features" placeholder="Features in English..."></textarea>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label fw-semibold text-success"><i class="fa fa-check-circle me-1"></i> Features (Bangla - বাংলা)</label>
                                    <textarea class="form-control rich-editor" rows="4" name="features_bn" placeholder="বাংলায় বৈশিষ্ট্যসমূহ..."></textarea>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label fw-semibold text-secondary"><i class="fa fa-check-circle me-1"></i> Features (Arabic - العربية)</label>
                                    <textarea class="form-control rich-editor" rows="4" name="features_ab" placeholder="الخصائص بالعربية..."></textarea>
                                </div>
                            </div>

                            <h5 class="fw-bold text-dark border-bottom pb-2 mb-3">5. Hifz Education Details (হিফজ শিক্ষা বিস্তারিত)</h5>
                            <div class="row g-3 mb-4">
                                <div class="col-md-4">
                                    <label class="form-label fw-semibold text-primary"><i class="fa fa-book me-1"></i> Hifz Edu Details (English)</label>
                                    <textarea class="form-control rich-editor" rows="4" name="hifz_edu_details" placeholder="Hifz details in English..."></textarea>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label fw-semibold text-success"><i class="fa fa-book me-1"></i> Hifz Edu Details (Bangla - বাংলা)</label>
                                    <textarea class="form-control rich-editor" rows="4" name="hifz_edu_details_bn" placeholder="বাংলায় হিফজ শিক্ষা বিস্তারিত..."></textarea>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label fw-semibold text-secondary"><i class="fa fa-book me-1"></i> Hifz Edu Details (Arabic - العربية)</label>
                                    <textarea class="form-control rich-editor" rows="4" name="hifz_edu_details_ab" placeholder="تفاصيل تحفيظ القرآن بالعربية..."></textarea>
                                </div>
                            </div>

                            <h5 class="fw-bold text-dark border-bottom pb-2 mb-3">6. Images</h5>
                            <div class="row g-3 mb-4">
                                <div class="col-md-4">
                                    <label class="form-label fw-semibold">About Image 1</label>
                                    <input type="file" class="form-control mb-2" name="image1" id="create_image1" accept="image/*" onchange="previewImage(this, 'preview_create_image1')">
                                    <div class="border rounded p-2 text-center bg-light" style="min-height: 120px;">
                                        <img id="preview_create_image1" src="" alt="Preview" class="img-fluid rounded d-none" style="max-height: 120px;">
                                        <span id="text_create_image1" class="text-muted small d-block pt-4">Image preview will appear here</span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label fw-semibold">About Image 2</label>
                                    <input type="file" class="form-control mb-2" name="image2" id="create_image2" accept="image/*" onchange="previewImage(this, 'preview_create_image2')">
                                    <div class="border rounded p-2 text-center bg-light" style="min-height: 120px;">
                                        <img id="preview_create_image2" src="" alt="Preview" class="img-fluid rounded d-none" style="max-height: 120px;">
                                        <span id="text_create_image2" class="text-muted small d-block pt-4">Image preview will appear here</span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label fw-semibold">Banner Image</label>
                                    <input type="file" class="form-control mb-2" name="banner_image" id="create_banner_image" accept="image/*" onchange="previewImage(this, 'preview_create_banner_image')">
                                    <div class="border rounded p-2 text-center bg-light" style="min-height: 120px;">
                                        <img id="preview_create_banner_image" src="" alt="Preview" class="img-fluid rounded d-none" style="max-height: 120px;">
                                        <span id="text_create_banner_image" class="text-muted small d-block pt-4">Banner preview will appear here</span>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-4">
                                <button type="submit" class="btn btn-info px-4 py-2 text-white fw-bold shadow-sm">
                                    <i class="fa fa-save me-1"></i> Save About Information
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            @endif
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
            const placeholderText = document.getElementById(previewId.replace('preview_', 'text_'));
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
