<?php

namespace App\Repositories;

use App\User;

use App\Post;

use App\Comment;

use Illuminate\Http\Request;
/**
 * dashboard
 */
class AdminUser
{
    /**
     * select all users
     * return user
     */

	public static function view()
	{
		$users = User::all();
		return $users;
    }
    /**
     * select posts by user id
     * delete comments that belongs to post
     * delete all posts belongs to user
     * delete all comments belongs to user
     * delete this user
     */
	public static function delete($id)
	{
        $posts 			= Post::where('user_id',$id)->get();
        foreach($posts as $post)
        {
            $commentsPost 	= Comment::where('post_id',$post->id)->delete();
        }
        $postsDelete 	= Post::where('user_id',$id)->delete();
        $comments   	= Comment::where('user_id',$id)->delete();	
		$user       	= User::where('id' , $id)->delete();
    }
    /**
     * validation
     * craete user 
     */ 
	public static function create(Request $request)
	{   


		$rules =  $request->validate([
            'name'      => 'required',
            'email'     => 'required|email|unique:users',
            'password'  =>'required|confirmed'
        ]);
        

        $user = new User();
        $user->name  = request('name');
        $user->email = request('email');
        $user->password = bcrypt(request('password'));
        $user->save();
	}
}