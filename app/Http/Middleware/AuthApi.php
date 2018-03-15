<?php

namespace App\Http\Middleware;

use Closure;

class AuthApi
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
        if( session()->exists('token_api') ){
            $tmsis = (float)(strtotime(date('Y-m-d H:i:s')));
            $tm = (float)(session()->get('token_api')->expires_in_timestamp / 1000);
            
            if($tmsis < $tm)
                return $next($request);
            else 
                return redirect('/login');
        }
        else {
            return redirect('/login');
        }
    }
}
