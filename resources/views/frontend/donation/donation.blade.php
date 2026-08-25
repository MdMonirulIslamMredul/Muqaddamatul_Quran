  <section style="background-color: #F5F5F5">
    <div class="container pb-40">
      <div class="section-title text-center">
        <div class="row">
          <div class="col-md-8 col-md-offset-2">
            <h2 class="text-uppercase line-bottom-center mt-0"> @if(session()->get('language')=='bangla') চলুন একসাথে একটি পরিবর্তন আনি @elseif (session()->get('language')=='arabic') معًا لنصنع التغيير @else Together Let’s make a change @endif  </h2>
          </div>
        </div>
      </div>
      <div class="row multi-row-clearfix">
        <div class="owl-carousel-4col" data-dots="true">
          @foreach($donations as $donation)
          <div class="item custom_card" style="margin: 20px; border-radius: 20px; overflow: hidden;">
            <div class="campaign bg-white maxwidth500">
              <div class="thumb">
                <img src="{{ asset($donation->image) }}" style="height: 250px;" alt="" class="img-fullwidth">
                <div class="campaign-overlay"></div>
              </div>
              <div class="campaign-details clearfix p-15 pt-10 pb-10" style="height:300px">
                <h4 class="font-weight-700 mt-0"><a href="#"></a>@if(session()->get('language')=='bangla') {{ $donation->bangla_title }}
                    @elseif (session()->get('language')=='arabic') {{ $donation->arabic_title }} @else {{ $donation->title }} @endif</h4>
                <div style="width:100%;height:130px; overflow-y: scroll;">
                    <p>
                        @if(session()->get('language')=='bangla') {!! $donation->short_des_bangla1 !!}
                    @elseif (session()->get('language')=='arabic') {!! $donation->short_des_ab1 !!} @else {!! $donation->short_des1 !!} @endif
                    </p>
                </div>
                <div class="campaign-bottom clearfix mt-20 mb-10" style="text-align: center">
                  <a class="btn_custom" href="{{ route('donation',$donation->id) }}">@if(session()->get('language')=='bangla') দান করুন @elseif (session()->get('language')=='arabic') تبرع الآن @else Donate Now @endif</a>
                </div>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </section>
