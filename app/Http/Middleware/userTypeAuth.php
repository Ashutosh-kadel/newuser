<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class userTypeAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::check()){

            if(Auth::user()->type=='user' && Auth::user()->status=='1'){
                return $next($request);
            }else{
                
                    // Auth::guard('web')->logout();
            
                    // $request->session()->invalidate();
            
                    // $request->session()->regenerateToken();
            
                    return redirect('/login');
                
            }

        }else{
            return redirect('/login')->with('error','Status is inactive or wrong credentials');
        }
        
    }
}
