<?php

class IntroController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function intro()
	{
		$projects = Project::where('is_featured', '=', true)->get();
		return View::make('intro', array('projects' => $projects));
	}
	// iframe for intro page
	public function iframe($id)
	{
		$project = Project::find($id);
		$gallery = Gallery::where('project_id', '=', $project->id)->first();
		$images = Image::where('gallery_id', '=', $gallery->id)->get();

		return View::make('iframe', array(
			'project' => $project,
			'gallery' => $gallery,
			'images' => $images
		));
	}
}
