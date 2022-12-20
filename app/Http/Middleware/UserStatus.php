<?php

namespace App\Http\Middleware;

use App\Models\User;
use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class UserStatus
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
        if (Auth::check()) {
            $user=User::find(Auth::user()->id);
            $user->is_online = 1;
            $user->update();

            // $expiresAt = now()->addMinutes(2); /* keep online for 2 min */
            // Cache::put('user-is-online-' . Auth::user()->id, $expiresAt);
            // User::where('id', Auth::user()->id)->update(['updated_at' => now()]);

        }
        return $next($request);
    }
}
