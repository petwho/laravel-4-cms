<?php

class GalleriesController extends \BaseController {
	public function __construct()
	{
	  $this->beforeFilter('auth');
	}

	/**
	 * Display a listing of the resource.
	 * GET /galleries
	 *
	 * @return Response
	 */
	public function index()
	{
		$projects = Project::all();
		$project_list = array();
		foreach ($projects as $project) {
		  $project_list[$project->id] = $project->name;
		}
		return View::make('admin.galleries.index', array(
		    'galleries' => Gallery::all(),
		    'project_list' => $project_list
		));
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /galleries/create
	 *
	 * @return Response
	 */
	public function create()
	{
		$options = array(null=> '--- Select ---');
		$projects = Project::all();
		foreach ($projects as $project) {
		  $options[$project['id']] = $project['name'];
		}
    	return View::make('admin.galleries.create', array('options' => $options));
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /galleries
	 *
	 * @return Response
	 */
	public function store()
	{
		$data = Input::all();
		$rules = array(
		  'title' => array('required', 'unique:galleries,title'),
		  'project_id' => array('required', 'unique:galleries,project_id'),
		);

		// Create a new validator instance.
		$validator = Validator::make($data, $rules);

		if ($validator->passes()) {
		  $gallery = new Gallery;
		  $gallery->title = Input::get('title');
		  $gallery->save();
		  return Redirect::to('/galleries')->with('message', 'Gallery created successfully.');
		}
		return Redirect::back()->withErrors($validator);
	}

	/**
	 * Display the specified resource.
	 * GET /galleries/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /galleries/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$options = array(null=> '--- Select ---');

		$projects = Project::all();
		$gallery = Gallery::find($id);
		$images = Image::where('gallery_id', '=', $gallery->id)->get();
		$menus = Menu::all();

		foreach ($projects as $project) {
		  $options[$project['id']] = $project['name'];
		}

		$gallery_menus = GalleryMenu::all();


    	return View::make('admin.galleries.edit', array(
    		'gallery' => $gallery,
    		'options' => $options,
    		'images' => $images,
    		'menus' => $menus,
    		'gallery_menus' => $gallery_menus
		));
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /galleries/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$gallery = Gallery::find($id);
		// TODO: check $gallery existance
		$menus = ['menu-1', 'menu-2', 'menu-3', 'menu-4', 'menu-6'];
		foreach ($menus as $menu) {
			if ($menu == 'on') {
				// create new record on gally_menu table
				$gallery_menu = new GalleryMenu;
				$gallery_menu->gallery_id = $gallery->$id;
				$gallery_menu->menu_id = substr($menu, 5, 1);
				$gallery_menu->save();
			}
		}
		$rules = array(
		  'title' => array('required', 'unique:galleries,title,'.$id),
		);
		$images = Input::get('image');

		foreach ($images as $image) {
			// store image
			if (!array_key_exists('id', $image)) {
				if (Input::get('new_image') == true) {
					$new_image = new Image;
					$new_image->gallery_id = $id;
					$new_image->name = $image['name'];
					$new_image->title = $image['title'];
					$new_image->url = $image['url'];
					$new_image->thumb_url = $image['thumb_url'];
					$new_image->save();
				}
				continue;
			}
			// update images
			$found_image = Image::find($image['id']);
			$found_image->url = $image['url'];
			$found_image->thumb_url = $image['thumb_url'];
			$found_image->name = $image['name'];
			$found_image->title = $image['title'];
			$found_image->save();
		}
		$validator = Validator::make(Input::all(), $rules);
		if ($validator->passes()) {
		  $gallery->title = Input::get('title');
		  $gallery->update();
		  return Redirect::back()->with('message', 'Gallery updated successfully');
		}
		return Redirect::back()->withErrors($validator);
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /galleries/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Gallery::destroy($id);
		return Response::json(['message', 'delete successfully']);
	}

}