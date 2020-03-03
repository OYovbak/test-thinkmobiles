<?php

namespace App\Http\Controllers;


use App\Category;
use App\Film;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $data['categories'] = Category::orderBy('id','desc')->paginate(10);

        return view('category.list',$data);
    }

    public function showCat($id){
        $category = Category::find($id);
        $film = Film::all();
        return view('films.cat', ['category' => $category], ['films' => $film]);

    }

}
