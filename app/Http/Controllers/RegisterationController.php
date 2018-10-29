<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistrationForm;
use Illuminate\Http\Request;

use Auth;
use Socialite;
use File; 

use App\User;
use App\Repositories\Users;


class RegisterationController extends Controller
{
   /**
    * form to create user
    */
    public function create()
    {
    	return view('sessions.register');
    }
    /**
     * create user 
     * return to homepage
     */
    public function store(Request $request)
    {
        $user = Users::store($request);


        auth()->login($user);
        session()->flash('message','thanks for sign up');
        return redirect()->home();
    }


    /**
     * redirect to facebook
     */
    public function redirectToProvider($provider)
    {

        return Socialite::driver($provider)->redirect();
    }
    /**
     * get token from facebook
     */
    public function handleProviderCallback($provider)
    {

        $user = Socialite::driver($provider)->stateless()->user();

        $authUser = $this->findOrCreateUser($user, $provider);

        
        Auth::login($authUser, true);
        session()->flash('message','welcome ♥');
        return redirect('/');
    }
    /**
     * check if user found 
     * if found try login
     * if not try register
     */
    public function findOrCreateUser($user, $provider)
    {
        $authUser = User::where('provider_id', $user->id)->first();
        
        if ($authUser) 
        {
            return $authUser;
        }
        else
        {
            $users = User::create([
                'name'          => $user->name,
                'email'         => $user->email,
                'img'           => $user->getAvatar(),
                'password'      => bcrypt($user->id),
                'provider'      => $provider,
                'provider_id'   => $user->id
            ]);
            return $users;
        }      
    }



}