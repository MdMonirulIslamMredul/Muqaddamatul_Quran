<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    //
    public function tech_web_add_testimonial()
    {
        return view('admin.testimonial.testimonial',[
            'testimonials'=>Testimonial::get()
        ]);

    }

    public function tech_web_store_testimonial(Request $request)
    {
        Testimonial::save_testimonial($request);
        return back()->with('message','Testimonial added successfully');
    }

    public function tech_web_edit_testimonial($id)
    {
        return view('admin.testimonial.edit_testimonial',[
            'testimonial'=>Testimonial::find($id),
        ]);
    }

    public function tech_web_update_testimonial(Request $request)
    {
        Testimonial::update_testimonial($request);
        return back()->with('message','Testimonial update successfully');
    }
}
