@extends('frontend.master')

@section('title')
    @if(session()->get('language') == 'bangla') নোটিশ বোর্ড - মুকাদ্দামাতুল কুরআন ইসলামী একাডেমি @elseif(session()->get('language') == 'arabic') لوحة الإعلانات @else Notice Board - Muqaddamatul Quran @endif
@endsection

@section('content')
<div class="main-content">

    <!-- Hero / Breadcrumbs Section -->
    <section class="inner-header divider parallax layer-overlay overlay-dark-6" 
             style="background-image: url('{{ asset(optional($banner)->image ?? 'frontend/images/bg/bg1.jpg') }}'); background-size: cover; background-position: center; padding: 60px 0;">
        <div class="container">
            <div class="section-content">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h1 class="title text-white font-32 font-weight-700 mb-5">
                            @if(session()->get('language') == 'bangla') 
                                নোটিশ বোর্ড ও বিজ্ঞপ্তি 
                            @elseif(session()->get('language') == 'arabic') 
                                لوحة الإعلانات والأخبار 
                            @else 
                                Notice Board & Announcements 
                            @endif
                        </h1>
                        <ol class="breadcrumb text-center text-white mt-10">
                            <li><a href="{{ route('front.page') }}" class="text-white"><i class="fa fa-home me-1"></i>হোম</a></li>
                            <li class="active text-theme-colored" style="color: #52b788;">নোটিশ বোর্ড</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Notices Main Content Section -->
    <section class="pt-50 pb-70" style="background-color: #f7faf8;">
        <div class="container">
            <div class="row">

                <!-- Left Content: Notices List & Filters -->
                <div class="col-md-8 col-sm-12">
                    
                    <!-- Search & Filter Card -->
                    <div class="card p-20 mb-25 shadow-sm" style="background: #ffffff; border-radius: 10px; border: 1px solid #e2ece9;">
                        <form action="{{ route('frontend.notices.index') }}" method="GET">
                            <div class="row">
                                <div class="col-md-6 col-sm-6 mb-10">
                                    <div class="input-group">
                                        <input type="text" name="search" class="form-control" placeholder="নোটিশের নাম বা স্মারক নম্বর..." value="{{ request('search') }}" style="height: 40px; border-radius: 4px 0 0 4px; border-color: #cbd5e1;">
                                        <span class="input-group-btn">
                                            <button class="btn btn-theme-colored" type="submit" style="height: 40px; background: #1b4332; border-color: #1b4332; color: #fff; border-radius: 0 4px 4px 0;">
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-3 col-xs-6 mb-10">
                                    <select name="category" class="form-control" onchange="this.form.submit()" style="height: 40px; border-radius: 4px; border-color: #cbd5e1;">
                                        <option value="all">সকল ক্যাটাগরি</option>
                                        @foreach($categoriesList as $catKey => $cat)
                                            <option value="{{ $catKey }}" {{ request('category') == $catKey ? 'selected' : '' }}>
                                                {{ $cat['bn'] }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3 col-sm-3 col-xs-6 mb-10">
                                    <select name="year" class="form-control" onchange="this.form.submit()" style="height: 40px; border-radius: 4px; border-color: #cbd5e1;">
                                        <option value="">সকল বছর</option>
                                        @foreach($availableYears as $year)
                                            <option value="{{ $year }}" {{ request('year') == $year ? 'selected' : '' }}>
                                                {{ $year }} সাল
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </form>

                        <!-- Category Filter Pills -->
                        <div class="category-pills mt-10 pt-10" style="border-top: 1px dashed #e2ece9; display: flex; flex-wrap: wrap; gap: 8px;">
                            <a href="{{ route('frontend.notices.index') }}" 
                               style="padding: 5px 12px; border-radius: 16px; font-size: 12px; text-decoration: none; display: inline-flex; align-items: center; gap: 6px; {{ !request('category') || request('category') == 'all' ? 'background: #1b4332; color: #fff; font-weight: bold;' : 'background: #eef5f2; color: #1b4332;' }}">
                                <span>সকল নোটিশ</span>
                                <span class="badge" style="background: rgba(0,0,0,0.15); font-size: 10px;">{{ $totalActiveCount }}</span>
                            </a>

                            @foreach($categoriesList as $catKey => $cat)
                                <a href="{{ route('frontend.notices.index', ['category' => $catKey]) }}" 
                                   style="padding: 5px 12px; border-radius: 16px; font-size: 12px; text-decoration: none; display: inline-flex; align-items: center; gap: 6px; {{ request('category') == $catKey ? 'background: #1b4332; color: #fff; font-weight: bold;' : 'background: #eef5f2; color: #1b4332;' }}">
                                    <span>{{ $cat['bn'] }}</span>
                                    <span class="badge" style="background: rgba(0,0,0,0.15); font-size: 10px;">{{ $categoryCounts[$catKey] ?? 0 }}</span>
                                </a>
                            @endforeach
                        </div>
                    </div>

                    <!-- Notices Cards List -->
                    <div class="notices-list-container" style="display: flex; flex-direction: column; gap: 16px; width: 100%;">
                        @forelse($notices as $notice)
                            <div class="notice-card-item shadow-sm" style="background: #ffffff; border-radius: 10px; border: 1px solid #e2ece9; padding: 20px; transition: all 0.25s ease; position: relative; overflow: hidden; width: 100%;">
                                
                                @if($notice->is_pinned)
                                    <div style="position: absolute; top: 0; right: 0; background: #ffb703; color: #000; font-size: 11px; font-weight: 700; padding: 3px 14px; border-bottom-left-radius: 8px;">
                                        📌 বিশেষ নোটিশ
                                    </div>
                                @endif

                                <div style="display: flex; align-items: flex-start; gap: 20px; width: 100%;">
                                    
                                    <!-- Date Stamp -->
                                    <div class="notice-date-box flex-shrink-0" style="flex-shrink: 0; width: 75px; text-align: center; background: linear-gradient(145deg, #1b4332 0%, #2d6a4f 100%); color: #ffffff; border-radius: 8px; padding: 10px 4px; line-height: 1.1; box-shadow: 0 4px 10px rgba(27,67,50,0.18);">
                                        <span style="font-size: 24px; font-weight: 800; display: block; color: #ffffff;">
                                            {{ \Carbon\Carbon::parse($notice->publish_date)->format('d') }}
                                        </span>
                                        <span style="font-size: 11.5px; font-weight: 600; text-transform: uppercase; color: #95d5b2; display: block; margin-top: 4px;">
                                            {{ \Carbon\Carbon::parse($notice->publish_date)->format('M, Y') }}
                                        </span>
                                    </div>

                                    <!-- Content Details -->
                                    <div class="notice-content-box" style="flex-grow: 1; min-width: 0;">
                                        
                                        <!-- Meta Pill & Ref No -->
                                        <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 6px; flex-wrap: wrap;">
                                            <span class="badge" style="background-color: #2d6a4f; color: #ffffff; padding: 4px 10px; border-radius: 4px; font-size: 11px; font-weight: 600;">
                                                {{ $notice->category_name }}
                                            </span>
                                            @if($notice->notice_no)
                                                <span class="text-muted font-monospace" style="font-size: 11.5px;">
                                                    <i class="fa fa-bookmark-o me-1"></i>{{ $notice->notice_no }}
                                                </span>
                                            @endif
                                            <span class="text-muted" style="font-size: 11px;">
                                                <i class="fa fa-eye me-1"></i>{{ $notice->views_count }} বার পঠিত
                                            </span>
                                        </div>

                                        <!-- Title -->
                                        <h4 style="margin: 6px 0 10px 0; font-size: 17px; font-weight: 700; line-height: 1.45;">
                                            <a href="{{ route('frontend.notices.show', $notice->id) }}" style="color: #1b4332; text-decoration: none; transition: color 0.2s;" onmouseover="this.style.color='#52b788'" onmouseout="this.style.color='#1b4332'">
                                                {{ $notice->localized_title }}
                                            </a>
                                        </h4>

                                        <!-- Excerpt -->
                                        <p style="color: #475569; font-size: 13.5px; line-height: 1.65; margin-bottom: 14px;">
                                            {{ Str::limit($notice->localized_short_des ?: strip_tags($notice->localized_long_des), 160) }}
                                        </p>

                                        <!-- Actions toolbar -->
                                        <div style="display: flex; align-items: center; gap: 10px; flex-wrap: wrap;">
                                            <a href="{{ route('frontend.notices.show', $notice->id) }}" class="btn btn-xs" style="background: #1b4332; color: #fff; padding: 6px 14px; border-radius: 4px; font-weight: 600; font-size: 12px; text-decoration: none;">
                                                বিস্তারিত পড়ুন <i class="fa fa-angle-right ms-1"></i>
                                            </a>

                                            @if($notice->pdf_file)
                                                <a href="{{ route('frontend.notices.download', $notice->id) }}" class="btn btn-xs" style="background: #fee2e2; color: #dc2626; border: 1px solid #fca5a5; padding: 6px 12px; border-radius: 4px; font-weight: 600; font-size: 12px; text-decoration: none; display: inline-flex; align-items: center; gap: 5px;" onmouseover="this.style.background='#dc2626'; this.style.color='#fff';" onmouseout="this.style.background='#fee2e2'; this.style.color='#dc2626';">
                                                    <i class="fa fa-file-pdf-o"></i>
                                                    <span>PDF ডাউনলোড @if($notice->file_size) ({{ $notice->file_size }}) @endif</span>
                                                </a>
                                            @endif
                                        </div>

                                    </div>

                                </div>

                            </div>
                        @empty
                            <div class="card p-40 text-center shadow-sm" style="background: #ffffff; border-radius: 10px; border: 1px solid #e2ece9;">
                                <i class="fa fa-bell-slash-o text-muted" style="font-size: 44px;"></i>
                                <h4 class="mt-15 mb-5 font-weight-700 text-secondary">কোনো নোটিশ পাওয়া যায়নি</h4>
                                <p class="text-muted">আপনার অনুসন্ধান ফিল্টার অনুযায়ী কোনো নোটিশ খুঁজে পাওয়া যায়নি।</p>
                                <div class="mt-15">
                                    <a href="{{ route('frontend.notices.index') }}" class="btn btn-theme-colored btn-sm">সকল নোটিশ দেখুন</a>
                                </div>
                            </div>
                        @endforelse
                    </div>

                    <!-- Pagination -->
                    @if($notices->hasPages())
                        <div class="text-center mt-30">
                            {{ $notices->links() }}
                        </div>
                    @endif

                </div>

                <!-- Right Sidebar -->
                <div class="col-md-4 col-sm-12">
                    <div class="sidebar sidebar-right mt-sm-30">
                        
                        <!-- Admission CTA Widget -->
                        <div class="widget shadow-sm p-25 text-center mb-30" style="background: linear-gradient(135deg, #1b4332 0%, #2d6a4f 100%); color: #ffffff; border-radius: 10px;">
                            <i class="fa fa-graduation-cap" style="font-size: 38px; color: #95d5b2; margin-bottom: 10px;"></i>
                            <h4 class="text-white font-weight-700 mb-10">অনলাইন ভর্তি চলছে!</h4>
                            <p style="color: #d8f3dc; font-size: 13px; line-height: 1.6; margin-bottom: 18px;">
                                ২০২৬-২০২৭ শিক্ষাবর্ষে নূরানী, নাজেরা, হিফজ ও কিতাব বিভাগে সীমিত আসনে ভর্তি চলছে।
                            </p>
                            <a href="{{ route('online.admission') }}" class="btn btn-sm btn-light font-weight-700" style="color: #1b4332; padding: 8px 20px; border-radius: 25px; box-shadow: 0 4px 10px rgba(0,0,0,0.15);">
                                ভর্তি আবেদন ফরম
                            </a>
                        </div>

                        <!-- Recent Notices Widget -->
                        <div class="widget shadow-sm p-20 mb-30" style="background: #ffffff; border-radius: 10px; border: 1px solid #e2ece9;">
                            <h4 class="widget-title line-bottom font-weight-700 mb-20" style="color: #1b4332; font-size: 16px;">
                                সর্বশেষ জরুরি নোটিশ
                            </h4>
                            <div class="latest-notices-list" style="display: flex; flex-direction: column; gap: 12px;">
                                @foreach($recentNotices as $rNotice)
                                    <div style="display: flex; gap: 10px; align-items: flex-start; padding-bottom: 10px; border-bottom: 1px dashed #e2ece9;">
                                        <div style="flex-shrink: 0; width: 45px; height: 45px; background: #eef5f2; border-radius: 6px; display: flex; flex-direction: column; align-items: center; justify-content: center; color: #1b4332; text-align: center; line-height: 1;">
                                            <span style="font-weight: 800; font-size: 15px;">{{ \Carbon\Carbon::parse($rNotice->publish_date)->format('d') }}</span>
                                            <span style="font-size: 10px; font-weight: 600; text-transform: uppercase;">{{ \Carbon\Carbon::parse($rNotice->publish_date)->format('M') }}</span>
                                        </div>
                                        <div style="min-width: 0;">
                                            <a href="{{ route('frontend.notices.show', $rNotice->id) }}" style="color: #1b4332; font-size: 13px; font-weight: 600; text-decoration: none; line-height: 1.4; display: block;" onmouseover="this.style.color='#52b788'" onmouseout="this.style.color='#1b4332'">
                                                {{ Str::limit($rNotice->localized_title, 55) }}
                                            </a>
                                            <small class="text-muted" style="font-size: 11px;">
                                                <span class="badge" style="background: #e2ece9; color: #1b4332; font-size: 10px; padding: 2px 6px;">{{ $rNotice->category_name }}</span>
                                            </small>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- Department Links Widget -->
                        <div class="widget shadow-sm p-20" style="background: #ffffff; border-radius: 10px; border: 1px solid #e2ece9;">
                            <h4 class="widget-title line-bottom font-weight-700 mb-20" style="color: #1b4332; font-size: 16px;">
                                আমাদের বিভাগসমূহ
                            </h4>
                            <ul class="list-unstyled" style="margin: 0; padding: 0;">
                                @foreach($departments as $dept)
                                    <li style="padding: 8px 0; border-bottom: 1px solid #f1f5f9;">
                                        <a href="{{ route('department.details', $dept->id) }}" style="color: #334155; font-size: 13.5px; text-decoration: none; display: flex; justify-content: space-between; align-items: center;" onmouseover="this.style.color='#1b4332'" onmouseout="this.style.color='#334155'">
                                            <span><i class="fa fa-angle-right text-theme-colored me-2"></i>{{ session()->get('language') == 'bangla' ? $dept->title_bn : $dept->title_en }}</span>
                                            <i class="fa fa-external-link text-muted" style="font-size: 11px;"></i>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>

</div>
@endsection
