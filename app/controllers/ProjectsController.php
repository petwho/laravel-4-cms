<?php

class ProjectsController extends \BaseController {
	/* Apply filter */
	public function __construct()
	{
		$this->beforeFilter('auth');
	}

	/**
	 * Display a listing of the resource.
	 * GET /latestproject
	 *
	 * @return Response
	 */
	public function index()
	{
		$projects = Project::all();
		return View::make('admin.projects.index', array('projects' => $projects));
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /latestproject/create
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('admin.projects.create');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /latestproject
	 *
	 * @return Response
	 */
	public function store()
	{
		$data = Input::all();
		print_r($data);exit();
		$rules = array(
		  'name' => array('required'),
		  'image' => array('required'),
		  'is_featured' => array('required'),
		);
		// Create a new validator instance.
		$validator = Validator::make($data, $rules);

		if ($validator->passes()) {
		  Project::create(Input::all());
		  return Redirect::back()->with('message', 'Project created successfully.');
		}
		return Redirect::back()->withErrors($validator);
	}

	/**
	 * Display the specified resource.
	 * GET /latestproject/{id}
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
	 * GET /latestproject/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$project = Project::find($id);
	    if ($project) {
			  return View::make('admin.projects.edit', array('project' => $project));
	    }
	    return Redirect::back()->with('message', 'No projects was found');
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /latestproject/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$project = Project::find($id);
		if (!$project) {
			Redirect::back()->with('message', 'Invalid request');
		}
		$data = Input::all();
		$rules = array(
		  'name' => array('required'),
		  'image' => array('required'),
		  // 'is_featured' => array('required'),
		);
		// Create a new validator instance.
		$validator = Validator::make($data, $rules);
		Input::merge(array('is_featured' =>  Input::get('is_featured') ? true : false));

		if ($validator->passes()) {
		  $project->update(Input::all());
		  return Redirect::back()->with('message', 'Project updated successfully');
		}
		return Redirect::back()->withErrors($validator);
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /latestproject/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}