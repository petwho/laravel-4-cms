<?php
use Illuminate\Database\Eloquent\SoftDeletingTrait;
class MenusController extends \BaseController {

	public function __construct()
	{
		$this->beforeFilter('auth');
	}

	/**
	 * Display a listing of the resource.
	 * GET /menus
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('admin.menus.index', array(
				'menus' => Menu::withTrashed()->get(),
				'published_menus' => Menu::all(),
				'trashed_menus' => Menu::onlyTrashed()->get()));
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /menus/create
	 *
	 * @return Response
	 */
	public function create()
	{
    return View::make('admin.menus.create');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /menus
	 *
	 * @return Response
	 */
	public function store()
	{
		$data = Input::all();
    $rules = array(
      'title' => array('required', 'min:3'),
      'alias' => array('required', 'alpha_dash', 'unique:menus,alias')
    );

    // Create a new validator instance.
    $validator = Validator::make($data, $rules);

    if ($validator->passes()) {
      $menu = new Menu;
      $menu->title = Input::get('title');
      $menu->alias = Input::get('alias');
      $menu->save();
      return Redirect::to('/menus')->with('message', 'Menu created successfully.');
    }
    return Redirect::back()->withErrors($validator);
	}

	/**
	 * Display the specified resource.
	 * GET /menus/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$menu = Menu::find($id);
		return var_dump($menu);
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /menus/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$menu = Menu::withTrashed()->where('id', $id)->first();
    if ($menu) {
		  return View::make('admin.menus.edit', array('menu' => $menu));
    }
    return Redirect::back()->with('message', 'No menus was found');
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /menus/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$data = Input::all();
    $rules = array(
      'title' => array('required', 'min:3'),
      'alias' => array('required', 'alpha_dash', 'unique:menus,alias,'.$id)
    );

    // Create a new validator instance.
    $validator = Validator::make($data, $rules);

    if ($validator->passes()) {
      $menu = Menu::find($id);
      $menu->title = Input::get('title');
      $menu->alias = Input::get('alias');
      $menu->update();
      return Redirect::back()->with('message', 'Menu updated successfully');
    }
    return Redirect::back()->withErrors($validator);
	}

	/**
	* Restore menu
	*/
	public function restore($id)
	{
		$menu = Menu::onlyTrashed()->where('id', $id);
		if ($menu) {
			$menu->restore();
		}
	}

	/**
	 * Trash the specified resource from storage.
	 * DELETE /menus/{id}/trash
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function trash($id)
	{
		$menu = Menu::find($id);
		if ($menu) {
			$menu->delete();
		}
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /menus/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$menu = Menu::withTrashed()->where('id', $id);
		if ($menu) {
			$menu->forceDelete();
		}
	}

}