<header id="header" class="header">
    <div class="header-top bg-black-333 sm-text-center border-top-theme-color-3px p-0">
      <div class="container">
        @php
          $links = App\Models\WebsiteLinks::latest()->first();
          $logo = \App\Models\Logo::latest()->first()
        @endphp

        <div class="row">
          <div class="col-md-5">
            <div class="widget no-border m-0">
              <ul class="list-inline xs-text-center text-white mt-5">
                <li class="m-0 pl-10 pr-10"> <a href="#" class="text-white"><i class="fa fa-phone text-theme-colored"></i> {{ $links->number }}</a></li>
                <li class="m-0 pl-10 pr-10">
                  <a href="#" class="text-white"><i class="fa fa-envelope-o text-theme-colored"></i> {{ $links->email }}</a>
                </li>
              </ul>
            </div>
          </div>
          <div class="col-md-3 pr-0">
            <div class="widget no-border m-0">
              {{-- <ul class="styled-icons icon-dark icon-flat icon-sm pull-right flip sm-pull-none sm-text-center mt-sm-15">
                <li><a href="#"><i class="fa fa-facebook text-white"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter text-white"></i></a></li>
                <li><a href="#"><i class="fa fa-google-plus text-white"></i></a></li>
                <li><a href="#"><i class="fa fa-instagram text-white"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin text-white"></i></a></li>
              </ul> --}}
              <ul class="styled-icons icon-dark icon-flat icon-sm pull-right flip sm-pull-none sm-text-center mt-sm-15">
                <li><a href="{{ $links->facebook }}"><i class="fa fa-facebook"></i></a></li>
                {{-- <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-skype"></i></a></li> --}}
                <li><a href="{{ $links->linkedIn }}"><i class="fa fa-linkedin"></i></a></li>
                <li><a href="{{ $links->youtube }}"><i class="fa fa-youtube"></i></a></li>
                <li><a href="{{ $links->instagram }}"><i class="fa fa-instagram"></i></a></li>
                <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
              </ul>
            </div>
          </div>
          <div class="col-md-4">
            <div class="d-flex flex-row">
              <a class="btn btn-colored btn-flat btn-theme-colored pb-10" href="{{ route('all.donation') }}">@if(session()->get('language')=='bangla') দান করুন @elseif (session()->get('language')=='arabic') هبة @else Donation @endif </a>
              <a class="text-white" href="{{ route('english.language')}}"><span class="text-danger">LN:</span> English |</a>
              <a class="text-white" href="{{ route('bangla.language')}}">বাংলা |</a>
              <a class="text-white" href="{{ route('arabic.language')}}">عربي</a>
            </div>
          </div>

          {{-- <li><a href="#">@if(session()->get('language') == 'bangla') ভাষা:বাংলা @else Lan:Eng @endif </a>
            <ul class="dropdown">
              @if(session()->get('language') == 'bangla')
              <li><a href="{{ route('english.language')}}">English</a>
              </li>
              @else
              <li><a href="{{ route('bangla.language')}}">বাংলা</a>
              </li>
              @endif
            </ul>
          </li> --}}
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
              <li class="{{ Request()->is('about_menu')? 'active':'' }}"><a href="{{route('about.menu')}}">@if(session()->get('language')=='bangla') আমাদের সম্পর্কে @elseif (session()->get('language')=='arabic') معلومات عنا @else About Us @endif</a>
              </li>
              @php
                $categories = App\Models\Category::get();
              @endphp
              <li><a href="#">@if(session()->get('language') == 'bangla') সেবা @elseif (session()->get('language')=='arabic') خدمة @else Service @endif </a>
                <ul class="dropdown">
                  <li class="text-left"><a href="{{ route('audio.page')}}">@if(session()->get('language')=='bangla') অডিও @elseif (session()->get('language')=='arabic') صوتي @else Audio @endif </a>
                  </li>
                  <li class="text-left"><a href="{{ route('book.page')}}">@if(session()->get('language')=='bangla') বুক @elseif (session()->get('language')=='arabic') كتاب @else Book @endif </a>
                  </li>
                  <li class="text-left"><a href="{{ route('tv.page')}}">@if(session()->get('language')=='bangla') সরাসরি সম্প্রচার @elseif (session()->get('language')=='arabic') البث التلفزيوني المباشر @else Live Tv @endif </a>
                  </li>
                </ul>
              </li>

              {{-- department --}}
              <li><a href="#">@if(session()->get('language') == 'bangla') ডিপার্টমেন্ট  @else Department @endif </a>

                 <ul class="dropdown">
                    @foreach ($departments as $department)
                    <li class="text-left"><a href="{{ route('department.details',$department->id)}}">@if(session()->get('language')=='bangla') {{ $department->title_bn }} @else {{
                      $department->title_en }} @endif </a>
                    </li>
                    @endforeach
                  </ul>
              </li>

              <li class="{{ Request()->is('admission-guidelines*') ? 'active' : '' }}">
                <a href="{{ route('admission.guidelines') }}">
                  @if(session()->get('language') == 'bangla') ভর্তি নির্দেশিকা @elseif (session()->get('language') == 'arabic') شروط القبول @else Admission @endif
                </a>
              </li>

              <li class="{{ Request()->is('all_activism')? 'active':'' }}"><a href="{{ route('all.activism') }}">@if(session()->get('language')=='bangla') আমাদের কার্যক্রম @elseif (session()->get('language')=='arabic') المشاريع @else Projects @endif </a>
              </li>

                <li><a href="#">@if(session()->get('language') == 'bangla') গ্যালারি @elseif (session()->get('language')=='arabic') صالة عرض @else Gallery @endif </a>
                  <ul class="dropdown">
                    <li class="text-left"><a href="{{ route('gallery.page')}}">@if(session()->get('language')=='bangla') ফটো গ্যালারি @elseif (session()->get('language')=='arabic') معرض الصور @else Image Gallery @endif </a>
                    </li>
                    <li class="text-left"><a href="{{ route('video.gallery')}}">@if(session()->get('language')=='bangla') ভিডিও গ্যালারি @elseif (session()->get('language')=='arabic') معرض الفيديو @else Video Gallery @endif </a>
                    </li>
                  </ul>
                </li>

              </li>
              <li><a href="{{ route('volunteer.form') }}">@if(session()->get('language')=='bangla') স্বেচ্ছাসেবক @elseif (session()->get('language')=='arabic') متطوع @else Volunteer @endif </a>

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
              <li><a href="#">@if(session()->get('language') == 'bangla') ইউসার @elseif (session()->get('language')=='arabic') مستخدم @else User @endif </a>
                <ul class="dropdown">
                  <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">@if(session()->get('language')=='bangla') লগআউট @elseif (session()->get('language')=='arabic') تسجيل خروج @else Logout @endif </a>
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
