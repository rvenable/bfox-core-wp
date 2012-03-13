<?php

class BfoxCoreController extends BfoxBasePluginController {

	var $refDir;

	function init() {
		parent::init();

		$this->refDir = $this->dir . '/external/biblefox-ref';

		require_once $this->refDir . '/biblefox-ref.php';
		require_once $this->dir . '/bfox_ref.php';
		require_once $this->apiDir . '/bfox_ref-functions.php';
		require_once $this->apiDir . '/bfox_ref-template.php';
	}
}

?>