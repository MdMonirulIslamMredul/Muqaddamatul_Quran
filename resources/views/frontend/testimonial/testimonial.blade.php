<div class="rs-testimonial main-home pt-100 pb-100 md-pt-70 md-pb-70">
    <div class="container">
        <div class="sec-title3 mb-50 md-mb-30 text-center">
            <div class="sub-title primary">@if(session()->get('language') == 'bangla') প্রশংসাপত্র @else Testimonial @endif</div>
            <h2 class="title white-color">{{$testimonial_title->title??null}}</h2>
        </div>
        <div class="rs-carousel owl-carousel"
             data-loop="true"
             data-items="2"
             data-margin="30"
             data-autoplay="true"
             data-hoverpause="true"
             data-autoplay-timeout="5000"
             data-smart-speed="800"
             data-dots="true"
             data-nav="false"
             data-nav-speed="false"

             data-md-device="2"
             data-md-device-nav="false"
             data-md-device-dots="true"
             data-center-mode="false"

             data-ipad-device2="1"
             data-ipad-device-nav2="false"
             data-ipad-device-dots2="true"

             data-ipad-device="2"
             data-ipad-device-nav="false"
             data-ipad-device-dots="true"

             data-mobile-device="1"
             data-mobile-device-nav="false"
             data-mobile-device-dots="false">
            @foreach($testimonials as $testimonial)
                <div class="testi-item">
                    <div class="author-desc">
                        <img class="quote" style="height: 50px;width: 50px;margin: auto" src="{{asset('/')}}frontend/assets/images/testimonial/main-home/test-2.png" alt="">
                        <div class="desc">{!! $testimonial->review !!}</div>
                        <div class="author-img">
                            <img src="{{asset($testimonial->image)}}" style="width: 100px; height: 100px" alt="">
                        </div>
                    </div>
                    <div class="author-part">
                        <a class="name" href="#">{{$testimonial->name}}</a>
                        <span class="designation">{{$testimonial->designation}}</span>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
