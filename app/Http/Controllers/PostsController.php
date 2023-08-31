<?php

namespace App\Http\Controllers;

use App\Http\Requests\Posts\CreatePostRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class PostsController extends Controller {
  /**
   * Display a listing of the resource.
   */
  public function index() {
    return view('posts.index')->with('posts', Post::all());
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create() {
    return view('posts.create');
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(CreatePostRequest $request) {
    // upload the image to storage
    $image = $request->image->store('posts');

    // create the post
    Post::create([
      'title'       => $request->title,
      'description' => $request->description,
      'content'     => $request->content,
      'image'       => $image,
    ]);

    // flash message
    session()->flash('success', 'Post created succesfully.');

    // redirect user
    return redirect(route('posts.index'));
  }

  /**
   * Display the specified resource.
   */
  public function show(string $id) {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(string $id) {
    //
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, string $id) {
    //
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Post $post) {
    $post->delete();

    session()->flash('success', 'Post trashed succesfully.');

    return redirect(route('posts.index'));
  }
}
