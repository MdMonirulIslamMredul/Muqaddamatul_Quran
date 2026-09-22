<header id="header" class="header">
    <div class="header-top border-top-theme-color-3px p-0" style="background: #185110ff; border-top: 3px solid #1b4332;">
      <div class="container">
        @php
          $links = App\Models\WebsiteLinks::latest()->first();
          $logo = \App\Models\Logo::latest()->first();
        @endphp

        <div class="header-top-wrapper" style="display: flex; justify-content: space-between; align-items: center; min-height: 42px; padding: 4px 0; flex-wrap: nowrap; gap: 12px;">
          
          <!-- Left: Contact Information -->
          <div class="header-top-left" style="display: flex; align-items: center; gap: 15px; white-space: nowrap; flex-shrink: 0;">
            @if($links && $links->number)
              <a href="tel:{{ $links->number }}" class="text-white text-decoration-none" style="color: #eaeaea; font-size: 12px; display: inline-flex; align-items: center; gap: 6px; margin-right: 6px;">
                <i class="fa fa-phone text-theme-colored" style="color: #2ec4b6;"></i> <span>{{ $links->number }}</span>
              </a>
            @endif
            @if($links && $links->email)
              <a href="mailto:{{ $links->email }}" class="text-white text-decoration-none hidden-xs" style="color: #eaeaea; font-size: 12px; display: inline-flex; align-items: center; gap: 6px;">
                <i class="fa fa-envelope-o text-theme-colored" style="color: #2ec4b6;"></i> <span>{{ $links->email }}</span>
              </a>
            @endif
          </div>

          <!-- Middle: Social Icons -->
          @if($links)
            <div class="header-top-middle hidden-xs hidden-sm" style="display: flex; align-items: center;">
              <ul class="styled-icons icon-dark icon-flat icon-sm m-0 p-0" style="display: flex; gap: 6px; list-style: none; margin: 0; padding: 0;">
                @if($links->facebook)
                  <li style="margin: 0;"><a href="{{ $links->facebook }}" target="_blank" style="width: 26px; height: 26px; line-height: 26px; font-size: 12px; background: rgba(255,255,255,0.1); color: #fff; border-radius: 4px; display: inline-block; text-align: center;"><i class="fa fa-facebook"></i></a></li>
                @endif
                @if($links->linkedIn)
                  <li style="margin: 0;"><a href="{{ $links->linkedIn }}" target="_blank" title="Zoom" style="width: 26px; height: 26px; line-height: 26px; font-size: 12px; background: rgba(255,255,255,0.1); color: #fff; border-radius: 4px; display: inline-block; text-align: center;" onmouseover="this.style.background='#2D8CFF'" onmouseout="this.style.background='rgba(255,255,255,0.1)'"><i class="fa fa-video-camera"></i></a></li>
                @endif
                @if($links->youtube)
                  <li style="margin: 0;"><a href="{{ $links->youtube }}" target="_blank" style="width: 26px; height: 26px; line-height: 26px; font-size: 12px; background: rgba(255,255,255,0.1); color: #fff; border-radius: 4px; display: inline-block; text-align: center;"><i class="fa fa-youtube"></i></a></li>
                @endif
                @if($links->instagram)
                  <li style="margin: 0;"><a href="{{ $links->instagram }}" target="_blank" style="width: 26px; height: 26px; line-height: 26px; font-size: 12px; background: rgba(255,255,255,0.1); color: #fff; border-radius: 4px; display: inline-block; text-align: center;"><i class="fa fa-instagram"></i></a></li>
                @endif
              </ul>
            </div>
          @endif

          <!-- Right: Buttons & Languages -->
          <div class="header-top-right" style="display: flex; align-items: center; gap: 8px; white-space: nowrap; flex-shrink: 0;">
            
            <a class="btn btn-sm btn-flat text-white" href="{{ route('online_program.admission') }}" style="background-color: #1b4332; color: #ffffff !important; padding: 4px 10px; font-size: 12px; border-radius: 4px; font-weight: bold; line-height: 1.4; border: 1px solid #2d6a4f; margin-left: 6px;">
              <i class="fa fa-pencil-square-o me-1"></i> @if(session()->get('language')=='bangla') ভর্তি আবেদন @elseif (session()->get('language')=='arabic') القبول عبر الإنترنت @else Admissions @endif
            </a>
            <div class="lang-switcher" style="font-size: 12px; margin-left: 6px; color: #ffffff;">
              <a href="{{ route('english.language')}}" style="color: {{ session()->get('language') == 'english' ? '#38ef7d' : '#eaeaea' }}; font-weight: bold; text-decoration: none;">EN</a>
              <span style="color: #555; margin: 0 2px;">|</span>
              <a href="{{ route('bangla.language')}}" style="color: {{ session()->get('language') == 'bangla' || !session()->has('language') ? '#38ef7d' : '#eaeaea' }}; font-weight: bold; text-decoration: none;">বাংলা</a>
              <span style="color: #555; margin: 0 2px;">|</span>
              <a href="{{ route('arabic.language')}}" style="color: {{ session()->get('language') == 'arabic' ? '#38ef7d' : '#eaeaea' }}; font-weight: bold; text-decoration: none;">عربي</a>
            </div>
          </div>

        </div>
      </div>
    </div>
  <style>
        @media only screen and (max-width: 600px) and (min-width: 400px) {
    .respo{
    height: 90px !important;
    width: 60% !important;
    }
    }
  </style>
    <div class="header-nav">
      <div class="header-nav-wrapper navbar-scrolltofixed bg-white">
        <div class="container" style="padding: 5px 10px 0 10px;">

          <nav id="menuzord-right" class="respo menuzord default">
            <a class="text-center" href="{{ url('/') }}">
              @php $logo = \App\Models\Logo::latest()->first() @endphp
              <img src="{{ asset($logo->logo_image1) }}" alt="" class="" style="height: 80px;
    width: 80px;">
            </a>
            <ul class="menuzord-menu text-center" style="margin: 0 auto;">
              <li class="{{ Request()->is('/')? 'active':'' }}"><a href="{{ url('/') }}">@if(session()->get('language')=='bangla') হোম @elseif (session()->get('language')=='arabic') بيت @else Home @endif</a>

              </li>
              <li class="{{ Request()->is('about_menu*') || Request()->is('teachers*') ? 'active':'' }}">
                <a href="{{route('about.menu')}}">@if(session()->get('language')=='bangla') আমাদের সম্পর্কে @elseif (session()->get('language')=='arabic') معلومات عنا @else About Us @endif</a>
                <ul class="dropdown">
                  <li class="text-left"><a href="{{ route('about.menu') }}">@if(session()->get('language')=='bangla') পরিচিতি ও লক্ষ্য @elseif (session()->get('language')=='arabic') نبذة عن المعهد @else About Overview @endif</a></li>
                  <li class="text-left"><a href="{{ route('frontend.teachers.index') }}">@if(session()->get('language')=='bangla') <i class="fa fa-graduation-cap me-1"></i> আমাদের শিক্ষকবৃন্দ @elseif (session()->get('language')=='arabic') الهيئة التعليمية @else Our Teachers @endif</a></li>
                </ul>
              </li>
              @php
                $categories = App\Models\Category::get();
              @endphp
              {{-- <li><a href="#">@if(session()->get('language') == 'bangla') সেবা @elseif (session()->get('language')=='arabic') خدمة @else Service @endif </a>
                <ul class="dropdown">
                  <li class="text-left"><a href="{{ route('audio.page')}}">@if(session()->get('language')=='bangla') অডিও @elseif (session()->get('language')=='arabic') صوتي @else Audio @endif </a>
                  </li>
                  <li class="text-left"><a href="{{ route('book.page')}}">@if(session()->get('language')=='bangla') বই @elseif (session()->get('language')=='arabic') كتاب @else Book @endif </a>
                  </li>
                  <li class="text-left"><a href="{{ route('tv.page')}}">@if(session()->get('language')=='bangla') সরাসরি সম্প্রচার @elseif (session()->get('language')=='arabic') البث التلفزيوني المباشر @else Live Tv @endif </a>
                  </li>
                </ul>
              </li> --}}

              {{-- department --}}
              {{-- <li><a href="#">@if(session()->get('language') == 'bangla') ডিপার্টমেন্ট  @else Department @endif </a>

                 <ul class="dropdown">
                    @foreach ($departments as $department)
                    <li class="text-left"><a href="{{ route('department.details',$department->id)}}">@if(session()->get('language')=='bangla') {{ $department->title_bn }} @else {{
                      $department->title_en }} @endif </a>
                    </li>
                    @endforeach
                  </ul>
              </li> --}}

              {{-- Offline Program --}}
              <li class="{{ Request()->is('admission*') || Request()->is('online-admission*') || Request()->is('offline-admission*') || Request()->is('offline-syllabus*') || Request()->is('online-program/offline-syllabus*') ? 'active' : '' }}">
                <a href="#">
                  @if(session()->get('language') == 'bangla') অফলাইন প্রোগ্রাম @elseif (session()->get('language') == 'arabic') البرنامج الحضوري @else Offline Program @endif
                </a>
                <ul class="dropdown">
                  <li class="text-left">
                    <a href="{{ route('admission.guidelines') }}">
                      <i class="fa fa-book me-1"></i> @if(session()->get('language') == 'bangla') ভর্তি নির্দেশিকা @elseif (session()->get('language') == 'arabic') شروط القبول @else Guidelines & Fees @endif
                    </a>
                  </li>
                  <li class="text-left">
                    <a href="{{ route('online_program.offline_syllabus') }}">
                      <i class="fa fa-file-text-o me-1"></i> @if(session()->get('language') == 'bangla') অফলাইন সিলেবাস @elseif (session()->get('language') == 'arabic') المنهج الدراسي @else Offline Syllabus @endif
                    </a>
                  </li>
                  <li class="text-left">
                    <a href="{{ route('online.admission') }}">
                      <i class="fa fa-pencil-square-o me-1"></i> @if(session()->get('language') == 'bangla') অনলাইন ভর্তি ফরম @elseif (session()->get('language') == 'arabic') تقديم طلب القبول @else Apply Online @endif
                    </a>
                  </li>
                  <li class="text-left">
                    <a href="{{ route('admission.offline.form') }}" target="_blank">
                      <i class="fa fa-print me-1"></i> @if(session()->get('language') == 'bangla') অফলাইন ফরম ডাউনলোড @elseif (session()->get('language') == 'arabic') تحميل الاستمارة @else Offline Blank Form @endif
                    </a>
                  </li>
                  <li class="text-left">
                    <a href="{{ route('admission.status') }}">
                      <i class="fa fa-search me-1"></i> @if(session()->get('language') == 'bangla') আবেদন ট্র্যাকিং @elseif (session()->get('language') == 'arabic') متابعة الطلب @else Track Application @endif
                    </a>
                  </li>
                </ul>
              </li>

              {{-- <li class="{{ Request()->is('all_activism')? 'active':'' }}"><a href="{{ route('all.activism') }}">@if(session()->get('language')=='bangla') আমাদের কার্যক্রম @elseif (session()->get('language')=='arabic') المشاريع @else Projects @endif </a>
              </li> --}}

              {{-- Online Program --}}
              <li class="{{ (Request()->is('online-program*') && !Request()->is('online-program/offline-syllabus*')) ? 'active' : '' }}">
                <a href="#">
                  @if(session()->get('language') == 'bangla') অনলাইন প্রোগ্রাম @elseif (session()->get('language') == 'arabic') البرنامج عبر الإنترنت @else Online Program @endif
                </a>
                <ul class="dropdown">
                  <li class="text-left">
                    <a href="{{ route('online_program.admission') }}">
                      <i class="fa fa-graduation-cap me-1"></i> @if(session()->get('language') == 'bangla') অনলাইন প্রোগ্রাম ভর্তি @elseif (session()->get('language') == 'arabic') القبول عبر الإنترنت @else Online program admission @endif
                    </a>
                  </li>
                  <li class="text-left">
                    <a href="{{ route('online_program.fees') }}">
                      <i class="fa fa-money me-1"></i> @if(session()->get('language') == 'bangla') অনলাইন প্রোগ্রাম ফি @elseif (session()->get('language') == 'arabic') رسوم البرنامج عبر الإنترنت @else Online program fees @endif
                    </a>
                  </li>
                  <li class="text-left">
                    <a href="{{ route('online_program.online_syllabus') }}">
                      <i class="fa fa-book me-1"></i> @if(session()->get('language') == 'bangla') অনলাইন সিলেবাস @elseif (session()->get('language') == 'arabic') المنهج الدراسي عبر الإنترنت @else Online Syllabus @endif
                    </a>
                  </li>
                </ul>
              </li>

              {{-- Madrasah Mashq Admission Standalone Top-Level Menu --}}
              <li class="{{ Request()->is('madrasah-mashq-admission*') ? 'active' : '' }}">
                <a href="{{ route('madrasah.mashq.apply') }}">
                  {{-- <i class="fa fa-graduation-cap me-1"></i> --}}
                  @if(session()->get('language') == 'bangla') মাদ্রাসা মাশ্ক্ব এডমিশন @elseif (session()->get('language') == 'arabic') قبول مشق للمدارس @else Madrasah Mashq @endif
                </a>
              </li>

              <li class="{{ Request()->is('gallery*') || Request()->is('video_gallery*') ? 'active' : '' }}">
                <a href="#">@if(session()->get('language') == 'bangla') গ্যালারি @elseif (session()->get('language')=='arabic') صالة عرض @else Gallery @endif </a>
                <ul class="dropdown">
                  <li class="text-left"><a href="{{ route('gallery.page')}}">@if(session()->get('language')=='bangla') ফটো গ্যালারি @elseif (session()->get('language')=='arabic') معرض الصور @else Image Gallery @endif </a>
                  </li>
                  <li class="text-left"><a href="{{ route('video.gallery')}}">@if(session()->get('language')=='bangla') ভিডিও গ্যালারি @elseif (session()->get('language')=='arabic') معرض الفيديو @else Video Gallery @endif </a>
                  </li>
                </ul>
              </li>

              <li class="{{ Request()->is('book_page*') || Request()->is('book*') ? 'active' : '' }}">
                <a href="{{ route('book.page')}}">@if(session()->get('language')=='bangla') বই @elseif (session()->get('language')=='arabic') كتاب @else Book @endif </a>
              </li>
             
              <li class="{{ Request()->is('notices*') || Request()->is('notice*') ? 'active' : '' }}">
                <a href="{{ route('frontend.notices.index') }}">
                  @if(session()->get('language') == 'bangla') নোটিশ @elseif (session()->get('language') == 'arabic') الإعلانات @else Notices @endif
                </a>
              </li>
              <li><a href="{{ route('blog.page') }}">@if(session()->get('language')=='bangla') সংবাদ @elseif (session()->get('language')=='arabic') أخبار @else News @endif </a>

              <!--</li>-->
              <!--<li><a href="#">@if(session()->get('language')=='bangla')  যোগাযোগ @else Contacts @endif </a>-->
              <!--</li>-->
              @guest()
              <li class="{{ Request()->is('login')? 'active':'' }}">
                <a  href="{{route('login')}}"> @if(session()->get('language')=='bangla')  প্রবেশ করুন @elseif (session()->get('language')=='arabic') تسجيل الدخول @else Login @endif </a>
              </li>
              @endguest
              @auth()
              <li><a href="#">@if(session()->get('language') == 'bangla') {{ auth()->user()->name ?? 'ইউজার' }} @elseif (session()->get('language')=='arabic') مستخدم @else {{ auth()->user()->name ?? 'User' }} @endif </a>
                <ul class="dropdown">
                  @if(auth()->user()->is_admin == 1)
                  <li class="text-left">
                    <a href="{{ route('admin.home') }}">
                      <i class="fa fa-dashboard me-1"></i> @if(session()->get('language')=='bangla') অ্যাডমিন প্যানেল @else Admin Panel @endif
                    </a>
                  </li>
                  @endif
                  @if(auth()->user()->role === 'student' || \App\Models\OnlineAdmission::where('user_id', auth()->id())->exists())
                  <li class="text-left">
                    <a href="{{ route('student.dashboard') }}">
                      <i class="fa fa-graduation-cap me-1"></i> @if(session()->get('language')=='bangla') স্টুডেন্ট ড্যাশবোর্ড @else Student Dashboard @endif
                    </a>
                  </li>
                  <li class="text-left">
                    <a href="{{ route('student.payments') }}">
                      <i class="fa fa-credit-card me-1"></i> @if(session()->get('language')=='bangla') ফি ও পেমেন্ট @else Fees & Payments @endif
                    </a>
                  </li>
                  @endif
                  <li class="text-left"><a href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();"><i class="fa fa-sign-out me-1"></i> @if(session()->get('language')=='bangla') লগআউট @elseif (session()->get('language')=='arabic') تسجيل خروج @else Logout @endif </a>
                  </li>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
                </ul>
              </li>
              @endauth





            </ul>
          </nav>
          {{-- end nav menu --}}


        </div>
      </div>
    </div>
  </header>
