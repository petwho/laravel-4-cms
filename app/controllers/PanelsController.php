<?php

class PanelsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /panels
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /panels/create
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('admin.panels.create');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /panels
	 *
	 * @return Response
	 */
	public function store()
	{
		Panel::create(Input::all());
		return Redirect::back()->with('message', 'Panel created successfully');
	}

	/**
	 * Display the specified resource.
	 * GET /panels/{id}
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
	 * GET /panels/{id}/edit
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
	 * PUT /panels/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /panels/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}