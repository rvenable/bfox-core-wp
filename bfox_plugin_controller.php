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
		$this->_autoAddWPFilters($this->filterParams());
	}

	function init() {
	}

	function filterParams() {
		return array();
	}

	private function _autoAddWPFilters($filterParams) {
		$methods = get_class_methods($this);
		$prefix = 'wp';
		foreach ($methods as $method) {
			if (self::strHasPrefix($method, $prefix)) {
				$filterName = self::camelCaseToUnderScore($method);
				$filterName = substr($filterName, strlen($prefix) + 1); // +1 for the underscore

				if (isset($filterParams[$method])) {
					$params = $filterParams[$method];
					if (!isset($params[1])) $params[1] = 1;
					$this->addFilter($filterName, $this->functionWithName($method), $params[0], $params[1]);
				}
				else {
					$this->addFilter($filterName, $this->functionWithName($method));
				}
			}
		}
	}

	static function camelCaseToUnderScore($str) {
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