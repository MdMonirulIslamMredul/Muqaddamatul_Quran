@extends('frontend.master')
@section('title')
    @if (session()->get('language') == 'bangla')
        {{ $category->category_name_ban ?? $category->category_name }}
    @elseif (session()->get('language') == 'arabic')
        {{ $category->category_name_ab ?? $category->category_name }}
    @else
        {{ $category->category_name }}
    @endif
@endsection

@push('frontend_style')
    <style>
        .book-catalog-header {
            background-size: cover;
            background-position: center;
            position: relative;
        }

        .category-sidebar-card {
            background: #ffffff;
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            border: 1px solid rgba(41, 181, 78, 0.12);
            padding: 24px;
            margin-bottom: 30px;
        }

        .category-sidebar-title {
            font-size: 18px;
            font-weight: 700;
            color: #1b4332;
            padding-bottom: 14px;
            margin-bottom: 16px;
            border-bottom: 2px solid #e8f5e9;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .category-nav-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .category-nav-item {
            margin-bottom: 8px;
        }

        .category-nav-link {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 10px 14px;
            border-radius: 10px;
            color: #2d3748;
            font-weight: 600;
            font-size: 14px;
            text-decoration: none;
            transition: all 0.25s ease;
            background: #f8faf9;
            border: 1px solid transparent;
        }

        .category-nav-link:hover,
        .category-nav-link.active {
            background: #e8f5e9;
            color: #1b4332;
            border-color: #29b54e;
            transform: translateX(4px);
            text-decoration: none;
        }

        .category-nav-link .badge-count {
            background: #29b54e;
            color: #ffffff;
            border-radius: 20px;
            padding: 3px 10px;
            font-size: 11px;
            font-weight: 700;
            transition: all 0.2s ease;
        }

        .category-nav-link.active .badge-count {
            background: #1b4332;
        }

        .sub-nav-list {
            list-style: none;
            padding-left: 20px;
            margin-top: 6px;
            margin-bottom: 8px;
        }

        .sub-nav-link {
            display: flex;
            align-items: center;
            justify-content: space-between;
            font-size: 12.5px;
            padding: 5px 10px;
            color: #64748b;
            font-weight: 500;
            border-radius: 6px;
            text-decoration: none;
            transition: all 0.2s;
        }

        .sub-nav-link:hover {
            color: #29b54e;
            background: #f1f5f9;
            text-decoration: none;
        }

        /* Subcategory chips */
        .subcat-chips-wrap {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            margin-bottom: 24px;
        }

        .subcat-chip {
            padding: 6px 14px;
            border-radius: 20px;
            font-size: 13px;
            font-weight: 600;
            text-decoration: none;
            background: #f1f5f9;
            color: #475569;
            border: 1px solid #e2e8f0;
            transition: all 0.2s;
        }

        .subcat-chip:hover,
        .subcat-chip.active {
            background: #29b54e;
            color: #fff;
            border-color: #29b54e;
            text-decoration: none;
        }

        /* Book Card Design */
        .modern-book-card {
            background: #ffffff;
            border-radius: 16px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.05);
            border: 1px solid rgba(0, 0, 0, 0.05);
            overflow: hidden;
            transition: all 0.35s cubic-bezier(0.165, 0.84, 0.44, 1);
            margin-bottom: 30px;
            display: flex;
            flex-direction: column;
            height: calc(100% - 30px);
            position: relative;
        }

        .modern-book-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 16px 36px rgba(41, 181, 78, 0.18);
            border-color: rgba(41, 181, 78, 0.3);
        }

        .book-cover-wrap {
            position: relative;
            background: #f7f9fa;
            overflow: hidden;
            height: 380px;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 16px;
        }

        .book-cover-img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            border-radius: 10px;
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.12);
            transition: transform 0.4s ease;
        }

        .modern-book-card:hover .book-cover-img {
            transform: scale(1.04);
        }

        .book-card-body {
            padding: 18px 20px 20px;
            display: flex;
            flex-direction: column;
            flex-grow: 1;
        }

        .book-category-pill {
            display: inline-block;
            background: #e8f5e9;
            color: #2e7d32;
            font-size: 11.5px;
            font-weight: 700;
            padding: 4px 10px;
            border-radius: 6px;
            margin-bottom: 8px;
            text-decoration: none;
            width: fit-content;
        }

        .book-subcategory-pill {
            display: inline-block;
            background: #e0f2fe;
            color: #0369a1;
            font-size: 11px;
            font-weight: 600;
            padding: 3px 8px;
            border-radius: 6px;
            margin-bottom: 8px;
            margin-left: 4px;
            text-decoration: none;
            width: fit-content;
        }

        .book-card-title {
            font-size: 16px;
            font-weight: 700;
            line-height: 1.45;
            margin-bottom: 12px;
            color: #1e293b;
            min-height: 46px;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .book-card-title a {
            color: #1e293b;
            text-decoration: none;
            transition: color 0.2s;
        }

        .book-card-title a:hover {
            color: #29b54e;
        }

        .book-card-actions {
            margin-top: auto;
            padding-top: 14px;
            border-top: 1px solid #f1f5f9;
            display: flex;
            gap: 8px;
        }

        .btn-book-details {
            flex: 1;
            background: #f8fafc;
            color: #1b4332;
            font-weight: 700;
            font-size: 12px;
            padding: 8px 10px;
            border-radius: 8px;
            border: 1px solid #e2e8f0;
            text-align: center;
            text-decoration: none;
            transition: all 0.2s;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
        }

        .btn-book-details:hover {
            background: #1b4332;
            color: #ffffff;
            border-color: #1b4332;
            text-decoration: none;
        }

        .btn-book-pdf {
            background: #29b54e;
            color: #ffffff;
            font-weight: 700;
            font-size: 12px;
            padding: 8px 14px;
            border-radius: 8px;
            text-align: center;
            text-decoration: none;
            transition: all 0.2s;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 5px;
        }

        .btn-book-pdf:hover {
            background: #1f9e3d;
            color: #ffffff;
            text-decoration: none;
        }

        /* Pagination custom */
        .pagination-container .pagination {
            display: inline-flex;
            gap: 4px;
        }

        .pagination-container .page-item.active .page-link {
            background-color: #29b54e !important;
            border-color: #29b54e !important;
            color: #fff !important;
            border-radius: 8px;
        }

        .pagination-container .page-link {
            color: #1b4332;
            border-radius: 8px;
            padding: 8px 14px;
            border: 1px solid #e2e8f0;
        }
    </style>
@endpush

@section('content')
    <!-- Inner Banner -->
    <section class="inner-header divider parallax layer-overlay overlay-dark-6 book-catalog-header"
        data-bg-img="{{ $banner && $banner->image ? asset($banner->image) : asset('frontend/images/bg/bg1.jpg') }}">
        <div class="container pt-70 pb-50">
            <div class="section-content pt-80">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h2 class="title text-white font-weight-700 mb-10">
                            @if (session()->get('language') == 'bangla')
                                {{ $category->category_name_ban ?? $category->category_name }}
                            @elseif (session()->get('language') == 'arabic')
                                {{ $category->category_name_ab ?? $category->category_name }}
                            @else
                                {{ $category->category_name }}
                            @endif
                        </h2>
                        <ul class="breadcrumb white justify-content-center">
                            <li><a href="{{ url('/') }}" class="text-white">
                                    @if (session()->get('language') == 'bangla') হোম @elseif (session()->get('language') == 'arabic') الرئيسية @else Home @endif
                                </a>
                            </li>
                            <li><a href="{{ route('book.page') }}" class="text-white">
                                    @if (session()->get('language') == 'bangla') বই @elseif (session()->get('language') == 'arabic') الكتب @else Books @endif
                                </a>
                            </li>
                            <li class="active text-success">
                                @if (session()->get('language') == 'bangla')
                                    {{ $category->category_name_ban ?? $category->category_name }}
                                @elseif (session()->get('language') == 'arabic')
                                    {{ $category->category_name_ab ?? $category->category_name }}
                                @else
                                    {{ $category->category_name }}
                                @endif
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Content Section -->
    <div class="rs-popular-courses style4 pt-60 pb-80">
        <div class="container">
            <div class="row">
                <!-- Books List Column -->
                <div class="col-lg-9 col-md-8">
                    <!-- Category Header Info Bar -->
                    <div class="d-flex flex-wrap justify-content-between align-items-center mb-20 pb-15 border-bottom">
                        <div>
                            <h4 class="mb-5 font-weight-700 text-dark">
                                @if (session()->get('language') == 'bangla')
                                    {{ $category->category_name_ban ?? $category->category_name }}
                                @elseif (session()->get('language') == 'arabic')
                                    {{ $category->category_name_ab ?? $category->category_name }}
                                @else
                                    {{ $category->category_name }}
                                @endif
                            </h4>
                            <span class="text-muted font-13">
                                @if (session()->get('language') == 'bangla')
                                    মোট {{ $books->total() }} টি বই পাওয়া গেছে
                                @elseif (session()->get('language') == 'arabic')
                                    تم العثور على {{ $books->total() }} كتاب
                                @else
                                    Showing {{ $books->total() }} books
                                @endif
                            </span>
                        </div>

                        <a href="{{ route('book.page') }}" class="btn btn-sm btn-outline-secondary font-12 font-weight-600">
                            <i class="fa fa-arrow-left me-1"></i>
                            @if (session()->get('language') == 'bangla') সকল বই দেখুন @elseif (session()->get('language') == 'arabic') عرض جميع الكتب @else View All Books @endif
                        </a>
                    </div>

                    {{-- Optional Subcategories Filter Chips if available --}}
                    @if ($category->bookSubcategories && $category->bookSubcategories->count() > 0)
                        <div class="subcat-chips-wrap">
                            <a href="{{ route('category.book', $category->id) }}" class="subcat-chip active">
                                <i class="fa fa-check me-1"></i>
                                @if (session()->get('language') == 'bangla') সবগুলো @elseif (session()->get('language') == 'arabic') الكل @else All @endif
                            </a>
                            @foreach ($category->bookSubcategories as $subcategory)
                                <a href="{{ route('subcategory.book', $subcategory->id) }}" class="subcat-chip">
                                    @if (session()->get('language') == 'bangla')
                                        {{ $subcategory->subcategory_name_ban ?? $subcategory->subcategory_name }}
                                    @elseif (session()->get('language') == 'arabic')
                                        {{ $subcategory->subcategory_name_ab ?? $subcategory->subcategory_name }}
                                    @else
                                        {{ $subcategory->subcategory_name }}
                                    @endif
                                </a>
                            @endforeach
                        </div>
                    @endif

                    <!-- Books Grid -->
                    <div class="row">
                        @forelse ($books as $book)
                            <div class="col-lg-4 col-md-6 col-sm-6 d-flex align-items-stretch">
                                <div class="modern-book-card w-100">
                                    <div class="book-cover-wrap">
                                        <a href="{{ route('book.details', ['id' => $book->id]) }}" class="w-100 h-100 d-flex align-items-center justify-content-center">
                                            @if ($book->book_image && file_exists(public_path('book_image/' . $book->book_image)))
                                                <img src="{{ asset('book_image/' . $book->book_image) }}" class="book-cover-img" alt="{{ $book->title_bn }}">
                                            @else
                                                <div class="d-flex flex-column align-items-center justify-content-center text-muted" style="height: 320px;">
                                                    <i class="fa fa-book fa-4x text-success mb-2"></i>
                                                    <span class="font-12">No Cover</span>
                                                </div>
                                            @endif
                                        </a>
                                    </div>

                                    <div class="book-card-body">
                                        <!-- Category & Optional Subcategory Tags -->
                                        <div class="mb-2">
                                            <span class="book-category-pill">
                                                <i class="fa fa-folder-open-o me-1"></i>
                                                @if (session()->get('language') == 'bangla')
                                                    {{ $category->category_name_ban ?? $category->category_name }}
                                                @elseif (session()->get('language') == 'arabic')
                                                    {{ $category->category_name_ab ?? $category->category_name }}
                                                @else
                                                    {{ $category->category_name }}
                                                @endif
                                            </span>

                                            {{-- Subcategory is optional: ONLY render if inserted --}}
                                            @if ($book->bookSubcategory)
                                                <span class="book-subcategory-pill">
                                                    @if (session()->get('language') == 'bangla')
                                                        {{ $book->bookSubcategory->subcategory_name_ban ?? $book->bookSubcategory->subcategory_name }}
                                                    @elseif (session()->get('language') == 'arabic')
                                                        {{ $book->bookSubcategory->subcategory_name_ab ?? $book->bookSubcategory->subcategory_name }}
                                                    @else
                                                        {{ $book->bookSubcategory->subcategory_name }}
                                                    @endif
                                                </span>
                                            @endif
                                        </div>

                                        <!-- Book Title -->
                                        <h4 class="book-card-title">
                                            <a href="{{ route('book.details', ['id' => $book->id]) }}">
                                                @if (session()->get('language') == 'bangla')
                                                    {{ $book->title_bn ?: $book->title_en }}
                                                @elseif (session()->get('language') == 'arabic')
                                                    {{ $book->title_ab ?: $book->title_bn }}
                                                @else
                                                    {{ $book->title_en ?: $book->title_bn }}
                                                @endif
                                            </a>
                                        </h4>

                                        <!-- Action Buttons -->
                                        <div class="book-card-actions">
                                            <a href="{{ route('book.details', ['id' => $book->id]) }}" class="btn-book-details">
                                                <i class="fa fa-info-circle"></i>
                                                @if (session()->get('language') == 'bangla')
                                                    বিস্তারিত
                                                @elseif (session()->get('language') == 'arabic')
                                                    تفاصيل
                                                @else
                                                    Details
                                                @endif
                                            </a>

                                            @if ($book->pdf_file && file_exists(public_path('pdf_file/' . $book->pdf_file)))
                                                <a href="{{ asset('pdf_file/' . $book->pdf_file) }}" target="_blank" class="btn-book-pdf" title="Read / Download PDF">
                                                    <i class="fa fa-file-pdf-o"></i>
                                                    @if (session()->get('language') == 'bangla')
                                                        পিডিএফ
                                                    @elseif (session()->get('language') == 'arabic')
                                                        PDF
                                                    @else
                                                        PDF
                                                    @endif
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-12 py-60 text-center">
                                <div class="p-40 bg-light rounded">
                                    <i class="fa fa-book fa-4x text-muted mb-15"></i>
                                    <h4 class="text-secondary font-weight-600">
                                        @if (session()->get('language') == 'bangla')
                                            এই বিভাগে কোন বই পাওয়া যায়নি
                                        @elseif (session()->get('language') == 'arabic')
                                            لم يتم العثور على كتب في هذا القسم
                                        @else
                                            No Books Found In This Category
                                        @endif
                                    </h4>
                                    <a href="{{ route('book.page') }}" class="btn btn-theme-colored btn-sm mt-10">
                                        @if (session()->get('language') == 'bangla')
                                            সকল বই দেখুন
                                        @elseif (session()->get('language') == 'arabic')
                                            عرض جميع الكتب
                                        @else
                                            View All Books
                                        @endif
                                    </a>
                                </div>
                            </div>
                        @endforelse
                    </div>

                    <!-- Pagination -->
                    @if ($books->hasPages())
                        <div class="row mt-30">
                            <div class="col-12 text-center pagination-container">
                                {{ $books->links() }}
                            </div>
                        </div>
                    @endif
                </div>

                <!-- Category Sidebar -->
                <div class="col-lg-3 col-md-4">
                    <div class="category-sidebar-card">
                        <div class="category-sidebar-title">
                            <span>
                                <i class="fa fa-th-large text-success me-2"></i>
                                @if (session()->get('language') == 'bangla')
                                    বইয়ের বিভাগসমূহ
                                @elseif (session()->get('language') == 'arabic')
                                    أقسام الكتب
                                @else
                                    Book Categories
                                @endif
                            </span>
                        </div>

                        <ul class="category-nav-list">
                            <li class="category-nav-item">
                                <a href="{{ route('book.page') }}" class="category-nav-link">
                                    <span>
                                        <i class="fa fa-list-ul me-2"></i>
                                        @if (session()->get('language') == 'bangla')
                                            সকল বিভাগ
                                        @elseif (session()->get('language') == 'arabic')
                                            كل الأقسام
                                        @else
                                            All Categories
                                        @endif
                                    </span>
                                    <span class="badge-count">{{ $totalBooksCount }}</span>
                                </a>
                            </li>

                            @foreach ($categories as $cat)
                                <li class="category-nav-item">
                                    <a href="{{ route('category.book', $cat->id) }}"
                                        class="category-nav-link {{ $category->id == $cat->id ? 'active' : '' }}">
                                        <span>
                                            <i class="fa fa-bookmark-o me-2 text-success"></i>
                                            @if (session()->get('language') == 'bangla')
                                                {{ $cat->category_name_ban ?? $cat->category_name }}
                                            @elseif (session()->get('language') == 'arabic')
                                                {{ $cat->category_name_ab ?? $cat->category_name }}
                                            @else
                                                {{ $cat->category_name }}
                                            @endif
                                        </span>
                                        <span class="badge-count">{{ $cat->books_count }}</span>
                                    </a>

                                    @if ($cat->bookSubcategories && $cat->bookSubcategories->count() > 0)
                                        <ul class="sub-nav-list">
                                            @foreach ($cat->bookSubcategories as $sub)
                                                <li>
                                                    <a href="{{ route('subcategory.book', $sub->id) }}" class="sub-nav-link">
                                                        <span>
                                                            <i class="fa fa-angle-right me-1 text-muted"></i>
                                                            @if (session()->get('language') == 'bangla')
                                                                {{ $sub->subcategory_name_ban ?? $sub->subcategory_name }}
                                                            @elseif (session()->get('language') == 'arabic')
                                                                {{ $sub->subcategory_name_ab ?? $sub->subcategory_name }}
                                                            @else
                                                                {{ $sub->subcategory_name }}
                                                            @endif
                                                        </span>
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
