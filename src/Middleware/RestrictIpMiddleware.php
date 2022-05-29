<?php

namespace App\Http\Middleware;

use App\Models\RestrictedIps;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class RestrictIpMiddleware
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
        // $restricted_ip = "Comma seperated IP address which is to be restricted";
        $ipsDeny = array_values(RestrictedIps::pluck("ip_address")->toArray()); //explode(',',preg_replace('/\s+/', '', $restricted_ip));
        if (count($ipsDeny)) {
            if (in_array(request()->ip(), $ipsDeny)) {
                Log::warning("Unauthorized access, IP address was => " . request()->ip);
                return abort(403);
            }
        }
        return $next($request);
    }
}
