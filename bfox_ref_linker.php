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