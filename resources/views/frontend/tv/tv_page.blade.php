@extends('frontend.master')
@section('title')
    @if (session()->get('language') == 'bangla')
        সরাসরি সম্প্রচার
    @elseif (session()->get('language') == 'arabic')
        البث التلفزيوني المباشر
    @else
        Live Tv
    @endif
@endsection
@push('frontend_style')
    <style>
        .custom_card {
            box-shadow: 0 4px 16px 0 rgba(0, 241, 67, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19) !important;
        }

        .pagination>.active>a,
        .pagination>.active>a:focus,
        .pagination>.active>a:hover,
        .pagination>.active>span,
        .pagination>.active>span:focus,
        .pagination>.active>span:hover {
            z-index: 3;
            color: #fff;
            cursor: default;
            background-color: #29b54e;
            border-color: #29b54e;
        }

        .custom_card img {
            width: 100%;
            height: 350px;
            /* Set a fixed height */
            object-fit: cover;
            /* Ensure the image covers the area without distortion */
            border-radius: 20px;
        }
    </style>
@endpush
@section('content')
    <!-- Main content Start -->
    <section class="inner-header divider parallax layer-overlay overlay-dark-5"
    data-bg-img="{{ $banner && $banner->image ? asset($banner->image) : asset('frontend/images/bg/bg1.jpg') }}">
        <div class="container pt-60 pb-40">
            <!-- Section Content -->
            <div class="section-content pt-100">
                <div class="row">
                    <div class="col-md-12">
                        {{-- <h3 class="title text-white">
                            @if (session()->get('language') == 'bangla')
                                সরাসরি সম্প্রচার
                            @elseif (session()->get('language') == 'arabic')
                                البث التلفزيوني المباشر
                            @else
                                Live Tv
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
                                </a></li> --}}
                            <li class="active">
                                {{-- @if (session()->get('language') == 'bangla')
                                    সরাসরি সম্প্রচার
                                @elseif (session()->get('language') == 'arabic')
                                    البث التلفزيوني المباشر
                                @else
                                    Live Tv
                                @endif --}}
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumbs End -->

    <!-- Audio Section Start -->
    <div id="rs-popular-courses" class="rs-popular-courses style4 orange-color pt-110 pb-120 md-pt-70 md-pb-80">
        <div class="container">
            <div class="row ">
                <div class="col-lg-7 col-md-7">
                    <div class="row">
                        @forelse ($tvs as $tv)
                            <div class="col-md-12">
                                <a href="">
                                    <div class="custom_card"
                                        style="padding: 20px; border-radius: 20px; margin-bottom: 30px;">
                                        @if ($tv->file_upload && file_exists(public_path('file_upload/' . $tv->file_upload)))
                                            <video controls width="100%">
                                                <source src="{{ asset('file_upload/' . $tv->file_upload) }}"
                                                    type="video/{{ pathinfo($tv->file_upload, PATHINFO_EXTENSION) }}">
                                                Your browser does not support the video element.
                                            </video>
                                        @else
                                            {{-- <p>{!! $tv->embed_video ?? null !!}</p> --}}
                                            <!-- Blade Template -->


                                            {{-- <video width="640" height="360" controls>
                                                <source src="{{ $tv->embed_video }}" type="video/mp4">
                                                Your browser does not support the video tag.
                                              </video> --}}
                                              @php
                                              $videoLink = $tv->embed_video;

                                              if (str_contains($videoLink, 'youtu.be') || str_contains($videoLink, 'youtube.com')) {
                                                  // YouTube link
                                                  $embedLink = str_replace('youtu.be/', 'www.youtube.com/embed/', strtok($videoLink, '?'));
                                              } elseif (str_contains($videoLink, 'vimeo.com')) {
                                                  // Vimeo link
                                                  $videoId = substr(parse_url($videoLink, PHP_URL_PATH), 1); // Extract video ID
                                                  $embedLink = "https://player.vimeo.com/video/" . $videoId;
                                              } elseif (preg_match('/\.(mp4|webm|ogg)$/', $videoLink)) {
                                                  // Direct video file (mp4, webm, ogg)
                                                  $embedLink = $videoLink;
                                              } else {
                                                  // If the platform is unknown, just display the raw link as a fallback
                                                  $embedLink = null;
                                              }
                                          @endphp

                                          @if($embedLink)
                                              @if(preg_match('/youtube.com|vimeo.com/', $embedLink))
                                                  <!-- Embed YouTube or Vimeo Video -->
                                                  <iframe width="560" height="315" src="{{ $embedLink }}" frameborder="0" allowfullscreen></iframe>
                                              @elseif(preg_match('/\.(mp4|webm|ogg)$/', $embedLink))
                                                  <!-- Direct Video File -->
                                                  <video width="560" height="315" controls>
                                                      <source src="{{ $embedLink }}" type="video/{{ pathinfo($embedLink, PATHINFO_EXTENSION) }}">
                                                      Your browser does not support the video tag.
                                                  </video>
                                              @else
                                                  <!-- For unsupported platforms, display the video link -->
                                                  <a href="{{ $videoLink }}" target="_blank">{{ $videoLink }}</a>
                                              @endif
                                          @else
                                              <p>Unsupported video format or link.</p>
                                          @endif



                                        @endif
                                    </div>
                                </a>
                            </div>
                        @empty
                            <h2>
                                @if (session()->get('language') == 'bangla')
                                    কোন ভিডিও পাওয়া যায়নি
                                @elseif (session()->get('language') == 'arabic')
                                    لم يتم العثور على فيديو
                                @else
                                    No Video Found
                                @endif
                            </h2>
                        @endforelse
                    </div>
                </div>

                <div class="col-lg-5 col-md-5  align-items-center ">
                    <p>@if (session()->get('language') == 'bangla')
                       {{ $tv->short_details_bn }}
                    @else
                    {{ $tv->short_details_en }}
                    @endif</p>
                </div>

                {{-- <div class="col-lg-3 col-md-4">
                    <div class="custom_card" style="padding: 20px; border-radius: 20px; margin-bottom: 30px;">
                        <h2 style="margin-bottom: 15px">
                            @if (session()->get('language') == 'bangla')
                                বিভাগ দ্বারা খুঁজুন
                            @elseif (session()->get('language') == 'arabic')
                                ابحث عن الفئة ب
                            @else
                                Find By Category
                            @endif
                        </h2>
                        @foreach ($categories as $category)
                            <div class="dropdown" style="margin: 2px 0">
                                <button class="btn btn-success dropdown-toggle" style="width: 100%; text-align: left"
                                    type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    @if (session()->get('language') == 'bangla')
                                        {{ $category->category_name_ban }}
                                    @elseif (session()->get('language') == 'arabic')
                                        {{ $category->category_name_ab }}
                                    @else
                                        {{ $category->category_name }}
                                    @endif
                                    <span class="caret pull-right" style="margin-top:7px"></span>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                    @foreach ($category->tvSubcategories as $subcategory)
                                        <li><a href="{{ route('subcategory.tv', ['id' => $subcategory->id]) }}">
                                                @if (session()->get('language') == 'bangla')
                                                    {{ $subcategory->subcategory_name_ban }}
                                                @elseif (session()->get('language') == 'arabic')
                                                    {{ $subcategory->subcategory_name_ab }}
                                                @else
                                                    {{ $subcategory->subcategory_name }}
                                                @endif
                                            </a>
                                        </li>
                                    @endforeach

                                </ul>
                            </div>
                        @endforeach
                    </div>
                </div> --}}
            </div>

            <div class="col-lg-12 col-md-12  align-items-center">
                <p>@if (session()->get('language') == 'bangla')
                    {!! $tv->details_bn !!}
                @else
                {!! $tv->details_en !!}
                @endif</p>
            </div>

        </div>
    </div>
    <!-- Audio Section End -->


    {{-- </div> --}}
    <!-- Main content End -->
@endsection
@push('frontend_script')
@endpush
