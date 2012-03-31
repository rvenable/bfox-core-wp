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

	/**
	 * @var BfoxRefsController
	 */
	var $refs = null;

	/**
	 * @var BfoxIndexController
	 */
	var $index = null;

	/**
	 * @var BfoxToolsController
	 */
	var $tools = null;

	/**
	 * @var BfoxTooltipsController
	 */
	var $tooltips = null;

	var $javaScriptVars = array();

	/**
	 * @var BfoxStackGroup
	 */
	var $stackGroup = null;

	function init() {
		parent::init();

		$this->refDir = $this->dir . '/external/biblefox-ref';

		require_once $this->dir . '/bfox_refs_controller.php';
		require_once $this->dir . '/bfox_ref_linker.php';
		require_once $this->refDir . '/biblefox-ref.php';
		require_once $this->apiDir . '/bfox_ref-functions.php';
		require_once $this->apiDir . '/bfox_ref-template.php';

		$this->stackGroup = new BfoxStackGroup();
		$this->refs = new BfoxRefsController();
		$this->refs->core = $this;

		// declare the URL to the file that handles the AJAX request (wp-admin/admin-ajax.php)
		// See: http://www.garyc40.com/2010/03/5-tips-for-using-ajax-in-wordpress/
		$this->javaScriptVars = array(
			'ajaxurl' => admin_url('admin-ajax.php'),
		);
	}
}

?>