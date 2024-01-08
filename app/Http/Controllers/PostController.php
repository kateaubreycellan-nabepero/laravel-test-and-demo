<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // return "create() method called";
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'content' => 'required'
        ]);

        $status = Post::create($request->all());
        // return $status;
        return redirect('/posts');

    }

    /**
     * Display the specified resource.
     */

    public function show(string $id)
    {
        // return "Show post id: $id";
        $post = Post::findOrFail($id);
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::findOrFail($id);
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $post = Post::findOrFail($id);
        $post->update($request->all());
        return redirect('/posts');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect('/posts');
    }

    /**
     * Custom view
     */
    // public function contact()
    // {
    //     return view('contact');
    // }

    public function contact()
    {
        // $people = [];
        $people = ['Edwin', 'Jose', 'James', 'Peter', 'Maria'];
        // Do not leave variable uninitialized, best if you assign an empty array
        return view('contact', compact('people'));
    }


    public function show_post($id, $name, $password)
    // public function show_post($id)
    {
        // return view('post')->with('id', $id);
        return view('post', compact('id', 'name', 'password'));
    }

}
