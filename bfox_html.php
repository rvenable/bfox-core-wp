<?php

class BfoxHTML {
	static function attributeStr($attributes) {
		$attributeStr = '';
		foreach ($attributes as $attribute => $value) {
			if (is_array($value)) $value = implode(' ', $value);
			$attributeStr .= " $attribute='$value'";
		}
		return $attributeStr;
	}
}

?>