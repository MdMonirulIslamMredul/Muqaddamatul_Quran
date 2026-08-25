@extends('frontend.master')
@section('title')
    Research Details
@endsection
@section('content')


    <!-- Main content Start -->
    <div class="main-content">
        <!-- Breadcrumbs Start -->
        <div class="rs-breadcrumbs breadcrumbs-overlay">
            <div class="breadcrumbs-img">
                <img src="{{asset($research->banner_image)}}" alt="Breadcrumbs Image">
            </div>
            <div class="breadcrumbs-text white-color">
                <h1 class="page-title">Research Details</h1>
                <ul>
                    <li>
                        <a class="active" href="{{route('front.page')}}">@if(session()->get('language')=='bangla') হোম @elseif (session()->get('language')=='arabic') بيت @else Home @endif</a>
                    </li>
                    <li>Research Details</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumbs End -->

        <!-- Blog Section Start -->
        <div class="rs-inner-blog orange-color pt-100 pb-100 md-pt-70 md-pb-70">
            <div class="container">
                <div class="blog-deatails">
                    <div class="bs-img">
                        <a href="#"><img src="{{asset($research->details_image1)}}" width="100%" height="600px" alt=""></a>
                    </div>
                    <div class="blog-full">
                        <div class="post-para">
                            {!! $research->details1 !!}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="post-img">
                                        <img src="{{asset($research->details_image2)}}" width="100%" class="mb-2" alt="Image">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="post-img">
                                        <img src="{{asset($research->details_image3)}}" width="100%" class="mb-2" alt="Image">
                                    </div>
                                </div>
                            </div>
                            {!! $research->details2 !!}
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- Blog Section End -->

    </div>
    <!-- Main content End -->
@endsection
