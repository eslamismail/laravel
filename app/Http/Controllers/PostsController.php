<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;

use App\Comment;

use App\Repositories\Posts;
use App\Repositories\Categories;

class PostsController extends Controller
{
    
    /**
     * select all posts 
     */    
    public function index(Posts $posts)
    {

        $posts = $posts->all();
    	return view('posts.index',compact('posts'));
    }
    /**
     * display all posts
     */
    public function show(Post $post)
    {
    	return view('posts.view',compact('post'));
    }
    /**
     * select all categories
     * display form to cteate post
     */
    public function create($id)
    {
        $cates = Categories::viewCate($id);
        return view('posts.create',compact('cates'));
       
    	
    }
    /**
     * check if user login 
     * validation data 
     * save post
     */
    public function store(Request $request)
    {
        if(auth()->user())
        {
            $this->validate(request(),[
            'title' => 'required',
            'body'  => 'required',
            'img'   => 'required|image|mimes:jpeg,png,jpg,png,jif',
            'cate'  => 'required'
            ]);
            



            
                Posts::savePost($request);
                session()->flash('message','Post upload successfully');
                return redirect('/');
        
            


            
            
        
            
        }
        else 
        {
            return redirect('/login')->withErrors('you are not login here please login first');
    	}

    }
}
