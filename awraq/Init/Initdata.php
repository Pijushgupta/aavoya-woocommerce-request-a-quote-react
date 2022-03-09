<?php

namespace Awraq\Init;

if (!defined('ABSPATH')) {
	exit;
}



final class Initdata
{

	public static function addInitData()
	{

		/**
		 * adding default data(option - css) incase its not present in database.
		 */
		if (get_option('aavoya_wraq_global_settings', null) == null) {

			update_option('aavoya_wraq_global_settings', self::globalData());
		}

	
	}

	public static function globalData()
	{
		$globaldata = array(
			'corners'				=>intval(8),
			'paddingX'				=>intval(15),
			'paddingY'				=>intval(7),
			'letterSpacing'			=>intval(1),
			'fontSize'				=>intval(16),
			'fontWeight'			=>intval(400),
			'backgroundColor'		=>sanitize_hex_color('#1f40ab'),
			'hoverBackgroundColor'	=>sanitize_hex_color('#1f40ab'),
			'textColor'				=>sanitize_hex_color('#ffffff'),
			'hoverTextColor'		=>sanitize_hex_color('#ffffff'),
			'buttonText'			=>sanitize_text_field('Request a Quote'),
			'cssClass'				=>sanitize_html_class('awraq'),
			'borderTab'				=>rest_sanitize_boolean(false),
			'borderType'			=>sanitize_text_field('none'),
			'borderWidth'			=>intval(2),
			'borderColor'			=>sanitize_hex_color('#1f40ab'),
			'hoverBorderType'		=>sanitize_text_field('none'),
			'hoverBorderWidth'		=>intval(2),
			'hoverBorderColor'		=>sanitize_hex_color('#1f40ab'),
		);
		return serialize($globaldata);
	}
}
