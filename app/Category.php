<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Post;
use App\User;
class Category extends Model
{
    public function posts()
    {
    	return $this->hasMany(Post::class);
    }
    public function son()
    {
    	return $this->hasMany(Category::class);
    }
}
