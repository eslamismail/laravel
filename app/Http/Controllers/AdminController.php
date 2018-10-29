<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Repositories\AdminUser;

use App\Post;
/**
 * dashboard
 */
class AdminController extends Controller
{
    /**
     * home page
     */
    public function index()
    {
    	return view('admin.login');
    }
    /**
     * display all users
     */
    public function user()
    {
    	$users = AdminUser::view();
    	return view('admin.user',compact('users'));
    	
    }
    /**
     * delete user
     */
    public function destroy($id)
    {

    	$delete = AdminUser::delete($id);
    	return back()->with('status', 'User deleted!');
    }
    /**
     * form to add user
     */
    public function add()
    {
        return view('admin.add_user');
    }
    /**
     * save user
     */
    public function save(Request $request) 
    {
        $user = AdminUser::create($request);
        return redirect('/admin/users')->with('status','User added successfully');
    }
}
