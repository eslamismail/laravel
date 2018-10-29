<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;

use App\Comment;
class CommentsController extends Controller
{
	/**
	 * check if user login
	 * validation data
	 * add comment
	 */
    public function store(Post $post)
    {
    	if(! auth()->user())
    	{
    		return redirect('/login')->withErrors('you are not login to add comment please login');
    	}
    	else
    	{
	    	$this->validate(request(),['body' => 'required|min:2']);

	    	$post->addComment(request('body'));
	    	session()->flash('message','Comment Added');
	    	 return back();
    	}
    }
}
