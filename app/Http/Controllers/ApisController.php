<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Repositories\Apis;

use App\Category;
/**
 * apis
 */
class ApisController extends Controller
{
    /**
     * select all posts
     */
    public function index()
    {
    	return Apis::posts();
    }
    /**
     * select all comments
     */
    public function comments()
    {
    	return Apis::comments();
    }
    /**
     * select all users
     */
    public function user()
    {
    	return Apis::user();
    }
    /**
     * select all tags
     */
    public function tags()
    {
    	return Apis::tag();
    }
    /**
     * select all categories
     */
    public function cate()
    {
        return response(Apis::cate(),200);
    }
    /**
     * select category by id
     */
    public function filter($id)
    {
        $cate = Apis::filter($id);
        return response($cate,200);
    }
    /**
     * login via token 
     * if login 
     * select post by id 
     * if this post belongs to this user
     * edit 
     * if not belongs to this user return error message
     */
    public function editPost($id)
    {
        $user = \JWTAuth::parseToken()->authenticate(); // handle error :(
        if(! $user)
        {
            return response('invalid token',404);
        }
        else
        {
            $post = Apis::filterPostById($id);
            if($user->id == $post->user_id )
            {
                $post = Apis::updatePost($id);
                return response($post,200);
            }
            else
            {
                return response('this post no belong to you please edit any post that you published',400);
            }
            
        }
    }
    /**
     * login via token
     * if login select post by id
     * if this post belong to this user
     * edit post
     * if not return error message
     */
    public function deletePost($id)
    {
        $user = \JWTAuth::parseToken()->authenticate(); //trying to handle wrong tooken  
        $post = Apis::filterPostById($id);

        if($user->id == $post->user_id)
        {
            $delete = Apis::deletePost($id);
            return response('successfully delete',200);
        }
        else
        {
            return response('this post not belong to you please do not play with any thing ',400);
        }
    }

 

}

