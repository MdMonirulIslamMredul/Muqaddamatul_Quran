<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\UpcomingProject;
use Carbon\Carbon;

class ProjectController extends Controller
{
    public function tech_web_add_project_data(){
        $project_datas = Project::get();
        return view('admin.project.add_project_data',compact('project_datas'));
    }

    public function tech_web_store_project_data(Request $request){

        $file = $request->file('image');        
        $fileName = date('YmdHi').$file->getClientOriginalName();
        $file->move(public_path('project/project_img'),$fileName);
        $save_url = 'project/project_img/'.$fileName; //insert photo into database

        Project::insert([
            'title' => $request->title,
            'title_bangla' => $request->title_bangla,
            'short_des_eng' => $request->short_des_eng,
            'short_des_bangla' => $request->short_des_bangla,
            'image' => $save_url,            
            'created_at' => Carbon::now(),
        ]);
        return redirect()->back()->with('message','Project Data Added Successfully!');
    }

    public function tech_web_edit_project_data($id){
        $edit_project_data = Project::find($id);
        return view('admin.project.edit_project_data',compact('edit_project_data'));
    }
    
    public function tech_web_update_project_data(Request $request){
        $id = $request->id;
        $old_img = $request->old_img;       

        if($request->file('image')){
            @unlink($old_img);
            $file = $request->file('image');        
            $fileName = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('project/project_img'),$fileName);
            $save_url = 'project/project_img/'.$fileName; //insert photo into database
    
            Project::findOrFail($id)->update([
                'title' => $request->title,
                'title_bangla' => $request->title_bangla,
                'short_des_eng' => $request->short_des_eng,
                'short_des_bangla' => $request->short_des_bangla,
                'image' => $save_url,           
                'updated_at' => Carbon::now(),
            ]);
            return redirect()->route('add.project.data')->with('message','Project Data Updated Successfully!');

        }else{       
       
            Project::findOrFail($id)->update([
                'title' => $request->title,
                'title_bangla' => $request->title_bangla,
                'short_des_eng' => $request->short_des_eng,
                'short_des_bangla' => $request->short_des_bangla,
                'updated_at' => Carbon::now(),
            ]);
            return redirect()->route('add.project.data')->with('message','Project Data Updated Successfully!');
        }
    }

    public function tech_web_project_details($id){
        $project_details = Project::find($id);
        return view('frontend.projects.project_details',compact('project_details'));
    }


    // --------------------Upcoming project all metthods here-------------------------
    public function tech_web_add_upcoming_project(){
        $upcome_project = UpcomingProject::get();
        return view('admin.project.add_upcoming_project',compact('upcome_project'));
    }

    public function tech_web_store_upcoming_project(Request $request){
        // image1
        $file = $request->file('image1');        
        $fileName = date('YmdHi').$file->getClientOriginalName();
        $file->move(public_path('upcomeproject/project_img'),$fileName);
        $save_url1 = 'upcomeproject/project_img/'.$fileName; //insert photo into database
        // image2
        $file2 = $request->file('image2');        
        $fileName2 = date('YmdHi').$file2->getClientOriginalName();
        $file2->move(public_path('upcomeproject/project_img'),$fileName2);
        $save_url2 = 'upcomeproject/project_img/'.$fileName2; //insert photo into database
        // image3
        $file3 = $request->file('image3');        
        $fileName3 = date('YmdHi').$file3->getClientOriginalName();
        $file3->move(public_path('upcomeproject/project_img'),$fileName3);
        $save_url3 = 'upcomeproject/project_img/'.$fileName3; //insert photo into database

        UpcomingProject::insert([
            'title' => $request->title,
            'bangla_title' => $request->bangla_title,
            'location' => $request->location,
            'project_start_date' => $request->project_start_date,
            'short_des1' => $request->short_des1,
            'short_des2' => $request->short_des2,
            'short_des_bangla1' => $request->short_des_bangla1,
            'short_des_bangla2' => $request->short_des_bangla2,
            'long_des1' => $request->long_des1,
            'long_des2' => $request->long_des2,
            'long_des3' => $request->long_des3,              
            'long_des_bangla1' => $request->long_des_bangla1,
            'long_des_bangla2' => $request->long_des_bangla2,
            'long_des_bangla3' => $request->long_des_bangla3,
            'image1' => $save_url1,            
            'image2' => $save_url2,            
            'image3' => $save_url3,            
            'video_link1' => $request->video_link1,            
            'video_link2' => $request->video_link2,            
            'created_at' => Carbon::now(),
        ]);
        return redirect()->back()->with('message','Upcoming Project Data Added Successfully!');
    }

    public function tech_web_edit_upcome_porject($id){
        $edit_upcomeproject = UpcomingProject::find($id);
        return view('admin.project.edit_upcome_project',compact('edit_upcomeproject'));
    }

    public function tech_web_update_upcome_project(Request $request){
        $id = $request->id;
        $old_img1 = $request->old_img1;       
        $old_img2 = $request->old_img2;       
        $old_img3= $request->old_img3;       

        if($request->file('image1')){
            @unlink($old_img1);
           // image1
            $file = $request->file('image1');        
            $fileName = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upcomeproject/project_img'),$fileName);
            $save_url1 = 'upcomeproject/project_img/'.$fileName; //insert photo into database
    
            UpcomingProject::findOrFail($id)->update([
                'title' => $request->title,
                'bangla_title' => $request->bangla_title,
                'location' => $request->location,
                'project_start_date' => $request->project_start_date,
                'short_des1' => $request->short_des1,
                'short_des2' => $request->short_des2,
                'short_des_bangla1' => $request->short_des_bangla1,
                'short_des_bangla2' => $request->short_des_bangla2,
                'long_des1' => $request->long_des1,
                'long_des2' => $request->long_des2,
                'long_des3' => $request->long_des3,              
                'long_des_bangla1' => $request->long_des_bangla1,
                'long_des_bangla2' => $request->long_des_bangla2,
                'long_des_bangla3' => $request->long_des_bangla3,
                'image1' => $save_url1,            
                // 'image2' => $save_url2,            
                // 'image3' => $save_url3,            
                'video_link1' => $request->video_link1,            
                'video_link2' => $request->video_link2,         
                'updated_at' => Carbon::now(),
            ]);
            return redirect()->route('add.upcoming.project')->with('message','Upcoming Project Data Updated Successfully!');

        }elseif($request->file('image2')){
            @unlink($old_img2);
            // image2
            $file2 = $request->file('image2');        
            $fileName2 = date('YmdHi').$file2->getClientOriginalName();
            $file2->move(public_path('upcomeproject/project_img'),$fileName2);
            $save_url2 = 'upcomeproject/project_img/'.$fileName2; //insert photo into database

            UpcomingProject::findOrFail($id)->update([
                'title' => $request->title,
                'bangla_title' => $request->bangla_title,
                'location' => $request->location,
                'project_start_date' => $request->project_start_date,
                'short_des1' => $request->short_des1,
                'short_des2' => $request->short_des2,
                'short_des_bangla1' => $request->short_des_bangla1,
                'short_des_bangla2' => $request->short_des_bangla2,
                'long_des1' => $request->long_des1,
                'long_des2' => $request->long_des2,
                'long_des3' => $request->long_des3,              
                'long_des_bangla1' => $request->long_des_bangla1,
                'long_des_bangla2' => $request->long_des_bangla2,
                'long_des_bangla3' => $request->long_des_bangla3,
                // 'image1' => $save_url1,            
                'image2' => $save_url2,            
                // 'image3' => $save_url3,            
                'video_link1' => $request->video_link1,            
                'video_link2' => $request->video_link2,         
                'updated_at' => Carbon::now(),
            ]);
            return redirect()->route('add.upcoming.project')->with('message','Upcoming Project Data Updated Successfully!');
            

        }elseif($request->file('image3')){
            @unlink($old_img3);
            // image3
            $file3 = $request->file('image3');        
            $fileName3 = date('YmdHi').$file3->getClientOriginalName();
            $file3->move(public_path('upcomeproject/project_img'),$fileName3);
            $save_url3 = 'upcomeproject/project_img/'.$fileName3; //insert photo into database

            UpcomingProject::findOrFail($id)->update([
                'title' => $request->title,
                'bangla_title' => $request->bangla_title,
                'location' => $request->location,
                'project_start_date' => $request->project_start_date,
                'short_des1' => $request->short_des1,
                'short_des2' => $request->short_des2,
                'short_des_bangla1' => $request->short_des_bangla1,
                'short_des_bangla2' => $request->short_des_bangla2,
                'long_des1' => $request->long_des1,
                'long_des2' => $request->long_des2,
                'long_des3' => $request->long_des3,              
                'long_des_bangla1' => $request->long_des_bangla1,
                'long_des_bangla2' => $request->long_des_bangla2,
                'long_des_bangla3' => $request->long_des_bangla3,
                // 'image1' => $save_url1,            
                // 'image2' => $save_url2,            
                'image3' => $save_url3,            
                'video_link1' => $request->video_link1,            
                'video_link2' => $request->video_link2,         
                'updated_at' => Carbon::now(),
            ]);
            return redirect()->route('add.upcoming.project')->with('message','Upcoming Project Data Updated Successfully!');

        }        
        else{              
            UpcomingProject::findOrFail($id)->update([
                'title' => $request->title,
                'bangla_title' => $request->bangla_title,
                'location' => $request->location,
                'project_start_date' => $request->project_start_date,
                'short_des1' => $request->short_des1,
                'short_des2' => $request->short_des2,
                'short_des_bangla1' => $request->short_des_bangla1,
                'short_des_bangla2' => $request->short_des_bangla2,
                'long_des1' => $request->long_des1,
                'long_des2' => $request->long_des2,
                'long_des3' => $request->long_des3,              
                'long_des_bangla1' => $request->long_des_bangla1,
                'long_des_bangla2' => $request->long_des_bangla2,
                'long_des_bangla3' => $request->long_des_bangla3,                           
                'video_link1' => $request->video_link1,            
                'video_link2' => $request->video_link2,            
                'updated_at' => Carbon::now(),
            ]);
            return redirect()->route('add.upcoming.project')->with('message','Upcoming Project Data Updated Successfully!');
        }
    }

    public function tech_web_upcome_project_details($id){
        $upcome_project_details = UpcomingProject::find($id);
        return view('frontend.projects.upcome_project_details',compact('upcome_project_details'));
    }
}
