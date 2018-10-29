<?php
namespace App\Repositories;

use Illuminate\Http\Request;

use App\User;


class Users
{
	/**
	 * select user by id
	 * return user
	 */
	public static function view($id)
	{
		$users = User::where('id',$id)->first();
		return $users;
	}
	/**
	 * validation data 
	 * upload user's image 
	 * save all data
	 */
	public static function store(Request $request)
	{
		$rules = $request->validate([
			'name' 		=> 'required',
			'password'  => 'required|confirmed',
			'email' 	=> 'required|email|unique:users',
			'img' 		=> 'required|image|mimes:jpg,jpeg,gif|max:2048'
		]);

		$image 		= $request->file('img');
        $new_name 	= rand().'.'.$image->getClientOriginalExtension();
        $image->move(public_path("image"),$new_name);
        $path 		= "/image/";

        $user 			= new User();
        $user->name 	= request('name');
        $user->email 	= request('email');
        $user->password = bcrypt(request('password'));
        $user->img 		= $path.$new_name;
        $user->save();

        return $user;
	}
	/**
	 * validation data
	 * select user by id 
	 * edit user's name
	 * return user id
	 */
	public static function updateName($id,Request $request)
	{	
		
		$rules 	= $request->validate([
			'name' 		=> 'required',
		]);

		$user 		= User::where('id',$id)->first();
		$user->name = request('name');
		$user->save();
		return $user->id;
	}
	/**
	 * validation data
	 * select user by id
	 * edit user's image
	 * user id
	 */
	public static function updateImage($id,Request $request)
	{
		$rules = $request->validate(['img' => 'required|image|mimes:jpg,jpeg,gif|max:2048']);
		$image = $request->file('img');
		$new_name = rand().'.'.$image->getClientOriginalExtension();
		$image->move(public_path("image"),$new_name);
		$path = "/image/";

		$user 		= User::where('id',$id)->first();
		$user->img 	= $path.$new_name;
		$user->save();
		return $user->id;
	}
	/**
	 * validation data
	 * select user by email
	 * edit user's email
	 * return user id
	 */
	public static function updateEmail($id, Request $request)
	{
		$rules = $request->validate(['email' => 'required|email|unique:users']);

		$user = User::where('id',$id)->first();
		$user->email = request('email');
		$user->save();
		return $user->id;	
	}
	/**
	 * validation data 
	 * select user by id
	 * check old password is hes password
	 * change user's password
	 */
	public static function updatePassword($id,Request $request)
	{
		$rules = $request->validate([
			'password' 		=> 'required|confirmed',
			'password_old' 	=> 'required'
		]);
		$user = User::where('id',$id)->first();
		$email = $user->email;
		$auth = auth()->attempt(['email' => $email , 'password' => request('password_old')]);
		if($auth)
		{
			$user->password = bcrypt(request('password'));
			$user->save();
			return $user->id;

		}
	}

}