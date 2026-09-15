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

    <div class="row g-4">
        
        <!-- Left Column: Add New Class Form -->
        <div class="col-lg-4">
            <div class="card border shadow-sm rounded-3">
                <div class="card-header bg-white py-3 border-bottom">
                    <h5 class="card-title mb-0 fw-bold" style="color: #1b4332;">
                        <i class="bi bi-plus-circle-fill text-success me-2"></i>নতুন শ্রেণি তৈরি করুন (Add Class)
                    </h5>
                    <small class="text-secondary">মাদ্রাসার বিভাগ ও শ্রেণি কাঠামো নির্ধারণ করুন</small>
                </div>
                <div class="card-body p-4" style="color: #212529;">
                    <form action="{{ route('student-classes.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label fw-bold" style="color: #212529;">শ্রেণির নাম (বাংলা) <span class="text-danger">*</span></label>
                            <input type="text" name="name_bn" class="form-control" placeholder="যেমনঃ হিফজুল কুরআন বিভাগ" value="{{ old('name_bn') }}" required style="color: #212529;">
                            @error('name_bn')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold" style="color: #212529;">শ্রেণির নাম (English)</label>
                            <input type="text" name="name_en" class="form-control" placeholder="e.g. Hifzul Quran Section" value="{{ old('name_en') }}" style="color: #212529;">
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold" style="color: #212529;">বিভাগ / ডিপার্টমেন্ট</label>
                            <select name="department" class="form-select" style="color: #212529;">
                                <option value="">-- বিভাগ নির্বাচন করুন --</option>
                                <option value="নূরানী বিভাগ" {{ old('department') == 'নূরানী বিভাগ' ? 'selected' : '' }}>নূরানী বিভাগ</option>
                                <option value="নাজেরা বিভাগ" {{ old('department') == 'নাজেরা বিভাগ' ? 'selected' : '' }}>নাজেরা বিভাগ</option>
                                <option value="হিফজ বিভাগ" {{ old('department') == 'হিফজ বিভাগ' ? 'selected' : '' }}>হিফজ বিভাগ</option>
                                <option value="শুনানী বিভাগ" {{ old('department') == 'শুনানী বিভাগ' ? 'selected' : '' }}>শুনানী বিভাগ</option>
                                <option value="কিতাব বিভাগ" {{ old('department') == 'কিতাব বিভাগ' ? 'selected' : '' }}>কিতাব বিভাগ</option>
                                <option value="সাধারণ" {{ old('department') == 'সাধারণ' ? 'selected' : '' }}>সাধারণ</option>
                            </select>
                        </div>

                        <div class="row g-2 mb-3">
                            <div class="col-6">
                                <label class="form-label fw-bold" style="color: #212529;">মাসিক ফি (৳)</label>
                                <input type="number" step="0.5" name="monthly_fee" class="form-control" placeholder="0" value="{{ old('monthly_fee', 0) }}" style="color: #212529;">
                            </div>
                            <div class="col-6">
                                <label class="form-label fw-bold" style="color: #212529;">ভর্তি ফি (৳)</label>
                                <input type="number" step="0.5" name="admission_fee" class="form-control" placeholder="0" value="{{ old('admission_fee', 0) }}" style="color: #212529;">
                            </div>
                        </div>

                        <div class="row g-2 mb-3">
                            <div class="col-6">
                                <label class="form-label fw-bold" style="color: #212529;">আসন সংখ্যা</label>
                                <input type="number" name="seat_capacity" class="form-control" placeholder="যেমনঃ ৪০" value="{{ old('seat_capacity') }}" style="color: #212529;">
                            </div>
                            <div class="col-6">
                                <label class="form-label fw-bold" style="color: #212529;">সাজানোর ক্রম</label>
                                <input type="number" name="order_level" class="form-control" placeholder="0, 1, 2" value="{{ old('order_level', 0) }}" style="color: #212529;">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold" style="color: #212529;">বিবরণ (ঐচ্ছিক)</label>
                            <textarea name="description" class="form-control" rows="2" placeholder="শ্রেণির বিবরণ বা নীতিমালা..." style="color: #212529;">{{ old('description') }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold" style="color: #212529;">স্ট্যাটাস</label>
                            <select name="status" class="form-select" style="color: #212529;">
                                <option value="1" {{ old('status', 1) == 1 ? 'selected' : '' }}>সক্রিয় (Active)</option>
                                <option value="0" {{ old('status') === '0' ? 'selected' : '' }}>নিষ্ক্রিয় (Inactive)</option>
                            </select>
                        </div>

                        <button type="submit" class="btn w-100 fw-bold text-white shadow-sm py-2" style="background-color: #1b4332; border: 1px solid #1b4332;">
                            <i class="bi bi-save me-1"></i> শ্রেণি সংরক্ষণ করুন
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Right Column: Classes Table -->
        <div class="col-lg-8">
            <div class="card border shadow-sm rounded-3">
                <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center border-bottom">
                    <div>
                        <h5 class="card-title mb-0 fw-bold" style="color: #1b4332;">
                            <i class="bi bi-book-half text-success me-2"></i>মাদ্রাসার শ্রেণি তালিকা (Student Classes)
                        </h5>
                        <small class="text-secondary">মোট শ্রেণি: {{ $classes->total() }} টি</small>
                    </div>
                    <div>
                        <a href="{{ route('students.index') }}" class="btn btn-outline-dark btn-sm fw-bold shadow-sm">
                            <i class="bi bi-people-fill me-1"></i> শিক্ষার্থী তালিকা দেখুন
                        </a>
                    </div>
                </div>

                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover table-striped align-middle mb-0" style="color: #212529;">
                            <thead style="background-color: #e9ecef; color: #212529;">
                                <tr>
                                    <th class="text-center fw-bold" style="width: 50px; color: #212529;">ক্রম</th>
                                    <th class="fw-bold" style="color: #212529;">শ্রেণির নাম</th>
                                    <th class="fw-bold" style="color: #212529;">বিভাগ</th>
                                    <th class="text-center fw-bold" style="width: 100px; color: #212529;">মাসিক ফি</th>
                                    <th class="text-center fw-bold" style="width: 110px; color: #212529;">মোট ছাত্র</th>
                                    <th class="text-center fw-bold" style="width: 90px; color: #212529;">স্ট্যাটাস</th>
                                    <th class="text-center fw-bold" style="width: 120px; color: #212529;">অ্যাকশন</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($classes as $cls)
                                    <tr>
                                        <td class="text-center fw-bold" style="color: #495057;">{{ $cls->order_level }}</td>
                                        <td>
                                            <strong class="d-block" style="color: #1b4332; font-size: 15px;">{{ $cls->name_bn }}</strong>
                                            @if($cls->name_en)
                                                <small class="text-muted">{{ $cls->name_en }}</small>
                                            @endif
                                        </td>
                                        <td>
                                            <span class="badge bg-light text-dark border">{{ $cls->department ?: 'সাধারণ' }}</span>
                                        </td>
                                        <td class="text-center fw-bold" style="color: #0f5132;">
                                            ৳ {{ number_format($cls->monthly_fee, 0) }}
                                        </td>
                                        <td class="text-center">
                                            <a href="{{ route('students.index', ['class_id' => $cls->id]) }}" class="badge rounded-pill fw-bold text-decoration-none px-3 py-2" style="background-color: #e8f5e9; color: #1b4332; border: 1px solid #c8e6c9; font-size: 13px;">
                                                <i class="bi bi-people me-1"></i> {{ $cls->students_count }} জন
                                            </a>
                                        </td>
                                        <td class="text-center">
                                            @if($cls->status == 1)
                                                <span class="badge bg-success text-white fw-bold px-2 py-1">সক্রিয়</span>
                                            @else
                                                <span class="badge bg-danger text-white fw-bold px-2 py-1">নিষ্ক্রিয়</span>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <div class="btn-group btn-group-sm shadow-sm" role="group">
                                                <a href="{{ route('student-classes.edit', $cls->id) }}" class="btn btn-warning text-dark fw-bold" title="এডিট করুন">
                                                    <i class="bi bi-pencil-square"></i>
                                                </a>
                                                <form action="{{ route('student-classes.destroy', $cls->id) }}" method="POST" class="d-inline" onsubmit="return confirm('আপনি কি নিশ্চিত যে এই শ্রেণি মুছে ফেলতে চান?');">
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
                                        <td colspan="7" class="text-center py-5 text-secondary">
                                            <i class="bi bi-book fs-1 d-block mb-2 text-muted"></i>
                                            <h5 class="fw-bold" style="color: #495057;">কোনো শ্রেণি তৈরি করা হয়নি</h5>
                                            <p class="small mb-0" style="color: #6c757d;">বাম পাশের ফর্ম থেকে নতুন শ্রেণি যুক্ত করুন।</p>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    @if($classes->hasPages())
                        <div class="card-footer bg-white py-3 border-top">
                            {{ $classes->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>

    </div>

</div>
@endsection
