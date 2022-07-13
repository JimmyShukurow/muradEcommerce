<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\Basket;
use App\Models\Favorite;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function login(LoginRequest $request)
    {
        
        $credentials = $request->getCredentials();

        if(!Auth::validate($credentials)):
            return redirect()->to('login')
                ->withErrors(trans('auth.failed'));
        endif;

        $user = Auth::getProvider()->retrieveByCredentials($credentials);

        Auth::login($user);

        return $this->authenticated($request, $user);

    }
    protected function authenticated(Request $request, $user) 
    {
        return redirect()->intended();
    }
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function register(Request $request)
    {
        $user = User::create([
            'name' => $request->firstname . ' ' . $request->lastname,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'address' => $request->address,
            'phone' => $request->phone
        ]);
        if (User::all()->count() == 1) {
            $user->assignRole('admin');
        } else {
            $user->assignRole('user');
        }
        Auth::login($user);
        $user['roles'] = $user->roles;
        return $user;
    }

    public function profile()
    {
        return Inertia::render('Mobile/Profile/Profile');
    }

    public function quick()
    {
        return true;
    }

    public function favorites(Request  $request)
    {
        $products = Favorite::with('product.previewImage')->where('user_id', $request->user()->id)->get();

        return Inertia::render('Mobile/Favorites/Favorites', ['products' => $products]);
    }

    public function basket(Request  $request)
    {
        if (Auth::user()) {
            $basket = Basket::where('user_id', $request->user()->id)->get();
            $basket->load('product.previewImage');
            return Inertia::render('Mobile/Basket/Basket', ['basket' => $basket]);
        }

        return Inertia::render('Mobile/Login/Login');
    }

    public function mobileLogin()
    {
        return Inertia::render('Mobile/Login/Login');
    }

    public function loginMobile(LoginRequest $request)
    {
        $credentials = $request->getCredentials();

        if(!Auth::validate($credentials)):
            return redirect()->to('login')
                ->withErrors(trans('auth.failed'));
        endif;

        $user = Auth::getProvider()->retrieveByCredentials($credentials);

        Auth::login($user);

        return Redirect::route('home');
    }

    public function edit(User $user)
    {
        $roles = Role::select('id', 'name')->get();
        $user->load('roles:id,name');
        return Inertia::render('Admin/Users/Form', ['user' => $user, 'roles' => $roles]);
    }
    public function updateRole(User $user, Request $request)
    {
        $user->syncRoles($request->role);


        return ['success' => 'Role was updated'];
    }
}
