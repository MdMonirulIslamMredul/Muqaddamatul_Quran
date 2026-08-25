@extends('frontend.master')
@section('title')
    Blog Details
@endsection
@section('content')
    {{-- <!-- Main content Start -->
    <div class="main-content">
        <!-- Breadcrumbs Start -->
        <div class="rs-breadcrumbs breadcrumbs-overlay">
            <div class="breadcrumbs-img">
                <img src="{{asset($blog->banner_image)}}" alt="Breadcrumbs Image">
            </div>
            <div class="breadcrumbs-text white-color">
                <h1 class="page-title">Blog Details</h1>
                <ul>
                    <li>
                        <a class="active" href="{{route('front.page')}}">Home</a>
                    </li>
                    <li>Blog Details</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumbs End -->

        <!-- Blog Section Start -->
        <div class="rs-inner-blog orange-color pt-100 pb-100 md-pt-70 md-pb-70">
            <div class="container">
                <div class="blog-deatails">
                    <div class="bs-img">
                        <a href="#"><img src="{{asset($blog->details_image1)}}" width="100%" height="600px" alt=""></a>
                    </div>
                    <div class="blog-full">
                        <div class="post-para">
                            {!! $blog->details1 !!}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="post-img">
                                        <img src="{{asset($blog->details_image2)}}" width="100%" class="mb-2" alt="Image">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="post-img">
                                        <img src="{{asset($blog->details_image3)}}" width="100%" class="mb-2" alt="Image">
                                    </div>
                                </div>
                            </div>
                            {!! $blog->details2 !!}
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- Blog Section End -->

    </div>
    <!-- Main content End --> --}}


    <section class="inner-header divider parallax layer-overlay overlay-dark-5"
        data-bg-img="{{ asset($blog->banner_image) }}">
        <div class="container pt-60 pb-40">
            <!-- Section Content -->
            <div class="section-content pt-100">
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="title text-white">
                            @if (session()->get('language') == 'bangla')
                                    বিস্তারিত সংবাদ
                                @elseif (session()->get('language') == 'arabic')
                                أخبار مفصلة
                                @else
                                    Blog Details
                                @endif
                        </h3>
                        <ul class="breadcrumb white">
                            <li><a href="{{ url('/') }}">
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
                                    বিস্তারিত সংবাদ
                                @elseif (session()->get('language') == 'arabic')
                                أخبار مفصلة
                                @else
                                    Blog Details
                                @endif
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <section>
        <div class="container mt-30 mb-30 pt-30 pb-30">

            <div class="row multi-row-clearfix mb-30">
                <div class="col-sm-6 col-md-12 col-lg-12 text-right">
                    <div class="share-buttons">
                        <!-- Facebook Share Button -->
                        <a href="#" class="btn btn-facebook btn-primary" onclick="shareOnFacebook('{{ url('blogs-details/' .$blog->id) }}')">
                            <i class="fa fa-facebook"></i> Share on Facebook
                        </a>

                        <!-- WhatsApp Share Button -->
                        <a href="#" class="btn btn-whatsapp btn-success" onclick="shareOnWhatsApp('{{ url('blogs-details/' .$blog->id) }}')" >
                            <i class="fa fa-whatsapp"></i> Share on WhatsApp
                        </a>

                        <!-- Copy Link Button -->
                        <button class="btn btn-copy-link btn-danger" onclick="copyLink('{{ url('blogs-details/' .$blog->id) }}')">
                            <i class="fa fa-link"></i> Copy Link
                        </button>
                    </div>
                </div>
            </div>

            <script>

                function shareOnFacebook(postUrl) {
                    const facebookShareUrl = `https://www.facebook.com/sharer/sharer.php?u=${encodeURIComponent(postUrl)}`;
                    window.open(facebookShareUrl, '_blank');
                }

                function shareOnWhatsApp(postUrl) {
                    const whatsAppShareUrl = `https://api.whatsapp.com/send?text=${encodeURIComponent(postUrl)}`;
                    window.open(whatsAppShareUrl, '_blank');
                }

                function copyLink(postUrl) {
                    navigator.clipboard.writeText(postUrl).then(() => {
                        alert('Link copied to clipboard');
                    }).catch(err => {
                        console.error('Failed to copy link: ', err);
                    });
                }

                </script>


            <div class="row ">
                <div class="col-md-10 col-md-offset-1">
                    <div class="blog-posts">
                        <div class="col-md-12">
                            <div class="row list-dashed">
                                <article class="post clearfix mb-30 bg-lighter">
                                    <div class="entry-header">
                                        <div class="post-thumb thumb">
                                            <img src="{{ asset($blog->main_image) }}" alt=""
                                                class="img-responsive img-fullwidth">
                                        </div>
                                    </div>
                                    <div class="entry-content p-20 pr-10">
                                        <div class="entry-meta media mt-0 no-bg no-border">
                                            <div
                                                class="entry-date media-left text-center flip bg-theme-colored pt-5 pr-15 pb-5 pl-15">
                                                <ul>
                                                    <li class="font-16 text-white font-weight-600">
                                                        {{ Carbon\Carbon::parse($blog->created_at)->format('d') }}</li>
                                                    <li class="font-12 text-white text-uppercase">
                                                        {{ Carbon\Carbon::parse($blog->created_at)->format('M') }}</li>
                                                </ul>
                                            </div>
                                            <div class="media-body pl-15">
                                                <div class="event-content pull-left flip">
                                                    <h4 class="entry-title text-white text-uppercase m-0 mt-5">
                                                        <a href="#">
                                                            @if (session()->get('language') == 'bangla')
                                                                {{ $blog->title_bn }}
                                                            @elseif (session()->get('language') == 'arabic')
                                                                {{ $blog->title_ab }}
                                                            @else
                                                                {{ $blog->title }}
                                                            @endif
                                                        </a>
                                                    </h4>
                                                </div>
                                            </div>
                                        </div>
                                        <p class="mt-10">
                                            @if (session()->get('language') == 'bangla')
                                                {!! $blog->short_details_bn !!}
                                            @elseif (session()->get('language') == 'arabic')
                                                {!! $blog->short_details_ab !!}
                                            @else
                                                {!! $blog->short_details !!}
                                            @endif
                                        </p>
                                        <div class="clearfix"></div>
                                    </div>
                                </article>

                                <article class="post clearfix mb-30 bg-lighter">
                                    <div class="entry-header">
                                        <div class="post-thumb thumb">
                                            <img src="{{ asset($blog->details_image1) }}" alt=""
                                                class="img-responsive img-fullwidth">
                                        </div>
                                    </div>
                                    <div class="entry-content p-20 pr-10">
                                        <p class="mt-10">
                                            @if (session()->get('language') == 'bangla')
                                                {!! $blog->details1_bn !!}
                                            @elseif (session()->get('language') == 'arabic')
                                                {!! $blog->details1_ab !!}
                                            @else
                                                {!! $blog->details1 !!}
                                            @endif
                                        </p>
                                        <div class="clearfix"></div>
                                    </div>
                                </article>

                                <article class="post clearfix mb-30 bg-lighter">
                                    <div class="entry-header">
                                        <div class="post-thumb thumb">
                                            <img src="{{ asset($blog->details_image2) }}" alt=""
                                                class="img-responsive img-fullwidth">
                                        </div>
                                    </div>
                                    <div class="entry-content p-20 pr-10">
                                        <p class="mt-10">
                                            @if (session()->get('language') == 'bangla')
                                                {!! $blog->details2_bn !!}
                                            @elseif (session()->get('language') == 'arabic')
                                                {!! $blog->details2_ab !!}
                                            @else
                                                {!! $blog->details2 !!}
                                            @endif
                                        </p>
                                        <div class="clearfix"></div>
                                    </div>
                                </article>

                                <article class="post clearfix mb-30 bg-lighter">
                                    <div class="entry-header">
                                        <div class="post-thumb thumb">
                                            <img src="{{ asset($blog->details_image3) }}" alt=""
                                                class="img-responsive img-fullwidth">
                                        </div>
                                    </div>
                                    <div class="entry-content p-20 pr-10">
                                        <p class="mt-10">
                                            @if (session()->get('language') == 'bangla')
                                                {!! $blog->short_details_bn !!}
                                            @elseif (session()->get('language') == 'arabic')
                                                {!! $blog->short_details_ab !!}
                                            @else
                                                {!! $blog->short_details !!}
                                            @endif <br>
                                            @if (session()->get('language') == 'bangla')
                                                {!! $blog->details1_bn !!}
                                            @elseif (session()->get('language') == 'arabic')
                                                {!! $blog->details1_ab !!}
                                            @else
                                                {!! $blog->details1 !!}
                                            @endif
                                        </p>
                                        <div class="clearfix"></div>
                                    </div>
                                </article>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
