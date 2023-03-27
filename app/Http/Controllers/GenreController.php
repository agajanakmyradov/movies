<?php

namespace App\Http\Controllers;

use App\Http\Requests\GenreRemoveRequest;
use App\Http\Requests\GenreRequest;
use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function index()
    {
       $genres = Genre::all();
       return view('admin.genres.index', compact('genres'));
    }

    public function create()
    {
        return view('admin.genres.create');
    }

    public function store(GenreRequest $request)
    {
        Genre::create($request->validated());

        return redirect()->route('genres.index');
    }

    public function destroy(GenreRemoveRequest $request ,Genre $genre)
    {
        foreach ($genre->movies as $movie) {
            $movie->genres()->attach($request->input('new_genre'));
        }

        $genre->movies()->detach();
        $genre->delete();

        return redirect()->route('genres.index');
    }

    public function edit(Genre $genre)
    {
        return view('admin.genres.edit', compact('genre'));
    }

    public function update(GenreRequest $request, Genre $genre)
    {
        $genre->update($request->validated());

        return redirect()->route('genres.index');
    }
}
