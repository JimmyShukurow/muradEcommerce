<?php

namespace App\Http\Controllers;

use App\Models\Slide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class SlideController extends Controller
{
    public function index()
    {
        //
    }

  
    public function store($type, Request $request)
    {
        $slide = Slide::create(['slide_name'=> $type, 'image_order'=>1]);
        $slide->addMedia($request->slide)->toMediaCollection();
        return 'Image was saved';
    }

    public function show($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }

 
    public function destroy(Slide $slide)
    {
        $slide->delete();

        return Redirect::back()->setStatusCode(303)->withSuccess('Slide was deleted');
    }
}
