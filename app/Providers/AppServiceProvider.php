<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use View;
use App\Models\Footer;
use DB;
use Request;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        
        $url =Request::getHost();
        $host = str_replace('www.','',$url);
        $domaincheck=DB::table('hostnames')->where('fqdn',$host)->where('activate',1)->first();
       
        $header=DB::table('header')->where('website',$host)->first();
        $request_banner_image=DB::table('banner_contents')->where('website',$host)->where('page_name','request page')->first();
        $sort_banner_image=DB::table('banner_contents')->where('website',$host)->where('page_name','sort page')->first();
        $tracking_code=DB::table('tracking_code')->where('website',$host)->first();
        $site_colors=DB::table('site_color')->where('website',$host)->first();
        $man=DB::table('landing_page')->where('website',$host)->first();
        View::share('link_status', Footer::where('website',$host)->get());
        View::share('doamin', $domaincheck);
        View::share('header', $header);
        View::share('request_banner_image',$request_banner_image);
        View::share('sort_banner_image',$sort_banner_image);
        View::share('tracking_code',$tracking_code);
        View::share('site_colors',$site_colors);
        View::share('man',$man);
        
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
