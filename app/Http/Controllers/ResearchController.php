<?php

namespace App\Http\Controllers;

use App\Models\Research;
use Illuminate\Http\Request;

class ResearchController extends Controller
{
    //
    public function tech_web_add_research()
    {
        return view('admin.research.research',[
            'researches'=>Research::get()
        ]);

    }

    public function tech_web_store_research(Request $request)
    {
        Research::save_research($request);
        return back()->with('message','Research added successfully');
    }

    public function tech_web_edit_research($id)
    {
        return view('admin.research.edit_research',[
            'research'=>Research::find($id),
        ]);
    }

    public function tech_web_update_research(Request $request)
    {


        Research::update_research($request);
        return back()->with('message','Research update successfully');
    }
}
