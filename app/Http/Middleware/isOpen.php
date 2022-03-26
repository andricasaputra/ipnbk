<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Jadwal;

class isOpen
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
        $jadwal = Jadwal::active()->first();

        if (!is_null($jadwal->end_date ?? NULL)) {

            $expired = ($jadwal->end_date > now());

            if (auth()->check()) {
                if (!$jadwal && $expired) {
                    return redirect(route('survey.closed'));
                }
            }
        }

        return $next($request);
    }
}
