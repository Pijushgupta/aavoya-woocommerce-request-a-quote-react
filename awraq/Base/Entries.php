<?php

namespace Awraq\Base;

if (!defined('ABSPATH')) exit;

use Awraq\Base\Officer;

class Entries {
	private static $globalScopeName = 'Awraq\Base\Entries';
	public static function enable() {
		add_action('wp_ajax_aqraqEntriesGet', array(self::$globalScopeName, 'aqraqEntriesGet'));
	}

	public static function aqraqEntriesGet() {
		if (!Officer::check($_POST)) wp_die();
		$entries = get_posts(array(
			'post_type' => 'aavoya_wraq_fe',
			'post_per_page' => -1
		));

		$e = array();
		foreach ($entries as $key => $entry) {
			$e[$key]['entry'] = unserialize($entry->post_content);
			$e[$key]['form_name'] = esc_html((string)$entry->post_title);
			$e[$key]['date'] = $entry->post_date;
		}


		if ($entries) {
			echo json_encode($e);
		} else {
			echo json_decode(0);
		}
		wp_die();
	}
}