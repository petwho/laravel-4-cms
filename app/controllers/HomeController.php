<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function welcome()
	{
		return View::make('hello', array('projects' => Project::all()));
	}

	public function kien_thuc()
	{
		return View::make('kien_thuc', array('categories' => Category::all()));
	}

	public function gioi_thieu()
	{
		return View::make('gioi_thieu', array('categories' => Category::all()));
	}

	public function dashboard()
	{
		return View::make('admin.dashboard');
	}
}
