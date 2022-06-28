<?php

namespace App\Http\Controllers;

use App\Models\TemporaryFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UploadController extends Controller
{
    public function store(Request $request)
    {
        if ($request->hasFile('images')) {
            $images = $request->file('images');
            $imagename = $images->getClientOriginalName();
            $folder = uniqid().'-'. now()->timestamp;
            $images->storeAs('public/images/temp/'.$folder, $imagename);

            TemporaryFile::create([
                'folder' => $folder,
                'filename' => $imagename
            ]);
        
            return $folder;
        }

        return '';
        
    }

    public function delete($folder)
    {
        rmdir('public/images/temp/'.$folder);
        return 'ok';
    }
}
