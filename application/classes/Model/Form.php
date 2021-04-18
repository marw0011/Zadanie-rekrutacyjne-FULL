<?php defined('SYSPATH') OR die('No direct access allowed.');

class Model_Form extends ORM {


    protected $_table_name = 'forms';
 
    //tutaj zdefiniujemy relacje
    protected $_belongs_to = array(
		'user' => array('model' => 'User', 'foreign_key' => 'user_id'),
	);
	
}
?>