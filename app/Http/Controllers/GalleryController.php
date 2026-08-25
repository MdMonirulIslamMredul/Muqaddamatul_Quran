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

    // video gallery start
    public function tech_web_add_video_gallery(){
        $videos = VideoGallery::get();
        return view('admin.gallery.add_video_gallery',compact('videos'));
    }

    public function tech_web_store_video_gallery(Request $request){

        VideoGallery::insert([
            'video_link' => $request->video_link,
            'created_at' => Carbon::now(),
        ]);
        return redirect()->back()->with('message','Video Added Successfully!');
    }

    public function tech_web_edit_video_gallery($id){
        $edit_video = VideoGallery::find($id);
        return view('admin.gallery.edit_video_gallery',compact('edit_video'));
    }

    public function tech_web_update_video_gallery(Request $request){
        $id = $request->id;

        VideoGallery::findOrFail($id)->update([
            'video_link' => $request->video_link,
            'updated_at' => Carbon::now(),
        ]);
        return redirect()->route('add.video.gallery')->with('message','Video Updated Successfully!');
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
