<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Products;
use App\Models\Slider;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    //home page
    public function index()
    {
        $product = Products::where('status', '0')->orderBy('id', 'desc')->paginate(30);
        $category_count = Categories::orderBy('id', 'desc')->get();
        $sliders = Slider::where('status', '0')->get();
        $trending = Products::where('trending', '1')->orderBy('id', 'desc')->get();
        $category = Categories::where('status', '0')->get();
        return view('frontend.home', compact('category_count', 'product', 'sliders', 'trending', 'category'));
    }
    //all trending product show
    public function trending()
    {
        $trending = Products::where('trending', '1')->orderBy('id', 'desc')->paginate(42);
        $category = Categories::where('status', '0')->get();
        return view('frontend.trending-product', compact('trending', 'category'));
    }


    //category wise all product show
    public function viewcate($slug){

        if(Categories::where('slug', $slug)->exists()){
            $category = Categories::where('status', '0')->get();
            $category_s = Categories::where('slug', $slug)->first();
            $products = Products::where('status', '0')->where('cate_id', $category_s->id)->get();
            return view('frontend.category-products',compact('category','category_s','products'));
        }else{
            return redirect('/')->with('msg','slug not found');
        }

    }

    //category products details
    public function produtdetails($cate_slug, $prod_slug){

        $category = Categories::where('status', '0')->get();
        $product_pro = Products::where('status', '0')->orderBy('id', 'asc')->paginate(30);

        if(Categories::where('slug', $cate_slug)->exists()){
            if(Products::where('slug',$prod_slug)){
                $product = Products::where('slug', $prod_slug)->first();
                return view('frontend.product-details',compact('product','category','product_pro'));
            }else{
                return redirect('/')->with('msg','slug not found');
            }
        }else{
            return redirect('/')->with('msg','slug not found');
        }
    }


}
