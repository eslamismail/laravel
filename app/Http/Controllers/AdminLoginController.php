<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;


class AdminLoginController extends Controller
{
	/**
	 * validation data
	 * check user type if admin or user
	 * if admin login 
	 * if user return back with error message
	 */
    public function login(Request $request)
    {
    	$rules = $request->validate([
    		'email' 	=>  'required|email',
    		'password' 	=> 'required|min:2'

    	]);



    	$select = User::where('email',request('email'))->first();

    	$admin = "admin";

    	if($select->type == $admin)

    	{
    		$user = auth()->attempt(request(['email','password']));
	    	if($user)
	    	{
	    		return redirect('/admin')->with('status','Welcome ♥');
	    	}	
	    	else
	    	{
	    		return back()->withErrors('please check your data and try again ');
	    	}

    	}
    	else
    	{
    		return redirect('/admin')->withErrors('You can not login here');
    	}
	
	}
	/**
	 * logout
	 */
    public function destroy()
    {
    	auth()->logout();
    	return redirect('/admin');
    }
}
