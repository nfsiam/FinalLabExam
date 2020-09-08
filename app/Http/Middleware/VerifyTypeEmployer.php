<?php

namespace App\Http\Middleware;

use Closure;

class VerifyTypeEmployer
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
        if($request->session()->get('type') == 'employer')
        {
            return $next($request);
        }
        else
        {
            return redirect('/login');
        }
    }
}
