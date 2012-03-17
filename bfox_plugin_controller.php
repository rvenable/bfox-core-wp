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
class BfoxPluginController extends BfoxObject {

	function __construct() {
		parent::__construct();
		$this->_autoAddWPFilters();
	}

	private function _autoAddWPFilters() {
		$methods = get_class_methods($this);
		$prefix = 'wp';
		foreach ($methods as $method) {
			if (BfoxString::strHasPrefix($method, $prefix)) {
				$filterName = BfoxString::camelCaseToUnderscore($method);
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
}

?>