@extends('frontend.master')
@section('title')
    Gallery
@endsection
@push('frontend_style')
    <!-- Masonry CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/masonry/4.2.2/masonry.min.css">
    <!-- Lightbox CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css">
    <style>
        .grid-item {
            width: 24%;
            margin: .5%;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            position: relative;
            background: #f8faf9;
            transition: transform 0.3s ease;
        }
        .grid-item:hover {
            transform: translateY(-3px);
        }
        .grid-item img {
            width: 100%;
            display: block;
            border-radius: 8px;
            transition: transform 0.4s ease;
        }
        .grid-item:hover img {
            transform: scale(1.06);
        }
        .grid-item .overlay-shade {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(15, 40, 30, 0.85);
            opacity: 0;
            transition: opacity 0.3s ease;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 16px;
            text-align: center;
            border-radius: 8px;
            z-index: 2;
        }
        .grid-item:hover .overlay-shade {
            opacity: 1;
        }
        .grid-bottom-caption {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            padding: 24px 12px 10px;
            background: linear-gradient(to top, rgba(15, 40, 30, 0.85) 0%, rgba(15, 40, 30, 0.4) 70%, transparent 100%);
            transition: opacity 0.3s ease;
            z-index: 1;
            border-bottom-left-radius: 8px;
            border-bottom-right-radius: 8px;
        }
        .grid-item:hover .grid-bottom-caption {
            opacity: 0;
        }
        @media (max-width: 992px) {
            .grid-item {
                width: 32%;
                margin: .66%;
            }
        }
        @media (max-width: 768px) {
            .grid-item {
                width: 48.5%;
                margin: .75%;
            }
        }
        @media (max-width: 576px) {
            .grid-item {
                width: 100%;
                margin: 0 0 16px;
            }
        }
        .gallery-category-filter {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 8px;
            margin-bottom: 30px;
        }
        .btn-gallery-filter {
            border: 1px solid #d1e7dd;
            border-radius: 25px;
            padding: 7px 18px;
            font-size: 13px;
            font-weight: 600;
            color: #1b4332;
            background: #f8faf9;
            transition: all 0.25s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
        }
        .btn-gallery-filter:hover, .btn-gallery-filter.active {
            background: #1b4332 !important;
            color: #ffffff !important;
            border-color: #1b4332 !important;
            box-shadow: 0 4px 12px rgba(27, 67, 50, 0.25);
            transform: translateY(-2px);
        }
        .btn-gallery-filter .count-badge {
            font-size: 11px;
            margin-left: 5px;
            opacity: 0.85;
        }
    </style>
