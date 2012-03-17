<?php

class BfoxString {
	static function camelCaseToUnderscore($str) {
		// http://www.mrleong.net/74/php-camel-case-to-underscore/
		return strtolower(preg_replace('/(?<=[a-z])([A-Z])/', '_$1', $str));
	}

	static function strHasPrefix($str, $prefix) {
		// Efficient string prefix detection - http://blog.client9.com/2007/10/php-string-startswith-let-me-count-ways.html
		return strncmp($str, $prefix, strlen($prefix)) == 0;

	}
}

?>