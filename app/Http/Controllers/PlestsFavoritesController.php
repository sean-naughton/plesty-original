<?php

namespace App\Http\Controllers;

use App\Plest;
use Illuminate\Http\Request;

use App\Http\Requests;
use Response;

class PlestsFavoritesController extends Controller
{
    public function store(Plest $plest, Request $request)
    {
        $plest->favorite();

        return $plest;
    }

    public function destroy(Plest $plest, Request $request)
    {
        $plest->unfavorite();

        return $plest;
    }
}
