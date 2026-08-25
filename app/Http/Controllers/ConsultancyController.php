<?php

namespace App\Http\Controllers;

use App\Models\Consultancy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ConsultancyController extends Controller
{
    public function tech_web_add_consultancy()
    {
        return view('admin.consultancy.consultancy',[
            'consultancy'=>DB::table('consultancies')->latest()->first(),
        ]);

    }

    public function tech_web_store_consultancy(Request $request)
    {
        Consultancy::save_consultancy($request);
        return back()->with('message','Consultancy added successfully');
    }

}
