<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class FavoriteController extends Controller
{
    public function delete(Favorite $favorite)
    {
        $favorite->delete();

        return Redirect::back()->setStatusCode(303)->withSuccess('Product was removed from Favorites');
    }
}
