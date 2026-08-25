<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Donate;
use App\Models\DonatePayment;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class DonateController extends Controller
{
    public function tech_web_add_donate_data(){
        $donate_datas = Donate::get();
        return view('admin.donation.add_donation_data',compact('donate_datas'));
    }

    public function tech_web_add_donate_payment_data(){
        return view('admin.donation.donation_payment',[
            'payments'=>DonatePayment::latest()->get(),
        ]);
    }

    public function tech_web_store_donate_data(Request $request){

        // dd($request->all());
        $file = $request->file('image');
        $fileName = date('YmdHi').$file->getClientOriginalName();
        $file->move(public_path('donation/donate_img'),$fileName);
        $save_url = 'donation/donate_img/'.$fileName; //insert photo into database

        Donate::insert([
            'title' => $request->title,
            'bangla_title' => $request->bangla_title,
            'arabic_title' => $request->arabic_title,
            'short_des1' => $request->short_des1,
            'short_des2' => $request->short_des2,
            'long_des1' => $request->long_des1,
            'long_des2' => $request->long_des2,
            'long_des3' => $request->long_des3,
            'short_des_bangla1' => $request->short_des_bangla1,
            'short_des_bangla2' => $request->short_des_bangla2,
            'long_des_bangla1' => $request->long_des_bangla1,
            'long_des_bangla2' => $request->long_des_bangla2,
            'long_des_bangla3' => $request->long_des_bangla3,
            'short_des_ab1' => $request->short_des_ab1,
            'short_des_ab2' => $request->short_des_ab2,
            'long_des_ab1' => $request->long_des_ab1,
            'long_des_ab2' => $request->long_des_ab2,
            'long_des_ab3' => $request->long_des_ab3,
            'image' => $save_url,
            'video_link' => $request->video_link,
            'created_at' => Carbon::now(),
        ]);
        return redirect()->back()->with('message','Donation Data Added Successfully!');
    }

    public function tech_web_edit_donate_data($id){
        $edit_donate_data = Donate::find($id);
        return view('admin.donation.edit_donation_data',compact('edit_donate_data'));
    }
    public function tech_web_delete_donate_data($id){
        $edit_donate_data = Donate::destroy($id);
        return redirect()->back()->with('message','Donation Data Deleted Successfully!');
    }

    public function tech_web_update_donate_data(Request $request){
        $id = $request->id;
        $old_img = $request->old_img;

        if($request->file('image')){
            @unlink($old_img);
        $file = $request->file('image');
            $fileName = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('donation/donate_img'),$fileName);
            $save_url = 'donation/donate_img/'.$fileName; //insert photo into database

            Donate::findOrFail($id)->update([
                'title' => $request->title,
                'bangla_title' => $request->bangla_title,
                'arabic_title' => $request->arabic_title,
                'short_des1' => $request->short_des1,
                'short_des2' => $request->short_des2,
                'long_des1' => $request->long_des1,
                'long_des2' => $request->long_des2,
                'long_des3' => $request->long_des3,
                'short_des_bangla1' => $request->short_des_bangla1,
                'short_des_bangla2' => $request->short_des_bangla2,
                'long_des_bangla1' => $request->long_des_bangla1,
                'long_des_bangla2' => $request->long_des_bangla2,
                'long_des_bangla3' => $request->long_des_bangla3,
                'short_des_ab1' => $request->short_des_ab1,
                'short_des_ab2' => $request->short_des_ab2,
                'long_des_ab1' => $request->long_des_ab1,
                'long_des_ab2' => $request->long_des_ab2,
                'long_des_ab3' => $request->long_des_ab3,
                'image' => $save_url,
                'video_link' => $request->video_link,
                'updated_at' => Carbon::now(),
            ]);
            return redirect()->route('add.donate.data')->with('message','Donation Data Updated Successfully!');

        }else{

            Donate::findOrFail($id)->update([
                'title' => $request->title,
                'bangla_title' => $request->bangla_title,
                'arabic_title' => $request->arabic_title,
                'short_des1' => $request->short_des1,
                'short_des2' => $request->short_des2,
                'long_des1' => $request->long_des1,
                'long_des2' => $request->long_des2,
                'long_des3' => $request->long_des3,
                'short_des_bangla1' => $request->short_des_bangla1,
                'short_des_bangla2' => $request->short_des_bangla2,
                'long_des_bangla1' => $request->long_des_bangla1,
                'long_des_bangla2' => $request->long_des_bangla2,
                'long_des_bangla3' => $request->long_des_bangla3,
                'short_des_ab1' => $request->short_des_ab1,
                'short_des_ab2' => $request->short_des_ab2,
                'long_des_ab1' => $request->long_des_ab1,
                'long_des_ab2' => $request->long_des_ab2,
                'long_des_ab3' => $request->long_des_ab3,
                'video_link' => $request->video_link,
                'updated_at' => Carbon::now(),
            ]);
            return redirect()->route('add.donate.data')->with('message','Donation Data Updated Successfully!');
        }
    }

    public function tech_web_donation($id){
        $donation = Donate::find($id);

        return view('frontend.donation.donation_money',compact('donation'));
    }


    public function tech_web_all_donation(){
        $donations = Donate::get();
        return view('frontend.donation.all_donation',compact('donations'));



    }

    public function tech_web_donation_payment(Request $request){
         // Validate the incoming request

         $user=Auth::user();

         // Fetch the latest tracking ID and increment it
    $lastTrackingId = \App\Models\DonatePayment::max('tracking_id');
    $trackingId = $lastTrackingId ? $lastTrackingId + 1 : 1000;

    $request->validate([
        'donate_id' => 'required|integer',
        'amount' => 'required|numeric',
        'dname' => 'required|string',
        'demail' => 'required|email',
        'dphone' => 'required|string',
        'transaction_id' => 'required|string',
        'payment_type' => 'required|string|in:bkash,nagad,rocket,dbbl',
    ]);

    // Retrieve data from the request
    $donationData = [
        'donate_id' => $request->input('donate_id'),
        'tracking_id' =>$trackingId,
        'user_id'=>$user->id,
        'amount' => $request->input('amount'),
        'dname' => $request->input('dname'),
        'demail' => $request->input('demail'),
        'dphone' => $request->input('dphone'),
        'transaction_id' => $request->input('transaction_id'),
        'payment_type' => $request->input('payment_type'),
    ];

    // Create a new donation record
    $donation = new DonatePayment($donationData);
    $donation->save();

    // Redirect or return a response
    return redirect()->route('success.donation', ['id' => $donation->id])->with('message', 'Donation has been recorded successfully.');
    }


    public function tech_web_donation_success($id){
        
          $infos=DonatePayment::findOrFail($id);

        return view('frontend.donation.donate_success',[
                'info'=>$infos,
        ]);
    }
}
