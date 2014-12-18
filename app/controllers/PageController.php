<?php

class PageController extends BaseController {

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

    // This function is to render the home page
	public function showHome()
	{
		return View::make('home');
	}

    // This function is to render the Lorem Ipsum Generator page
    public function showItem()
    {
        return View::make('item');
    }
}
