@php
    $tickerNotices = \App\Models\Notice::active()->ticker()->orderBy('is_pinned', 'desc')->latest('publish_date')->take(10)->get();
@endphp

@if($tickerNotices->isNotEmpty())
<div class="notice-ticker-wrapper" style="background: linear-gradient(90deg, #1b4332 0%, #2d6a4f 100%); color: #ffffff; border-bottom: 2px solid #52b788; box-shadow: 0 2px 8px rgba(0,0,0,0.12); position: relative; z-index: 99;">
    <div class="container" style="padding: 0 5px;">
        <div class="d-flex align-items-center" style="display: flex; align-items: center; min-height: 42px; overflow: hidden;">
            
            <!-- Ticker Label Badge (Clickable) -->
            <a href="{{ route('frontend.notices.index') }}" class="ticker-badge flex-shrink-0 text-decoration-none" style="flex-shrink: 0; display: inline-flex; align-items: center; gap: 6px; background-color: #d90429; color: #ffffff !important; padding: 4px 14px; border-radius: 4px; font-weight: 700; font-size: 13px; letter-spacing: 0.5px; z-index: 2; box-shadow: 2px 0 6px rgba(0,0,0,0.2); text-decoration: none; cursor: pointer; transition: background-color 0.2s, transform 0.15s;" onmouseover="this.style.backgroundColor='#b7092b'; this.style.transform='scale(1.03)';" onmouseout="this.style.backgroundColor='#d90429'; this.style.transform='scale(1)';" title="@if(session()->get('language') == 'bangla') সকল নোটিশ দেখুন @else View All Notices @endif">
                <i class="fa fa-bullhorn" style="font-size: 14px; animation: ticker-pulse 1.5s infinite;"></i>
                <span class="hidden-xs ticker-badge-text">
                    @if(session()->get('language') == 'bangla' || !session()->has('language'))
                        নোটিশ বোর্ড
                    @elseif(session()->get('language') == 'arabic')
                        لوحة الإعلانات
                    @else
                        NOTICE
                    @endif
                </span>
            </a>

            <!-- Ticker Marquee Content -->
            <div class="ticker-content" style="flex-grow: 1; overflow: hidden; white-space: nowrap; margin-left: 15px; position: relative;">
                <marquee behavior="scroll" direction="left" scrollamount="6" onmouseover="this.stop();" onmouseout="this.start();" style="display: flex; align-items: center; vertical-align: middle; margin: 0; padding-top: 2px;">
                    @foreach($tickerNotices as $tNotice)
                        <span class="ticker-item" style="display: inline-flex; align-items: center; margin-right: 35px; font-size: 13px;">
                            @if($tNotice->is_pinned)
                                <span class="badge" style="background-color: #ffb703; color: #000; font-size: 10px; padding: 2px 6px; border-radius: 3px; margin-right: 6px; font-weight: bold;">
                                    📌 @if(session()->get('language') == 'bangla') জরুরি @else Urgent @endif
                                </span>
                            @else
                                <span class="badge" style="background-color: rgba(255,255,255,0.2); color: #fff; font-size: 10px; padding: 2px 6px; border-radius: 3px; margin-right: 6px;">
                                    {{ $tNotice->category_name }}
                                </span>
                            @endif

                            <a href="{{ route('frontend.notices.show', $tNotice->id) }}" style="color: #ffffff; text-decoration: none; font-weight: 600; transition: color 0.2s;" onmouseover="this.style.color='#95d5b2'" onmouseout="this.style.color='#ffffff'">
                                {{ $tNotice->localized_title }}
                            </a>

                            <span class="ticker-date" style="color: #b7e4c7; font-size: 11px; margin-left: 8px;">
                                ({{ \Carbon\Carbon::parse($tNotice->publish_date)->format('d M, Y') }})
                            </span>

                            <span style="color: rgba(255,255,255,0.4); margin-left: 20px;">✦</span>
                        </span>
                    @endforeach
                </marquee>
            </div>

            <!-- View All Button -->
            <div class="ticker-all flex-shrink-0 hidden-xs" style="flex-shrink: 0; margin-left: 15px;">
                <a href="{{ route('frontend.notices.index') }}" style="color: #d8f3dc; font-size: 12px; font-weight: 600; text-decoration: none; display: inline-flex; align-items: center; gap: 4px; background: rgba(255,255,255,0.12); padding: 3px 10px; border-radius: 4px; border: 1px solid rgba(255,255,255,0.2); transition: all 0.2s;" onmouseover="this.style.background='rgba(255,255,255,0.25)'" onmouseout="this.style.background='rgba(255,255,255,0.12)'">
                    <span>@if(session()->get('language') == 'bangla') সকল নোটিশ @elseif(session()->get('language') == 'arabic') جميع الإعلانات @else All Notices @endif</span>
                    <i class="fa fa-angle-double-right"></i>
                </a>
            </div>

        </div>
    </div>
</div>

<style>
@keyframes ticker-pulse {
    0% { transform: scale(1); }
    50% { transform: scale(1.15); }
    100% { transform: scale(1); }
}

@media (max-width: 767px) {
    .ticker-badge-text {
        display: none !important;
    }
    .ticker-badge {
        padding: 5px 10px !important;
        min-width: 34px !important;
        justify-content: center !important;
    }
    .ticker-content {
        margin-left: 8px !important;
    }
}
</style>
@endif
