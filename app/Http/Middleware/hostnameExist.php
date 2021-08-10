<?php

namespace App\Http\Middleware;

use Closure;
use DB;
use Artisan;
use Request;

class hostnameExist
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        $url =Request::getHttpHost();
        $host = str_replace('www.','',$url);
        
        $domaincheck=DB::table('hostnames')->where('fqdn',$host)->where('activate',1)->exists();

     
        if($domaincheck == false)
             return redirect('404');
        else if($domaincheck == true )
            return $next($request);
        else
            return view('404'); 
            

       
        
    }
}
