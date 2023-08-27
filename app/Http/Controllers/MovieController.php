<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class MovieController extends Controller
{
    public function index(Request $request){
        $movies =  Movie::get();

        return view('admin.movie.movies', ['data' => $movies]);
    }

    public function create(){
        return view('admin.movie.movie-create');
    }

    public function edit($id){
        $movie =  Movie::find($id);
        return view('admin.movie.movie-edit', ['data' => $movie]);
    }

    public function store(Request $request){
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

        $largeThumbnail = $request->large_thumbnail;
        $smallThumbnail = $request->small_thumbnail;

        $orginalNameLarge = Str::random(10).$largeThumbnail->getClientOriginalName();
        $orginalNameSmall = Str::random(10).$smallThumbnail->getClientOriginalName();

        $data['large_thumbnail'] =  $orginalNameLarge;
        $data['small_thumbnail'] = $orginalNameSmall;

        $largeThumbnail->storeAs('public/assets/images/thumbnails', $orginalNameLarge);
        $smallThumbnail->storeAs('public/assets/images/thumbnails', $orginalNameSmall);

        //Store to database 
        Movie::create($data);
        
        return redirect()->route('admin.movie')->with('success', 'Movie created');
    }

    public function update(Request $request, $id){
        $data = $request->except('_token');

        $request->validate([
            'title' => 'required|string',
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

        if($request->small_thumbnail){
            //save new image
            $smallThumbnail = $request->small_thumbnail;
            $orginalNameSmall = Str::random(10).$smallThumbnail->getClientOriginalName();
            $data['small_thumbnail'] = $orginalNameSmall;
            $smallThumbnail->storeAs('public/assets/images/thumbnails', $orginalNameSmall);

            //delete old image
            Storage::delete('public/assets/images/thumbnails/'.$movie->small_thumbnail);
        }

        if ($request->large_thumbnail) {
            #save new image
            $largeThumbnail = $request->large_thumbnail;
            $orginalNameLarge = Str::random(10).$largeThumbnail->getClientOriginalName();
            $data['large_thumbnail'] =  $orginalNameLarge;
            $largeThumbnail->storeAs('public/assets/images/thumbnails', $orginalNameLarge);

              //delete old image
              Storage::delete('public/assets/images/thumbnails/'.$movie->large_thumbnail);
        }

        $movie->update($data);

        return redirect()->route('admin.movie')->with('success', 'Movie updated');
    }

    public function destroy($id){
        Movie::find($id)->delete();

        return redirect()->route('admin.movie')->with('success', 'Movie deleted');
    }
}
