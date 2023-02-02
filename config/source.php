<?php

return [
	/*
	 * The key that will be used to remember the source in the session.
	 */
	'session_key' => 'source',

	/*
	 * The sources used to determine the source.
	 */
	'sources' => [
	    Nookest\Source\Types\UtmTag::class,
	    Nookest\Source\Types\SearchEngine::class,
	    Nookest\Source\Types\SocialNetwork::class,
	    Nookest\Source\Types\Referral::class,
	],

	/*
	 * The search engines.
	 */
	'search_engines' => [
	    'google.com',
	    'bing.com',
	    'google.ru',
	    'yandex.ru',
	    'mail.ru'
	],

	/*
	 * The social networks.
	 */
	'social_networks' => [
	    'facebook.com',
	    'twitter.com',
	    'vk.com',
	    'ok.ru'
	]
];