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
		return View::make('admin.galleries.index', array(
		    'galleries' => Gallery::all(),
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
    	return View::make('admin.galleries.create');
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
		  'title' => array('required', 'unique:galleries,title')
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
		//
    	return View::make('admin.galleries.edit', array('gallery' => Gallery::find($id)));   
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
		$rules = array(
		  'title' => array('required', 'unique:galleries,title'),
		);
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