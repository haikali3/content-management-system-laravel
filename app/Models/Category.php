<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model {
//   use HasFactory;
  protected $fillable = [
    'name', // Add this line for the 'name' attribute
  ];

  public function posts() {
    return $this->hasMany(Post::class);
  }
}
