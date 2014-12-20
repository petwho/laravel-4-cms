<?php

class UploadsController extends \BaseController {
	public function __construct()
	{
		$this->beforeFilter('auth');
	}

	/**
	 * Display a listing of the resource.
	 * GET /uploads
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('admin.uploads.index');
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /uploads/create
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('admin.uploads.create');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /uploads
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /uploads/{id}
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
	 * GET /uploads/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /uploads/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$dirname = Input::get('dirname');
		$basename = basename( $_FILES["uploadFile"]["name"]);
		$target_dir = app_path().'/../public/images/'.$dirname.'/'.$id;
		$uploadOk = 1;
		if (move_uploaded_file($_FILES["uploadFile"]["tmp_name"], $target_dir)) {
	    return Redirect::to('/uploads')->header('Cache-Control', 'no-store, no-cache, must-revalidate')->with('message', 'Image upload successfully.');
		}
    return Redirect::back()->withErrors('Error uploading image.');
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /uploads/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}