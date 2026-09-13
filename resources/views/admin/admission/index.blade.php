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

    <!-- Statistics Cards with High Contrast -->
    <div class="row g-3 mb-4">
        <div class="col-md-3">
            <div class="card border-0 shadow-sm rounded-3 p-3" style="background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%); color: #ffffff;">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <span class="d-block text-white-50 small fw-bold">মোট আবেদন (Total)</span>
                        <h2 class="mb-0 fw-bold text-white mt-1">{{ $totalCount }}</h2>
                    </div>
                    <div style="font-size: 38px; color: rgba(255,255,255,0.85);"><i class="bi bi-file-earmark-person"></i></div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-0 shadow-sm rounded-3 p-3" style="background: linear-gradient(135deg, #f5af19 0%, #e65c00 100%); color: #ffffff;">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <span class="d-block text-white-50 small fw-bold">অপেক্ষমান (Pending)</span>
                        <h2 class="mb-0 fw-bold text-white mt-1">{{ $pendingCount }}</h2>
                    </div>
                    <div style="font-size: 38px; color: rgba(255,255,255,0.85);"><i class="bi bi-hourglass-split"></i></div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-0 shadow-sm rounded-3 p-3" style="background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%); color: #ffffff;">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <span class="d-block text-white-50 small fw-bold">ভর্তি অনুমোদিত (Approved)</span>
                        <h2 class="mb-0 fw-bold text-white mt-1">{{ $approvedCount }}</h2>
                    </div>
                    <div style="font-size: 38px; color: rgba(255,255,255,0.85);"><i class="bi bi-check2-circle"></i></div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-0 shadow-sm rounded-3 p-3" style="background: linear-gradient(135deg, #eb3349 0%, #f45c43 100%); color: #ffffff;">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <span class="d-block text-white-50 small fw-bold">বাতিল (Rejected)</span>
                        <h2 class="mb-0 fw-bold text-white mt-1">{{ $rejectedCount }}</h2>
                    </div>
                    <div style="font-size: 38px; color: rgba(255,255,255,0.85);"><i class="bi bi-x-circle"></i></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Table Card -->
    <div class="card border shadow-sm rounded-3">
        <div class="card-header bg-white py-3 d-flex flex-wrap justify-content-between align-items-center border-bottom gap-2">
            <div>
                <h4 class="card-title mb-0 fw-bold" style="color: #1b4332;">
                    <i class="bi bi-person-lines-fill text-success me-2"></i>ভর্তি আবেদন ব্যবস্থাপনা (Admission Applications)
                </h4>
                <small class="text-secondary">অনলাইন ও অফলাইনে প্রাপ্ত সকল ভর্তি আবেদন, ভর্তি পরীক্ষা মূল্যায়ন ও অনুমোদন</small>
            </div>
            <div class="d-flex gap-2">
                <a href="{{ route('admission.offline.form') }}" target="_blank" class="btn btn-outline-dark btn-sm shadow-sm fw-bold">
                    <i class="bi bi-printer me-1"></i> অফলাইন ফাঁকা ফরম (A4)
                </a>
                <a href="{{ route('admissions.create') }}" class="btn btn-success btn-sm shadow-sm fw-bold text-white" style="background-color: #1b4332; border-color: #1b4332;">
                    <i class="bi bi-plus-lg me-1"></i> নতুন ভর্তি এন্ট্রি (অফিস)
                </a>
            </div>
        </div>

        <!-- Filter Form -->
        <div class="card-body border-bottom py-3" style="background-color: #f8f9fa;">
            <form action="{{ route('admissions.index') }}" method="GET">
                <div class="row g-2 align-items-center">
                    <div class="col-md-3">
                        <input type="text" name="search" class="form-control form-control-sm border-secondary-subtle" placeholder="আবেদন নং, নাম, মোবাইল বা রোল..." value="{{ request('search') }}" style="color: #212529; font-weight: 500;">
                    </div>
                    <div class="col-md-2">
                        <select name="status" class="form-select form-select-sm border-secondary-subtle" style="color: #212529; font-weight: 500;">
                            <option value="">-- সকল স্ট্যাটাস --</option>
                            <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>অপেক্ষমান (Pending)</option>
                            <option value="under_review" {{ request('status') == 'under_review' ? 'selected' : '' }}>পর্যালোচনাধীন (Under Review)</option>
                            <option value="test_scheduled" {{ request('status') == 'test_scheduled' ? 'selected' : '' }}>পরীক্ষা নির্ধারিত (Test Scheduled)</option>
                            <option value="passed" {{ request('status') == 'passed' ? 'selected' : '' }}>উত্তীর্ণ (Passed)</option>
                            <option value="approved" {{ request('status') == 'approved' ? 'selected' : '' }}>অনুমোদিত (Approved)</option>
                            <option value="rejected" {{ request('status') == 'rejected' ? 'selected' : '' }}>বাতিল (Rejected)</option>
                            <option value="completed" {{ request('status') == 'completed' ? 'selected' : '' }}>সম্পন্ন (Completed)</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <select name="academic_year" class="form-select form-select-sm border-secondary-subtle" style="color: #212529; font-weight: 500;">
                            <option value="">-- শিক্ষাবর্ষ --</option>
                            @foreach($academicYears as $year)
                                <option value="{{ $year }}" {{ request('academic_year') == $year ? 'selected' : '' }}>{{ $year }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">
                        <select name="desired_class" class="form-select form-select-sm border-secondary-subtle" style="color: #212529; font-weight: 500;">
                            <option value="">-- শ্রেণি --</option>
                            @foreach($classes as $cls)
                                <option value="{{ $cls }}" {{ request('desired_class') == $cls ? 'selected' : '' }}>{{ $cls }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2 d-flex gap-1">
                        <button type="submit" class="btn btn-sm w-100 fw-bold shadow-sm" style="background-color: #1b4332; color: #ffffff; border: 1px solid #1b4332;">
                            <i class="bi bi-search me-1"></i> ফিল্টার
                        </button>
                        <a href="{{ route('admissions.index') }}" class="btn btn-outline-secondary btn-sm" title="রিসেট">
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
                            <th class="text-center fw-bold" style="width: 50px; color: #212529;">#</th>
                            <th class="fw-bold" style="width: 70px; color: #212529;">ছবি</th>
                            <th class="fw-bold" style="width: 150px; color: #212529;">আবেদন নং</th>
                            <th class="fw-bold" style="color: #212529;">শিক্ষার্থীর নাম</th>
                            <th class="fw-bold" style="color: #212529;">শ্রেণি ও বিভাগ</th>
                            <th class="fw-bold" style="color: #212529;">পিতা ও মোবাইল</th>
                            <th class="fw-bold" style="width: 120px; color: #212529;">পরীক্ষা নম্বর</th>
                            <th class="fw-bold" style="width: 140px; color: #212529;">স্ট্যাটাস</th>
                            <th class="text-center fw-bold" style="width: 170px; color: #212529;">অ্যাকশন</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($admissions as $key => $adm)
                            <tr>
                                <td class="text-center fw-bold" style="color: #495057;">{{ $admissions->firstItem() ? $admissions->firstItem() + $key : $key + 1 }}</td>
                                <td>
                                    @if($adm->student_photo && file_exists(public_path($adm->student_photo)))
                                        <img src="{{ asset($adm->student_photo) }}" alt="Photo" class="rounded shadow-sm border" style="width: 46px; height: 52px; object-fit: cover;">
                                    @else
                                        <div class="rounded d-flex align-items-center justify-content-center shadow-sm" style="width: 46px; height: 52px; background-color: #e8f5e9; border: 1px solid #c8e6c9;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="#1b4332" class="bi bi-person-fill" viewBox="0 0 16 16">
                                                <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
                                            </svg>
                                        </div>
                                    @endif
                                </td>
                                <td>
                                    <strong class="d-block" style="color: #0d6efd; font-size: 14px;">{{ $adm->application_no }}</strong>
                                    <small class="fw-semibold" style="color: #6c757d;">{{ $adm->academic_year }} ({{ ucfirst($adm->entry_type) }})</small>
                                </td>
                                <td>
                                    <span class="fw-bold d-block" style="color: #212529; font-size: 14px;">{{ $adm->student_name_bn }}</span>
                                    <small class="fw-semibold" style="color: #495057;">{{ $adm->student_name_en }}</small>
                                    @if($adm->assigned_roll_no)
                                        <div><span class="badge fw-bold" style="background-color: #198754; color: #ffffff; font-size: 11px;">রোল: {{ $adm->assigned_roll_no }}</span></div>
                                    @endif
                                </td>
                                <td>
                                    <span class="badge fw-bold px-2 py-1" style="background-color: #e8f5e9; color: #1b4332; border: 1px solid #c8e6c9; font-size: 12px;">{{ $adm->desired_class }}</span>
                                    @if($adm->department_division)
                                        <div class="small fw-semibold mt-1" style="color: #495057;">{{ $adm->department_division }}</div>
                                    @endif
                                    <div class="small fw-semibold" style="color: #6c757d;">{{ ucfirst($adm->residential_type) }}</div>
                                </td>
                                <td>
                                    <span class="d-block fw-semibold" style="color: #212529;">{{ $adm->father_name_bn ?: $adm->father_name_en }}</span>
                                    <span class="fw-bold" style="color: #0f5132;"><i class="bi bi-telephone-fill me-1" style="font-size: 11px;"></i>{{ $adm->mobile }}</span>
                                </td>
                                <td>
                                    @if($adm->obtained_marks !== null)
                                        <strong class="d-block" style="color: #198754; font-size: 14px;">{{ $adm->obtained_marks }} / 200</strong>
                                        <small class="fw-bold" style="color: #495057;">({{ $adm->percentage_marks }}%)</small>
                                    @else
                                        <span class="badge bg-light text-dark border">অনুষ্ঠিত হয়নি</span>
                                    @endif
                                </td>
                                <td>
                                    @if($adm->status == 'approved')
                                        <span class="badge fw-bold px-2 py-1" style="background-color: #198754; color: #ffffff; font-size: 12px;">অনুমোদিত (Approved)</span>
                                    @elseif($adm->status == 'pending')
                                        <span class="badge fw-bold px-2 py-1" style="background-color: #ffc107; color: #000000; font-size: 12px;">অপেক্ষমান (Pending)</span>
                                    @elseif($adm->status == 'under_review')
                                        <span class="badge fw-bold px-2 py-1" style="background-color: #0dcaf0; color: #000000; font-size: 12px;">পর্যালোচনাধীন</span>
                                    @elseif($adm->status == 'test_scheduled')
                                        <span class="badge fw-bold px-2 py-1" style="background-color: #0d6efd; color: #ffffff; font-size: 12px;">পরীক্ষা নির্ধারিত</span>
                                    @elseif($adm->status == 'passed')
                                        <span class="badge fw-bold px-2 py-1" style="background-color: #20c997; color: #ffffff; font-size: 12px;">উত্তীর্ণ (Passed)</span>
                                    @elseif($adm->status == 'rejected')
                                        <span class="badge fw-bold px-2 py-1" style="background-color: #dc3545; color: #ffffff; font-size: 12px;">বাতিল (Rejected)</span>
                                    @else
                                        <span class="badge fw-bold px-2 py-1" style="background-color: #6c757d; color: #ffffff; font-size: 12px;">{{ ucfirst($adm->status) }}</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <div class="btn-group btn-group-sm shadow-sm" role="group">
                                        <a href="{{ route('admissions.show', $adm->id) }}" class="btn btn-info text-white" title="বিস্তারিত ও মূল্যায়ন">
                                            <i class="bi bi-eye-fill"></i>
                                        </a>
                                        <a href="{{ route('admission.print', $adm->id) }}" target="_blank" class="btn btn-primary" title="প্রিন্ট বুকলেট (A4)">
                                            <i class="bi bi-printer-fill"></i>
                                        </a>
                                        <a href="{{ route('admissions.edit', $adm->id) }}" class="btn btn-dark text-white" title="তথ্য এডিট">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                        <form action="{{ route('admissions.destroy', $adm->id) }}" method="POST" class="d-inline" onsubmit="return confirm('আপনি কি নিশ্চিত যে এই আবেদনটি মুছে ফেলতে চান?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" title="মুছে ফেলুন">
                                                <i class="bi bi-trash-fill"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9" class="text-center py-5">
                                    <div class="text-secondary">
                                        <i class="bi bi-inbox fs-1 d-block mb-2 text-muted"></i>
                                        <h5 class="fw-bold" style="color: #495057;">কোনো ভর্তি আবেদন পাওয়া যায়নি</h5>
                                        <p class="small mb-3" style="color: #6c757d;">ফিল্টার পরিবর্তন করুন অথবা নতুন ভর্তি আবেদন যুক্ত করুন।</p>
                                        <a href="{{ route('admissions.create') }}" class="btn btn-success btn-sm fw-bold">
                                            <i class="bi bi-plus-lg me-1"></i> নতুন ভর্তি এন্ট্রি করুন
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            @if($admissions->hasPages())
                <div class="card-footer bg-white py-3 border-top d-flex justify-content-between align-items-center">
                    <small class="fw-bold" style="color: #495057;">
                        প্রদর্শিত হচ্ছে {{ $admissions->firstItem() }} থেকে {{ $admissions->lastItem() }} (মোট {{ $admissions->total() }} টি)
                    </small>
                    <div>
                        {{ $admissions->links() }}
                    </div>
                </div>
            @endif
        </div>
    </div>

</div>
@endsection
