<?php

namespace App\Repositories;

use App\Post;

use App\Comment;

/**
 * dashboard
 */
class AdminPost
{
	/**
	 * select all posts
	 * return posts
	 */
	public static function view()
	{
		$posts = Post::all();
        return $posts;
	}
	/**
	 * select posts with user by relation
	 * return user with his posts
	 */
	public static function withUser()
	{
		$user = Post::with('user')->get();
		return $user;
	}
	/**
	 * delete post by id
	 * delete comments that belong to post
	 */
	public static function delete($id)
	{
		$post = Post::where('id',$id)->delete();
        $comment = Comment::where('post_id',$id)->delete();
	}
	/**
	 * validation data
	 * save post int database
	 */
	public static function save($request)
	{

		$rules =  $request->validate([
            'title'      => 'required',
            'body'       => 'required',
            'user_id'    => 'required'
        ]);


        $post = new Post();
        $post->user_id      = request('user_id');
        $post->title        = request('title');
        $post->body         = request('body');
        $post->save();
	}
	



}