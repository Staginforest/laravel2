<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get ('/hello/{youname}', function(string $youname) {
    return "Hello, $youname";
});

Route::get ('/info/{about}', function(string $about) {
    return "Hello, $about";
});

Route::get ('/news/{newpost}', function(string $newpost) {
    return "Hello, $newpost";
});
