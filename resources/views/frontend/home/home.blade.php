@extends('frontend.master')

@push('frontend_style')
    <style>
        /* Section Padding & Spacing Normalization */
        .main-content section > .container,
        .main-content section > .container-fluid {
            padding-top: 0 !important;
            padding-bottom: 0 !important;
        }
        .main-content section {
            padding-top: 45px !important;
            padding-bottom: 45px !important;
        }
        #hero-slider-section {
            padding-top: 0 !important;
            padding-bottom: 0 !important;
        }
        .notice-ticker-wrapper {
            margin-bottom: 0 !important;
        }
        .section-title {
            margin-bottom: 25px !important;
        }
        @media (max-width: 767px) {
            .main-content section {
                padding-top: 30px !important;
                padding-bottom: 30px !important;
            }
            .section-title {
                margin-bottom: 20px !important;
            }
        }

        .owl-carousel-4col.owl-carousel .owl-stage {
            border-radius: 10px !important;
            overflow: hidden;
        }
        .custom_card {
            box-shadow: 0 4px 16px 0 rgba(0, 241, 67, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19) !important;
        }
        .grid-item {
            /* position: relative; */
            width: 24%;
            margin: .25%;
        }
        .grid-item .overlay-shade {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.716);
            opacity: 0;
            transition: opacity 0.3s;
        }
        .grid-item:hover .overlay-shade {
            opacity: 1;
        }
        .icons-holder {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            opacity: 0;
        }
        .grid-item:hover .icons-holder {
            opacity: 1;
        }
        .icons-holder-inner {
            display: inline-block;
        }
        .styled-icons {
            font-size: 24px;
            color: green;
        }
        .grid-item img {
            width: 100%;
            display: block;
        }
        @media (max-width: 992px) {
            .grid-item {
                width: 32.333%;
                margin: .33%;
            }
        }
        @media (max-width: 768px) {
            .grid-item {
                width: 49%;
                margin: .50%;
            }
        }
        @media (max-width: 576px) {
            .grid-item {
                width: 100%;
            }
        }
        @media (min-width: 1200px) {
          .col-xl-1 { width: 8.33333%; }
          .col-xl-2 { width: 16.66667%; }
          .col-xl-3 { width: 25%; }
          .col-xl-4 { width: 33.33333%; }
          .col-xl-5 { width: 41.66667%; }
          .col-xl-6 { width: 50%; }
          .col-xl-7 { width: 58.33333%; }
          .col-xl-8 { width: 66.66667%; }
          .col-xl-9 { width: 75%; }
          .col-xl-10 { width: 83.33333%; }
          .col-xl-11 { width: 91.66667%; }
          .col-xl-12 { width: 100%; }
        }
    </style>
@endpush

