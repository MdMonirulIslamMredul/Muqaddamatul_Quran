@extends('frontend.master')
@section('title')
    Blogs
@endsection
@section('content')
    {{-- <!-- Main content Start -->
    <div class="main-content">
        <!-- Breadcrumbs Start -->
        <div class="rs-breadcrumbs breadcrumbs-overlay">
            <div class="breadcrumbs-img">
                <img src="{{asset($banner->image)}}" alt="Breadcrumbs Image">
            </div>
            <div class="breadcrumbs-text white-color">
                <h1 class="page-title">Blogs</h1>
                <ul>
                    <li>
                        <a class="active" href="{{route('front.page')}}">Home</a>
                    </li>
                    <li>Blogs</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumbs End -->

        <!-- Popular Courses Section Start -->
        <div id="rs-popular-courses" class="rs-popular-courses style1 orange-color pt-100 pb-100 md-pt-70 md-pb-70">
            <div class="container">
                <div class="row grid">
                    @foreach ($blogs as $blog)
                    <div class="col-lg-4 col-md-6 grid-item filter1">
                        <div class="mb-30" style="border: 1px solid #dfe9eb;transition: all 0.3s ease;">
                            <div class="">
                                <img src="{{asset($blog->main_image)}}" width="100%" style="height: 250px" alt="">
                            </div>
                            @php $timestamp = strtotime($blog->created_at); $month = date('M', $timestamp);$year = date('Y', $timestamp);@endphp
                            <div class="content-part p-3">
                                <ul class="meta-part">
                                    <li><i style="color: #FF5421" class="fa fa-calendar me-2"></i>&nbsp;{{ $month }} {{ $blog->created_at->format('d') }}, {{$year}}</li>
                                </ul>
                                <h3 class="title"><a style="color: #FF5421" href="">{{$blog->title??null}}</a></h3>
                                <div>{!! $blog->short_details??null !!}</div>
                                <div class="bottom-part">
                                    <div class="info-meta">

                                    </div>
                                    <div class="btn-part">
                                        <a style="color: #FF5421" href="{{route('blogs.details',['id'=>$blog->id])}}">@if (session()->get('language') == 'bangla') আরো পড়ুন @else Read More @endif </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                {{$blogs->links()}}
            </div>
        </div>
        <!-- Popular Courses Section End -->


    </div>
    <!-- Main content End --> --}}


    <section class="inner-header divider parallax layer-overlay overlay-dark-5" data-bg-img="{{ asset($banner->image) }}">
        <div class="container pt-60 pb-40">
            <!-- Section Content -->
            <div class="section-content pt-100">
                <div class="row">
                    <div class="col-md-12">
                        {{-- <h3 class="title text-white">
                            @if (session()->get('language') == 'bangla')
                                ব্লগ
                            @elseif (session()->get('language') == 'arabic')
                                مدونة
                            @else
                                Blog
                            @endif
                        </h3> --}}
                        <ul class="breadcrumb white">
                            {{-- <li><a href="index-mp-layout1.html">
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
                                    ব্লগ
                                @elseif (session()->get('language') == 'arabic')
                                    مدونة
                                @else
                                    Blog
                                @endif
                            </li> --}}
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row multi-row-clearfix">
                <div class="blog-posts">
                    @foreach ($blogs as $blog)
                        <div class="col-md-6">
                            <article class="post clearfix mb-30 bg-lighter">
                                <div class="entry-header">
                                    <div class="post-thumb thumb">
                                        <img src="{{ asset($blog->main_image) }}" alt=""
                                            class="img-responsive img-fullwidth" style="height: 350px">
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
                                                <h4 class="entry-title text-white text-uppercase m-0 mt-5"><a
                                                        href="#">
                                                        @if (session()->get('language') == 'bangla')
                                                            {{ $blog->title_bn }}
                                                        @elseif (session()->get('language') == 'arabic')
                                                            {{ $blog->title_ab }}
                                                        @else
                                                            {{ $blog->title }}
                                                        @endif
                                                    </a></h4>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="mt-10">
                                        @if (session()->get('language') == 'bangla')
                                            {!! $blog->details1_bn !!}
                                        @elseif (session()->get('language') == 'arabic')
                                            {!! $blog->details1_ab !!}
                                        @else
                                        {!! substr($blog->details1, 0,300,) !!}
                                        @endif
                                    </p>
                                    <a href="{{ route('blogs.details', $blog->id) }}" class="btn-read-more">
                                        @if (session()->get('language') == 'bangla')
                                            বিস্তারিত পড়ুন
                                        @elseif (session()->get('language') == 'arabic')
                                            قراءة التفاصيل
                                        @else
                                        <button class="btn btn-copy-link btn-danger">
                                            <i class="fa fa-book"></i> Read More
                                        </button>
                                        @endif
                                    </a>
                                    <div class="clearfix"></div>
                                </div>
                            </article>
                        </div>
                    @endforeach

                    <div class="col-md-12">
                        {{ $blogs->links() }}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
