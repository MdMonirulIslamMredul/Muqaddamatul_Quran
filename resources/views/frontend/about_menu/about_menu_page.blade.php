@extends('frontend.master')

@section('content')



 <!-- Section: inner-header -->
 <section class="inner-header divider parallax layer-overlay overlay-dark-5"
    data-bg-img="{{ $banner && $banner->image ? asset($banner->image) : asset('frontend/images/bg/bg1.jpg') }}">

    <div class="container pt-60 pb-40">
      <!-- Section Content -->
      <div class="section-content pt-100">
        <div class="row">
          <div class="col-md-12">
            {{-- <h3 class="title text-white">@if(session()->get('language')=='bangla') আমাদের সম্পর্কে @elseif (session()->get('language')=='arabic') معلومات عنا @else About Us @endif </h3> --}}
            <ul class="breadcrumb white">
              {{-- <li><a href="{{ url('/') }}">@if(session()->get('language')=='bangla') হোম @elseif (session()->get('language')=='arabic') بيت @else Home @endif</a></li>
              <li class="active">@if(session()->get('language')=='bangla') আমাদের সম্পর্কে @elseif (session()->get('language')=='arabic') معلومات عنا @else About Us @endif </li> --}}
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>



  <section>
    <div class="container pt-20 pb-20">
      <div class="esc-heading lr-line left-heading">

      </div>
      <div class="row">

        <div class="col-md-3">
          <div class="vertical-tab">
            <ul class="nav nav-tabs">
                {{-- @dd($single_activity)                                 --}}
                @foreach ($about_data as $key => $item)
                    <li class="@if($item->id == $key+1) active @endif"><a href="#{{ $key }}" data-toggle="tab" style="color:green">@if(session()->get('language')=='bangla') <h3 style="color: green">{{ $item->title_bangla }}</h3> @elseif (session()->get('language')=='arabic') <h3 style="color: green">{{ $item->title_ab }}</h3> @else <h3 style="color: green">{{ $item->title }}</h3> @endif </a></li>
                @endforeach
            </ul>
          </div>
        </div>

        <div class="col-md-9">
          <div class="tab-content">
            @foreach ($about_data as $key => $item)
            <div class="tab-pane fade in @if($item->id == $key+1) active @endif " id="{{ $key }}">
              <div class="row">

                <div class="col-md-12">
                    <h3 style="color:green">@if(session()->get('language')=='bangla') {{ $item->title_bangla }} @elseif (session()->get('language')=='arabic') {{ $item->title_ab }} @else {{ $item->title }} @endif </h3>
                  <p>@if(session()->get('language')=='bangla') {!! $item->des_bangla !!} @elseif (session()->get('language')=='arabic') {!! $item->des_ab !!} @else {!! $item->des_eng !!} @endif </p>

                </div>
              </div>
            </div>

            @endforeach

          </div>
        </div>

      </div>

    </div>
  </section>




@endsection
