<?php

namespace App\Http\Controllers;
use App\Models\Movie;

class MovieController extends Controller
{
  public function getMovie()
     {
         $movie = Movie::all();
         return view('getMovie', ['movies' => $movie]);
     }
}