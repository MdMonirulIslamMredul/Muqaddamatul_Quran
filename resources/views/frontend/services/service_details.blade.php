@extends('frontend.master')
@section('title')
    details
@endsection
@section('content')


    <!-- Main content Start -->
    <div class="main-content">
        <!-- Breadcrumbs Start -->
        <div class="rs-breadcrumbs breadcrumbs-overlay">
            <div class="breadcrumbs-img">
                <img src="{{asset($service->banner_image)}}" alt="Breadcrumbs Image">
            </div>
            <div class="breadcrumbs-text white-color">
                <h1 class="page-title">{{$service->service_title}}</h1>
                <ul>
                    <li>
                        <a class="active" href="{{route('front.page')}}">@if(session()->get('language')=='bangla') হোম @elseif (session()->get('language')=='arabic') بيت @else Home @endif</a>
                    </li>
                    <li>Course Details</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumbs End -->

        <!-- Intro Courses -->
        <section class="intro-section gray-bg pt-94 pb-100 md-pt-64 md-pb-70">
            <div class="container">
                <div class="row clearfix">
                    <!-- Content Column -->
                    <div class="col-lg-12 md-mb-50">
                        <!-- Intro Info Tabs-->
                        <div class="intro-info-tabs">
                            <div class="tab-content tabs-content" id="myTabContent">
                                <div class="tab-pane tab fade show active" id="prod-overview" role="tabpanel" aria-labelledby="prod-overview-tab">
                                    <div class="content white-bg pt-30">
                                        <!-- Cource Overview -->
                                        <div class="col-xl-12 p-5">
                                            <div class="service-desc">
                                                {!! $service->service_details1 !!}
                                                    <a class="readon orange-btn main-home" href="{{route('enrollment',['id'=>$service->id])}}">Enroll Now</a>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <a class="single-service-img" data-fancybox="gallery">
                                                            <img src="{{asset($service->details_image1)}}" class="my-3 w-100" style="height: 300px" alt="Image">
                                                        </a>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <a class="single-service-img" data-fancybox="gallery" >
                                                            <img src="{{asset($service->details_image2)}}" style="height: 300px"  class="my-3 w-100" alt="Image">
                                                        </a>
                                                    </div>
                                                </div>
                                                {!! $service->service_details2 !!}
                                                <a class="single-service-img" data-fancybox="gallery" >
                                                    <img src="{{asset($service->details_image3)}}"  class="my-3 w-75"  alt="Image">
                                                </a>
                                                {!! $service->service_details3 !!}
                                                <a class="readon orange-btn main-home mt-3" href="{{route('enrollment',['id'=>$service->id])}}">Enroll Now</a>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <!-- End intro Courses -->

    </div>
    <!-- Main content End -->
@endsection
