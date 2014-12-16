<?php

class TabsController extends \BaseController {

	/* Apply filter */
	public function __construct()
	{
		$this->beforeFilter('auth');
	}

	/**
	 * Display a listing of the resource.
	 * GET /tabs
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('admin.tabs.index', array('tabs' => Tab::all()));
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /tabs/create
	 *
	 * @return Response
	 */
	public function create()
	{
		$panels = Panel::all();
		$panelList = [];
		foreach($panels as $panel) {
			$panelList[$panel->id] = $panel->title;
		}
		return View::make('admin.tabs.create', ['panelList' => $panelList]);
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /tabs
	 *
	 * @return Response
	 */
	public function store()
	{
		Tab::create([
			'title' => Input::get('title'),
			'panel_id' => Input::get('panel_id')
		]);
		return Redirect::back()->with('message', 'Tab created successfully!');
	}

	/**
	 * Display the specified resource.
	 * GET /tabs/{id}
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
	 * GET /tabs/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$tab = Tab::find($id);
		$panels = Panel::all();
		$panelList = [];
		foreach($panels as $panel) {
			$panelList[$panel->id] = $panel->title;
		}
		$selectedPanel = $tab->panel_id;
		return View::make('admin.tabs.edit', array(
			'tab' => $tab,
			'panelList' => $panelList,
			'selectedPanel' => $selectedPanel
		));
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /tabs/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$tab = Tab::find($id);
		$tab->title = Input::get('title');
		$tab->save();
		return Redirect::back()->with('message', 'Tab updated!');
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /tabs/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$tab = Tab::find($id);
		if ($tab) {
			$tab->delete();
			return 'deleted ok';
		}
	}

}