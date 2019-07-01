<?php

namespace App\Http\Middleware;

use Closure;

class RedirectIfMarketPlaceConnected
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
        if(auth()->user()->subaccount_code) {
            return redirect()->route('account.index')
                    ->withError('Your account is connected to Paystack already.');
        }
        return $next($request);
    }
}
