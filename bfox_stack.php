<?php

class BfoxStack {
	protected $stack = array();
	protected $currentItem = null;

	function push($item) {
		if (!is_null($this->currentItem)) $this->stack []= $this->currentItem;
		$this->currentItem = $item;
	}

	function pop() {
		$this->currentItem = array_pop($this->stack);
		return $this->currentItem;
	}

	function current() {
		return $this->currentItem;
	}
}

?>