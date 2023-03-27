<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\MovieResource;
use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index()
    {
        return MovieResource::collection(Movie::with('genres')->paginate(20));
    }

    public function show($id)
    {
        return new MovieResource(Movie::where('id', $id)->with('genres')->get());
    }
}
