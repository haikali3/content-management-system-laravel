<?php

namespace App\Http\Middleware;

use App\Models\Category;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VerifyCategoriesCount {
  /**
   * Handle an incoming request.
   *
   * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
   */
  public function handle(Request $request, Closure $next): Response {

    if (Category::all()->count() === 0) {
      session()->flash('error', 'You need to add categories to be able to create a post.');
      return redirect(route('categories.create'));
    }

    return $next($request);
  }
}
