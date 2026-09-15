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
        <div class="col-4 col-md-4">
            <div class="card border-0 shadow-sm rounded-3 p-2 p-md-3 h-100" style="background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%); color: #ffffff;">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="pe-1 pe-md-2 overflow-hidden">
                        <span class="d-block text-white-50 small fw-bold text-truncate" style="font-size: 11px;">মোট শিক্ষক (Total)</span>
                        <h3 class="mb-0 fw-bold text-white mt-1" style="font-size: clamp(1.2rem, 3.5vw, 1.75rem);">{{ $totalTeachers }}</h3>
                    </div>
                    <div class="flex-shrink-0 text-white-50 ms-auto" style="font-size: clamp(20px, 3vw, 36px);"><i class="bi bi-people-fill"></i></div>
                </div>
            </div>
        </div>
        <div class="col-4 col-md-4">
            <div class="card border-0 shadow-sm rounded-3 p-2 p-md-3 h-100" style="background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%); color: #ffffff;">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="pe-1 pe-md-2 overflow-hidden">
                        <span class="d-block text-white-50 small fw-bold text-truncate" style="font-size: 11px;">সক্রিয় শিক্ষক (Active)</span>
                        <h3 class="mb-0 fw-bold text-white mt-1" style="font-size: clamp(1.2rem, 3.5vw, 1.75rem);">{{ $activeTeachers }}</h3>
                    </div>
                    <div class="flex-shrink-0 text-white-50 ms-auto" style="font-size: clamp(20px, 3vw, 36px);"><i class="bi bi-person-check-fill"></i></div>
                </div>
            </div>
        </div>
        <div class="col-4 col-md-4">
            <div class="card border-0 shadow-sm rounded-3 p-2 p-md-3 h-100" style="background: linear-gradient(135deg, #f5af19 0%, #e65c00 100%); color: #ffffff;">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="pe-1 pe-md-2 overflow-hidden">
                        <span class="d-block text-white-50 small fw-bold text-truncate" style="font-size: 11px;">ক্যাটাগরি (Categories)</span>
                        <h3 class="mb-0 fw-bold text-white mt-1" style="font-size: clamp(1.2rem, 3.5vw, 1.75rem);">{{ $totalCategories }}</h3>
                    </div>
                    <div class="flex-shrink-0 text-white-50 ms-auto" style="font-size: clamp(20px, 3vw, 36px);"><i class="bi bi-folder2-open"></i></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Teachers Table Card -->
    <div class="card border shadow-sm rounded-3">
        <div class="card-header bg-white py-3 d-flex flex-wrap justify-content-between align-items-center border-bottom gap-2">
            <div>
                <h4 class="card-title mb-0 fw-bold" style="color: #1b4332;">
                    <i class="bi bi-person-badge text-success me-2"></i>শিক্ষক তালিকা ও ব্যবস্থাপনা (Teachers List & Filter)
                </h4>
                <small class="text-secondary">মাদ্রাসার সকল শিক্ষক, উস্তাদ ও একাডেমিক স্টাফের তালিকা, ফিল্টার এবং সম্পাদনা</small>
            </div>
            <div class="d-flex gap-2">
                <a href="{{ route('frontend.teachers.index') }}" target="_blank" class="btn btn-outline-success btn-sm fw-bold shadow-sm">
                    <i class="bi bi-globe me-1"></i> পাবলিক ভিউ দেখুন
                </a>
                <a href="{{ route('teacher-categories.index') }}" class="btn btn-outline-dark btn-sm fw-bold shadow-sm">
                    <i class="bi bi-folder2-open me-1"></i> শিক্ষক ক্যাটাগরি
                </a>
                <a href="{{ route('teachers.create') }}" class="btn btn-success btn-sm fw-bold shadow-sm text-white" style="background-color: #1b4332; border-color: #1b4332;">
                    <i class="bi bi-plus-lg me-1"></i> নতুন শিক্ষক যুক্ত করুন
                </a>
            </div>
        </div>

        <!-- Filter & Search Form -->
        <div class="card-body border-bottom py-3" style="background-color: #f8f9fa;">
            <form action="{{ route('teachers.index') }}" method="GET">
                <div class="row g-2 align-items-center">
                    <div class="col-md-4">
                        <div class="input-group input-group-sm">
                            <span class="input-group-text bg-white" style="color: #495057;"><i class="bi bi-search"></i></span>
                            <input type="text" name="search" class="form-control" placeholder="নাম, পদবি, মোবাইল, ইমেইল বা বিষয়..." value="{{ request('search') }}" style="color: #212529; font-weight: 500;">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <select name="category_id" class="form-select form-select-sm border-secondary-subtle" style="color: #212529; font-weight: 500;">
                            <option value="">-- সকল ক্যাটাগরি --</option>
                            @foreach($categories as $cat)
                                <option value="{{ $cat->id }}" {{ request('category_id') == $cat->id ? 'selected' : '' }}>
                                    {{ $cat->name_bn }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2">
                        <select name="status" class="form-select form-select-sm border-secondary-subtle" style="color: #212529; font-weight: 500;">
                            <option value="">-- সকল স্ট্যাটাস --</option>
                            <option value="1" {{ request('status') === '1' ? 'selected' : '' }}>সক্রিয় (Active)</option>
                            <option value="0" {{ request('status') === '0' ? 'selected' : '' }}>নিষ্ক্রিয় (Inactive)</option>
                        </select>
                    </div>
                    <div class="col-md-3 d-flex gap-1">
                        <button type="submit" class="btn btn-sm w-100 fw-bold shadow-sm" style="background-color: #1b4332; color: #ffffff; border: 1px solid #1b4332;">
                            <i class="bi bi-funnel me-1"></i> ফিল্টার প্রয়োগ করুন
                        </button>
                        <a href="{{ route('teachers.index') }}" class="btn btn-outline-secondary btn-sm px-3" title="ফিল্টার রিসেট">
                            <i class="bi bi-arrow-counterclockwise"></i>
                        </a>
                    </div>
                </div>
            </form>
        </div>

        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover table-striped align-middle mb-0" style="color: #212529;">
                    <thead style="background-color: #e9ecef; color: #212529;">
                        <tr>
                            <th class="text-center fw-bold" style="width: 45px; color: #212529;">#</th>
                            <th class="fw-bold" style="width: 75px; color: #212529;">ছবি</th>
                            <th class="fw-bold" style="color: #212529;">শিক্ষকের নাম ও পদবি</th>
                            <th class="fw-bold" style="color: #212529;">ক্যাটাগরি</th>
                            <th class="fw-bold" style="color: #212529;">পাঠদান বিষয় ও যোগ্যতা</th>
                            <th class="fw-bold" style="color: #212529;">যোগাযোগ</th>
                            <th class="text-center fw-bold" style="width: 85px; color: #212529;">হোমপেজ</th>
                            <th class="text-center fw-bold" style="width: 90px; color: #212529;">স্ট্যাটাস</th>
                            <th class="text-center fw-bold" style="width: 170px; color: #212529;">অ্যাকশন</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($teachers as $key => $teacher)
                            <tr>
                                <td class="text-center fw-bold" style="color: #495057;">
                                    {{ $teachers->firstItem() ? $teachers->firstItem() + $key : $key + 1 }}
                                </td>
                                <td>
                                    @if($teacher->image && file_exists(public_path($teacher->image)))
                                        <img src="{{ asset($teacher->image) }}" alt="{{ $teacher->name_bn }}" class="rounded shadow-sm border" style="width: 50px; height: 60px; object-fit: cover;">
                                    @else
                                        <div class="rounded d-flex align-items-center justify-content-center shadow-sm" style="width: 50px; height: 60px; background-color: #e8f5e9; border: 1px solid #c8e6c9;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="#1b4332" class="bi bi-person-fill" viewBox="0 0 16 16">
                                                <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
                                            </svg>
                                        </div>
                                    @endif
                                </td>
                                <td>
                                    <strong class="d-block" style="color: #1b4332; font-size: 15px;">{{ $teacher->name_bn }}</strong>
                                    <span class="badge fw-bold" style="background-color: #e8f5e9; color: #1b4332; border: 1px solid #c8e6c9;">{{ $teacher->designation_bn }}</span>
                                    @if($teacher->name_en)
                                        <small class="d-block text-muted">{{ $teacher->name_en }} ({{ $teacher->designation_en }})</small>
                                    @endif
                                </td>
                                <td>
                                    <span class="badge bg-dark text-white fw-bold px-2 py-1">
                                        {{ $teacher->category ? $teacher->category->name_bn : 'সাধারণ' }}
                                    </span>
                                </td>
                                <td>
                                    @if($teacher->subject_department_bn)
                                        <div class="small fw-bold" style="color: #212529;"><i class="bi bi-book me-1 text-success"></i>{{ $teacher->subject_department_bn }}</div>
                                    @endif
                                    @if($teacher->qualification_bn)
                                        <small class="text-muted d-block">{{ Str::limit($teacher->qualification_bn, 35) }}</small>
                                    @endif
                                </td>
                                <td>
                                    @if($teacher->phone)
                                        <div class="small fw-bold" style="color: #0f5132;"><i class="bi bi-telephone-fill me-1"></i>{{ $teacher->phone }}</div>
                                    @endif
                                    @if($teacher->email)
                                        <small class="text-muted d-block"><i class="bi bi-envelope me-1"></i>{{ $teacher->email }}</small>
                                    @endif
                                </td>
                                <td class="text-center">
                                    @if($teacher->is_featured)
                                        <span class="badge bg-primary text-white"><i class="bi bi-check-circle me-1"></i>হ্যাঁ</span>
                                    @else
                                        <span class="badge bg-light text-muted border">না</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    {!! $teacher->status_badge !!}
                                </td>
                                <td class="text-center">
                                    <div class="btn-group btn-group-sm shadow-sm" role="group">
                                        <!-- Quick View Modal Trigger -->
                                        <button type="button" class="btn btn-info text-white" data-bs-toggle="modal" data-bs-target="#teacherModal{{ $teacher->id }}" title="কুইক ভিউ">
                                            <i class="bi bi-eye-fill"></i>
                                        </button>
                                        <!-- Full Details Page -->
                                        <a href="{{ route('teachers.show', $teacher->id) }}" class="btn btn-outline-info" title="পূর্ণাঙ্গ প্রোফাইল">
                                            <i class="bi bi-card-text"></i>
                                        </a>
                                        <!-- Edit Page -->
                                        <a href="{{ route('teachers.edit', $teacher->id) }}" class="btn btn-warning text-dark fw-bold" title="সম্পাদনা">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                        <!-- Delete Form -->
                                        <form action="{{ route('teachers.destroy', $teacher->id) }}" method="POST" class="d-inline" onsubmit="return confirm('আপনি কি নিশ্চিত যে এই শিক্ষকের তথ্য মুছে ফেলতে চান?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" title="মুছে ফেলুন">
                                                <i class="bi bi-trash-fill"></i>
                                            </button>
                                        </form>
                                    </div>

                                    <!-- Quick View Modal -->
                                    <div class="modal fade text-start" id="teacherModal{{ $teacher->id }}" tabindex="-1" aria-labelledby="teacherModalLabel{{ $teacher->id }}" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-lg">
                                            <div class="modal-content rounded-3 shadow">
                                                <div class="modal-header bg-white border-bottom">
                                                    <h5 class="modal-title fw-bold" style="color: #1b4332;" id="teacherModalLabel{{ $teacher->id }}">
                                                        <i class="bi bi-person-badge text-success me-2"></i>{{ $teacher->name_bn }}
                                                    </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body p-4" style="color: #212529;">
                                                    <div class="row g-3 align-items-center">
                                                        <div class="col-md-4 text-center">
                                                            @if($teacher->image && file_exists(public_path($teacher->image)))
                                                                <img src="{{ asset($teacher->image) }}" alt="{{ $teacher->name_bn }}" class="rounded shadow border" style="width: 140px; height: 160px; object-fit: cover;">
                                                            @else
                                                                <div class="rounded d-inline-flex align-items-center justify-content-center shadow border" style="width: 140px; height: 160px; background-color: #e8f5e9; border-color: #c8e6c9 !important;">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="68" height="68" fill="#1b4332" class="bi bi-person-fill" viewBox="0 0 16 16">
                                                                        <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
                                                                    </svg>
                                                                </div>
                                                            @endif
                                                            <div class="mt-2">
                                                                <span class="badge px-3 py-1 fw-bold" style="background-color: #e8f5e9; color: #1b4332; border: 1px solid #c8e6c9;">
                                                                    {{ $teacher->designation_bn }}
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <h5 class="fw-bold mb-1" style="color: #1b4332;">{{ $teacher->name_bn }}</h5>
                                                            @if($teacher->name_en)<p class="text-muted mb-2">{{ $teacher->name_en }}</p>@endif
                                                            <p class="mb-1"><strong>ক্যাটাগরি:</strong> <span class="badge bg-dark">{{ $teacher->category ? $teacher->category->name_bn : 'N/A' }}</span></p>
                                                            <p class="mb-1"><strong>পাঠদান বিষয়:</strong> <span class="fw-bold text-success">{{ $teacher->subject_department_bn ?: 'সকল বিষয়' }}</span></p>
                                                            <p class="mb-1"><strong>শিক্ষাগত যোগ্যতা:</strong> {{ $teacher->qualification_bn ?: 'তথ্য নেই' }}</p>
                                                            <p class="mb-1"><strong>মোবাইল:</strong> {{ $teacher->phone ?: 'তথ্য নেই' }}</p>
                                                            <p class="mb-1"><strong>ইমেইল:</strong> {{ $teacher->email ?: 'তথ্য নেই' }}</p>
                                                            <p class="mb-0"><strong>স্ট্যাটাস:</strong> {!! $teacher->status_badge !!}</p>
                                                        </div>
                                                        @if($teacher->bio_bn)
                                                            <div class="col-12 border-top pt-3 mt-3">
                                                                <strong class="d-block mb-1" style="color: #1b4332;">পরিচিতি ও জীবনবৃত্তান্ত:</strong>
                                                                <p class="small text-secondary mb-0" style="line-height: 1.7; white-space: pre-line;">{{ $teacher->bio_bn }}</p>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="modal-footer bg-light border-top d-flex justify-content-between">
                                                    <a href="{{ route('frontend.teachers.details', $teacher->id) }}" target="_blank" class="btn btn-outline-success btn-sm fw-bold">
                                                        <i class="bi bi-box-arrow-up-right me-1"></i> পাবলিক ভিউ
                                                    </a>
                                                    <div>
                                                        <a href="{{ route('teachers.edit', $teacher->id) }}" class="btn btn-warning btn-sm text-dark fw-bold me-1">
                                                            <i class="bi bi-pencil-square me-1"></i> এডিট
                                                        </a>
                                                        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">বন্ধ করুন</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Modal -->

                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9" class="text-center py-5 text-secondary">
                                    <i class="bi bi-people fs-1 d-block mb-2 text-muted"></i>
                                    <h5 class="fw-bold" style="color: #495057;">কোনো শিক্ষক পাওয়া যায়নি</h5>
                                    <p class="small mb-3" style="color: #6c757d;">ফিল্টার পরিবর্তন করুন অথবা নতুন শিক্ষক যুক্ত করুন।</p>
                                    <a href="{{ route('teachers.create') }}" class="btn btn-success btn-sm fw-bold">
                                        <i class="bi bi-plus-lg me-1"></i> নতুন শিক্ষক যুক্ত করুন
                                    </a>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if($teachers->hasPages())
                <div class="card-footer bg-white py-3 border-top d-flex justify-content-between align-items-center">
                    <small class="fw-bold" style="color: #495057;">
                        প্রদর্শিত হচ্ছে {{ $teachers->firstItem() }} থেকে {{ $teachers->lastItem() }} (মোট {{ $teachers->total() }} জন)
                    </small>
                    <div>
                        {{ $teachers->links() }}
                    </div>
                </div>
            @endif
        </div>
    </div>

</div>
@endsection
