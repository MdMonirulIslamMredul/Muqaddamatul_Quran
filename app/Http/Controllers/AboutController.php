<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\BannerAndTitle;
use App\Models\Team;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function add_about()
    {
        $about = About::first();

        return view('admin.about.about', [
            'about'      => $about,
            'abouts'     => $about ? collect([$about]) : collect([]),
            'about_data' => $about,
        ]);
    }

    public function store_about(Request $request)
    {
        if ($request->id) {
            About::update_service($request);
            return back()->with('message', 'About updated successfully');
        }

        About::save_service($request);
        return back()->with('message', 'About added successfully');
    }

    public function edit_about($id)
    {
        $about = About::find($id);

        if (!$about) {
            return redirect()->route('add.about')->with('error', 'About record not found');
        }

        return view('admin.about.edit_about', [
            'about' => $about,
        ]);
    }

    public function update_about(Request $request)
    {
        About::update_service($request);
        return redirect()->route('add.about')->with('message', 'About updated successfully');
    }

    public function tech_web_about_menu()
    {
        $about = About::first();
        $about_data = About::get();
        $banner = BannerAndTitle::where('page', 'about')->latest()->first() ?? BannerAndTitle::first();
        $teams = Team::where('status', 1)->get();
        $testimonials = Testimonial::where('status', 1)->where('add_home', 1)->get();

        return view('frontend.about_menu.about_page', compact('about', 'about_data', 'banner', 'teams', 'testimonials'));
    }
}
