<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
=====================================================
HSTS Header Plugin for ExpressionEngine 3 & 4
-----------------------------------------------------
https://JCOGS.net
-----------------------------------------------------

This plugin allows you to set HTTP HSTS Header in your template.  
It was inspired by (and fills a gap in) Ellis Labs http_header add-on that ships with EE3/4.

=====================================================
CHANGELOG

1.0.0 - Initial release - Whoop!

=====================================================
*/

/**
 * HSTS Header Plugin
 */
class Hsts_header {

	public $return_data;

	/**
     * @var string
     */
    public $version = URL_HELPER_VERSION;

	public function __construct()
	{
		$set_header = '"';
		$set_env = '';

		foreach (ee()->TMPL->tagparams as $key => $value)
		{
			$key = strtolower($key);
			$value = $this->parseTags($value);

			if ($key === 'max_age' && is_numeric($value))
			{
				$set_header .= 'max-age='.$value.';';
			} 
			if ($key === 'include_sub_domains' && $value === 'yes')
			{
				$set_header .= 'includeSubDomains;';
			}
			if ($key === 'preload' && $value === 'yes')
			{
				$set_header .= 'preload';
			}
			if ($key === 'env_https' && $value === 'yes')
			{
				$set_env .= 'env=HTTPS';
			}
		}
		if (strpos($set_header, 'max-age') === false)  // we didn't get a value for max-age specified
		{
			$set_header .= 'max-age=86400;';
		}
		$set_header .= '"';
		$submit_header = $set_header.' '.$set_env;
		ee('Response')->setHeader('Strict-Transport-Security', $submit_header);
		return;
	}

	/**
	 * If the value appears to have tags in it we'll run it through the parse_globals
	 * method.
	 *
	 * @param string $value The header value
	 * @return string The header with the tags parsed and replaced.
	 */
	private function parseTags($value)
	{
		if (strpos($value, '{') !== FALSE && strpos($value, '}') !== FALSE)
		{
			return ee()->TMPL->parse_globals($value);
		}

		return $value;
 	}

}
// END CLASS

// EOF
