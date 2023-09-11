<?php

namespace App\Http\Controllers;

use App\Http\Requests\Categories\CreateCategoryRequest;
use App\Http\Requests\Categories\UpdateCategoriesRequest;
use App\Models\Category;

class CategoriesController extends Controller {
  /**
   * Display a listing of the resource.
   */
  public function index() {
    return view('categories.index')->with('categories', Category::all()); //folder auth-> categories -> file index
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create() {
    return view('categories.create'); //folder auth-> categories -> file index
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(CreateCategoryRequest $request) {

    Category::create([
      'name' => $request->name,
    ]);

    session()->flash('success', 'Category created successfully.');

    return redirect(route('categories.index'));
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
  public function edit(Category $category) {
    return view('categories.create')->with('category', $category);

  }

  /**
   * Update the specified resource in storage.
   */
  public function update(UpdateCategoriesRequest $request, Category $category) {

    $category->update([
      'name' => $request->name,
    ]);

    session()->flash('success', 'Category updated successfully.');

    return redirect(route('categories.index'));
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Category $category) {

    if ($category->posts->count() > 0) {
      session()->flash('error', 'Category cannot be deleted because it has some posts.');

      return redirect()->back();
    }

    $category->delete();
    session()->flash('success', 'Category deleted successfully.');
    return redirect(route('categories.index'));
  }
}
