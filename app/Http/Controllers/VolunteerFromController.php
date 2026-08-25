<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VolunteerForm;
use Carbon\Carbon;

class VolunteerFromController extends Controller
{
    public function tech_web_volunteer_form(){
        return view('frontend.volunteerform.volunteer_form');
    }

    public function tech_web_store_volunteer_data(Request $request){

        VolunteerForm::insert([
            'name' => $request->name,
            'phone_number' => $request->phone_number,
            'emergency_phone_number' => $request->emergency_phone_number,
            'email_address' => $request->email_address,
            'facebook_id_link' => $request->facebook_id_link,
            'nid_number' => $request->nid_number,
            'education_qualifiction' => $request->education_qualifiction,
            'profession' => $request->profession,
            'institute_name' => $request->institute_name,
            'summery' => $request->summery,
            'volunteer_section' => $request->volunteer_section,
            'skill' => $request->skill,
            'permanent_discrict' => $request->permanent_discrict,
            'permanent_tikana' => $request->permanent_tikana,
            'present_discrict' => $request->present_discrict,
            'present_tikana' => $request->present_tikana,
            'created_at' => Carbon::now(),
        ]);
        return redirect()->back()->with('message','Submited successfully');
    }

    public function tech_web_volunteer_list(){
        $volunteers = VolunteerForm::get();
        return view('admin.volunteer.volunteer_list',compact('volunteers'));
    }
}
