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
                        {{-- <h3 class="title text-white">
                            @if (session()->get('language') == 'bangla')
                                আমাদের কার্যক্রম
                            @elseif (session()->get('language') == 'arabic')
                                أنشطتنا
                            @else
                                Our Activities
                            @endif
                        </h3> --}}
                        <ul class="breadcrumb white">
                            {{-- <li><a href="index-mp-layout1.html">
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
                                    আমাদের কার্যক্রম
                                @elseif (session()->get('language') == 'arabic')
                                    أنشطتنا
                                @else
                                    Our Activities
                                @endif
                            </li> --}}
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
                            {{-- @dd($single_activity) --}}
                            @foreach ($all_activities as $key => $item)
                                <li class="@if ($item->id == $key + 1) active @endif"><a href="#{{ $key }}"
                                        data-toggle="tab" style="color:green">
                                        @if (session()->get('language') == 'bangla')
                                        <h3 style="color: green">{{ $item->bangla_title }}</h3>
                                        @elseif (session()->get('language') == 'arabic')
                                        <h3 style="color: green">{{ $item->arabic_title }}</h3>
                                        @else
                                        <h3 style="color: green">{{ $item->title }}</h3>
                                        @endif
                                    </a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="col-md-9">
                    <div class="tab-content">
                        @foreach ($all_activities as $key => $item)
                            <div class="tab-pane fade in  @if ($item->id == $key + 1) active @endif "
                                id="{{ $key }}">
                                <div class="row">

                                    <div class="col-md-12">
                                        <h3 style="color:green">
                                            @if (session()->get('language') == 'bangla')
                                                {{ $item->bangla_title }}
                                            @elseif (session()->get('language') == 'arabic')
                                                {{ $item->arabic_title }}
                                            @else
                                                {{ $item->title }}
                                            @endif
                                        </h3>
                                        <p>
                                            @if (session()->get('language') == 'bangla')
                                                {!! $item->short_des_bangla !!}
                                            @elseif (session()->get('language') == 'arabic')
                                                {!! $item->short_des_arabic !!}
                                            @else
                                                {!! $item->short_des_eng !!}
                                            @endif
                                        </p>

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
