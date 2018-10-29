<?php

namespace App\Repositories;

use App\Post;

use App\Comment;

use App\User;

use App\Tag;
use App\Category;

/** 
 * apis for all project
 */

class Apis
{
	/**
	 * return all posts with comments by relation
	 */ 
	
	public static function posts()
	{
		$api = Post::with('comments')->get();
		return $api;
	}
	/**
	 * return all comments from the database
	 */
	

	public static function comments()
	{
		$api = Comment::all();
		return $api;
	}

	/**
	 * return all users and posts that he published by relation 
	*/ 

	public static function user()
	{
		$api = User::with('posts')->get();
		return $api;
	}

	/**
	 * return all tags
	 */

	public static function tag()
	{
		$api = Tag::all();
		return $api;
	}

	/**
	 *  select all categories with sons by relations
	 *  edit in array 
	 *  return all categories 
	 */
	public static function cate()
	{
		$cates = Category::with('son')->where('category_id',0)->get();

		foreach($cates as $cate)
		{
			foreach ($cate->son as $son) 
			{
				$img = "http://localhost:8000".$son->img;
				$son->img = $img;
			}

			$img = "http://localhost:8000".$cate->img;
			$cate->img = $img;
		}

		

		return $cates;
		
	}
	/**
	 *  select category by id 
	 *  edit evry array 
	 *  return category
	 */
	public static function filter($id)
	{
		$cates = Category::where('id',$id)->with('posts')->get();
		foreach($cates as $cate)
		{
			foreach($cate->son as $son)
			{
				$img = "http://localhost:8000".$son->img;
				$son->img = $img;
			}
			$img = "http://localhost:8000".$cate->img;
			$cate->img = $img;
			
		}
		return $cates;
	}
	/**
	 * select post by id 
	 * update this post
	 * return post
	 */
	public static function updatePost($id)
	{
		$post = Post::where('id',$id)->first();
		$post->title = request('title');
		$post->body = request('body');
		$post->img = request('img');
		$post->save();
		return $post;
	}
	/**
	 * select post by id
	 * returned this post
	 * using method put
	 */
	public static function filterPostById($id)
	{
		$post = Post::where('id',$id)->first();
		return $post;
	}
	/**
	 * delete this post
	 * using method delete
	 */
	public static function deletePost($id)
	{
		Post::where('id',$id)->delete();
	}

}