<?php

/**
 * Serves as the base controller for all Root plugin controllers
 *
 * BfoxCoreController and BfoxRootPluginController extend from this, so this
 * class provides shared functionality between them, without BfoxCoreController
 * needing to take everything that BfoxRootPluginController provides.
 *
 * @author richard
 *
 */
class BfoxBaseRootPluginController extends BfoxPluginController {

	var $slug;
	var $prefix;
	var $version;
	var $buildVersion;
	var $dir;
	var $apiDir;
	var $url;

	function __construct($slug, $prefix, $version, $buildVersion) {
		$this->slug = $slug;
		$this->prefix = $prefix;
		$this->version = $version;
		$this->buildVersion = $buildVersion;

		parent::__construct();
	}

	function init() {
		$this->dir = WP_PLUGIN_DIR . '/' . $this->slug;
		$this->apiDir = $this->dir . '/api';

		$this->url = WP_PLUGIN_URL . '/' . $this->slug;
	}
}

?>