<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Models\User;
use App\Models\Country;
use App\Models\Photo;
use App\Models\Tag;
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

Route::get('/about', function() {
    return "<h1>Hi!</h1>";
});

Route::get('/contact', function() {
    return "Some contact page here.";
});

Route::resource('/posts', 'App\Http\Controllers\PostController');