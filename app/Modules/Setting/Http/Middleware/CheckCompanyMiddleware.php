<?php

namespace App\Modules\Setting\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Modules\Setting\Entities\Setting;

class CheckCompanyMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $setting = Setting::find(1);
        if (!$setting) {
            alertify('Please Setup Your Company Details Before Using The Feature.')->error();
            return redirect()->route('setting.create');
        }
        return $next($request);
    }
}
