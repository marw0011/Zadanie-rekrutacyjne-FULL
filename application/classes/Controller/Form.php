<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Form extends Controller_Template_Home {


	public function before() {
		parent::before();
		if (!Auth::instance() -> logged_in()) {
			$this->redirect('account/login');
		}
		$this -> template -> loged = TRUE;
	}
	
	//listing wszystkich wniosków
	public function action_index(){
	
		$view = View::factory('form/list');
		$user = Auth::instance()->get_user()->id;
		$forms = ORM::factory('Form')->where('user_id','=',$user)->order_by('start_vacation','asc')->find_all();
		$view->forms = $forms;	
		$this->template->title = 'Lista Twoich wniosków';		
		$this->template->content = $view;
	}
	


	public function action_add(){

		$view =  View::factory('form/add');
		$form = ORM::factory('Form');
		$errors = NULL;

		if (HTTP_Request::POST == $this -> request -> method()) {
				$post = Validation::factory($_POST)
					->rule('start_vacation','not_empty')
					->rule('end_vacation','not_empty')
					->rule('type','not_empty');
				
				$postFile = Validation::factory($_FILES)
					->rule('file', 'not_empty')
					->rule('file', 'Upload::type', array(':value', array('jpg', 'pdf', 'jpeg')));

					
				if ($post->check() && $postFile->check()) {
						$form->user_id = Auth::instance()->get_user()->id;
						$form->type = $_POST['type'];
						$form->start_vacation = $_POST['start_vacation'];
						$form->end_vacation = $_POST['end_vacation'];
						
						if (isset($_FILES['file']) && !empty($_FILES['file']))
						{
							$filename = $this->_save_doc($_FILES['file']);
							if ( ! $filename)
							{
								Message::set(Message::ERROR, '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button>
								Wystąpił problem podczas przesyłania obrazu. Upewnij się, że przesyłaś obraz w odpowiednim formacie - być plikiem JPG / PDF
								</div>');
							}else{
								$form->file = $filename;
							}
						}
						
						$form->comment = $_POST['comment'];
					try {
						$form->save();
						Message::set(Message::SUCCESS, '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button>Wniosek został pomyślnie wysłany.</div>');
						$this->redirect('/');
						}
						catch (ORM_Validation_Exception $e) {
						$errors = $e->errors('form');
						}
				} else {
					$errors = $post->errors('form');
				}
			}

		$view->errors = $errors;
		$this->template->title = 'Nowy wniosek urlopowy';
		$this->template->content = $view;  
	}
	
	protected function _save_doc($document)
    {
        if (
            ! Upload::valid($document) OR
            ! Upload::not_empty($document) OR
            ! Upload::type($document, array('jpg', 'jpeg','pdf')))
        {
            return FALSE;
        }
 
        $directory = $_SERVER["DOCUMENT_ROOT"].'/upload/';
 
        if ($file = Upload::save($document, NULL, $directory))
        {
		
			$uploaded = $document['name'];
			$ext = pathinfo($uploaded, PATHINFO_EXTENSION);
            $filename = strtolower(Text::random('alnum', 32)).'.'.$ext;
 
 
            return $filename;
        }
 
        return FALSE;
    }
	
}