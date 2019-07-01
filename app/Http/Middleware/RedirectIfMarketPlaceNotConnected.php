<?php

namespace App\Http\Middleware;

use Closure;

class RedirectIfMarketPlaceNotConnected
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
        if(!auth()->user()->subaccount_code) {
            return redirect()->route('account.connect')
                    ->withError('Please connect your account to Paystack.');
        }
        return $next($request);
    }
}
