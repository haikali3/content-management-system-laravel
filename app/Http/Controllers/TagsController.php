<?php

namespace App\Http\Controllers;

use App\Http\Requests\Tags\CreateTagRequest;
use App\Http\Requests\Tags\UpdateTagsRequest;
use App\Models\Tag;

class TagsController extends Controller {
  /**
   * Display a listing of the resource.
   */
  public function index() {
    return view('tags.index')->with('tags', Tag::all()); //folder auth-> Tags -> file index
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create() {
    return view('tags.create'); //folder auth-> Tags -> file index
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(CreateTagRequest $request) {

    Tag::create([
      'name' => $request->name,
    ]);

    session()->flash('success', 'Tag created successfully.');

    return redirect(route('tags.index'));
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
  public function edit(Tag $tag) {
    return view('tags.create')->with('Tag', $tag);

  }

  /**
   * Update the specified resource in storage.
   */
  public function update(UpdateTagsRequest $request, Tag $tag) {

    $tag->update([
      'name' => $request->name,
    ]);

    session()->flash('success', 'Tag updated successfully.');

    return redirect(route('tags.index'));
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Tag $tag) {

    if ($tag->posts->count() > 0) {
      session()->flash('error', 'Tag cannot be deleted because it is associated to some posts.');

      return redirect()->back();
    }

    $tag->delete();
    session()->flash('success', 'Tag deleted successfully.');
    return redirect(route('tags.index'));
  }
}
