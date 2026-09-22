@extends('frontend.master')
@section('title')
    Video Gallery
@endsection
@section('content')
    <style>
        .video-wrapper iframe {
            width: 100% !important;
            height: 210px !important;
            border: 0;
            display: block;
        }
        .video-category-filter {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 8px;
            margin-bottom: 30px;
        }
        .btn-video-filter {
            border: 1px solid #fed7aa;
            border-radius: 25px;
            padding: 7px 18px;
            font-size: 13px;
            font-weight: 600;
            color: #9a3412;
            background: #fffaf5;
            transition: all 0.25s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
        }
        .btn-video-filter:hover, .btn-video-filter.active {
            background: #ea580c !important;
            color: #ffffff !important;
            border-color: #ea580c !important;
            box-shadow: 0 4px 12px rgba(234, 88, 12, 0.25);
            transform: translateY(-2px);
        }
        .btn-video-filter .count-badge {
            font-size: 11px;
            margin-left: 5px;
            opacity: 0.85;
        }
    </style>
    <!-- Main content Start -->

    <!-- Section: inner-header -->
    <section class="inner-header divider parallax layer-overlay overlay-dark-5"
    data-bg-img="{{ $banner && $banner->image ? asset($banner->image) : asset('frontend/images/bg/bg1.jpg') }}">
        <div class="container pt-60 pb-40">
            <!-- Section Content -->
            <div class="section-content pt-100">
                <div class="row">
                    <div class="col-md-12">
                        <ul class="breadcrumb white">
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Gallery Grid 4 -->
    <section class="pt-50 pb-50" style="background: #ffffff;">
        <div class="container">
            <div class="section-content">
                <div class="row">
                    <div class="col-md-12">
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

                        <!-- Video Category Filter Navigation -->
                        @if($categories->count() > 0)
                            <div class="video-category-filter">
                                <a href="{{ route('video.gallery') }}" class="btn-video-filter {{ empty($activeCategory) ? 'active' : '' }}">
                                    <i class="fa fa-play-circle mr-5"></i>
                                    @if (session()->get('language') == 'bangla')
                                        সকল ভিডিও
                                    @elseif (session()->get('language') == 'arabic')
                                        جميع الفيديوهات
                                    @else
                                        All Videos
                                    @endif
                                </a>
                                @foreach($categories as $cat)
                                    <a href="{{ route('video.gallery', ['category' => $cat->slug]) }}" 
                                       class="btn-video-filter {{ !empty($activeCategory) && $activeCategory->id == $cat->id ? 'active' : '' }}">
                                        {{ $cat->displayName }}
                                        <span class="count-badge">({{ $cat->active_video_galleries_count }})</span>
                                    </a>
                                @endforeach
                            </div>
                        @endif

                        <!-- Video Cards Grid -->
                        @if($videos->count() > 0)
                            <div class="row">
                                @foreach ($videos as $video)
                                     <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                                         <article class="post clearfix bg-lighter mb-sm-30">
                                             <div class="card pb-0 custom_card"
                                                 style="width:100%; border-radius: 14px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.06); background: #ffffff; margin-bottom: 25px; border: 1px solid #f1f5f9;">
                                                 <!-- Video Player or Embed -->
                                                 <div class="video-wrapper position-relative"
                                                     style="border-top-right-radius: 14px; border-top-left-radius: 14px; overflow: hidden; background: #000; height: 210px;">
                                                     
                                                     <!-- Category Badge -->
                                                     @if($video->category)
                                                         <span style="position: absolute; top: 10px; left: 10px; z-index: 5; background: rgba(220, 38, 38, 0.85); color: #ffffff; font-size: 11px; font-weight: 600; padding: 3px 8px; border-radius: 4px; box-shadow: 0 2px 6px rgba(0,0,0,0.3);">
                                                             <i class="fa fa-tag mr-5" style="font-size: 10px;"></i>{{ $video->category->displayName }}
                                                         </span>
                                                     @endif

                                                     @if($video->video_file)
                                                         <video controls playsinline preload="metadata" poster="{{ $video->thumbnail ? asset($video->thumbnail) : '' }}" style="width: 100%; height: 210px; object-fit: cover;">
                                                             <source src="{{ asset($video->video_file) }}">
                                                             Your browser does not support HTML5 video.
                                                         </video>
                                                     @else
                                                         {!! $video->video_link !!}
                                                     @endif
                                                 </div>
                                                 <div class="card-body" style="padding: 14px;">
                                                     <h5 class="card-title" style="font-size: 14px; font-weight: 600; margin: 0; color: #1e293b; line-height: 1.4; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;" title="{{ $video->title }}">
                                                         {{ $video->title ?? ($video->video_file ? basename($video->video_file) : 'Video') }}
                                                     </h5>
                                                 </div>
                                             </div>
                                         </article>
                                     </div>
                                 @endforeach
                            </div>
                        @else
                            <div class="text-center py-60 my-30" style="background: #f8fafc; border-radius: 12px; border: 1px dashed #cbd5e1;">
                                <i class="fa fa-video-slash fa-3x text-muted mb-15" style="color: #94a3b8;"></i>
                                <h5 class="text-muted fw-bold">বর্তমানে কোনো ভিডিও পাওয়া যায়নি</h5>
                                <p class="text-muted small">এই ক্যাটাগরিতে এখনও কোনো ভিডিও যুক্ত করা হয়নি।</p>
                                <a href="{{ route('video.gallery') }}" class="btn btn-sm btn-outline-danger mt-10">
                                    সকল ভিডিও দেখুন
                                </a>
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Main content End -->
@endsection
