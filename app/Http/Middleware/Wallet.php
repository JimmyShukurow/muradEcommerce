<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Wallet
{

    public function handle($code ,Request $request, Closure $next)
    {
        logger($code);
        $user = $request->user();
        if ($user->hasRole('wallet')) {
            return $next($request);
        }
    }
}
