<?php

namespace App\Http\Middleware;

use Closure;
use Carbon\Carbon;
class DateMiddleWare
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
        $current_date = Carbon::now()->day;
        if($current_date >= 1 && $current_date <=5 ){
            return $next($request);
        }
        // return "pppp";
        abort(403);
    }
}
