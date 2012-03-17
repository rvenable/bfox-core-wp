<?php

class BfoxObject {

	function __construct() {
		$this->init();
	}

	/**
	 * Init just provides a way to initialize a class, without having to deal with constructor parameters
	 * (since init accepts no params, but child classes might add params to the constructor)
	 */
	function init() {
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

	function filterName($filter) {
		return $this->prefix . '_' . $filter;
	}
}

?>