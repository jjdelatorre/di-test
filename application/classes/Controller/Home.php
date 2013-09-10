<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Home extends Controller {

	public function action_index()
	{
		$view = View::factory(Kohana::$config->load('site.templates.main'));

		$articles = ORM::factory('Article')->find_all()->as_array();

    	$view->title = Kohana::$config->load('site.title_preffix').'Home';
    	$view->sub_view = 'index';
    	$view->articles = $articles;

    	$this->response->body($view);
	}

} // End Home
