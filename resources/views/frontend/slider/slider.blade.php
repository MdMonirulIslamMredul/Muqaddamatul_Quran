<!-- Modern Hero Slider Section Start -->
<section id="hero-slider-section" class="p-0 position-relative" style="overflow: hidden; background: #081c15;">

    <div id="bannerCarousel" class="carousel slide carousel-fade" data-ride="carousel" data-interval="6500" data-pause="hover" style="position: relative;">
        
        <!-- Indicators (Only show if multiple banners exist) -->
        @if(count($banners) > 1)
        <ol class="carousel-indicators" style="bottom: 22px; z-index: 15; margin-bottom: 0;">
            @foreach ($banners as $key => $banner)
                <li data-target="#bannerCarousel" data-slide-to="{{ $key }}" class="{{ $key == 0 ? 'active' : '' }}" 
                    style="width: 28px; height: 6px; border-radius: 4px; background-color: rgba(255, 255, 255, 0.4); border: none; margin: 0 4px; transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1); cursor: pointer;"></li>
            @endforeach
        </ol>
        @endif

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
            @foreach ($banners as $key => $banner)
                <div class="item {{ $key == 0 ? 'active' : '' }}">
                    
                    <!-- Background Image with Ken Burns / Zoom Animation -->
                    <div class="hero-bg-img" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: url('{{ asset($banner->image) }}') no-repeat center right; background-size: cover; z-index: 0;"></div>

                    <!-- Clean & Soft Gradient Overlay (Decreased opacity so background photo is vivid & visible) -->
                    <div class="hero-gradient-overlay" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: linear-gradient(90deg, rgba(5, 20, 13, 0.82) 0%, rgba(5, 20, 13, 0.68) 32%, rgba(5, 20, 13, 0.32) 58%, rgba(5, 20, 13, 0.08) 80%, rgba(5, 20, 13, 0.15) 100%); z-index: 1;"></div>

                    <!-- Slide Content with Staggered Entrance Animations -->
                    <div class="container" style="position: relative; z-index: 2; height: 100%; min-height: 560px; display: flex; align-items: center;">
                        <div class="row" style="width: 100%; margin: 0; padding: 60px 0;">
                            
                            <div class="col-lg-8 col-md-9 col-sm-12" style="padding-left: 10px;">
                                
                                <!-- Main Title -->
                                <h1 class="hero-title text-white font-weight-800 hero-anim-item anim-title" 
                                    style="font-size: 42px; line-height: 1.3; margin-top: 0; margin-bottom: 18px; font-family: 'SolaimanLipi', 'Hind Siliguri', 'Noto Sans Bengali', sans-serif; text-shadow: 0 2px 14px rgba(0,0,0,0.7);">
                                    {{ $banner->localized_title }}
                                </h1>

                                <!-- Description Paragraph -->
                                <p class="hero-description text-white hero-anim-item anim-desc" 
                                   style="font-size: 15px; line-height: 1.8; color: #ffffff; max-width: 640px; margin-bottom: 26px; text-shadow: 0 1px 8px rgba(0,0,0,0.7); opacity: 0.98;">
                                    {{ $banner->localized_details }}
                                </p>

                                <!-- CTA Action Button -->
                                <div class="hero-action-btn mb-30 hero-anim-item anim-btn" style="margin-bottom: 30px;">
                                    <a href="{{ $banner->button_url ?: route('online.admission') }}" 
                                       class="btn-gradient-pill" 
                                       style="background: linear-gradient(90deg, #d81159 0%, #e63946 35%, #ff7b00 100%); color: #ffffff !important; font-weight: 700; font-size: 15px; padding: 11px 32px; border-radius: 50px; border: none; display: inline-flex; align-items: center; gap: 8px; box-shadow: 0 6px 20px rgba(216, 17, 89, 0.45); text-decoration: none; transition: all 0.3s ease;">
                                        <span>{{ $banner->localized_button_text ?: 'ই-ক্যাম্পাস' }}</span>
                                        <i class="fa fa-arrow-right" style="font-size: 13px;"></i>
                                    </a>
                                </div>

                                <!-- Achievements / Success Section -->
                                <div class="hero-achievements-wrapper hero-anim-item anim-stats" style="border-top: 1px solid rgba(255,255,255,0.12); padding-top: 22px;">
                                    
                                    <span class="achievement-subtitle" 
                                          style="font-size: 13px; font-weight: 600; color: #e2e8f0; margin-bottom: 14px; display: block; letter-spacing: 0.3px;">
                                        {{ $banner->achievement_subtitle ?: 'বিগত ৫ বছর ধরে আমাদের সাফল্য' }}
                                    </span>

                                    <!-- 3 Stat Badges in a Row -->
                                    <div class="achievement-badges-row" style="display: flex; align-items: center; gap: 24px; flex-wrap: wrap;">
                                        
                                        <!-- Stat 1: Students -->
                                        <div class="stat-badge-item" style="display: flex; align-items: center; gap: 10px;">
                                            <div class="stat-icon-box" style="width: 44px; height: 44px; border-radius: 8px; background: rgba(255, 159, 28, 0.15); border: 1px solid rgba(255, 159, 28, 0.35); display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                                                <i class="fa fa-graduation-cap" style="color: #ff9f1c; font-size: 20px;"></i>
                                            </div>
                                            <div class="stat-text-box">
                                                <span class="stat-num" style="font-size: 16px; font-weight: 800; color: #ffffff; display: block; line-height: 1.1;">
                                                    {{ $banner->stat1_value ?: '১০,০০০' }}
                                                </span>
                                                <span class="stat-lbl" style="font-size: 12px; color: #cbd5e1; display: block; margin-top: 2px;">
                                                    {{ $banner->stat1_label ?: 'শিক্ষার্থী' }}
                                                </span>
                                            </div>
                                        </div>

                                        <!-- Stat 2: Teachers -->
                                        <div class="stat-badge-item" style="display: flex; align-items: center; gap: 10px;">
                                            <div class="stat-icon-box" style="width: 44px; height: 44px; border-radius: 8px; background: rgba(46, 196, 182, 0.15); border: 1px solid rgba(46, 196, 182, 0.35); display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                                                <i class="fa fa-mortar-board" style="color: #2ec4b6; font-size: 20px;"></i>
                                            </div>
                                            <div class="stat-text-box">
                                                <span class="stat-num" style="font-size: 16px; font-weight: 800; color: #ffffff; display: block; line-height: 1.1;">
                                                    {{ $banner->stat2_value ?: '৪০+' }}
                                                </span>
                                                <span class="stat-lbl" style="font-size: 12px; color: #cbd5e1; display: block; margin-top: 2px;">
                                                    {{ $banner->stat2_label ?: 'শিক্ষক' }}
                                                </span>
                                            </div>
                                        </div>

                                        <!-- Stat 3: Success Rate -->
                                        <div class="stat-badge-item" style="display: flex; align-items: center; gap: 10px;">
                                            <div class="stat-icon-box" style="width: 44px; height: 44px; border-radius: 8px; background: rgba(131, 56, 236, 0.15); border: 1px solid rgba(131, 56, 236, 0.35); display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                                                <i class="fa fa-check-circle" style="color: #b588f7; font-size: 20px;"></i>
                                            </div>
                                            <div class="stat-text-box">
                                                <span class="stat-num" style="font-size: 16px; font-weight: 800; color: #ffffff; display: block; line-height: 1.1;">
                                                    {{ $banner->stat3_value ?: '৮৯%' }}
                                                </span>
                                                <span class="stat-lbl" style="font-size: 12px; color: #cbd5e1; display: block; margin-top: 2px;">
                                                    {{ $banner->stat3_label ?: 'কোর্স কমপ্লিট রেট' }}
                                                </span>
                                            </div>
                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>
                    </div>

                </div>
            @endforeach
        </div>

        <!-- Left and right navigation controls (Only if multiple banners) -->
        @if(count($banners) > 1)
        <a class="left carousel-control hero-nav-btn" href="#bannerCarousel" data-slide="prev" 
           style="background: none; width: 60px; z-index: 10; display: flex; align-items: center; justify-content: center; opacity: 0; transition: all 0.3s ease;">
            <span class="carousel-arrow-icon" style="font-size: 18px; color: #fff; background: rgba(0,0,0,0.35); backdrop-filter: blur(6px); -webkit-backdrop-filter: blur(6px); width: 44px; height: 44px; display: flex; align-items: center; justify-content: center; border-radius: 50%; border: 1px solid rgba(255,255,255,0.25); transition: all 0.3s ease; box-shadow: 0 4px 15px rgba(0,0,0,0.3);">
                <i class="fa fa-chevron-left"></i>
            </span>
        </a>
        <a class="right carousel-control hero-nav-btn" href="#bannerCarousel" data-slide="next" 
           style="background: none; width: 60px; z-index: 10; display: flex; align-items: center; justify-content: center; opacity: 0; transition: all 0.3s ease;">
            <span class="carousel-arrow-icon" style="font-size: 18px; color: #fff; background: rgba(0,0,0,0.35); backdrop-filter: blur(6px); -webkit-backdrop-filter: blur(6px); width: 44px; height: 44px; display: flex; align-items: center; justify-content: center; border-radius: 50%; border: 1px solid rgba(255,255,255,0.25); transition: all 0.3s ease; box-shadow: 0 4px 15px rgba(0,0,0,0.3);">
                <i class="fa fa-chevron-right"></i>
            </span>
        </a>
        @endif

    </div>

