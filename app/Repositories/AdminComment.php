<?php

namespace App\Repositories;

use App\Comment;

use Illuminate\Http\Request;


class AdminComment
{
	/**
	 * select all comments
	 * select all coments with posts
	 * select all comments with users who added
	 * return @Comment
	 */

	public static function view()
	{
		$comments   = Comment::all();
		// TODO: rempve 
        $users       = Comment::with('user')->get();
        $posts       = Comment::with('post')->get();

        return $comments;
	}
	/**
	 * delete comment by id
	 */
	public static function delete($id)
	{
		$comment = Comment::where('id',$id)->delete();


	}
	/**
	 * validation data
	 * save comment 
	 * return @Comment
	 */
	public static function save(Request $request)
	{
		

		$rules          = $request->validate([
            'body'      => 'required',
            'user_id'   => 'required',
            'post_id'   => 'required'
        ]);

		

        $comment            = new Comment();
        $comment->body      = request('body');
        $comment->user_id   = request('user_id');
        $comment->post_id   = request('post_id');
		$comment->save();
		
	}
}