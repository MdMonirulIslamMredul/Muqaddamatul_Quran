<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    
        public function tech_web_english_language(){
            // Session()->get('language');
            // Session()->forget('language');
            Session::put('language','english');
            return redirect()->back();

        }

        public function tech_web_bangla_language(){
            // Session()->get('language');
            // Session()->forget('language');
            Session::put('language','bangla');
            return redirect()->back();
    
        }

        public function tech_web_arabic_language(){
            // Session()->get('language');
            // Session()->forget('language');
            Session::put('language','arabic');
            return redirect()->back();

        }

        
}
