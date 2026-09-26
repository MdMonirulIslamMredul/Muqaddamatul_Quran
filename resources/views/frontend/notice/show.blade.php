@extends('frontend.master')

@section('title')
    {{ $notice->localized_title }} - মুকাদ্দামাতুল কুরআন ইসলামী একাডেমি
@endsection

@section('content')
<div class="main-content">

    <!-- Hero / Breadcrumbs Banner -->
    <section class="inner-header divider parallax layer-overlay overlay-dark-6 d-print-none" 
             style="background-image: url('{{ asset(optional($banner)->image ?? 'frontend/images/bg/bg1.jpg') }}'); background-size: cover; background-position: center; padding: 50px 0;">
        <div class="container">
            <div class="section-content">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <span class="badge mb-10" style="background-color: #52b788; color: #1b4332; font-size: 13px; font-weight: 700; padding: 6px 16px; border-radius: 20px;">
                            {{ $notice->category_name }}
                        </span>
                        <h1 class="title text-white font-28 font-weight-700 mt-5 mb-5" style="line-height: 1.4; max-width: 900px; margin: 0 auto;">
                            {{ $notice->localized_title }}
                        </h1>
                        <ol class="breadcrumb text-center text-white mt-10" style="background: transparent; margin-bottom: 0;">
                            <li><a href="{{ route('front.page') }}" class="text-white"><i class="fa fa-home me-1"></i>হোম</a></li>
                            <li><a href="{{ route('frontend.notices.index') }}" class="text-white">নোটিশ বোর্ড</a></li>
                            <li class="active text-theme-colored" style="color: #95d5b2;">নোটিশ বিবরণী</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Notice Details Section -->
    <section class="pt-40 pb-70" style="background-color: #f7faf8;">
        <div class="container">
            <div class="row">
                
                <!-- Main Notice Body -->
                <div class="col-md-8 col-sm-12">
                    
                    <div class="notice-detail-card shadow-sm p-30 mb-30" style="background: #ffffff; border-radius: 12px; border: 1px solid #e2ece9; position: relative;">
                        
                        <!-- Official Letterhead Header -->
                        <div class="notice-letterhead pb-20 mb-25 text-center" style="border-bottom: 2px solid #1b4332;">
                            <div style="display: flex; align-items: center; justify-content: center; gap: 15px; margin-bottom: 10px; flex-wrap: wrap;">
                                @php $logo = \App\Models\Logo::latest()->first() @endphp
                                @if($logo && $logo->logo_image1)
                                    <img src="{{ asset($logo->logo_image1) }}" alt="Logo" style="height: 70px; width: 70px; object-fit: contain;">
                                @endif
                                <div class="text-center">
                                    <h3 class="font-weight-700 m-0" style="color: #1b4332; font-size: 22px; line-height: 1.3;">
                                        মুকাদ্দামাতুল কুরআন ইসলামী একাডেমি
                                    </h3>
                                    <h5 class="text-muted m-0" style="font-size: 13.5px; margin-top: 2px;">
                                        Muqaddamatul Quran Islami Academy
                                    </h5>
                                    <small class="text-secondary" style="font-size: 11.5px;">একটি আদর্শ ও আধুনিক দ্বীনি শিক্ষাপ্রতিষ্ঠান</small>
                                </div>
                            </div>
                            <span class="badge" style="background: #1b4332; color: #ffffff; padding: 5px 16px; border-radius: 20px; font-size: 12.5px; letter-spacing: 0.5px; margin-top: 6px;">
                                {{ $notice->category_name }}
                            </span>
                        </div>

                        <!-- Notice Metadata Bar -->
                        <div class="notice-meta-bar p-12 mb-20" style="background: #f1f8f5; border-radius: 8px; display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 10px; border: 1px solid #d8f3dc;">
                            <div style="font-size: 13px; color: #333;">
                                <strong>স্মারক নং:</strong> 
                                <span class="font-monospace text-dark fw-bold" style="background: #fff; padding: 2px 8px; border-radius: 4px; border: 1px solid #c8e6c9;">
                                    {{ $notice->notice_no ?: 'MQIA/NOT/' . $notice->id }}
                                </span>
                            </div>
                            <div style="font-size: 13px; color: #333; display: flex; align-items: center; gap: 12px; flex-wrap: wrap;">
                                <span>
                                    <i class="fa fa-calendar text-theme-colored me-1"></i>
                                    <strong>তারিখ:</strong> {{ \Carbon\Carbon::parse($notice->publish_date)->format('d F, Y') }}
                                </span>
                                <span class="text-muted">|</span>
                                <span class="text-muted" style="font-size: 12px;">
                                    <i class="fa fa-eye me-1"></i>{{ $notice->views_count }} বার পঠিত
                                </span>
                            </div>
                        </div>

                        <!-- Action Toolbar (Download, Print, Share) -->
                        <div class="notice-toolbar d-print-none mb-25 pb-15" style="border-bottom: 1px solid #edf2f4; display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 10px;">
                            
                            <div style="display: flex; gap: 8px; flex-wrap: wrap;">
                                @if($notice->pdf_file)
                                    <a href="{{ route('frontend.notices.download', $notice->id) }}" class="btn btn-sm" style="background: #d90429; color: #ffffff; padding: 6px 16px; border-radius: 6px; font-weight: 600; font-size: 12.5px; text-decoration: none; display: inline-flex; align-items: center; gap: 6px; box-shadow: 0 2px 6px rgba(217, 4, 41, 0.25);">
                                        <i class="fa fa-download"></i>
                                        <span>PDF ডাউনলোড @if($notice->file_size) ({{ $notice->file_size }}) @endif</span>
                                    </a>
                                @endif

                                <button type="button" onclick="window.print()" class="btn btn-sm btn-outline-dark" style="padding: 6px 14px; border-radius: 6px; font-size: 12.5px; font-weight: 600; border: 1px solid #64748b; background: #fff; color: #334155; display: inline-flex; align-items: center; gap: 6px;">
                                    <i class="fa fa-print"></i>
                                    <span>প্রিন্ট করুন</span>
                                </button>
                            </div>

                            <!-- Social Share Buttons -->
                            <div class="share-buttons" style="display: flex; align-items: center; gap: 6px;">
                                <small class="text-muted me-1 font-weight-600">শেয়ার:</small>
                                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}" target="_blank" class="btn btn-xs" style="background: #1877f2; color: #fff; border-radius: 4px; padding: 5px 9px;" title="Share on Facebook">
                                    <i class="fa fa-facebook"></i>
                                </a>
                                <a href="https://api.whatsapp.com/send?text={{ urlencode($notice->localized_title . ' ' . url()->current()) }}" target="_blank" class="btn btn-xs" style="background: #25d366; color: #fff; border-radius: 4px; padding: 5px 9px;" title="Share on WhatsApp">
                                    <i class="fa fa-whatsapp"></i>
                                </a>
                                <button type="button" onclick="copyNoticeLink()" class="btn btn-xs btn-default" style="border-radius: 4px; padding: 5px 9px;" title="Copy Link">
                                    <i class="fa fa-link"></i>
                                </button>
                            </div>

                        </div>

                        <!-- Notice Title -->
                        <div class="notice-title-box mb-20 text-center">
                            <h3 class="font-weight-700 text-dark" style="font-size: 21px; line-height: 1.5; margin: 0 0 6px 0; color: #1b4332;">
                                {{ $notice->localized_title }}
                            </h3>
                            @if($notice->title && $notice->title_bn && $notice->title !== $notice->title_bn)
                                <p class="text-muted fst-italic mb-0" style="font-size: 13.5px;">{{ $notice->title }}</p>
                            @endif
                        </div>

                        <!-- Notice Short Summary Box -->
                        @if($notice->short_des_bn || $notice->short_des)
                            <div class="notice-summary-box p-15 mb-25" style="background: #f8fbf9; border-left: 4px solid #2d6a4f; border-radius: 0 8px 8px 0;">
                                <h6 class="font-weight-700 m-0 mb-5" style="color: #2d6a4f; font-size: 13.5px;">
                                    <i class="fa fa-info-circle me-1"></i> সারসংক্ষেপ:
                                </h6>
                                <p class="m-0" style="font-size: 14px; color: #475569; line-height: 1.6;">
                                    {{ $notice->short_des_bn ?: strip_tags($notice->short_des) }}
                                </p>
                            </div>
                        @endif

                        <!-- Notice Full Content Body -->
                        <div class="notice-full-content text-dark mb-35" style="font-size: 15.5px; line-height: 1.85; color: #1e293b;">
                            @if($notice->long_des_bn)
                                {!! $notice->long_des_bn !!}
                            @elseif($notice->long_des)
                                {!! $notice->long_des !!}
                            @else
                                <p class="text-secondary">এই বিজ্ঞপ্তির বিস্তারিত বিষয়বস্তু দেখতে অনুগ্রহ করে নিচে সংযুক্ত অফিসিয়াল নথিটি পড়ুন বা ডাউনলোড করুন।</p>
                            @endif
                        </div>

                        <!-- Embedded PDF / File Viewer (if attachment exists) -->
                        @if($notice->pdf_file)
                            <div class="notice-attachment-viewer mt-30 p-20 d-print-none" style="background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 10px;">
                                <div class="d-flex justify-content-between align-items-center mb-15 flex-wrap" style="display: flex; justify-content: space-between; align-items: center; gap: 10px;">
                                    <div style="display: flex; align-items: center; gap: 10px;">
                                        <i class="fa fa-file-pdf-o text-danger" style="font-size: 28px;"></i>
                                        <div>
                                            <h5 class="m-0 font-weight-700 text-dark" style="font-size: 15px;">
                                                সংযুক্ত অফিসিয়াল নথি (Official Attachment)
                                            </h5>
                                            <small class="text-muted">ফাইল ফরম্যাট: {{ strtoupper($notice->file_type ?: 'PDF') }} @if($notice->file_size) | সাইজ: {{ $notice->file_size }} @endif</small>
                                        </div>
                                    </div>
                                    <div style="display: flex; gap: 8px; flex-wrap: wrap;">
                                        <a href="{{ asset($notice->pdf_file) }}" target="_blank" class="btn btn-sm btn-outline-danger" style="padding: 6px 14px; border-radius: 6px; font-weight: 600; border: 1px solid #dc2626; color: #dc2626; text-decoration: none; background: #fff;">
                                            <i class="fa fa-external-link me-1"></i> নতুন ট্যাবে খুলুন
                                        </a>
                                        <a href="{{ route('frontend.notices.download', $notice->id) }}" class="btn btn-sm" style="background: #1b4332; color: #fff; padding: 6px 16px; border-radius: 6px; font-weight: 600; text-decoration: none; display: inline-flex; align-items: center; gap: 6px;">
                                            <i class="fa fa-cloud-download"></i>
                                            <span>ডাউনলোড করুন</span>
                                        </a>
                                    </div>
                                </div>

                                @if($notice->is_pdf)
                                    <div class="pdf-frame-wrapper" style="border: 1px solid #cbd5e1; border-radius: 8px; overflow: hidden; height: 600px; background: #f1f5f9;">
                                        <iframe src="{{ asset($notice->pdf_file) }}#toolbar=1" width="100%" height="100%" frameborder="0" allowfullscreen style="display: block; width: 100%; height: 600px;"></iframe>
                                    </div>
                                @elseif($notice->is_image)
                                    <div class="image-preview-wrapper text-center">
                                        <img src="{{ asset($notice->pdf_file) }}" alt="Notice Document" class="img-responsive rounded shadow-sm" style="max-height: 700px; margin: 0 auto; border: 1px solid #cbd5e1;">
                                    </div>
                                @endif
                            </div>
                        @endif

                        <!-- Letterhead Footer Signatures -->
                        <div class="notice-signatures row pt-30 mt-35" style="border-top: 1px solid #e2ece9;">
                            <div class="col-xs-6 text-center">
                                <br><br>
                                <div style="border-top: 1px solid #333; width: 140px; margin: 0 auto; padding-top: 4px;">
                                    <small class="d-block font-weight-700 text-dark">অফিস প্রশাসন</small>
                                    <small class="text-muted" style="font-size: 11px;">মুকাদ্দামাতুল কুরআন একাডেমি</small>
                                </div>
                            </div>
                            <div class="col-xs-6 text-center">
                                <br><br>
                                <div style="border-top: 1px solid #333; width: 140px; margin: 0 auto; padding-top: 4px;">
                                    <small class="d-block font-weight-700 text-dark">মুহতামিম / প্রিন্সিপাল</small>
                                    <small class="text-muted" style="font-size: 11px;">মুকাদ্দামাতুল কুরআন একাডেমি</small>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- Bottom Navigation Back Link -->
                    <div class="d-print-none text-center mb-30">
                        <a href="{{ route('frontend.notices.index') }}" class="btn btn-theme-colored btn-sm font-weight-600" style="background-color: #1b4332; color: #fff; padding: 8px 24px; border-radius: 25px; display: inline-flex; align-items: center; gap: 8px;">
                            <i class="fa fa-arrow-left"></i>
                            <span>সকল নোটিশ তালিকায় ফিরে যান</span>
                        </a>
                    </div>

                </div>

                <!-- Right Sidebar -->
                <div class="col-md-4 col-sm-12 d-print-none">
                    <div class="sidebar sidebar-right mt-sm-30">
                        
                        <!-- Admission CTA Widget -->
                        <div class="widget shadow-sm p-25 text-center mb-30" style="background: linear-gradient(135deg, #1b4332 0%, #2d6a4f 100%); color: #ffffff; border-radius: 12px;">
                            <i class="fa fa-graduation-cap" style="font-size: 38px; color: #95d5b2; margin-bottom: 10px;"></i>
                            <h4 class="text-white font-weight-700 mb-10">ভর্তি সংক্রান্ত তথ্য</h4>
                            <p style="color: #d8f3dc; font-size: 13px; line-height: 1.6; margin-bottom: 20px;">
                                নতুন শিক্ষাবর্ষে ভর্তির নির্দেশিকা ও ফি কাঠামো দেখতে নিচে ক্লিক করুন।
                            </p>
                            <a href="{{ route('admission.guidelines') }}" class="btn btn-sm font-weight-700" style="background-color: #ffffff !important; color: #1b4332 !important; padding: 8px 24px; border-radius: 25px; border: none; box-shadow: 0 4px 10px rgba(0,0,0,0.15); display: inline-block; text-decoration: none;">
                                ভর্তি নির্দেশিকা দেখুন
                            </a>
                        </div>

                        <!-- Recent Notices Widget -->
                        <div class="widget shadow-sm p-20 mb-30" style="background: #ffffff; border-radius: 12px; border: 1px solid #e2ece9;">
                            <h4 class="widget-title line-bottom font-weight-700 mb-20" style="color: #1b4332; font-size: 16px;">
                                অন্যান্য সাম্প্রতিক নোটিশ
                            </h4>
                            <div class="latest-notices-list" style="display: flex; flex-direction: column; gap: 12px;">
                                @foreach($recentNotices as $rNotice)
                                    <div style="display: flex; gap: 10px; align-items: flex-start; padding-bottom: 10px; border-bottom: 1px dashed #e2ece9;">
                                        <div style="flex-shrink: 0; width: 45px; height: 45px; background: #eef5f2; border-radius: 6px; display: flex; flex-direction: column; align-items: center; justify-content: center; color: #1b4332; text-align: center; line-height: 1;">
                                            <span style="font-weight: 800; font-size: 15px;">{{ \Carbon\Carbon::parse($rNotice->publish_date)->format('d') }}</span>
                                            <span style="font-size: 10px; font-weight: 600; text-transform: uppercase;">{{ \Carbon\Carbon::parse($rNotice->publish_date)->format('M') }}</span>
                                        </div>
                                        <div style="min-width: 0;">
                                            <a href="{{ route('frontend.notices.show', $rNotice->id) }}" style="color: #1b4332; font-size: 13px; font-weight: 600; text-decoration: none; line-height: 1.4; display: block;" onmouseover="this.style.color='#52b788'" onmouseout="this.style.color='#1b4332'">
                                                {!! html_entity_decode(Str::limit($rNotice->localized_title, 50)) !!}
                                            </a>
                                            <small class="text-muted" style="font-size: 11px;">
                                                <span class="badge" style="background: #e2ece9; color: #1b4332; font-size: 10px; padding: 2px 6px;">{{ $rNotice->category_name }}</span>
                                            </small>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>

</div>

<script>
function copyNoticeLink() {
    if (navigator.clipboard && window.isSecureContext) {
        navigator.clipboard.writeText(window.location.href).then(function() {
            alert('নোটিশের লিংক সফলভাবে কপি করা হয়েছে!');
        });
    } else {
        var tempInput = document.createElement('input');
        tempInput.value = window.location.href;
        document.body.appendChild(tempInput);
        tempInput.select();
        document.execCommand('copy');
        document.body.removeChild(tempInput);
        alert('নোটিশের লিংক কপি করা হয়েছে!');
    }
}
</script>

<style>
@media print {
    .header, .footer, .inner-header, .sidebar, .d-print-none {
        display: none !important;
    }
    .notice-detail-card {
        border: none !important;
        box-shadow: none !important;
        padding: 0 !important;
    }
    body {
        background: #fff !important;
    }
}
</style>
@endsection
