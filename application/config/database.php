<?php defined('SYSPATH') or die('No direct access allowed.');

return array
(
	'default' => array
	(
		'type'       => 'PDO',
		'connection' => [
			/**
			 * The following options are available for PDO:
			 *
			 * string   dsn         Data Source Name
			 * string   username    database username
			 * string   password    database password
			 * boolean  persistent  use persistent connections?
			 */
			'dsn'        => 'mysql:host=localhost;dbname=autogielda_5',
			'username'   => 'autogielda_5',
			'password'   => 'Mozambik1',
			'persistent' => FALSE,
		],
		'table_prefix' => '',
		'charset'      => 'utf8',
		'caching'      => FALSE
	),
);
