<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Welcome extends Controller_Template_Home {

	public function before()
	{
		parent::before();
	}
	
	
	public function action_index()
	{
		// admin zalogowany, przekierowanie do pulpitu
		if (!Auth::instance()->logged_in()) {
			$this->redirect('account/login'); 
		}else{

			$this->template->title = 'Strona główna';
		
		}
	}
}