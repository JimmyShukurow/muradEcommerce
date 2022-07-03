<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Redirect;

class SettingsController extends Controller
{
    public function store(Request $request)
    {
        config(['app.url'=>'jimi']);
        return Redirect::route('admin.products')->with('success', 'Settings was updated');
    }

    private function setEnv($key, $value)
    {
        file_put_contents(app()->environmentFilePath(), str_replace(
            $key . '=' . env($value),
            $key . '=' . $value,
            file_get_contents(app()->environmentFilePath())
        ));
    }
}
