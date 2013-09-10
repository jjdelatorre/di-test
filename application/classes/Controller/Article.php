<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Article extends Controller {

	public function action_create()
	{
		$view = View::factory(Kohana::$config->load('site.templates.main'));

		  // $view = View::factory('members/create')
    //     ->set('values', $_POST)
    //     ->bind('errors', $errors);

    	$view->title = Kohana::$config->load('site.title_preffix').'Create Article';
    	$view->sub_view = 'article_form';


    	// if ($_POST)
    	// {
     //    $member = ORM::factory('Member')
     //        // The ORM::values() method is a shortcut to assign many values at once
     //        ->values($_POST, array('username', 'password'));
 
     //    $external_values = array(
     //        // The unhashed password is needed for comparing to the password_confirm field
     //        'password' => Arr::get($_POST, 'password'),
     //    // Add all external values
     //    ) + Arr::get($_POST, '_external', array());
     //    $extra = Validation::factory($external_values)
     //        ->rule('password_confirm', 'matches', array(':validation', ':field', 'password'));
 
     //    try
     //    {
     //        $member->save($extra);
     //        // Redirect the user to his page
     //        $this->request->redirect('members/'.$member->id);
     //    }
     //    catch (ORM_Validation_Exception $e)
     //    {
     //        $errors = $e->errors('models');
     //    }
    // }

        	$this->response->body($view);

	}


} // End Home