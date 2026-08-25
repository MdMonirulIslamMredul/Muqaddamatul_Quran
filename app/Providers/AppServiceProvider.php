<?php

namespace App\Providers;

use View;
use App\Models\Blog;
use App\Models\Service;
use App\Models\Department;
use App\Models\FooterDetail;
use App\Models\WebsiteLinks;
use App\Models\BannerAndTitle;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Paginator::useBootstrap();
        View::composer('*',function ($view){
           $view->with('links',WebsiteLinks::latest()->first());
        });
        View::composer('*',function ($view){
           $view->with('testimonial_title',BannerAndTitle::where('page','testimonial')->latest()->first());
        });
        View::composer('*',function ($view){
           $view->with('footer_blogs',Blog::where('status',1)->where('add_home',1)->take(2)->get());
        });
        View::composer('frontend.includes.footer',function ($view){
            $view->with('footer',FooterDetail::latest()->first());
            $view->with('services',Service::take(4)->get());
        });
        View::composer('frontend.includes.header',function ($view){
            $view->with('departments',Department::where('status',1)->latest()->get());
        });

    }
}
