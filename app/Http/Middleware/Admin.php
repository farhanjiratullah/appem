<?php

namespace App\Http\Middleware;

use Closure;

class Admin
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
        if( !Auth()->guard('admin')->check() ) {
            return redirect()->to('/admin/login');
        }

        if( !Auth()->guard('admin')->user()->level == 'admin' ) {
            return redirect()->to('/admin/login');
        }

        return $next($request);
    }
}