@section('content')
    <!-- Slider Section Start -->
    @include('frontend.slider.slider')
    <!-- Slider Section End -->

    <!-- Breaking Notice Ticker Start -->
    @include('frontend.notice.ticker')
    <!-- Breaking Notice Ticker End -->

    <!-- Section: Notice Board Widget Start -->
    @include('frontend.notice.notice_section')
    <!-- Section: Notice Board Widget End -->

    <!-- Section: About -->
    <section class="about-section pt-45 pb-45" style="background: #ffffff;">
        <div class="container">
            <div class="section-content">
                <div class="row" style="display: flex; align-items: center; flex-wrap: wrap;">
                    <div class="col-lg-1 hidden-md hidden-sm hidden-xs"></div>
                    <div class="col-lg-5 col-md-6 fadeInRight" data-wow-duration="1s" data-wow-delay="0.3s">
                        <div class="text-center">
                            @if(isset($about) && ($about->image1 || $about->banner_image))
                                <img src="{{ asset($about->image1 ?? $about->banner_image) }}" alt="About Image"
                                    style="width:100%;max-width:400px;height:auto;max-height:380px;border: 1px solid #ddd;border-radius: 8px; padding: 5px; object-fit: cover; box-shadow: 0 4px 15px rgba(0,0,0,0.06);">
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-6 wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.3s">
                        <h2 class="text-uppercase mt-0" style="color: #1b4332; font-weight: 700; font-size: 26px; margin-bottom: 15px;">
                            @if (session()->get('language') == 'bangla')
                                {{ $about->title_bangla }}
                            @elseif (session()->get('language') == 'arabic')
                                {{ $about->title_ab }}
                            @else
                                {{ $about->title }}
                            @endif
                        </h2>

                        <div style="color: #4a5568; line-height: 1.8; font-size: 14.5px;">
                            @if (session()->get('language') == 'bangla')
                                {!! $about->des_bangla !!}
                            @elseif (session()->get('language') == 'arabic')
                                {!! $about->des_ab !!}
                            @else
                                {!! $about->des_eng !!}
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section: Academic Departments & Courses (Inspired by nlquran.net) -->
    @include('frontend.courses.course_departments')

    <!-- Section: Why Choose Us (Inspired by nlquran.net) -->
    @include('frontend.features.why_choose_us')

    <!-- Section: 4-Step Admission Journey (Inspired by nlquran.net) -->
    @include('frontend.admission.admission_steps')

    <!-- Section: Donation start -->
    {{-- @include('frontend.donation.donation') --}}
    <!-- Section: Donation end -->

    <!-- Section: project start -->
    {{-- @include('frontend.projects.project') --}}
    <!-- Section: project end  -->

    <!-- Section: project start -->

    {{-- @include('frontend.activities.activities') --}}

    <!-- Section: project end  -->

   

    <!-- Section: Campaign -->
    {{-- <section>
      <div class="container pb-40">
        <div class="section-title text-center">
          <div class="row">
            <div class="col-md-8 col-md-offset-2">
              <h2 class="text-uppercase line-bottom-center mt-0">Our <span class="text-theme-colored">Campaign</span></h2>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem autem<br> voluptatem obcaecati!</p>
            </div>
          </div>
        </div>
        <div class="row multi-row-clearfix">
          <div class="owl-carousel-4col" data-dots="true">
            <div class="item">
              <div class="campaign bg-silver-light maxwidth500 mb-30">
                <div class="thumb">
                  <img src="{{ asset('frontend/images/project/1.jpg') }}" alt="" class="img-fullwidth">
                  <div class="campaign-overlay"></div>
                </div>
                <div class="campaign-details clearfix p-15 pt-10 pb-10">
                  <h5 class="text-theme-colored font-weight-500 mb-0">Subtitle place here</h5>
                  <h4 class="font-weight-700 mt-0"><a href="#">Campaign Title Here</a></h4>
                  <p>Lorem ipsum dolor sit amet, consect adipisicing elit. Praesent quossit <a class="text-theme-colored ml-5" href="#"> →</a></p>
                  <div class="campaign-bottom border-top clearfix mt-20">
                    <ul class="list-inline font-weight-600 pull-left flip pr-0 mt-10">
                      <li class="text-gray-lightgray"><i class="fa fa-heart mr-10"></i>256</li>
                      <li class="text-gray-lightgray"><i class="fa fa-share-alt mr-10"></i>75</li>
                    </ul>
                    <a class="btn btn-xs btn-theme-colored font-weight-600 font-11 pull-right flip mt-10" href="page-donate.html">Donate Now</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="campaign bg-silver-light maxwidth500 mb-30">
                <div class="thumb">
                  <img src="{{ asset('frontend/images/project/2.jpg') }}" alt="" class="img-fullwidth">
                  <div class="campaign-overlay"></div>
                </div>
                <div class="campaign-details clearfix p-15 pt-10 pb-10">
                  <h5 class="text-theme-colored font-weight-500 mb-0">Subtitle place here</h5>
                  <h4 class="font-weight-700 mt-0"><a href="#">Campaign Title Here</a></h4>
                  <p>Lorem ipsum dolor sit amet, consect adipisicing elit. Praesent quossit <a class="text-theme-colored ml-5" href="#"> →</a></p>
                  <div class="campaign-bottom border-top clearfix mt-20">
                    <ul class="list-inline font-weight-600 pull-left flip pr-0 mt-10">
                      <li class="text-gray-lightgray"><i class="fa fa-heart mr-10"></i>256</li>
                      <li class="text-gray-lightgray"><i class="fa fa-share-alt mr-10"></i>75</li>
                    </ul>
                    <a class="btn btn-xs btn-theme-colored font-weight-600 font-11 pull-right flip mt-10" href="page-donate.html">Donate Now</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="campaign bg-silver-light maxwidth500 mb-30">
                <div class="thumb">
                  <img src="{{ asset('frontend/images/project/3.jpg') }}" alt="" class="img-fullwidth">
                  <div class="campaign-overlay"></div>
                </div>
                <div class="campaign-details clearfix p-15 pt-10 pb-10">
                  <h5 class="text-theme-colored font-weight-500 mb-0">Subtitle place here</h5>
                  <h4 class="font-weight-700 mt-0"><a href="#">Campaign Title Here</a></h4>
                  <p>Lorem ipsum dolor sit amet, consect adipisicing elit. Praesent quossit <a class="text-theme-colored ml-5" href="#"> →</a></p>
                  <div class="campaign-bottom border-top clearfix mt-20">
                    <ul class="list-inline font-weight-600 pull-left flip pr-0 mt-10">
                      <li class="text-gray-lightgray"><i class="fa fa-heart mr-10"></i>256</li>
                      <li class="text-gray-lightgray"><i class="fa fa-share-alt mr-10"></i>75</li>
                    </ul>
                    <a class="btn btn-xs btn-theme-colored font-weight-600 font-11 pull-right flip mt-10" href="page-donate.html">Donate Now</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="campaign bg-silver-light maxwidth500 mb-30">
                <div class="thumb">
                  <img src="{{ asset('frontend/images/project/4.jpg') }}" alt="" class="img-fullwidth">
                  <div class="campaign-overlay"></div>
                </div>
                <div class="campaign-details clearfix p-15 pt-10 pb-10">
                  <h5 class="text-theme-colored font-weight-500 mb-0">Subtitle place here</h5>
                  <h4 class="font-weight-700 mt-0"><a href="#">Campaign Title Here</a></h4>
                  <p>Lorem ipsum dolor sit amet, consect adipisicing elit. Praesent quossit <a class="text-theme-colored ml-5" href="#"> →</a></p>
                  <div class="campaign-bottom border-top clearfix mt-20">
                    <ul class="list-inline font-weight-600 pull-left flip pr-0 mt-10">
                      <li class="text-gray-lightgray"><i class="fa fa-heart mr-10"></i>256</li>
                      <li class="text-gray-lightgray"><i class="fa fa-share-alt mr-10"></i>75</li>
                    </ul>
                    <a class="btn btn-xs btn-theme-colored font-weight-600 font-11 pull-right flip mt-10" href="page-donate.html">Donate Now</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="campaign bg-silver-light maxwidth500 mb-30">
                <div class="thumb">
                  <img src="{{ asset('frontend/images/project/5.jpg') }}" alt="" class="img-fullwidth">
                  <div class="campaign-overlay"></div>
                </div>
                <div class="campaign-details clearfix p-15 pt-10 pb-10">
                  <h5 class="text-theme-colored font-weight-500 mb-0">Subtitle place here</h5>
                  <h4 class="font-weight-700 mt-0"><a href="#">Campaign Title Here</a></h4>
                  <p>Lorem ipsum dolor sit amet, consect adipisicing elit. Praesent quossit <a class="text-theme-colored ml-5" href="#"> →</a></p>
                  <div class="campaign-bottom border-top clearfix mt-20">
                    <ul class="list-inline font-weight-600 pull-left flip pr-0 mt-10">
                      <li class="text-gray-lightgray"><i class="fa fa-heart mr-10"></i>256</li>
                      <li class="text-gray-lightgray"><i class="fa fa-share-alt mr-10"></i>75</li>
                    </ul>
                    <a class="btn btn-xs btn-theme-colored font-weight-600 font-11 pull-right flip mt-10" href="page-donate.html">Donate Now</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section> --}}

    

   

    <!-- Divider: Funfact -->

    <!-- Divider: Counters start-->
    <section class="divider parallax layer-overlay overlay-dark-4 pt-45 pb-45" data-bg-img="{{ asset('frontend/images/bg/bg2.jpg') }}"
        data-parallax-ratio="0.7">
        <div class="container">
            <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-3 mb-xs-20">
                    <div class="funfact text-center">
                        <i class="{{ $counter->incon_1 }} mt-5 text-white"></i>
                        <h2 data-animation-duration="2000" data-value="{{ $counter->value_1 }}"
                            class="animate-number text-theme-colored font-42 font-weight-500 mt-0 mb-0">0</h2>
                        <h5 class="text-white text-uppercase font-weight-600">
                            @if (session()->get('language') == 'bangla')
                                {{ $counter->title_bn1 }}
                            @elseif (session()->get('language') == 'arabic')
                                {{ $counter->title_ab1 }}
                            @else
                                {{ $counter->title_1 }}
                            @endif
                        </h5>
                    </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-3 mb-xs-20">
                    <div class="funfact text-center">
                        <i class="{{ $counter->incon_2 }} mt-5 text-white"></i>
                        <h2 data-animation-duration="2000" data-value="{{ $counter->value_2 }}"
                            class="animate-number text-theme-colored font-42 font-weight-500 mt-0 mb-0">0</h2>
                        <h5 class="text-white text-uppercase font-weight-600">
                            @if (session()->get('language') == 'bangla')
                                {{ $counter->title_bn2 }}
                            @elseif (session()->get('language') == 'arabic')
                                {{ $counter->title_ab2 }}
                            @else
                                {{ $counter->title_2 }}
                            @endif
                        </h5>
                    </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-3 mb-xs-20">
                    <div class="funfact text-center">
                        <i class="{{ $counter->incon_3 }} mt-5 text-white"></i>
                        <h2 data-animation-duration="2000" data-value="{{ $counter->value_3 }}"
                            class="animate-number text-theme-colored font-42 font-weight-500 mt-0 mb-0">0</h2>
                        <h5 class="text-white text-uppercase font-weight-600">
                            @if (session()->get('language') == 'bangla')
                                {{ $counter->title_bn3 }}
                            @elseif (session()->get('language') == 'arabic')
                                {{ $counter->title_ab3 }}
                            @else
                                {{ $counter->title_3 }}
                            @endif
                        </h5>
                    </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-3 mb-xs-20">
                    <div class="funfact text-center">
                        <i class="{{ $counter->incon_4 }} mt-5 text-white"></i>
                        <h2 data-animation-duration="2000" data-value="{{ $counter->value_4 }}"
                            class="animate-number text-theme-colored font-42 font-weight-500 mt-0 mb-0">0</h2>
                        <h5 class="text-white text-uppercase font-weight-600">
                            @if (session()->get('language') == 'bangla')
                                {{ $counter->title_bn4 }}
                            @elseif (session()->get('language') == 'arabic')
                                {{ $counter->title_ab4 }}
                            @else
                                {{ $counter->title_4 }}
                            @endif
                        </h5>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Divider: Counters start-->

    <!-- Section: video Gallery -->
    @include('frontend.gallery.video_gallery')
    <!-- Section: video Gallery -->

    <!-- Section: image Gallery -->
    @include('frontend.gallery.gallery')
    <!-- Section: image Gallery -->

    <!-- Diver: Video Background  -->
    {{-- <section class="divider parallax layer-overlay overlay-dark-5" data-bg-img="{{ asset('frontend/images/bg/bg5.jpg') }}" data-parallax-ratio="0.7">
      <div class="container pt-120 pb-120">
        <!-- Section Content -->
        <div class="section-content">
          <div class="row">
            <div class="col-md-12 text-center">
              <h3 class="text-white text-uppercase font-30 font-weight-600 mt-0 mb-20">Watch Our Latest Campaign video</h3>
              <a href="https://www.youtube.com/watch?v=YzMpNqY9NUg" data-lightbox-gallery="youtube-video"><i class="fa fa-play-circle text-theme-colored font-72"></i>
              </a>
            </div>
          </div>
        </div>
      </div>
    </section> --}}

    <!-- Section: blog -->
    {{-- <section id="blog">
      <div class="container pb-sm-30">
        <div class="section-title text-center">
          <div class="row">
            <div class="col-md-8 col-md-offset-2">
              <h2 class="text-uppercase line-bottom-center mt-0">Latest <span class="text-theme-colored">News</span></h2>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem autem<br> voluptatem obcaecati!</p>
            </div>
          </div>
        </div>
        <div class="section-content">
          <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-4">
              <article class="post clearfix bg-lighter mb-sm-30">
                <div class="entry-header">
                  <div class="post-thumb thumb">
                    <img src="{{ asset('frontend/images/blog/1.jpg') }}" alt="" class="img-responsive img-fullwidth">
                  </div>
                </div>
                <div class="entry-content p-20">
                  <h4 class="entry-title text-white text-uppercase"><a class="font-weight-600" href="blog-single-left-sidebar.html">Lorem ipsum dolor is emmita</a></h4>
                  <div class="entry-meta">
                    <ul class="list-inline font-12 mb-10">
                      <li><i class="fa fa-user text-theme-colored mr-5"></i>By: Author | </li>
                      <li><i class="fa fa-calendar text-theme-colored mr-5"></i> June 26, 2016 | </li>
                      <li><i class="fa fa-comment-o text-theme-colored mr-5"></i>45 </li>
                    </ul>
                  </div>
                  <p class="mt-5">Lorem ipsum dolor sit amet, consectetur adipisi cing elit. Molestias eius illum libero dolor nobis</p>
                  <a class="btn btn-theme-colored btn-sm mt-10" href="blog-single-left-sidebar.html"> View Details</a>
                </div>
              </article>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4">
              <article class="post clearfix bg-lighter mb-sm-30">
                <div class="entry-header">
                  <div class="post-thumb thumb">
                    <img src="{{ asset('frontend/images/blog/2.jpg') }}" alt="" class="img-responsive img-fullwidth">
                  </div>
                </div>
                <div class="entry-content p-20">
                  <h4 class="entry-title text-white text-uppercase"><a class="font-weight-600" href="blog-single-left-sidebar.html">Lorem ipsum dolor is emmita</a></h4>
                  <div class="entry-meta">
                    <ul class="list-inline font-12 mb-10">
                      <li><i class="fa fa-user text-theme-colored mr-5"></i>By: Author | </li>
                      <li><i class="fa fa-calendar text-theme-colored mr-5"></i> June 26, 2016 | </li>
                      <li><i class="fa fa-comment-o text-theme-colored mr-5"></i>45 </li>
                    </ul>
                  </div>
                  <p class="mt-5">Lorem ipsum dolor sit amet, consectetur adipisi cing elit. Molestias eius illum libero dolor nobis</p>
                  <a class="btn btn-theme-colored btn-sm mt-10" href="blog-single-left-sidebar.html"> View Details</a>
                </div>
              </article>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4">
              <article class="post clearfix bg-lighter mb-sm-30">
                <div class="entry-header">
                  <div class="post-thumb thumb">
                    <img src="{{ asset('frontend/images/blog/3.jpg') }}" alt="" class="img-responsive img-fullwidth">
                  </div>
                </div>
                <div class="entry-content p-20">
                  <h4 class="entry-title text-white text-uppercase"><a class="font-weight-600" href="blog-single-left-sidebar.html">Lorem ipsum dolor is emmita</a></h4>
                  <div class="entry-meta">
                    <ul class="list-inline font-12 mb-10">
                      <li><i class="fa fa-user text-theme-colored mr-5"></i>By: Author | </li>
                      <li><i class="fa fa-calendar text-theme-colored mr-5"></i> June 26, 2016 | </li>
                      <li><i class="fa fa-comment-o text-theme-colored mr-5"></i>45 </li>
                    </ul>
                  </div>
                  <p class="mt-5">Lorem ipsum dolor sit amet, consectetur adipisi cing elit. Molestias eius illum libero dolor nobis</p>
                  <a class="btn btn-theme-colored btn-sm mt-10" href="blog-single-left-sidebar.html"> View Details</a>
                </div>
              </article>
            </div>
          </div>
        </div>
      </div>
    </section> --}}

    <!-- Divider: Donors -->
    {{-- <section class="bg-silver-light">
      <div class="container pt-30 pb-40">
        <div class="row">
          <div class="col-md-12">
            <h3 class="text-uppercase text-center title line-bottom mt-0 mb-30"><i class="fa fa-calendar text-gray-darkgray mr-10"></i> @if (session()->get('language') == 'bangla') আমাদের প্রতিনিয়ত @else Our Regular @endif  <span class="text-theme-colored">@if (session()->get('language') == 'bangla') দাতা @else Donors @endif </span></h3>
            <!-- Section: Donors -->
            <div class="owl-carousel-6col text-center">
              <div class="item"> <a href="#"><img src="{{ asset('frontend/images/donors/1.jpg') }}" alt=""></a></div>
              <div class="item"> <a href="#"><img src="{{ asset('frontend/images/donors/2.jpg') }}" alt=""></a></div>
              <div class="item"> <a href="#"><img src="{{ asset('frontend/images/donors/3.jpg') }}" alt=""></a></div>
              <div class="item"> <a href="#"><img src="{{ asset('frontend/images/donors/4.jpg') }}" alt=""></a></div>
              <div class="item"> <a href="#"><img src="{{ asset('frontend/images/donors/5.jpg') }}" alt=""></a></div>
              <div class="item"> <a href="#"><img src="{{ asset('frontend/images/donors/6.jpg') }}" alt=""></a></div>
              <div class="item"> <a href="#"><img src="{{ asset('frontend/images/donors/3.jpg') }}" alt=""></a></div>
              <div class="item"> <a href="#"><img src="{{ asset('frontend/images/donors/4.jpg') }}" alt=""></a></div>
              <div class="item"> <a href="#"><img src="{{ asset('frontend/images/donors/5.jpg') }}" alt=""></a></div>
              <div class="item"> <a href="#"><img src="{{ asset('frontend/images/donors/6.jpg') }}" alt=""></a></div>
            </div>
          </div>
        </div>
      </div>
    </section> --}}

    <!-- Section: FAQ Accordion (Inspired by nlquran.net) -->
    @include('frontend.faq.faq_section')
  <!-- Divider: Donors -->
    @include('frontend.partners.partners')
    <!-- Divider: Donors -->
  
@endsection