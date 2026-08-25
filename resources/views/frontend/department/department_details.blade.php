@extends('frontend.master')
@section('title')
Department Details
@endsection
@section('content')
{{-- <!-- Main content Start -->
    <div class="main-content">
        <!-- Breadcrumbs Start -->
        <div class="rs-breadcrumbs breadcrumbs-overlay">
            <div class="breadcrumbs-img">
                <img src="{{asset($department->banner_image)}}" alt="Breadcrumbs Image">
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
                <a href="#"><img src="{{asset($department->details_image1)}}" width="100%" height="600px" alt=""></a>
            </div>
            <div class="blog-full">
                <div class="post-para">
                    {!! $department->details1 !!}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="post-img">
                                <img src="{{asset($department->details_image2)}}" width="100%" class="mb-2" alt="Image">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="post-img">
                                <img src="{{asset($department->details_image3)}}" width="100%" class="mb-2" alt="Image">
                            </div>
                        </div>
                    </div>
                    {!! $department->details2 !!}
                </div>
            </div>
        </div>

    </div>
</div>
<!-- Blog Section End -->

</div>
<!-- Main content End --> --}}


<section class="inner-header divider parallax layer-overlay overlay-dark-5"
    data-bg-img="{{ asset($department->banner_image) }}">
    <div class="container pt-60 pb-40">
        <!-- Section Content -->
        <div class="section-content pt-100">
            <div class="row">
                <div class="col-md-12">
                    {{-- <h3 class="title text-white">
                            @if (session()->get('language') == 'bangla')
                                    বিস্তারিত সংবাদ
                                @elseif (session()->get('language') == 'arabic')
                                أخبار مفصلة
                                @else
                                    Blog Details
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
                            বিস্তারিত সংবাদ
                            @elseif (session()->get('language') == 'arabic')
                            أخبار مفصلة
                            @else
                            Blog Details
                            @endif
                        </li> --}}
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="container mt-30 mb-30 pt-30 pb-30">


    <!-- Card with Shadow -->
    <div class="panel panel-default card-shadow-lg">
        <div class="panel-body">
            <div class="entry-date media-left text-center flip bg-theme-colored pt-5 pr-15 pb-5 pl-15 mb-30">
                <ul>
                    <li class="font-16 text-white font-weight-600">
                        {{ Carbon\Carbon::parse($department->created_at)->format('d') }}</li>
                    <li class="font-12 text-white text-uppercase">
                        {{ Carbon\Carbon::parse($department->created_at)->format('M') }}</li>
                </ul>
            </div>
            <h2> @if (session()->get('language') == 'bangla')
                {!! $department->title_bn !!}

                @else
                {!! $department->title_en !!}
                @endif</h2>

            <!-- Row 1: Thumbnail Image -->
            <div class="row">
                <div class="col-md-12">
                    <div class="thumbnail">
                        <img src="{{ asset('images/'.$department->thumbnil_img) }}" alt="Thumbnail Image">
                    </div>
                </div>
            </div>

            <!-- Row 2: Description -->
            <div class="row">
                <div class="col-md-12">
                    <p class="mt-10">
                        @if (session()->get('language') == 'bangla')
                        {!! $department->des_bn !!}

                        @else
                        {!! $department->des_en !!}
                        @endif
                    </p>
                </div>
            </div>

            <!-- Row 3: Image1 and Description2 -->
            <div class="row">
                <div class="col-md-6 mt-30 mb-30 pt-30 pb-30">
                    <img src="{{ asset('images/'.$department->image1) }}" alt="Thumbnail Image">
                </div>
                <div class="col-md-6 mt-30 mb-30 pt-30 pb-30">
                    <p class="mt-10">
                        @if (session()->get('language') == 'bangla')
                        {!! $department->des2_bn !!}

                        @else
                        {!! $department->des2_en !!}
                        @endif
                    </p>
                </div>
            </div>

            <!-- Row 4: Image3 and Image4 -->
            <div class="row">
                <div class="col-md-6 mt-30 mb-30 pt-30 pb-30 ">
                    <img src="{{ asset('images/'.$department->image2) }}" alt="Thumbnail Image">
                </div>
                <div class="col-md-6 mt-30 mb-30 pt-30 pb-30">
                    <img src="{{ asset('images/'.$department->image3) }}" alt="Thumbnail Image">
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
