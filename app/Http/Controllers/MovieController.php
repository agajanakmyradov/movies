<?php

namespace App\Http\Controllers;

use App\Actions\Movie\StorePoster;
use App\Http\Requests\MovieStoreRequest;
use App\Models\Genre;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MovieController extends Controller
{
    public function index()
    {
        $movies = Movie::all();

        return view('admin.movies.index', compact('movies'));
    }

    public function create()
    {
        $genres = Genre::all();

        return view('admin.movies.create', compact('genres'));
    }

    public function store(MovieStoreRequest $request, StorePoster $poster)
    {
        $data = $request->validated();
        $data['poster_path'] = $poster->handle($data['poster']);
        $movie = Movie::create($data);
        $movie->genres()->attach(array_values($data['genres']));

        return redirect()->route('movies.index');
    }

    public function destroy(Movie $movie)
    {
        Storage::delete('/public/' . $movie->poster_path);
        $movie->genres()->detach();
        $movie-> delete();

        return redirect()->route('movies.index');
    }

    public function edit(Movie $movie)
    {
        $genres = Genre::all();

        return view('admin.movies.edit', compact('movie', 'genres'));
    }

    public function update(MovieStoreRequest $request, StorePoster $poster, Movie $movie)
    {
        $data = $request->validated();

        if ($data['poster'] !== null) {
            Storage::delete('/public/' . $movie->poster_path);
            $data['poster_path'] = $poster->handle($data['poster']);
        }

        $movie->update($data);
        $movie->genres()->detach();
        $movie->genres()->attach(array_values($data['genres']));

        return redirect()->route('movies.index');
    }
}
