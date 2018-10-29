<?php

namespace App;

use Carbon\Carbon;

use App\Comment;

use App\User;

use App\Category;

 

class Post extends Model
{

	/**
	 * tables relation 
	 * post has many comments
	 */
	public function comments()
	{
		return $this->hasMany(Comment::class);
	}
	/**
	 * create comment
	 */
	public function addComment($body)
	{
		// $this->comments()->create(compact('body'));
		Comment::create([
			'body' => $body,
			'post_id' => $this->id,
			'user_id' => auth()->id()
		]);
	}
	/**
	 * table relation 
	 * user has many posts
	 */
	public function user()
	{
		return $this->belongsTo(User::class);
	}
	/**
	 * select posts by month and year
	 */
	public static function archives()
	{
		return static::selectRaw('year(created_at) year, monthname(created_at) month, count(*) published')
        ->groupBy('year','month')
        ->orderByRaw('min(created_at) desc')
        ->get()
        ->toArray();
	}
	public function tags()
	{
		return $this->belongsToMany(Tag::class);
	}
	public function category()
	{
		return $this->belongsTo(Category::class);
	}
	
}

