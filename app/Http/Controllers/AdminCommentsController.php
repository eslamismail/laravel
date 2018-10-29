<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Repositories\AdminComment;

use App\Repositories\AdminUser;

use App\Repositories\AdminPost;
/**
 * dashboard
 */
class AdminCommentsController extends Controller
{
    /**
     * select all comments
     * return comments
     */
    public function view()
    {
    	$comments = AdminComment::view();
    	return view('admin.comments',compact('comments'));
    }
    /**
     * delete comment
     */
    public function destroy($id)
    {
    	AdminComment::delete($id);
    	return back()->with('status', 'Comment deleted!');
    }
    /**
     * add comment via dashboard
     */
    public function add()
    {
        $users = AdminUser::view();
        $posts = AdminPost::view();
        return view('admin.add_comment',compact('users','posts'));
    }
    /**
     * save comment
     */
    public function save(Request $request)
    {
        AdminComment::save($request);

        return redirect('/admin/comments')->with('status','Comment added successfully');
    }
}
