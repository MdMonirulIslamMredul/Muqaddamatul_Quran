{{--
      <section style="background-color: #F5F5F5">

        <div class="container">
            <div class="section-title text-center">
                  <div class="col-md-8 col-md-offset-2">
                    <h2 class="text-uppercase line-bottom-center mt-0"> @if (session()->get('language') == 'bangla') আমাদের কার্যক্রম @else Our Activities @endif </h2>
                  </div>
                </div>
              </div>
          <div class="row multi-row-clearfix">
            <div class="blog-posts">
                @foreach ($activities as $activity)
              <div class="col-md-4">
                <article class="post clearfix mb-30 bg-lighter">
                  <div class="entry-header">
                    <div class="post-thumb thumb">
                      <img src="{{ asset($activity->image) }}" alt="" class="img-fullwidth" style="height: 220px">
                        <div class="campaign-overlay"></div>
                        <h4 class="" style="color:green;padding: 20px;text-align:center;font-family:'Trirong', serif;">@if (session()->get('language') == 'bangla') {{ $activity->bangla_title }} @else {{ $activity->title }} @endif </h4>
                    </div>
                  </div>
                  <div class="entry-content p-5 pr-10">
                    <div class="entry-meta media mt-0 no-bg no-border">
                        <div style="width:100%;height:180px; overflow-y: scroll;">
                            <p class="mt-2">@if (session()->get('language') == 'bangla') {!! $activity->short_des_bangla !!} @else {!! $activity->short_des_eng !!} @endif </p>
                           </div>
                        <div class="media-body pl-15">

                      </div>
                    </div>
                    <div class="" style="margin-top:15px; text-align: center">
                        <a href="{{ route('all.activies',$activity->id) }}" class="btn btn-primary" style="">@if (session()->get('language') == 'bnagla') বিস্তারিত পড়ুন @else Read more @endif </a>
                    </div>
                  </div>
                </article>
              </div>

              @endforeach




            </div>
          </div>
        </div>
      </section> --}}

<!-- Section: project -->
<section id="blog">
    <div class="container pb-sm-30">
        <div class="section-title text-center">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <h2 class="text-uppercase line-bottom-center mt-0">
                        @if (session()->get('language') == 'bangla')
                            আমাদের কার্যক্রম
                        @elseif (session()->get('language') == 'arabic')
                            أنشطتنا 
                        @else
                            Our Activities
                        @endif
                    </h2>
                </div>
            </div>
        </div>
        <div class="section-content">
            <div class="row">
                @foreach ($activities as $activity)
                    <div class="col-xs-12 col-sm-6 col-md-4 col-xl-3" style="margin-top: 20px;">
                        <div class="post mb-sm-30 custom_card" style="border-radius: 20px; over-flow: hidden">
                            <div class="entry-header">
                                <div class="post-thumb thumb">
                                    <img src="{{ asset($activity->image) }}" alt=""
                                        class="img-responsive img-fullwidth"
                                        style="height: 300px; border-top-right-radius: 20px; border-top-left-radius: 20px;">
                                </div>
                            </div>
                            <div class="entry-content p-20" style="border-radius: 20px; over-flow: hidden">
                                <h4 class="entry-title text-white text-uppercase"><a class="font-weight-600"
                                        href="blog-single-left-sidebar.html">
                                        @if (session()->get('language') == 'bangla')
                                            {{ $activity->bangla_title }}
                                        @elseif (session()->get('language') == 'arabic')
                                            {{ $activity->arabic_title }}
                                        @else
                                            {{ $activity->title }}
                                        @endif
                                    </a></h4>
                                <div style="width:100%;height:130px; overflow-y: scroll;">
                                    <p class="mt-2">
                                        @if (session()->get('language') == 'bangla')
                                            {!! $activity->short_des_bangla !!}
                                        @elseif (session()->get('language') == 'arabic')
                                            {!! $activity->short_des_arabic !!}
                                        @else
                                            {!! $activity->short_des_eng !!}
                                        @endif
                                    </p>
                                </div>
                                <div class="" style="text-align: center; margin-top: 10px;">
                                    <a href="{{ route('all.activies', $activity->id) }}"
                                        class="btn_custom" style="">
                                        @if (session()->get('language') == 'bangla')
                                            বিস্তারিত পড়ুন
                                        @elseif (session()->get('language') == 'arabic')
                                            اقرأ أكثر
                                        @else
                                            Read more
                                        @endif
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
