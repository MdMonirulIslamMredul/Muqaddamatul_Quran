@php
    $homeNotices = \App\Models\Notice::active()
        ->orderBy('is_pinned', 'desc')
        ->orderBy('publish_date', 'desc')
        ->take(6)
        ->get();
    $pinnedNotice = $homeNotices->where('is_pinned', 1)->first() ?? $homeNotices->first();
    $otherNotices = $homeNotices->where('id', '!=', optional($pinnedNotice)->id)->take(5);
@endphp

@if($homeNotices->isNotEmpty())
<section id="notice-board-section" class="pt-45 pb-45" style="background: linear-gradient(180deg, #f8fbf9 0%, #ffffff 100%); border-top: 1px solid #e2ece9; border-bottom: 1px solid #e2ece9;">
    <div class="container">
        
        <!-- Section Header -->
        <div class="section-title text-center mb-25">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <span class="text-uppercase font-weight-700" style="color: #2d6a4f; letter-spacing: 2px; font-size: 13px;">
                        @if(session()->get('language') == 'bangla') একাডেমির জরুরি বার্তা @elseif(session()->get('language') == 'arabic') تنبيهات وإعلانات @else Academy Announcements @endif
                    </span>
                    <h2 class="text-uppercase mt-5 mb-10 font-weight-700" style="color: #1b4332;">
                        @if(session()->get('language') == 'bangla') 
                            বিজ্ঞপ্তি ও <span style="color: #52b788;">নোটিশ বোর্ড</span>
                        @elseif(session()->get('language') == 'arabic')
                            لوحة <span style="color: #52b788;">الإعلانات والأخبار</span>
                        @else
                            Notice & <span style="color: #52b788;">Announcements</span>
                        @endif
                    </h2>
                    <div style="width: 60px; height: 3px; background: #52b788; margin: 0 auto 15px auto; border-radius: 2px;"></div>
                    <p class="text-secondary" style="font-size: 14px;">
                        @if(session()->get('language') == 'bangla')
                            মুকাদ্দামাতুল কুরআন ইসলামী একাডেমির ভর্তি, পরীক্ষা, ক্লাস রুটিন ও প্রাতিষ্ঠানিক সকল নোটিশ
                        @elseif(session()->get('language') == 'arabic')
                            جميع الإعلانات الرسمية الصادرة عن إدارة أكاديمية مقدمة القرآن الإسلامية
                        @else
                            Official notices, academic schedules, admission updates and institutional news
                        @endif
                    </p>
                </div>
            </div>
        </div>

        <div class="row">
            
            <!-- Left Column: Featured / Top Notice Spotlight -->
            @if($pinnedNotice)
            <div class="col-lg-5 col-md-6 mb-sm-30">
                <div class="featured-notice-card" style="background: #ffffff; border-radius: 12px; border: 1px solid #d8f3dc; box-shadow: 0 10px 30px rgba(45, 106, 79, 0.08); padding: 25px; height: 100%; display: flex; flex-direction: column; justify-content: space-between; position: relative; overflow: hidden;">
                    
                    <!-- Decorative Top Corner ribbon -->
                    <div style="position: absolute; top: 0; right: 0; background: linear-gradient(135deg, #1b4332 0%, #2d6a4f 100%); color: #fff; padding: 4px 20px; font-size: 11px; font-weight: bold; border-bottom-left-radius: 10px; box-shadow: 0 2px 5px rgba(0,0,0,0.1);">
                        @if($pinnedNotice->is_pinned)
                            📌 @if(session()->get('language') == 'bangla') বিশেষ বিজ্ঞপ্তি @else Important @endif
                        @else
                            ⭐ @if(session()->get('language') == 'bangla') সর্বশেষ নোটিশ @else Latest @endif
                        @endif
                    </div>

                    <div>
                        <!-- Date & Category -->
                        <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 15px;">
                            <span class="badge" style="background-color: #2d6a4f; color: #fff; padding: 5px 12px; border-radius: 6px; font-size: 12px; font-weight: 600;">
                                {{ $pinnedNotice->category_name }}
                            </span>
                            <span style="color: #6c757d; font-size: 12px; display: inline-flex; align-items: center; gap: 4px;">
                                <i class="fa fa-calendar-check-o text-theme-colored"></i> 
                                {{ \Carbon\Carbon::parse($pinnedNotice->publish_date)->format('d F, Y') }}
                            </span>
                        </div>

                        <!-- Ref No -->
                        @if($pinnedNotice->notice_no)
                            <div style="font-size: 11px; color: #888; font-family: monospace; margin-bottom: 8px;">
                                <i class="fa fa-tag text-muted me-1"></i> {{ $pinnedNotice->notice_no }}
                            </div>
                        @endif

                        <!-- Title -->
                        <h4 style="color: #1b4332; font-weight: 700; line-height: 1.4; margin-top: 0; margin-bottom: 15px; font-size: 18px;">
                            <a href="{{ route('frontend.notices.show', $pinnedNotice->id) }}" style="color: #1b4332; text-decoration: none; transition: color 0.2s;" onmouseover="this.style.color='#2d6a4f'" onmouseout="this.style.color='#1b4332'">
                                {{ $pinnedNotice->localized_title }}
                            </a>
                        </h4>

                        <!-- Summary -->
                        <p style="color: #555555; font-size: 13.5px; line-height: 1.7; margin-bottom: 20px;">
                            {{ Str::limit($pinnedNotice->localized_short_des ?: strip_tags($pinnedNotice->localized_long_des), 180) }}
                        </p>
                    </div>

                    <!-- Card Actions Bottom -->
                    <div style="display: flex; align-items: center; justify-content: space-between; border-top: 1px solid #edf2f4; padding-top: 15px; flex-wrap: wrap; gap: 10px;">
                        <a href="{{ route('frontend.notices.show', $pinnedNotice->id) }}" class="btn btn-sm" style="background: #2d6a4f; color: #ffffff; padding: 6px 16px; border-radius: 6px; font-weight: 600; font-size: 12px; text-decoration: none; display: inline-flex; align-items: center; gap: 6px;">
                            <span>@if(session()->get('language') == 'bangla') বিস্তারিত পড়ুন @elseif(session()->get('language') == 'arabic') قراءة المزيد @else Read Details @endif</span>
                            <i class="fa fa-arrow-circle-right"></i>
                        </a>

                        @if($pinnedNotice->pdf_file)
                            <a href="{{ route('frontend.notices.download', $pinnedNotice->id) }}" class="btn btn-sm btn-outline-danger" style="padding: 5px 12px; border-radius: 6px; font-size: 12px; font-weight: 600; display: inline-flex; align-items: center; gap: 6px; border: 1px solid #d90429; color: #d90429; text-decoration: none;" onmouseover="this.style.background='#d90429'; this.style.color='#fff';" onmouseout="this.style.background='transparent'; this.style.color='#d90429';">
                                <i class="fa fa-file-pdf-o"></i>
                                <span>PDF ডাউনলোড</span>
                            </a>
                        @endif
                    </div>

                </div>
            </div>
            @endif

            <!-- Right Column: Notice List -->
            <div class="{{ $pinnedNotice ? 'col-lg-7 col-md-6' : 'col-md-12' }}">
                <div class="notice-list-card" style="background: #ffffff; border-radius: 12px; border: 1px solid #e2ece9; box-shadow: 0 10px 30px rgba(0,0,0,0.04); padding: 15px 20px;">
                    
                    <div class="notice-items-container" style="display: flex; flex-direction: column; gap: 12px;">
                        @foreach($otherNotices as $notice)
                            <div class="notice-item" style="display: flex; align-items: center; justify-content: space-between; gap: 15px; padding: 12px 14px; border-radius: 8px; background: #fbfdfc; border: 1px solid #edf4f2; transition: all 0.25s ease;" onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 4px 12px rgba(0,0,0,0.06)'; this.style.borderColor='#b7e4c7';" onmouseout="this.style.transform='none'; this.style.boxShadow='none'; this.style.borderColor='#edf4f2';">
                                
                                <!-- Left: Date Badge -->
                                <div class="notice-date-badge flex-shrink-0" style="flex-shrink: 0; width: 62px; height: 60px; background: linear-gradient(145deg, #1b4332 0%, #2d6a4f 100%); color: #ffffff; border-radius: 8px; display: flex; flex-direction: column; align-items: center; justify-content: center; text-align: center; line-height: 1;">
                                    <span style="font-size: 18px; font-weight: 800; color: #ffffff;">
                                        {{ \Carbon\Carbon::parse($notice->publish_date)->format('d') }}
                                    </span>
                                    <span style="font-size: 11px; font-weight: 600; text-transform: uppercase; color: #95d5b2; margin-top: 3px;">
                                        {{ \Carbon\Carbon::parse($notice->publish_date)->format('M') }}
                                    </span>
                                </div>

                                <!-- Middle: Title & Meta -->
                                <div class="notice-item-content" style="flex-grow: 1; min-width: 0;">
                                    <div style="display: flex; align-items: center; gap: 8px; margin-bottom: 4px; flex-wrap: wrap;">
                                        <span class="badge" style="background-color: rgba(45, 106, 79, 0.12); color: #1b4332; font-size: 10.5px; padding: 2px 8px; border-radius: 4px; font-weight: 600;">
                                            {{ $notice->category_name }}
                                        </span>
                                        @if($notice->is_pinned)
                                            <span class="badge" style="background-color: #ffc107; color: #000; font-size: 10px; padding: 2px 6px; border-radius: 3px; font-weight: bold;">
                                                📌 পিন্ড
                                            </span>
                                        @endif
                                        <small class="text-muted" style="font-size: 11px;">
                                            {{ \Carbon\Carbon::parse($notice->publish_date)->format('Y') }}
                                        </small>
                                    </div>

                                    <h5 style="margin: 0; font-size: 14.5px; font-weight: 600; line-height: 1.4; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                        <a href="{{ route('frontend.notices.show', $notice->id) }}" style="color: #1b4332; text-decoration: none; transition: color 0.2s;" onmouseover="this.style.color='#52b788'" onmouseout="this.style.color='#1b4332'">
                                            {{ $notice->localized_title }}
                                        </a>
                                    </h5>
                                </div>

                                <!-- Right: Download / View button -->
                                <div class="notice-item-actions flex-shrink-0" style="flex-shrink: 0; display: flex; align-items: center; gap: 8px;">
                                    @if($notice->pdf_file)
                                        <a href="{{ route('frontend.notices.download', $notice->id) }}" class="btn btn-xs" title="PDF ডাউনলোড করুন" style="background: #fee2e2; color: #dc2626; border-radius: 6px; padding: 5px 10px; font-size: 12px; font-weight: 600; text-decoration: none; display: inline-flex; align-items: center; gap: 4px;">
                                            <i class="fa fa-download"></i>
                                            <span class="hidden-xs">PDF</span>
                                        </a>
                                    @endif
                                    <a href="{{ route('frontend.notices.show', $notice->id) }}" class="btn btn-xs" title="বিস্তারিত দেখুন" style="background: #e2ece9; color: #1b4332; border-radius: 6px; padding: 5px 10px; font-size: 12px; text-decoration: none;">
                                        <i class="fa fa-angle-right"></i>
                                    </a>
                                </div>

                            </div>
                        @endforeach
                    </div>

                    <!-- Bottom All Notices Link -->
                    <div class="text-center mt-20 pt-15" style="border-top: 1px solid #edf4f2;">
                        <a href="{{ route('frontend.notices.index') }}" class="btn btn-theme-colored btn-sm font-weight-600" style="background-color: #1b4332; color: #fff; padding: 8px 24px; border-radius: 25px; display: inline-flex; align-items: center; gap: 8px; text-decoration: none; box-shadow: 0 4px 12px rgba(27,67,50,0.2);">
                            <span>
                                @if(session()->get('language') == 'bangla') 
                                    সকল নোটিশ ও বিজ্ঞপ্তি দেখুন 
                                @elseif(session()->get('language') == 'arabic')
                                    عرض جميع الإعلانات
                                @else
                                    View All Notices & Archive
                                @endif
                            </span>
                            <i class="fa fa-arrow-right"></i>
                        </a>
                    </div>

                </div>
            </div>

        </div>

    </div>
</section>
@endif
