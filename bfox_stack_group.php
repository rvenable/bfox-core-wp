<?php

class BfoxStackGroup {
	protected $stacks = array();

	/**
	 * @param string $key
	 * @return BfoxStack
	 */
	function stackForKey($key) {
		if (!isset($this->stacks[$key])) $this->stacks[$key] = new BfoxStack();
		return $this->stacks[$key];
	}

	function push($key, $item) {
		$stack = $this->stackForKey($key);
		$stack->push($item);
	}

	function pop() {
		$stack = $this->stackForKey($key);
		return $stack->pop();
	}

	function current() {
		$stack = $this->stackForKey($key);
		return $stack->current();
	}
}

?>