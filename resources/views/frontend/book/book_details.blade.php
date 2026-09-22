@extends('frontend.master')
@section('title')
    @if (session()->get('language') == 'bangla')
        {{ $book->title_bn ?: $book->title_en }}
    @elseif (session()->get('language') == 'arabic')
        {{ $book->title_ab ?: $book->title_bn }}
    @else
        {{ $book->title_en ?: $book->title_bn }}
    @endif
@endsection

@push('frontend_style')
    <style>
        .book-detail-banner {
            background-size: cover;
            background-position: center;
            position: relative;
        }

        .book-detail-card {
            background: #ffffff;
            border-radius: 20px;
            box-shadow: 0 12px 32px rgba(0, 0, 0, 0.06);
            border: 1px solid rgba(41, 181, 78, 0.12);
            padding: 35px;
            margin-bottom: 30px;
        }

        .book-view-cover {
            width: 100%;
            max-width: 320px;
            height: 440px;
            object-fit: contain;
            border-radius: 12px;
            background: #f8fafc;
            padding: 12px;
            box-shadow: 0 10px 28px rgba(0, 0, 0, 0.15);
            border: 1px solid #e2e8f0;
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

        .sub-nav-link:hover,
        .sub-nav-link.active {
            color: #29b54e;
            background: #e8f5e9;
            font-weight: 700;
            text-decoration: none;
        }

        .book-badge-category {
            background: #e8f5e9;
            color: #1b4332;
            font-size: 13px;
            font-weight: 700;
            padding: 6px 14px;
            border-radius: 8px;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            text-decoration: none;
            border: 1px solid #c8e6c9;
        }

        .book-badge-category:hover {
            background: #1b4332;
            color: #fff;
            text-decoration: none;
        }

        .book-badge-subcategory {
            background: #e0f2fe;
            color: #0369a1;
            font-size: 12.5px;
            font-weight: 600;
            padding: 5px 12px;
            border-radius: 8px;
            display: inline-flex;
            align-items: center;
            gap: 5px;
            margin-left: 6px;
            text-decoration: none;
            border: 1px solid #bae6fd;
        }

        .book-badge-subcategory:hover {
            background: #0284c7;
            color: #fff;
            text-decoration: none;
        }

        .action-read-btn {
            background: #29b54e;
            color: #ffffff;
            font-weight: 700;
            font-size: 14px;
            padding: 12px 24px;
            border-radius: 10px;
            text-decoration: none;
            transition: all 0.25s;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            box-shadow: 0 4px 14px rgba(41, 181, 78, 0.3);
        }

        .action-read-btn:hover {
            background: #1f9e3d;
            color: #ffffff;
            transform: translateY(-2px);
            box-shadow: 0 6px 18px rgba(41, 181, 78, 0.4);
            text-decoration: none;
        }

        .action-download-btn {
            background: #f8fafc;
            color: #1e293b;
            font-weight: 700;
            font-size: 14px;
            padding: 12px 24px;
            border-radius: 10px;
            border: 1px solid #cbd5e1;
            text-decoration: none;
            transition: all 0.25s;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .action-download-btn:hover {
            background: #1e293b;
            color: #ffffff;
            border-color: #1e293b;
            text-decoration: none;
        }

        .book-description-content {
            font-size: 15.5px;
            line-height: 1.85;
            color: #334155;
        }

        .book-meta-table td {
            padding: 8px 12px;
            font-size: 14px;
            border: none;
        }

        .book-meta-table tr:nth-child(even) {
            background: #f8faf9;
        }

        /* Related books cards */
        .related-card {
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            padding: 12px;
            transition: all 0.2s;
            background: #fff;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 12px;
        }

        .related-card:hover {
            border-color: #29b54e;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0,0,0,0.06);
            text-decoration: none;
        }

        .related-thumb {
            width: 50px;
            height: 70px;
            object-fit: cover;
            border-radius: 6px;
            flex-shrink: 0;
        }
    </style>
@endpush

@section('content')
    <!-- Inner Header -->
    <section class="inner-header divider parallax layer-overlay overlay-dark-6 book-detail-banner"
        data-bg-img="{{ $banner && $banner->image ? asset($banner->image) : asset('frontend/images/bg/bg1.jpg') }}">
        <div class="container pt-70 pb-50">
            <div class="section-content pt-80">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h2 class="title text-white font-weight-700 mb-10">
                            @if (session()->get('language') == 'bangla')
                                {{ $book->title_bn ?: $book->title_en }}
                            @elseif (session()->get('language') == 'arabic')
                                {{ $book->title_ab ?: $book->title_bn }}
                            @else
                                {{ $book->title_en ?: $book->title_bn }}
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
                            @if ($book->bookCategory)
                                <li>
                                    <a href="{{ route('category.book', $book->category_id) }}" class="text-white">
                                        @if (session()->get('language') == 'bangla')
                                            {{ $book->bookCategory->category_name_ban ?? $book->bookCategory->category_name }}
                                        @elseif (session()->get('language') == 'arabic')
                                            {{ $book->bookCategory->category_name_ab ?? $book->bookCategory->category_name }}
                                        @else
                                            {{ $book->bookCategory->category_name }}
                                        @endif
                                    </a>
                                </li>
                            @endif
                            {{-- Only show subcategory if present --}}
                            @if ($book->bookSubcategory)
                                <li>
                                    <a href="{{ route('subcategory.book', $book->subcategory_id) }}" class="text-white">
                                        @if (session()->get('language') == 'bangla')
                                            {{ $book->bookSubcategory->subcategory_name_ban ?? $book->bookSubcategory->subcategory_name }}
                                        @elseif (session()->get('language') == 'arabic')
                                            {{ $book->bookSubcategory->subcategory_name_ab ?? $book->bookSubcategory->subcategory_name }}
                                        @else
                                            {{ $book->bookSubcategory->subcategory_name }}
                                        @endif
                                    </a>
                                </li>
                            @endif
                            <li class="active text-success">
                                @if (session()->get('language') == 'bangla')
                                    {{ Str::limit($book->title_bn ?: $book->title_en, 25) }}
                                @elseif (session()->get('language') == 'arabic')
                                    {{ Str::limit($book->title_ab ?: $book->title_bn, 25) }}
                                @else
                                    {{ Str::limit($book->title_en ?: $book->title_bn, 25) }}
                                @endif
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Details Section -->
    <div class="rs-popular-courses style4 pt-60 pb-80">
        <div class="container">
            <div class="row">
                <!-- Book Main View (9 cols) -->
                <div class="col-lg-9 col-md-8">
                    <div class="book-detail-card">
                        <div class="row">
                            <!-- Left: Cover & Action Buttons -->
                            <div class="col-md-5 text-center mb-30 mb-md-0">
                                <div class="mb-20">
                                    @if ($book->book_image && file_exists(public_path('book_image/' . $book->book_image)))
                                        <img src="{{ asset('book_image/' . $book->book_image) }}" class="book-view-cover" alt="{{ $book->title_bn }}">
                                    @else
                                        <div class="book-view-cover d-flex flex-column align-items-center justify-content-center text-muted">
                                            <i class="fa fa-book fa-5x text-success mb-2"></i>
                                            <span>No Cover</span>
                                        </div>
                                    @endif
                                </div>

                                @if ($book->pdf_file && file_exists(public_path('pdf_file/' . $book->pdf_file)))
                                    <div class="d-grid gap-2">
                                        <a href="{{ asset('pdf_file/' . $book->pdf_file) }}" target="_blank" class="action-read-btn mb-10 w-100">
                                            <i class="fa fa-eye"></i>
                                            @if (session()->get('language') == 'bangla')
                                                অনলাইনে পড়ুন
                                            @elseif (session()->get('language') == 'arabic')
                                                قراءة الكتاب مباشرة
                                            @else
                                                Read Online
                                            @endif
                                        </a>

                                        <a href="{{ asset('pdf_file/' . $book->pdf_file) }}" download class="action-download-btn w-100">
                                            <i class="fa fa-download"></i>
                                            @if (session()->get('language') == 'bangla')
                                                পিডিএফ ডাউনলোড করুন
                                            @elseif (session()->get('language') == 'arabic')
                                                تحميل نسخة PDF
                                            @else
                                                Download PDF
                                            @endif
                                        </a>
                                    </div>
                                @endif
                            </div>

                            <!-- Right: Metadata & Content -->
                            <div class="col-md-7">
                                <!-- Category & Optional Subcategory -->
                                <div class="mb-15">
                                    @if ($book->bookCategory)
                                        <a href="{{ route('category.book', $book->category_id) }}" class="book-badge-category">
                                            <i class="fa fa-folder-open-o"></i>
                                            @if (session()->get('language') == 'bangla')
                                                {{ $book->bookCategory->category_name_ban ?? $book->bookCategory->category_name }}
                                            @elseif (session()->get('language') == 'arabic')
                                                {{ $book->bookCategory->category_name_ab ?? $book->bookCategory->category_name }}
                                            @else
                                                {{ $book->bookCategory->category_name }}
                                            @endif
                                        </a>
                                    @endif

                                    {{-- Subcategory is optional: ONLY displayed if present --}}
                                    @if ($book->bookSubcategory)
                                        <a href="{{ route('subcategory.book', $book->subcategory_id) }}" class="book-badge-subcategory">
                                            <i class="fa fa-tag"></i>
                                            @if (session()->get('language') == 'bangla')
                                                {{ $book->bookSubcategory->subcategory_name_ban ?? $book->bookSubcategory->subcategory_name }}
                                            @elseif (session()->get('language') == 'arabic')
                                                {{ $book->bookSubcategory->subcategory_name_ab ?? $book->bookSubcategory->subcategory_name }}
                                            @else
                                                {{ $book->bookSubcategory->subcategory_name }}
                                            @endif
                                        </a>
                                    @endif
                                </div>

                                <!-- Titles -->
                                <h3 class="font-weight-700 text-dark mb-10" style="line-height: 1.4;">
                                    @if (session()->get('language') == 'bangla')
                                        {{ $book->title_bn ?: $book->title_en }}
                                    @elseif (session()->get('language') == 'arabic')
                                        {{ $book->title_ab ?: $book->title_bn }}
                                    @else
                                        {{ $book->title_en ?: $book->title_bn }}
                                    @endif
                                </h3>

                                @if ($book->title_en && session()->get('language') != 'english')
                                    <p class="text-muted font-14 mb-15">
                                        <strong>English:</strong> {{ $book->title_en }}
                                    </p>
                                @endif

                                @if ($book->title_ab && session()->get('language') != 'arabic')
                                    <p class="text-muted font-15 mb-20" dir="rtl" style="font-family: 'Amiri', serif;">
                                        <strong>العربية:</strong> {{ $book->title_ab }}
                                    </p>
                                @endif

                                <!-- Quick Specs Table -->
                                <table class="table book-meta-table mb-25 rounded" style="background: #f8fafc; border: 1px solid #edf2f7;">
                                    <tbody>
                                        <tr>
                                            <td class="text-muted font-weight-600" style="width: 35%;">
                                                @if (session()->get('language') == 'bangla') মূল বিভাগ @elseif (session()->get('language') == 'arabic') القسم الأساسي @else Category @endif:
                                            </td>
                                            <td class="font-weight-600 text-dark">
                                                {{ $book->bookCategory->category_name_ban ?? $book->bookCategory->category_name ?? '-' }}
                                            </td>
                                        </tr>
                                        {{-- Subcategory is optional: ONLY shown if present --}}
                                        @if ($book->bookSubcategory)
                                            <tr>
                                                <td class="text-muted font-weight-600">
                                                    @if (session()->get('language') == 'bangla') উপ-বিভাগ @elseif (session()->get('language') == 'arabic') القسم الفرعي @else Subcategory @endif:
                                                </td>
                                                <td class="font-weight-600 text-dark">
                                                    {{ $book->bookSubcategory->subcategory_name_ban ?? $book->bookSubcategory->subcategory_name }}
                                                </td>
                                            </tr>
                                        @endif
                                        <tr>
                                            <td class="text-muted font-weight-600">
                                                @if (session()->get('language') == 'bangla') ফরম্যাট @elseif (session()->get('language') == 'arabic') نوع الملف @else File Format @endif:
                                            </td>
                                            <td class="text-dark">
                                                <span class="badge bg-danger text-white">PDF</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-muted font-weight-600">
                                                @if (session()->get('language') == 'bangla') সর্বশেষ আপডেট @elseif (session()->get('language') == 'arabic') آخر تحديث @else Last Updated @endif:
                                            </td>
                                            <td class="text-muted">
                                                {{ $book->updated_at ? $book->updated_at->format('d M, Y') : '-' }}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>

                                <!-- Description Section -->
                                <div class="mt-20">
                                    <h5 class="font-weight-700 text-dark pb-10 mb-15 border-bottom">
                                        <i class="fa fa-align-left text-success me-2"></i>
                                        @if (session()->get('language') == 'bangla')
                                            বইয়ের সারসংক্ষেপ ও বিবরণ
                                        @elseif (session()->get('language') == 'arabic')
                                            نبذة عن الكتاب وتفاصيله
                                        @else
                                            Book Overview & Details
                                        @endif
                                    </h5>

                                    <div class="book-description-content">
                                        @if (session()->get('language') == 'bangla')
                                            {!! $book->des_bn ?: $book->des_en !!}
                                        @elseif (session()->get('language') == 'arabic')
                                            {!! $book->des_ab ?: ($book->des_bn ?: $book->des_en) !!}
                                        @else
                                            {!! $book->des_en ?: $book->des_bn !!}
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Related Books in the same category -->
                    @if (isset($relatedBooks) && $relatedBooks->count() > 0)
                        <div class="book-detail-card mt-30">
                            <h4 class="font-weight-700 text-dark mb-20 pb-10 border-bottom">
                                <i class="fa fa-bookmark text-success me-2"></i>
                                @if (session()->get('language') == 'bangla')
                                    একই বিভাগের আরও বই
                                @elseif (session()->get('language') == 'arabic')
                                    كتب أخرى في نفس القسم
                                @else
                                    More Books in this Category
                                @endif
                            </h4>

                            <div class="row">
                                @foreach ($relatedBooks as $related)
                                    <div class="col-md-4 col-sm-6 mb-20">
                                        <a href="{{ route('book.details', $related->id) }}" class="related-card">
                                            @if ($related->book_image && file_exists(public_path('book_image/' . $related->book_image)))
                                                <img src="{{ asset('book_image/' . $related->book_image) }}" class="related-thumb" alt="{{ $related->title_bn }}">
                                            @else
                                                <div class="related-thumb bg-light d-flex align-items-center justify-content-center text-muted">
                                                    <i class="fa fa-book text-success"></i>
                                                </div>
                                            @endif
                                            <div>
                                                <h6 class="mb-5 text-dark font-weight-700" style="font-size: 13.5px; line-height: 1.35;">
                                                    @if (session()->get('language') == 'bangla')
                                                        {{ Str::limit($related->title_bn ?: $related->title_en, 35) }}
                                                    @elseif (session()->get('language') == 'arabic')
                                                        {{ Str::limit($related->title_ab ?: $related->title_bn, 35) }}
                                                    @else
                                                        {{ Str::limit($related->title_en ?: $related->title_bn, 35) }}
                                                    @endif
                                                </h6>
                                                <span class="font-11 text-success font-weight-600">
                                                    @if (session()->get('language') == 'bangla') বিস্তারিত দেখুন @elseif (session()->get('language') == 'arabic') عرض التفاصيل @else View Details @endif
                                                </span>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
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
                                </a>
                            </li>

                            @foreach ($categories as $cat)
                                <li class="category-nav-item">
                                    <a href="{{ route('category.book', $cat->id) }}"
                                        class="category-nav-link {{ ($book->category_id == $cat->id) ? 'active' : '' }}">
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
                                                    <a href="{{ route('subcategory.book', $sub->id) }}"
                                                        class="sub-nav-link {{ ($book->subcategory_id == $sub->id) ? 'active' : '' }}">
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
