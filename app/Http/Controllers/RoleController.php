<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class RoleController extends Controller
{
    public function create()
    {
        return Inertia::render('Admin/Roles/Form');
    }
}
