<?php

namespace App\Http\Controllers;
use App\Models\Movie;
use App\Http\Requests\CreateMovieRequest;
use App\Http\Requests\UpdateMovieRequest;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index()
    {
        $movies = Movie::all();
        return view('admin.movies.index', ['movies' => $movies]);
    }

    public function getMovie()
    {
        $movie = Movie::all();
        return view('getMovie', ['movies' => $movie]);
    }

    public function createMovie()
    {
        return view('createMovie');
    }

    public function storeMovie(CreateMovieRequest $request)
    {
        // マスアサインメントを使用してデータベースに保存する
        $movie = Movie::create([
            'title' => $request->title,
            'image_url' => $request->image_url,
            'published_year' => $request->published_year,
            'is_showing' => (bool) $request->is_showing,
            'description' => $request->description,
        ]);

        return redirect()->route('admin.movies.create')->with('success', 'Movie created successfully.');
    }

    public function editMovie($id)
    {
        $movie = Movie::findOrFail($id);
        return view('editMovie', compact('movie'));
    }

    public function updateMovie(UpdateMovieRequest $request, $id)
    {
        $movie = Movie::findOrFail($id);
        $movie->update($request->validated());

        return redirect()->route('admin.movies.edit', $movie->id)->with('success', 'Movie updated successfully.');
    }
}