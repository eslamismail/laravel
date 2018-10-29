<?php

namespace App\Repositories;

use App\User;

use Illuminate\Http\Request;

class Admin 
{

	/**
	 * vaildate request data
	 * register user
	 */

	public static function signup(Request $request)
	{
		 
		 $validate = $request->validate([
 			'name' 		=> 'required',
 			'email' 	=> 'required|email',
 			'password' 	=> 'required'
 		]);

		 

    	$user = new User();
    	$user->name 		= request('name');
    	$user->email 		= request('email');
    	$user->password 	= bcrypt(request('password'));
    	$user->img 			= request('img');
    	$user->save();
    	
    	return $user;	
	}
	/**
	 * validation
	 * authenication
	 * return user 
	 */
	public static function loginApi(Request $request)
	{
		

		$validate = $request->validate([
		 	'email' 	=> 'required|email',
		 	'password' 	=> 'required'
		 ]);

		 
 		$user = \Auth()->attempt([
			'email' 	=> $request->email,
			'password'  => $request->password
			]);

 		
 		return $user;

	}
} 