<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Repositories\AdminPost;

use App\Repositories\AdminUser;
/**
 * dashboard
 */
class AdminPostsController extends Controller
{
    /**
     * select all posts with user who published
     * return user and posts
     */
    public function view()
    {
    	$posts  = AdminPost::view();
        $user   = AdminPost::withUser();
        
    	return view('admin.posts',compact('posts','user'));
    }
    /**
     * delete post
     */
    public function destroy($id)
    {
    	AdminPost::delete($id);
    	return back()->with('status', 'Post deleted!');
    }
    /**
     * diplay form to add post
     */
    public function add()
    {
        $users = AdminUser::view();
        return view('admin.add_post',compact('users'));
    }
    /**
     * save post
     */
    public function save(Request $request)
    {
        AdminPost::save($request);

        return redirect('/admin/posts')->with('status','Post added successfully');
    }
}
