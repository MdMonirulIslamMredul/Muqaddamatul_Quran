<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Activity;
use Illuminate\Http\Request;
use App\Models\BannerAndTitle;

class ActivityController extends Controller
{
    public function tech_web_add_activities(){
        $activities = Activity::get();
        return view('admin.activities.add_activity',compact('activities'));
    }

    public function tech_web_store_activities(Request $request){

        $file = $request->file('image');
        $fileName = date('YmdHi').$file->getClientOriginalName();
        $file->move(public_path('activity/activity_img'),$fileName);
        $save_url = 'activity/activity_img/'.$fileName; //insert photo into database

        Activity::insert([
            'title' => $request->title,
            'bangla_title' => $request->bangla_title,
            'arabic_title' => $request->arabic_title,
            'short_des_eng' => $request->short_des_eng,
            'short_des_bangla' => $request->short_des_bangla,
            'short_des_arabic' => $request->short_des_arabic,
            'image' => $save_url,
            'created_at' => Carbon::now(),
        ]);
        return redirect()->back()->with('message','Activities Data Added Successfully!');
    }

    public function tech_web_edit_activities($id){
        $edit_activity = Activity::find($id);
        return view('admin.activities.edit_activity',compact('edit_activity'));
    }

    public function tech_web_update_activities(Request $request){
        $id = $request->id;
        $old_img =$request->old_img;

        if($request->file('image')){
            @unlink($old_img);
            $file = $request->file('image');
            $fileName = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('activity/activity_img'),$fileName);
            $save_url = 'activity/activity_img/'.$fileName; //insert photo into database

            Activity::findOrFail($id)->update([
                'title' => $request->title,
                'bangla_title' => $request->bangla_title,
                'arabic_title' => $request->arabic_title,
                'short_des_eng' => $request->short_des_eng,
                'short_des_bangla' => $request->short_des_bangla,
                'short_des_arabic' => $request->short_des_arabic,
                'image' => $save_url,
                'updated_at' => Carbon::now(),
            ]);
            return redirect()->route('add.activities')->with('message','Activities Data Updated Successfully!');

        }else{
            Activity::findOrFail($id)->update([
                'title' => $request->title,
                'bangla_title' => $request->bangla_title,
                'arabic_title' => $request->arabic_title,
                'short_des_eng' => $request->short_des_eng,
                'short_des_bangla' => $request->short_des_bangla,
                'short_des_arabic' => $request->short_des_arabic,
                'updated_at' => Carbon::now(),
            ]);
            return redirect()->route('add.activities')->with('message','Activities Data Updated Successfully!');
        }
    }

    public function tech_web_all_activies($id){

        $all_activities = Activity::get();
        $single_activity = Activity::find($id);
        // dd($single_activity);

        return view('frontend.activities.all_activities',compact('single_activity','all_activities'));
    }
    public function tech_web_all_activism(){

        $all_activities = Activity::get();
        $banner=BannerAndTitle::where('page','projects')->latest()->first();
        return view('frontend.activities.all_activities_menu',compact('all_activities','banner'));
    }


}
