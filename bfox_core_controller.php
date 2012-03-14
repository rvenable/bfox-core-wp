<?php

/**
 * This class provides the core functionality behind all Biblefox plugins
 *
 * The shared instance of this class is usually accessed through the global
 * $bfox variable, or in plugin controllers via the $core property.
 *
 * @author richard
 *
 */
class BfoxCoreController extends BfoxBaseRootPluginController {

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