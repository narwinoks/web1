<?php

namespace App\Http\Middleware;

use App\Models\Profile;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Log;

class ProfileMiddleware
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
        $profile = Profile::where('statusenable', true)->first();
        $profileSession = $request->session()->get('profile');

        if ($profile && !$profileSession) {
            $request->session()->put('profile', $profile->toJson());
            Log::info("Update Profile: " . json_encode($profile, JSON_PRETTY_PRINT));
        }

        return $next($request);
    }
}
