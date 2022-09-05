<?php

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

Route::get('/', function () {
    return view('home');
});

// index data
Route::get("/catName", "CategoriesController@index")->name("categories.index");
// store at database
Route::post("/catName/store", "CategoriesController@store")->name("categories.store");
// Create
Route::get("/catName/create", "CategoriesController@create")->name("categories.create");
// show
Route::get("/catName/show/{id}", "CategoriesController@show")->name("categories.show");
// Delete
Route::get("/catName/destroy/{id}", "CategoriesController@destroy")->name("categories.destroy");

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

// index data
Route::get("/imgs", "ImageController@index")->name("images.index");
// store at database
Route::post("/imgs/store", "ImageController@store")->name("images.store");
// Create
Route::get("/imgs/create", "ImageController@create")->name("images.create");
// Route::get("/imgs/create","CategoriesController@index");
// show
Route::get("/imgs/show/{id}", "ImageController@show")->name("images.show");
// Delete
Route::get("/imgs/destroy/{id}", "ImageController@destroy")->name("images.destroy");

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

// index data
Route::get("/user", "UserController@index")->name("user.index");
// store at database
Route::post("/user/store", "UserController@store")->name("user.store");
// Create
Route::get("/user/create", "UserController@create")->name("user.create");
// show
Route::get("/user/show/{id}", "UserController@show")->name("user.show");
// Delete
Route::get("/user/destroy/{id}", "UserController@destroy")->name("user.destroy");

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
