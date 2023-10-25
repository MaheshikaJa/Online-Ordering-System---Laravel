<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use Monolog\Processor\HostnameProcessor;

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



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


Route::get('/catagory',[AdminController::class,'catagory']);

Route::post('/add_catagory',[AdminController::class,'add_catagory']);

Route::get('/deletCat/{id}',[AdminController::class,'deletCat']);

Route::get('/view_product',[AdminController::class,'view_product']);

Route::post('/add_product',[AdminController::class,'add_product']);

Route::get('/show_product',[AdminController::class,'show_product']);

Route::get('/DeleteProduct/{id}',[AdminController::class,'DeleteProduct']);

Route::get('/UpdateProduct/{id}',[AdminController::class,'UpdateProduct']);

Route::post('/Edit_product/{id}',[AdminController::class,'Edit_product']);

Route::get('/send-email/{id}',[AdminController::class,'send_email']);

Route::get('/Print_pdf/{id}',[AdminController::class,'Print_pdf']);

Route::get('/order',[AdminController::class,'order']);

Route::get('/delivery/{id}',[AdminController::class,'delivery']);

Route::get('/search',[AdminController::class,'search']);


        /* ---------------Home Controller-------------------------     */


Route::get('/',[HomeController::class,'index']);           

Route::get('/redirect',[HomeController::class,'redirect']);           

Route::post('/add-Cart/{id}',[HomeController::class,'add_cart']);

Route::get('/show-cart',[HomeController::class,'show_cart']);

Route::get('/remove-cart/{id}',[HomeController::class,'remove_cart']);

Route::get('/order-save',[HomeController::class,'orderSave']);

Route::get('/product-search',[HomeController::class,'product_search']);

Route::get('viewAllProduct',[HomeController::class,'viewAllProduct']);

Route::get('/show_orde',[HomeController::class,'show_orde']);





