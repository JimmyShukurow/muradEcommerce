<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Str;

class WalletController extends Controller
{
    public function myMallet(Request $request)
    {
        $url = 'http://www.nar-jan.com/'.$request->user()->id.Str::random(3).Carbon::now()->timestamp;
        return Inertia::render('Mobile/Wallet/Wallet', ['user' => $request->user()->id, 'url' => $url]);
    }

    public function purchase(Request $request)
    {
        return Inertia::render('Mobile/Wallet/Purchase', ['user'=>User::first()]);
    }
}
