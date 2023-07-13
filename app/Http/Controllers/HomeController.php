<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Products;
use Illuminate\Http\Request;

class HomeController extends Controller
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
        $products_count = Products::all()->count();
        $category_count = Categories::all()->count();
        $trending_count = Products::where('trending','1')->count();
        return view('backend.pages.dashboard',compact('category_count','products_count','trending_count'));
    }
}
