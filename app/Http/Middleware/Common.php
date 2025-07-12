<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Cache;
use Symfony\Component\HttpFoundation\Response;

class Common
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        /* Get General Setting Value */

        $general_setting = Cache::remember('general_setting', 60*60*24*365, function(){
            return DB::table('general_settings')->latest()->first();
        });

        /* Setting Theme to Switch Dark to Light or Light to Dark */

         //setting theme
        if(isset($_COOKIE['theme'])) {
            View::share('theme', $_COOKIE['theme']);
        }
        else {

            View::share('theme', 'light');
        }
        

        View::share('general_setting', $general_setting);

        return $next($request);
    }
}
