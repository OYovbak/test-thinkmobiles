<?php

namespace App\Http\Controllers;
use App\User;
use App\Film;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $film = Film::all();

        $favorite = DB::table('user_favorite_film')->get();
        return view('films.favorite', ['films' => $film], ['favorites' => $favorite]);
    }
}
