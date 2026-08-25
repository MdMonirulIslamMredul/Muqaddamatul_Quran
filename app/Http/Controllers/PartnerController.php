<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Partner;
use Carbon\Carbon;

class PartnerController extends Controller
{
    public function tech_web_add_partner(){
        $partners = Partner::get();
        return view('admin.partner.add_partner',compact('partners'));
    }

    public function tech_web_store_partner(Request $request){
        $file = $request->file('image');        
        $fileName = date('YmdHi').$file->getClientOriginalName();
        $file->move(public_path('partner/partner_img'),$fileName);
        $save_url = 'partner/partner_img/'.$fileName; //insert photo into database

        Partner::insert([
            'partner_name' => $request->partner_name,
            'partner_name_bangla' => $request->partner_name_bangla,
            'image' => $save_url,                        
            'created_at' => Carbon::now(),
        ]);
        return redirect()->back()->with('message','Partner Data Added Successfully!');
    }

    public function tech_web_edit_partner($id){
        $edit_partner = Partner::find($id);
        return view('admin.partner.edit_partner',compact('edit_partner'));
    }
    
    public function tech_web_update_partner(Request $request){
        $id = $request->id;
        $old_img = $request->old_img;       

        if($request->file('image')){
            @unlink($old_img);
            $file = $request->file('image');
            $fileName = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('partner/partner_img'),$fileName);
            $save_url = 'partner/partner_img/'.$fileName; //insert photo into database
    
            Partner::findOrFail($id)->update([
                'partner_name' => $request->partner_name,
                'partner_name_bangla' => $request->partner_name_bangla,
                'image' =>$save_url,
                'status' => $request->status,            
                'updated_at' => Carbon::now(),
            ]);
            return redirect()->route('add.partners')->with('message','Prtner Data Updated Successfully!');

        }else{       
       
            Donate::findOrFail($id)->update([
                'partner_name' => $request->partner_name,
                'partner_name_bangla' => $request->partner_name_bangla, 
                'status' => $request->status,                         
                'updated_at' => Carbon::now(),
            ]);
            return redirect()->route('add.partners')->with('message','Prtner Data Updated Successfully!');
        }
    }
}
