<?php
return array(
    'name' => array(
        'not_empty' => 'Podaj nazwisko'
    ),
	'firstname' => array(
        'not_empty' => 'Podaj imię'
    ),
	'username' => array(
        'not_empty' => 'Musisz podać login'
    ),
	'password_1' => array(
        'not_empty' => 'Podaj hasło',
		'min_length' => 'Hasło musi składać się z min. 8 znaków',
    ),
	'password_2' => array(
        'not_empty' => 'Pole powtórz hasło jest wymagane',
		'min_length' => 'Hasło musi składać się z min. 8 znaków',
		'matches' => 'Podane hasła nie pasują do siebie',
    ),
	'sex' => array(
        'not_empty' => 'Podaj swoją płeć'
    ),

);