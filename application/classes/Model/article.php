<?php defined('SYSPATH') or die('No direct script access.');

class Model_Article extends ORM
{
    protected $_table_name = 'articles';
    protected $_db_group = 'default';

    public function rules()
	{
		return array(
            'title' => array(
                array('not_empty'),
                array('min_length', array(':value', 4)),
                array('max_length', array(':value', 32)),
            ),
            'author' => array(
                array('not_empty'),
            ),
            'body' => array(
                array('not_empty'),
            ),
        );
	}
}