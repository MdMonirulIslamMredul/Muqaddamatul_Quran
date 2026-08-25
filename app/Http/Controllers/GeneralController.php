<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\BannerAndTitle;
use App\Models\FooterDetail;
use App\Models\Logo;
use App\Models\PaymentNumber;
use App\Models\WebsiteLinks;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class GeneralController extends Controller
{
    public function tech_web_general_settings()
    {
        return view('admin.general.general',[
            'banner_titles'=>BannerAndTitle::get(),
            'logo'=>Logo::latest()->first(),
            'links'=>WebsiteLinks::latest()->first(),
            'footer'=>FooterDetail::latest()->first(),
            'number'=>PaymentNumber::latest()->first(),
            'banners'=>Banner::get(),
        ]);
    }
    public function tech_web_profile_settings()
    {
//        return User::where('id',Auth::user()->id)->first();
        return view('admin.profile.profile',[
            'user'=>User::where('id',Auth::user()->id)->first(),
        ]);
    }

    public function tech_web_update_profile(Request $request)
    {

        User::update_profile($request);
        return back()->with('message','profile updated successfully');
    }

    public function tech_web_user_profile_settings()
    {
        return view('frontend.profile.profile',[
            'user'=>User::where('id',Auth::user()->id)->first(),
            'banner'=>BannerAndTitle::where('page','enrollment')->latest()->first(),
        ]);
    }

    public function tech_web_user_update_profile(Request $request)
    {
        User::update_profile($request);
        return back()->with('message','profile updated successfully');
    }
}
