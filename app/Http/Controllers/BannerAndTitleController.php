<?php

namespace App\Http\Controllers;

use App\Models\BannerAndTitle;
use Illuminate\Http\Request;

class BannerAndTitleController extends Controller
{
//    public function add_banner_title()
//    {
//        return view('admin.general.general-pages.banner_title',[
//            'banner_and_titles'=>BannerAndTitle::get()
//        ]);
//
//    }

    public function tech_web_store_banner_tile(Request $request)
    {
        $data = BannerAndTitle::where('page',$request->page)->latest()->first();


        if($data == null){
            BannerAndTitle::save_banner_title($request);
        }
        else{
//            return $data;
            BannerAndTitle::update_banner_title($request,$data->id);
        }

        return back()->with('message','Banner and title added successfully');
    }

    public function tech_web_edit_banner_tile($id)
    {
        return view('admin.general.general-pages.banner_title_edit',[
            'banner_title'=>BannerAndTitle::find($id),
        ]);

    }

    public function tech_web_update_banner_tile(Request $request)
    {
        BannerAndTitle::update_banner_title($request);
        return redirect()->route('general.settings')->with('message','Banner and title update successfully');
    }
}
