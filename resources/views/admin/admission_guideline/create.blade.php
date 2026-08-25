@extends('admin.master')

@section('body')
    <div class="row mt-3 justify-content-center">
        <div class="col-lg-12">
            @if(isset($errors) && $errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="card border shadow-sm">
                <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center border-bottom">
                    <div>
                        <h4 class="card-title mb-0 fw-bold" style="color: #212529;">Create Admission Guideline Section</h4>
                        <small class="text-muted">Configure multi-language admission details, fees, process, rules, and point checklists</small>
                    </div>
                    <div>
                        <a href="{{ route('admission-guidelines.index') }}" class="btn btn-outline-secondary btn-sm px-3">
                            <i class="fa fa-arrow-left me-1"></i> Back to List
                        </a>
                    </div>
                </div>

                <div class="card-body p-4">
                    <form action="{{ route('admission-guidelines.store') }}" method="POST">
                        @csrf

                        <!-- Language Switcher Tabs -->
                        <ul class="nav nav-pills mb-4 p-2 bg-light rounded border" id="languageTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active fw-bold" id="lang-en-tab" data-bs-toggle="pill" data-bs-target="#lang-en" type="button" role="tab" aria-controls="lang-en" aria-selected="true">
                                    <i class="fa fa-globe me-1"></i> English (EN)
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link fw-bold" id="lang-bn-tab" data-bs-toggle="pill" data-bs-target="#lang-bn" type="button" role="tab" aria-controls="lang-bn" aria-selected="false">
                                    <i class="fa fa-language me-1"></i> বাংলা (BN)
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link fw-bold" id="lang-ab-tab" data-bs-toggle="pill" data-bs-target="#lang-ab" type="button" role="tab" aria-controls="lang-ab" aria-selected="false">
                                    <i class="fa fa-book me-1"></i> العربية (AB)
                                </button>
                            </li>
                        </ul>

                        <div class="tab-content" id="languageTabContent">
                            <!-- ================= ENGLISH TAB ================= -->
                            <div class="tab-pane fade show active" id="lang-en" role="tabpanel" aria-labelledby="lang-en-tab">
                                <div class="alert alert-info py-2 mb-3">
                                    <small><i class="fa fa-info-circle me-1"></i> Entering content in <strong>English</strong></small>
                                </div>

                                <div class="mb-4">
                                    <label class="form-label fw-semibold">Section Title (English) <span class="text-danger">*</span></label>
                                    <input type="text" name="section_title" class="form-control @error('section_title') is-invalid @enderror" value="{{ old('section_title') }}" placeholder="e.g. Admission Requirements & Fees Structure" required>
                                    @error('section_title')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="row g-3 mb-4">
                                    <div class="col-md-6">
                                        <div class="d-flex justify-content-between align-items-center mb-1">
                                            <label class="form-label fw-semibold mb-0">Admission Details (English)</label>
                                            <button type="button" class="btn btn-outline-primary btn-sm py-0 px-2" style="font-size: 12px;" onclick="insertDetailsTemplate('details_en', 'en')">
                                                <i class="fa fa-magic me-1"></i> Insert Design Template
                                            </button>
                                        </div>
                                        <textarea id="details_en" name="details" class="form-control rich-editor" rows="5" placeholder="General admission details...">{!! old('details') !!}</textarea>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="d-flex justify-content-between align-items-center mb-1">
                                            <label class="form-label fw-semibold mb-0">Admission Process (English)</label>
                                            <button type="button" class="btn btn-outline-primary btn-sm py-0 px-2" style="font-size: 12px;" onclick="insertProcessTemplate('process_en', 'en')">
                                                <i class="fa fa-magic me-1"></i> Insert Design Template
                                            </button>
                                        </div>
                                        <textarea id="process_en" name="process" class="form-control rich-editor" rows="5" placeholder="Step-by-step admission process...">{!! old('process') !!}</textarea>
                                    </div>
                                </div>

                                <div class="row g-3 mb-4">
                                    <div class="col-md-4">
                                        <div class="d-flex justify-content-between align-items-center mb-1">
                                            <label class="form-label fw-semibold text-primary mb-0"><i class="fa fa-tag me-1"></i> Admission Fees (English)</label>
                                            <button type="button" class="btn btn-outline-primary btn-sm py-0 px-2" style="font-size: 11px;" onclick="insertAdmissionFeesTemplate('admission_fees_en', 'en')">
                                                <i class="fa fa-magic me-1"></i> Template
                                            </button>
                                        </div>
                                        <textarea id="admission_fees_en" name="admission_fees" class="form-control rich-editor" rows="5">{!! old('admission_fees') !!}</textarea>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="d-flex justify-content-between align-items-center mb-1">
                                            <label class="form-label fw-semibold text-success mb-0"><i class="fa fa-calendar me-1"></i> Monthly Fees (English)</label>
                                            <button type="button" class="btn btn-outline-success btn-sm py-0 px-2" style="font-size: 11px;" onclick="insertMonthlyFeesTemplate('monthly_fees_en', 'en')">
                                                <i class="fa fa-magic me-1"></i> Template
                                            </button>
                                        </div>
                                        <textarea id="monthly_fees_en" name="monthly_fees" class="form-control rich-editor" rows="5">{!! old('monthly_fees') !!}</textarea>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="d-flex justify-content-between align-items-center mb-1">
                                            <label class="form-label fw-semibold text-info mb-0"><i class="fa fa-plus-circle me-1"></i> Others Fees (English)</label>
                                            <button type="button" class="btn btn-outline-info btn-sm py-0 px-2" style="font-size: 11px;" onclick="insertOthersFeesTemplate('others_fees_en', 'en')">
                                                <i class="fa fa-magic me-1"></i> Template
                                            </button>
                                        </div>
                                        <textarea id="others_fees_en" name="others_fees" class="form-control rich-editor" rows="5">{!! old('others_fees') !!}</textarea>
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <div class="d-flex justify-content-between align-items-center mb-1">
                                        <label class="form-label fw-semibold mb-0">Payment Rules (English)</label>
                                        <button type="button" class="btn btn-outline-primary btn-sm py-0 px-2" style="font-size: 11px;" onclick="insertPaymentRulesTemplate('payment_rules_en', 'en')">
                                            <i class="fa fa-magic me-1"></i> Template
                                        </button>
                                    </div>
                                    <textarea id="payment_rules_en" name="payment_rules" class="form-control rich-editor" rows="4">{!! old('payment_rules') !!}</textarea>
                                </div>

                                <div class="border-bottom pb-2 mb-3 d-flex justify-content-between align-items-center">
                                    <div>
                                        <h6 class="fw-bold text-dark mb-0"><i class="fa fa-list-ul text-primary me-2"></i>Key Points / Checklist (English)</h6>
                                    </div>
                                    <button type="button" class="btn btn-outline-primary btn-sm" onclick="addPointRow('points-container-en', 'points[]')">
                                        <i class="fa fa-plus me-1"></i> Add Point
                                    </button>
                                </div>
                                <div id="points-container-en" class="mb-4">
                                    <div class="point-row input-group mb-2">
                                        <span class="input-group-text bg-light fw-bold point-index">1</span>
                                        <input type="text" name="points[]" class="form-control" placeholder="Enter guideline instruction in English...">
                                        <button type="button" class="btn btn-outline-danger remove-point-btn" onclick="removePointRow(this, 'points-container-en')">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!-- ================= BANGLA TAB ================= -->
                            <div class="tab-pane fade" id="lang-bn" role="tabpanel" aria-labelledby="lang-bn-tab">
                                <div class="alert alert-success py-2 mb-3">
                                    <small><i class="fa fa-language me-1"></i> Entering content in <strong>বাংলা (Bangla)</strong></small>
                                </div>

                                <div class="mb-4">
                                    <label class="form-label fw-semibold">Section Title (বাংলা)</label>
                                    <input type="text" name="section_title_bn" class="form-control" value="{{ old('section_title_bn') }}" placeholder="যেমন: ভর্তি নির্দেশিকা ও ফি কাঠামো">
                                </div>

                                <div class="row g-3 mb-4">
                                    <div class="col-md-6">
                                        <div class="d-flex justify-content-between align-items-center mb-1">
                                            <label class="form-label fw-semibold mb-0">Admission Details (বিস্তারিত বিবরণ - বাংলা)</label>
                                            <button type="button" class="btn btn-outline-success btn-sm py-0 px-2" style="font-size: 12px;" onclick="insertDetailsTemplate('details_bn', 'bn')">
                                                <i class="fa fa-magic me-1"></i> নমুনা ডিজাইন যোগ করুন
                                            </button>
                                        </div>
                                        <textarea id="details_bn" name="details_bn" class="form-control rich-editor" rows="5">{!! old('details_bn') !!}</textarea>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="d-flex justify-content-between align-items-center mb-1">
                                            <label class="form-label fw-semibold mb-0">Admission Process (ভর্তি প্রক্রিয়া - বাংলা)</label>
                                            <button type="button" class="btn btn-outline-success btn-sm py-0 px-2" style="font-size: 12px;" onclick="insertProcessTemplate('process_bn', 'bn')">
                                                <i class="fa fa-magic me-1"></i> নমুনা ডিজাইন যোগ করুন
                                            </button>
                                        </div>
                                        <textarea id="process_bn" name="process_bn" class="form-control rich-editor" rows="5">{!! old('process_bn') !!}</textarea>
                                    </div>
                                </div>

                                <div class="row g-3 mb-4">
                                    <div class="col-md-4">
                                        <div class="d-flex justify-content-between align-items-center mb-1">
                                            <label class="form-label fw-semibold text-primary mb-0"><i class="fa fa-tag me-1"></i> Admission Fees (ভর্তি ফি - বাংলা)</label>
                                            <button type="button" class="btn btn-outline-success btn-sm py-0 px-2" style="font-size: 11px;" onclick="insertAdmissionFeesTemplate('admission_fees_bn', 'bn')">
                                                <i class="fa fa-magic me-1"></i> নমুনা যোগ করুন
                                            </button>
                                        </div>
                                        <textarea id="admission_fees_bn" name="admission_fees_bn" class="form-control rich-editor" rows="5">{!! old('admission_fees_bn') !!}</textarea>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="d-flex justify-content-between align-items-center mb-1">
                                            <label class="form-label fw-semibold text-success mb-0"><i class="fa fa-calendar me-1"></i> Monthly Fees (মাসিক বেতন - বাংলা)</label>
                                            <button type="button" class="btn btn-outline-success btn-sm py-0 px-2" style="font-size: 11px;" onclick="insertMonthlyFeesTemplate('monthly_fees_bn', 'bn')">
                                                <i class="fa fa-magic me-1"></i> নমুনা যোগ করুন
                                            </button>
                                        </div>
                                        <textarea id="monthly_fees_bn" name="monthly_fees_bn" class="form-control rich-editor" rows="5">{!! old('monthly_fees_bn') !!}</textarea>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="d-flex justify-content-between align-items-center mb-1">
                                            <label class="form-label fw-semibold text-info mb-0"><i class="fa fa-plus-circle me-1"></i> Others Fees (অন্যান্য ফি - বাংলা)</label>
                                            <button type="button" class="btn btn-outline-success btn-sm py-0 px-2" style="font-size: 11px;" onclick="insertOthersFeesTemplate('others_fees_bn', 'bn')">
                                                <i class="fa fa-magic me-1"></i> নমুনা যোগ করুন
                                            </button>
                                        </div>
                                        <textarea id="others_fees_bn" name="others_fees_bn" class="form-control rich-editor" rows="5">{!! old('others_fees_bn') !!}</textarea>
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <div class="d-flex justify-content-between align-items-center mb-1">
                                        <label class="form-label fw-semibold mb-0">Payment Rules (ফি পরিশোধের নিয়মাবলী - বাংলা)</label>
                                        <button type="button" class="btn btn-outline-success btn-sm py-0 px-2" style="font-size: 11px;" onclick="insertPaymentRulesTemplate('payment_rules_bn', 'bn')">
                                            <i class="fa fa-magic me-1"></i> নমুনা যোগ করুন
                                        </button>
                                    </div>
                                    <textarea id="payment_rules_bn" name="payment_rules_bn" class="form-control rich-editor" rows="4">{!! old('payment_rules_bn') !!}</textarea>
                                </div>

                                <div class="border-bottom pb-2 mb-3 d-flex justify-content-between align-items-center">
                                    <div>
                                        <h6 class="fw-bold text-dark mb-0"><i class="fa fa-list-ul text-primary me-2"></i>Key Points / Checklist (বাংলা)</h6>
                                    </div>
                                    <button type="button" class="btn btn-outline-primary btn-sm" onclick="addPointRow('points-container-bn', 'points_bn[]')">
                                        <i class="fa fa-plus me-1"></i> Add Point
                                    </button>
                                </div>
                                <div id="points-container-bn" class="mb-4">
                                    <div class="point-row input-group mb-2">
                                        <span class="input-group-text bg-light fw-bold point-index">1</span>
                                        <input type="text" name="points_bn[]" class="form-control" placeholder="বাংলায় নির্দেশিকা লিখুন...">
                                        <button type="button" class="btn btn-outline-danger remove-point-btn" onclick="removePointRow(this, 'points-container-bn')">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!-- ================= ARABIC TAB ================= -->
                            <div class="tab-pane fade" id="lang-ab" role="tabpanel" aria-labelledby="lang-ab-tab">
                                <div class="alert alert-warning py-2 mb-3">
                                    <small><i class="fa fa-book me-1"></i> Entering content in <strong>العربية (Arabic)</strong></small>
                                </div>

                                <div class="mb-4">
                                    <label class="form-label fw-semibold">Section Title (العربية)</label>
                                    <input type="text" name="section_title_ab" class="form-control" dir="rtl" value="{{ old('section_title_ab') }}" placeholder="مثال: شروط القبول والرسوم الدراسية">
                                </div>

                                <div class="row g-3 mb-4">
                                    <div class="col-md-6">
                                        <div class="d-flex justify-content-between align-items-center mb-1">
                                            <label class="form-label fw-semibold mb-0">Admission Details (تفاصيل القبول - العربية)</label>
                                            <button type="button" class="btn btn-outline-warning btn-sm py-0 px-2 text-dark" style="font-size: 12px;" onclick="insertDetailsTemplate('details_ab', 'ab')">
                                                <i class="fa fa-magic me-1"></i> إدراج النموذج
                                            </button>
                                        </div>
                                        <textarea id="details_ab" name="details_ab" class="form-control rich-editor" dir="rtl" rows="5">{!! old('details_ab') !!}</textarea>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="d-flex justify-content-between align-items-center mb-1">
                                            <label class="form-label fw-semibold mb-0">Admission Process (إجراءات القبول - العربية)</label>
                                            <button type="button" class="btn btn-outline-warning btn-sm py-0 px-2 text-dark" style="font-size: 12px;" onclick="insertProcessTemplate('process_ab', 'ab')">
                                                <i class="fa fa-magic me-1"></i> إدراج النموذج
                                            </button>
                                        </div>
                                        <textarea id="process_ab" name="process_ab" class="form-control rich-editor" dir="rtl" rows="5">{!! old('process_ab') !!}</textarea>
                                    </div>
                                </div>

                                <div class="row g-3 mb-4">
                                    <div class="col-md-4">
                                        <div class="d-flex justify-content-between align-items-center mb-1">
                                            <label class="form-label fw-semibold text-primary mb-0"><i class="fa fa-tag me-1"></i> Admission Fees (رسوم القبول - العربية)</label>
                                            <button type="button" class="btn btn-outline-warning btn-sm py-0 px-2 text-dark" style="font-size: 11px;" onclick="insertAdmissionFeesTemplate('admission_fees_ab', 'ab')">
                                                <i class="fa fa-magic me-1"></i> النموذج
                                            </button>
                                        </div>
                                        <textarea id="admission_fees_ab" name="admission_fees_ab" class="form-control rich-editor" dir="rtl" rows="5">{!! old('admission_fees_ab') !!}</textarea>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="d-flex justify-content-between align-items-center mb-1">
                                            <label class="form-label fw-semibold text-success mb-0"><i class="fa fa-calendar me-1"></i> Monthly Fees (الرسوم الشهرية - العربية)</label>
                                            <button type="button" class="btn btn-outline-warning btn-sm py-0 px-2 text-dark" style="font-size: 11px;" onclick="insertMonthlyFeesTemplate('monthly_fees_ab', 'ab')">
                                                <i class="fa fa-magic me-1"></i> النموذج
                                            </button>
                                        </div>
                                        <textarea id="monthly_fees_ab" name="monthly_fees_ab" class="form-control rich-editor" dir="rtl" rows="5">{!! old('monthly_fees_ab') !!}</textarea>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="d-flex justify-content-between align-items-center mb-1">
                                            <label class="form-label fw-semibold text-info mb-0"><i class="fa fa-plus-circle me-1"></i> Others Fees (رسوم أخرى - العربية)</label>
                                            <button type="button" class="btn btn-outline-warning btn-sm py-0 px-2 text-dark" style="font-size: 11px;" onclick="insertOthersFeesTemplate('others_fees_ab', 'ab')">
                                                <i class="fa fa-magic me-1"></i> النموذج
                                            </button>
                                        </div>
                                        <textarea id="others_fees_ab" name="others_fees_ab" class="form-control rich-editor" dir="rtl" rows="5">{!! old('others_fees_ab') !!}</textarea>
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <div class="d-flex justify-content-between align-items-center mb-1">
                                        <label class="form-label fw-semibold mb-0">Payment Rules (قواعد الدفع - العربية)</label>
                                        <button type="button" class="btn btn-outline-warning btn-sm py-0 px-2 text-dark" style="font-size: 11px;" onclick="insertPaymentRulesTemplate('payment_rules_ab', 'ab')">
                                            <i class="fa fa-magic me-1"></i> النموذج
                                        </button>
                                    </div>
                                    <textarea id="payment_rules_ab" name="payment_rules_ab" class="form-control rich-editor" dir="rtl" rows="4">{!! old('payment_rules_ab') !!}</textarea>
                                </div>

                                <div class="border-bottom pb-2 mb-3 d-flex justify-content-between align-items-center">
                                    <div>
                                        <h6 class="fw-bold text-dark mb-0"><i class="fa fa-list-ul text-primary me-2"></i>Key Points / Checklist (العربية)</h6>
                                    </div>
                                    <button type="button" class="btn btn-outline-primary btn-sm" onclick="addPointRow('points-container-ab', 'points_ab[]')">
                                        <i class="fa fa-plus me-1"></i> Add Point
                                    </button>
                                </div>
                                <div id="points-container-ab" class="mb-4">
                                    <div class="point-row input-group mb-2">
                                        <span class="input-group-text bg-light fw-bold point-index">1</span>
                                        <input type="text" name="points_ab[]" class="form-control" dir="rtl" placeholder="أدخل التعليمات باللغة العربية...">
                                        <button type="button" class="btn btn-outline-danger remove-point-btn" onclick="removePointRow(this, 'points-container-ab')">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex align-items-center gap-2 pt-3 border-top">
                            <button type="submit" class="btn btn-primary px-4 py-2 fw-semibold shadow-sm">
                                <i class="fa fa-save me-1"></i> Save Admission Guideline
                            </button>
                            <a href="{{ route('admission-guidelines.index') }}" class="btn btn-light px-4 py-2 border">
                                Cancel
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/7.1.1/tinymce.min.js" referrerpolicy="origin"></script>
    <script type="text/javascript">
        const admissionTemplates = {
            bn: `<div style="font-family: inherit; max-width: 650px; margin: 0 auto; padding: 25px; border: 1px solid #dcdcdc; border-radius: 10px; background-color: #ffffff; box-shadow: 0 2px 5px rgba(0,0,0,0.05);">
    <div style="text-align: center; margin-bottom: 25px;">
        <span style="display: inline-block; font-size: 22px; font-weight: bold; padding: 6px 32px; border: 2px solid #222; border-radius: 25px; background: #fdfdfd;">ভর্তির নিয়মাবলী</span>
    </div>
    <div style="margin-bottom: 22px;">
        <div style="font-size: 16px; font-weight: bold; text-decoration: underline; margin-bottom: 10px; color: #111;">যে শ্রেণীতে ভর্তি করা হয়</div>
        <ul style="list-style-type: none; padding-left: 5px; margin: 0;">
            <li style="margin-bottom: 7px; font-size: 15px; color: #222;">☑ নূরানী, নাজেরা, হিফয, শুনাওয়ী ও প্রতিযোগিতা বিভাগ।</li>
            <li style="margin-bottom: 7px; font-size: 15px; color: #222;">☑ প্লে থেকে ৭ম শ্রেণি।</li>
        </ul>
    </div>
    <div style="margin-bottom: 22px;">
        <div style="font-size: 16px; font-weight: bold; text-decoration: underline; margin-bottom: 10px; color: #111;">ভর্তি পরীক্ষার ধরন</div>
        <ul style="list-style-type: none; padding-left: 5px; margin: 0;">
            <li style="margin-bottom: 7px; font-size: 15px; color: #222;">☑ ক. মৌখিক পরীক্ষা</li>
        </ul>
    </div>
    <div style="margin-bottom: 15px;">
        <div style="font-size: 16px; font-weight: bold; text-decoration: underline; margin-bottom: 12px; color: #111;">যে- সব বিষয়ে ভর্তি পরীক্ষা নেওয়া হয়</div>
        <table style="width: 100%; border-collapse: collapse; font-size: 15px;">
            <thead>
                <tr style="border-bottom: 2px solid #222;">
                    <th style="text-align: left; padding: 6px 4px; text-decoration: underline; font-weight: bold; color: #111;">বিষয়</th>
                    <th style="text-align: right; padding: 6px 4px; text-decoration: underline; font-weight: bold; color: #111;">নম্বর ৫০</th>
                </tr>
            </thead>
            <tbody>
                <tr style="border-bottom: 1px dashed #ccc;"><td style="padding: 7px 4px;">☑ আরবি</td><td style="text-align: right; font-weight: bold;">- ১০</td></tr>
                <tr style="border-bottom: 1px dashed #ccc;"><td style="padding: 7px 4px;">☑ ইংরেজি</td><td style="text-align: right; font-weight: bold;">- ১০</td></tr>
                <tr style="border-bottom: 1px dashed #ccc;"><td style="padding: 7px 4px;">☑ বাংলা</td><td style="text-align: right; font-weight: bold;">- ১০</td></tr>
                <tr style="border-bottom: 1px dashed #ccc;"><td style="padding: 7px 4px;">☑ গণিত</td><td style="text-align: right; font-weight: bold;">- ১০</td></tr>
                <tr style="border-bottom: 1px dashed #ccc;"><td style="padding: 7px 4px;">☑ সাধারণ জ্ঞান</td><td style="text-align: right; font-weight: bold;">- ১০</td></tr>
                <tr style="border-bottom: 2px solid #222;"><td style="padding: 8px 4px; font-weight: 500;">☑ মৌখিক (কায়দা, আমপারা, নাজেরা ও হিফয)</td><td style="text-align: right; font-weight: bold;">- ৫০</td></tr>
            </tbody>
            <tfoot>
                <tr><td colspan="2" style="text-align: right; font-weight: bold; padding: 10px 4px; font-size: 17px;">মোট - ১০০</td></tr>
            </tfoot>
        </table>
    </div>
</div>`,
            en: `<div style="font-family: inherit; max-width: 650px; margin: 0 auto; padding: 25px; border: 1px solid #dcdcdc; border-radius: 10px; background-color: #ffffff; box-shadow: 0 2px 5px rgba(0,0,0,0.05);">
    <div style="text-align: center; margin-bottom: 25px;">
        <span style="display: inline-block; font-size: 22px; font-weight: bold; padding: 6px 32px; border: 2px solid #222; border-radius: 25px; background: #fdfdfd;">Admission Guidelines</span>
    </div>
    <div style="margin-bottom: 22px;">
        <div style="font-size: 16px; font-weight: bold; text-decoration: underline; margin-bottom: 10px; color: #111;">Eligible Classes & Departments</div>
        <ul style="list-style-type: none; padding-left: 5px; margin: 0;">
            <li style="margin-bottom: 7px; font-size: 15px; color: #222;">☑ Noorani, Nazera, Hifz, Shunawai, and Competition Department.</li>
            <li style="margin-bottom: 7px; font-size: 15px; color: #222;">☑ Play to Grade 7.</li>
        </ul>
    </div>
    <div style="margin-bottom: 22px;">
        <div style="font-size: 16px; font-weight: bold; text-decoration: underline; margin-bottom: 10px; color: #111;">Admission Test Type</div>
        <ul style="list-style-type: none; padding-left: 5px; margin: 0;">
            <li style="margin-bottom: 7px; font-size: 15px; color: #222;">☑ a. Oral Exam / Viva</li>
        </ul>
    </div>
    <div style="margin-bottom: 15px;">
        <div style="font-size: 16px; font-weight: bold; text-decoration: underline; margin-bottom: 12px; color: #111;">Subjects for Admission Test</div>
        <table style="width: 100%; border-collapse: collapse; font-size: 15px;">
            <thead>
                <tr style="border-bottom: 2px solid #222;">
                    <th style="text-align: left; padding: 6px 4px; text-decoration: underline; font-weight: bold; color: #111;">Subject</th>
                    <th style="text-align: right; padding: 6px 4px; text-decoration: underline; font-weight: bold; color: #111;">Marks 50</th>
                </tr>
            </thead>
            <tbody>
                <tr style="border-bottom: 1px dashed #ccc;"><td style="padding: 7px 4px;">☑ Arabic</td><td style="text-align: right; font-weight: bold;">- 10</td></tr>
                <tr style="border-bottom: 1px dashed #ccc;"><td style="padding: 7px 4px;">☑ English</td><td style="text-align: right; font-weight: bold;">- 10</td></tr>
                <tr style="border-bottom: 1px dashed #ccc;"><td style="padding: 7px 4px;">☑ Bengali</td><td style="text-align: right; font-weight: bold;">- 10</td></tr>
                <tr style="border-bottom: 1px dashed #ccc;"><td style="padding: 7px 4px;">☑ Mathematics</td><td style="text-align: right; font-weight: bold;">- 10</td></tr>
                <tr style="border-bottom: 1px dashed #ccc;"><td style="padding: 7px 4px;">☑ General Knowledge</td><td style="text-align: right; font-weight: bold;">- 10</td></tr>
                <tr style="border-bottom: 2px solid #222;"><td style="padding: 8px 4px; font-weight: 500;">☑ Oral (Qaida, Ampara, Nazera & Hifz)</td><td style="text-align: right; font-weight: bold;">- 50</td></tr>
            </tbody>
            <tfoot>
                <tr><td colspan="2" style="text-align: right; font-weight: bold; padding: 10px 4px; font-size: 17px;">Total - 100</td></tr>
            </tfoot>
        </table>
    </div>
</div>`,
            ab: `<div style="font-family: inherit; max-width: 650px; margin: 0 auto; padding: 25px; border: 1px solid #dcdcdc; border-radius: 10px; background-color: #ffffff; box-shadow: 0 2px 5px rgba(0,0,0,0.05);" dir="rtl">
    <div style="text-align: center; margin-bottom: 25px;">
        <span style="display: inline-block; font-size: 22px; font-weight: bold; padding: 6px 32px; border: 2px solid #222; border-radius: 25px; background: #fdfdfd;">شروط وإجراءات القبول</span>
    </div>
    <div style="margin-bottom: 22px;">
        <div style="font-size: 16px; font-weight: bold; text-decoration: underline; margin-bottom: 10px; color: #111;">الفصول والأقسام المتاحة للقبول</div>
        <ul style="list-style-type: none; padding-right: 5px; margin: 0;">
            <li style="margin-bottom: 7px; font-size: 15px; color: #222;">☑ النورانية، الناظرة، الحفظ، السماع وقسم المسابقات.</li>
            <li style="margin-bottom: 7px; font-size: 15px; color: #222;">☑ من الروضة إلى الصف السابع.</li>
        </ul>
    </div>
    <div style="margin-bottom: 22px;">
        <div style="font-size: 16px; font-weight: bold; text-decoration: underline; margin-bottom: 10px; color: #111;">نوع اختبار القبول</div>
        <ul style="list-style-type: none; padding-right: 5px; margin: 0;">
            <li style="margin-bottom: 7px; font-size: 15px; color: #222;">☑ أ. الاختبار الشفوي / المقابلة</li>
        </ul>
    </div>
    <div style="margin-bottom: 15px;">
        <div style="font-size: 16px; font-weight: bold; text-decoration: underline; margin-bottom: 12px; color: #111;">المواد المقررة في اختبار القبول</div>
        <table style="width: 100%; border-collapse: collapse; font-size: 15px;" dir="rtl">
            <thead>
                <tr style="border-bottom: 2px solid #222;">
                    <th style="text-align: right; padding: 6px 4px; text-decoration: underline; font-weight: bold; color: #111;">المادة</th>
                    <th style="text-align: left; padding: 6px 4px; text-decoration: underline; font-weight: bold; color: #111;">الدرجة ٥٠</th>
                </tr>
            </thead>
            <tbody>
                <tr style="border-bottom: 1px dashed #ccc;"><td style="padding: 7px 4px;">☑ اللغة العربية</td><td style="text-align: left; font-weight: bold;">- ١٠</td></tr>
                <tr style="border-bottom: 1px dashed #ccc;"><td style="padding: 7px 4px;">☑ اللغة الإنجليزية</td><td style="text-align: left; font-weight: bold;">- ١٠</td></tr>
                <tr style="border-bottom: 1px dashed #ccc;"><td style="padding: 7px 4px;">☑ اللغة البنغالية</td><td style="text-align: left; font-weight: bold;">- ١٠</td></tr>
                <tr style="border-bottom: 1px dashed #ccc;"><td style="padding: 7px 4px;">☑ الرياضيات</td><td style="text-align: left; font-weight: bold;">- ١٠</td></tr>
                <tr style="border-bottom: 1px dashed #ccc;"><td style="padding: 7px 4px;">☑ المعلومات العامة</td><td style="text-align: left; font-weight: bold;">- ١٠</td></tr>
                <tr style="border-bottom: 2px solid #222;"><td style="padding: 8px 4px; font-weight: 500;">☑ الشفوي (القاعدة، عمّ، الناظرة والحفظ)</td><td style="text-align: left; font-weight: bold;">- ٥٠</td></tr>
            </tbody>
            <tfoot>
                <tr><td colspan="2" style="text-align: left; font-weight: bold; padding: 10px 4px; font-size: 17px;">المجموع - ١٠٠</td></tr>
            </tfoot>
        </table>
    </div>
</div>`
        };

        const processTemplates = {
            bn: `<div style="font-family: inherit; max-width: 650px; margin: 0 auto; padding: 25px; border: 1px solid #dcdcdc; border-radius: 10px; background-color: #ffffff; box-shadow: 0 2px 5px rgba(0,0,0,0.05);">
    <div style="text-align: center; margin-bottom: 25px;">
        <span style="display: inline-block; font-size: 22px; font-weight: bold; padding: 6px 32px; border: 2px solid #222; border-radius: 25px; background: #fdfdfd; letter-spacing: 0.5px;">ভর্তি প্রক্রিয়া</span>
    </div>
    <ul style="list-style-type: none; padding-left: 5px; margin: 0;">
        <li style="margin-bottom: 12px; font-size: 15px; color: #222; line-height: 1.6;">☑ ৩০০/- টাকার বিনিময়ে ভর্তি ফরম সংগ্রহ করতে হবে।</li>
        <li style="margin-bottom: 12px; font-size: 15px; color: #222; line-height: 1.6;">☑ ফরমের সাথে ২ কপি পাসপোর্ট ও ২ কপি স্ট্যাম্প সাইজের ছবি জমা দিতে হবে।</li>
        <li style="margin-bottom: 12px; font-size: 15px; color: #222; line-height: 1.6;">☑ প্রতিষ্ঠান কর্তৃক প্রদত্ত ফরমে সকল তথ্য প্রদান করতে হবে।</li>
        <li style="margin-bottom: 12px; font-size: 15px; color: #222; line-height: 1.6;">☑ অভিভাবকের জাতীয় পরিচয় পত্রের ফটোকপি জমা দিতে হবে।</li>
        <li style="margin-bottom: 12px; font-size: 15px; color: #222; line-height: 1.6;">☑ প্রতিষ্ঠানের নির্ধারিত ফি জমা দেয়ার মাধ্যমে ভর্তি প্রক্রিয়া সম্পন্ন হবে।</li>
        <li style="margin-bottom: 12px; font-size: 15px; color: #222; line-height: 1.6;">☑ ভর্তির সময় অভিভাবক ও শিক্ষার্থীকে উপস্থিত থাকতে হবে।</li>
        <li style="margin-bottom: 12px; font-size: 15px; color: #222; line-height: 1.6;">☑ ভর্তির সময় ছাত্রের জন্ম নিবন্ধন সার্টিফিকেট জমা দিতে হবে।</li>
        <li style="margin-bottom: 12px; font-size: 15px; color: #222; line-height: 1.6;">☑ ভর্তি হওয়ার পরে কোন টাকা ফেরত দেওয়া হবে না।</li>
    </ul>
</div>`,
            en: `<div style="font-family: inherit; max-width: 650px; margin: 0 auto; padding: 25px; border: 1px solid #dcdcdc; border-radius: 10px; background-color: #ffffff; box-shadow: 0 2px 5px rgba(0,0,0,0.05);">
    <div style="text-align: center; margin-bottom: 25px;">
        <span style="display: inline-block; font-size: 22px; font-weight: bold; padding: 6px 32px; border: 2px solid #222; border-radius: 25px; background: #fdfdfd; letter-spacing: 0.5px;">Admission Process</span>
    </div>
    <ul style="list-style-type: none; padding-left: 5px; margin: 0;">
        <li style="margin-bottom: 12px; font-size: 15px; color: #222; line-height: 1.6;">☑ Admission form must be collected for 300/- BDT.</li>
        <li style="margin-bottom: 12px; font-size: 15px; color: #222; line-height: 1.6;">☑ 2 passport size and 2 stamp size photographs must be submitted with the form.</li>
        <li style="margin-bottom: 12px; font-size: 15px; color: #222; line-height: 1.6;">☑ All required information must be accurately filled in the institution's official form.</li>
        <li style="margin-bottom: 12px; font-size: 15px; color: #222; line-height: 1.6;">☑ Photocopy of Guardian's National ID card (NID) must be submitted.</li>
        <li style="margin-bottom: 12px; font-size: 15px; color: #222; line-height: 1.6;">☑ Admission process will be finalized upon payment of prescribed fees.</li>
        <li style="margin-bottom: 12px; font-size: 15px; color: #222; line-height: 1.6;">☑ Both student and guardian must be present during the admission.</li>
        <li style="margin-bottom: 12px; font-size: 15px; color: #222; line-height: 1.6;">☑ Student's Birth Registration Certificate must be submitted during admission.</li>
        <li style="margin-bottom: 12px; font-size: 15px; color: #222; line-height: 1.6;">☑ Fees once paid are non-refundable after admission.</li>
    </ul>
</div>`,
            ab: `<div style="font-family: inherit; max-width: 650px; margin: 0 auto; padding: 25px; border: 1px solid #dcdcdc; border-radius: 10px; background-color: #ffffff; box-shadow: 0 2px 5px rgba(0,0,0,0.05);" dir="rtl">
    <div style="text-align: center; margin-bottom: 25px;">
        <span style="display: inline-block; font-size: 22px; font-weight: bold; padding: 6px 32px; border: 2px solid #222; border-radius: 25px; background: #fdfdfd; letter-spacing: 0.5px;">إجراءات القبول</span>
    </div>
    <ul style="list-style-type: none; padding-right: 5px; margin: 0;">
        <li style="margin-bottom: 12px; font-size: 15px; color: #222; line-height: 1.6;">☑ يجب استلام استمارة القبول مقابل ٣٠٠ تاكا.</li>
        <li style="margin-bottom: 12px; font-size: 15px; color: #222; line-height: 1.6;">☑ تقديم صورتين بحجم جواز السفر وصورتين بحجم الطابع مع الاستمارة.</li>
        <li style="margin-bottom: 12px; font-size: 15px; color: #222; line-height: 1.6;">☑ ملء جميع البيانات والمعلومات في الاستمارة الرسمية للمؤسسة.</li>
        <li style="margin-bottom: 12px; font-size: 15px; color: #222; line-height: 1.6;">☑ إرفاق نسخة من بطاقة الهوية الوطنية لولي الأمر.</li>
        <li style="margin-bottom: 12px; font-size: 15px; color: #222; line-height: 1.6;">☑ تكتمل إجراءات القبول بعد سداد الرسوم المقررة.</li>
        <li style="margin-bottom: 12px; font-size: 15px; color: #222; line-height: 1.6;">☑ حضور ولي الأمر والطالب شخصياً وقت القبول.</li>
        <li style="margin-bottom: 12px; font-size: 15px; color: #222; line-height: 1.6;">☑ تقديم شهادة ميلاد الطالب الرسمية وقت القبول.</li>
        <li style="margin-bottom: 12px; font-size: 15px; color: #222; line-height: 1.6;">☑ لا تسترد الرسوم بعد إتمام عملية القبول.</li>
    </ul>
</div>`
        };

        const admissionFeesTemplates = {
            bn: `<div style="font-family: inherit; max-width: 750px; margin: 0 auto; padding: 20px; border: 1px solid #dcdcdc; border-radius: 10px; background-color: #ffffff; box-shadow: 0 2px 5px rgba(0,0,0,0.05);">
    <div style="text-align: center; margin-bottom: 20px;">
        <span style="display: inline-block; font-size: 20px; font-weight: bold; padding: 6px 32px; border: 2px solid #222; border-radius: 25px; background: #fdfdfd; letter-spacing: 0.5px;">ভর্তিকালীন ফি</span>
    </div>
    <div style="overflow-x: auto;">
        <table style="width: 100%; border-collapse: collapse; text-align: center; font-size: 14px; border: 1.5px solid #222;">
            <thead>
                <tr style="background-color: #f8f9fa; border-bottom: 1.5px solid #222;">
                    <th style="padding: 10px 8px; border: 1px solid #222; font-weight: bold; color: #111;">বিবরণ</th>
                    <th style="padding: 10px 8px; border: 1px solid #222; font-weight: bold; color: #111;">আবাসিক খাট</th>
                    <th style="padding: 10px 8px; border: 1px solid #222; font-weight: bold; color: #111;">আবাসিক সাধারণ</th>
                    <th style="padding: 10px 8px; border: 1px solid #222; font-weight: bold; color: #111;">ডে-কেয়ার</th>
                    <th style="padding: 10px 8px; border: 1px solid #222; font-weight: bold; color: #111;">অনাবাসিক</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td style="padding: 8px; border: 1px solid #222; text-align: left; font-weight: 500;">ভর্তি ফি এককালীন</td>
                    <td style="padding: 8px; border: 1px solid #222;">১০০০০/=</td>
                    <td style="padding: 8px; border: 1px solid #222;">৫০০০/=</td>
                    <td style="padding: 8px; border: 1px solid #222;">৪০০০/=</td>
                    <td style="padding: 8px; border: 1px solid #222;">৫০০০/=</td>
                </tr>
                <tr>
                    <td style="padding: 8px; border: 1px solid #222; text-align: left; font-weight: 500;">সেশন ফি বাৎসরিক</td>
                    <td style="padding: 8px; border: 1px solid #222;">৫০০০/=</td>
                    <td style="padding: 8px; border: 1px solid #222;">৫০০০/=</td>
                    <td style="padding: 8px; border: 1px solid #222;">৫০০০/=</td>
                    <td style="padding: 8px; border: 1px solid #222;">৫০০০/=</td>
                </tr>
                <tr>
                    <td style="padding: 8px; border: 1px solid #222; text-align: left; font-weight: 500;">সংস্থাপন বাৎসরিক</td>
                    <td style="padding: 8px; border: 1px solid #222;">৫০০০/=</td>
                    <td style="padding: 8px; border: 1px solid #222;">৫০০০/=</td>
                    <td style="padding: 8px; border: 1px solid #222;">৫০০০/=</td>
                    <td style="padding: 8px; border: 1px solid #222;">-</td>
                </tr>
            </tbody>
            <tfoot>
                <tr style="background-color: #f1f3f5; font-weight: bold; border-top: 1.5px solid #222;">
                    <td style="padding: 10px 8px; border: 1px solid #222; text-align: left; font-size: 15px;">সর্বমোট</td>
                    <td style="padding: 10px 8px; border: 1px solid #222; font-size: 15px;">২০০০0/=</td>
                    <td style="padding: 10px 8px; border: 1px solid #222; font-size: 15px;">১৫০০০/=</td>
                    <td style="padding: 10px 8px; border: 1px solid #222; font-size: 15px;">১৪০০০/=</td>
                    <td style="padding: 10px 8px; border: 1px solid #222; font-size: 15px;">১০০০০/=</td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>`,
            en: `<div style="font-family: inherit; max-width: 750px; margin: 0 auto; padding: 20px; border: 1px solid #dcdcdc; border-radius: 10px; background-color: #ffffff; box-shadow: 0 2px 5px rgba(0,0,0,0.05);">
    <div style="text-align: center; margin-bottom: 20px;">
        <span style="display: inline-block; font-size: 20px; font-weight: bold; padding: 6px 32px; border: 2px solid #222; border-radius: 25px; background: #fdfdfd; letter-spacing: 0.5px;">Admission Fees</span>
    </div>
    <div style="overflow-x: auto;">
        <table style="width: 100%; border-collapse: collapse; text-align: center; font-size: 14px; border: 1.5px solid #222;">
            <thead>
                <tr style="background-color: #f8f9fa; border-bottom: 1.5px solid #222;">
                    <th style="padding: 10px 8px; border: 1px solid #222; font-weight: bold; color: #111;">Description</th>
                    <th style="padding: 10px 8px; border: 1px solid #222; font-weight: bold; color: #111;">Residential (Bed)</th>
                    <th style="padding: 10px 8px; border: 1px solid #222; font-weight: bold; color: #111;">Residential (General)</th>
                    <th style="padding: 10px 8px; border: 1px solid #222; font-weight: bold; color: #111;">Day-Care</th>
                    <th style="padding: 10px 8px; border: 1px solid #222; font-weight: bold; color: #111;">Non-Residential</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td style="padding: 8px; border: 1px solid #222; text-align: left; font-weight: 500;">Admission Fee (One-Time)</td>
                    <td style="padding: 8px; border: 1px solid #222;">10000/=</td>
                    <td style="padding: 8px; border: 1px solid #222;">5000/=</td>
                    <td style="padding: 8px; border: 1px solid #222;">4000/=</td>
                    <td style="padding: 8px; border: 1px solid #222;">5000/=</td>
                </tr>
                <tr>
                    <td style="padding: 8px; border: 1px solid #222; text-align: left; font-weight: 500;">Session Fee (Annual)</td>
                    <td style="padding: 8px; border: 1px solid #222;">5000/=</td>
                    <td style="padding: 8px; border: 1px solid #222;">5000/=</td>
                    <td style="padding: 8px; border: 1px solid #222;">5000/=</td>
                    <td style="padding: 8px; border: 1px solid #222;">5000/=</td>
                </tr>
                <tr>
                    <td style="padding: 8px; border: 1px solid #222; text-align: left; font-weight: 500;">Establishment Fee (Annual)</td>
                    <td style="padding: 8px; border: 1px solid #222;">5000/=</td>
                    <td style="padding: 8px; border: 1px solid #222;">5000/=</td>
                    <td style="padding: 8px; border: 1px solid #222;">5000/=</td>
                    <td style="padding: 8px; border: 1px solid #222;">-</td>
                </tr>
            </tbody>
            <tfoot>
                <tr style="background-color: #f1f3f5; font-weight: bold; border-top: 1.5px solid #222;">
                    <td style="padding: 10px 8px; border: 1px solid #222; text-align: left; font-size: 15px;">Total</td>
                    <td style="padding: 10px 8px; border: 1px solid #222; font-size: 15px;">20000/=</td>
                    <td style="padding: 10px 8px; border: 1px solid #222; font-size: 15px;">15000/=</td>
                    <td style="padding: 10px 8px; border: 1px solid #222; font-size: 15px;">14000/=</td>
                    <td style="padding: 10px 8px; border: 1px solid #222; font-size: 15px;">10000/=</td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>`,
            ab: `<div style="font-family: inherit; max-width: 750px; margin: 0 auto; padding: 20px; border: 1px solid #dcdcdc; border-radius: 10px; background-color: #ffffff; box-shadow: 0 2px 5px rgba(0,0,0,0.05);" dir="rtl">
    <div style="text-align: center; margin-bottom: 20px;">
        <span style="display: inline-block; font-size: 20px; font-weight: bold; padding: 6px 32px; border: 2px solid #222; border-radius: 25px; background: #fdfdfd; letter-spacing: 0.5px;">رسوم القبول والتسجيل</span>
    </div>
    <div style="overflow-x: auto;">
        <table style="width: 100%; border-collapse: collapse; text-align: center; font-size: 14px; border: 1.5px solid #222;" dir="rtl">
            <thead>
                <tr style="background-color: #f8f9fa; border-bottom: 1.5px solid #222;">
                    <th style="padding: 10px 8px; border: 1px solid #222; font-weight: bold; color: #111;">البيان</th>
                    <th style="padding: 10px 8px; border: 1px solid #222; font-weight: bold; color: #111;">داخلي (سرير)</th>
                    <th style="padding: 10px 8px; border: 1px solid #222; font-weight: bold; color: #111;">داخلي (عام)</th>
                    <th style="padding: 10px 8px; border: 1px solid #222; font-weight: bold; color: #111;">رعاية نهارية</th>
                    <th style="padding: 10px 8px; border: 1px solid #222; font-weight: bold; color: #111;">خارجي</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td style="padding: 8px; border: 1px solid #222; text-align: right; font-weight: 500;">رسوم القبول (لمرة واحدة)</td>
                    <td style="padding: 8px; border: 1px solid #222;">١٠٠٠٠/=</td>
                    <td style="padding: 8px; border: 1px solid #222;">٥٠٠٠/=</td>
                    <td style="padding: 8px; border: 1px solid #222;">٤٠٠٠/=</td>
                    <td style="padding: 8px; border: 1px solid #222;">٥٠٠٠/=</td>
                </tr>
                <tr>
                    <td style="padding: 8px; border: 1px solid #222; text-align: right; font-weight: 500;">رسوم الدورة (سنوية)</td>
                    <td style="padding: 8px; border: 1px solid #222;">٥٠٠٠/=</td>
                    <td style="padding: 8px; border: 1px solid #222;">٥٠٠٠/=</td>
                    <td style="padding: 8px; border: 1px solid #222;">٥٠٠٠/=</td>
                    <td style="padding: 8px; border: 1px solid #222;">٥٠٠٠/=</td>
                </tr>
                <tr>
                    <td style="padding: 8px; border: 1px solid #222; text-align: right; font-weight: 500;">رسوم التأسيس (سنوية)</td>
                    <td style="padding: 8px; border: 1px solid #222;">٥٠٠٠/=</td>
                    <td style="padding: 8px; border: 1px solid #222;">٥٠٠٠/=</td>
                    <td style="padding: 8px; border: 1px solid #222;">٥٠٠٠/=</td>
                    <td style="padding: 8px; border: 1px solid #222;">-</td>
                </tr>
            </tbody>
            <tfoot>
                <tr style="background-color: #f1f3f5; font-weight: bold; border-top: 1.5px solid #222;">
                    <td style="padding: 10px 8px; border: 1px solid #222; text-align: right; font-size: 15px;">المجموع الكلي</td>
                    <td style="padding: 10px 8px; border: 1px solid #222; font-size: 15px;">٢٠٠٠٠/=</td>
                    <td style="padding: 10px 8px; border: 1px solid #222; font-size: 15px;">١٥٠٠٠/=</td>
                    <td style="padding: 10px 8px; border: 1px solid #222; font-size: 15px;">١٤٠٠٠/=</td>
                    <td style="padding: 10px 8px; border: 1px solid #222; font-size: 15px;">١٠٠٠٠/=</td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>`
        };

        const monthlyFeesTemplates = {
            bn: `<div style="font-family: inherit; max-width: 750px; margin: 0 auto; padding: 20px; border: 1px solid #dcdcdc; border-radius: 10px; background-color: #ffffff; box-shadow: 0 2px 5px rgba(0,0,0,0.05);">
    <div style="text-align: center; margin-bottom: 20px;">
        <span style="display: inline-block; font-size: 20px; font-weight: bold; padding: 6px 32px; border: 2px solid #222; border-radius: 25px; background: #fdfdfd; letter-spacing: 0.5px;">মাসিক বেতন</span>
    </div>
    <div style="overflow-x: auto;">
        <table style="width: 100%; border-collapse: collapse; text-align: center; font-size: 14px; border: 1.5px solid #222;">
            <thead>
                <tr style="background-color: #f8f9fa; border-bottom: 1.5px solid #222;">
                    <th style="padding: 10px 8px; border: 1px solid #222; font-weight: bold; color: #111;">বিবরণ</th>
                    <th style="padding: 10px 8px; border: 1px solid #222; font-weight: bold; color: #111;">আবাসিক খাট</th>
                    <th style="padding: 10px 8px; border: 1px solid #222; font-weight: bold; color: #111;">আবাসিক সাধারণ</th>
                    <th style="padding: 10px 8px; border: 1px solid #222; font-weight: bold; color: #111;">ডে-কেয়ার</th>
                    <th style="padding: 10px 8px; border: 1px solid #222; font-weight: bold; color: #111;">অনাবাসিক</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td style="padding: 8px; border: 1px solid #222; text-align: left; font-weight: 500;">টিউশন ফি</td>
                    <td style="padding: 8px; border: 1px solid #222;">৩৫০০/=</td>
                    <td style="padding: 8px; border: 1px solid #222;">৩৫০০/=</td>
                    <td style="padding: 8px; border: 1px solid #222;">৩৫০০/=</td>
                    <td style="padding: 8px; border: 1px solid #222;">৩০০০/=</td>
                </tr>
                <tr>
                    <td style="padding: 8px; border: 1px solid #222; text-align: left; font-weight: 500;">হোস্টেল ফি</td>
                    <td style="padding: 8px; border: 1px solid #222;">৫৫০০/=</td>
                    <td style="padding: 8px; border: 1px solid #222;">৩৫০০/=</td>
                    <td style="padding: 8px; border: 1px solid #222;">৩০০০/=</td>
                    <td style="padding: 8px; border: 1px solid #222;">-</td>
                </tr>
                <tr>
                    <td style="padding: 8px; border: 1px solid #222; text-align: left; font-weight: 500;">হাউজ মেইনটেনেন্স চার্জ</td>
                    <td style="padding: 8px; border: 1px solid #222;">-</td>
                    <td style="padding: 8px; border: 1px solid #222;">-</td>
                    <td style="padding: 8px; border: 1px solid #222;">-</td>
                    <td style="padding: 8px; border: 1px solid #222;">১০০০/=</td>
                </tr>
            </tbody>
            <tfoot>
                <tr style="background-color: #f1f3f5; font-weight: bold; border-top: 1.5px solid #222;">
                    <td style="padding: 10px 8px; border: 1px solid #222; text-align: left; font-size: 15px;">সর্বমোট</td>
                    <td style="padding: 10px 8px; border: 1px solid #222; font-size: 15px;">৯০০০/=</td>
                    <td style="padding: 10px 8px; border: 1px solid #222; font-size: 15px;">৭০০০/=</td>
                    <td style="padding: 10px 8px; border: 1px solid #222; font-size: 15px;">৬৫০০/=</td>
                    <td style="padding: 10px 8px; border: 1px solid #222; font-size: 15px;">৪০০০/=</td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>`,
            en: `<div style="font-family: inherit; max-width: 750px; margin: 0 auto; padding: 20px; border: 1px solid #dcdcdc; border-radius: 10px; background-color: #ffffff; box-shadow: 0 2px 5px rgba(0,0,0,0.05);">
    <div style="text-align: center; margin-bottom: 20px;">
        <span style="display: inline-block; font-size: 20px; font-weight: bold; padding: 6px 32px; border: 2px solid #222; border-radius: 25px; background: #fdfdfd; letter-spacing: 0.5px;">Monthly Fees</span>
    </div>
    <div style="overflow-x: auto;">
        <table style="width: 100%; border-collapse: collapse; text-align: center; font-size: 14px; border: 1.5px solid #222;">
            <thead>
                <tr style="background-color: #f8f9fa; border-bottom: 1.5px solid #222;">
                    <th style="padding: 10px 8px; border: 1px solid #222; font-weight: bold; color: #111;">Description</th>
                    <th style="padding: 10px 8px; border: 1px solid #222; font-weight: bold; color: #111;">Residential (Bed)</th>
                    <th style="padding: 10px 8px; border: 1px solid #222; font-weight: bold; color: #111;">Residential (General)</th>
                    <th style="padding: 10px 8px; border: 1px solid #222; font-weight: bold; color: #111;">Day-Care</th>
                    <th style="padding: 10px 8px; border: 1px solid #222; font-weight: bold; color: #111;">Non-Residential</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td style="padding: 8px; border: 1px solid #222; text-align: left; font-weight: 500;">Tuition Fee</td>
                    <td style="padding: 8px; border: 1px solid #222;">3500/=</td>
                    <td style="padding: 8px; border: 1px solid #222;">3500/=</td>
                    <td style="padding: 8px; border: 1px solid #222;">3500/=</td>
                    <td style="padding: 8px; border: 1px solid #222;">3000/=</td>
                </tr>
                <tr>
                    <td style="padding: 8px; border: 1px solid #222; text-align: left; font-weight: 500;">Hostel Fee</td>
                    <td style="padding: 8px; border: 1px solid #222;">5500/=</td>
                    <td style="padding: 8px; border: 1px solid #222;">3500/=</td>
                    <td style="padding: 8px; border: 1px solid #222;">3000/=</td>
                    <td style="padding: 8px; border: 1px solid #222;">-</td>
                </tr>
                <tr>
                    <td style="padding: 8px; border: 1px solid #222; text-align: left; font-weight: 500;">House Maintenance Charge</td>
                    <td style="padding: 8px; border: 1px solid #222;">-</td>
                    <td style="padding: 8px; border: 1px solid #222;">-</td>
                    <td style="padding: 8px; border: 1px solid #222;">-</td>
                    <td style="padding: 8px; border: 1px solid #222;">1000/=</td>
                </tr>
            </tbody>
            <tfoot>
                <tr style="background-color: #f1f3f5; font-weight: bold; border-top: 1.5px solid #222;">
                    <td style="padding: 10px 8px; border: 1px solid #222; text-align: left; font-size: 15px;">Total</td>
                    <td style="padding: 10px 8px; border: 1px solid #222; font-size: 15px;">9000/=</td>
                    <td style="padding: 10px 8px; border: 1px solid #222; font-size: 15px;">7000/=</td>
                    <td style="padding: 10px 8px; border: 1px solid #222; font-size: 15px;">6500/=</td>
                    <td style="padding: 10px 8px; border: 1px solid #222; font-size: 15px;">4000/=</td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>`,
            ab: `<div style="font-family: inherit; max-width: 750px; margin: 0 auto; padding: 20px; border: 1px solid #dcdcdc; border-radius: 10px; background-color: #ffffff; box-shadow: 0 2px 5px rgba(0,0,0,0.05);" dir="rtl">
    <div style="text-align: center; margin-bottom: 20px;">
        <span style="display: inline-block; font-size: 20px; font-weight: bold; padding: 6px 32px; border: 2px solid #222; border-radius: 25px; background: #fdfdfd; letter-spacing: 0.5px;">الرسوم الشهرية</span>
    </div>
    <div style="overflow-x: auto;">
        <table style="width: 100%; border-collapse: collapse; text-align: center; font-size: 14px; border: 1.5px solid #222;" dir="rtl">
            <thead>
                <tr style="background-color: #f8f9fa; border-bottom: 1.5px solid #222;">
                    <th style="padding: 10px 8px; border: 1px solid #222; font-weight: bold; color: #111;">البيان</th>
                    <th style="padding: 10px 8px; border: 1px solid #222; font-weight: bold; color: #111;">داخلي (سرير)</th>
                    <th style="padding: 10px 8px; border: 1px solid #222; font-weight: bold; color: #111;">داخلي (عام)</th>
                    <th style="padding: 10px 8px; border: 1px solid #222; font-weight: bold; color: #111;">رعاية نهارية</th>
                    <th style="padding: 10px 8px; border: 1px solid #222; font-weight: bold; color: #111;">خারجي</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td style="padding: 8px; border: 1px solid #222; text-align: right; font-weight: 500;">الرسوم الدراسية</td>
                    <td style="padding: 8px; border: 1px solid #222;">٣٥٠٠/=</td>
                    <td style="padding: 8px; border: 1px solid #222;">٣٥٠٠/=</td>
                    <td style="padding: 8px; border: 1px solid #222;">٣٥٠٠/=</td>
                    <td style="padding: 8px; border: 1px solid #222;">٣٠٠٠/=</td>
                </tr>
                <tr>
                    <td style="padding: 8px; border: 1px solid #222; text-align: right; font-weight: 500;">رسوم السكن الداخلي</td>
                    <td style="padding: 8px; border: 1px solid #222;">٥٥٠٠/=</td>
                    <td style="padding: 8px; border: 1px solid #222;">٣٥٠٠/=</td>
                    <td style="padding: 8px; border: 1px solid #222;">٣٠٠٠/=</td>
                    <td style="padding: 8px; border: 1px solid #222;">-</td>
                </tr>
                <tr>
                    <td style="padding: 8px; border: 1px solid #222; text-align: right; font-weight: 500;">رسوم صيانة السكن</td>
                    <td style="padding: 8px; border: 1px solid #222;">-</td>
                    <td style="padding: 8px; border: 1px solid #222;">-</td>
                    <td style="padding: 8px; border: 1px solid #222;">-</td>
                    <td style="padding: 8px; border: 1px solid #222;">١٠٠٠/=</td>
                </tr>
            </tbody>
            <tfoot>
                <tr style="background-color: #f1f3f5; font-weight: bold; border-top: 1.5px solid #222;">
                    <td style="padding: 10px 8px; border: 1px solid #222; text-align: right; font-size: 15px;">المجموع الكلي</td>
                    <td style="padding: 10px 8px; border: 1px solid #222; font-size: 15px;">٩٠٠٠/=</td>
                    <td style="padding: 10px 8px; border: 1px solid #222; font-size: 15px;">٧٠٠٠/=</td>
                    <td style="padding: 10px 8px; border: 1px solid #222; font-size: 15px;">٦৫০০/=</td>
                    <td style="padding: 10px 8px; border: 1px solid #222; font-size: 15px;">٤٠٠٠/=</td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>`
        };

        function insertDetailsTemplate(textareaId, lang) {
            const templateHtml = admissionTemplates[lang];
            if (!templateHtml) return;

            const editor = tinymce.get(textareaId);
            if (editor) {
                editor.setContent(templateHtml);
            } else {
                const el = document.getElementById(textareaId);
                if (el) el.value = templateHtml;
            }
        }

        function insertProcessTemplate(textareaId, lang) {
            const templateHtml = processTemplates[lang];
            if (!templateHtml) return;

            const editor = tinymce.get(textareaId);
            if (editor) {
                editor.setContent(templateHtml);
            } else {
                const el = document.getElementById(textareaId);
                if (el) el.value = templateHtml;
            }
        }

        function insertAdmissionFeesTemplate(textareaId, lang) {
            const templateHtml = admissionFeesTemplates[lang];
            if (!templateHtml) return;

            const editor = tinymce.get(textareaId);
            if (editor) {
                editor.setContent(templateHtml);
            } else {
                const el = document.getElementById(textareaId);
                if (el) el.value = templateHtml;
            }
        }

        function insertMonthlyFeesTemplate(textareaId, lang) {
            const templateHtml = monthlyFeesTemplates[lang];
            if (!templateHtml) return;

            const editor = tinymce.get(textareaId);
            if (editor) {
                editor.setContent(templateHtml);
            } else {
                const el = document.getElementById(textareaId);
                if (el) el.value = templateHtml;
            }
        }

        const othersFeesTemplates = {
            bn: `<div style="font-family: inherit; max-width: 650px; margin: 0 auto; padding: 25px; border: 1px solid #dcdcdc; border-radius: 10px; background-color: #ffffff; box-shadow: 0 2px 5px rgba(0,0,0,0.05);">
    <div style="text-align: center; margin-bottom: 25px;">
        <span style="display: inline-block; font-size: 22px; font-weight: bold; padding: 6px 32px; border: 2px solid #222; border-radius: 25px; background: #fdfdfd; letter-spacing: 0.5px;">অন্যান্য ফি</span>
    </div>
    <ul style="list-style-type: none; padding-left: 5px; margin: 0;">
        <li style="margin-bottom: 14px; font-size: 15px; color: #222; line-height: 1.6;">🔲 শাখা পরিবর্তন ফি ৩০০০/- (তিন হাজার টাকা মাত্র) ।</li>
        <li style="margin-bottom: 14px; font-size: 15px; color: #222; line-height: 1.6;">🔲 ভর্তি ফরম ও প্রসপেক্টাস ৫০০/- (পাঁচশত টাকা মাত্র) ।</li>
        <li style="margin-bottom: 14px; font-size: 15px; color: #222; line-height: 1.6;">🔲 পরীক্ষার ফি ৫০০/- (পাঁচশত টাকা মাত্র) ।</li>
        <li style="margin-bottom: 14px; font-size: 15px; color: #222; line-height: 1.6;">🔲 বইয়ের মূল্য দিতে হবে, শ্রেণিভিত্তিক চাহিদা অনুযায়ী (বোর্ড বই ব্যতীত) ।</li>
        <li style="margin-bottom: 14px; font-size: 15px; color: #222; line-height: 1.6;">🔲 খাতা, কলম, পেন্সিল ইত্যাদি বাবদ ১,৬০০ (এক হাজার ছয়শত টাকা মাত্র) ।</li>
        <li style="margin-bottom: 14px; font-size: 15px; color: #222; line-height: 1.6;">🔲 গ্রুপ ভ্রমণ ও পরিচয়পত্র বাবদ ১,৬০০ (এক হাজার ছয়শত টাকা মাত্র) ।</li>
        <li style="margin-bottom: 14px; font-size: 15px; color: #222; line-height: 1.6;">🔲 শীতাতপ নিয়ন্ত্রণ ও যাতায়াত বাবদ মাসিক ফি ১৫০০/- (এক হাজার পাঁচশত টাকা মাত্র) ।</li>
    </ul>
</div>`,
            en: `<div style="font-family: inherit; max-width: 650px; margin: 0 auto; padding: 25px; border: 1px solid #dcdcdc; border-radius: 10px; background-color: #ffffff; box-shadow: 0 2px 5px rgba(0,0,0,0.05);">
    <div style="text-align: center; margin-bottom: 25px;">
        <span style="display: inline-block; font-size: 22px; font-weight: bold; padding: 6px 32px; border: 2px solid #222; border-radius: 25px; background: #fdfdfd; letter-spacing: 0.5px;">Others Fees</span>
    </div>
    <ul style="list-style-type: none; padding-left: 5px; margin: 0;">
        <li style="margin-bottom: 14px; font-size: 15px; color: #222; line-height: 1.6;">🔲 Branch Change Fee: 3000/- (Three Thousand Taka only).</li>
        <li style="margin-bottom: 14px; font-size: 15px; color: #222; line-height: 1.6;">🔲 Admission Form & Prospectus: 500/- (Five Hundred Taka only).</li>
        <li style="margin-bottom: 14px; font-size: 15px; color: #222; line-height: 1.6;">🔲 Examination Fee: 500/- (Five Hundred Taka only).</li>
        <li style="margin-bottom: 14px; font-size: 15px; color: #222; line-height: 1.6;">🔲 Book cost to be paid according to class requirements (excluding Board books).</li>
        <li style="margin-bottom: 14px; font-size: 15px; color: #222; line-height: 1.6;">🔲 Notebooks, pens, pencils, etc.: 1,600 (One Thousand Six Hundred Taka only).</li>
        <li style="margin-bottom: 14px; font-size: 15px; color: #222; line-height: 1.6;">🔲 Group Tour & Student ID Card: 1,600 (One Thousand Six Hundred Taka only).</li>
        <li style="margin-bottom: 14px; font-size: 15px; color: #222; line-height: 1.6;">🔲 Monthly Fee for Air Conditioning & Transportation: 1500/- (One Thousand Five Hundred Taka only).</li>
    </ul>
</div>`,
            ab: `<div style="font-family: inherit; max-width: 650px; margin: 0 auto; padding: 25px; border: 1px solid #dcdcdc; border-radius: 10px; background-color: #ffffff; box-shadow: 0 2px 5px rgba(0,0,0,0.05);" dir="rtl">
    <div style="text-align: center; margin-bottom: 25px;">
        <span style="display: inline-block; font-size: 22px; font-weight: bold; padding: 6px 32px; border: 2px solid #222; border-radius: 25px; background: #fdfdfd; letter-spacing: 0.5px;">رسوم ومصاريف أخرى</span>
    </div>
    <ul style="list-style-type: none; padding-right: 5px; margin: 0;">
        <li style="margin-bottom: 14px; font-size: 15px; color: #222; line-height: 1.6;">🔲 رسوم تغيير الشعبة / الفرع: ٣٠٠٠/- تاكا فقط.</li>
        <li style="margin-bottom: 14px; font-size: 15px; color: #222; line-height: 1.6;">🔲 استمارة القبول ودليل الطالب: ٥٠٠/- تاكا فقط.</li>
        <li style="margin-bottom: 14px; font-size: 15px; color: #222; line-height: 1.6;">🔲 رسوم الاختبارات والامتحانات: ٥٠٠/- تاكا فقط.</li>
        <li style="margin-bottom: 14px; font-size: 15px; color: #222; line-height: 1.6;">🔲 دفع ثمن الكتب حسب متطلبات كل مرحلة دراسية (باستثناء كتب المجلس التعليمي).</li>
        <li style="margin-bottom: 14px; font-size: 15px; color: #222; line-height: 1.6;">🔲 الكراسات والأقلام والأدوات المدرسية: ١,٦٠٠ تاكا فقط.</li>
        <li style="margin-bottom: 14px; font-size: 15px; color: #222; line-height: 1.6;">🔲 الرحلات الجماعية وبطاقة الهوية الطالب: ١,٦٠٠ تاكا فقط.</li>
        <li style="margin-bottom: 14px; font-size: 15px; color: #222; line-height: 1.6;">🔲 الرسوم الشهرية للتكييف والنقل والمواصلات: ١٥٠٠/- تاكا فقط.</li>
    </ul>
</div>`
        };

        function insertOthersFeesTemplate(textareaId, lang) {
            const templateHtml = othersFeesTemplates[lang];
            if (!templateHtml) return;

            const editor = tinymce.get(textareaId);
            if (editor) {
                editor.setContent(templateHtml);
            } else {
                const el = document.getElementById(textareaId);
                if (el) el.value = templateHtml;
            }
        }

        const paymentRulesTemplates = {
            bn: `<div style="font-family: inherit; max-width: 650px; margin: 0 auto; padding: 25px; border: 1px solid #dcdcdc; border-radius: 10px; background-color: #ffffff; box-shadow: 0 2px 5px rgba(0,0,0,0.05);">
    <div style="text-align: center; margin-bottom: 25px;">
        <span style="display: inline-block; font-size: 22px; font-weight: bold; padding: 6px 32px; border: 2px solid #222; border-radius: 25px; background: #fdfdfd; letter-spacing: 0.5px;">মাসিক ফি পরিশোধের নিয়মাবলী</span>
    </div>
    <ul style="list-style-type: none; padding-left: 5px; margin: 0;">
        <li style="margin-bottom: 14px; font-size: 15px; color: #222; line-height: 1.6;">🔲 মাসিক প্রদেয় টাকা চলতি মাসের ১০ তারিখের মধ্যে পরিশোধ করতে হবে, অন্যথায় বিলম্ব ফি ৫০০/- (পাঁচশত টাকা) প্রদান করতে হবে ।</li>
        <li style="margin-bottom: 14px; font-size: 15px; color: #222; line-height: 1.6;">🔲 ভর্তিকৃত টাকা ফেরত দেয়া হয় না ।</li>
        <li style="margin-bottom: 14px; font-size: 15px; color: #222; line-height: 1.6;">🔲 প্রতিষ্ঠানের নিয়ম-শৃঙ্খলা ভঙ্গ করার অপরাধে কোন ছাত্রকে বহিষ্কার করা হলে তার ক্ষেত্রেও এ নিয়ম সমভাবে প্রযোজ্য ।</li>
        <li style="margin-bottom: 14px; font-size: 15px; color: #222; line-height: 1.6;">🔲 নির্ধারিত সময়ে টাকা প্রদান না করলে সার্ভিস চার্জ প্রযোজ্য ।</li>
        <li style="margin-bottom: 14px; font-size: 15px; color: #222; line-height: 1.6;">🔲 মাদ্রাসায় অনুপস্থিত থাকার কারণে কোনো ফি মওকুফ হবে না ।</li>
        <li style="margin-bottom: 14px; font-size: 15px; color: #222; line-height: 1.6;">🔲 মানিরিসিপ্ট ব্যতিত লেন-দেন গ্রহণ যোগ্য হবে না ।</li>
    </ul>
</div>`,
            en: `<div style="font-family: inherit; max-width: 650px; margin: 0 auto; padding: 25px; border: 1px solid #dcdcdc; border-radius: 10px; background-color: #ffffff; box-shadow: 0 2px 5px rgba(0,0,0,0.05);">
    <div style="text-align: center; margin-bottom: 25px;">
        <span style="display: inline-block; font-size: 22px; font-weight: bold; padding: 6px 32px; border: 2px solid #222; border-radius: 25px; background: #fdfdfd; letter-spacing: 0.5px;">Fee Payment Rules</span>
    </div>
    <ul style="list-style-type: none; padding-left: 5px; margin: 0;">
        <li style="margin-bottom: 14px; font-size: 15px; color: #222; line-height: 1.6;">🔲 Monthly dues must be paid by the 10th of the current month, otherwise a late fee of 500/- (Five Hundred Taka) will apply.</li>
        <li style="margin-bottom: 14px; font-size: 15px; color: #222; line-height: 1.6;">🔲 Admission fees are non-refundable.</li>
        <li style="margin-bottom: 14px; font-size: 15px; color: #222; line-height: 1.6;">🔲 If any student is expelled for violating institution discipline, this policy applies equally.</li>
        <li style="margin-bottom: 14px; font-size: 15px; color: #222; line-height: 1.6;">🔲 Service charges apply if fees are not paid within the scheduled time.</li>
        <li style="margin-bottom: 14px; font-size: 15px; color: #222; line-height: 1.6;">🔲 No fees will be waived due to absence from the Madrasah.</li>
        <li style="margin-bottom: 14px; font-size: 15px; color: #222; line-height: 1.6;">🔲 No payment or transaction is valid without an official Money Receipt.</li>
    </ul>
</div>`,
            ab: `<div style="font-family: inherit; max-width: 650px; margin: 0 auto; padding: 25px; border: 1px solid #dcdcdc; border-radius: 10px; background-color: #ffffff; box-shadow: 0 2px 5px rgba(0,0,0,0.05);" dir="rtl">
    <div style="text-align: center; margin-bottom: 25px;">
        <span style="display: inline-block; font-size: 22px; font-weight: bold; padding: 6px 32px; border: 2px solid #222; border-radius: 25px; background: #fdfdfd; letter-spacing: 0.5px;">قواعد وضوابط سداد الرسوم</span>
    </div>
    <ul style="list-style-type: none; padding-right: 5px; margin: 0;">
        <li style="margin-bottom: 14px; font-size: 15px; color: #222; line-height: 1.6;">🔲 يجب سداد الرسوم الشهرية المستحقة قبل اليوم العاشر من كل شهر، وإلا تطبق غرامة تأخير قدرها ٥٠٠/- تاكا.</li>
        <li style="margin-bottom: 14px; font-size: 15px; color: #222; line-height: 1.6;">🔲 رسوم القبول والتسجيل غير قابلة للاسترداد.</li>
        <li style="margin-bottom: 14px; font-size: 15px; color: #222; line-height: 1.6;">🔲 في حال فصل أي طالب لمخالفته لوائح المؤسسة وسلوكها، تنطبق هذه القواعد بالتساوي.</li>
        <li style="margin-bottom: 14px; font-size: 15px; color: #222; line-height: 1.6;">🔲 تُفرض رسوم خدمة إضافية في حالة عدم السداد في الوقت المحدد.</li>
        <li style="margin-bottom: 14px; font-size: 15px; color: #222; line-height: 1.6;">🔲 لا يتم إعفاء أو تخفيض أي رسوم بسبب غياب الطالب عن المدرسة.</li>
        <li style="margin-bottom: 14px; font-size: 15px; color: #222; line-height: 1.6;">🔲 لا يُعتد بأي معاملة مالية دون إيصال قبض رسمي.</li>
    </ul>
</div>`
        };

        function insertPaymentRulesTemplate(textareaId, lang) {
            const templateHtml = paymentRulesTemplates[lang];
            if (!templateHtml) return;

            const editor = tinymce.get(textareaId);
            if (editor) {
                editor.setContent(templateHtml);
            } else {
                const el = document.getElementById(textareaId);
                if (el) el.value = templateHtml;
            }
        }

        document.addEventListener("DOMContentLoaded", function() {
            tinymce.init({
                selector: 'textarea.rich-editor',
                height: 280,
                menubar: false,
                plugins: 'advlist autolink lists link image charmap preview anchor searchreplace visualblocks code fullscreen insertdatetime media table code wordcount',
                toolbar: 'undo redo | formatselect | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | table | removeformat | code'
            });
        });

        function updateIndices(containerId) {
            const container = document.getElementById(containerId);
            if (!container) return;
            const rows = container.querySelectorAll('.point-row');
            rows.forEach((row, i) => {
                row.querySelector('.point-index').textContent = i + 1;
            });
        }

        function addPointRow(containerId, inputName) {
            const container = document.getElementById(containerId);
            if (!container) return;
            const isRtl = containerId.includes('-ab');
            const row = document.createElement('div');
            row.className = 'point-row input-group mb-2';
            row.innerHTML = `
                <span class="input-group-text bg-light fw-bold point-index"></span>
                <input type="text" name="${inputName}" class="form-control" ${isRtl ? 'dir="rtl"' : ''} placeholder="Enter point instruction...">
                <button type="button" class="btn btn-outline-danger remove-point-btn" onclick="removePointRow(this, '${containerId}')">
                    <i class="fa fa-trash"></i>
                </button>
            `;
            container.appendChild(row);
            updateIndices(containerId);
            row.querySelector('input').focus();
        }

        function removePointRow(btn, containerId) {
            const container = document.getElementById(containerId);
            if (!container) return;
            const rows = container.querySelectorAll('.point-row');
            if (rows.length > 1) {
                btn.closest('.point-row').remove();
                updateIndices(containerId);
            } else {
                btn.closest('.point-row').querySelector('input').value = '';
            }
        }
    </script>
@endsection
