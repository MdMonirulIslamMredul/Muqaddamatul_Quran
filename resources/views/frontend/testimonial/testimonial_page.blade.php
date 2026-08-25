@extends('frontend.master')
@section('title')
    Doctors
@endsection
@section('content')
    <!-- Content Wrapper Start -->
    <div class="content-wrapper">

        <!-- Breadcrumb Start -->
        <div class="breadcrumb-wrap bg-f" style="background-image: url({{asset($banner->image)}});">
            <div class="container">
                <div class="breadcrumb-title">
                    <h2>Testimonials</h2>
                    <ul class="breadcrumb-menu list-style">
                        <li><a href="{{route('front.page')}}">@if(session()->get('language')=='bangla') হোম @elseif (session()->get('language')=='arabic') بيت @else Home @endif </a></li>
                        <li>Testimonials</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Breadcrumb End -->

        <!-- Testimonial Section Start -->
        <section class="testimonial-wrap style2 ptb-100">
            <div class="container">
                <div class="row justify-content-center">
                    @foreach($testimonials as $testimonial)
                    <div class="col-xl-4 col-lg-6 col-md-6">
                        <div class="testimonial-card style2">
                            <div class="client-info-area">
                                <div class="client-info-wrap">
                                    <div class="client-img">
                                        <img src="{{asset($testimonial->image)}}" alt="Image">
                                    </div>
                                    <div class="client-info">
                                        <h3>{{$testimonial->name}}</h3>
                                        <span>{{$testimonial->designation}}</span>
                                    </div>
                                </div>
                                <div class="quote-icon">
                                    <i class="flaticon-straight-quotes"></i>
                                </div>
                            </div>

                            <ul class="ratings list-style">
                                @for($i=0;$i<$testimonial->star;$i++)
                                    <li><i class="ri-star-fill"></i></li>
                                @endfor
                            </ul>
                            <p class="client-quote">{!! $testimonial->review !!}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!-- Testimonial Section End -->

    </div>
    <!-- Content wrapper end -->
@endsection
