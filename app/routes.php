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

Route::get('/', 'IntroController@intro');
Route::get('/iframe/{id}', 'IntroController@iframe'); // iframe intro gallery
Route::get('/home', 'HomeController@home');
Route::get('/home/gallery/{id}', 'HomeController@iframe'); // iframe home gallery
Route::get('/kien-thuc/', 'HomeController@kien_thuc');
Route::get('/gioi-thieu', 'HomeController@gioi_thieu');
Route::get('/vat-lieu', 'HomeController@vat_lieu');
Route::get('/shop-noi-that', 'HomeController@shop_noi_that');
Route::get('/phong-thuy', 'HomeController@phong_thuy');
Route::post('/contact', 'HomeController@contact');

Route::get('/dashboard', array(
  'before' => 'auth',
  function()
  {
    $user = Auth::user();
    return View::make('admin.dashboard', array(
      'user' => $user,
      'users' => User::all(),
      'posts' => Post::all(),
      'projects' => Project::all()
    ));
  }
));

/* Users */
Route::resource('users', 'UsersController');
Route::resource('projects', 'ProjectsController');
Route::resource('categories', 'CategoriesController');

/* Sessions */
Route::get('login', 'SessionsController@create');
Route::post('login', 'SessionsController@store');
Route::get('logout', 'SessionsController@destroy');

/* Menus */
Route::resource('menus', 'MenusController');
Route::put('menus/{id}/restore', 'MenusController@restore');
Route::delete('menus/{id}/trash', 'MenusController@trash');

/* Posts */
Route::resource('posts', 'PostsController');
/* Uploads */
Route::resource('uploads', 'UploadsController');
// Galleries
Route::resource('galleries', 'GalleriesController');
// Photos
Route::resource('photos', 'PhotosController');
// Messages
Route::get('messages', 'MessagesController@index');
// Panels
Route::post('panels', array('before' => 'auth'));
Route::resource('panels', 'PanelsController');
Route::resource('tabs', 'TabsController');

Route::get('/kien-thuc/{id}', 'HomeController@kien_thuc_post');
Route::get('/phong-thuy/{id}', 'HomeController@phong_thuy_post');

App::missing(function($exception)
{
  return Response::view('errors.missing', array(), 404);
});
