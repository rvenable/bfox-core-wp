<?php

class BfoxRefContext extends BfoxObject {
	var $name;
	var $dependencyName;
	var $updaterClass;

	/**
	 * @var BfoxRef
	 */
	var $ref;

	/**
	 * @var BfoxRefsController
	 */
	var $refsController;

	private $_activeShortName = '';

	function __construct($name, BfoxRefsController $refsController, $initRefStr = 'Genesis 1') {
		$this->name = $name;
		$this->refsController = $refsController;
		$this->dependencyName = 'depends-bfox-ref-context-' . $this->name;
		$this->updaterClass = 'bfox-ref-context-updater';

		parent::__construct();

		$this->initRef($initRefStr);
	}

	protected function initRef($initRefStr) {
		$ref = new BfoxRef($this->lastViewedRefStr());
		if (!$ref->is_valid()) {
			$ref = new BfoxRef($initRefStr);
			if ($ref->is_valid()) $this->setLastViewedRefStr($ref->get_string());
		}

		$this->ref = $ref;
	}

	function setRef(BfoxRef $ref) {
		if ($ref->is_valid()) {
			$this->ref = $ref;
			$this->setLastViewedRefStr($ref->get_string());
		}
	}

	function dependencySelectorAttribute() {
		return 'data-selector=".' . $this->dependencyName . '"';
	}

	function lastViewedRefStr() {
		return $this->refsController->options->userOptionOrCookie('lastViewedRefStr-' . $this->name);
	}

	function setLastViewedRefStr($refStr) {
		return $this->refsController->options->setUserOptionOrCookie('lastViewedRefStr-' . $this->name, $refStr);
	}
}

?>