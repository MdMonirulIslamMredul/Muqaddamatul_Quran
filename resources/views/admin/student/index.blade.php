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
                        <span class="d-block text-white-50 small fw-bold text-truncate" style="font-size: 11px;">মোট শিক্ষার্থী (Total)</span>
                        <h3 class="mb-0 fw-bold text-white mt-1" style="font-size: clamp(1.2rem, 3.5vw, 1.75rem);">{{ $totalStudents }}</h3>
                    </div>
                    <div class="flex-shrink-0 text-white-50 ms-auto" style="font-size: clamp(22px, 3.5vw, 36px);"><i class="bi bi-people-fill"></i></div>
                </div>
            </div>
        </div>
        <div class="col-6 col-lg-3">
            <div class="card border-0 shadow-sm rounded-3 p-2 p-md-3 h-100" style="background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%); color: #ffffff;">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="pe-1 pe-md-2 overflow-hidden">
                        <span class="d-block text-white-50 small fw-bold text-truncate" style="font-size: 11px;">অধ্যয়নরত (Active)</span>
                        <h3 class="mb-0 fw-bold text-white mt-1" style="font-size: clamp(1.2rem, 3.5vw, 1.75rem);">{{ $activeStudents }}</h3>
                    </div>
                    <div class="flex-shrink-0 text-white-50 ms-auto" style="font-size: clamp(22px, 3.5vw, 36px);"><i class="bi bi-person-check-fill"></i></div>
                </div>
            </div>
        </div>
        <div class="col-6 col-lg-3">
            <div class="card border-0 shadow-sm rounded-3 p-2 p-md-3 h-100" style="background: linear-gradient(135deg, #f5af19 0%, #e65c00 100%); color: #ffffff;">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="pe-1 pe-md-2 overflow-hidden">
                        <span class="d-block text-white-50 small fw-bold text-truncate" style="font-size: 11px;">আবাসিক (Residential)</span>
                        <h3 class="mb-0 fw-bold text-white mt-1" style="font-size: clamp(1.2rem, 3.5vw, 1.75rem);">{{ $residentialCount }}</h3>
                    </div>
                    <div class="flex-shrink-0 text-white-50 ms-auto" style="font-size: clamp(22px, 3.5vw, 36px);"><i class="bi bi-houses-fill"></i></div>
                </div>
            </div>
        </div>
        <div class="col-6 col-lg-3">
            <div class="card border-0 shadow-sm rounded-3 p-2 p-md-3 h-100" style="background: linear-gradient(135deg, #8e2de2 0%, #4a00e0 100%); color: #ffffff;">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="pe-1 pe-md-2 overflow-hidden">
                        <span class="d-block text-white-50 small fw-bold text-truncate" style="font-size: 11px;">মোট শ্রেণি (Classes)</span>
                        <h3 class="mb-0 fw-bold text-white mt-1" style="font-size: clamp(1.2rem, 3.5vw, 1.75rem);">{{ $classes->count() }}</h3>
                    </div>
                    <div class="flex-shrink-0 text-white-50 ms-auto" style="font-size: clamp(22px, 3.5vw, 36px);"><i class="bi bi-mortarboard-fill"></i></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Students Card -->
    <div class="card border shadow-sm rounded-3">
        <div class="card-header bg-white py-3 d-flex flex-wrap justify-content-between align-items-center border-bottom gap-2">
            <div>
                <h4 class="card-title mb-0 fw-bold" style="color: #1b4332;">
                    <i class="bi bi-person-lines-fill text-success me-2"></i>শ্রেণিভিত্তিক শিক্ষার্থী তালিকা ও ডাটাবেজ (Students Database)
                </h4>
                <small class="text-secondary">সকল শ্রেণি, রোল নম্বর ও শিক্ষাবর্ষ অনুযায়ী শিক্ষার্থীদের তালিকা এবং ব্যবস্থাপনা</small>
            </div>
            <div class="d-flex gap-2">
                <a href="{{ route('student-classes.index') }}" class="btn btn-outline-dark btn-sm fw-bold shadow-sm">
                    <i class="bi bi-book-half me-1"></i> শ্রেণি ব্যবস্থাপনা
                </a>
                <a href="{{ route('admissions.index') }}" class="btn btn-outline-success btn-sm fw-bold shadow-sm">
                    <i class="bi bi-file-earmark-person me-1"></i> ভর্তি আবেদনসমূহ
                </a>
                <a href="{{ route('students.create') }}" class="btn btn-success btn-sm fw-bold shadow-sm text-white" style="background-color: #1b4332; border-color: #1b4332;">
                    <i class="bi bi-plus-lg me-1"></i> নতুন ছাত্র যুক্ত করুন
                </a>
            </div>
        </div>

        <!-- Quick Class Filter Pills -->
        <div class="p-3 border-bottom" style="background-color: #ffffff;">
            <div class="d-flex flex-wrap gap-2 align-items-center">
                <span class="fw-bold small me-1" style="color: #1b4332;"><i class="bi bi-funnel me-1"></i>শ্রেণি নির্বাচন:</span>
                <a href="{{ route('students.index', array_merge(request()->except('class_id', 'page'))) }}" class="btn btn-sm {{ !request('class_id') ? 'btn-success text-white' : 'btn-outline-secondary' }} rounded-pill px-3 fw-bold" style="{{ !request('class_id') ? 'background-color: #1b4332; border-color: #1b4332;' : '' }}">
                    সকল শ্রেণি ({{ $totalStudents }})
                </a>
                @foreach($classes as $c)
                    <a href="{{ route('students.index', array_merge(request()->except('class_id', 'page'), ['class_id' => $c->id])) }}" class="btn btn-sm {{ request('class_id') == $c->id ? 'btn-success text-white' : 'btn-outline-secondary' }} rounded-pill px-3 fw-bold" style="{{ request('class_id') == $c->id ? 'background-color: #1b4332; border-color: #1b4332;' : '' }}">
                        {{ $c->name_bn }} <span class="badge {{ request('class_id') == $c->id ? 'bg-white text-dark' : 'bg-light text-dark border' }} ms-1">{{ $c->students_count }}</span>
                    </a>
                @endforeach
            </div>
        </div>

        <!-- Advanced Filter & Search Bar -->
        <div class="card-body border-bottom py-3" style="background-color: #f8f9fa;">
            <form action="{{ route('students.index') }}" method="GET">
                <div class="row g-2 align-items-center">
                    <div class="col-md-3">
                        <div class="input-group input-group-sm">
                            <span class="input-group-text bg-white" style="color: #495057;"><i class="bi bi-search"></i></span>
                            <input type="text" name="search" class="form-control" placeholder="নাম, রোল, আইডি, পিতা বা মোবাইল..." value="{{ request('search') }}" style="color: #212529; font-weight: 500;">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <select name="class_id" class="form-select form-select-sm border-secondary-subtle" style="color: #212529; font-weight: 500;">
                            <option value="">-- সকল শ্রেণি --</option>
                            @foreach($classes as $c)
                                <option value="{{ $c->id }}" {{ request('class_id') == $c->id ? 'selected' : '' }}>
                                    {{ $c->name_bn }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2">
                        <select name="academic_year" class="form-select form-select-sm border-secondary-subtle" style="color: #212529; font-weight: 500;">
                            <option value="">-- সকল শিক্ষাবর্ষ --</option>
                            <option value="2026" {{ request('academic_year', '2026') == '2026' ? 'selected' : '' }}>২০২৬</option>
                            <option value="2025" {{ request('academic_year') == '2025' ? 'selected' : '' }}>২০২৫</option>
                            <option value="2024" {{ request('academic_year') == '2024' ? 'selected' : '' }}>২০২৪</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <select name="residential_type" class="form-select form-select-sm border-secondary-subtle" style="color: #212529; font-weight: 500;">
                            <option value="">-- সকল ধরন --</option>
                            <option value="residential" {{ request('residential_type') == 'residential' ? 'selected' : '' }}>আবাসিক</option>
                            <option value="non_residential" {{ request('residential_type') == 'non_residential' ? 'selected' : '' }}>অনাবাসিক</option>
                            <option value="day_care" {{ request('residential_type') == 'day_care' ? 'selected' : '' }}>ডে-কেয়ার</option>
                        </select>
                    </div>
                    <div class="col-md-1">
                        <select name="status" class="form-select form-select-sm border-secondary-subtle" style="color: #212529; font-weight: 500;">
                            <option value="">-- স্ট্যাটাস --</option>
                            <option value="1" {{ request('status') === '1' ? 'selected' : '' }}>সক্রিয়</option>
                            <option value="2" {{ request('status') === '2' ? 'selected' : '' }}>উত্তীর্ণ</option>
                            <option value="3" {{ request('status') === '3' ? 'selected' : '' }}>ছাড়পত্রপ্রাপ্ত</option>
                            <option value="0" {{ request('status') === '0' ? 'selected' : '' }}>নিষ্ক্রিয়</option>
                        </select>
                    </div>
                    <div class="col-md-2 d-flex gap-1">
                        <button type="submit" class="btn btn-sm w-100 fw-bold shadow-sm" style="background-color: #1b4332; color: #ffffff; border: 1px solid #1b4332;">
                            <i class="bi bi-funnel me-1"></i> ফিল্টার
                        </button>
                        <a href="{{ route('students.index') }}" class="btn btn-outline-secondary btn-sm px-3" title="ফিল্টার রিসেট">
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
                            <th class="text-center fw-bold" style="width: 60px; color: #212529;">রোল নং</th>
                            <th class="fw-bold" style="width: 70px; color: #212529;">ছবি</th>
                            <th class="fw-bold" style="color: #212529;">শিক্ষার্থীর নাম ও আইডি</th>
                            <th class="fw-bold" style="color: #212529;">শ্রেণি ও শিক্ষাবর্ষ</th>
                            <th class="fw-bold" style="color: #212529;">পিতা ও অভিভাবকের তথ্য</th>
                            <th class="fw-bold" style="color: #212529;">যোগাযোগ মোবাইল</th>
                            <th class="text-center fw-bold" style="width: 90px; color: #212529;">ধরন</th>
                            <th class="text-center fw-bold" style="width: 100px; color: #212529;">স্ট্যাটাস</th>
                            <th class="text-center fw-bold" style="width: 150px; color: #212529;">অ্যাকশন</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($students as $student)
                            <tr>
                                <td class="text-center fw-bold">
                                    <span class="badge fs-6 rounded-pill px-3 py-1" style="background-color: #1b4332; color: #ffffff;">
                                        {{ $student->roll_no ?: '-' }}
                                    </span>
                                </td>
                                <td>
                                    @if($student->photo && file_exists(public_path($student->photo)))
                                        <img src="{{ asset($student->photo) }}" alt="{{ $student->student_name_bn }}" class="rounded shadow-sm border" style="width: 48px; height: 58px; object-fit: cover;">
                                    @else
                                        <div class="rounded d-flex align-items-center justify-content-center shadow-sm" style="width: 48px; height: 58px; background-color: #e8f5e9; border: 1px solid #c8e6c9;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="#1b4332" class="bi bi-person-fill" viewBox="0 0 16 16">
                                                <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
                                            </svg>
                                        </div>
                                    @endif
                                </td>
                                <td>
                                    <strong class="d-block" style="color: #1b4332; font-size: 15px;">{{ $student->student_name_bn }}</strong>
                                    <span class="badge px-2 py-1 fw-bold text-white shadow-sm mt-1" style="background-color: #1b4332; font-family: monospace; font-size: 11px;">
                                        {{ $student->student_id_number }}
                                    </span>
                                    @if($student->student_name_en)
                                        <small class="d-block text-muted">{{ $student->student_name_en }}</small>
                                    @endif
                                </td>
                                <td>
                                    <span class="badge bg-dark text-white fw-bold px-2 py-1">
                                         {{ $student->studentClass ? $student->studentClass->name_bn : 'শ্রেণিহীন' }}
                                     </span>
                                     <small class="d-block mt-1" style="color: #475569;">শিক্ষাবর্ষ: <strong class="text-dark">{{ $student->academic_year }}</strong></small>
                                </td>
                                <td>
                                    <strong class="d-block" style="color: #212529;">পিতা: {{ $student->father_name_bn ?: 'তথ্য নেই' }}</strong>
                                    @if($student->guardian_name && $student->guardian_name !== $student->father_name_bn)
                                        <small class="text-muted d-block">অভিভাবক: {{ $student->guardian_name }} ({{ $student->guardian_relation }})</small>
                                    @endif
                                </td>
                                <td>
                                    <strong class="d-block" style="color: #0f5132;">
                                        <i class="bi bi-telephone-fill me-1"></i>{{ $student->father_contact ?: ($student->guardian_contact ?: 'নেই') }}
                                    </strong>
                                    @if($student->blood_group)
                                        <span class="badge bg-danger text-white mt-1">{{ $student->blood_group }}</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <span class="badge bg-light text-dark border">
                                        {{ $student->residential_type_bn }}
                                    </span>
                                </td>
                                <td class="text-center">
                                    {!! $student->status_badge !!}
                                </td>
                                <td class="text-center">
                                    <div class="btn-group btn-group-sm shadow-sm" role="group">
                                        <!-- Quick View Modal Trigger -->
                                        <button type="button" class="btn btn-info text-white" data-bs-toggle="modal" data-bs-target="#studentModal{{ $student->id }}" title="কুইক ভিউ">
                                            <i class="bi bi-eye-fill"></i>
                                        </button>
                                        <!-- Full Details Page -->
                                        <a href="{{ route('students.show', $student->id) }}" class="btn btn-outline-info" title="পূর্ণাঙ্গ প্রোফাইল">
                                            <i class="bi bi-person-vcard"></i>
                                        </a>
                                        <!-- Edit Page -->
                                        <a href="{{ route('students.edit', $student->id) }}" class="btn btn-warning text-dark fw-bold" title="সম্পাদনা">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                        <!-- Delete Form -->
                                        <form action="{{ route('students.destroy', $student->id) }}" method="POST" class="d-inline" onsubmit="return confirm('আপনি কি নিশ্চিত যে এই শিক্ষার্থীর তথ্য মুছে ফেলতে চান?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" title="মুছে ফেলুন">
                                                <i class="bi bi-trash-fill"></i>
                                            </button>
                                        </form>
                                    </div>

                                    <!-- Quick View Modal -->
                                    <div class="modal fade text-start" id="studentModal{{ $student->id }}" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-lg">
                                            <div class="modal-content rounded-3 shadow">
                                                <div class="modal-header bg-white border-bottom">
                                                    <h5 class="modal-title fw-bold" style="color: #1b4332;">
                                                        <i class="bi bi-person-vcard text-success me-2"></i>{{ $student->student_name_bn }} (রোল: {{ $student->roll_no }})
                                                    </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body p-4" style="color: #212529;">
                                                    <div class="row g-3 align-items-center">
                                                        <div class="col-md-4 text-center">
                                                            @if($student->photo && file_exists(public_path($student->photo)))
                                                                <img src="{{ asset($student->photo) }}" alt="{{ $student->student_name_bn }}" class="rounded shadow border" style="width: 140px; height: 165px; object-fit: cover;">
                                                            @else
                                                                <div class="rounded d-inline-flex align-items-center justify-content-center shadow border" style="width: 140px; height: 165px; background-color: #e8f5e9; border-color: #c8e6c9 !important;">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="68" height="68" fill="#1b4332" class="bi bi-person-fill" viewBox="0 0 16 16">
                                                                        <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
                                                                    </svg>
                                                                </div>
                                                            @endif
                                                            <div class="mt-2">
                                                                <span class="badge px-3 py-1 fw-bold fs-6" style="background-color: #1b4332; color: #ffffff;">
                                                                    রোল নং: {{ $student->roll_no ?: '-' }}
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <h4 class="fw-bold mb-1" style="color: #1b4332;">{{ $student->student_name_bn }}</h4>
                                                            <p class="text-primary mb-2">স্টুডেন্ট আইডি: <strong>{{ $student->student_id_number }}</strong></p>
                                                            <p class="mb-1"><strong>শ্রেণি:</strong> <span class="badge bg-dark">{{ $student->studentClass ? $student->studentClass->name_bn : 'N/A' }}</span> (শিক্ষাবর্ষ: {{ $student->academic_year }})</p>
                                                            <p class="mb-1"><strong>পিতা:</strong> {{ $student->father_name_bn ?: '-' }} (পেশা: {{ $student->father_profession ?: '-' }})</p>
                                                            <p class="mb-1"><strong>মাতা:</strong> {{ $student->mother_name_bn ?: '-' }}</p>
                                                            <p class="mb-1"><strong>অভিভাবক:</strong> {{ $student->guardian_name ?: '-' }} ({{ $student->guardian_relation }})</p>
                                                            <p class="mb-1"><strong>মোবাইল:</strong> <span class="text-success fw-bold">{{ $student->father_contact ?: $student->guardian_contact }}</span></p>
                                                            <p class="mb-1"><strong>রক্তের গ্রুপ:</strong> <span class="badge bg-danger">{{ $student->blood_group ?: 'N/A' }}</span> | <strong>ধরন:</strong> {{ $student->residential_type_bn }}</p>
                                                            <p class="mb-0"><strong>বর্তমান ঠিকানা:</strong> {{ $student->present_address ?: 'তথ্য নেই' }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer bg-light border-top d-flex justify-content-between">
                                                    <a href="{{ route('students.show', $student->id) }}" class="btn btn-outline-info btn-sm fw-bold">
                                                        <i class="bi bi-eye me-1"></i> পূর্ণাঙ্গ প্রোফাইল ও আইডি কার্ড
                                                    </a>
                                                    <div>
                                                        <a href="{{ route('students.edit', $student->id) }}" class="btn btn-warning btn-sm text-dark fw-bold me-1">
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
                                    <h5 class="fw-bold" style="color: #495057;">কোনো শিক্ষার্থী পাওয়া যায়নি</h5>
                                    <p class="small mb-3" style="color: #6c757d;">ফিল্টার পরিবর্তন করুন অথবা নতুন ছাত্র যুক্ত করুন।</p>
                                    <a href="{{ route('students.create') }}" class="btn btn-success btn-sm fw-bold">
                                        <i class="bi bi-plus-lg me-1"></i> নতুন ছাত্র যুক্ত করুন
                                    </a>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if($students->hasPages())
                <div class="card-footer bg-white py-3 border-top d-flex justify-content-between align-items-center">
                    <small class="fw-bold" style="color: #495057;">
                        প্রদর্শিত হচ্ছে {{ $students->firstItem() }} থেকে {{ $students->lastItem() }} (মোট {{ $students->total() }} জন)
                    </small>
                    <div>
                        {{ $students->links() }}
                    </div>
                </div>
            @endif
        </div>
    </div>

</div>
@endsection
