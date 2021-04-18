<?php defined('SYSPATH') or die('No direct access allowed.');

class Model_Auth_User extends ORM {

	/**
	 * A user has many tokens and roles
	 *
	 * @var array Relationhips
	 */
	protected $_has_many = array(
		'user_tokens' => array('model' => 'user_token'),
		'roles'       => array('model' => 'role', 'through' => 'roles_users'),
		'forms' => array('model' => 'Form', 'foreign_key' => 'user_id'),
	);
	
  protected $_table_columns = array(
    'id' => array(),
    'username' => array(),
	'password' => array(),
    'firstname' => array(),
    'name' => array(),
	'sex' => array(),
	'logins' => array(),
	'last_login' => array(),
  ); 
	

	public function rules()
	{
		return array(
			'username' => array(
				array('not_empty'),
				array('max_length', array(':value', 64)),
				array(array($this, 'unique'), array('username', ':value')),
			),
			'password' => array(
				array('not_empty'),
				array('min_length', array(':value', 8)),
			),
		);
	}

	public function filters()
	{
		return array(
			'password' => array(
				array(array(Auth::instance(), 'hash'))
			)
		);
	}

	public function labels()
	{
		return array(
			'username'         => 'login',
			'password'         => 'hasło',
		);
	}


	public function complete_login()
	{
		if ($this->_loaded)
		{
			// Update the number of logins
			$this->logins = new Database_Expression('logins + 1');

			// Set the last login date
			$this->last_login = time();

			// Save the user
			$this->update();
		}
	}

	public function unique_key_exists($value, $field = NULL)
	{
		if ($field === NULL)
		{
			$field = $this->unique_key($value);
		}

		return (bool) DB::select(array('id', 'total_count'))
			->from($this->_table_name)
			->where($field, '=', $value)
			->where($this->_primary_key, '!=', $this->pk())
			->execute($this->_db)
			->get('total_count');
	}


	public function unique_key($value)
	{
		return Valid::email($value) ? 'email' : 'username';
	}

	public static function get_password_validation($values)
	{
		return Validation::factory($values)
			->rule('password_1', 'min_length', array(':value', 8))
			->rule('password_2', 'matches', array(':validation', ':field', 'password_1'));
	}


	public function create_user($values, $expected)
	{
		// Validation for passwords
		$extra_validation = Model_User::get_password_validation($values)
			->rule('password', 'not_empty');

		return $this->values($values, $expected)->create($extra_validation);
	}




}