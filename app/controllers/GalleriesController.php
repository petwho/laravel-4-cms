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

		$galleryMenus = GalleryMenu::all();
		// $galleryTabs = GalleryTab::all();
		$tabs = Tab::all();
		$tabList = [];
		foreach ($tabs as $tab) {
			$tabList[$tab->id] = $tab->title;
		}
		$selectedTabs = GalleryTab::where('gallery_id', '=', $gallery->id)->get();

		$selectedTabList = [];
		foreach ($selectedTabs as $selectedTab) {
			$selectedTabList[] = $selectedTab->tab_id;
		}

    	return View::make('admin.galleries.edit', array(
    		'gallery' => $gallery,
    		'options' => $options,
    		'images' => $images,
    		'menus' => $menus,
    		'galleryMenus' => $galleryMenus,
    		// 'galleryTabs' => $galleryTabs,
    		'tabList' => $tabList,
    		'selectedTabList' => $selectedTabList
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
		if (!$gallery) {
			return Redirect::back()->with('message', 'Gallery not found');
		}
		$menus = ['menu-1', 'menu-2', 'menu-3', 'menu-4', 'menu-6'];
		foreach ($menus as $menu) {
			$gallery_menu = GalleryMenu::whereRaw('gallery_id ='.$id
				.' AND menu_id = '.substr($menu, 5, 1))->first();
			// if gallery doesn't exist and the input was checked
			if (!$gallery_menu && Input::get($menu) == 'on') {
				// create new record on gally_menu table
				$gallery_menu = new GalleryMenu;
				$gallery_menu->gallery_id = $gallery->id;
				$gallery_menu->menu_id = substr($menu, 5, 1);
				$gallery_menu->save();
			}
			elseif ($gallery_menu && Input::get($menu) !== 'on') {
				$gallery_menu->delete();
			}
		}

		$tabs = Input::get('tab');
		// delete all previous saved gallery_tabs
		$gallery_tabs = GalleryTab::where('gallery_id', '=', $gallery->id)->delete();
		// create new gallery_tabs
		if ($tabs) {
			foreach ($tabs as $tab_id) {
				GalleryTab::create([
					'gallery_id' => $gallery->id,
					'tab_id' => $tab_id
				]);
			}
		}

		$rules = array(
		  'title' => array('required', 'unique:galleries,title,'.$id),
		  'project_id' => array('unique:galleries,project_id,'.$id),
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
					$new_image->subcat = $image['subcat'] ? $image['subcat'] : null;
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
			$found_image->subcat = $image['subcat'] ? $image['subcat'] : null;
			$found_image->save();
		}

		$validator = Validator::make(Input::all(), $rules);

		if ($validator->passes()) {
		  $gallery->title = Input::get('title');
		  if (Input::get('project_id') == '') {
		  	$gallery->project_id = null;
		  } else {
		  	$gallery->project_id = Input::get('project_id');
		  }
		  // if (Input::get('is_top_panel_gallery')) {
		  	$gallery->is_top_panel_gallery = Input::get('is_top_panel_gallery') ? true : false;
		  // }
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