@extends('frontend.master')
@section('title')
    Research
@endsection
@section('content')

    <!-- Main content Start -->
    <div class="main-content">
        <!-- Breadcrumbs Start -->
        <div class="rs-breadcrumbs breadcrumbs-overlay">
            <div class="breadcrumbs-img">
                <img src="{{asset($banner->image)}}" alt="Breadcrumbs Image">
            </div>
            <div class="breadcrumbs-text white-color">
                <h1 class="page-title">Research</h1>
                <ul>
                    <li>
                        <a class="active" href="{{route('front.page')}}">@if(session()->get('language')=='bangla') হোম @elseif (session()->get('language')=='arabic') بيت @else Home @endif</a>
                    </li>
                    <li>Research</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumbs End -->

        <!-- Popular Courses Section Start -->
        <div id="rs-popular-courses" class="rs-popular-courses style1 orange-color pt-100 pb-100 md-pt-70 md-pb-70">
            <div class="container">
                <div class="row grid">
                    @foreach($researches as $research)
                        <div class="col-lg-4 col-md-6 grid-item filter1">
                            <div class="mb-30" style="border: 1px solid #dfe9eb;transition: all 0.3s ease;">
                                <div class="">
                                    <img src="{{asset($research->main_image)}}" width="100%" style="height: 250px" alt="">
                                </div>
                                @php $timestamp = strtotime($research->created_at); $month = date('M', $timestamp);$year = date('Y', $timestamp);@endphp
                                <div class="content-part p-3">
                                    <ul class="meta-part">
                                        <li><i style="color: #FF5421" class="fa fa-calendar me-2"></i>&nbsp;{{ $month }} {{ $research->created_at->format('d') }}, {{$year}}</li>
                                    </ul>
                                    <h3 class="title"><a style="color: #FF5421" href="">{{$research->title??null}}</a></h3>
                                    <div>{!! $research->short_details??null !!}</div>
                                    <div class="bottom-part">
                                        <div class="info-meta">

                                        </div>
                                        <div class="btn-part">
                                            <a style="color: #FF5421" href="{{route('research.details',['id'=>$research->id])}}">Read More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                {{$researches->links()}}
            </div>
        </div>
        <!-- Popular Courses Section End -->


    </div>
    <!-- Main content End -->
@endsection
