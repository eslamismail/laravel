<?php

namespace App\Repositories;
use App\Post;
use App\Redis;
use Carbon\Carbon;
use Illuminate\Http\Request;

class Posts
{
	protected $redis;

    protected $guarded=[];
	public function __construct(Redis $redis)
	{
		$this->redis = $redis;
    }
    /**
     * select all posts by date 
     */
	public function all()
	{
		$posts = Post::latest();

        if($month = request('month'))
        {
            $posts->whereMonth('created_at',Carbon::parse($month)->month);
        }
        if($year = request('year'))
        {
            $posts->whereYear('created_at',$year);
        }
        $posts = $posts->get();
        return $posts;
    }
    /**
     * upload image
     * save post 
     */
    public static function savePost(Request $request)
    {
        $image = $request->file('img');
            
            //upload image
            $new_name = rand().'.'.$image->getClientOriginalExtension();
            $image->move(public_path("image"),$new_name);
            $path = "/image/";

            //save
            $post = new Post();
            $post->title        = request('title');
            $post->body         = request('body');
            $post->user_id      = auth()->user()->id;
            $post->img          = $path.$new_name;
            $post->category_id  = request('cate');
            $post->save();
    }
}