</section>
<!-- Modern Hero Slider Section End -->

<style>
/* ================= HERO SLIDER & SEAMLESS FADE ANIMATIONS ================= */
#hero-slider-section {
    position: relative;
    overflow: hidden;
    background: #081c15;
}

.carousel-fade .carousel-inner {
    position: relative;
    width: 100%;
    height: 560px;
    min-height: 560px;
    overflow: hidden;
}

.carousel-fade .carousel-inner .item {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    min-height: 560px;
    opacity: 0;
    display: none;
    z-index: 1;
    transition: opacity 1.1s cubic-bezier(0.4, 0, 0.2, 1);
}

.carousel-fade .carousel-inner .item.active,
.carousel-fade .carousel-inner .item.next,
.carousel-fade .carousel-inner .item.prev {
    display: block;
}

.carousel-fade .carousel-inner .item.active {
    opacity: 1;
    z-index: 2;
}

.carousel-fade .carousel-inner .item.next.left,
.carousel-fade .carousel-inner .item.prev.right {
    opacity: 1;
    z-index: 2;
}

.carousel-fade .carousel-inner .item.active.left,
.carousel-fade .carousel-inner .item.active.right {
    opacity: 0;
    z-index: 1;
}

.carousel-fade .carousel-control {
    z-index: 10;
}

