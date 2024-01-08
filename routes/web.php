<?php

use Illuminate\Support\Facades\Route;
use Carbon\Carbon;
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

Route::get('/dates', function() {
    $date = new DateTime();

    echo $date->format('m-d-Y');
    echo '<br>';
    echo Carbon::now()->addDays(10)->diffForHumans();
    echo '<br>';
    echo Carbon::now()->subMonths(5)->diffForHumans();
    echo '<br>';
    echo Carbon::now()->yesterday();

});

Route::get('/getname/{id}', function($id) {

    $user = User::findOrFail($id);

    return $user->name;

});

Route::get('/setname/{id}/{name}', function($id, $name) {

    $user = User::findOrFail($id);

    $user->name = $name;
    $user->save();

});