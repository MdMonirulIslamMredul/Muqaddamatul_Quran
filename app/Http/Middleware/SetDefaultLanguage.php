<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class SetDefaultLanguage
{
    /**
     * Handle an incoming request.
     *
     * Ensure Bangla is set as the default language on site initial loading
     * while preserving user language selections (English, Arabic, Bangla).
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (!Session::has('language')) {
            Session::put('language', 'bangla');
        }

        $lang = Session::get('language', 'bangla');
        if ($lang === 'arabic') {
            App::setLocale('ar');
        } elseif ($lang === 'english') {
            App::setLocale('en');
        } else {
            App::setLocale('bn');
        }

        return $next($request);
    }
}
