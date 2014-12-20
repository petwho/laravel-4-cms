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

	public function home()
	{
		$menu = Menu::find(1);
		$q_gallery = Request::query('gallery');
		return View::make('hello', array(
			'projects' => Project::all(),
			'menu' => $menu,
			'q_gallery' => $q_gallery,
		));
	}

	public function iframe($id)
	{
		$menu = Menu::find(1);
		return View::make('home_gallery', array('id' => $id, 'menu' => $menu));
	}

	public function kien_thuc()
	{
		// find gallery for menu id = 2
		$menu = Menu::find(2);
		// $category = Category::find($cat_id);
		return View::make('kien_thuc', array(
			'categories' => Category::all(),
			'menu' => $menu
		));
	}

	public function kien_thuc_post($id)
	{
		$post = Post::find($id);
		return View::make('kien_thuc_post', array('post' => $post));
	}

	public function gioi_thieu()
	{
		// find gallery for menu id = 6
		$menu = Menu::find(6);
		return View::make('gioi_thieu', array(
			'categories' => Category::all(),
			'menu' => $menu,
		));
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
		return View::make('phong_thuy', array('categories' => Category::where('id', '>', 7)->get()));
	}

	public function phong_thuy_post($id)
	{
		$post = Post::find($id);
		return View::make('phong_thuy_post', array('post' => $post));
	}

	public function contact()
	{
		Message::create(Input::all());
		return Redirect::back();
	}
}
