<section id="gallery" class="pt-45 pb-45" style="background: #ffffff;">
    <div class="container">
        <div class="section-content">
            <div class="row">
                <div class="col-md-12">
                    <div class="d-flex justify-content-between align-items-center mb-25 flex-wrap gap-2">
                        <h2 class="title line-bottom mt-0 mb-0" style="font-size: 24px; font-weight: 700; color: #1b4332;">
                            <i class="fa fa-camera-retro text-gray-darkgray mr-10" style="color: #2d6a4f;"></i>
                            @if (session()->get('language') == 'bangla')
                                ফটো <span class="text-theme-colored" style="color: #2d6a4f;">গ্যালারি</span>
                            @elseif (session()->get('language') == 'arabic')
                                معرض <span class="text-theme-colored">الصور</span>
                            @else
                                Photo <span class="text-theme-colored">Gallery</span>
                            @endif
                        </h2>
                        <a href="{{ route('gallery.page') }}" class="btn btn-sm btn-outline-success fw-bold" style="border-radius: 20px; padding: 6px 18px; color: #1b4332; border-color: #2d6a4f; font-weight: 600;">
                            @if (session()->get('language') == 'bangla')
                                সকল ছবি দেখুন <i class="fa fa-arrow-right ml-5"></i>
                            @elseif (session()->get('language') == 'arabic')
                                عرض جميع الصور <i class="fa fa-arrow-left mr-5"></i>
                            @else
                                View All Photos <i class="fa fa-arrow-right ml-5"></i>
                            @endif
                        </a>
                    </div>

                    <!-- Modern CSS Grid Photo Gallery with Title & Description -->
                    <div class="gallery-modern-grid" style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 18px;">
                        @foreach($galleries as $gallery)
                            <div class="gallery-grid-card" style="position: relative; overflow: hidden; border-radius: 10px; box-shadow: 0 4px 15px rgba(0,0,0,0.07); aspect-ratio: 4/3; background: #eef5f2; border: 1px solid #e2ece9;">
                                <a href="{{ asset($gallery->image) }}" 
                                   data-lightbox="home-gallery" 
                                   data-title="{{ $gallery->title ? $gallery->title . ($gallery->description ? ' — ' . $gallery->description : '') : 'Photo Gallery' }}" 
                                   style="display: block; width: 100%; height: 100%; position: relative; text-decoration: none;">
                                    <img src="{{ asset($gallery->image) }}" alt="{{ $gallery->title ?: 'Gallery Image' }}" style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.4s ease;" class="gallery-img">
                                    
                                    <!-- Permanent bottom caption gradient if title exists -->
                                    @if($gallery->title)
                                        <div class="gallery-bottom-caption" style="position: absolute; bottom: 0; left: 0; right: 0; padding: 25px 12px 10px; background: linear-gradient(to top, rgba(15, 40, 30, 0.9) 0%, rgba(15, 40, 30, 0.5) 70%, transparent 100%); transition: opacity 0.3s ease;">
                                            <h6 style="color: #ffffff; font-size: 13px; font-weight: 600; margin: 0; text-shadow: 0 1px 3px rgba(0,0,0,0.8); white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                                {{ $gallery->title }}
                                            </h6>
                                        </div>
                                    @endif

                                    <!-- Hover Overlay with Title, Description & Zoom Icon -->
                                    <div class="gallery-hover-overlay" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(20, 50, 38, 0.85); opacity: 0; transition: opacity 0.3s ease; display: flex; flex-direction: column; align-items: center; justify-content: center; padding: 15px; text-align: center; color: #ffffff;">
                                        <span style="width: 40px; height: 40px; border-radius: 50%; background: #ffffff; color: #1b4332; display: flex; align-items: center; justify-content: center; font-size: 16px; margin-bottom: 8px; box-shadow: 0 4px 10px rgba(0,0,0,0.3);">
                                            <i class="fa fa-search-plus"></i>
                                        </span>
                                        @if($gallery->title)
                                            <h5 style="color: #ffffff; font-size: 14px; font-weight: 700; margin: 0 0 4px; line-height: 1.3;">
                                                {{ $gallery->title }}
                                            </h5>
                                        @endif
                                        @if($gallery->description)
                                            <p style="color: #d1e7dd; font-size: 11px; margin: 0; line-height: 1.4; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;">
                                                {{ $gallery->description }}
                                            </p>
                                        @endif
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                    <!-- End Photo Gallery Grid -->

                </div>
            </div>
        </div>
    </div>
</section>

<style>
.gallery-grid-card:hover .gallery-img {
    transform: scale(1.08);
}
.gallery-grid-card:hover .gallery-hover-overlay {
    opacity: 1 !important;
}
.gallery-grid-card:hover .gallery-bottom-caption {
    opacity: 0 !important;
}
@media (max-width: 992px) {
    .gallery-modern-grid {
        grid-template-columns: repeat(3, 1fr) !important;
    }
}
@media (max-width: 768px) {
    .gallery-modern-grid {
        grid-template-columns: repeat(2, 1fr) !important;
    }
}
@media (max-width: 480px) {
    .gallery-modern-grid {
        grid-template-columns: repeat(1, 1fr) !important;
    }
}
</style>
