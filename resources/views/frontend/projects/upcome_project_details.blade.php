@extends('frontend.master')
@section('title')
    Gallery
@endsection
@section('content')


<!-- Section: inner-header -->
<section class="inner-header divider parallax layer-overlay overlay-dark-5" data-bg-img="{{ asset('frontend/images/bg/bg1.jpg') }}">
    <div class="container pt-60 pb-40">
      <!-- Section Content -->
      <div class="section-content pt-100">
        <div class="row">
          <div class="col-md-12">
            <h3 class="title text-white">@if(session()->get('language')=='bangla') আসন্ন প্রকল্প @else Upcomeing Project @endif </h3>

            <ul class="breadcrumb white">
              <li><a href="{{ url('/') }}">@if(session()->get('language')=='bangla') হোম @elseif (session()->get('language')=='arabic') بيت @else Home @endif</a></li>
              <li class="active">Upcomeing Project</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section>
    <div class="container">
      <div class="row">
        <div class="col-md-6">
            <h2 style="text-align: center">@if(session()->get('language')=='bangla') {{ $upcome_project_details->bangla_title }} @else {{ $upcome_project_details->title }} @endif </h2>
          <div class="owl-carousel-1col" data-nav="true">
            <div class="item">
              <img src="{{ asset($upcome_project_details->image1 ?? null) }}" alt="">
            </div>
            <div class="item">
              <img src="{{ asset($upcome_project_details->image2 ?? null ) }}" alt="">
            </div>
            <div class="item">
              <img src="{{ asset($upcome_project_details->image3 ?? null ) }}" alt="">
            </div>
          </div>
        </div>
        <div class="col-md-6 mt-70" style="border: 1px solid green;border-radius:20px;">
            <h2></h2>
            <table>
                <tr>
                    <th>Topics:</th>
                    <td>{!! $upcome_project_details->short_des1 !!}</td>
                </tr>
                <tr>
                    <th>Host:</th>
                    <td>TecWeb Lim.</td>
                </tr>
                <tr>
                    <th>Location:</th>
                    <td>{{ $upcome_project_details->location }}</td>
                </tr>
                <tr>
                    <th>Start Date:</th>
                    <td>{{ $upcome_project_details->project_start_date }}</td>
                </tr>
                <tr>
                    <th>End Date:</th>
                    <td>February 10, 2016</td>
                </tr>
                <tr>
                    <th>Website:</th>
                    <td>kodesolution.com</td>
                </tr>
            </table>

        </div>
      </div>
      <div class="row mt-30">
        <h2>@if(session()->get('language')=='bangla') {{ $upcome_project_details->bangla_title }} @else {{ $upcome_project_details->title }} @endif </h2>
        <div class="col-md-6 mt-10">
            <br>
          <div class="" >
            <div class="item">
              {!! $upcome_project_details->video_link1 !!}
            </div>
          </div>
        </div>
        <div class="col-md-6 mt-30">
            <br>
            <div class="" >
            <div class="item">
                {!! $upcome_project_details->video_link2 !!}
            </div>
            </div>

        </div>
      </div>
      <div class="row mt-20">
        <div class="col-md-12">
          <h4 class="mt-0">@if(session()->get('language')=='bangla') প্রজেক্ট বিস্তারিত @else Project Details @endif</h4>
          <p>@if(session()->get('language')=='bangla') {!! $upcome_project_details->long_des_bangla1 !!} @else {!! $upcome_project_details->long_des1 !!} @endif </p>
        </div>
        <div class="col-md-12">
            <p>@if(session()->get('language')=='bangla') {!! $upcome_project_details->long_des_bangla2 !!} @else {!! $upcome_project_details->long_des2 !!} @endif </p>
        </div>
        <div class="col-md-12">
            <p>@if(session()->get('language')=='bangla') {!! $upcome_project_details->long_des_bangla2 !!} @else {!! $upcome_project_details->long_des3 !!} @endif </p>
        </div>
      </div>

      </div>
    </div>
  </section>








@endsection
