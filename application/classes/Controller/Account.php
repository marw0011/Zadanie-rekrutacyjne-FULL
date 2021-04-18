<?php

class Controller_Account extends Controller_Template_Home {


	public function action_register()
	{
		$errors = NULL;
		if (isset ($_POST['submit']) && HTTP_Request::POST == $this -> request -> method()) {
			$post = Validation::factory($_POST)
				->rule('username','not_empty')
				->rule('firstname','not_empty')
				->rule('name','not_empty')
				->rule('password_1','not_empty')
				->rule('password_2','not_empty')
				->rule('password_2', 'matches', array(':validation', ':field', 'password_1'))
				->rule('password', 'min_length', array(':value','8'))
				->rule('sex','not_empty');
				
			if ($post->check()) {
			
				$user = ORM::factory('User');
				$user->values(array(
					'username'	=> $_POST['username'],
					'password'	=> $_POST['password_1'],
					'firstname'	=> $_POST['firstname'],
					'name'	=> $_POST['name'],
					'sex'	=> $_POST['sex'],
				));
				
				try {
					if($user->save()){
					$user->add('roles', ORM::factory('Role')->where('name', '=', 'login')->find());
					}
					Message::set(Message::SUCCESS, '<div data-alert class="alert alert-success">Konto zostało pomyślnie zarejestrowane. Możesz się zalogować!</div>');
					
					$this -> redirect('/');
					
					}
				catch (ORM_Validation_Exception $e) {
					$errors = $e->errors('user');
					}
			} else {
				$errors = $post->errors('user');
			}
		}
		
		$view = View::Factory('account/register')
			->bind('post', $post)
			->bind('errors', $errors);	
		$this->template->content = $view;
		$this->template->title = 'Rejestracja';

	}


	// login
	public function action_login()
	{
		$errors = NULL;
		if (Auth::instance()->logged_in()) {
			$this->request->redirect('/');
		}else{
		
		
		if (isset($_POST['username']) && Valid::not_empty($_POST)) {
		

			$post = Validation::factory($_POST)
			->rule('username', 'not_empty')
			->rule('password', 'not_empty')
			->rule('password', 'min_length', array(':value', 8));
			$remember = isset($post['remember']);
		
			//TODO use email or username login
			if ($post->check())
			{
				if(Auth::instance()->login($post['username'], $post['password'])){
				
					$user = ORM::factory('User','=',Auth::instance()->get_user()->id)->find();
					if($user->sex == 'F'){$sex = 'kobieta';}else if($user->sex == 'M'){$sex = 'mężczyzna';}
					Message::set(Message::SUCCESS, '<div data-alert class="alert alert-success">Witaj '.$user->firstname.' '.$user->name.' ('.$sex.')</div>');
					$this->redirect('/');
				}else{
					Message::set(Message::ERROR, '<div data-alert class="alert alert-danger">Podałeś nieprawidłowe dane logowania lub Twoje konto jest nieaktywne!</div>');
				}
			} else {
				$errors = $post->errors('user');
			}
		}

		// display
		$this->template->content = View::factory('account/login')
			->bind('post', $post)
			->bind('errors', $errors);	
			
		$this->template->title = 'Logowanie';
			
		}
	}
	
	
	static function pwdexist($validation, $email)
	{
		if(!ORM::factory('User')->unique_key_exists($validation[$email])) {
			$validation->error($email, 'emailexistnot');
		}
	}
	

	
	public function action_logout()
	{
		Auth::instance()->logout();
		$this->redirect('/');
	}


}