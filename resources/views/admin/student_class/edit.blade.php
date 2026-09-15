@extends('admin.master')

@section('body')
<div class="container-fluid mt-3 mb-5">

    <div class="row g-4">
        
        <!-- Left Column: Edit Class Form -->
        <div class="col-lg-4">
            <div class="card border shadow-sm rounded-3">
                <div class="card-header bg-white py-3 border-bottom">
                    <h5 class="card-title mb-0 fw-bold" style="color: #1b4332;">
                        <i class="bi bi-pencil-square text-warning me-2"></i>শ্রেণি সম্পাদনা (Edit Class)
                    </h5>
                    <small class="text-secondary">{{ $studentClass->name_bn }}</small>
                </div>
                <div class="card-body p-4" style="color: #212529;">
                    <form action="{{ route('student-classes.update', $studentClass->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label class="form-label fw-bold" style="color: #212529;">শ্রেণির নাম (বাংলা) <span class="text-danger">*</span></label>
                            <input type="text" name="name_bn" class="form-control" value="{{ old('name_bn', $studentClass->name_bn) }}" required style="color: #212529;">
                            @error('name_bn')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold" style="color: #212529;">শ্রেণির নাম (English)</label>
                            <input type="text" name="name_en" class="form-control" value="{{ old('name_en', $studentClass->name_en) }}" style="color: #212529;">
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold" style="color: #212529;">বিভাগ / ডিপার্টমেন্ট</label>
                            <select name="department" class="form-select" style="color: #212529;">
                                <option value="">-- বিভাগ নির্বাচন করুন --</option>
                                <option value="নূরানী বিভাগ" {{ old('department', $studentClass->department) == 'নূরানী বিভাগ' ? 'selected' : '' }}>নূরানী বিভাগ</option>
                                <option value="নাজেরা বিভাগ" {{ old('department', $studentClass->department) == 'নাজেরা বিভাগ' ? 'selected' : '' }}>নাজেরা বিভাগ</option>
                                <option value="হিফজ বিভাগ" {{ old('department', $studentClass->department) == 'হিফজ বিভাগ' ? 'selected' : '' }}>হিফজ বিভাগ</option>
                                <option value="শুনানী বিভাগ" {{ old('department', $studentClass->department) == 'শুনানী বিভাগ' ? 'selected' : '' }}>শুনানী বিভাগ</option>
                                <option value="কিতাব বিভাগ" {{ old('department', $studentClass->department) == 'কিতাব বিভাগ' ? 'selected' : '' }}>কিতাব বিভাগ</option>
                                <option value="সাধারণ" {{ old('department', $studentClass->department) == 'সাধারণ' ? 'selected' : '' }}>সাধারণ</option>
                            </select>
                        </div>

                        <div class="row g-2 mb-3">
                            <div class="col-6">
                                <label class="form-label fw-bold" style="color: #212529;">মাসিক ফি (৳)</label>
                                <input type="number" step="0.5" name="monthly_fee" class="form-control" value="{{ old('monthly_fee', $studentClass->monthly_fee) }}" style="color: #212529;">
                            </div>
                            <div class="col-6">
                                <label class="form-label fw-bold" style="color: #212529;">ভর্তি ফি (৳)</label>
                                <input type="number" step="0.5" name="admission_fee" class="form-control" value="{{ old('admission_fee', $studentClass->admission_fee) }}" style="color: #212529;">
                            </div>
                        </div>

                        <div class="row g-2 mb-3">
                            <div class="col-6">
                                <label class="form-label fw-bold" style="color: #212529;">আসন সংখ্যা</label>
                                <input type="number" name="seat_capacity" class="form-control" value="{{ old('seat_capacity', $studentClass->seat_capacity) }}" style="color: #212529;">
                            </div>
                            <div class="col-6">
                                <label class="form-label fw-bold" style="color: #212529;">সাজানোর ক্রম</label>
                                <input type="number" name="order_level" class="form-control" value="{{ old('order_level', $studentClass->order_level) }}" style="color: #212529;">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold" style="color: #212529;">বিবরণ (ঐচ্ছিক)</label>
                            <textarea name="description" class="form-control" rows="2" style="color: #212529;">{{ old('description', $studentClass->description) }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold" style="color: #212529;">স্ট্যাটাস</label>
                            <select name="status" class="form-select" style="color: #212529;">
                                <option value="1" {{ old('status', $studentClass->status) == 1 ? 'selected' : '' }}>সক্রিয় (Active)</option>
                                <option value="0" {{ old('status', $studentClass->status) === 0 ? 'selected' : '' }}>নিষ্ক্রিয় (Inactive)</option>
                            </select>
                        </div>

                        <div class="d-flex gap-2">
                            <a href="{{ route('student-classes.index') }}" class="btn btn-outline-secondary w-50 fw-bold">বাতিল</a>
                            <button type="submit" class="btn w-50 fw-bold text-white shadow-sm" style="background-color: #1b4332; border: 1px solid #1b4332;">
                                <i class="bi bi-check-lg me-1"></i> আপডেট করুন
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Right Column: Classes Table -->
        <div class="col-lg-8">
            <div class="card border shadow-sm rounded-3">
                <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center border-bottom">
                    <h5 class="card-title mb-0 fw-bold" style="color: #1b4332;">
                        <i class="bi bi-book-half text-success me-2"></i>শ্রেণি তালিকা
                    </h5>
                    <a href="{{ route('student-classes.index') }}" class="btn btn-outline-success btn-sm fw-bold">
                        <i class="bi bi-plus-lg me-1"></i> নতুন শ্রেণি তৈরি
                    </a>
                </div>

                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover table-striped align-middle mb-0" style="color: #212529;">
                            <thead style="background-color: #e9ecef; color: #212529;">
                                <tr>
                                    <th class="text-center fw-bold" style="width: 50px;">ক্রম</th>
                                    <th class="fw-bold">শ্রেণির নাম</th>
                                    <th class="fw-bold">বিভাগ</th>
                                    <th class="text-center fw-bold" style="width: 100px;">মাসিক ফি</th>
                                    <th class="text-center fw-bold" style="width: 110px;">মোট ছাত্র</th>
                                    <th class="text-center fw-bold" style="width: 90px;">স্ট্যাটাস</th>
                                    <th class="text-center fw-bold" style="width: 120px;">অ্যাকশন</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($classes as $cls)
                                    <tr class="{{ $cls->id == $studentClass->id ? 'table-warning' : '' }}">
                                        <td class="text-center fw-bold">{{ $cls->order_level }}</td>
                                        <td>
                                            <strong class="d-block" style="color: #1b4332;">{{ $cls->name_bn }}</strong>
                                            @if($cls->name_en)<small class="text-muted">{{ $cls->name_en }}</small>@endif
                                        </td>
                                        <td><span class="badge bg-light text-dark border">{{ $cls->department ?: 'সাধারণ' }}</span></td>
                                        <td class="text-center fw-bold" style="color: #0f5132;">৳ {{ number_format($cls->monthly_fee, 0) }}</td>
                                        <td class="text-center">
                                            <span class="badge bg-light text-dark border">{{ $cls->students_count }} জন</span>
                                        </td>
                                        <td class="text-center">
                                            @if($cls->status == 1)
                                                <span class="badge bg-success text-white">সক্রিয়</span>
                                            @else
                                                <span class="badge bg-danger text-white">নিষ্ক্রিয়</span>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <div class="btn-group btn-group-sm">
                                                <a href="{{ route('student-classes.edit', $cls->id) }}" class="btn btn-warning text-dark fw-bold">
                                                    <i class="bi bi-pencil-square"></i>
                                                </a>
                                                <form action="{{ route('student-classes.destroy', $cls->id) }}" method="POST" class="d-inline" onsubmit="return confirm('মুছে ফেলতে চান?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">
                                                        <i class="bi bi-trash-fill"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
@endsection
