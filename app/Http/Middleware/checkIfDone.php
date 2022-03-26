<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Jadwal;
use App\Models\Result;

class checkIfDone
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
        $user_id = auth()->user()->id;
        $jadwal = Jadwal::active()->first();

        
        if (!is_null($user_id) && !is_null($jadwal)) {

            $result = Result::where('responden_id', $user_id)->first();
            $is_done = Result::where('ipnbk_id', $jadwal->id)->first();

            if (!is_null($result) && !is_null($is_done)) {
               return redirect(route('survey.done'));
            }
        }

        return $next($request);
    }
}
