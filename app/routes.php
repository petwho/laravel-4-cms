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

Route::get('/', function()
{
	return View::make('hello');
});

/* Authentication */
Route::get('/logout', function()
{
  Auth::logout();
  return Redirect::to('/login');
});

Route::get('/login', function()
{
  return View::make('login_form');
});

Route::post('/login', function()
{
  $credentials = Input::only('username', 'password');
  $remember = Input::has('remember');
  if (Auth::attempt($credentials, $remember)) {
    return Redirect::intended('/dashboard');
  }
  return Redirect::to('login');
});

Route::get('/dashboard', array(
  'before' => 'auth',
  function()
  {
    $user = Auth::user();
    return View::make('admin.dashboard', array('user' => $user));
  }
));

/* User section */
Route::get('/users/new', array('before' => 'auth',
  function()
  {
    return View::make('admin.users.create');
  }
));

Route::post('/users', array('before' => 'auth',
  function()
  {
    $data = Input::all();
    $rules = array(
      'username' => array('alpha_num', 'min:3', 'unique:users,username'),
      'email' => array('email', 'unique:users,email')
    );

    // Create a new validator instance.
    $validator = Validator::make($data, $rules);

    if ($validator->passes()) {
      $user = new User;
      $user->username = Input::get('username');
      $user->password = Hash::make(Input::get('password'));
      $user->email = Input::get('email');
      $user->save();
      return Redirect::back()->with('message', 'User created successfully.');
    }
    return Redirect::back()->withErrors($validator);
  }
));

/* Menu section*/
Route::resource('menus', 'MenusController');
Route::put('menus/{id}/restore', 'MenusController@restore');
Route::delete('menus/{id}/trash', 'MenusController@trash');

App::error(function($exception)
{
  return Response::view('errors.missing', array(), 404);
});
