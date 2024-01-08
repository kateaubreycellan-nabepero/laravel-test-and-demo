<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        return $id;
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
        return $request->all();
    }

    /**
     * Display the specified resource.
     */

    public function show(string $id)
    {
        return "Show post id: $id";
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
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
