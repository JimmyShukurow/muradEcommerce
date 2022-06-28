<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function store(Request $request)
    {
        if ($request->hasFile('images')) {
            $images = $request->file('images');
            $imagename = $images->getClientOriginalName();
            $folder = uniqid(). '-' . now()->timestamp;
            $images->storeAs('images/temp'.$folder, $imagename);
        
            return $folder;
        }

        return '';
        
    }
}
