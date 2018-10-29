<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Categories;
use App\Post;

class CategoryController extends Controller
{
    /**
     * select all posts by category 
     */
    public function view($id)
    {
    	$posts = Post::where('category_id',$id)->get();
    	return view('posts.category',compact('posts'));
    }
    /**
     * select category by id
     */
    public function filter($id)
    {
        $cates = Categories::filter($id);
        return view('posts.cate_parent',compact('cates'));
    }
    /**
     * display form to add category
     */
    public function add()
    {
        $cates = Categories::view();
    	return view('posts.add_cate',compact('cates'));
    }
    /**
     * save category
     * redirect to place where he added in
     */
    public function store(Request $request)
    {
    	
    	$id = Categories::store($request);
    	return redirect('/category/'.$id);
    }
    /**
     * select all categories
     */
    public function select()
    {
        $cates = Categories::view();
        return view('posts.select_cate',compact('cates'));
    }
}
