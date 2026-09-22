@extends('admin.master')
@section('body')
    <div class="container-fluid mt-3 mb-5">
        
        @if(session('message'))
            <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
                <i class="bi bi-check-circle-fill me-2"></i>{{ session('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show shadow-sm" role="alert">
                <i class="bi bi-exclamation-triangle-fill me-2"></i>{{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- Add Photo Card -->
        <div class="card border shadow-sm rounded-3 mb-4">
            <div class="card-header bg-white py-3 border-bottom d-flex justify-content-between align-items-center flex-wrap gap-2">
                <h4 class="card-title mb-0 fw-bold" style="color: #1b4332;">
                    <i class="bi bi-images text-success me-2"></i>ফটো গ্যালারিতে নতুন ছবি যুক্ত করুন (Add Photo to Gallery)
                </h4>
                <a href="{{ route('gallery.categories.index', ['type' => 'photo']) }}" class="btn btn-outline-success btn-sm fw-bold">
                    <i class="bi bi-tags-fill me-1"></i> ক্যাটাগরি ব্যবস্থাপনা (Manage Categories)
                </a>
            </div>
            <div class="card-body p-4" style="color: #212529;">
                <form action="{{ route('store.gallery') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row g-3">
                        <!-- Photo Title -->
                        <div class="col-md-5 form-group">
                            <label class="form-label fw-bold text-dark">ছবির শিরোনাম / ক্যাপশন (Photo Title)</label>
                            <input type="text" name="title" class="form-control" placeholder="যেমনঃ বার্ষিক ক্রীড়া প্রতিযোগিতা ও পুরষ্কার বিতরণী" value="{{ old('title') }}">
                            <small class="text-muted font-11 d-block mt-1" style="color: #64748b !important;">ছবির সংক্ষিপ্ত শিরোনাম বা বিষয়</small>
                        </div>

                        <!-- Photo Category -->
                        <div class="col-md-4 form-group">
                            <div class="d-flex justify-content-between align-items-center mb-1">
                                <label class="form-label fw-bold text-dark mb-0">ফটো ক্যাটাগরি (Photo Category)</label>
                                <button type="button" class="btn btn-link btn-sm p-0 text-decoration-none fw-bold text-success font-12" data-bs-toggle="modal" data-bs-target="#quickAddPhotoCategoryModal">
                                    <i class="bi bi-plus-circle me-1"></i>+ নতুন ক্যাটাগরি
                                </button>
                            </div>
                            <select class="form-select" name="category_id" id="photoCategorySelect" style="color: #212529; font-weight: 500;">
                                <option value="">-- ক্যাটাগরি নির্বাচন করুন (ঐচ্ছিক) --</option>
                                @foreach($categories as $cat)
                                    <option value="{{ $cat->id }}" {{ old('category_id') == $cat->id ? 'selected' : '' }}>
                                        {{ $cat->name_bn }} {{ $cat->name_en ? '('.$cat->name_en.')' : '' }}
                                    </option>
                                @endforeach
                            </select>
                            <small class="text-muted font-11 d-block mt-1" style="color: #64748b !important;">ছবিটি কোন ক্যাটাগরির অন্তর্ভুক্ত তা নির্ধারণ করুন</small>
                        </div>

                        <!-- Add to Homepage -->
                        <div class="col-md-3 form-group">
                            <label class="form-label fw-bold text-dark">হোমপেজে প্রদর্শন করবেন?</label>
                            <select class="form-select" name="add_home" style="color: #212529; font-weight: 500;">
                                <option value="1" {{ old('add_home', '1') == '1' ? 'selected' : '' }}>হ্যাঁ (Yes - Show on Home)</option>
                                <option value="0" {{ old('add_home') === '0' ? 'selected' : '' }}>না (No - Only in Gallery Page)</option>
                            </select>
                            <small class="text-muted font-11 d-block mt-1" style="color: #64748b !important;">হোমপেজে দেখাতে চান কিনা</small>
                        </div>

                        <!-- Photo Description -->
                        <div class="col-md-12 form-group">
                            <label class="form-label fw-bold text-dark">ছবির বিস্তারিত বিবরণ (Photo Description - ঐচ্ছিক)</label>
                            <textarea name="description" class="form-control" rows="2" placeholder="ছবির বিস্তারিত বিবরণ বা প্রেক্ষাপট লিখুন...">{{ old('description') }}</textarea>
                        </div>

                        <!-- Image File -->
                        <div class="col-md-12 form-group">
                            <label class="form-label fw-bold text-dark">ছবি আপলোড করুন (Upload Photo) <span class="text-danger">*</span></label>
                            <input type="file" name="image" class="form-control" accept="image/jpeg,image/png,image/jpg,image/webp" required>
                            <small class="text-muted font-11 d-block mt-1" style="color: #64748b !important;">সমর্থিত ফাইল: JPG, JPEG, PNG, WEBP (উচ্চ রেজোলিউশন ছবি সুপারিশকৃত)</small>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end mt-4 pt-3 border-top">
                        <button type="submit" class="btn px-4 fw-bold shadow-sm text-white" style="background-color: #1b4332; border: 1px solid #1b4332;">
                            <i class="bi bi-cloud-arrow-up-fill me-1"></i> ছবি সংরক্ষণ করুন (Upload Photo)
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Gallery List Card -->
        <div class="card border shadow-sm rounded-3">
            <div class="card-header bg-white py-3 border-bottom d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0 fw-bold" style="color: #1b4332;">
                    <i class="bi bi-card-image me-2"></i>সকল ফটো গ্যালারি তালিকা (Photo Gallery List - {{ count($galleries) }})
                </h5>
                <a href="{{ route('gallery.page') }}" target="_blank" class="btn btn-outline-success btn-sm fw-bold">
                    <i class="bi bi-box-arrow-up-right me-1"></i> গ্যালারি পেজ দেখুন
                </a>
            </div>
            <div class="card-body p-3">
                <div class="table-responsive">
                    <table class="table table-hover align-middle border text-nowrap">
                        <thead class="table-light">
                            <tr>
                                <th style="width: 60px;">#</th>
                                <th style="width: 120px;">ছবি (Image)</th>
                                <th>শিরোনাম ও বিবরণ (Title & Description)</th>
                                <th style="width: 150px;">ক্যাটাগরি</th>
                                <th style="width: 130px;">হোমপেজে</th>
                                <th style="width: 100px;">স্ট্যাটাস</th>
                                <th style="width: 130px;" class="text-center">অ্যাকশন</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($galleries as $gallery)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <a href="{{ asset($gallery->image) }}" target="_blank">
                                            <img src="{{ asset($gallery->image) }}" alt="{{ $gallery->title }}" class="rounded shadow-sm border" style="width: 90px; height: 60px; object-fit: cover;">
                                        </a>
                                    </td>
                                    <td style="white-space: normal; max-width: 300px;">
                                        <h6 class="fw-bold text-dark mb-1 font-14">{{ $gallery->title ?: 'শিরোনামহীন ছবি' }}</h6>
                                        @if($gallery->description)
                                            <p class="text-muted small mb-0 font-12" style="color: #64748b !important;">{{ Str::limit($gallery->description, 100) }}</p>
                                        @endif
                                    </td>
                                    <td>
                                        @if($gallery->category)
                                            <span class="badge bg-success bg-opacity-10 text-success border border-success px-2 py-1">
                                                <i class="bi bi-tag-fill me-1"></i>{{ $gallery->category->name_bn }}
                                            </span>
                                        @else
                                            <span class="badge bg-light text-muted border px-2 py-1">ক্যাটাগরিহীন</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($gallery->add_home == 1)
                                            <span class="badge bg-success text-white px-2 py-1"><i class="bi bi-check-circle me-1"></i>হোমপেজে যুক্ত</span>
                                        @else
                                            <span class="badge bg-secondary text-white px-2 py-1">শুধু গ্যালারিতে</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($gallery->status == 1)
                                            <span class="badge bg-success text-white px-2 py-1">সক্রিয়</span>
                                        @else
                                            <span class="badge bg-danger text-white px-2 py-1">নিষ্ক্রিয়</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <div class="d-inline-flex gap-1">
                                            <a href="{{ route('edit.gallery', ['id' => $gallery->id]) }}" class="btn btn-warning btn-sm fw-bold shadow-sm text-dark" title="সম্পাদনা">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>
                                            <a href="{{ route('delete.gallery', ['id' => $gallery->id]) }}" class="btn btn-danger btn-sm fw-bold shadow-sm" onclick="return confirm('আপনি কি নিশ্চিতভাবে এই ছবিটি মুছে ফেলতে চান?')" title="মুছুন">
                                                <i class="bi bi-trash"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center py-4 text-muted">
                                        <i class="bi bi-image font-24 d-block mb-1"></i>বর্তমানে কোনো ছবি যুক্ত নেই।
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Add Category Modal -->
    <div class="modal fade" id="quickAddPhotoCategoryModal" tabindex="-1" aria-labelledby="quickAddPhotoCategoryModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold text-success" id="quickAddPhotoCategoryModalLabel">
                        <i class="bi bi-plus-circle me-1"></i>নতুন ফটো ক্যাটাগরি তৈরি করুন
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="quickCatModalAlert" class="alert alert-danger d-none py-2 px-3 small"></div>
                    <form id="quickPhotoCatForm">
                        @csrf
                        <input type="hidden" name="type" value="photo">
                        <div class="form-group mb-3">
                            <label class="form-label fw-bold text-dark">ক্যাটাগরির নাম (বাংলা) <span class="text-danger">*</span></label>
                            <input type="text" name="name_bn" id="quickCatNameBn" class="form-control" placeholder="যেমনঃ বার্ষিক ক্রীড়া প্রতিযোগিতা" required>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label fw-bold text-dark">ক্যাটাগরির নাম (English - ঐচ্ছিক)</label>
                            <input type="text" name="name_en" id="quickCatNameEn" class="form-control" placeholder="e.g. Annual Sports">
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label fw-bold text-dark">ব্যবহারের স্থান (Type)</label>
                            <select class="form-select" name="type">
                                <option value="photo" selected>🖼️ ফটো গ্যালারি (Photo Only)</option>
                                <option value="both">✨ উভয় গ্যালারি (Photo & Video)</option>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">বন্ধ করুন</button>
                    <button type="button" id="saveQuickPhotoCatBtn" class="btn btn-success btn-sm fw-bold">
                        <i class="bi bi-check2-circle me-1"></i>সংরক্ষণ করুন
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('admin_script')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const saveBtn = document.getElementById('saveQuickPhotoCatBtn');
    const form = document.getElementById('quickPhotoCatForm');
    const alertBox = document.getElementById('quickCatModalAlert');
    const catSelect = document.getElementById('photoCategorySelect');
    const modalEl = document.getElementById('quickAddPhotoCategoryModal');

    saveBtn.addEventListener('click', function() {
        alertBox.classList.add('d-none');
        const nameBn = document.getElementById('quickCatNameBn').value.trim();
        if (!nameBn) {
            alertBox.textContent = 'দয়া করে ক্যাটাগরির বাংলা নাম লিখুন।';
            alertBox.classList.remove('d-none');
            return;
        }

        saveBtn.disabled = true;
        saveBtn.innerHTML = '<i class="bi bi-hourglass-split me-1"></i>সংরক্ষণ হচ্ছে...';

        const formData = new FormData(form);

        fetch("{{ route('gallery.categories.quick_store') }}", {
            method: 'POST',
            body: formData,
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
        .then(res => res.json())
        .then(data => {
            saveBtn.disabled = false;
            saveBtn.innerHTML = '<i class="bi bi-check2-circle me-1"></i>সংরক্ষণ করুন';

            if (data.success && data.category) {
                // Add new option to select dropdown
                const opt = document.createElement('option');
                opt.value = data.category.id;
                opt.textContent = data.category.name_bn + (data.category.name_en ? ' (' + data.category.name_en + ')' : '');
                opt.selected = true;
                catSelect.appendChild(opt);

                // Close modal
                const modal = bootstrap.Modal.getInstance(modalEl) || new bootstrap.Modal(modalEl);
                modal.hide();
                form.reset();
            } else {
                alertBox.textContent = data.message || 'সংরক্ষণ ব্যর্থ হয়েছে।';
                alertBox.classList.remove('d-none');
            }
        })
        .catch(err => {
            saveBtn.disabled = false;
            saveBtn.innerHTML = '<i class="bi bi-check2-circle me-1"></i>সংরক্ষণ করুন';
            alertBox.textContent = 'সার্ভারে সমস্যা হয়েছে। আবার চেষ্টা করুন।';
            alertBox.classList.remove('d-none');
        });
    });
});
</script>
@endpush
