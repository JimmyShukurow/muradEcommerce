<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Wallet;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Illuminate\Support\Str;

class WalletController extends Controller
{
    public function myMallet(Request $request)
    {
        $url = 'http://www.nar-jan.com/mobile/wallet/purchase/'.$request->user()->id.Str::random(3).'-'.Carbon::now()->timestamp;
        $user = $request->user();
        $user->load('wallet');
        return Inertia::render('Mobile/Wallet/Wallet', ['url' => $url, 'user' => $user]);
    }

    public function purchase($code)
    {
        $array = explode('-', $code);
        $id = substr($array[0], 0, strlen($array[0])-3);
        $user = User::with('wallet')->where('id', $id)->first();
        return Inertia::render('Mobile/Wallet/Wallet', ['client' => $user, 'paycheckopen' => true ]);
    }

    public function deposit(Request $request)
    {
        $wallet = Wallet::where('user_id', $request->user_id)->first();

        $old_money = $wallet->quantity;

        $wallet->update(['quantity' => $old_money + $request->new_quantity]);

        return Redirect::back()->withSuccess('Wallet updated');
    }
}
