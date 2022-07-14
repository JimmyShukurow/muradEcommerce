<?php

namespace App\Http\Controllers;

use App\Models\Model;
use App\Models\Product;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ModelController extends Controller
{
    public function create()
    {
        return Inertia::render('Admin/Models/Form');
    }

    public function store(Request $request)
    {
        Model::create(['name' => $request->name]);

        return Redirect::to('/models')->withSuccess('Model was created');
    }

    public function edit(Model $model)
    {
        return Inertia::render('Admin/Models/Form', ['model' => $model, 'edit' => true]);
    }

    public function update(Model $model, Request $request)
    {
        $model->update(['name' => $request->name]);

        return Redirect::to('/models')->withStatusCode(303)->withSuccess('Model was updated');
    }

    public function destroy(Model $model)
    {
        if (Product::where('model_id', $model->id)->first()) {
            return Redirect::back()->setStatusCode(303)->withErrors(['error' => 'There is a product with this Model']);
        }

        $model->delete();

        return Redirect::to('/models')->setStatusCode(303)->withSuccess('Model was Deleted');
    }
}
