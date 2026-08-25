<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LifetimeMember;
use App\Models\MembershipForm;
use Carbon\Carbon;

class LifeTimeMemberController extends Controller
{
    public function tech_web_lifetime_member(){
        $member = LifetimeMember::latest()->first();
        return view('admin.member.add_member',compact('member'));
    }

    public function tech_web_store_member(Request $request){

        
        if($request->id){
            $id = $request->id; 
            LifetimeMember::findOrFail($id)->update([
                'title' => $request->title,
                'title_bangla' => $request->title_bangla,            
                'title_ab' => $request->title_ab,            
                'long_des_eng1' => $request->long_des_eng1,
                'long_des_eng2' => $request->long_des_eng2,           
                'long_des_bangla1' => $request->long_des_bangla1,
                'long_des_bangla2' => $request->long_des_bangla2,                      
                'long_des_ab1' => $request->long_des_ab1,
                'long_des_ab2' => $request->long_des_ab2,                      
                'video_link' => $request->video_link,            
                'updated_at' => Carbon::now(),

            ]);
            return redirect()->back()->with('message',"Member updated successfully!");
        }else{
            LifetimeMember::insert([
                'title' => $request->title,
                'title_bangla' => $request->title_bangla,            
                'title_ab' => $request->title_ab,            
                'long_des_eng1' => $request->long_des_eng1,
                'long_des_eng2' => $request->long_des_eng2,           
                'long_des_bangla1' => $request->long_des_bangla1,
                'long_des_bangla2' => $request->long_des_bangla2,                      
                'long_des_ab1' => $request->long_des_ab1,
                'long_des_ab2' => $request->long_des_ab2,                      
                'video_link' => $request->video_link,           
                'created_at' => Carbon::now(),
            ]);
            return redirect()->back()->with('message',"Member Added successfully!");

        }

        
    }

    // front page membership page method and view page------------------------------

    public function tech_web_membership(){
        $membership = LifetimeMember::latest()->first();
        return view('frontend.member.membership_page',compact('membership'));
    }

    public function tech_web_store_membership_form(Request $request){

        MembershipForm::insert([
            'memter_type' => $request->memter_type,
            'name' => $request->name,
            'father_name' => $request->father_name,
            'phone_number' => $request->phone_number,
            'profession' => $request->profession,
            'email_address' => $request->email_address,
            'reference' => $request->reference,
            'address' => $request->address,
            'payment_method' => $request->payment_method,           
            'created_at' => Carbon::now(),
        ]);
        return redirect()->back();
    }

    public function tech_web_member_list(){
        $memberlist = MembershipForm::get();
        return view('admin.member.member_list',compact('memberlist'));
    }

}
