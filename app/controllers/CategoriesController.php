<?php

class CategoriesController extends BaseController {

  public function __construct()
  {
    $this->beforeFilter('auth');
  }
  /**
   * Show all categories
   * GET /categories
   * @return View
   */
  public function index()
  {
    return View::make('admin.categories.index', array('categories' => Category::all()));   
  }

  /**
   * Create resourse
   * GET /categories/create
   * @return View
   */
  public function create()
  {
    return View::make('admin.categories.create');
  }


  /**
   * Store resource
   * POST /categories
   */
  public function store()
  {
    $data = Input::all();
    $rules = array(
      'name' => array('required', 'unique:categories')
    );

    // Create a new validator instance.
    $validator = Validator::make($data, $rules);

    if ($validator->passes()) {
      $category = new Category;
      $category->name = Input::get('name');
      $category->save();
      return Redirect::to('/categories')->with('message', 'Category created successfully.');
    }
    return Redirect::back()->withErrors($validator);
  }
  /**
   * Show form to edit category
   * GET /categories/{id}/edit
   *
   * @param int $id
   * @return View
   */
  public function edit($id)
  {
    return View::make('admin.categories.edit', array('category' => Category::find($id)));   
  }

  /**
   * Update resource
   * @param $id
   * @return View
   */
  public function update($id)
  {
    $category = Category::find($id);
    $rules = array(
      'name' => array('required', 'unique:categories,name'),
    );
    $validator = Validator::make(Input::all(), $rules);
    if ($validator->passes()) {
      $category->name = Input::get('name');
      $category->update();
      return Redirect::back()->with('message', 'Category updated successfully');
    }
    return Redirect::back()->withErrors($validator);
  }

  /**
   * Remove the specified resource from storage.
   * DELETE /categories/{id}
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {
    $category = Category::find($id);
    if (count($category->posts)) {
      return Response::json(array('error' => 'contains posts'), 404);
    }
    $category->delete();
  }
}