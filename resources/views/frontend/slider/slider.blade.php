 <!-- Slider Section Start -->

 <div id="bannerCarousel" class="carousel slide" data-ride="carousel">
     <!-- Indicators -->
     <ol class="carousel-indicators">
         @foreach ($banners as $key => $banner)
         <li data-target="#bannerCarousel" data-slide-to="{{ $key }}" class="{{ $key == 0 ? 'active' : '' }}"></li>
         @endforeach
     </ol>

     <!-- Wrapper for slides -->
     <div class="carousel-inner">
         @foreach ($banners as $key => $banner)
         <div class="item {{ $key == 0 ? 'active' : '' }}">

             <img src="{{ asset($banner->image) }}" alt="{{ $banner->title }}" class="img-responsive"
                 style="height: 580px; width: 100%; object-fit: cover;">

             <div class="carousel-caption d-flex flex-column align-items-center justify-content-center"
                 style="top: 60%; transform: translateY(-50%);">
                 @if (session()->get('language') == 'bangla')
                 {{ $banner->title_bn }}
                 @elseif (session()->get('language') == 'arabic')
                 {{ $banner->title_ab }}
                 @else
                 <h2 class="text-white">{{ $banner->title }}</h2>
                 @endif

                 <p>{{ $banner->short_details }}</p>

                 <a class="btn btn-theme-colored btn-circled pl-20 pr-20" href="{{ route('all.donation') }}">
                     @if(session()->get('language') == 'bangla')
                     দান করুন
                     @elseif (session()->get('language') == 'arabic')
                     تبرع الآن
                     @else
                     Donate Now
                     @endif
                 </a>
             </div>

         </div>
         @endforeach
     </div>

     <!-- Left and right controls -->
     <a class="left carousel-control" href="#bannerCarousel" data-slide="prev">
         <span class="glyphicon glyphicon-chevron-left"></span>
         <span class="sr-only">Previous</span>
     </a>
     <a class="right carousel-control" href="#bannerCarousel" data-slide="next">
         <span class="glyphicon glyphicon-chevron-right"></span>
         <span class="sr-only">Next</span>
     </a>
 </div>


 <!-- Slider Section End -->



 {{-- <section id="home">

    <div class="container-fluid p-0">

        <!-- Slider Revolution Start -->
        <div class="rev_slider_wrapper">
            <div class="rev_slider rev_slider_default" data-version="5.0">
                <ul>
                    <!-- SLIDE 1 -->
                    @foreach ($banners as $banner)
                        <li data-index="rs-1" data-transition="fade" data-slotamount="7" data-hideafterloop="0"
                            data-hideslideonmobile="off" data-easein="default" data-easeout="default"
                            data-masterspeed="300" data-thumb="{{ asset('frontend/images/bg/bg5.jpg') }}"
 data-rotate="0" data-saveperformance="off" data-title="Slide 1" data-description="">
 <!-- MAIN IMAGE -->
 <img src="{{ asset($banner->image) }} " alt="" data-bgposition="center center" data-bgfit="cover"
     data-bgrepeat="no-repeat" class="rev-slidebg" data-bgparallax="10" data-no-retina>
 <!-- LAYERS -->

 <!-- LAYER NR. 1 -->
 <div class="tp-caption tp-resizeme text-uppercase text-white font-raleway pl-30 pr-30" id="rs-1-layer-1"
     data-x="['center']" data-hoffset="['0']" data-y="['middle']" data-voffset="['-90']" data-fontsize="['28']"
     data-lineheight="['54']" data-width="none" data-height="none" data-whitespace="nowrap"
     data-transform_idle="o:1;s:500" data-transform_in="y:100;scaleX:1;scaleY:1;opacity:0;"
     data-transform_out="x:left(R);s:1000;e:Power3.easeIn;s:1000;e:Power3.easeIn;"
     data-mask_in="x:0px;y:0px;s:inherit;e:inherit;" data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"
     data-start="1000" data-splitin="none" data-splitout="none" data-responsive_offset="on"
     style="z-index: 7; white-space: nowrap; font-weight:400; border-radius: 30px;">
     @if (session()->get('language') == 'bangla')
     {{ $banner->title_bn }}
     @elseif (session()->get('language') == 'arabic')
     {{ $banner->title_ab }}
     @else
     {{ $banner->title }}
     @endif
 </div>

 <!-- LAYER NR. 2 -->
 <div class="tp-caption tp-resizeme text-uppercase bg-theme-colored-transparent text-white font-raleway pl-30 pr-30"
     id="rs-1-layer-2" data-x="['center']" data-hoffset="['0']" data-y="['middle']" data-voffset="['-20']"
     data-fontsize="['48']" data-lineheight="['70']" data-width="none" data-height="none" data-whitespace="nowrap"
     data-transform_idle="o:1;s:500" data-transform_in="y:100;scaleX:1;scaleY:1;opacity:0;"
     data-transform_out="x:left(R);s:1000;e:Power3.easeIn;s:1000;e:Power3.easeIn;"
     data-mask_in="x:0px;y:0px;s:inherit;e:inherit;" data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"
     data-start="1000" data-splitin="none" data-splitout="none" data-responsive_offset="on"
     style="z-index: 7; white-space: nowrap; font-weight:700; border-radius: 30px;">
     @if (session()->get('language') == 'bangla')
     দাতব্য ফাউন্ডেশন
     @elseif (session()->get('language') == 'arabic')
     مؤسسة خيرية
     @else
     Charity
     Foundation
     @endif
 </div>

 <!-- LAYER NR. 3 -->
 <div class="tp-caption tp-resizeme text-white text-center" id="rs-1-layer-3" data-x="['center']" data-hoffset="['0']"
     data-y="['middle']" data-voffset="['50']" data-fontsize="['16','18',24']" data-lineheight="['28']"
     data-width="none" data-height="none" data-whitespace="nowrap" data-transform_idle="o:1;s:500"
     data-transform_in="y:100;scaleX:1;scaleY:1;opacity:0;"
     data-transform_out="x:left(R);s:1000;e:Power3.easeIn;s:1000;e:Power3.easeIn;"
     data-mask_in="x:0px;y:0px;s:inherit;e:inherit;" data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"
     data-start="1400" data-splitin="none" data-splitout="none" data-responsive_offset="on"
     style="z-index: 5; white-space: nowrap; font-weight:400;">@if (session()->get('language') == 'bangla')
     {{ $banner->short_details_bn }}
     @elseif (session()->get('language') == 'arabic')
     {{ $banner->short_details_ab }}
     @else
     {{ $banner->short_details }}
     @endif
 </div>

 <!-- LAYER NR. 4 -->
 <div class="tp-caption tp-resizeme" id="rs-1-layer-4" data-x="['center']" data-hoffset="['0']" data-y="['middle']"
     data-voffset="['115']" data-width="none" data-height="none" data-whitespace="nowrap" data-transform_idle="o:1;"
     data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2000;e:Power4.easeInOut;"
     data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;"
     data-mask_in="x:0px;y:[100%];s:inherit;e:inherit;" data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"
     data-start="1400" data-splitin="none" data-splitout="none" data-responsive_offset="on"
     style="z-index: 5; white-space: nowrap; letter-spacing:1px;"><a class="btn btn-default btn-circled pl-20 pr-20"
         href="#">@if(session()->get('language')=='bangla') বিস্তারিত দেখুন @elseif
         (session()->get('language')=='arabic') عرض التفاصيل @else View Details @endif</a>
     <a class="btn btn-theme-colored btn-circled pl-20 pr-20"
         href="{{ route('all.donation')}}">@if(session()->get('language')=='bangla') দান করুন @elseif
         (session()->get('language')=='arabic') تبرع الآن @else Donate Now @endif</a>
 </div>
 </li>
 @endforeach



 </ul>
 </div>
 <!-- end .rev_slider -->
 </div>
 <!-- end .rev_slider_wrapper -->
 <script>
     $(document).ready(function (e) {
         var revapi = $(".rev_slider_default").revolution({
             sliderType: "standard",
             jsFileLocation: "js/revolution-slider/js/",
             sliderLayout: "auto",
             dottedOverlay: "none",
             delay: 5000,
             navigation: {
                 keyboardNavigation: "off",
                 keyboard_direction: "horizontal",
                 mouseScrollNavigation: "off",
                 onHoverStop: "off",
                 touch: {
                     touchenabled: "on",
                     swipe_threshold: 75,
                     swipe_min_touches: 1,
                     swipe_direction: "horizontal",
                     drag_block_vertical: false
                 },
                 arrows: {
                     style: "gyges",
                     enable: true,
                     hide_onmobile: false,
                     hide_onleave: true,
                     hide_delay: 200,
                     hide_delay_mobile: 1200,
                     tmp: '',
                     left: {
                         h_align: "left",
                         v_align: "center",
                         h_offset: 0,
                         v_offset: 0
                     },
                     right: {
                         h_align: "right",
                         v_align: "center",
                         h_offset: 0,
                         v_offset: 0
                     }
                 },
                 bullets: {
                     enable: true,
                     hide_onmobile: true,
                     hide_under: 800,
                     style: "hebe",
                     hide_onleave: false,
                     direction: "horizontal",
                     h_align: "center",
                     v_align: "bottom",
                     h_offset: 0,
                     v_offset: 30,
                     space: 5,
                     tmp: '<span class="tp-bullet-image"></span><span class="tp-bullet-imageoverlay"></span><span class="tp-bullet-title"></span>'
                 }
             },
             responsiveLevels: [1240, 1024, 778],
             visibilityLevels: [1240, 1024, 778],
             gridwidth: [1170, 1024, 778, 480],
             gridheight: [680, 500, 400, 300],
             lazyType: "none",
             parallax: "mouse",
             parallaxBgFreeze: "off",
             parallaxLevels: [2, 3, 4, 5, 6, 7, 8, 9, 10, 1],
             shadow: 0,
             spinner: "off",
             stopLoop: "on",
             stopAfterLoops: 0,
             stopAtSlide: -1,
             shuffle: "off",
             autoHeight: "off",
             fullScreenAutoWidth: "off",
             fullScreenAlignForce: "off",
             fullScreenOffsetContainer: "",
             fullScreenOffset: "0",
             hideThumbsOnMobile: "off",
             hideSliderAtLimit: 0,
             hideCaptionAtLimit: 0,
             hideAllCaptionAtLilmit: 0,
             debugMode: false,
             fallbacks: {
                 simplifyAll: "off",
                 nextSlideOnWindowFocus: "off",
                 disableFocusListener: false,
             }
         });
     });
 </script>
 <!-- Slider Revolution Ends -->
 </div>
 </section> --}}
