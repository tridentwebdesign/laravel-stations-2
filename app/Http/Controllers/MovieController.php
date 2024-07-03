<?php

namespace App\Http\Controllers;
use App\Models\Movie;
use App\Http\Requests\CreateMovieRequest;

class MovieController extends Controller
{
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
}