@endpush

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
                        <ul class="breadcrumb white">
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Gallery Grid 4 -->
    <section id="gallery" class="pt-50 pb-50" style="background: #ffffff;">
        <div class="container">
            <div class="section-content">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="title line-bottom mt-0 mb-30 text-center" style="font-size: 26px; font-weight: 700; color: #1b4332;">
                            <i class="fa fa-camera-retro text-gray-darkgray mr-10" style="color: #2d6a4f;"></i>
                            @if (session()->get('language') == 'bangla')
                                ফটো <span class="text-theme-colored" style="color: #2d6a4f;">গ্যালারি</span>
                            @elseif (session()->get('language') == 'arabic')
                                معرض <span class="text-theme-colored">الصور</span>
                            @else
                                Photo <span class="text-theme-colored">Gallery</span>
                            @endif
                        </h2>

                        <!-- Category Filter Navigation -->
                        @if($categories->count() > 0)
                            <div class="gallery-category-filter">
                                <a href="{{ route('gallery.page') }}" class="btn-gallery-filter {{ empty($activeCategory) ? 'active' : '' }}">
                                    <i class="fa fa-th-large mr-5"></i>
                                    @if (session()->get('language') == 'bangla')
                                        সকল ছবি
                                    @elseif (session()->get('language') == 'arabic')
                                        الكل
                                    @else
                                        All Photos
                                    @endif
                                </a>
                                @foreach($categories as $cat)
                                    <a href="{{ route('gallery.page', ['category' => $cat->slug]) }}" 
                                       class="btn-gallery-filter {{ !empty($activeCategory) && $activeCategory->id == $cat->id ? 'active' : '' }}">
                                        {{ $cat->displayName }}
                                        <span class="count-badge">({{ $cat->active_galleries_count }})</span>
                                    </a>
                                @endforeach
                            </div>
                        @endif

                        <!-- Portfolio Gallery Grid -->
                        @if($galleries->count() > 0)
                            <div class="grid">
                                @foreach($galleries as $gallery)
                                    <div class="grid-item">
                                        <a href="{{ asset($gallery->image) }}" 
                                           data-lightbox="gallery" 
                                           data-title="{{ $gallery->title ? $gallery->title . ($gallery->description ? ' — ' . $gallery->description : '') : 'Photo Gallery' }}"
                                           style="display: block; position: relative; text-decoration: none;">
                                            <img src="{{ asset($gallery->image) }}" alt="{{ $gallery->title ?: 'Gallery Image' }}">
                                            
                                            <!-- Category Badge on Top-Left -->
                                            @if($gallery->category)
                                                <span style="position: absolute; top: 10px; left: 10px; z-index: 3; background: rgba(20, 50, 38, 0.85); color: #ffffff; font-size: 11px; font-weight: 600; padding: 3px 8px; border-radius: 4px; box-shadow: 0 2px 6px rgba(0,0,0,0.2);">
                                                    <i class="fa fa-tag mr-5" style="font-size: 10px;"></i>{{ $gallery->category->displayName }}
                                                </span>
                                            @endif

                                            <!-- Bottom Caption if Title exists -->
                                            @if($gallery->title)
                                                <div class="grid-bottom-caption">
                                                    <h6 style="color: #ffffff; font-size: 13px; font-weight: 600; margin: 0; text-shadow: 0 1px 3px rgba(0,0,0,0.8); white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                                        {{ $gallery->title }}
                                                    </h6>
                                                </div>
                                            @endif

                                            <!-- Hover Overlay with Title, Description & Icon -->
                                            <div class="overlay-shade">
                                                <span style="width: 42px; height: 42px; border-radius: 50%; background: #ffffff; color: #1b4332; display: flex; align-items: center; justify-content: center; font-size: 17px; margin-bottom: 8px; box-shadow: 0 4px 10px rgba(0,0,0,0.3);">
                                                    <i class="fa fa-search-plus"></i>
                                                </span>
                                                @if($gallery->title)
                                                    <h5 style="color: #ffffff; font-size: 14px; font-weight: 700; margin: 0 0 5px; line-height: 1.3;">
                                                        {{ $gallery->title }}
                                                    </h5>
                                                @endif
                                                @if($gallery->description)
                                                    <p style="color: #d1e7dd; font-size: 11px; margin: 0; line-height: 1.4; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden;">
                                                        {{ $gallery->description }}
                                                    </p>
                                                @endif
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="text-center py-60 my-30" style="background: #f8fafc; border-radius: 12px; border: 1px dashed #cbd5e1;">
                                <i class="fa fa-image fa-3x text-muted mb-15" style="color: #94a3b8;"></i>
                                <h5 class="text-muted fw-bold">বর্তমানে কোনো ছবি পাওয়া যায়নি</h5>
                                <p class="text-muted small">এই ক্যাটাগরিতে এখনও কোনো ছবি যুক্ত করা হয়নি।</p>
                                <a href="{{ route('gallery.page') }}" class="btn btn-sm btn-outline-success mt-10">
                                    সকল ছবি দেখুন
                                </a>
                            </div>
                        @endif
                        <!-- End Portfolio Gallery Grid -->

                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Main content End -->
@endsection

@push('frontend_script')
    <!-- Masonry JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/masonry/4.2.2/masonry.pkgd.min.js"></script>
    <!-- Lightbox JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var elem = document.querySelector('.grid');
            if (elem) {
                var msnry = new Masonry(elem, {
                    itemSelector: '.grid-item',
                    columnWidth: '.grid-item',
                    percentPosition: true
                });
            }
        });
    </script>
@endpush
