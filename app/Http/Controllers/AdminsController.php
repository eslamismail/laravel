<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Repositories\Admin;

use App\Post;
use App\User;
/**
 * apis
 */
class AdminsController extends Controller
{
	/**
	 * register and give token
	 * return user and token 
	 */
    public function signupApi(Request $request)
    {

    	
    	$user = Admin::signup($request);
    	if($user)
    	{
    		$token 	= \JWTAuth::attempt([
	    			
					'email' 	=> $request->email,
					'password'  => $request->password
				]);
    			$user->token = $token;
                $user->save();

				return response($user,200);
    	} 	
    }
	/**
	 * login and give me token
	 * return user and token  
	 */
    public function loginApi(Request $request)
    {
    	

		$user = Admin::loginApi($request);

 		if($user)
 		{
 			$login = \Auth::user();
 			if($login)
 			{
 				$token 	= \JWTAuth::attempt([
				'email' 	=> $request->email,
				'password'  => ($request->password)
				]);

 				$login->token = $token;

 				$login->save();
				return  response($login,200);
 			}
 		}
 		else
 		{
 			return response(['message' => 'wrong user and password'],404.0);
 		}


	  }
	  /**
	   * login by token 
	   * if login return posts that this user published
	   * if not return error message
	   */
  public function viaToken(Request $request)
 {
 	$user = \JWTAuth::parseToken()->authenticate();        
 	if($user)
 	{

 		$post = Post::where('user_id',$user->id)->get();

 		

 		return  $post;
 	}
 	else 
 	{
 		return response()->json(['error' => 'Unauthorized'], 401);
 	}
 	
 		
 }
}
