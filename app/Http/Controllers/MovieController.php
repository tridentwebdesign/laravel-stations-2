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

    public function getMovie(Request $request)
    {
        $query = Movie::query();

        // 検索キーワードがある場合
        if ($request->filled('keyword')) {
            $keyword = $request->input('keyword');
            $query->where(function($q) use ($keyword) {
                $q->where('title', 'like', '%' . $keyword . '%')
                ->orWhere('description', 'like', '%' . $keyword . '%');
            });
        }

        // 公開状態のフィルター
        if ($request->filled('is_showing')) {
            $query->where('is_showing', $request->input('is_showing'));
        }

        // ページネーション
        $movies = $query->paginate(20);
        return view('getMovie', ['movies' => $movies, 'keyword' => $request->input('keyword'), 'is_showing' => $request->input('is_showing')]);
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

    public function destroyMovie($id)
    {
        $movie = Movie::findOrFail($id);
        $movie->delete();

        return redirect()->route('admin.movies.index')->with('success', 'Movie deleted successfully.');
    }
}