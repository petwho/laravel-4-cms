<?php
use Illuminate\Database\Eloquent\SoftDeletingTrait;
class PostsController extends \BaseController {

  public function __construct()
  {
    $this->beforeFilter('auth');
  }

  public function index()
  {
    return View::make('admin.posts.index', array(
        'posts' => Post::withTrashed()->get(),
        'published_posts' => Post::all(),
        'trashed_posts' => Post::onlyTrashed()->get()));
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
    $post = Post::withTrashed()->where('id', $id)->first();
    if ($post) {
      return View::make('admin.posts.edit', array('post' => $post));
    }
    return Redirect::back()->with('message', 'No posts was found');
  }

  /**
   * Show the form for creating a new resource.
   * GET /posts/create
   * @Return Respon 
   */

  public function create()
  {
    return View::make('admin.posts.create');
  }

  /**
   * Store a newly created resource in storage.
   * POST /posts
   * @Return Respon 
   */

  public function store()
  {
    $data = Input::all();
    $rules = array(
      'category_id' => array('required'),
      'title' => array('required'),
      'summary' => array('required'),
      'image' => array('required'),
    );
    // Create a new validator instance.
    $validator = Validator::make($data, $rules);

    if ($validator->passes()) {
      Post::create(Input::all());
      return Redirect::back()->with('message', 'Post created successfully.');
    }
    return Redirect::back()->withErrors($validator);
  }
}