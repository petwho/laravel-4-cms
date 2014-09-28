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


Route::get('/user', function()
{
  return View::make('create_user_form');
});

Route::post('/user', function()
{
  $user = new User;
  $user->username = Input::get('username');
  $user->password = Hash::make(Input::get('password'));
  $user->email = Input::get('email');
  $user->save();
  return Response::make('User created! Hurray!');
});

Route::get('/dashboard', array(
  'before' => 'auth',
  function()
  {
    $user = Auth::user();
    return View::make('backends.dashboard', array('user' => $user));
  }
));

Route::get('/logout', function()
{
  Auth::logout();
  return Response::make('You are now logged out. :(');
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