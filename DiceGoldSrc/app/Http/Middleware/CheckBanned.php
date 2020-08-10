<?php


namespace App\Http\Middleware;


use Closure;

class CheckBanned
{
    public function handle($request, Closure $next)
    {
        if (auth()->check() && auth()->user()->banned_until && now()->lessThan(auth()->user()->banned_until)) {
            $banned_days = now()->diffInSeconds(auth()->user()->banned_until);
            auth()->logout();

            if ($banned_days > 3600) {
                $message = 'Your account has been suspended. Please contact administrator.';
            } else {
                $message = 'Your account has been suspended for '.$banned_days.' seconds. Please contact administrator.';
            }

            return redirect()->route('login')->withMessage($message);
        }

        return $next($request);
    }
}