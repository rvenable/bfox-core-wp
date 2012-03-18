<?php

class BfoxRefLinker extends BfoxObject {

	var $attributeValues = array();
	var $attributeCallbacks = array();

	function __construct() {
		$this->attributeCallbacks = array(
			'href' => $this->functionWithName('urlForRefStr'),
			'data-ref' => $this->functionWithName('refStrCB'),
			'text' => $this->functionWithName('refStrCB'),
		);
	}

	function addAttributeValue($attribute, $value) {
		if (!isset($this->attributeValues[$attribute])) $this->attributeValues[$attribute] = array();

		if (!in_array($value, (array) $this->attributeValues[$attribute])) {
			$this->attributeValues[$attribute] []= $value;
		}
	}

	function removeAttributeValue($attribute, $value) {
		if (!isset($this->attributeValues[$attribute])) return;

		$key = array_search($value, $this->attributeValues[$attribute]);
		if (false !== $key) {
			array_splice($this->attributeValues[$attribute], $key, 1);
		}
	}

	function addClass($class) {
		$this->addAttributeValue('class', $class);
	}

	function removeClass($class) {
		$this->removeAttributeValue('class', $class);
	}

	function urlForRefStr($refStr) {
		return urlencode(strtolower($refStr));
	}

	function refStrCB($refStr) {
		return $refStr;
	}

	function linkForRefStr($refStr, $attributes = array()) {
		if (empty($refStr)) return false;

		$attributes = BfoxArray::unsetEmptyElements($attributes);
		$attributes = BfoxArray::populateArrayUsingCallbacks($attributes, $this->attributeCallbacks, array($refStr, &$this));
		$attributes = BfoxArray::populateArrayUsingArray($attributes, $this->attributeValues);

		$text = $attributes['text'];
		unset($attributes['text']);

		$attributeStr = BfoxHTML::attributeStr($attributes);

		return "<a $attributeStr>$text</a>";
	}

	function linkForTextAndRef($text, BfoxRef $ref, $attributes = array()) {
		$attributes['text'] = $text;
		return $this->linkForRefStr($ref->get_string(), $attributes);
	}

	function refReplaceCallback() {
		return $this->functionWithName('linkForTextAndRef');
	}
}

?>