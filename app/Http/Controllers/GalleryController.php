<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery;
use App\Models\VideoGallery;
use App\Models\BannerAndTitle;
use Carbon\Carbon;


class GalleryController extends Controller
{
    //
    public function tech_web_add_gallery()
    {
        return view('admin.gallery.gallery',[
            'galleries'=>Gallery::get()
        ]);

    }

    public function tech_web_store_gallery(Request $request)
    {
        Gallery::save_gallery($request);
        return back()->with('message','gallery added successfully');
    }

    public function tech_web_edit_gallery($id)
    {
        return view('admin.gallery.edit_gallery',[
            'gallery'=>Gallery::find($id),
        ]);
    }

    public function tech_web_update_gallery(Request $request)
    {
        Gallery::update_gallery($request);
        return back()->with('message','gallery update successfully');
    }

    public function tech_web_delete_gallery($id)
    {
        $gallery = Gallery::find($id);
        if ($gallery) {
            if ($gallery->image && file_exists(public_path($gallery->image))) {
                @unlink(public_path($gallery->image));
            }
            $gallery->delete();
            return back()->with('message', 'Gallery image deleted successfully!');
        }
        return back()->with('error', 'Gallery image not found!');
    }

    // video gallery start
    public function tech_web_add_video_gallery(){
        $videos = VideoGallery::latest()->get();
        return view('admin.gallery.add_video_gallery',compact('videos'));
    }

    public function tech_web_store_video_gallery(Request $request){
        $request->validate([
            'title' => 'nullable|string|max:255',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:10240',
            'video_file' => 'nullable|file|max:2097152', // up to 2GB
        ]);

        // Custom validation: check extension if video_file provided
        if ($request->hasFile('video_file')) {
            $allowedExtensions = ['mp4', 'mkv', 'wmv', 'webm', 'avi', 'mov'];
            $fileExt = strtolower($request->file('video_file')->getClientOriginalExtension());
            if (!in_array($fileExt, $allowedExtensions)) {
                $errorMsg = 'Invalid video format. Allowed formats: ' . implode(', ', $allowedExtensions);
                if ($request->ajax() || $request->wantsJson()) {
                    return response()->json(['success' => false, 'message' => $errorMsg, 'errors' => ['video_file' => [$errorMsg]]], 422);
                }
                return redirect()->back()->withErrors(['video_file' => $errorMsg])->withInput();
            }
        }

        if (!$request->hasFile('video_file') && empty($request->video_link)) {
            $errorMsg = 'Please provide either a raw video file or an embed video link.';
            if ($request->ajax() || $request->wantsJson()) {
                return response()->json(['success' => false, 'message' => $errorMsg, 'errors' => ['video_file' => [$errorMsg]]], 422);
            }
            return redirect()->back()->withErrors(['video_file' => $errorMsg])->withInput();
        }

        $videoPath = null;
        if ($request->hasFile('video_file') && $request->file('video_file')->isValid()) {
            $videoFile = $request->file('video_file');
            $videoExt = $videoFile->getClientOriginalExtension();
            $videoName = 'video_' . time() . '_' . uniqid() . '.' . $videoExt;
            $videoDir = public_path('video_gallery/videos');
            if (!file_exists($videoDir)) {
                mkdir($videoDir, 0777, true);
            }
            $videoFile->move($videoDir, $videoName);
            $videoPath = 'video_gallery/videos/' . $videoName;
        }

        $thumbnailPath = null;
        if ($request->hasFile('thumbnail') && $request->file('thumbnail')->isValid()) {
            $thumbFile = $request->file('thumbnail');
            $thumbExt = $thumbFile->getClientOriginalExtension();
            $thumbName = 'thumb_' . time() . '_' . uniqid() . '.' . $thumbExt;
            $thumbDir = public_path('video_gallery/thumbnails');
            if (!file_exists($thumbDir)) {
                mkdir($thumbDir, 0777, true);
            }
            $thumbFile->move($thumbDir, $thumbName);
            $thumbnailPath = 'video_gallery/thumbnails/' . $thumbName;
        }

        // Process YouTube video link: auto-format to responsive iframe & auto-fetch title/thumbnail
        $videoLink = $request->video_link;
        $title = $request->title;
        $ytId = $this->extractYouTubeId($videoLink);

        if ($ytId) {
            $videoLink = $this->formatVideoEmbed($videoLink);
            if (empty($title)) {
                $title = $this->fetchYouTubeTitle($ytId);
            }
            if (empty($thumbnailPath)) {
                $thumbnailPath = $this->downloadYouTubeThumbnail($ytId);
            }
        }

        $video = VideoGallery::create([
            'title' => $title,
            'thumbnail' => $thumbnailPath,
            'video_file' => $videoPath,
            'video_link' => $videoLink,
            'status' => $request->status ?? 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Video uploaded and added successfully!',
                'redirect_url' => route('add.video.gallery'),
                'data' => $video
            ]);
        }

