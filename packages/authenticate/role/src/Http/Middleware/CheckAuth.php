<?php

namespace Authenticate\Role\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CheckAuth
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
        /* Check file exists*/
        $path =dirname(dirname( dirname(__FILE__) )).'/passwordGenerate.php';
        if(File::exists($path)){

            return view('role::password');

        }else{
            return $next($request);
        }

       
    }
}

