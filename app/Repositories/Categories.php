<?php
namespace App\Repositories; 
use Illuminate\Http\Request;
use App\Category;

class Categories
{
    /**
     * select all sons of categories
     * return sons 
     */
    public static function viewCate($id)
    {
        $cates = Category::where('category_id',$id)->get();
        return $cates;
    }
    /**
     * select all parent categories
     * return parent 
     */
	public static function view()
	{
		$cates = Category::where('category_id',0)->get();
		return $cates;
    }
    /**
     * validation data
     * upload image
     * save category
     * return category id
     */
	public static function store(Request $request)
	{
		$rule = $request->validate([
    		'name'	=> 'required',
    		'img' 	=> 'required|image|max:2048'
    	]);
    	$image = $request->file('img');
    	$new_name = rand().'.'.$image->getClientOriginalExtension();
        $image->move(public_path("image"),$new_name);
    	$path = "/image/";





        $cate = new Category();
        $cate->name 		= request('name');
        $cate->img 			= $path.$new_name;
        $cate->category_id 	= request('parent_id');
        $cate->save();
        return $cate->category_id;

    }
    /**
     * select category byid
     * return this category
     */
    public static function filter($id)
    {
        $cates = Category::where('category_id',$id)->get();
        return $cates;
    }
}