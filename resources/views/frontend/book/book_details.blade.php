@extends('frontend.master')
@section('title')
    @if (session()->get('language') == 'bangla')
        {{ $book->title_bn }}
    @elseif (session()->get('language') == 'arabic')
        {{ $book->title_ab }}
    @else
        {{ $book->title_en }}
    @endif
@endsection
@push('frontend_style')
    <style>
        .custom_card {
            box-shadow: 0 4px 16px 0 rgba(0, 241, 67, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19) !important;
        }

        .pagination>.active>a,
        .pagination>.active>a:focus,
        .pagination>.active>a:hover,
        .pagination>.active>span,
        .pagination>.active>span:focus,
        .pagination>.active>span:hover {
            z-index: 3;
            color: #fff;
            cursor: default;
            background-color: #29b54e;
            border-color: #29b54e;
        }

        .custom_card img {
            /* width: 250px; */
            height: 400px;
            /* border-radius: 20px; */
        }
    </style>
@endpush
@section('content')
    <!-- Main content Start -->
    <section class="inner-header divider parallax layer-overlay overlay-dark-5" data-bg-img="{{ asset($banner->image) }}">
        <div class="container pt-60 pb-40">
            <!-- Section Content -->
            <div class="section-content pt-100">
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="title text-white">
                            @if (session()->get('language') == 'bangla')
                                {{ $book->title_bn }}
                            @elseif (session()->get('language') == 'arabic')
                                {{ $book->title_ab }}
                            @else
                                {{ $book->title_en }}
                            @endif
                        </h3>
                        <ul class="breadcrumb white">
                            <li><a href="index-mp-layout1.html">
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
                                    {{ $book->title_bn }}
                                @elseif (session()->get('language') == 'arabic')
                                    {{ $book->title_ab }}
                                @else
                                    {{ $book->title_en }}
                                @endif
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumbs End -->

    <!-- Audio Section Start -->
    <div id="rs-popular-courses" class="rs-popular-courses style4 orange-color pt-110 pb-120 md-pt-70 md-pb-80">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="row">
                        <div class="custom_card" style="padding: 20px; border-radius: 20px; margin-bottom: 30px;">
                            <img src="{{ asset('book_image') }}/{{ $book->book_image }}" class="img-fluid">
                            <h4>
                                @if (session()->get('language') == 'bangla')
                                    {{ $book->title_bn }}
                                @elseif (session()->get('language') == 'arabic')
                                    {{ $book->title_ab }}
                                @else
                                    {{ $book->title_en }}
                                @endif
                            </h4>
                            <p>
                                @if (session()->get('language') == 'bangla')
                                    {!! $book->des_bn !!}
                                @elseif (session()->get('language') == 'arabic')
                                    {!! $book->des_ab !!}
                                @else
                                    {!! $book->des_en !!}
                                @endif
                            </p>
                            <a class="btn btn-xs btn-theme-colored font-weight-600 font-11 flip mt-10"
                                href="{{ asset('pdf_file') }}/{{ $book->pdf_file }}" download><i class="fa fa-file-pdf-o" aria-hidden="true" style="font-size: 15px"></i> 
                                @if (session()->get('language') == 'bangla')
                                    ডাউনলোড
                                @elseif (session()->get('language') == 'arabic')
                                    تحميل
                                @else
                                    Download
                                @endif
                            </a>
                        </div>

                    </div>
                </div>
                <div class="col-md-3">
                    <div class="custom_card" style="padding: 20px; border-radius: 20px; margin-bottom: 30px;">
                        <h2 style="margin-bottom: 15px">
                            @if (session()->get('language') == 'bangla')
                                বিভাগ দ্বারা খুঁজুন
                            @elseif (session()->get('language') == 'arabic')
                                ابحث عن الفئة ب
                            @else
                                Find By Category
                            @endif
                        </h2>
                        @foreach ($categories as $category)
                            <div class="dropdown" style="margin: 2px 0">
                                <button class="btn btn-success dropdown-toggle" style="width: 100%; text-align: left"
                                    type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    @if (session()->get('language') == 'bangla')
                                        {{ $category->category_name_ban }}
                                    @elseif (session()->get('language') == 'arabic')
                                        {{ $category->category_name_ab }}
                                    @else
                                        {{ $category->category_name }}
                                    @endif
                                    <span class="caret pull-right" style="margin-top:7px"></span>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                    @foreach ($category->bookSubcategories as $subcategory)
                                        <li><a href="{{ route('subcategory.book', ['id' => $subcategory->id]) }}">
                                                @if (session()->get('language') == 'bangla')
                                                    {{ $subcategory->subcategory_name_ban }}
                                                @elseif (session()->get('language') == 'arabic')
                                                    {{ $subcategory->subcategory_name_ab }}
                                                @else
                                                    {{ $subcategory->subcategory_name }}
                                                @endif
                                            </a>
                                        </li>
                                    @endforeach

                                </ul>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- Audio Section End -->


    {{-- </div> --}}
    <!-- Main content End -->
@endsection
@push('frontend_script')
@endpush
