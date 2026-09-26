@extends('admin.master')

@section('body')
<div class="container-fluid mt-3 mb-5">

    <!-- Messages -->
    @if(session('message'))
        <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert" style="background-color: #d1e7dd; color: #0f5132; border-color: #badbcc;">
            <i class="bi bi-check-circle-fill me-2"></i> {{ session('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Statistics Cards -->
    <div class="row g-2 g-md-3 mb-4">
        <div class="col-6 col-lg-3">
            <div class="card border-0 shadow-sm rounded-3 p-2 p-md-3 h-100" style="background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%); color: #ffffff;">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="pe-1 pe-md-2 overflow-hidden">
                        <span class="d-block text-white-50 small fw-bold text-truncate" style="font-size: 11px;">মোট নোটিশ (Total)</span>
                        <h3 class="mb-0 fw-bold text-white mt-1" style="font-size: clamp(1.2rem, 3.5vw, 1.75rem);">{{ $totalNotices }}</h3>
                    </div>
                    <div class="flex-shrink-0 text-white-50 ms-auto" style="font-size: clamp(22px, 3.5vw, 36px);"><i class="bi bi-megaphone-fill"></i></div>
                </div>
            </div>
        </div>
        <div class="col-6 col-lg-3">
            <div class="card border-0 shadow-sm rounded-3 p-2 p-md-3 h-100" style="background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%); color: #ffffff;">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="pe-1 pe-md-2 overflow-hidden">
                        <span class="d-block text-white-50 small fw-bold text-truncate" style="font-size: 11px;">সক্রিয় নোটিশ (Active)</span>
                        <h3 class="mb-0 fw-bold text-white mt-1" style="font-size: clamp(1.2rem, 3.5vw, 1.75rem);">{{ $activeNotices }}</h3>
                    </div>
                    <div class="flex-shrink-0 text-white-50 ms-auto" style="font-size: clamp(22px, 3.5vw, 36px);"><i class="bi bi-check-circle-fill"></i></div>
                </div>
            </div>
        </div>
        <div class="col-6 col-lg-3">
            <div class="card border-0 shadow-sm rounded-3 p-2 p-md-3 h-100" style="background: linear-gradient(135deg, #ff416c 0%, #ff4b2b 100%); color: #ffffff;">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="pe-1 pe-md-2 overflow-hidden">
                        <span class="d-block text-white-50 small fw-bold text-truncate" style="font-size: 11px;">পিন নোটিশ (Pinned)</span>
                        <h3 class="mb-0 fw-bold text-white mt-1" style="font-size: clamp(1.2rem, 3.5vw, 1.75rem);">{{ $pinnedNotices }}</h3>
                    </div>
                    <div class="flex-shrink-0 text-white-50 ms-auto" style="font-size: clamp(22px, 3.5vw, 36px);"><i class="bi bi-pin-angle-fill"></i></div>
                </div>
            </div>
        </div>
        <div class="col-6 col-lg-3">
            <div class="card border-0 shadow-sm rounded-3 p-2 p-md-3 h-100" style="background: linear-gradient(135deg, #f5af19 0%, #e65c00 100%); color: #ffffff;">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="pe-1 pe-md-2 overflow-hidden">
                        <span class="d-block text-white-50 small fw-bold text-truncate" style="font-size: 11px;">টিকারে চলমান (Ticker)</span>
                        <h3 class="mb-0 fw-bold text-white mt-1" style="font-size: clamp(1.2rem, 3.5vw, 1.75rem);">{{ $tickerNotices }}</h3>
                    </div>
                    <div class="flex-shrink-0 text-white-50 ms-auto" style="font-size: clamp(22px, 3.5vw, 36px);"><i class="bi bi-broadcast"></i></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Notice Table Card -->
    <div class="card border shadow-sm rounded-3">
        <div class="card-header bg-white py-3 d-flex flex-wrap justify-content-between align-items-center border-bottom gap-2">
            <div>
                <h4 class="card-title mb-0 fw-bold" style="color: #1b4332;">
                    <i class="bi bi-megaphone text-success me-2"></i>নোটিশ ও বিজ্ঞপ্তি ব্যবস্থাপনা (Notice Management)
                </h4>
                <small class="text-secondary">মাদ্রাসার সাধারণ, ভর্তি, পরীক্ষা, ছুটি ও অন্যান্য নোটিশ পরিচালনা করুন</small>
            </div>
            <div class="d-flex gap-2">
                <a href="{{ route('frontend.notices.index') }}" target="_blank" class="btn btn-outline-success btn-sm fw-bold shadow-sm">
                    <i class="bi bi-globe me-1"></i> পাবলিক নোটিশ বোর্ড
                </a>
                <a href="{{ route('notices.create') }}" class="btn btn-success btn-sm fw-bold shadow-sm text-white" style="background-color: #1b4332; border-color: #1b4332;">
                    <i class="bi bi-plus-lg me-1"></i> নতুন নোটিশ প্রকাশ করুন
                </a>
            </div>
        </div>

        <!-- Filter & Search Form -->
        <div class="card-body border-bottom py-3" style="background-color: #f8f9fa;">
            <form action="{{ route('notices.index') }}" method="GET">
                <div class="row g-2 align-items-center">
                    <div class="col-md-3">
                        <div class="input-group input-group-sm">
                            <span class="input-group-text bg-white"><i class="bi bi-search"></i></span>
                            <input type="text" name="search" class="form-control" placeholder="শিরোনাম, স্মারক নং বা বিবরণ..." value="{{ request('search') }}" style="color: #212529; font-weight: 500;">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <select name="category" class="form-select form-select-sm">
                            <option value="">-- সকল ক্যাটাগরি --</option>
                            @foreach($categoriesList as $catKey => $cat)
                                <option value="{{ $catKey }}" {{ request('category') == $catKey ? 'selected' : '' }}>
                                    {{ $cat['bn'] }} ({{ $cat['en'] }})
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2">
                        <select name="status" class="form-select form-select-sm">
                            <option value="">-- সকল স্ট্যাটাস --</option>
                            <option value="1" {{ request('status') === '1' ? 'selected' : '' }}>সক্রিয় (Active)</option>
                            <option value="0" {{ request('status') === '0' ? 'selected' : '' }}>নিষ্ক্রিয় (Inactive)</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <select name="pinned" class="form-select form-select-sm">
                            <option value="">-- পিন স্ট্যাটাস --</option>
                            <option value="1" {{ request('pinned') === '1' ? 'selected' : '' }}>পিন করা (Pinned)</option>
                            <option value="0" {{ request('pinned') === '0' ? 'selected' : '' }}>সাধারণ (Regular)</option>
                        </select>
                    </div>
                    <div class="col-md-3 d-flex gap-2">
                        <button type="submit" class="btn btn-sm btn-primary flex-fill fw-bold" style="background-color: #2d6a4f; border-color: #2d6a4f;">
                            <i class="bi bi-funnel me-1"></i> ফিল্টার
                        </button>
                        <a href="{{ route('notices.index') }}" class="btn btn-sm btn-outline-secondary" title="রিসেট">
                            <i class="bi bi-arrow-counterclockwise"></i>
                        </a>
                    </div>
                </div>
            </form>
        </div>

        <!-- Table -->
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light text-secondary small text-uppercase fw-bold" style="background-color: #edf2f7;">
                        <tr>
                            <th class="ps-3" style="width: 50px;">ক্রম</th>
                            <th>স্মারক নং ও ক্যাটাগরি</th>
                            <th>নোটিশের শিরোনাম</th>
                            <th>প্রকাশের তারিখ</th>
                            <th>ফাইল</th>
                            <th class="text-center">টিকারে প্রদর্শন</th>
                            <th class="text-center">পিন</th>
                            <th class="text-center">স্ট্যাটাস</th>
                            <th class="text-end pe-3" style="width: 140px;">একশন</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($notices as $key => $notice)
                            <tr class="{{ $notice->is_pinned ? 'table-warning-subtle' : '' }}" style="{{ $notice->is_pinned ? 'background-color: #fffbeb;' : '' }}">
                                <td class="ps-3 fw-bold text-muted">
                                    {{ $notices->firstItem() + $key }}
                                </td>
                                <td>
                                    <div class="d-flex flex-column gap-1">
                                        <span class="badge {{ $notice->category_badge }} px-2 py-1" style="font-size: 11px; width: fit-content;">
                                            {{ $notice->category_name }}
                                        </span>
                                        <small class="text-muted fw-bold font-monospace" style="font-size: 11px;">
                                            {{ $notice->notice_no ?: 'N/A' }}
                                        </small>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex flex-column">
                                        <a href="{{ route('notices.show', $notice->id) }}" class="fw-bold text-decoration-none text-dark hover-primary" style="font-size: 14px;">
                                            {{ $notice->title_bn ?: $notice->title }}
                                        </a>
                                        @if($notice->title && $notice->title_bn && $notice->title !== $notice->title_bn)
                                            <small class="text-muted" style="font-size: 12px;">{{ $notice->title }}</small>
                                        @endif
                                        <div class="d-flex gap-2 align-items-center mt-1">
                                            <small class="text-muted" style="font-size: 11px;">
                                                <i class="bi bi-eye text-secondary me-1"></i>{{ $notice->views_count }} বার পঠিত
                                            </small>
                                            @if($notice->expire_date)
                                                <small class="text-danger" style="font-size: 11px;">
                                                    <i class="bi bi-clock-history me-1"></i>মেয়াদ: {{ \Carbon\Carbon::parse($notice->expire_date)->format('d M, Y') }}
                                                </small>
                                            @endif
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex flex-column">
                                        <span class="fw-bold text-dark" style="font-size: 13px;">
                                            <i class="bi bi-calendar3 text-success me-1"></i>
                                            {{ \Carbon\Carbon::parse($notice->publish_date)->format('d M, Y') }}
                                        </span>
                                        <small class="text-muted" style="font-size: 11px;">
                                            {{ \Carbon\Carbon::parse($notice->publish_date)->diffForHumans() }}
                                        </small>
                                    </div>
                                </td>
                                <td>
                                    @if($notice->pdf_file)
                                        <div class="d-flex align-items-center gap-1">
                                            <a href="{{ asset($notice->pdf_file) }}" target="_blank" class="btn btn-sm btn-outline-danger py-0 px-2 fw-bold" style="font-size: 11px;" title="ফাইল দেখুন">
                                                <i class="bi bi-file-earmark-pdf-fill me-1"></i>{{ strtoupper($notice->file_type ?: 'FILE') }}
                                            </a>
                                            @if($notice->file_size)
                                                <small class="text-muted" style="font-size: 10px;">{{ $notice->file_size }}</small>
                                            @endif
                                        </div>
                                    @else
                                        <span class="text-muted small">ফাইল নেই</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <form action="{{ route('notices.toggle-ticker', $notice->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        <button type="submit" class="btn btn-sm py-0 px-2 {{ $notice->is_ticker ? 'btn-outline-warning text-dark fw-bold' : 'btn-outline-secondary' }}" style="font-size: 11px;" title="টিকার প্রদর্শন পরিবর্তন">
                                            @if($notice->is_ticker)
                                                <i class="bi bi-broadcast text-warning me-1"></i>অন
                                            @else
                                                <i class="bi bi-slash-circle me-1"></i>অফ
                                            @endif
                                        </button>
                                    </form>
                                </td>
                                <td class="text-center">
                                    <form action="{{ route('notices.toggle-pinned', $notice->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        <button type="submit" class="btn btn-sm py-0 px-2 {{ $notice->is_pinned ? 'btn-danger fw-bold' : 'btn-outline-secondary' }}" style="font-size: 11px;" title="পিন স্ট্যাটাস পরিবর্তন">
                                            <i class="bi bi-pin-angle-fill me-1"></i>{{ $notice->is_pinned ? 'পিন্ড' : 'সাধারণ' }}
                                        </button>
                                    </form>
                                </td>
                                <td class="text-center">
                                    <form action="{{ route('notices.toggle-status', $notice->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        <button type="submit" class="btn btn-sm py-0 px-2 {{ $notice->status ? 'btn-success' : 'btn-secondary' }}" style="font-size: 11px;" title="স্ট্যাটাস পরিবর্তন">
                                            {{ $notice->status ? 'সক্রিয়' : 'নিষ্ক্রিয়' }}
                                        </button>
                                    </form>
                                </td>
                                <td class="text-end pe-3">
                                    <div class="btn-group btn-group-sm">
                                        <a href="{{ route('notices.show', $notice->id) }}" class="btn btn-outline-info" title="বিস্তারিত দেখুন">
                                            <i class="bi bi-eye"></i>
                                        </a>
                                        <a href="{{ route('notices.edit', $notice->id) }}" class="btn btn-outline-primary" title="সম্পাদনা">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                        <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $notice->id }}" title="মুছে ফেলুন">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </div>

                                    <!-- Delete Modal -->
                                    <div class="modal fade text-start" id="deleteModal{{ $notice->id }}" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header bg-danger text-white">
                                                    <h5 class="modal-title"><i class="bi bi-exclamation-triangle-fill me-2"></i>নোটিশ মুছে ফেলার নিশ্চিতকরণ</h5>
                                                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p class="mb-2">আপনি কি নিশ্চিত যে আপনি এই নোটিশটি মুছে ফেলতে চান?</p>
                                                    <div class="alert alert-light border p-2 mb-0">
                                                        <strong>{{ $notice->title_bn ?: $notice->title }}</strong>
                                                        <br><small class="text-muted">স্মারক নং: {{ $notice->notice_no }}</small>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">বাতিল</button>
                                                    <form action="{{ route('notices.destroy', $notice->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger">হ্যাঁ, মুছে ফেলুন</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9" class="text-center py-5 text-muted">
                                    <i class="bi bi-megaphone-slash" style="font-size: 40px;"></i>
                                    <p class="mt-2 mb-1 fw-bold">কোনো নোটিশ পাওয়া যায়নি</p>
                                    <small>নতুন নোটিশ যুক্ত করতে উপরের "নতুন নোটিশ প্রকাশ করুন" বাটনে ক্লিক করুন।</small>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        @if($notices->hasPages())
            <div class="card-footer bg-white py-3 border-top d-flex justify-content-between align-items-center">
                <small class="text-muted">
                    মোট {{ $notices->total() }} টির মধ্যে {{ $notices->firstItem() }} - {{ $notices->lastItem() }} টি দেখানো হচ্ছে
                </small>
                <div>
                    {{ $notices->links() }}
                </div>
            </div>
        @endif
    </div>

</div>
@endsection
