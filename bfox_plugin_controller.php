<?php

/**
 * A controller class that all Biblefox plugin controllers can extend from
 *
 * Automatically adds WP filters for every method beginning with 'wp' prefix.
 * For instance, declaring a wpInit method would add that method for WP action 'init'.
 *
 * @author richard
 *
 */
class BfoxPluginController {

	function __construct() {
		$this->init();
		$this->_autoAddWPFilters();
	}

	function init() {
	}

	private function _autoAddWPFilters() {
		$methods = get_class_methods($this);
		$prefix = 'wp';
		foreach ($methods as $method) {
			if (self::strHasPrefix($method, $prefix)) {
				$filterName = self::camelCaseToUnderscore($method);
				$filterName = substr($filterName, strlen($prefix));

				$numParams = 1;
				$matches = array();
				if (preg_match('/^(\d+)/', $filterName, $matches)) {
					$numParams = intval($matches[1]);
					$filterName = substr($filterName, strlen($matches[1]));
				}
				$filterName = ltrim($filterName, '_');

				if ($numParams > 1) {
					$this->addFilter($filterName, $method, 10, $numParams);
				}
				else {
					$this->addFilter($filterName, $method);
				}
			}
		}
	}

	static function camelCaseToUnderscore($str) {
		// http://www.mrleong.net/74/php-camel-case-to-underscore/
		return strtolower(preg_replace('/(?<=[a-z])([A-Z])/', '_$1', $str));
	}

	static function strHasPrefix($str, $prefix) {
		// Efficient string prefix detection - http://blog.client9.com/2007/10/php-string-startswith-let-me-count-ways.html
		return strncmp($str, $prefix, strlen($prefix)) == 0;

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