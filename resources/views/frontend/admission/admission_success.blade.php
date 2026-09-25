@extends('frontend.master')

@section('title')
    ভর্তি আবেদন সফল | {{ $admission->application_no }}
@endsection

@section('content')
<style>
    .success-hero {
        background: linear-gradient(135deg, #15803d 0%, #166534 100%);
        color: #fff;
        padding: 50px 0 35px;
        text-align: center;
    }
    .slip-card {
        background: #ffffff;
        border-radius: 16px;
        border: 1px solid #e2e8f0;
        box-shadow: 0 10px 30px rgba(0,0,0,0.06);
        padding: 35px;
        margin-top: -25px;
        margin-bottom: 50px;
    }
    .tracking-badge {
        font-size: 22px;
        font-weight: 800;
        letter-spacing: 1px;
        color: #166534;
        background: #dcfce7;
        padding: 8px 24px;
        border-radius: 30px;
        display: inline-block;
        border: 2px dashed #86efac;
    }
    .instruction-step {
        display: flex;
        align-items: flex-start;
        gap: 15px;
        padding: 12px 0;
        border-bottom: 1px solid #f1f5f9;
    }
    .step-icon {
        width: 32px;
        height: 32px;
        border-radius: 50%;
        background: #166534;
        color: #fff;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: bold;
        flex-shrink: 0;
    }
</style>

<section class="success-hero">
    <div class="container">
        <div style="font-size: 50px; color: #86efac; margin-bottom: 10px;">
            <i class="fa fa-check-circle"></i>
        </div>
        <h2 class="text-white fw-bold mb-2">আলহামদুলিল্লাহ! আপনার ভর্তি আবেদনটি সফলভাবে জমা হয়েছে</h2>
        <p class="text-white-50 mb-0">মুকাদ্দামাতুল কুরআন হিফজ মাদ্রাসায় ভর্তির আবেদন করার জন্য ধন্যবাদ।</p>
    </div>
</section>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="slip-card">

                <div class="text-center mb-4 pb-3 border-bottom">
                    <p class="text-muted mb-1 font-weight-bold">আপনার আবেদন ট্র্যাকিং নম্বর (Application No):</p>
                    <div class="tracking-badge">
                        {{ $admission->application_no }}
                    </div>
                    <p class="small text-muted mt-2">
                        ভর্তি পরীক্ষার ফলাফল ও অগ্রগতি জানতে এই নম্বরটি সংরক্ষণ করুন।
                    </p>
                </div>

                <div class="row g-4">
                    <!-- Applicant Summary -->
                    <div class="col-md-6">
                        <div class="card bg-light border-0 rounded-3 p-3 h-100">
                            <h5 class="fw-bold text-success mb-3"><i class="fa fa-user me-2"></i>আবেদনকারীর সংক্ষিপ্ত বিবরণ</h5>
                            <table class="table table-sm table-borderless mb-0">
                                <tr>
                                    <th class="text-muted" style="width: 40%;">শিক্ষার্থীর নাম:</th>
                                    <td class="fw-bold">{{ $admission->student_name_bn }} ({{ $admission->student_name_en }})</td>
                                </tr>
                                <tr>
                                    <th class="text-muted">পিতার নাম:</th>
                                    <td>{{ $admission->father_name_bn }}</td>
                                </tr>
                                <tr>
                                    <th class="text-muted">কাঙ্ক্ষিত শ্রেণি:</th>
                                    <td><span class="badge bg-primary">{{ $admission->desired_class }}</span></td>
                                </tr>
                                <tr>
                                    <th class="text-muted">বিভাগ:</th>
                                    <td>{{ $admission->department_division ?: 'সাধারণ' }}</td>
                                </tr>
                                <tr>
                                    <th class="text-muted">ভর্তির ধরন:</th>
                                    <td>{{ ucfirst($admission->residential_type) }}</td>
                                </tr>
                                <tr>
                                    <th class="text-muted">যোগাযোগ:</th>
                                    <td>{{ $admission->mobile }}</td>
                                </tr>
                                <tr>
                                    <th class="text-muted">আবেদনের তারিখ:</th>
                                    <td>{{ $admission->created_at->format('d M, Y h:i A') }}</td>
                                </tr>
                                <tr>
                                    <th class="text-muted">বর্তমান অবস্থা:</th>
                                    <td>{!! $admission->status_badge !!}</td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <!-- Next Steps & Instructions -->
                    <div class="col-md-6">
                        <div class="card bg-light border-0 rounded-3 p-3 h-100">
                            <h5 class="fw-bold text-success mb-3"><i class="fa fa-info-circle me-2"></i>পরবর্তী করণীয় ও নির্দেশনাবলী</h5>
                            
                            <div class="instruction-step">
                                <span class="step-icon">১</span>
                                <div>
                                    <strong class="d-block text-dark">আবেদন ফরম প্রিন্ট করুন</strong>
                                    <span class="small text-muted">নিচের প্রিন্ট বাটনে ক্লিক করে ৫ পৃষ্ঠার পূরণকৃত মূল আবেদন ফরমটি সংরক্ষণ বা প্রিন্ট করুন।</span>
                                </div>
                            </div>

                            <div class="instruction-step">
                                <span class="step-icon">২</span>
                                <div>
                                    <strong class="d-block text-dark">প্রয়োজনীয় কাগজপত্র প্রস্তুত রাখুন</strong>
                                    <span class="small text-muted">শিক্ষার্থীর ৪ কপি ও অভিভাবকের ২ কপি পাসপোর্ট সাইজ ছবি, জন্মনিবন্ধন ও NID ফটোকপি সাথে রাখুন।</span>
                                </div>
                            </div>

                            <div class="instruction-step">
                                <span class="step-icon">৩</span>
                                <div>
                                    <strong class="d-block text-dark">ভর্তি পরীক্ষা ও সাক্ষাত্কার</strong>
                                    <span class="small text-muted">মাদ্রাসা অফিস থেকে ভর্তি পরীক্ষার তারিখ ও সময় মোবাইলে এসএমএস বা ফোন করে জানানো হবে।</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="text-center mt-4 pt-3 border-top d-flex flex-wrap justify-content-center gap-3">
                    <a href="{{ route('admission.print', $admission->id) }}" target="_blank" class="btn btn-success btn-lg px-4 py-2 fw-bold">
                        <i class="fa fa-print me-2"></i> আবেদন ফরম প্রিন্ট / ডাউনলোড করুন
                    </a>
                    <a href="{{ route('admission.status', ['query' => $admission->application_no]) }}" class="btn btn-outline-success btn-lg px-4 py-2 fw-bold">
                        <i class="fa fa-search me-2"></i> অবস্থা দেখুন
                    </a>
                    <a href="{{ url('/') }}" class="btn btn-light btn-lg px-4 py-2 border">
                        <i class="fa fa-home me-2"></i> হোমে ফিরে যান
                    </a>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection
