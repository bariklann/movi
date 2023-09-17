<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Movie;
use Illuminate\Support\Facades\Storage;

class MoviesController extends Controller
{
    public function index()
    {
        $movies = Movie::all(); // Ambil semua data film dari database
        return view('admin.movies', compact('movies'));
    }

    public function create()
    {
        return view('admin.movies-create');
    }

    public function store(Request $request)
    {
        $data = $request->except('_token');

        $request->validate([
            'title' => 'required|string',
            'small_thumbnail' => 'required|image|mimes:jpeg,jpg,png',
            'large_thumbnail' => 'required|image|mimes:jpeg,jpg,png',
            'trailer' => 'required|url',
            'movie' => 'required|url',
            'casts' => 'required|string',
            'categories' => 'required|string',
            'release_date' => 'required|string',
            'about' => 'required|string',
            'short_about' => 'required|string',
            'duration' => 'required|string',
            'featured' => 'required'
        ]);

        $smallThumbnail = $request->small_thumbnail;
        $largeThumbnail = $request->large_thumbnail;

        $originalSmallThumbnailName = Str::random(10) . $smallThumbnail->getClientOriginalName();
        $originalLargeThumbnailName = Str::random(10) . $largeThumbnail->getClientOriginalName();

        $smallThumbnail->storeAs('public/thumbnail', $originalSmallThumbnailName);
        $largeThumbnail->storeAs('public/thumbnail', $originalLargeThumbnailName);

        $data['small_thumbnail'] = $originalSmallThumbnailName;
        $data['large_thumbnail'] = $originalLargeThumbnailName;

        Movie::create($data);
        return redirect()->route('admin.movie')->with('success', 'Movie Success Created');
    }

    public function edit($id)
    {
        $movie = Movie::find($id); // Mengambil data film berdasarkan ID

        return view('admin.movie-edit', ['movie' => $movie]);
    }

    public function update(Request $request, $id)
    {
        $data = $request->except('_token');

        $request->validate([
            'title' => 'required|string',
            'small_thumbnail' => 'required|image|mimes:jpeg,jpg,png',
            'large_thumbnail' => 'required|image|mimes:jpeg,jpg,png',
            'trailer' => 'required|url',
            'movie' => 'required|url',
            'casts' => 'required|string',
            'categories' => 'required|string',
            'release_date' => 'required|string',
            'about' => 'required|string',
            'short_about' => 'required|string',
            'duration' => 'required|string',
            'featured' => 'required'
        ]);

        $movie = Movie::find($id);

        if ($request->small_thumbnail) {
            $smallThumbnail = $request->small_thumbnail;
            $originalSmallThumbnailName = Str::random(10) . $smallThumbnail->getClientOriginalName();
            $smallThumbnail->storeAs('public/thumbnail/', $originalSmallThumbnailName);
            $data['small_thumbnail'] = $originalSmallThumbnailName;
            //Delete the old thumbnail
            Storage::delete('public/thumbnail/' . $movie->small_thumbnail);
        }

        if ($request->large_thumbnail) {
            $largeThumbnail = $request->large_thumbnail;
            $originalLargeThumbnailName = Str::random(10) . $largeThumbnail->getClientOriginalName();
            $largeThumbnail->storeAs('public/thumbnail/', $originalLargeThumbnailName);
            $data['large_thumbnail'] = $originalLargeThumbnailName;

            Storage::delete('public/thumbnail/' . $movie->large_thumbnail);
        }
        $movie->update($data);

        return redirect()->route('admin.movie')->with('Success', 'Movie Di edit');
    }

    public function destroy($id)
    {
        Movie::find($id)->delete();
        return redirect()->route('admin.movie')->with('Success', 'Movie di delete');
    }

    // public function destroy($id)
    // {
    //     $movie = Movie::find($id);

    //     Storage::delete('public/thumbnail/' . $movie->small_thumbnail);
    //     Storage::delete('public/thumbnail/' . $movie->large_thumbnail);

    //     $movie->delete();

    //     return redirect()->route('admin.movie')->with('Success', 'Movie di delete beserta thumbnail');
    // }
}
