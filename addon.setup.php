<?php

if (!defined('HSTS_HEADER_VERSION')) {
    define('HSTS_HEADER_VERSION', '1.0.0');
}

return array(
	'author'         => 'JCOGSDesign',
	'author_url'     => 'https://JCOGS.net/',
    'docs_url'      => 'https://github.com/JCOGSDesign/hsts_header',
	'name'           => 'HSTS Header',
	'description'    => 'This plugin allows you to set HTTP HSTS Header in your template.',
	'version'        => HSTS_HEADER_VERSION,
	'namespace'      => 'JCOGSDesign\Addons\HSTSHeader',
	'settings_exist' => FALSE,
	'built_in'       => FALSE,
);
