<?php

namespace App\Http\Middleware;

use Closure;

class IsAdmin
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
        if (auth()->check()) {

            if (auth()->user()->hasRole('administrator')) return $next($request);
                
            return redirect(route('admin.home.index'))
                    ->withWarning('Maaf anda tidak mempunyai hak akses ke halaman ini!');

        }
         
        return redirect(route('login'));
    }
}