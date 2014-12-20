<?php

class UsersController extends \BaseController {
	/* Apply filter */
	public function __construct()
	{
		$this->beforeFilter('auth');
	}

	/**
	 * Display a listing of the resource.
	 * GET /users
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('admin.users.index', array('users' => User::all()));
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /users/create
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('admin.users.create');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /users
	 *
	 * @return Response
	 */
	public function store()
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

	/**
	 * Display the specified resource.
	 * GET /users/{id}
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
	 * GET /users/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$user = User::find($id);
		return View::make('admin.users.edit', array('user' => $user));
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /users/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$user = User::find($id);
		$data = Input::all();
		$rules = array(
		  'username' => array('alpha_num', 'min:3', 'unique:users,username,'.$id),
		  'email' => array('email', 'unique:users,email,'.$id)
		);

		// Create a new validator instance.
		$validator = Validator::make($data, $rules);

		if ($validator->passes()) {
		  $user->username = Input::get('username');
		  $user->password = Hash::make(Input::get('password'));
		  $user->email = Input::get('email');
		  $user->save();
		  return Redirect::back()->with('message', 'User updated successfully.');
		}
		return Redirect::back()->withErrors($validator);
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /users/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$user = User::find($id);
		if ($user) {
			$user->delete();
		}
	}

}