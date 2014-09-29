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
// list menus
Route::get('/menus', array('before' => 'auth',
  function()
  {
    return View::make('admin.menus.index', array('menus' => Menu::all()));
  }
));

Route::get('/menus/new', array('before' => 'auth',
  function()
  {
    return View::make('admin.menus.create');
  }
));

Route::post('/menus', array('before' => 'auth',
  function()
  {
    $data = Input::all();
    $rules = array(
      'title' => array('required', 'min:3'),
      'alias' => array('required', 'alpha_dash', 'unique:menus,alias')
    );

    // Create a new validator instance.
    $validator = Validator::make($data, $rules);

    if ($validator->passes()) {
      $menu = new Menu;
      $menu->title = Input::get('title');
      $menu->alias = Input::get('alias');
      $menu->save();
      return Redirect::back()->with('message', 'Menu created successfully.');
    }
    return Redirect::back()->withErrors($validator);
  }
));

App::error(function($exception)
{
  // return Response::view('errors.missing', array(), 404);
});
