<?php

class BfoxBasePluginController {

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

		$this->addAction('init', 'wpInit');

		$this->init();
	}

	function functionWithName($functionName) {
		return array(&$this, $functionName);
	}

	function addAction($tag, $functionToAdd, $priority = 10, $acceptedArgs = 1) {
		return add_action($tag, $this->functionWithName($functionToAdd), $priority, $acceptedArgs);
	}

	function addFilter($tag, $functionToAdd, $priority = 10, $acceptedArgs = 1) {
		return add_filter($tag, $this->functionWithName($functionToAdd), $priority, $acceptedArgs);
	}

	function init() {
		$this->dir = WP_PLUGIN_DIR . '/' . $this->slug;
		$this->apiDir = $this->dir . '/api';

		$this->url = WP_PLUGIN_URL . '/' . $this->slug;
	}

	function filterName($filter) {
		return $this->prefix . '_' . $filter;
	}

	function wpInit() {
	}
}

?>