<?php

namespace Awraq\Frontend\Essentials;

if (!defined('ABSPATH')) exit;

class Action
{
	public static function create()
	{
		return '<input type="hidden" name="action" value="awraqfSubmit" />';
	}
}