/* ================= SLOW CINEMATIC KEN BURNS BACKGROUND ZOOM ================= */
.hero-bg-img {
    transform: scale(1);
    transform-origin: center center;
    transition: transform 7s cubic-bezier(0.25, 1, 0.5, 1);
    will-change: transform;
}

.carousel-fade .carousel-inner .item.active .hero-bg-img {
    transform: scale(1.08);
}

/* ================= STAGGERED TEXT & CONTENT ENTRANCE ANIMATIONS ================= */
.hero-anim-item {
    opacity: 0;
    transform: translateY(24px);
    transition: opacity 0.7s cubic-bezier(0.2, 0.8, 0.2, 1), transform 0.7s cubic-bezier(0.2, 0.8, 0.2, 1);
    will-change: opacity, transform;
}

.carousel-fade .carousel-inner .item.active .anim-title {
    opacity: 1;
    transform: translateY(0);
    transition-delay: 0.15s;
}

.carousel-fade .carousel-inner .item.active .anim-desc {
    opacity: 0.95;
    transform: translateY(0);
    transition-delay: 0.32s;
}

.carousel-fade .carousel-inner .item.active .anim-btn {
    opacity: 1;
    transform: translateY(0);
    transition-delay: 0.48s;
}

.carousel-fade .carousel-inner .item.active .anim-stats {
    opacity: 1;
    transform: translateY(0);
    transition-delay: 0.62s;
}

/* ================= CONTROLS & INDICATORS STYLING ================= */
#bannerCarousel:hover .hero-nav-btn {
    opacity: 1 !important;
}

.hero-nav-btn:hover .carousel-arrow-icon {
    background: rgba(45, 106, 79, 0.9) !important;
    border-color: #52b788 !important;
    transform: scale(1.12);
    box-shadow: 0 6px 20px rgba(82, 183, 136, 0.45) !important;
}

.carousel-indicators li {
    background-color: rgba(255, 255, 255, 0.35) !important;
}

.carousel-indicators li.active {
    background: linear-gradient(90deg, #ff7b00 0%, #ff9f1c 100%) !important;
    width: 38px !important;
    box-shadow: 0 0 10px rgba(255, 123, 0, 0.6) !important;
}

.btn-gradient-pill:hover {
    transform: translateY(-2px) scale(1.02);
    box-shadow: 0 10px 25px rgba(216, 17, 89, 0.6) !important;
}

/* ================= RESPONSIVE ADJUSTMENTS ================= */
@media (max-width: 768px) {
    .hero-gradient-overlay {
        background: linear-gradient(180deg, rgba(5, 20, 13, 0.82) 0%, rgba(5, 20, 13, 0.65) 55%, rgba(5, 20, 13, 0.85) 100%) !important;
    }
    .carousel-fade .carousel-inner,
    .carousel-fade .carousel-inner .item {
        height: auto !important;
        min-height: 520px !important;
    }
    .hero-title {
        font-size: 26px !important;
        line-height: 1.35 !important;
    }
    .hero-description {
        font-size: 13.5px !important;
        line-height: 1.65 !important;
        margin-bottom: 20px !important;
    }
    .achievement-badges-row {
        gap: 12px !important;
    }
    .stat-badge-item {
        gap: 8px !important;
    }
    .stat-icon-box {
        width: 38px !important;
        height: 38px !important;
    }
    .stat-icon-box i {
        font-size: 16px !important;
    }
    .stat-num {
        font-size: 14px !important;
    }
    .stat-lbl {
        font-size: 11px !important;
    }
    .hero-nav-btn {
        display: none !important;
    }
}
</style>

