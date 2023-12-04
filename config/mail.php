<?php

return [

	'default' => env('MAIL_MAILER', 'smtp'),

	'mailers' => [

		'smtp' => [

			'transport' => 'mail', //before it was smtp

			'host' => env('MAIL_HOST', 'smtp.mailgun.org'),

			'port' => env('MAIL_PORT', 587),

			'encryption' => env('MAIL_ENCRYPTION', 'tls'),

			'username' => env('MAIL_USERNAME'),

			'password' => env('MAIL_PASSWORD'),

			'timeout' => null,

			'local_domain' => env('MAIL_EHLO_DOMAIN'),

		],
		// ... konfigurasi lainnya ...
	],

	'from' => [
		'address' => env('MAIL_FROM_ADDRESS', 'akunku5521@gmail.com'),
		'name' => env('MAIL_FROM_NAME', 'Revenue App'),
	],

	'markdown' => [
		'theme' => 'default',
		'paths' => [
			resource_path('views/vendor/mail'),
		],
	],

];

?>