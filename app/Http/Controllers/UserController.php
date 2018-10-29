<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Repositories\Users;

class UserController extends Controller
{
    /**
     * check is it his profile
     * display user profile
     */
    public function show($id)
    {
        if($id == auth()->user()->id)
        {
        	$users = Users::view($id);
        	return view('users.view',compact('users'));
        }
        else
        {
            return redirect('/user/'.auth()->user()->id);
        }
    }
    /**
     * check if it belongs to this user
     * form to edit his name
     */
    public function updateName($id)
    {
        if($id == auth()->user()->id)
        {
            $user = Users::view($id);
            return view('users.update_name',compact('user'));
        }
        else
        {
            return redirect('/user/'.auth()->user()->id.'/update/name');
        }
    	
    }
    /**
     * save name
     */
    public function saveName($id,Request $request)
    {
    	$id = Users::updateName($id,$request);
        session()->flash('message','Your name changed');
    	return redirect('/user/'.$id);
    }
    /**
     * check is it his profile
     * form to edit his image
     */
    public function updateImage($id)
    {
        if($id == auth()->user()->id)
        {
            $user = Users::view($id);
            return view('users.update_image',compact('user'));
        }
        else
        {
            return redirect('/user/'.auth()->user()->id.'/update/image');
        }
    	
    }
    /**
     * save new image
     */
    public function saveImage($id,Request $request)
    {
    	$id = Users::updateImage($id,$request);
        session()->flash('message','your image changed ♥');
    	return redirect('/user/'.$id);
    }
    /**
     * check if email belongs to user 
     * diplay form to change email
     */
    public function updateEmail($id)
    {
        if($id == auth()->user()->id)
        {
            $user = Users::view($id);
            return view('users.update_email',compact('user'));
        }
    	else
        {
            return redirect('/user/'.auth()->user()->id.'/update/email');
        }
    }
    /**
     * save new email
     */
    public function saveEmail($id,Request $request)
    {
    	$id = Users::updateEmail($id,$request);
        session()->flash('message','your email changed ♥');
    	return redirect('/user/'.$id);
    }
    /**
     * check if this paswword belongs to this user
     * display form to change password
     */
    public function updatePassword($id)
    {
        if($id == auth()->user()->id)
        {
            $user = Users::view($id);
            return view('users.update_password',compact('user'));
        }
        else
        {
            return redirect('/user/'.auth()->user()->id.'/update/password');
        }
    	
    }
    /**
     * check old password is bleongs to this user
     * save new password
     * return @redirect
     */
    public function savePassword($id,Request $request)
    {
    	$id = Users::updatePassword($id,$request);
    	if($id)
    	{
            session()->flash('message','Welcome ♥');
    		return redirect('/user/'.$id);
    	}
    	else
    	{
    		return back()->withErrors('wrong old password please check it again');
    	}
    	
    }
}
