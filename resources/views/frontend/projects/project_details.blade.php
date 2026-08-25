@extends('frontend.master')
@section('title')
    Projects
@endsection
@section('content')


<!-- Section: inner-header -->
<section class="inner-header divider parallax layer-overlay overlay-dark-5" data-bg-img="{{ asset('frontend/images/bg/bg1.jpg') }}">
    <div class="container pt-60 pb-40">
      <!-- Section Content -->
      <div class="section-content pt-100">
        <div class="row">
          <div class="col-md-12">
            <h3 class="title text-white">@if(session()->get('language')=='bangla') প্রজেক্ট বিস্তারিত @else Project Details @endif </h3>

            <ul class="breadcrumb white">
              <li><a href="{{ url('/') }}">@if(session()->get('language')=='bangla') হোম @elseif (session()->get('language')=='arabic') بيت @else Home @endif</a></li>
              <li class="active">Project Details</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section>
    <div class="container">
      <div class="row">
        <div class="col-md-8">
            <h2>@if(session()->get('language')=='bangla') {{ $project_details->title_bangla }} @else {{ $project_details->title }} @endif </h2>
          <div class="owl-carousel-1col" data-nav="true">
            <div class="item">
              <img src="{{ asset($project_details->image) }}" alt="">
            </div>
            <div class="item">
              <img src="{{ asset($project_details->image) }}" alt="">
            </div>
            <div class="item">
              <img src="{{ asset($project_details->image) }}" alt="">
            </div>
          </div>
        </div>
        <div class="col-md-4 mt-50">
          <h4 class="mt-0">@if(session()->get('language')=='bangla') প্রজেক্ট বিস্তারিত @else Project Details @endif</h4>
          <p>@if(session()->get('language')=='bangla') {!! $project_details->short_des_bangla !!} @else {!! $project_details->short_des_eng !!} @endif </p>

        </div>
      </div>
      <div class="row mt-20">
        <div class="col-md-12">
          <h4 class="mt-0">@if(session()->get('language')=='bangla') প্রজেক্ট বিস্তারিত @else Project Details @endif</h4>
          <p>@if(session()->get('language')=='bangla') {!! $project_details->short_des_bangla !!} @else {!! $project_details->short_des_eng !!} @endif </p>
        </div>

      </div>





      </div>
    </div>
  </section>








@endsection
