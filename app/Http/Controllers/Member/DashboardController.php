<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        return view('member.index');
    }

    public function showMovies(){
        $movies = Movie::orderBy('featured', 'DESC')
                        ->orderBy('created_at', 'DESC')
                        ->get();

        return view('member.movie-list', ['data' => $movies]);
    }
}
