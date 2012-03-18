<?php

class BfoxArray {

	static function unsetEmptyElements($array) {
		foreach ($array as $key => $value) {
			if (empty($value)) unset($array[$key]);
		}
		return $array;
	}

	static function populateArrayUsingArray($array, $array2) {
		foreach ($array2 as $key => $value) {
			if (!isset($array[$key])) {
				$array[$key] = $value;
			}
			else if (is_array($value)) {
				// If the value is an array, we can merge it into the existing value
				$array[$key] = array_merge((array)$array[$key], $value);
			}
		}
		return $array;
	}

	static function populateArrayUsingCallbacks($array, $callbacks, $parameters = array()) {
		foreach ($callbacks as $key => $callback) {
			if (!isset($array[$key])) {
				$value = call_user_func_array($callback, $parameters);
				if (!is_null($value)) $array[$key] = $value;
			}
		}
		return $array;
	}
}

?>