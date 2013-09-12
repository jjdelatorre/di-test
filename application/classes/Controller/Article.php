<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Article extends Controller {

	public function action_create()
	{
		$view = View::factory(Kohana::$config->load('site.templates.main'))
            ->set('form_values', $_POST)
            ->bind('form_errors', $errors);

    	$view->title = Kohana::$config->load('site.title_preffix').'Create Article';
    	$view->sub_view = 'article_form';


    	if ($_POST)
    	{
            $article = ORM::factory('Article')
                ->values($_POST, array('title', 'author', 'body'));
            $article->timestamp = date("Y-m-d H:i:s");
     
            try
            {
                $article->save();
                $this->redirect('/home', 302);
            }
            catch (ORM_Validation_Exception $e)
            {
                $errors = $e->errors('models');
            }
        }

        $this->response->body($view);

	}

    public function action_edit()
    {
        $article = ORM::factory('Article', $this->request->param('id'));

        $view = View::factory(Kohana::$config->load('site.templates.main'))
            ->set('form_values', $article->as_array())
            ->bind('form_errors', $errors);

        $view->title = Kohana::$config->load('site.title_preffix').'Edit Article';
        $view->sub_view = 'article_form';

        if ($_POST)
        {
            $view->form_values = $_POST;
            $article->title = Arr::get($_POST, 'title');
            $article->author = Arr::get($_POST, 'author');
            $article->body = Arr::get($_POST, 'body');
            $article->timestamp = date("Y-m-d H:i:s");
     
            try
            {
                $article->save();
                $this->redirect('/home', 302);
            }
            catch (ORM_Validation_Exception $e)
            {
                $errors = $e->errors('models');
            }
        }

        $this->response->body($view);

    }

    public function action_get_all()
    {
        if ($this->request->param('id') == 'json')
        {
            $articles = ORM::factory('Article')->find_all()->as_array();
            $articles_json = array();
            foreach ($articles as $article) {
                $articles_json[] =  $article->as_array();
            }
            echo json_encode($articles_json);
        }
        return;

        
    }

    public function action_delete()
    {
        $article_id = json_decode($this->request->body())->article_id;
        $article = ORM::factory('Article', $article_id);
        if ($article->loaded())
        {
            $article->delete();
            echo json_encode(array('result' => 'ok'));  
        }
        else 
        {
            echo json_encode(array('result' => 'fail')); 
        }        
        return;
    }

    public function action_edit_from_json()
    {
        $article_values = json_decode($this->request->body())->article;
        $article = ORM::factory('Article', $article_values->id);
        if ($article->loaded())
        {
            $article->title = $article_values->title;
            $article->author = $article_values->author;
            $article->body = $article_values->body;
            $article->timestamp = $article_values->date;

            try
            {
                $article->save();
                echo json_encode(array('result' => 'ok'));
            }
            catch (ORM_Validation_Exception $e)
            {
                echo json_encode(array('result' => 'FAIL: '.$e->errors('models'))); 
            }
            

        }
        else 
        {
            echo json_encode(array('result' => 'Article Not Found')); 
        }        
        return;

  
    }


} // End Home