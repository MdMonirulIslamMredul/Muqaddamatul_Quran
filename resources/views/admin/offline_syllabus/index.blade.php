@extends('admin.master')

@section('body')
<div class="container-fluid mt-3 mb-5">

    <!-- Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="fw-bold mb-1" style="color: #1b4332;">
                <i class="bi bi-journal-text text-success me-2"></i>অফলাইন সিলেবাস ব্যবস্থাপনা (Offline Syllabus)
            </h4>
            <small class="text-muted">মাদ্রাসার অফলাইন ও রেগুলার ক্লাসের বিষয়ভিত্তিক সিলেবাস ও পাঠ্যসূচি তৈরি, এডিট ও ডকুমেন্ট আপলোড করুন</small>
        </div>
        <a href="{{ route('admin.offline-syllabi.create') }}" class="btn btn-success btn-sm fw-bold shadow-sm px-3 py-2">
            <i class="bi bi-plus-circle me-1"></i> নতুন সিলেবাস যুক্ত করুন (Add Syllabus)
        </a>
    </div>

    <!-- Flash Alert -->
    @if(session('message'))
        <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
            <i class="bi bi-check-circle-fill me-2"></i>{{ session('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Stat Cards -->
    <div class="row g-3 mb-4">
        <div class="col-md-6 col-lg-3">
            <div class="card border-0 shadow-sm rounded-3" style="background: linear-gradient(135deg, #15803d, #16a34a); color: white;">
                <div class="card-body p-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <span class="font-12 text-uppercase fw-bold text-white" style="opacity: 0.9;">সর্বমোট সিলেবাস</span>
                            <h3 class="mb-0 fw-bold mt-1 text-white">{{ $totalCount }}</h3>
                        </div>
                        <div class="p-3 rounded-circle d-flex align-items-center justify-content-center" style="background: rgba(255,255,255,0.22); width: 50px; height: 50px;">
                            <i class="bi bi-journal-bookmark font-24 text-white"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="card border-0 shadow-sm rounded-3" style="background: linear-gradient(135deg, #0284c7, #38bdf8); color: white;">
                <div class="card-body p-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <span class="font-12 text-uppercase fw-bold text-white" style="opacity: 0.9;">সক্রিয় সিলেবাস</span>
                            <h3 class="mb-0 fw-bold mt-1 text-white">{{ $activeCount }}</h3>
                        </div>
                        <div class="p-3 rounded-circle d-flex align-items-center justify-content-center" style="background: rgba(255,255,255,0.22); width: 50px; height: 50px;">
                            <i class="bi bi-check2-circle font-24 text-white"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-6">
            <div class="card border-0 shadow-sm rounded-3 bg-light">
                <div class="card-body p-3 d-flex align-items-center justify-content-between">
                    <div>
                        <h6 class="fw-bold mb-1 text-dark">লাইভ ওয়েবসাইট প্রিভিউ</h6>
                        <small class="text-muted">পাবলিক ফ্রন্টএন্ডে সিলেবাস পাতাটি যেভাবে প্রদর্শিত হচ্ছে দেখুন</small>
                    </div>
                    <a href="{{ route('online_program.offline_syllabus') }}" target="_blank" class="btn btn-outline-success btn-sm fw-bold">
                        <i class="bi bi-box-arrow-up-right me-1"></i> পাতা দেখুন (View Page)
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Filter & Search Bar -->
    <div class="card border shadow-sm rounded-3 mb-4">
        <div class="card-body p-3">
            <form action="{{ route('admin.offline-syllabi.index') }}" method="GET" class="row g-2 align-items-center">
                <div class="col-md-6">
                    <div class="input-group">
                        <span class="input-group-text bg-white"><i class="bi bi-search text-muted"></i></span>
                        <input type="text" name="search" value="{{ request('search') }}" class="form-control" placeholder="সিলেবাস শিরোনাম বা বিবরণ দিয়ে সার্চ করুন...">
                    </div>
                </div>
                <div class="col-md-4">
                    <select name="status" class="form-select">
                        <option value="all" {{ request('status') === 'all' ? 'selected' : '' }}>সকল স্ট্যাটাস (All)</option>
                        <option value="1" {{ request('status') === '1' ? 'selected' : '' }}>সক্রিয় (Active)</option>
                        <option value="0" {{ request('status') === '0' ? 'selected' : '' }}>নিষ্ক্রিয় (Inactive)</option>
                    </select>
                </div>
                <div class="col-md-2 d-flex gap-2">
                    <button type="submit" class="btn btn-success w-100 fw-bold" style="background-color: #1b4332; border-color: #1b4332;">সার্চ</button>
                    @if(request()->hasAny(['search', 'status']))
                        <a href="{{ route('admin.offline-syllabi.index') }}" class="btn btn-light" title="রিসেট"><i class="bi bi-arrow-counterclockwise"></i></a>
                    @endif
                </div>
            </form>
        </div>
    </div>

    <!-- Syllabi Table -->
    <div class="card border shadow-sm rounded-3">
        <div class="card-header bg-white py-3 border-bottom d-flex justify-content-between align-items-center">
            <h5 class="card-title mb-0 fw-bold text-dark">
                <i class="bi bi-table me-2 text-success"></i>সিলেবাস তালিকা (Syllabus List)
            </h5>
            <span class="badge bg-light text-dark border">মোট {{ $syllabi->total() }} টি</span>
        </div>
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th style="width: 60px;" class="text-center">ক্রম</th>
                        <th>শিরোনাম (Title)</th>
                        <th>সংযুক্তি (Documents)</th>
                        <th style="width: 100px;" class="text-center">সিরিয়াল</th>
                        <th style="width: 120px;" class="text-center">স্ট্যাটাস</th>
                        <th style="width: 150px;" class="text-center">অ্যাকশন</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($syllabi as $item)
                        <tr>
                            <td class="text-center fw-semibold text-muted">{{ $loop->iteration + ($syllabi->currentPage() - 1) * $syllabi->perPage() }}</td>
                            <td>
                                <div class="fw-bold text-dark font-15">{{ $item->title_bn ?: $item->title }}</div>
                                @if($item->title && $item->title !== $item->title_bn)
                                    <div class="text-muted small">{{ $item->title }}</div>
                                @endif
                                @if($item->title_ar)
                                    <div class="text-dark small font-monospace" dir="rtl" style="color: #334155;">{{ $item->title_ar }}</div>
                                @endif
                            </td>
                            <td>
                                <div class="d-flex flex-column gap-1">
                                    {{-- Document 1 --}}
                                    @if($item->document_one)
                                        <a href="{{ asset($item->document_one) }}" target="_blank" class="badge py-1 px-2 text-start d-inline-flex align-items-center text-decoration-none shadow-sm" style="background-color: #e0f2fe; color: #0369a1 !important; border: 1px solid #bae6fd; width: fit-content;">
                                            @if($item->isDocOnePdf())
                                                <i class="bi bi-file-earmark-pdf text-danger me-1 font-14"></i>
                                            @else
                                                <i class="bi bi-file-earmark-image text-success me-1 font-14"></i>
                                            @endif
                                            <span>{{ $item->document_one_title ?: 'ডকুমেন্ট ১' }}</span>
                                        </a>
                                    @else
                                        <span class="badge bg-light text-muted border py-1 px-2 text-start d-inline-flex align-items-center" style="width: fit-content;">
                                            <i class="bi bi-dash-circle me-1"></i> ডকুমেন্ট ১: নেই
                                        </span>
                                    @endif

                                    {{-- Document 2 --}}
                                    @if($item->document_two)
                                        <a href="{{ asset($item->document_two) }}" target="_blank" class="badge py-1 px-2 text-start d-inline-flex align-items-center text-decoration-none shadow-sm" style="background-color: #e0f7fa; color: #00796b !important; border: 1px solid #b2ebf2; width: fit-content;">
                                            @if($item->isDocTwoPdf())
                                                <i class="bi bi-file-earmark-pdf text-danger me-1 font-14"></i>
                                            @else
                                                <i class="bi bi-file-earmark-image text-success me-1 font-14"></i>
                                            @endif
                                            <span>{{ $item->document_two_title ?: 'ডকুমেন্ট ২' }}</span>
                                        </a>
                                    @else
                                        <span class="badge bg-light text-muted border py-1 px-2 text-start d-inline-flex align-items-center" style="width: fit-content;">
                                            <i class="bi bi-dash-circle me-1"></i> ডকুমেন্ট ২: নেই
                                        </span>
                                    @endif
                                </div>
                            </td>
                            <td class="text-center fw-bold text-dark">
                                <span class="badge bg-light text-dark border">{{ $item->sort_order }}</span>
                            </td>
                            <td class="text-center">
                                <form action="{{ route('admin.offline-syllabi.status', $item->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @if($item->status)
                                        <button type="submit" class="btn btn-sm btn-success py-1 px-2 fw-semibold" title="ক্লিক করে নিষ্ক্রিয় করুন">
                                            <i class="bi bi-check-circle me-1"></i>সক্রিয়
                                        </button>
                                    @else
                                        <button type="submit" class="btn btn-sm btn-secondary py-1 px-2 fw-semibold" title="ক্লিক করে সক্রিয় করুন">
                                            <i class="bi bi-x-circle me-1"></i>নিষ্ক্রিয়
                                        </button>
                                    @endif
                                </form>
                            </td>
                            <td class="text-center">
                                <div class="btn-group btn-group-sm">
                                    <a href="{{ route('admin.offline-syllabi.edit', $item->id) }}" class="btn btn-outline-primary" title="এডিট করুন">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                    <form action="{{ route('admin.offline-syllabi.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('আপনি কি নিশ্চিত এই সিলেবাসটি মুছে ফেলতে চান?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger" title="মুছে ফেলুন">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-5 text-muted">
                                <i class="bi bi-journal-x font-36 d-block mb-2 text-secondary"></i>
                                কোনো অফলাইন সিলেবাস পাওয়া যায়নি।
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($syllabi->hasPages())
            <div class="card-footer bg-white py-3">
                {{ $syllabi->links() }}
            </div>
        @endif
    </div>

</div>
@endsection
