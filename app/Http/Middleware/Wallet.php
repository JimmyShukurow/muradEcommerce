<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Wallet
{

    public function handle(Request $request, Closure $next)
    {
        $user = $request->user();
        if ($user->hasRole('wallet')) {
            return $next($request);
        }
    }
}