        return redirect()->back()->with('message', 'Video Added Successfully!');
    }

    public function tech_web_edit_video_gallery($id){
        $edit_video = VideoGallery::findOrFail($id);
        return view('admin.gallery.edit_video_gallery',compact('edit_video'));
    }

    public function tech_web_update_video_gallery(Request $request){
        $request->validate([
            'id' => 'required|exists:video_galleries,id',
            'title' => 'nullable|string|max:255',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:10240',
            'video_file' => 'nullable|file|max:2097152',
        ]);

        $video = VideoGallery::findOrFail($request->id);

        if ($request->hasFile('video_file')) {
            $allowedExtensions = ['mp4', 'mkv', 'wmv', 'webm', 'avi', 'mov'];
            $fileExt = strtolower($request->file('video_file')->getClientOriginalExtension());
            if (!in_array($fileExt, $allowedExtensions)) {
                $errorMsg = 'Invalid video format. Allowed formats: ' . implode(', ', $allowedExtensions);
                if ($request->ajax() || $request->wantsJson()) {
                    return response()->json(['success' => false, 'message' => $errorMsg, 'errors' => ['video_file' => [$errorMsg]]], 422);
                }
                return redirect()->back()->withErrors(['video_file' => $errorMsg])->withInput();
            }

            // Remove old video file if exists
            if ($video->video_file && file_exists(public_path($video->video_file))) {
                @unlink(public_path($video->video_file));
            }

            $videoFile = $request->file('video_file');
            $videoExt = $videoFile->getClientOriginalExtension();
            $videoName = 'video_' . time() . '_' . uniqid() . '.' . $videoExt;
            $videoDir = public_path('video_gallery/videos');
            if (!file_exists($videoDir)) {
                mkdir($videoDir, 0777, true);
            }
            $videoFile->move($videoDir, $videoName);
            $video->video_file = 'video_gallery/videos/' . $videoName;
        }

        if ($request->hasFile('thumbnail')) {
            // Remove old thumbnail if exists
            if ($video->thumbnail && file_exists(public_path($video->thumbnail))) {
                @unlink(public_path($video->thumbnail));
            }

            $thumbFile = $request->file('thumbnail');
            $thumbExt = $thumbFile->getClientOriginalExtension();
            $thumbName = 'thumb_' . time() . '_' . uniqid() . '.' . $thumbExt;
            $thumbDir = public_path('video_gallery/thumbnails');
            if (!file_exists($thumbDir)) {
                mkdir($thumbDir, 0777, true);
            }
            $thumbFile->move($thumbDir, $thumbName);
            $video->thumbnail = 'video_gallery/thumbnails/' . $thumbName;
        }

        $videoLink = $request->video_link;
        $title = $request->title;
        $ytId = $this->extractYouTubeId($videoLink);

        if ($ytId) {
            $videoLink = $this->formatVideoEmbed($videoLink);
            if (empty($title)) {
                $title = $this->fetchYouTubeTitle($ytId);
            }
            if (!$request->hasFile('thumbnail') && empty($video->thumbnail)) {
                $downloadedThumb = $this->downloadYouTubeThumbnail($ytId);
                if ($downloadedThumb) {
                    $video->thumbnail = $downloadedThumb;
                }
            }
        }

        $video->title = $title;
        $video->video_link = $videoLink;
        if ($request->has('status')) {
            $video->status = $request->status;
        }
        $video->updated_at = Carbon::now();
        $video->save();

        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Video Updated Successfully!',
                'redirect_url' => route('add.video.gallery'),
                'data' => $video
            ]);
        }

        return redirect()->route('add.video.gallery')->with('message','Video Updated Successfully!');
    }

    /**
     * Extract YouTube Video ID from any URL or embed string
     */
    private function extractYouTubeId(?string $url): ?string
    {
        if (!$url) return null;
        if (preg_match('/(?:youtu\.be\/|youtube\.com\/(?:embed\/|v\/|watch\?v=|shorts\/|watch\?.+&v=))([\w-]{11})/', $url, $matches)) {
            return $matches[1];
        }
        return null;
    }

    /**
     * Convert YouTube URL or ID into a standard responsive iframe
     */
    private function formatVideoEmbed(?string $link): ?string
    {
        if (!$link) return null;
        $ytId = $this->extractYouTubeId($link);
        if ($ytId) {
            return '<iframe width="560" height="315" src="https://www.youtube.com/embed/' . $ytId . '?rel=0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>';
        }
        return $link;
    }

    /**
     * Fetch YouTube Video Title via public oEmbed (no API key needed)
     */
    private function fetchYouTubeTitle(string $videoId): ?string
    {
        try {
            $ctx = stream_context_create(['http' => ['timeout' => 4]]);
            $res = @file_get_contents('https://noembed.com/embed?url=https://www.youtube.com/watch?v=' . $videoId, false, $ctx);
            if ($res) {
                $data = json_decode($res, true);
                return $data['title'] ?? null;
            }
        } catch (\Exception $e) {}
        return null;
    }

    /**
     * Download YouTube thumbnail locally
     */
    private function downloadYouTubeThumbnail(string $videoId): ?string
    {
        try {
            $thumbDir = public_path('video_gallery/thumbnails');
            if (!file_exists($thumbDir)) {
                mkdir($thumbDir, 0777, true);
            }
            $filename = 'thumb_yt_' . $videoId . '_' . time() . '.jpg';
            $filePath = $thumbDir . '/' . $filename;
            
            $ctx = stream_context_create(['http' => ['timeout' => 5]]);
            $imgData = @file_get_contents('https://img.youtube.com/vi/' . $videoId . '/hqdefault.jpg', false, $ctx);
            if ($imgData && strlen($imgData) > 1000) {
                file_put_contents($filePath, $imgData);
                return 'video_gallery/thumbnails/' . $filename;
            }
        } catch (\Exception $e) {}
        return null;
    }

    public function tech_web_delete_video_gallery($id){
        $video = VideoGallery::find($id);
        if ($video) {
            if ($video->video_file && file_exists(public_path($video->video_file))) {
                @unlink(public_path($video->video_file));
            }
            if ($video->thumbnail && file_exists(public_path($video->thumbnail))) {
                @unlink(public_path($video->thumbnail));
            }
            $video->delete();
            return redirect()->back()->with('message', 'Video Deleted Successfully!');
        }
        return redirect()->back()->with('error', 'Video not found!');
    }

    public function tech_web_gallery()
    {
        return view('frontend.gallery.gallery_page',[
            'galleries'=>Gallery::where('status',1)->get(),
            'banner'=>BannerAndTitle::where('page','image_gallery')->latest()->first(),

        ]);
    }

    public function tech_web_video_gallery()
    {
        return view('frontend.gallery.video_gallery_page',[
            'videos'=>VideoGallery::where('status',1)->get(),
            'banner'=>BannerAndTitle::where('page','video_gallery')->latest()->first(),

        ]);
    }





}
