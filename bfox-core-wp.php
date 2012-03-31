<?php
/*************************************************************************
Plugin Name: Biblefox Core
Plugin URI: https://github.com/rvenable/bfox-core-wp
Description: Includes all the core functionality needed for other Biblefox plugins, primarily including the BfoxRef class, used for manipulating Bible references
Version: 1.0 beta
Author: Biblefox.com, rvenable
Author URI: http://biblefox.com
License: General Public License version 2
Requires at least: WP 3.0, BuddyPress 1.2
Tested up to: WP 3.0, BuddyPress 1.2.4.1
Text Domain: bfox
*************************************************************************/

/*************************************************************************

	Copyright 2010 Biblefox.com

	This file is part of Biblefox for WordPress.

	Biblefox for WordPress is free software: you can redistribute it and/or modify
	it under the terms of the GNU General Public License as published by
	the Free Software Foundation, either version 3 of the License, or
	(at your option) any later version.

	Biblefox for WordPress is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.

	You should have received a copy of the GNU General Public License
	along with Biblefox for WordPress.  If not, see <http://www.gnu.org/licenses/>.

*************************************************************************/

require_once dirname(__FILE__) . '/bfox_object.php';
require_once dirname(__FILE__) . '/bfox_array.php';
require_once dirname(__FILE__) . '/bfox_html.php';
require_once dirname(__FILE__) . '/bfox_string.php';
require_once dirname(__FILE__) . '/bfox_options.php';
require_once dirname(__FILE__) . '/bfox_stack.php';
require_once dirname(__FILE__) . '/bfox_stack_group.php';
require_once dirname(__FILE__) . '/bfox_plugin_controller.php';
require_once dirname(__FILE__) . '/bfox_base_root_plugin_controller.php';
require_once dirname(__FILE__) . '/bfox_root_plugin_controller.php';
require_once dirname(__FILE__) . '/bfox_core_controller.php';

function bfox_load() {
	global $bfox;
	if (is_null($bfox)) {
		$bfox = new BfoxCoreController('bfox-core-wp', 'bfox', '1.0', 1);
		do_action('bfox_load', &$bfox);
	}
	return $bfox;
}
add_action('plugins_loaded', 'bfox_load');

?>