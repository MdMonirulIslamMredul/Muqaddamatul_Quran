@extends('frontend.master')
@section('title')
    Consultancy
@endsection
@section('content')


    <!-- Main content Start -->
    <div class="main-content">
        <!-- Breadcrumbs Start -->
        <div class="rs-breadcrumbs breadcrumbs-overlay">
            <div class="breadcrumbs-img">
                <img src="{{asset($consultancy->banner_image)}}" alt="Breadcrumbs Image">
            </div>
            <div class="breadcrumbs-text white-color">
                <h1 class="page-title">{{ $consultancy->title }}</h1>
                <ul>
                    <li>
                        <a class="active" href="{{route('front.page')}}">@if(session()->get('language')=='bangla') হোম @elseif (session()->get('language')=='arabic') بيت @else Home @endif</a>
                    </li>
                    <li>{{ $consultancy->title }}</li>
                </ul>

            </div>

        </div>
        <!-- Breadcrumbs End -->

        <!-- Blog Section Start -->
        <div class="rs-inner-blog orange-color pt-100 pb-100 md-pt-70 md-pb-70">
            <div class="container-fluid">
                <div class="blog-deatails">
                    {{-- <div class="bs-img">
                        <a href="#"><img src="" width="100%" height="600px" alt=""></a>
                    </div> --}}
                    <div class="blog-full">
                        <div class="row">
                            <div class="col-4 col-md-2" >
                                <div style="width: 250px;height:300px;border:2px solid black">
                                    <img src="{{asset($consultancy->image)}}" alt="image" style="width: 100%;height:100%">
                                </div>
                            </div>
                            <div class="col-8 col-md-10 p-0">
                               <h2>{{ $consultancy->name }}</h2>
                               <h4>Designation: {{ $consultancy->designation }}</h4>
                            </div>
                        </div>
                        <div class="post-para mt-5">
                            <div class="row">
                                {!! $consultancy->details1 !!}
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- Blog Section End -->

    </div>
    <!-- Main content End -->
@endsection
