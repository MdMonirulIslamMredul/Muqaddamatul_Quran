@extends('frontend.master')
@section('title')
    Services
@endsection
@section('content')

    <!-- Main content Start -->
    <div class="main-content">
        <!-- Breadcrumbs Start -->
        <div class="rs-breadcrumbs breadcrumbs-overlay">
            <div class="breadcrumbs-img">

                <img src="{{asset($banner->image) }}" alt="Breadcrumbs Image">
            </div>
            <div class="breadcrumbs-text white-color">
                <h1 class="page-title">Courses</h1>
                <ul>
                    <li>
                        <a class="active" href="{{route('front.page')}}">@if(session()->get('language')=='bangla') হোম @elseif (session()->get('language')=='arabic') بيت @else Home @endif</a>
                    </li>
                    <li>Course</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumbs End -->

        <!-- Popular Courses Section Start -->
        <div id="rs-popular-courses" class="rs-popular-courses style4 orange-color pt-110 pb-120 md-pt-70 md-pb-80">
            <div class="container">
                <div class="row">
                    @foreach($services as $service)
                        <div class="col-lg-4 col-md-6 mb-30">
                            <div class="courses-item">
                                <div class="courses-grid">
                                    <div class="img-part">
                                        <a href=""><img src="{{asset($service->main_image)}}" height="250px" width="100%" alt=""></a>
                                    </div>
                                    <div class="content-part">

                                        <div class="course-price">
                                            <span class="price">$ {{$service->price}}</span>
                                        </div>
                                        <h3 class="title"><a href="{{route('services.details',['id'=>$service->id])}}">{{$service->service_title}}</a></h3>
{{--                                        <div>{!! $service->service_details_small !!}</div>--}}
                                        <a href="{{route('services.details',['id'=>$service->id])}}" class="link" style="color: #FF5421">
                                            @if(session()->get('language')== 'bangla') এখন তালিকাভুক্ত করুন @else Enroll Now @endif </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                {!! $services->links() !!}
            </div>
        </div>
        <!-- Popular Courses Section End -->


    </div>
    <!-- Main content End -->
@endsection
