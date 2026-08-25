<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subscriber;
use Illuminate\Http\Request;

class SubcribeController extends Controller
{
   public function SubscribeList(){
    return view('admin.subscribe.subscribe',[
        'subscribes'=>Subscriber::latest()->get(),
    ]);
   }
}
