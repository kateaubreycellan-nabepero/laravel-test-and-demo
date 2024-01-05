<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Models\User;
use App\Models\Country;
use App\Models\Photo;
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

// Route::get('/post/{id}', function($id) {

//     $str = "";
//     switch ($id) {
//         case 1:
//             $str = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.";
//             break;
//         case 2:
//             $str = "Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.";
//             break;
//         default:
//             $str = "This is post number $id";
//             break;
//     }

//     return $str;

// });

// Route::get('admin/post/example', array('as' => 'admin.home', function() {

//     $url = route("admin.home");

//     return "Current URL: <a href=\"$url\">$url</a>";

// }));

// Non-resource GET route
// Calls PostController->index();
// Route::get('/post/{id}', '\App\Http\Controllers\PostController@index');

// Resource route
// Calls the PostController class
// Route::resource('posts', '\App\Http\Controllers\PostController');

Route::get('contact', 'App\Http\Controllers\PostController@contact');

// Route::get('posts/{id}', 'App\Http\Controllers\PostController@show_post');
Route::get('posts/{id}/{name}/{password}', 'App\Http\Controllers\PostController@show_post');


/**
 * Raw SQL Queries routes
 */

Route::get('/insert', function() {

    DB::insert('INSERT INTO posts (title, content) VALUES (?, ?);', ['PHP with laravel', 'PHP laravel is the best thing that has happened']);

});

Route::get('/read/{id}', function($id) {

    $result = DB::select('SELECT * FROM posts WHERE id = ?', [$id]);

    // return $result;

    return $result[0]->title;

    // foreach ($result as $post) {
    //     $post;
    // }

    // return var_dump($result);

});

Route::get('/update', function() {

    $result = DB::update('UPDATE posts SET title = ? WHERE id = ?', ['Updated title', 1]);

    return $result ? "true" : "false";
});

Route::get('/delete/{id}', function($id) {

    $result = DB::delete('DELETE FROM posts WHERE id = ?', [$id]);

    return $result ? "true" : "false";
});


/**
 * Eloquent queries
 */


Route::get('/orm-read/{id}', function($id) {

    $result = Post::find($id);

    return $result ? $result : array();

});

Route::get('/orm-getall', function() {

    $result = Post::all();

    return $result ? $result : array();

});

Route::get('/orm-readwhere/{id}', function($id) {

    $result = Post::where('id', $id)->orderBy('id', 'desc')->take(1)->get();

    // $result = Post::where('is_admin', $id)->orderBy('id', 'asc')->take(10)->get();

    return $result;

});

Route::get('/orm-findmore/{id}', function($id) {

    // $result = Post::findOrFail($id);
    $result = Post::where('id', '>=', 1)->firstOrFail();
    return $result;

});

Route::get('/orm-insert', function() {

    // $result = Post::findOrFail($id);
    $post = new Post;
    // $post = Post::find(2);
    $post->title = "New ORM insert query";
    $post->content = "Some data here via ORM query";
    return $post->saveOrFail() ? "true" : "false";

});

Route::get('/orm-insert2', function() {

    // $result = Post::findOrFail($id);
    // $post = new Post;
    $post = Post::find(5);
    $post->title = "yes another method";
    $post->content = "This data here got updated via ORM query";
    return $post->saveOrFail() ? "true" : "false";

});

Route::get('/orm-create', function() {

    $result = Post::create(['title'=>"creation method", 'content'=>"wow new data got inserted"]);
    return $result ? "true" : "false";

});

Route::get('/orm-update', function() {

    $result = Post::where('id', 9)->where('is_admin', 0)->update(['title'=>'New PHP title something', 'content'=>"This is laravel"]);
    return $result ? "true" : "false";

});

Route::get('/orm-delete/{id}', function($id) {

    $result = Post::find($id);
    $result->delete();
    return $result ? "true" : "false";

});

Route::get('/orm-delete2', function() {

    $result = Post::destroy(30); // Array or int
    // Post::where('is_admin', 0)->delete(); // Deletes all is_admin==0
    return $result ? "true" : "false";

});

Route::get('/orm-softdelete/{id}', function($id) {

    $result = Post::find($id)->delete();
    return $result ? "true" : "false";

});

Route::get('/orm-getsoftdelete', function() {

    // $result = Post::withTrashed()->where('is_admin', 0)->get();
    $result = Post::onlyTrashed()->where('is_admin', 0)->get();
    return $result;

});

Route::get('/orm-restore', function() {

    $result = Post::withTrashed()->where('is_admin', 0)->restore();
    return $result;

});

Route::get('/orm-forcedelete', function() {

    $result = Post::onlyTrashed()->where('is_admin', 0)->forceDelete();
    return $result ? "true" : "false";

});

/**
 * Eloquent Relationships
 */

 // One-to-one
Route::get('/user/{id}/post', function($id) {

    return User::find($id)->post->title;

});

// Inverse relation
Route::get('/post/{id}/user', function($id) {

    return Post::find($id)->user->name;

});


// One-to-many relationship
Route::get('/user/{id}', function($id) {

    $user = User::find($id);

    return $user->posts;
    // foreach ($user->posts as $post) {
    //     echo $post->title.'<br>';
    // }

});

// Many-to-many relationship
Route::get('/user/{id}/role', function($id) {

    $user = User::find($id)->roles()->orderBy('id', 'desc')-get();

    return $user;

    // foreach ($user->roles as $role) {
    //     return $role->name;
    // }

});

// Accessing the intermediate table (pivot table)
Route::get('/user/pivot/{id}', function($id) {

    $user = User::find($id);

    foreach ($user->roles as $role)
    {
        return $role->pivot->created_at;
    }
});

// Has-many-through relationship
Route::get('/user/country/{id}', function($id) {

    $country = Country::find($id);

    foreach ($country->posts as $post)
    {
        return $post->title;
    }

});

// Polymorphic relationship
Route::get('/user/photo/{id}', function($id) {

    $user = User::find($id);

    foreach ($user->photos as $photo)
    {
        // return $photo->path;
        echo $photo->path.'<br>';
    }

});

Route::get('/photo/{id}/post', function($id) {

    $photo = Photo::findOrFail($id);

    return $photo->imageable;

});

// Polymorphic many-to-many relationship
Route::get('/post/tag/{id}', function($id) {

    $post  = Post::find($id);

    foreach ($post->tags as $tag)
    {
        return $tag;
    }


});
