<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Counter;
use Carbon\Carbon;

class CounterController extends Controller
{
    public function tech_web_add_counter(){

        $counter = Counter::latest()->first();
        return view('admin.counter.add_counter',compact('counter'));
    }

    public function tech_web_store_counter(Request $request){
        // dd($request->all());
        
                if($request->id){        
                    $counter_id = $request->id;        
                    Counter::findOrFail($counter_id)->update([
                        'incon_1' => $request->incon_1,
                        'title_1' => $request->title_1,
                        'title_bn1' => $request->title_bn1,
                        'title_ab1' => $request->title_ab1,
                        'value_1' => $request->value_1,
                        'value_bn1' => $request->value_bn1,
                        'value_ab1' => $request->value_ab1,
                        'incon_2' => $request->incon_2,
                        'title_2' => $request->title_2,
                        'title_bn2' => $request->title_bn2,
                        'title_ab2' => $request->title_ab2,
                        'value_2' => $request->value_2,
                        'value_bn2' => $request->value_bn2,
                        'value_ab2' => $request->value_ab2,
                        'incon_3' => $request->incon_3,
                        'title_3' => $request->title_3,
                        'title_bn3' => $request->title_bn3,
                        'title_ab3' => $request->title_ab3,
                        'value_3' => $request->value_3,
                        'value_bn3' => $request->value_bn3,
                        'value_ab3' => $request->value_ab3,
                        'incon_4' => $request->incon_4,
                        'title_4' => $request->title_4,
                        'title_bn4' => $request->title_bn4,
                        'title_ab4' => $request->title_ab4,
                        'value_4' => $request->value_4,
                        'value_bn4' => $request->value_bn4,
                        'value_ab4' => $request->value_ab4,
                        'updated_at' => Carbon::now(),
                    ]);
                    return redirect()->back()->with('Counter Data Updated Successfully');
                    
                }else{
                    Counter::insert([
                        'incon_1' => $request->incon_1,
                        'title_1' => $request->title_1,
                        'value_1' => $request->value_1,
                        'incon_2' => $request->incon_2,
                        'title_2' => $request->title_2,
                        'value_2' => $request->value_2,
                        'incon_3' => $request->incon_3,
                        'title_3' => $request->title_3,
                        'value_3' => $request->value_3,
                        'incon_4' => $request->incon_4,
                        'title_4' => $request->title_4,
                        'value_4' => $request->value_4,
                        'created_at' => Carbon::now(),
                    ]);
        
                }
                return redirect()->back()->with('Counter Data Added Successfully');        
                
            }
}
