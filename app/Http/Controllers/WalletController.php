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
        $url = 'http://www.nar-jan.com/mobile/wallet/purchase/'.$request->user()->id.Str::random(3).'-'.Carbon::now()->timestamp;
        return Inertia::render('Mobile/Wallet/Wallet', ['user' => $request->user()->id, 'url' => $url]);
    }

    public function purchase($code)
    {
        // $array = explode('-', $code);
        // $id = substr($array[0], 0, strlen($array[0])-3);
        // $user = User::find($id);
        return Inertia::render('Mobile/Wallet/Wallet', ['client' => 'jimi', 'paycheckopen' => true ]);
    }
}
