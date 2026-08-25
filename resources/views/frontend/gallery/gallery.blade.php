<section id="gallery">
    <div class="container">
        <div class="section-content">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="title line-bottom mt-0 mb-30 text-center"><i
                            class="fa fa-camera-retro text-gray-darkgray mr-10"></i>
                        @if (session()->get('language') == 'bangla')
                            ফটো
                        @elseif (session()->get('language') == 'arabic')
                            صورة
                        @else
                            Photo
                        @endif
                        <span class="text-theme-colored">
                            @if (session()->get('language') == 'bangla')
                                গ্যালরি
                            @elseif (session()->get('language') == 'arabic')
                                صالة عرض
                            @else
                                Gallery
                            @endif
                        </span>
                    </h2>

                    <!-- Portfolio Gallery Grid -->
                    <div class="grid">
                        @foreach($galleries as $gallery)
                            <div class="grid-item">
                                <a href="{{ asset($gallery->image) }}" data-lightbox="gallery">
                                    <img src="{{ asset($gallery->image) }}" alt="gallery image">
                                    <div class="overlay-shade"></div>
                                    <div class="icons-holder">
                                        <div class="icons-holder-inner">
                                            <div class="styled-icons icon-sm icon-dark icon-circled icon-theme-colored">
                                                <i class="fa fa-picture-o"></i>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                    <!-- End Portfolio Gallery Grid -->

                </div>
            </div>
        </div>
    </div>
</section>
