<footer id="footer" class="footer" data-bg-img="{{ asset('frontend/images/footer-bg.png') }}" data-bg-color="#25272e">
    @php
        $links = App\Models\WebsiteLinks::latest()->first();
        $logo = \App\Models\Logo::latest()->first();
    @endphp
    <div class="container pt-70 pb-40">
        <div class="row border-bottom-black">
            <div class="col-sm-6 col-md-3">
                <div class="widget dark">
                    <img class="mt-10 mb-20" alt="" src="{{ asset($logo->logo_image) }}" style="width: 85px; height: 85px;">
                    <p>{{ $links->address }}</p>
                    <ul class="list-inline mt-5">
                        <li class="m-0 pl-10 pr-10"> <i class="fa fa-phone text-theme-colored mr-5"></i> <a
                                class="text-gray" href="#"> {{ $links->number }}</a> </li>
                        <li class="m-0 pl-10 pr-10"> <i class="fa fa-envelope-o text-theme-colored mr-5"></i> <a
                                class="text-gray" href="#">{{ $links->email }}</a> </li>
                        <li class="m-0 pl-10 pr-10"> <i class="fa fa-globe text-theme-colored mr-5"></i> <a
                                class="text-gray" href="#">{{ $links->facebook }}</a> </li>
                    </ul>
                    <ul class="social-icons icon-dark icon-theme-colored icon-circled icon-sm mt-15">
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
            <div class="col-sm-6 col-md-3">
                <div class="widget dark">
                    <h5 class="widget-title line-bottom">
                        @if (session()->get('language') == 'bangla')
                            সর্বশেষ সংবাদ
                        @elseif (session()->get('language') == 'arabic')
                            أحدث الأخبار
                        @else
                            Latest News
                        @endif
                    </h5>
                    <div class="latest-posts">
                        <article class="post media-post clearfix pb-0 mb-10">
                            <a href="#" class="post-thumb"><img alt=""
                                    src="{{ asset('frontend/images/blog/ln1.jpg') }}"></a>
                            <div class="post-right">
                                <h5 class="post-title mt-0 mb-5"><a href="#">
                                        @if (session()->get('language') == 'bangla')
                                            টেকসই নির্মাণ
                                        @elseif (session()->get('language') == 'arabic')
                                            البناء المستدام الأخبار
                                        @else
                                            Sustainable Construction
                                        @endif
                                    </a></h5>
                                <p class="post-date mb-0">
                                    @if (session()->get('language') == 'bangla')
                                        ০৮ মার্চ , ২০১৫
                                    @elseif (session()->get('language') == 'arabic')
                                        ٠٨ ماركه ، ٢٠١٥
                                    @else
                                        Mar 08, 2015
                                    @endif
                                </p>
                            </div>
                        </article>
                        <article class="post media-post clearfix pb-0 mb-10">
                            <a href="#" class="post-thumb"><img alt=""
                                    src="{{ asset('frontend/images/blog/ln2.jpg') }}"></a>
                            <div class="post-right">
                                <h5 class="post-title mt-0 mb-5"><a href="#">
                                        @if (session()->get('language') == 'bangla')
                                            শিল্প আবরণ
                                        @elseif (session()->get('language') == 'arabic')
                                            الطلاءات الصناعية
                                        @else
                                            Industrial Coatings
                                        @endif
                                    </a>
                                </h5>
                                <p class="post-date mb-0">
                                    @if (session()->get('language') == 'bangla')
                                        ০৮ মার্চ , ২০১৫
                                    @elseif (session()->get('language') == 'arabic')
                                        ٠٨ ماركه ، ٢٠١٥
                                    @else
                                        Mar 08, 2015
                                    @endif
                                </p>
                            </div>
                        </article>
                        <article class="post media-post clearfix pb-0 mb-10">
                            <a href="#" class="post-thumb"><img alt=""
                                    src="{{ asset('frontend/images/blog/ln3.jpg') }}"></a>
                            <div class="post-right">
                                <h5 class="post-title mt-0 mb-5"><a href="#">
                                        @if (session()->get('language') == 'bangla')
                                            স্টোরফ্রন্ট ইনস্টলেশন
                                        @elseif (session()->get('language') == 'arabic')
                                            تركيبات واجهات المحلات
                                        @else
                                            Storefront Installations
                                        @endif
                                    </a></h5>
                                <p class="post-date mb-0">
                                    @if (session()->get('language') == 'bangla')
                                        ০৮ মার্চ , ২০১৫
                                    @elseif (session()->get('language') == 'arabic')
                                        ٠٨ ماركه ، ٢٠١٥
                                    @else
                                        Mar 08, 2015
                                    @endif
                                </p>
                            </div>
                        </article>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="widget dark">
                    <h5 class="widget-title line-bottom">
                        @if (session()->get('language') == 'bangla')
                            উপকারী সংজুক
                        @elseif (session()->get('language') == 'arabic')
                            روابط مفيدة
                        @else
                            Useful Links
                        @endif
                    </h5>
                    <ul class="list angle-double-right list-border">
                        <li><a href="{{ url('/') }}">
                                @if (session()->get('language') == 'bangla')
                                    হোম
                                @elseif (session()->get('language') == 'arabic')
                                    بيت
                                @else
                                    Home
                                @endif
                            </a></li>
                        <li><a href="{{ route('about.menu') }}">
                                @if (session()->get('language') == 'bangla')
                                    আমাদের সম্পর্কে
                                @elseif (session()->get('language') == 'arabic')
                                    معلومات عنا
                                @else
                                    About Us
                                @endif
                            </a></li>
                        <li><a href="#">
                                @if (session()->get('language') == 'bangla')
                                    প্রচারণা
                                @elseif (session()->get('language') == 'arabic')
                                    حملة
                                @else
                                    Campaign
                                @endif
                            </a></li>
                        <li><a href="{{ route('blog.page') }}">
                                @if (session()->get('language') == 'bangla')
                                    সর্বশেষ সংবাদ
                                @elseif (session()->get('language') == 'arabic')
                                    أحدث الأخبار
                                @else
                                    Latest News
                                @endif
                            </a></li>
                        <li><a href="{{ route('gallery.page')}}">
                                @if (session()->get('language') == 'bangla')
                                    গ্যালারি
                                @elseif (session()->get('language') == 'arabic')
                                    صالة عرض
                                @else
                                    Gallery
                                @endif
                            </a></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="widget dark">
                    <h5 class="widget-title line-bottom">
                        @if (session()->get('language') == 'bangla')
                            ফটোস ফ্রম ফ্লিকর
                        @elseif (session()->get('language') == 'arabic')
                            صور من فليكر
                        @else
                            Photos from Flickr
                        @endif
                    </h5>
                    {{-- <div id="flickr-feed" class="clearfix">
                        <script type="text/javascript"
                            src="http://www.flickr.com/badge_code_v2.gne?count=9&amp;display=latest&amp;size=s&amp;layout=x&amp;source=user&amp;user=52617155@N08">
                        </script>
                    </div> --}}
                    <form action="{{ route('subscribe') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="email">
                                @if (session()->get('language') == 'bangla')
                                    সাবস্ক্রাইব করুন
                                @elseif (session()->get('language') == 'arabic')
                                    اشترك الآن
                                @else
                                    Subscribe Now
                                @endif
                            </label>
                            <div class="input-group">
                                <input type="email" name="email" id="email" class="form-control"
                                    placeholder="@if (session()->get('language') == 'bangla') আপনার ইমেল ঠিকানা লিখুন
                                @elseif (session()->get('language') == 'arabic')
