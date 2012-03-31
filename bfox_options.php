<?php

class BfoxOptions extends BfoxObject {
	private $prefix;

	function __construct($prefix) {
		$this->prefix = $prefix;
	}

	private $_values;
	function values() {
		if (is_null($this->_values)) $this->_values = get_option($this->prefix . '_options', array());
		return $this->_values;
	}

	function saveValues() {
		update_option($this->prefix . '_options', $this->values());
	}

	function value($name) {
		$values = $this->values();
		if (isset($values[$name])) return $values[$name];
		return null;
	}

	function setValue($name, $value) {
		$this->_values[$name] = $value;
		$this->saveValues();
	}

	function userOptionName($name) {
		return $this->prefix . '_' . $name;
	}

	function userValue($name, $userID = 0) {
		return get_user_option($this->userOptionName($name), $userID);
	}

	function setUserValue($name, $value, $userID = 0) {
		if (empty($userID)) $userID = $GLOBALS['user_ID'];
		update_user_option($userID, $this->userOptionName($name), $value);
	}

	function cookieName($name) {
		return $this->prefix . '_' . $name;
	}

	var $cookieExpiresAfterSecondsCount = 2592000; // default 30 days from now
	var $cookiePath = '/';

	function cookie($name) {
		$name = $this->cookieName($name);
		if (isset($_COOKIE[$name])) {
			return $_COOKIE[$name];
		}
		return null;
	}

	function setCookie($name, $value) {
		setcookie($this->cookieName($name), $value, time() + $this->cookieExpiresAfterSecondsCount, $this->cookiePath);
	}

	function userOptionOrCookie($name, $userID = 0) {
		if (empty($userID)) $userID = $GLOBALS['user_ID'];
		if (empty($userID)) return $this->cookie('user_' . $name);
		return $this->userValue($name, $userID);
	}

	function setUserOptionOrCookie($name, $value, $userID = 0) {
		if (empty($userID)) $userID = $GLOBALS['user_ID'];
		if (empty($userID)) $this->setCookie('user_' . $name, $value);
		else $this->setUserValue($name, $value, $userID);
	}
}

?>