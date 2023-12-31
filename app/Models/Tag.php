<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model {
  protected $fillable = [
    'name', // Add this line for the 'name' attribute
  ];

  public function posts() {
    return $this->belongsToMany(Post::class);
  }
}