أدخل بريدك الإلكتروني                                   @else Enter your email @endif"
                                    required>
                                <button type="submit" class="btn btn-subscribe">
                                    <i class="fa fa-paper-plane"></i>
                                </button>
                            </div>
                            @error('email')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom bg-black-333">
        <div class="container pt-15 pb-10">
            <div class="row">
                <div class="col-md-12">

                    @php
                        $footer = App\Models\FooterDetail::latest()->first();
                    @endphp

                    <p class="m-0 text-center" style="color:white;">
                        @if (session()->get('language') == 'bangla')
                            {{ $footer->details_b }}
                        @elseif (session()->get('language') == 'arabic')
                            {{ $footer->details_ab }}
                        @else
                            {{ $footer->details }}
                        @endif
                        <br>
                        @if (session()->get('language') == 'bangla')
                            {{ $footer->credit_b }}
                        @elseif (session()->get('language') == 'arabic')
                            {{ $footer->credit_ab }}
                        @else
                            {{ $footer->credit }}
                        @endif
                    </p>
                </div>
                {{-- <div class="col-md-6 text-right">
            <div class="widget no-border m-0">
              <ul class="list-inline sm-text-center mt-5 font-12">
                <li>
                  <a href="#" style="color:white;">FAQ</a>
                </li>
                <li>|</li>
                <li>
                  <a href="#" style="color:white;">Help Desk</a>
                </li>
                <li>|</li>
                <li>
                  <a href="#" style="color:white;">Support</a>
                </li>
              </ul>
            </div>
          </div> --}}
            </div>
        </div>
    </div>
</footer>
<a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
