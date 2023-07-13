<?php

use App\Http\Controllers\backend\AdminController;
use App\Http\Controllers\backend\CategoryController;
use App\Http\Controllers\backend\ProductController;
use App\Http\Controllers\backend\SliderController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[FrontendController::class,'index'])->name('frontend.home');
Route::get('trending',[FrontendController::class,'trending'])->name('frontend.trending');
Route::get('categories/{slug}',[FrontendController::class,'viewcate'])->name('frontend.category');
Route::get('categories/{cate_slug}/{prod_slug}',[FrontendController::class,'produtdetails'])->name('frontend.product.details');


Auth::routes();

Route::get('admin/login',[AdminController::class,'login'])->name('admin.login');

Route::group(['prefix' => 'admin', 'middleware' => 'isAdmin'], function(){
    Route::get('/', [HomeController::class, 'index'])->name('admin.home');
    Route::post('login',[AdminController::class,'adminLogin'])->name('admin.login');
    Route::get('logout',[AdminController::class,'submitLogout'])->name('admin.logout');
    Route::get('reset',[AdminController::class,'forgetPass'])->name('admin.reset');
    Route::get('signup',[AdminController::class,'signup'])->name('admin.signup');

    Route::group(['prefix'=> 'category'], function(){
        Route::get('/',[CategoryController::class,'Index'])->name('admin.category');
        Route::post('store',[CategoryController::class,'store'])->name('admin.category.store');
        Route::put('update/{id}',[CategoryController::class,'update'])->name('admin.category.update');
        Route::post('delete/{id}',[CategoryController::class,'destroy'])->name('admin.category.destroy');
    });

    Route::group(['prefix'=> 'product'], function(){
        Route::get('/',[ProductController::class,'index'])->name('admin.all.product');
        Route::get('create',[ProductController::class,'create'])->name('admin.product.store');
        Route::post('create',[ProductController::class,'store'])->name('admin.product.store');
        Route::get('edit/{id}',[ProductController::class,'edit'])->name('admin.product.edit');
        Route::put('update/{id}',[ProductController::class,'update'])->name('admin.product.update');
        Route::post('delete/{id}',[ProductController::class,'destroy'])->name('admin.product.destroy');
    });

    Route::group(['prefix'=> 'slider'], function(){
        Route::get('/',[SliderController::class,'index'])->name('admin.all.slider');
        Route::post('store',[SliderController::class,'store'])->name('admin.slider.store');
        Route::put('update/{id}',[SliderController::class,'update'])->name('admin.slider.update');
        Route::post('delete/{id}',[SliderController::class,'destroy'])->name('admin.slider.destroy');
    });
});
