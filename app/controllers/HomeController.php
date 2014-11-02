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

	public function intro()
	{
		return View::make('intro');
	}

	public function home()
	{
		return View::make('hello', array('projects' => Project::all()));
	}

	public function kien_thuc()
	{
		// $category = Category::find($cat_id);
		return View::make('kien_thuc', array('categories' => Category::all()));
	}

	public function kien_thuc_post($id)
	{
		$post = Post::find($id);
		return View::make('kien_thuc_post', array('post' => $post));
	}

	public function gioi_thieu()
	{
		return View::make('gioi_thieu', array('categories' => Category::all()));
	}

	public function vat_lieu()
	{
		return View::make('vat_lieu');
	}

	public function shop_noi_that()
	{
		return View::make('shop_noi_that');
	}

	public function phong_thuy()
	{
		return View::make('phong_thuy');
	}
}
