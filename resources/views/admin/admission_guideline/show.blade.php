@extends('admin.master')

@section('body')
    <div class="row mt-3 justify-content-center">
        <div class="col-lg-12">
            <div class="card border shadow-sm">
                <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center border-bottom">
                    <div>
                        <h4 class="card-title mb-0 fw-bold" style="color: #212529;">Admission Guideline Details</h4>
                        <small class="text-muted">Section: <span class="fw-bold text-primary">{{ $guideline->section_title }}</span></small>
                    </div>
                    <div class="d-flex gap-2">
                        <a href="{{ route('admission-guidelines.edit', $guideline->id) }}" class="btn btn-primary btn-sm px-3 shadow-sm">
                            <i class="fa fa-edit me-1"></i> Edit
                        </a>
                        <a href="{{ route('admission-guidelines.index') }}" class="btn btn-outline-secondary btn-sm px-3">
                            <i class="fa fa-arrow-left me-1"></i> Back to List
                        </a>
                    </div>
                </div>

                <div class="card-body p-4">
                    <!-- Language Selection Tabs -->
                    <ul class="nav nav-pills mb-4 p-2 bg-light rounded border" id="viewLanguageTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active fw-bold" id="view-en-tab" data-bs-toggle="pill" data-bs-target="#view-en" type="button" role="tab">
                                <i class="fa fa-globe me-1"></i> English (EN)
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link fw-bold" id="view-bn-tab" data-bs-toggle="pill" data-bs-target="#view-bn" type="button" role="tab">
                                <i class="fa fa-language me-1"></i> বাংলা (BN)
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link fw-bold" id="view-ab-tab" data-bs-toggle="pill" data-bs-target="#view-ab" type="button" role="tab">
                                <i class="fa fa-book me-1"></i> العربية (AB)
                            </button>
                        </li>
                    </ul>

                    <div class="tab-content" id="viewLanguageTabContent">
                        <!-- ================= ENGLISH VIEW ================= -->
                        <div class="tab-pane fade show active" id="view-en" role="tabpanel">
                            <div class="p-3 border rounded bg-light mb-4" style="border-left: 4px solid #007bff !important;">
                                <h6 class="text-uppercase text-muted fw-bold mb-1 small">Section Title (English)</h6>
                                <h4 class="fw-bold text-dark mb-0">{{ $guideline->section_title ?: 'N/A' }}</h4>
                            </div>

                            <div class="row g-4 mb-4">
                                <div class="col-md-6">
                                    <div class="card border shadow-sm h-100" style="border-left: 4px solid #007bff !important;">
                                        <div class="card-header bg-white py-2 border-bottom">
                                            <h6 class="fw-bold mb-0 text-primary"><i class="fa fa-align-left me-2"></i>Admission Details (English)</h6>
                                        </div>
                                        <div class="card-body p-3">
                                            @if($guideline->details)
                                                <div class="text-secondary">{!! $guideline->details !!}</div>
                                            @else
                                                <span class="text-muted small fst-italic">No details specified in English</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card border shadow-sm h-100" style="border-left: 4px solid #28a745 !important;">
                                        <div class="card-header bg-white py-2 border-bottom">
                                            <h6 class="fw-bold mb-0 text-success"><i class="fa fa-tasks me-2"></i>Admission Process (English)</h6>
                                        </div>
                                        <div class="card-body p-3">
                                            @if($guideline->process)
                                                <div class="text-secondary">{!! $guideline->process !!}</div>
                                            @else
                                                <span class="text-muted small fst-italic">No process specified in English</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row g-4 mb-4">
                                <div class="col-md-4">
                                    <div class="card border shadow-sm h-100" style="border-left: 4px solid #007bff !important;">
                                        <div class="card-header bg-white py-2 border-bottom">
                                            <h6 class="fw-bold mb-0 text-primary"><i class="fa fa-tag me-2"></i>Admission Fees (English)</h6>
                                        </div>
                                        <div class="card-body p-3">
                                            @if($guideline->admission_fees)
                                                <div class="text-secondary">{!! $guideline->admission_fees !!}</div>
                                            @else
                                                <span class="text-muted small fst-italic">Not specified</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card border shadow-sm h-100" style="border-left: 4px solid #28a745 !important;">
                                        <div class="card-header bg-white py-2 border-bottom">
                                            <h6 class="fw-bold mb-0 text-success"><i class="fa fa-calendar me-2"></i>Monthly Fees (English)</h6>
                                        </div>
                                        <div class="card-body p-3">
                                            @if($guideline->monthly_fees)
                                                <div class="text-secondary">{!! $guideline->monthly_fees !!}</div>
                                            @else
                                                <span class="text-muted small fst-italic">Not specified</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card border shadow-sm h-100" style="border-left: 4px solid #17a2b8 !important;">
                                        <div class="card-header bg-white py-2 border-bottom">
                                            <h6 class="fw-bold mb-0 text-info"><i class="fa fa-plus-circle me-2"></i>Others Fees (English)</h6>
                                        </div>
                                        <div class="card-body p-3">
                                            @if($guideline->others_fees)
                                                <div class="text-secondary">{!! $guideline->others_fees !!}</div>
                                            @else
                                                <span class="text-muted small fst-italic">Not specified</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @if($guideline->payment_rules)
                                <div class="card border shadow-sm mb-4" style="border-left: 4px solid #ffc107 !important;">
                                    <div class="card-header bg-white py-2 border-bottom">
                                        <h6 class="fw-bold mb-0 text-dark"><i class="fa fa-shield text-warning me-2"></i>Payment Rules (English)</h6>
                                    </div>
                                    <div class="card-body p-3">
                                        <div class="text-secondary">{!! $guideline->payment_rules !!}</div>
                                    </div>
                                </div>
                            @endif

                            @if(!empty($guideline->points) && is_array($guideline->points))
                                <div class="card border shadow-sm mb-4">
                                    <div class="card-header bg-white py-2 border-bottom">
                                        <h6 class="fw-bold mb-0 text-dark"><i class="fa fa-list-ol text-primary me-2"></i>Key Points (English - {{ count($guideline->points) }})</h6>
                                    </div>
                                    <div class="card-body p-0">
                                        <div class="list-group list-group-flush">
                                            @foreach($guideline->points as $idx => $pt)
                                                <div class="list-group-item d-flex align-items-start py-3">
                                                    <span class="badge rounded-pill me-3 px-3 py-2" style="background-color: #007bff; color: #ffffff; font-size: 12px;">{{ $idx + 1 }}</span>
                                                    <div class="flex-grow-1 text-secondary pt-1">{{ $pt }}</div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>

                        <!-- ================= BANGLA VIEW ================= -->
                        <div class="tab-pane fade" id="view-bn" role="tabpanel">
                            <div class="p-3 border rounded bg-light mb-4" style="border-left: 4px solid #28a745 !important;">
                                <h6 class="text-uppercase text-muted fw-bold mb-1 small">Section Title (বাংলা)</h6>
                                <h4 class="fw-bold text-dark mb-0">{{ $guideline->section_title_bn ?: 'প্রযোজ্য নয়' }}</h4>
                            </div>

                            <div class="row g-4 mb-4">
                                <div class="col-md-6">
                                    <div class="card border shadow-sm h-100" style="border-left: 4px solid #007bff !important;">
                                        <div class="card-header bg-white py-2 border-bottom">
                                            <h6 class="fw-bold mb-0 text-primary"><i class="fa fa-align-left me-2"></i>Admission Details (বাংলা)</h6>
                                        </div>
                                        <div class="card-body p-3">
                                            @if($guideline->details_bn)
                                                <div class="text-secondary">{!! $guideline->details_bn !!}</div>
                                            @else
                                                <span class="text-muted small fst-italic">বাংলায় বিবরণ দেওয়া হয়নি</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card border shadow-sm h-100" style="border-left: 4px solid #28a745 !important;">
                                        <div class="card-header bg-white py-2 border-bottom">
                                            <h6 class="fw-bold mb-0 text-success"><i class="fa fa-tasks me-2"></i>Admission Process (বাংলা)</h6>
                                        </div>
                                        <div class="card-body p-3">
                                            @if($guideline->process_bn)
                                                <div class="text-secondary">{!! $guideline->process_bn !!}</div>
                                            @else
                                                <span class="text-muted small fst-italic">বাংলায় প্রক্রিয়া দেওয়া হয়নি</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row g-4 mb-4">
                                <div class="col-md-4">
                                    <div class="card border shadow-sm h-100" style="border-left: 4px solid #007bff !important;">
                                        <div class="card-header bg-white py-2 border-bottom">
                                            <h6 class="fw-bold mb-0 text-primary"><i class="fa fa-tag me-2"></i>Admission Fees (বাংলা)</h6>
                                        </div>
                                        <div class="card-body p-3">
                                            @if($guideline->admission_fees_bn)
                                                <div class="text-secondary">{!! $guideline->admission_fees_bn !!}</div>
                                            @else
                                                <span class="text-muted small fst-italic">উল্লেখ নেই</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card border shadow-sm h-100" style="border-left: 4px solid #28a745 !important;">
                                        <div class="card-header bg-white py-2 border-bottom">
                                            <h6 class="fw-bold mb-0 text-success"><i class="fa fa-calendar me-2"></i>Monthly Fees (বাংলা)</h6>
                                        </div>
                                        <div class="card-body p-3">
                                            @if($guideline->monthly_fees_bn)
                                                <div class="text-secondary">{!! $guideline->monthly_fees_bn !!}</div>
                                            @else
                                                <span class="text-muted small fst-italic">উল্লেখ নেই</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card border shadow-sm h-100" style="border-left: 4px solid #17a2b8 !important;">
                                        <div class="card-header bg-white py-2 border-bottom">
                                            <h6 class="fw-bold mb-0 text-info"><i class="fa fa-plus-circle me-2"></i>Others Fees (বাংলা)</h6>
                                        </div>
                                        <div class="card-body p-3">
                                            @if($guideline->others_fees_bn)
                                                <div class="text-secondary">{!! $guideline->others_fees_bn !!}</div>
                                            @else
                                                <span class="text-muted small fst-italic">উল্লেখ নেই</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @if($guideline->payment_rules_bn)
                                <div class="card border shadow-sm mb-4" style="border-left: 4px solid #ffc107 !important;">
                                    <div class="card-header bg-white py-2 border-bottom">
                                        <h6 class="fw-bold mb-0 text-dark"><i class="fa fa-shield text-warning me-2"></i>Payment Rules (বাংলা)</h6>
                                    </div>
                                    <div class="card-body p-3">
                                        <div class="text-secondary">{!! $guideline->payment_rules_bn !!}</div>
                                    </div>
                                </div>
                            @endif

                            @if(!empty($guideline->points_bn) && is_array($guideline->points_bn))
                                <div class="card border shadow-sm mb-4">
                                    <div class="card-header bg-white py-2 border-bottom">
                                        <h6 class="fw-bold mb-0 text-dark"><i class="fa fa-list-ol text-primary me-2"></i>Key Points (বাংলা - {{ count($guideline->points_bn) }})</h6>
                                    </div>
                                    <div class="card-body p-0">
                                        <div class="list-group list-group-flush">
                                            @foreach($guideline->points_bn as $idx => $pt)
                                                <div class="list-group-item d-flex align-items-start py-3">
                                                    <span class="badge rounded-pill me-3 px-3 py-2" style="background-color: #28a745; color: #ffffff; font-size: 12px;">{{ $idx + 1 }}</span>
                                                    <div class="flex-grow-1 text-secondary pt-1">{{ $pt }}</div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>

                        <!-- ================= ARABIC VIEW ================= -->
                        <div class="tab-pane fade" id="view-ab" role="tabpanel" dir="rtl">
                            <div class="p-3 border rounded bg-light mb-4" style="border-right: 4px solid #ffc107 !important;">
                                <h6 class="text-uppercase text-muted fw-bold mb-1 small">Section Title (العربية)</h6>
                                <h4 class="fw-bold text-dark mb-0">{{ $guideline->section_title_ab ?: 'غير محدد' }}</h4>
                            </div>

                            <div class="row g-4 mb-4">
                                <div class="col-md-6">
                                    <div class="card border shadow-sm h-100" style="border-right: 4px solid #007bff !important;">
                                        <div class="card-header bg-white py-2 border-bottom">
                                            <h6 class="fw-bold mb-0 text-primary"><i class="fa fa-align-left me-2"></i>Admission Details (العربية)</h6>
                                        </div>
                                        <div class="card-body p-3">
                                            @if($guideline->details_ab)
                                                <div class="text-secondary">{!! $guideline->details_ab !!}</div>
                                            @else
                                                <span class="text-muted small fst-italic">لم يتم تحديد تفاصيل بالعربية</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card border shadow-sm h-100" style="border-right: 4px solid #28a745 !important;">
                                        <div class="card-header bg-white py-2 border-bottom">
                                            <h6 class="fw-bold mb-0 text-success"><i class="fa fa-tasks me-2"></i>Admission Process (العربية)</h6>
                                        </div>
                                        <div class="card-body p-3">
                                            @if($guideline->process_ab)
                                                <div class="text-secondary">{!! $guideline->process_ab !!}</div>
                                            @else
                                                <span class="text-muted small fst-italic">لم يتم تحديد إجراءات بالعربية</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row g-4 mb-4">
                                <div class="col-md-4">
                                    <div class="card border shadow-sm h-100" style="border-right: 4px solid #007bff !important;">
                                        <div class="card-header bg-white py-2 border-bottom">
                                            <h6 class="fw-bold mb-0 text-primary"><i class="fa fa-tag me-2"></i>Admission Fees (العربية)</h6>
                                        </div>
                                        <div class="card-body p-3">
                                            @if($guideline->admission_fees_ab)
                                                <div class="text-secondary">{!! $guideline->admission_fees_ab !!}</div>
                                            @else
                                                <span class="text-muted small fst-italic">غير محدد</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card border shadow-sm h-100" style="border-right: 4px solid #28a745 !important;">
                                        <div class="card-header bg-white py-2 border-bottom">
                                            <h6 class="fw-bold mb-0 text-success"><i class="fa fa-calendar me-2"></i>Monthly Fees (العربية)</h6>
                                        </div>
                                        <div class="card-body p-3">
                                            @if($guideline->monthly_fees_ab)
                                                <div class="text-secondary">{!! $guideline->monthly_fees_ab !!}</div>
                                            @else
                                                <span class="text-muted small fst-italic">غير محدد</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card border shadow-sm h-100" style="border-right: 4px solid #17a2b8 !important;">
                                        <div class="card-header bg-white py-2 border-bottom">
                                            <h6 class="fw-bold mb-0 text-info"><i class="fa fa-plus-circle me-2"></i>Others Fees (العربية)</h6>
                                        </div>
                                        <div class="card-body p-3">
                                            @if($guideline->others_fees_ab)
                                                <div class="text-secondary">{!! $guideline->others_fees_ab !!}</div>
                                            @else
                                                <span class="text-muted small fst-italic">غير محدد</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @if($guideline->payment_rules_ab)
                                <div class="card border shadow-sm mb-4" style="border-right: 4px solid #ffc107 !important;">
                                    <div class="card-header bg-white py-2 border-bottom">
                                        <h6 class="fw-bold mb-0 text-dark"><i class="fa fa-shield text-warning me-2"></i>Payment Rules (العربية)</h6>
                                    </div>
                                    <div class="card-body p-3">
                                        <div class="text-secondary">{!! $guideline->payment_rules_ab !!}</div>
                                    </div>
                                </div>
                            @endif

                            @if(!empty($guideline->points_ab) && is_array($guideline->points_ab))
                                <div class="card border shadow-sm mb-4">
                                    <div class="card-header bg-white py-2 border-bottom">
                                        <h6 class="fw-bold mb-0 text-dark"><i class="fa fa-list-ol text-primary me-2"></i>Key Points (العربية - {{ count($guideline->points_ab) }})</h6>
                                    </div>
                                    <div class="card-body p-0">
                                        <div class="list-group list-group-flush">
                                            @foreach($guideline->points_ab as $idx => $pt)
                                                <div class="list-group-item d-flex align-items-start py-3">
                                                    <span class="badge rounded-pill me-3 px-3 py-2" style="background-color: #ffc107; color: #212529; font-size: 12px;">{{ $idx + 1 }}</span>
                                                    <div class="flex-grow-1 text-secondary pt-1">{{ $pt }}</div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="pt-3 border-top d-flex justify-content-between align-items-center">
                        <small class="text-muted">
                            Created at: {{ $guideline->created_at ? $guideline->created_at->format('d M Y, h:i A') : 'N/A' }} |
                            Last updated: {{ $guideline->updated_at ? $guideline->updated_at->format('d M Y, h:i A') : 'N/A' }}
                        </small>
                        <form action="{{ route('admission-guidelines.destroy', $guideline->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this guideline section?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger btn-sm">
                                <i class="fa fa-trash me-1"></i> Delete Section
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
