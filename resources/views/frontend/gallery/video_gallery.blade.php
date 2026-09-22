     <!-- Section: Video Gallery -->
     <section id="video-gallery" class="pt-45 pb-45" style="background: #ffffff;">
         <div class="container">
             <div class="section-title text-center mb-25">
                 <div class="row">
                     <div class="col-md-8 col-md-offset-2">
                         <h2 class="title line-bottom mt-0 mb-20 text-center"><i
                                 class="fa fa-camera-retro text-gray-darkgray mr-10"></i>
                             @if (session()->get('language') == 'bangla')
                                 ভিডিও
                             @elseif (session()->get('language') == 'arabic')
                                 فيديو
                             @else
                                 Video
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
                     </div>
                 </div>
             </div>
             <div class="section-content">
                 <div class="row">
                     <style>
                         .video-wrapper iframe {
                             width: 100% !important;
                             height: 210px !important;
                             border: 0;
                             display: block;
                         }
                     </style>
                     @foreach ($videos as $video)
                         <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                             <article class="post clearfix bg-lighter mb-sm-30">
                                 <div class="card pb-0 custom_card"
                                     style="width:100%; border-radius: 20px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.06); background: #ffffff; margin-bottom: 25px;">
                                     <!-- Video Player or Embed -->
                                     <div class="video-wrapper"
                                         style="border-top-right-radius: 20px; border-top-left-radius: 20px; overflow: hidden; background: #000; height: 210px;">
                                         @if($video->video_file)
                                             <video controls playsinline preload="metadata" poster="{{ $video->thumbnail ? asset($video->thumbnail) : '' }}" style="width: 100%; height: 210px; object-fit: cover;">
                                                 <source src="{{ asset($video->video_file) }}">
                                                 Your browser does not support HTML5 video.
                                             </video>
                                         @else
                                             {!! $video->video_link !!}
                                         @endif
                                     </div>
                                     <div class="card-body" style="padding: 15px;">
                                         <h5 class="card-title" style="font-size: 15px; font-weight: 600; margin: 0; color: #1e293b; line-height: 1.4; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;" title="{{ $video->title }}">
                                             {{ $video->title ?? ($video->video_file ? basename($video->video_file) : 'Video') }}
                                         </h5>
                                     </div>
                                 </div>
                             </article>
                         </div>
                     @endforeach

                 </div>
             </div>
         </div>
     </section>
