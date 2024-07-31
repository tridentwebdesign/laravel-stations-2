<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Genre;
use App\Models\Schedule;
use App\Http\Requests\CreateMovieRequest;
use App\Http\Requests\UpdateMovieRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MovieController extends Controller
{   
    public function index()
    {
        $movies = Movie::with('genre')->paginate(20);
        return view('admin.movies.index', compact('movies'));
    }

    public function getMovie(Request $request)
    {
        $query = Movie::with('genre');

        if ($request->filled('keyword')) {
            $keyword = $request->input('keyword');
            $query->where(function($q) use ($keyword) {
                $q->where('title', 'like', '%' . $keyword . '%')
                   ->orWhere('description', 'like', '%' . $keyword . '%');
            });
        }

        if ($request->filled('is_showing')) {
            $query->where('is_showing', $request->input('is_showing'));
        }

        $movies = $query->paginate(20);
        return view('getMovie', ['movies' => $movies, 'keyword' => $request->input('keyword'), 'is_showing' => $request->input('is_showing')]);
    }

    public function createMovie()
    {
        return view('createMovie');
    }

    public function storeMovie(CreateMovieRequest $request)
    {
        try {
            DB::transaction(function () use ($request) {
                $genre = Genre::firstOrCreate(['name' => $request->input('genre')]);
                Movie::create($request->validated() + ['genre_id' => $genre->id]);
            });

            return redirect()->route('admin.movies.create')->with('success', 'Movie created successfully.');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json($e->errors(), 500);
        } catch (\Exception $e) {
            return redirect()->route('admin.movies.create')->withErrors('Failed to create movie. Please try again.');
        }
    }


    public function editMovie($id)
    {
        $movie = Movie::with('genre')->findOrFail($id);
        return view('editMovie', compact('movie'));
    }

    public function updateMovie(UpdateMovieRequest $request, $id)
    {
        try {
            DB::transaction(function () use ($request, $id) {
                $genre = Genre::firstOrCreate(['name' => $request->input('genre')]);
                $movie = Movie::findOrFail($id);
                $movie->update($request->validated() + ['genre_id' => $genre->id]);
            });

            return redirect()->route('admin.movies.edit', $id)->with('success', 'Movie updated successfully.');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json($e->errors(), 500);
        } catch (\Exception $e) {
            return redirect()->route('admin.movies.edit', $id)->withErrors('Failed to update movie. Please try again.');
        }
    }

    // 映画詳細ページを表示するメソッド
    public function show($id)
    {
        $movie = Movie::findOrFail($id);
        return view('admin.movies.show', compact('movie'));
    }

    // 全映画のスケジュール一覧ページを表示するメソッド
    public function indexSchedules()
    {
        $movies = Movie::with('schedules')->get();
        return view('admin.schedules.index', compact('movies'));
    }

    // 特定の映画のスケジュールページを表示するメソッド
    public function schedules($id)
    {
        $movie = Movie::findOrFail($id);
        $schedules = Schedule::where('movie_id', $id)->orderBy('start_time')->get();
        return view('admin.schedules.show', compact('movie', 'schedules'));
    }
                

    public function destroyMovie($id)
    {
        DB::transaction(function () use ($id) {
            $movie = Movie::findOrFail($id);
            $movie->delete();
        });

        return redirect()->route('admin.movies.index')->with('success', 'Movie deleted successfully.');
    }
}