<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Template_Home extends Controller_Template
{

	public $template = 'template/home';

	public function before()
	{
		parent::before();

		if ($this->auto_render)
		{
			// keep the last url if it's not home/language
			if(Request::current()->action() != 'language') {
				Session::instance()->set('controller', Request::current()->uri());
			}
			
			if (Auth::instance()->logged_in())
			{
				$this->template->loged = TRUE;
			}
			
			// Initialize empty values
			$this->template->title   = '';
			$this->template->content = '';	
			
			
       
			$this->template->styles = array();
			$this->template->scripts = array(); 

		

		}
	}
	 
}