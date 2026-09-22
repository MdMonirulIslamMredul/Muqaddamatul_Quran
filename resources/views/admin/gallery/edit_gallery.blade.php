@extends('admin.master')
@section('body')
    <div class="container-fluid mt-3 mb-5">

        @if(session('message'))
            <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
                <i class="bi bi-check-circle-fill me-2"></i>{{ session('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="card border shadow-sm rounded-3">
            <div class="card-header bg-white py-3 border-bottom d-flex justify-content-between align-items-center">
                <div>
                    <h4 class="card-title mb-0 fw-bold" style="color: #1b4332;">
                        <i class="bi bi-pencil-square text-warning me-2"></i>গ্যালারির ছবি সম্পাদনা (Edit Gallery Photo)
                    </h4>
                    <small class="text-secondary">ছবির শিরোনাম, বিবরণ ও প্রদর্শন স্ট্যাটাস পরিবর্তন করুন</small>
                </div>
                <div>
                    <a href="{{ route('add.gallery') }}" class="btn btn-outline-secondary btn-sm fw-bold shadow-sm">
                        <i class="bi bi-arrow-left me-1"></i> তালিকায় ফিরে যান
                    </a>
                </div>
            </div>

            <div class="card-body p-4" style="color: #212529;">
                <form action="{{ route('update.gallery') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" value="{{ $gallery->id }}" name="id">

                    <div class="row g-3">
                        <!-- Photo Title -->
                        <div class="col-md-5 form-group">
                            <label class="form-label fw-bold text-dark">ছবির শিরোনাম / ক্যাপশন (Photo Title)</label>
                            <input type="text" name="title" class="form-control" placeholder="যেমনঃ বার্ষিক ক্রীড়া প্রতিযোগিতা" value="{{ old('title', $gallery->title) }}">
                            <small class="text-muted font-11 d-block mt-1" style="color: #64748b !important;">ছবির সংক্ষিপ্ত শিরোনাম বা বিষয়</small>
                        </div>

                        <!-- Photo Category -->
                        <div class="col-md-4 form-group">
                            <label class="form-label fw-bold text-dark">ফটো ক্যাটাগরি (Photo Category)</label>
                            <select class="form-select" name="category_id" style="color: #212529; font-weight: 500;">
                                <option value="">-- ক্যাটাগরি নির্বাচন করুন (ঐচ্ছিক) --</option>
                                @foreach($categories as $cat)
                                    <option value="{{ $cat->id }}" {{ old('category_id', $gallery->category_id) == $cat->id ? 'selected' : '' }}>
                                        {{ $cat->name_bn }} {{ $cat->name_en ? '('.$cat->name_en.')' : '' }}
                                    </option>
                                @endforeach
                            </select>
                            <small class="text-muted font-11 d-block mt-1" style="color: #64748b !important;">ছবিটি কোন ক্যাটাগরির অন্তর্ভুক্ত</small>
                        </div>

                        <!-- Add to Homepage -->
                        <div class="col-md-3 form-group">
                            <label class="form-label fw-bold text-dark">হোমপেজে প্রদর্শন করবেন?</label>
                            <select class="form-select" name="add_home" style="color: #212529; font-weight: 500;">
                                <option value="1" {{ old('add_home', $gallery->add_home) == 1 ? 'selected' : '' }}>হ্যাঁ (Yes - Show on Home)</option>
                                <option value="0" {{ old('add_home', $gallery->add_home) === 0 ? 'selected' : '' }}>না (No - Only in Gallery Page)</option>
                            </select>
                            <small class="text-muted font-11 d-block mt-1" style="color: #64748b !important;">হোমপেজের গ্যালারি সেকশনে দেখাতে চান কিনা</small>
                        </div>

                        <!-- Photo Description -->
                        <div class="col-md-12 form-group">
                            <label class="form-label fw-bold text-dark">ছবির বিস্তারিত বিবরণ (Photo Description - ঐচ্ছিক)</label>
                            <textarea name="description" class="form-control" rows="3" placeholder="ছবির বিস্তারিত বিবরণ বা প্রেক্ষাপট লিখুন...">{{ old('description', $gallery->description) }}</textarea>
                        </div>

                        <!-- Image File & Current Preview -->
                        <div class="col-md-8 form-group">
                            <label class="form-label fw-bold text-dark">নতুন ছবি আপলোড করুন (ছবি পরিবর্তন করতে চাইলে নির্বাচন করুন)</label>
                            <input type="file" name="image" class="form-control" accept="image/jpeg,image/png,image/jpg,image/webp">
                            <small class="text-muted font-11 d-block mt-1" style="color: #64748b !important;">ছবি পরিবর্তন না করতে চাইলে এটি ফাঁকা রাখুন (JPG, PNG, WEBP)</small>
                        </div>

                        <!-- Status -->
                        <div class="col-md-4 form-group">
                            <label class="form-label fw-bold text-dark">স্ট্যাটাস (Status)</label>
                            <select class="form-select" name="status" style="color: #212529; font-weight: 500;">
                                <option value="1" {{ old('status', $gallery->status) == 1 ? 'selected' : '' }}>সক্রিয় (Active)</option>
                                <option value="0" {{ old('status', $gallery->status) === 0 ? 'selected' : '' }}>নিষ্ক্রিয় (Inactive)</option>
                            </select>
                        </div>

                        <!-- Current Image Preview -->
                        @if($gallery->image)
                            <div class="col-md-12">
                                <label class="form-label fw-bold text-dark d-block">বর্তমানে সংযুক্ত ছবি:</label>
                                <a href="{{ asset($gallery->image) }}" target="_blank">
                                    <img src="{{ asset($gallery->image) }}" alt="{{ $gallery->title }}" class="rounded shadow-sm border p-1" style="max-height: 180px; max-width: 280px; object-fit: cover;">
                                </a>
                            </div>
                        @endif

                    </div>

                    <div class="d-flex justify-content-end gap-2 mt-4 pt-3 border-top">
                        <a href="{{ route('add.gallery') }}" class="btn btn-outline-secondary px-4 fw-bold">বাতিল</a>
                        <button type="submit" class="btn px-4 fw-bold shadow-sm text-white" style="background-color: #1b4332; border: 1px solid #1b4332;">
                            <i class="bi bi-check-lg me-1"></i> তথ্য হালনাগাদ করুন (Update Photo)
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
