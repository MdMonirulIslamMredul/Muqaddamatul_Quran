@extends('admin.master')
@section('title', ' - গ্যালারি ক্যাটাগরি')
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

        @if(isset($errors) && $errors->any())
            <div class="alert alert-danger alert-dismissible fade show shadow-sm" role="alert">
                <ul class="mb-0">
                    @foreach($errors->all() as $err)
                        <li>{{ $err }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- Top Header & Navigation -->
        <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-2">
            <div>
                <h4 class="fw-bold mb-1" style="color: #1b4332;">
                    <i class="bi bi-tags-fill text-success me-2"></i>গ্যালারি ক্যাটাগরি ব্যবস্থাপনা (Gallery Categories)
                </h4>
                <p class="text-muted small mb-0">ফটো ও ভিডিও গ্যালারির জন্য ক্যাটাগরি তৈরি এবং পরিচালনা করুন</p>
            </div>
            <div class="d-flex gap-2">
                <a href="{{ route('add.gallery') }}" class="btn btn-outline-success btn-sm fw-bold">
                    <i class="bi bi-images me-1"></i> ফটো গ্যালারি
                </a>
                <a href="{{ route('add.video.gallery') }}" class="btn btn-outline-danger btn-sm fw-bold">
                    <i class="bi bi-film me-1"></i> ভিডিও গ্যালারি
                </a>
            </div>
        </div>

        <!-- Filter Tabs -->
        <div class="card border shadow-sm rounded-3 mb-4">
            <div class="card-body p-2">
                <ul class="nav nav-pills">
                    <li class="nav-item">
                        <a class="nav-link {{ $currentType == 'all' ? 'active' : '' }}" href="{{ route('gallery.categories.index', ['type' => 'all']) }}">
                            <i class="bi bi-collection me-1"></i> সকল ক্যাটাগরি
                            <span class="badge bg-light text-dark ms-1">{{ $counts['all'] }}</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ $currentType == 'photo' ? 'active' : '' }}" href="{{ route('gallery.categories.index', ['type' => 'photo']) }}">
                            <i class="bi bi-images me-1"></i> ফটো ক্যাটাগরি
                            <span class="badge bg-light text-dark ms-1">{{ $counts['photo'] }}</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ $currentType == 'video' ? 'active' : '' }}" href="{{ route('gallery.categories.index', ['type' => 'video']) }}">
                            <i class="bi bi-play-btn me-1"></i> ভিডিও ক্যাটাগরি
                            <span class="badge bg-light text-dark ms-1">{{ $counts['video'] }}</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="row g-4">
            <!-- Left Column: Add / Edit Form -->
            <div class="col-lg-5">
                <div class="card border shadow-sm rounded-3">
                    <div class="card-header bg-white py-3 border-bottom d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0 fw-bold" style="color: #1b4332;">
                            @if(isset($category))
                                <i class="bi bi-pencil-square text-warning me-2"></i>ক্যাটাগরি সম্পাদনা (Edit Category)
                            @else
                                <i class="bi bi-plus-circle text-success me-2"></i>নতুন ক্যাটাগরি যুক্ত করুন (Add Category)
                            @endif
                        </h5>
                        @if(isset($category))
                            <a href="{{ route('gallery.categories.index', ['type' => $currentType]) }}" class="btn btn-outline-secondary btn-sm">
                                <i class="bi bi-x-circle me-1"></i> বাতিল
                            </a>
                        @endif
                    </div>
                    <div class="card-body p-3">
                        <form action="{{ isset($category) ? route('gallery.categories.update', ['id' => $category->id]) : route('gallery.categories.store') }}" method="POST">
                            @csrf

                            <!-- Name BN -->
                            <div class="form-group mb-3">
                                <label class="form-label fw-bold text-dark">
                                    ক্যাটাগরির নাম (বাংলা) <span class="text-danger">*</span>
                                </label>
                                <input type="text" name="name_bn" class="form-control" placeholder="যেমনঃ বার্ষিক মাহফিল ও পুরস্কার বিতরণী" value="{{ old('name_bn', isset($category) ? $category->name_bn : '') }}" required>
                            </div>

                            <!-- Name EN -->
                            <div class="form-group mb-3">
                                <label class="form-label fw-bold text-dark">
                                    ক্যাটাগরির নাম (English - ঐচ্ছিক)
                                </label>
                                <input type="text" name="name_en" class="form-control" placeholder="e.g. Annual Mahfil & Prize Giving" value="{{ old('name_en', isset($category) ? $category->name_en : '') }}">
                            </div>

                            <!-- Category Type -->
                            <div class="form-group mb-3">
                                <label class="form-label fw-bold text-dark">
                                    ক্যাটাগরির ধরণ (Category Type) <span class="text-danger">*</span>
                                </label>
                                <select class="form-select" name="type" required>
                                    @php
                                        $selectedType = old('type', isset($category) ? $category->type : ($currentType != 'all' ? $currentType : 'photo'));
                                    @endphp
                                    <option value="photo" {{ $selectedType == 'photo' ? 'selected' : '' }}>🖼️ শুধু ফটো গ্যালারি (Photo Only)</option>
                                    <option value="video" {{ $selectedType == 'video' ? 'selected' : '' }}>🎥 শুধু ভিডিও গ্যালারি (Video Only)</option>
                                    <option value="both" {{ $selectedType == 'both' ? 'selected' : '' }}>✨ উভয় গ্যালারির জন্য (Both Photo & Video)</option>
                                </select>
                                <small class="text-muted font-11 d-block mt-1">এই ক্যাটাগরিটি কোথায় ব্যবহার করতে চান তা নির্বাচন করুন</small>
                            </div>

                            <div class="row g-2">
                                <!-- Order Level -->
                                <div class="col-md-6 form-group mb-3">
                                    <label class="form-label fw-bold text-dark">ক্রম (Order Level)</label>
                                    <input type="number" name="order_level" class="form-control" placeholder="0" value="{{ old('order_level', isset($category) ? $category->order_level : 0) }}">
                                </div>

                                <!-- Status -->
                                <div class="col-md-6 form-group mb-3">
                                    <label class="form-label fw-bold text-dark">স্ট্যাটাস (Status)</label>
                                    <select class="form-select" name="status">
                                        <option value="1" {{ old('status', isset($category) ? $category->status : 1) == 1 ? 'selected' : '' }}>সক্রিয় (Active)</option>
                                        <option value="0" {{ old('status', isset($category) ? $category->status : 1) === 0 ? 'selected' : '' }}>নিষ্ক্রিয় (Inactive)</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Description -->
                            <div class="form-group mb-3">
                                <label class="form-label fw-bold text-dark">বিবরণ (Description - ঐচ্ছিক)</label>
                                <textarea name="description" class="form-control" rows="2" placeholder="ক্যাটাগরি সম্পর্কিত সংক্ষিপ্ত নোট...">{{ old('description', isset($category) ? $category->description : '') }}</textarea>
                            </div>

                            <div class="d-grid mt-4 pt-2 border-top">
                                <button type="submit" class="btn fw-bold text-white shadow-sm" style="background-color: #1b4332;">
                                    <i class="bi bi-save me-1"></i> {{ isset($category) ? 'ক্যাটাগরি হালনাগাদ করুন' : 'ক্যাটাগরি সংরক্ষণ করুন' }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Right Column: Category List -->
            <div class="col-lg-7">
                <div class="card border shadow-sm rounded-3">
                    <div class="card-header bg-white py-3 border-bottom d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0 fw-bold" style="color: #1b4332;">
                            <i class="bi bi-list-stars text-primary me-2"></i>ক্যাটাগরি তালিকা (Category List - {{ $categories->total() }})
                        </h5>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover align-middle mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th style="width: 50px;">#</th>
                                        <th>ক্যাটাগরির নাম</th>
                                        <th style="width: 120px;">ধরণ (Type)</th>
                                        <th style="width: 110px;">আইটেম সংখ্যা</th>
                                        <th style="width: 80px;">স্ট্যাটাস</th>
                                        <th style="width: 110px;" class="text-center">অ্যাকশন</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($categories as $cat)
                                        <tr class="{{ isset($category) && $category->id == $cat->id ? 'table-warning' : '' }}">
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                <h6 class="fw-bold mb-0 text-dark font-14">{{ $cat->name_bn }}</h6>
                                                @if($cat->name_en)
                                                    <small class="text-muted font-11">{{ $cat->name_en }}</small>
                                                @endif
                                            </td>
                                            <td>
                                                @if($cat->type == 'photo')
                                                    <span class="badge bg-success bg-opacity-10 text-success border border-success">
                                                        <i class="bi bi-image me-1"></i> ফটো
                                                    </span>
                                                @elseif($cat->type == 'video')
                                                    <span class="badge bg-danger bg-opacity-10 text-danger border border-danger">
                                                        <i class="bi bi-film me-1"></i> ভিডিও
                                                    </span>
                                                @else
                                                    <span class="badge bg-primary bg-opacity-10 text-primary border border-primary">
                                                        <i class="bi bi-grid-fill me-1"></i> উভয় (Both)
                                                    </span>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="d-flex flex-column font-11">
                                                    @if(in_array($cat->type, ['photo', 'both']))
                                                        <span><i class="bi bi-images text-success me-1"></i>{{ $cat->galleries_count }} ছবি</span>
                                                    @endif
                                                    @if(in_array($cat->type, ['video', 'both']))
                                                        <span><i class="bi bi-play-circle text-danger me-1"></i>{{ $cat->video_galleries_count }} ভিডিও</span>
                                                    @endif
                                                </div>
                                            </td>
                                            <td>
                                                @if($cat->status == 1)
                                                    <span class="badge bg-success">সক্রিয়</span>
                                                @else
                                                    <span class="badge bg-secondary">নিষ্ক্রিয়</span>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                <div class="d-inline-flex gap-1">
                                                    <a href="{{ route('gallery.categories.edit', ['id' => $cat->id, 'type' => $currentType]) }}" class="btn btn-warning btn-sm text-dark" title="সম্পাদনা">
                                                        <i class="bi bi-pencil"></i>
                                                    </a>
                                                    <a href="{{ route('gallery.categories.destroy', ['id' => $cat->id]) }}" class="btn btn-danger btn-sm" onclick="return confirm('আপনি কি নিশ্চিতভাবে এই ক্যাটাগরিটি মুছে ফেলতে চান? যুক্ত থাকা ছবি/ভিডিও মুছে যাবে না, সেগুলো ক্যাটাগরিহীন থাকবে।')" title="মুছুন">
                                                        <i class="bi bi-trash"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center py-4 text-muted">
                                                <i class="bi bi-folder2-open fa-2x d-block mb-2 text-secondary"></i>
                                                বর্তমানে কোনো ক্যাটাগরি তৈরি করা নেই।
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                        @if($categories->hasPages())
                            <div class="p-3 border-top d-flex justify-content-end">
                                {{ $categories->appends(['type' => $currentType])->links() }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
