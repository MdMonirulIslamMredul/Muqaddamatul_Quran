@extends('frontend.master')
@section('title')
    @if (session()->get('language') == 'bangla')
        বই
    @elseif (session()->get('language') == 'arabic')
        كتاب
    @else
        Book
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
            width: 100%;
            height: 450px;
            /* Set a fixed height */
            object-fit: cover;
            /* Ensure the image covers the area without distortion */
            border-radius: 20px;
        }
    </style>
@endpush
@section('content')
    <!-- Main content Start -->
    <section class="inner-header divider parallax layer-overlay overlay-dark-5"
    data-bg-img="{{ $banner && $banner->image ? asset($banner->image) : asset('frontend/images/bg/bg1.jpg') }}">
        <div class="container pt-60 pb-40">
            <!-- Section Content -->
            <div class="section-content pt-100">
                <div class="row">
                    <div class="col-md-12">
                        {{-- <h3 class="title text-white">
                            @if (session()->get('language') == 'bangla')
                                বই
                            @elseif (session()->get('language') == 'arabic')
                                كتاب
                            @else
                                Book
                            @endif
                        </h3> --}}
                        <ul class="breadcrumb white">
                            {{-- <li><a href="{{ url('/') }}">
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
                                    বই
                                @elseif (session()->get('language') == 'arabic')
                                    كتاب
                                @else
                                    Book
                                @endif
                            </li> --}}
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
                <div class="col-lg-9 col-md-8 col-sm-6">
                    <div class="row">
                        @forelse ($books as $book)
                            <div class="col-lg-4 col-md-6">
                                <a href="{{ route('book.details', ['id' => $book->id]) }}">
                                    <div class="custom_card"
                                        style="padding: 20px; border-radius: 20px; margin-bottom: 30px;">
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
                                        <div class="text-center">
                                            <a class="btn btn-xs btn-theme-colored font-weight-600 font-11 flip mt-10"
                                                href="{{ route('book.details', ['id' => $book->id]) }}">
                                                @if (session()->get('language') == 'bangla')
                                                    বিস্তারিত দেখুন
                                                @elseif (session()->get('language') == 'arabic')
                                                    عرض التفاصيل
                                                @else
                                                    View Details
                                                @endif
                                            </a>
                                            <a class="btn btn-xs btn-theme-colored font-weight-600 font-11 flip mt-10"
                                                href="{{ asset('pdf_file') }}/{{ $book->pdf_file }}"><i
                                                    class="fa fa-file-pdf-o" aria-hidden="true" style="font-size: 15px"></i>
                                                @if (session()->get('language') == 'bangla')
                                                    ডাউনলোড করুন
                                                @elseif (session()->get('language') == 'arabic')
                                                    تحميل
                                                @else
                                                    Download
                                                @endif
                                            </a>
                                        </div>

                                    </div>
                                </a>
                            </div>
                        @empty
                            <h2>
                                @if (session()->get('language') == 'bangla')
                                    কোন বই পাওয়া যায়নি
                                @elseif (session()->get('language') == 'arabic')
                                    لم يتم العثور على الكتاب
                                @else
                                    No Book Found
                                @endif
                            </h2>
                        @endforelse

                    </div>

                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
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
