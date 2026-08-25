<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BannerAndTitle;
use App\Models\Result;
use App\Models\ResultType;
use App\Models\User;
use App\Models\UploadResult;
use App\Models\Subject;
use Carbon\Carbon;

class ResultController extends Controller
{
    public function tech_web_create_result(){

        // $blogs=Blog::where('status',1)->get();
        $banner= BannerAndTitle::where('page','blogs')->latest()->first();
        return view('frontend.result.create_result',compact('banner'));
    }

    public function tech_web_add_result(){

        $results = Result::latest()->first();
        return view('admin.result.add_result',compact('results'));
    }

    public function tech_web_store_result(Request $request){

        if($request->id){
            $result_id = $request->id;
            Result::findOrFail($result_id)->update([
                'title' => $request->title,
                'updated_at' => Carbon::now(),
            ]);
            return back()->with('message','Result updated successfully');

            }else{
                Result::insert([
                    'title' => $request->title,
                    'created_at' => Carbon::now(),
                ]);
            }       
            return back()->with('message','Result added successfully');
    }

    public function tech_web_add_subject(){
        $results = Result::latest()->first();
        $subjects = Subject::get();
        // dd($users);
        return view('admin.result.add_subject',compact('results','subjects'));
    }

    public function tech_web_store_subject(Request $request){

        Subject::insert([            
            'result_id' => $request->result_id,
            'subject_name_english' => $request->subject_name_english,
            'subject_name_bangla' => $request->subject_name_bangla	,
            'created_at' => Carbon::now(),
        ]);
        return back()->with('message','Subject Created successfully');
    }

    public function tech_web_edit_subject($id){

        $edit_subject = Subject::find($id);
        return view('admin.result.edit_subject',compact('edit_subject'));
    }

    public function tech_web_update_subject(Request $request){
        $subject_id = $request->id;
        Subject::findOrFail($subject_id)->update([
            'subject_name_english' => $request->subject_name_english,
            'subject_name_bangla' => $request->subject_name_bangla	,                        
            'updated_at' => Carbon::now(),
        ]);
        return redirect()->route('add.subject')->with('message','Subject Updated Successfully!');
    }

    public function tech_web_add_result_type(){
        $results = Result::get();
        $subjects = Subject::get();
        $result_types = ResultType::with('user','subject')->get();
        $users = User::where('is_admin',0)->get();
        // dd($users);
        return view('admin.result.add_result_type',compact('results','result_types','users','subjects'));
    }

    public function tech_web_store_result_type(Request $request){

        ResultType::insert([            
            'subject_id' => $request->subject_id,
            'result_id' => $request->result_id,            
            'created_at' => Carbon::now(),
        ]);
        return back()->with('message','Result type added successfully');
    }

    public function tech_web_upload_result($id){
        $result_types = ResultType::find($id);
        $users = User::where('is_admin',0)->get();
        $uploaded_results = UploadResult::with('user','resultType')->where('result_type',$id)->get();
        return view('admin.result.upload_result',compact('result_types','users','uploaded_results'));
    }

    public function tech_web_store_uploaded_result(Request $request){
    
        UploadResult::insert([
            'user_id' => $request->user_id,
            'result_type' => $request->result_type_id,
            'subject_id' => $request->subject_id,
            // 'roll_no' => $request->roll_no,
            'result_grate' => $request->result_grade,
            'created_at' => Carbon::now(),

        ]);

        return back()->with('message','Result Uploaded successfully');
    }

    // show result frontend part
    public function tech_web_show_result($id){
        $banner= BannerAndTitle::where('page','blogs')->latest()->first();
        $result_types = ResultType::with('subject')->where('subject_id',$id)->first();
        $uploaded_results = UploadResult::with('user','resultType')->where('subject_id',$id)->get();

        return view('frontend.result.show_result',compact('result_types','uploaded_results','banner'));


    }
    
}
