<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notice;
use App\Models\BannerAndTitle;
use Carbon\Carbon;

class NoticeController extends Controller
{
    public function tech_web_add_notice(){

        $notices = Notice::get();
        return view('admin.notice.add_notice',compact('notices'));
    }

    public function tech_web_store_notice(Request $request){

        $file = $request->file('pdf_file');        
        $fileName = date('YmdHi').$file->getClientOriginalName();
        $file->move(public_path('notice/notice'),$fileName);
        $save_url = 'notice/notice/'.$fileName; //insert photo into database

        Notice::insert([
            'short_des' => $request->short_des,
            'long_des' => $request->long_des,
            'pdf_file' => $save_url,            
            'created_at' => Carbon::now(),
        ]);
        return redirect()->back()->with('message','Notice Added Successfully!');
    
    }

    public function tech_web_edit_notice($id){
        $edit_notice = Notice::find($id);
        return view('admin.notice.edit_notice',compact('edit_notice'));
        
    }

    public function tech_web_update_notice(Request $request){
        $id = $request->id;
        $old_file = $request->old_file;

        if($request->file('pdf_file')){
            @unlink($old_file);
            $file = $request->file('pdf_file');        
            $fileName = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('notice/notice'),$fileName);
            $save_url = 'notice/notice/'.$fileName; //insert photo into database
    
            Notice::findOrFail($id)->update([
                'short_des' => $request->short_des,
                'long_des' => $request->long_des,
                'pdf_file' => $save_url,            
                'updated_at' => Carbon::now(),
            ]);
            return redirect()->back()->with('message','Notice Updated Successfully!');

        }else{
            Notice::findOrFail($id)->update([
                'short_des' => $request->short_des,
                'long_des' => $request->long_des,                        
                'updated_at' => Carbon::now(),
            ]);
            return redirect()->back()->with('message','Notice Updated Successfully!');

        }      

    }

    public function tech_web_notice_details($id){
        $notice_detail = Notice::find($id);
        $banner = BannerAndTitle::where('page','courses')->latest()->first();
        // dd($banner);
        return view('frontend.notice.notice_details',compact('notice_detail','banner'));
    }

}
