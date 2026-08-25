@extends('frontend.master')
@section('title')
    Video Gallery
@endsection
@section('content')
    <!-- Main content Start -->


    <!-- Section: inner-header -->
    <section class="inner-header divider parallax layer-overlay overlay-dark-5"
    data-bg-img="{{ $banner && $banner->image ? asset($banner->image) : asset('frontend/images/bg/bg1.jpg') }}">
        <div class="container pt-60 pb-40">
            <!-- Section Content -->
            <div class="section-content pt-100">
                <div class="row">
                    <div class="col-md-12">
                        {{-- <h3 class="title text-white">
                            @if (session()->get('language') == 'bangla')
                                ভিডিও গ্যালরি
                            @elseif (session()->get('language') == 'arabic')
                                معرض الفيديو
                            @else
                                Video Gallery
                            @endif
                        </h3> --}}
                        <ul class="breadcrumb white">
                            {{-- <li><a href="{{ url('/') }}">
                                    @if (session()->get('language') == 'bangla')
                                        হোম
                                    @elseif (session()->get('language') == 'arabic')
                                        بيت
                                    @else
                                        Home
                                    @endif
                                </a></li>
                            <li class="active">
                                @if (session()->get('language') == 'bangla')
                                    গ্যালরি
                                @elseif (session()->get('language') == 'arabic')
                                    صالة عرض
                                @else
                                    Gallery
                                @endif
                            </li> --}}
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Gallery Grid 4 -->
    <section>
        <div class="container">
            <div class="section-content">
                <div class="row">
                    <h2 class="title line-bottom mt-0 mb-30 text-center"><i
                            class="fa fa-camera-retro text-gray-darkgray mr-10"></i>
                        @if (session()->get('language') == 'bangla')
                            ভিডিও
                        @elseif (session()->get('language') == 'arabic')
                            فيديو
                        @else
                            Video
                        @endif
                        <span class="text-theme-colored">
                            @if (session()->get('language') == 'bangla')
                                গ্যালরি
                            @elseif (session()->get('language') == 'arabic')
                                صالة عرض
                            @else
                                Gallery
                            @endif
                        </span>
                    </h2>
                    @foreach ($videos as $video)
                         <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                             <article class="post clearfix bg-lighter mb-sm-30">
                                 <div class="card pb-0 custom_card"
                                     style="width:100%; border-radius: 20px; overflow: hidden">
                                     <!-- Wrap the video link in a div with a class -->
                                     <div class="video-wrapper"
                                         style="border-top-right-radius: 20px; border-top-left-radius: 20px; overflow: hidden;">
                                         {!! $video->video_link !!}
                                     </div>
                                     <div class="card-body" style="padding: 15px;">
                                         <p class="card-text">
                                             @if (session()->get('language') == 'bangla')
                                                 কার্ডের শিরোনাম তৈরি করতে এবং কার্ডের বেশিরভাগ বিষয়বস্তু তৈরি করার
                                                 জন্য কিছু দ্রুত উদাহরণ পাঠ্য।
                                             @elseif (session()->get('language') == 'arabic')
                                                 بعض النصوص السريعة النموذجية للبناء على عنوان البطاقة وتشكيل الجزء
                                                 الأكبر من محتوى البطاقة.
                                             @else
                                                 Some quick example text to build on the card title and make up the bulk
                                                 of the card's content.
                                             @endif
                                         </p>
                                     </div>
                                 </div>
                             </article>
                         </div>
                     @endforeach

                </div>
            </div>
        </div>
    </section>
    <!-- Main content End -->
@endsection
