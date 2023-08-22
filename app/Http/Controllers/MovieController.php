<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index(Request $request){
        return view('admin.movie.movies');
    }

    public function create(){
        return view('admin.movie.movie-create');
    }

    public function store(Request $request){
        
    }
}
