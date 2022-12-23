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
    /* echo "<h1>Hola mundo </h1>"; */
    return view('welcome');
});

Route::get('/contacto', function () {
    
    return view('contacto');
})->name('contacto');

Route::get('/test', function () {
    $msj = "Mensaje desde el servidor";
    $data = ['msj2' => $msj, 'edad' => 17];
    return view('test',$data);
});
