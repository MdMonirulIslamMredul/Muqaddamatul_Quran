@php
    $links = App\Models\WebsiteLinks::latest()->first();
    $logo = \App\Models\Logo::latest()->first();
    $footerNotices = \App\Models\Notice::active()->latest('publish_date')->take(3)->get();
    $footer = App\Models\FooterDetail::latest()->first();
@endphp

<!-- Modern Redesigned Islamic Theme Footer -->
<footer id="footer" class="footer" style="background: linear-gradient(180deg, #0b291b 0%, #061910 100%); color: #e2ece9; border-top: 4px solid #2d6a4f; position: relative;">
    
    <!-- Top Footer Main Section -->
    <div class="container pt-60 pb-40">
        <div class="row">
            
            <!-- Column 1: Institution Info & Contacts -->
            <div class="col-sm-6 col-md-4 mb-30">
                <div class="footer-widget" style="padding-right: 15px;">
                    <div style="display: flex; align-items: center; gap: 12px; margin-bottom: 15px;">
                        @if($logo && $logo->logo_image1)
                            <img src="{{ asset($logo->logo_image1) }}" alt="Logo" style="width: 60px; height: 60px; object-fit: contain; background: #fff; padding: 3px; border-radius: 50%; box-shadow: 0 4px 10px rgba(0,0,0,0.3);">
                        @endif
                        <div>
                            <h4 style="color: #ffffff; font-size: 18px; font-weight: 700; margin: 0; line-height: 1.3;">
                                @if(session()->get('language') == 'bangla')
                                    মুকাদ্দামাতুল কুরআন ইসলামী একাডেমি
                                @elseif(session()->get('language') == 'arabic')
                                    أكاديمية مقدمة القرآن الإسلامية
                                @else
                                    {{ $logo->site_name ?? 'Muqaddamatul Quran Islami Academy' }}
                                @endif
                            </h4>
                            <small style="color: #95d5b2; font-size: 12px;">
                                @if(session()->get('language') == 'bangla')
                                    একটি আদর্শ ও আধুনিক দ্বীনি শিক্ষাপ্রতিষ্ঠান
                                @elseif(session()->get('language') == 'arabic')
                                    مؤسسة تعليمية دينية نموذجية ومعاصرة
                                @else
                                    An exemplary and modern Islamic educational institution
                                @endif
                            </small>
                        </div>
                    </div>

                    <p style="color: #b7d5c8; font-size: 13.5px; line-height: 1.7; margin-bottom: 18px;">
                        @if(session()->get('language') == 'bangla')
                            সহীহ কুরআন তিলাওয়াত, হিফজুল কুরআন, আরবি ভাষা ও দ্বীনি শিক্ষার এক অনন্য নির্ভরযোগ্য প্রতিষ্ঠান।
                        @elseif(session()->get('language') == 'arabic')
                            صرح تعليمي موثوق لتعليم تلاوة القرآن الكريم وحفظه واللغة العربية والعلوم الشرعية.
                        @else
                            A trusted center for authentic Quran recitation, Hifz, Arabic language, and Islamic studies.
                        @endif
                    </p>

                    <div class="footer-contact-list" style="display: flex; flex-direction: column; gap: 10px; font-size: 13px;">
                        @if($links && $links->address)
                            <div style="display: flex; align-items: flex-start; gap: 10px; color: #d8f3dc;">
                                <i class="fa fa-map-marker" style="color: #52b788; font-size: 16px; margin-top: 2px; flex-shrink: 0;"></i>
                                <span>{{ $links->address }}</span>
                            </div>
                        @endif

                        @if($links && $links->number)
                            <div style="display: flex; align-items: center; gap: 10px;">
                                <i class="fa fa-phone" style="color: #52b788; font-size: 15px; flex-shrink: 0;"></i>
                                <a href="tel:{{ $links->number }}" style="color: #ffffff; font-weight: 600; text-decoration: none;" onmouseover="this.style.color='#95d5b2'" onmouseout="this.style.color='#ffffff'">
                                    {{ $links->number }}
                                </a>
                            </div>
                        @endif

                        @if($links && $links->email)
                            <div style="display: flex; align-items: center; gap: 10px;">
                                <i class="fa fa-envelope-o" style="color: #52b788; font-size: 15px; flex-shrink: 0;"></i>
                                <a href="mailto:{{ $links->email }}" style="color: #d8f3dc; text-decoration: none;" onmouseover="this.style.color='#ffffff'" onmouseout="this.style.color='#d8f3dc'">
                                    {{ $links->email }}
                                </a>
                            </div>
                        @endif
                    </div>

                    <!-- Social Icons -->
                    @if($links)
                        <div class="footer-social-links mt-20" style="display: flex; align-items: center; gap: 10px;">
                            @if($links->facebook)
                                <a href="{{ $links->facebook }}" target="_blank" style="width: 34px; height: 34px; border-radius: 50%; background: rgba(255,255,255,0.1); color: #fff; display: flex; align-items: center; justify-content: center; text-decoration: none; transition: all 0.3s;" onmouseover="this.style.background='#1877f2'; this.style.transform='translateY(-2px)';" onmouseout="this.style.background='rgba(255,255,255,0.1)'; this.style.transform='none';">
                                    <i class="fa fa-facebook"></i>
                                </a>
                            @endif
                            @if($links->youtube)
                                <a href="{{ $links->youtube }}" target="_blank" style="width: 34px; height: 34px; border-radius: 50%; background: rgba(255,255,255,0.1); color: #fff; display: flex; align-items: center; justify-content: center; text-decoration: none; transition: all 0.3s;" onmouseover="this.style.background='#ff0000'; this.style.transform='translateY(-2px)';" onmouseout="this.style.background='rgba(255,255,255,0.1)'; this.style.transform='none';">
                                    <i class="fa fa-youtube-play"></i>
                                </a>
                            @endif
                            @if($links->linkedIn)
                                <a href="{{ $links->linkedIn }}" target="_blank" title="Zoom" style="width: 34px; height: 34px; border-radius: 50%; background: rgba(255,255,255,0.1); color: #fff; display: flex; align-items: center; justify-content: center; text-decoration: none; transition: all 0.3s;" onmouseover="this.style.background='#2D8CFF'; this.style.transform='translateY(-2px)';" onmouseout="this.style.background='rgba(255,255,255,0.1)'; this.style.transform='none';">
                                    <i class="fa fa-video-camera"></i>
                                </a>
                            @endif
                            @if($links->instagram)
                                <a href="{{ $links->instagram }}" target="_blank" style="width: 34px; height: 34px; border-radius: 50%; background: rgba(255,255,255,0.1); color: #fff; display: flex; align-items: center; justify-content: center; text-decoration: none; transition: all 0.3s;" onmouseover="this.style.background='#e1306c'; this.style.transform='translateY(-2px)';" onmouseout="this.style.background='rgba(255,255,255,0.1)'; this.style.transform='none';">
                                    <i class="fa fa-instagram"></i>
                                </a>
                            @endif
                        </div>
                    @endif
                </div>
            </div>

            <!-- Column 2: Recent Notices (Dynamic) -->
            <div class="col-sm-6 col-md-3 mb-30">
                <div class="footer-widget">
                    <h4 class="widget-title" style="color: #ffffff; font-size: 16px; font-weight: 700; margin-bottom: 20px; position: relative; padding-bottom: 10px; border-bottom: 2px solid #2d6a4f;">
                        @if(session()->get('language') == 'bangla')
                            <i class="fa fa-bell-o me-1 text-theme-colored" style="color: #52b788;"></i> সর্বশেষ নোটিশসমূহ
                        @elseif(session()->get('language') == 'arabic')
                            <i class="fa fa-bell-o me-1" style="color: #52b788;"></i> أحدث الإعلانات
                        @else
                            <i class="fa fa-bell-o me-1" style="color: #52b788;"></i> Latest Notices
                        @endif
                    </h4>

                    <div class="footer-notices-list" style="display: flex; flex-direction: column; gap: 14px;">
                        @forelse($footerNotices as $fNotice)
                            <div style="display: flex; gap: 10px; align-items: flex-start; padding-bottom: 10px; border-bottom: 1px dashed rgba(255,255,255,0.1);">
                                <div style="flex-shrink: 0; width: 40px; height: 40px; background: rgba(82, 183, 136, 0.2); border: 1px solid rgba(82, 183, 136, 0.4); border-radius: 6px; display: flex; flex-direction: column; align-items: center; justify-content: center; color: #95d5b2; text-align: center; line-height: 1;">
                                    <span style="font-weight: 800; font-size: 14px;">{{ \Carbon\Carbon::parse($fNotice->publish_date)->format('d') }}</span>
                                    <span style="font-size: 9px; font-weight: 600; text-transform: uppercase;">{{ \Carbon\Carbon::parse($fNotice->publish_date)->format('M') }}</span>
                                </div>
                                <div style="min-width: 0;">
                                    <a href="{{ route('frontend.notices.show', $fNotice->id) }}" style="color: #e2ece9; font-size: 12.5px; font-weight: 600; text-decoration: none; line-height: 1.4; display: block;" onmouseover="this.style.color='#52b788'" onmouseout="this.style.color='#e2ece9'">
                                        {!! html_entity_decode(Str::limit($fNotice->localized_title, 48)) !!}
                                    </a>
                                    <small style="color: #74a892; font-size: 10.5px;">{{ $fNotice->category_name }}</small>
                                </div>
                            </div>
                        @empty
                            <p style="color: #94a3b8; font-size: 13px;">
                                @if(session()->get('language') == 'bangla')
                                    কোনো নোটিশ পাওয়া যায়নি।
                                @elseif(session()->get('language') == 'arabic')
                                    لا توجد إعلانات حالياً.
                                @else
                                    No notices found.
                                @endif
                            </p>
                        @endforelse
                    </div>

                    <a href="{{ route('frontend.notices.index') }}" style="display: inline-block; margin-top: 10px; color: #52b788; font-size: 12px; font-weight: 600; text-decoration: none;" onmouseover="this.style.color='#95d5b2'" onmouseout="this.style.color='#52b788'">
                        @if(session()->get('language') == 'bangla')
                            সকল নোটিশ দেখুন &rarr;
                        @elseif(session()->get('language') == 'arabic')
                            عرض جميع الإعلانات &larr;
                        @else
                            View All Notices &rarr;
                        @endif
                    </a>
                </div>
            </div>

            <!-- Column 3: Quick Navigation Links -->
            <div class="col-sm-6 col-md-2 mb-30">
                <div class="footer-widget">
                    <h4 class="widget-title" style="color: #ffffff; font-size: 16px; font-weight: 700; margin-bottom: 20px; position: relative; padding-bottom: 10px; border-bottom: 2px solid #2d6a4f;">
                        @if(session()->get('language') == 'bangla')
                            প্রয়োজনীয় লিংক
                        @elseif(session()->get('language') == 'arabic')
                            روابط سريعة
                        @else
                            Quick Links
                        @endif
                    </h4>

                    <ul class="list-unstyled" style="margin: 0; padding: 0; display: flex; flex-direction: column; gap: 8px; font-size: 13px;">
                        <li>
                            <a href="{{ route('front.page') }}" style="color: #b7d5c8; text-decoration: none; display: flex; align-items: center; gap: 6px;" onmouseover="this.style.color='#52b788'; this.style.paddingLeft='4px';" onmouseout="this.style.color='#b7d5c8'; this.style.paddingLeft='0';">
                                <i class="fa fa-angle-right" style="color: #52b788;"></i>
                                <span>
                                    @if(session()->get('language') == 'bangla') হোমপেজ @elseif(session()->get('language') == 'arabic') الرئيسية @else Home @endif
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('about.page', 1) }}" style="color: #b7d5c8; text-decoration: none; display: flex; align-items: center; gap: 6px;" onmouseover="this.style.color='#52b788'; this.style.paddingLeft='4px';" onmouseout="this.style.color='#b7d5c8'; this.style.paddingLeft='0';">
                                <i class="fa fa-angle-right" style="color: #52b788;"></i>
                                <span>
                                    @if(session()->get('language') == 'bangla') আমাদের পরিচিতি @elseif(session()->get('language') == 'arabic') من نحن @else About Us @endif
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('frontend.teachers.index') }}" style="color: #b7d5c8; text-decoration: none; display: flex; align-items: center; gap: 6px;" onmouseover="this.style.color='#52b788'; this.style.paddingLeft='4px';" onmouseout="this.style.color='#b7d5c8'; this.style.paddingLeft='0';">
                                <i class="fa fa-angle-right" style="color: #52b788;"></i>
                                <span>
                                    @if(session()->get('language') == 'bangla') শিক্ষকমণ্ডলী @elseif(session()->get('language') == 'arabic') الكادر التعليمي @else Faculty @endif
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('frontend.notices.index') }}" style="color: #b7d5c8; text-decoration: none; display: flex; align-items: center; gap: 6px;" onmouseover="this.style.color='#52b788'; this.style.paddingLeft='4px';" onmouseout="this.style.color='#b7d5c8'; this.style.paddingLeft='0';">
                                <i class="fa fa-angle-right" style="color: #52b788;"></i>
                                <span>
                                    @if(session()->get('language') == 'bangla') নোটিশ বোর্ড @elseif(session()->get('language') == 'arabic') لوحة الإعلانات @else Notice Board @endif
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('online.admission') }}" style="color: #b7d5c8; text-decoration: none; display: flex; align-items: center; gap: 6px;" onmouseover="this.style.color='#52b788'; this.style.paddingLeft='4px';" onmouseout="this.style.color='#b7d5c8'; this.style.paddingLeft='0';">
                                <i class="fa fa-angle-right" style="color: #52b788;"></i>
                                <span>
                                    @if(session()->get('language') == 'bangla') ভর্তি আবেদন @elseif(session()->get('language') == 'arabic') طلب القبول @else Admission @endif
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('gallery.page') }}" style="color: #b7d5c8; text-decoration: none; display: flex; align-items: center; gap: 6px;" onmouseover="this.style.color='#52b788'; this.style.paddingLeft='4px';" onmouseout="this.style.color='#b7d5c8'; this.style.paddingLeft='0';">
                                <i class="fa fa-angle-right" style="color: #52b788;"></i>
                                <span>
                                    @if(session()->get('language') == 'bangla') ছবি গ্যালারি @elseif(session()->get('language') == 'arabic') معرض الصور @else Photo Gallery @endif
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('contacts') }}" style="color: #b7d5c8; text-decoration: none; display: flex; align-items: center; gap: 6px;" onmouseover="this.style.color='#52b788'; this.style.paddingLeft='4px';" onmouseout="this.style.color='#b7d5c8'; this.style.paddingLeft='0';">
                                <i class="fa fa-angle-right" style="color: #52b788;"></i>
                                <span>
                                    @if(session()->get('language') == 'bangla') যোগাযোগ @elseif(session()->get('language') == 'arabic') اتصل بنا @else Contact Us @endif
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Column 4: Admission Info & Subscription -->
            <div class="col-sm-6 col-md-3 mb-30">
                <div class="footer-widget">
                    <h4 class="widget-title" style="color: #ffffff; font-size: 16px; font-weight: 700; margin-bottom: 20px; position: relative; padding-bottom: 10px; border-bottom: 2px solid #2d6a4f;">
                        @if(session()->get('language') == 'bangla')
                            অনলাইন ভর্তি ও সেবা
                        @elseif(session()->get('language') == 'arabic')
                            القبول والتسجيل
                        @else
                            Admission & Services
                        @endif
                    </h4>

                    <!-- Admission CTA Card -->
                    <div style="background: rgba(45, 106, 79, 0.4); border: 1px solid rgba(82, 183, 136, 0.3); border-radius: 8px; padding: 14px; margin-bottom: 16px;">
                        <h6 style="color: #ffffff; font-weight: 700; margin: 0 0 6px 0; font-size: 13.5px;">
                            <i class="fa fa-graduation-cap text-theme-colored" style="color: #52b788;"></i>
                            @if(session()->get('language') == 'bangla')
                                নতুন সেশনে ভর্তি চলছে
                            @elseif(session()->get('language') == 'arabic')
                                باب القبول مفتوح للتسجيل
                            @else
                                Admission Open for New Session
                            @endif
                        </h6>
                        <p style="color: #b7d5c8; font-size: 12px; line-height: 1.5; margin-bottom: 10px;">
                            @if(session()->get('language') == 'bangla')
                                সহজেই ঘরে বসে অনলাইনে ভর্তি আবেদন ফরম পূরণ করুন।
                            @elseif(session()->get('language') == 'arabic')
                                قدّم طلب التحاقك الآن بكل يسر وسهولة عبر الإنترنت.
                            @else
                                Conveniently complete your online admission application from home.
                            @endif
                        </p>
                        <a href="{{ route('online.admission') }}" class="btn btn-xs" style="background: #2d6a4f; color: #ffffff; font-weight: 700; padding: 5px 14px; border-radius: 4px; text-decoration: none; display: inline-block;" onmouseover="this.style.background='#52b788'; this.style.color='#1b4332';" onmouseout="this.style.background='#2d6a4f'; this.style.color='#ffffff';">
                            @if(session()->get('language') == 'bangla')
                                ভর্তি আবেদন করুন &rarr;
                            @elseif(session()->get('language') == 'arabic')
                                قدّم طلب القبول &larr;
                            @else
                                Apply for Admission &rarr;
                            @endif
                        </a>
                    </div>

                    <!-- Newsletter Subscription -->
                    <form action="{{ route('subscribe') }}" method="POST">
                        @csrf
                        <div class="form-group mb-0">
                            <label style="color: #d8f3dc; font-size: 12px; margin-bottom: 6px; font-weight: 600;">
                                @if(session()->get('language') == 'bangla')
                                    নিয়মিত আপডেটের জন্য সাবস্ক্রাইব করুন
                                @elseif(session()->get('language') == 'arabic')
                                    اشترك معنا ليصلك كل جديد
                                @else
                                    Subscribe for regular updates
                                @endif
                            </label>
                            <div class="input-group">
                                <input type="email" name="email" class="form-control" placeholder="@if(session()->get('language') == 'bangla')আপনার ইমেইল লিখুন...@elseif(session()->get('language') == 'arabic')أدخل بريدك الإلكتروني...@else Enter your email...@endif" style="height: 36px; background: rgba(255,255,255,0.08); border-color: rgba(82, 183, 136, 0.4); color: #fff; border-radius: 4px 0 0 4px; font-size: 12px;" required>
                                <span class="input-group-btn">
                                    <button type="submit" class="btn" style="height: 36px; background: #2d6a4f; color: #ffffff; border-color: #2d6a4f; border-radius: 0 4px 4px 0; padding: 6px 14px;">
                                        <i class="fa fa-paper-plane"></i>
                                    </button>
                                </span>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>

    <!-- Footer Bottom Bar -->
    <div class="footer-bottom" style="background: #04120b; padding: 18px 0; border-top: 1px solid rgba(255,255,255,0.08);">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-12 text-center">
                    <p class="m-0" style="color: #8da499; font-size: 12.5px; line-height: 1.7;">
                        @if (session()->get('language') == 'bangla')
                            {{ $footer->details_b ?? 'স্বত্ব © ' . date('Y') . ' মুকাদ্দামাতুল কুরআন ইসলামী একাডেমি - সর্বস্বত্ব সংরক্ষিত।' }}
                        @elseif (session()->get('language') == 'arabic')
                            {{ $footer->details_ab ?? 'حقوق النشر © ' . date('Y') . ' أكاديمية مقدمة القرآن الإسلامية - جميع الحقوق محفوظة.' }}
                        @else
                            {{ $footer->details ?? 'Copyright © ' . date('Y') . ' Muqaddamatul Quran Islami Academy. All rights reserved.' }}
                        @endif
                        <br>
                        <span style="font-size: 11.5px; color: #647d72;">
                            @if (session()->get('language') == 'bangla')
                                {{ $footer->credit_b ?? 'কারিগরি সহায়তায় ও ডেভেলপমেন্টে TechWeb BD IT' }}
                            @elseif (session()->get('language') == 'arabic')
                                {{ $footer->credit_ab ?? 'تم التطوير بواسطة TechWeb BD IT' }}
                            @else
                                {{ $footer->credit ?? 'Developed & Maintained by TechWeb BD IT' }}
                            @endif
                        </span>
                    </p>
                </div>
            </div>
        </div>
    </div>

</footer>

<a class="scrollToTop" href="#" style="left: 20px !important; right: auto !important; bottom: 20px !important; background: #2d6a4f; color: #ffffff; border-radius: 50%; width: 42px; height: 42px; line-height: 40px; text-align: center; box-shadow: 0 4px 12px rgba(0,0,0,0.3); z-index: 9999;"><i class="fa fa-angle-up" style="font-size: 24px; line-height: 40px;"></i></a>
