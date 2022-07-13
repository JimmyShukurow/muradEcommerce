<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function create()
    {
        return Inertia::render('Admin/Roles/Form');
    }

    public function edit(Role $role)
    {
        return Inertia::render('Admin/Roles/Form', [ 'role' => $role, 'edit' => true]);
    }

    public function store(Request $request)
    {
        Role::create([ 'name' => $request->name]);

        return Redirect::to('/roles')->withSuccess('Role was created');
    }

    public function destroy(Role $role)
    {
        if(User::role($role->name)->first()){
            return Redirect::back()->setStatusCode(303)->withErrors(['error' =>'Role has Users']);
        }

        $role->delete();

        return Redirect::to('/roles')->setStatusCode(303)->withSuccess('Role was deleted');
    }
}
