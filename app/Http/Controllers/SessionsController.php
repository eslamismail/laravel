<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;





class SessionsController extends Controller
{
	/**
	 * display login form
	 */
    public function create()
    {
    	return view('sessions.login');
	}
	/**
	 * logout
	 */
    public function destroy()
	{
		auth()->logout();
		return redirect('/login');
	}
	/**
	 * validation 
	 * check user type if user login
	 */
	public function store()
	{
		$this->validate(request(),[
    		'email' =>'required|email',
    		'password'  =>'required'
    	]);

		$select = User::where('email',request('email'))->first();

		if($select)
		{
			$user = 'user';

			if($select->type == $user )
				{
				if(! auth()->attempt(request(['email','password'])))
				{
				return back()->withErrors('please check your data and try again ');
				}
				session()->flash('message','Welcome ♥');
				return redirect()->home();
				}
				else
				{
					return back()->withErrors('you are can not login here');
				}
		}
		else
		{
			return redirect('/register')->withErrors('you are not subcriber here so you can register here');
		}

		

		
	}


}