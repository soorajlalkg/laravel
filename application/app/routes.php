<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', 'HomeController@index');

/*
/-------------------------
front end user
/-------------------------
*/
Route::match(array('GET', 'POST'), '/register', 'RegisterController@index');
Route::match(array('GET', 'POST'), '/login', 'LoginController@index');
Route::get('logout', function()
{
	Auth::logout();
	return Redirect::to('login');
});
Route::group(array('before' => 'auth'), function()
{
	 Route::match(array('GET', 'POST'), '/account', 'AccountController@index');
});
Route::match(array('GET', 'POST'), '/contact', 'ContactController@index');

Route::get('/about', 'PagesController@about');
Route::get('/history', 'PagesController@history');
Route::match(array('GET', 'POST'), '/country', 'CountryController@index');
Route::match(array('GET', 'POST'), '/country/search', 'CountryController@search');
Route::match(array('GET', 'POST'), '/image', 'ImagetestController@index');//upload image
/*
/-------------------------
Admin Back End
/-------------------------
*/
//if admin only(auth method)

/*Route::get('login', function()
{
	return Redirect::to('admin/');
});
Route::group(array('prefix' => 'admin'), function()
{
		//Route::get('/', 'AdminController@showWelcome');
});*/

//else


// Admin routes
Route::group(array('prefix' => 'admin', 'before' => 'auth.admin'), function()
{
	
	Route::get('/', 'AdminController@showWelcome');
	Route::get('/customer', 'CustomerController@showWelcome');
	Route::resource('photo',    'PhotoController');
	//Route::controller('photo', 'PhotoController');
	Route::resource('happy',    'HappyController');
});


















//add all actions that reqd login eg: account detals


Route::group(array('before' => 'auth'), function()
{
    /*Route::get('/', function()
    {
        // Has Auth Filter
    });*/

    Route::get('user/profile', function()
    {
        // Has Auth Filter
        return 'Logged in';
    });
});
//single action reqd login
/*Route::get('checkAuth', array('before' => 'auth', function()
{
    return 'You are authenticated and over 200 years old!';
}));*/
Route::get('checkAuth', array('before' => 'auth', function()
{
    //return 'You are authenticated and over 200 years old!';
		return Redirect::to('/afterLogin');
}));

Route::get('/news', 'NewsController@showWelcome');
Route::get('/afterLogin', 'NewsController@afterLogin');
//inside admin folder - please dont create controller with same name inside admin homecontrller is not possible
/*Route::group(array('prefix' => 'admin'), function()
	{
		Route::get('/', 'AdminController@showWelcome');
		Route::get('/customer', 'CustomerController@showWelcome');
		//reqd login
		//Route::get('login', array('before' => 'auth', function()
		//{
		//    return 'You are authenticated and over 200 years old!';
		//}));		
	});*/


Route::get('news/{id}', function($id){  })->where('id', '[0-9]+');//edit user

//Optional Route Parameters With Defaults
Route::get('user/{name?}', function($name = 'John') //$name=null
{
    return $name;
});

//Passing An Array Of Wheres
Route::get('book/{id}/{name}', function($id, $name)
{
    return $id.$name;
})->where(array('id' => '[0-9]+', 'name' => '[a-z]+'));

//Defining Global Patterns
Route::pattern('id', '[0-9]+');
Route::get('users/{id}', function($id)
{
    // Only called if {id} is numeric.
});



//Route::get('/product/dashboard', 'AbcController@showWelcome');//inside test folder

	// ===============================================
	// ADMIN SECTION =================================
	// ===============================================
	/*Route::group(array('prefix' => 'admin'), function()
	{
		// main page for the admin section (app/views/admin/dashboard.blade.php)
		Route::get('/', function()
		{
			return View::make('admin.dashboard');
		});

		// subpage for the posts found at /admin/posts (app/views/admin/posts.blade.php)
		Route::get('posts', function()
		{
			return View::make('admin.posts');
		});

		// subpage to create a post found at /admin/posts/create (app/views/admin/posts-create.blade.php)
		Route::get('posts/create', function()
		{
			return View::make('admin.posts-create');
		});
	});*/
	
	
	// ===============================================
	// 404 ===========================================
	// ===============================================

	/*App::missing(function($exception)
	{

		// shows an error page (app/views/error.blade.php)
		// returns a page not found error
		return Response::view('error', array(), 404);
	});*/
