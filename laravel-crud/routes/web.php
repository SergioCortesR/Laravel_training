<?php

use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\PostController;
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
    return view('welcome');
});

Route::get('/test/{id?}/{name?}', function ($id = 'sin valor', $name = 'sin nombre') {
    echo 'id: ', $id, ' nombre: ', $name;
});


Route::controller(PostController::class)->group(function () {

    Route::get('post','index')->name("post.index");
    Route::get('post/{post}','show')->name("post.show");
    Route::get('post/create','create')->name("post.create");
    Route::get('post/{post}/edit','edit')->name("post.edit");

    Route::post('post','store')->name("post.store");
    Route::put('post/{post}','update')->name("post.update");
    Route::delete('post/{post}','delete')->name("post.delete");
});

//Route::get('/category/{id}', [CategoryController::class,'new']);

//Route::resource('post', PostController::class);
Route::resource('category', CategoryController::class);


/* Route::get('post',[PostController::class,'index']);
Route::get('post/{post}',[PostController::class,'index']);
Route::get('post/create',[PostController::class,'index']);
Route::get('post/{post}/edit',[PostController::class,'index']);

Route::post('post',[PostController::class,'store']);
Route::put('post/{post}/edit',[PostController::class,'update']);
Route::get('post/{post}',[PostController::class,'delete']); */
