<?php 

//APIS  
Route::get('/api/cate','ApisController@cate');
Route::get('/api/cate/{cate}','ApisController@filter');

//show posts
Route::get('/api/posts','ApisController@index');
//show comments
Route::get('/api/comments','ApisController@comments');
// show users
Route::get('/api/users','ApisController@user');
// show tags
Route::get('/api/tags','ApisController@tags');
//method put










//add category
Route::get('/category/add','CategoryController@add');
Route::post('/category/add','CategoryController@store');
//category 
Route::get('/category/posts/{cate}','CategoryController@view');

//view parent of category
Route::get('/category/{cate}','CategoryController@filter');



// home page
Route::get('/','PostsController@index')->name('home');
//tag views and select where post
Route::get('/posts/tags/{tag}','TagsController@index');
// form to create post
Route::get('/posts/create','CategoryController@select');
Route::get('/posts/cate/{cate}/create','PostsController@create');

Route::post('/posts','PostsController@store');
// show post 
Route::get('/posts/{post}','PostsController@show');
// add comment
Route::post('/posts/{post}/comments','CommentsController@store');
// authencation and registeration 
Route::get('/register','RegisterationController@create');
Route::post('/register','RegisterationController@store');

Route::get('/login','SessionsController@create');
Route::post('/sessions','SessionsController@store');

//logout 
Route::get('logout','SessionsController@destroy');
//user
Route::get('/user/{user}','UserController@show');
// user update
Route::get('/user/{user}/update/name','UserController@updateName');
Route::Post('/user/{user}/update/name','UserController@saveName');
Route::get('/user/{user}/update/image','UserController@updateImage');
Route::post('/user/{user}/update/image','UserController@saveImage');
Route::get('/user/{user}/update/email','UserController@updateEmail');
Route::post('/user/{user}/update/email','UserController@saveEmail');
Route::get('/user/{user}/update/password','UserController@updatePassword');
Route::post('/user/{user}/update/password','UserController@savePassword');



//admin's user

Route::get('/admin','AdminController@index');

Route::get('/admin/users','AdminController@user');

Route::post('admin/user/{user}','AdminController@destroy');

Route::get('/admin/add/user','AdminController@add');

Route::post('/admin/adduser','AdminController@save');


// admin posts

Route::get('/admin/posts','AdminPostsController@view');

Route::get('/admin/post/add','AdminPostsController@add');

Route::post('/admin/post/add','AdminPostsController@save');

Route::post('/admin/posts/{post}','AdminPostsController@destroy');

//admin comments
Route::get('/admin/comments','AdminCommentsController@view');

Route::post('/admin/comments/{comment}','AdminCommentsController@destroy');

//add comment
Route::get('/admin/comments/add','AdminCommentsController@add');
Route::post('/admin/comment/add','AdminCommentsController@save');



//admin login
Route::post('/admin/dashboard','AdminLoginController@login');	
//logout


Route::get('/admin/logout','AdminLoginController@destroy');



//api  for facebook

Route::get('auth/{provider}', 'RegisterationController@redirectToProvider');
Route::get('auth/{provider}/callback', 'RegisterationController@handleProviderCallback');