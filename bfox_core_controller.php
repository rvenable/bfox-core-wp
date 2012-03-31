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
		require_once $this->dir . '/bfox_ref_context.php';
		require_once $this->dir . '/bfox_ajax_div.php';
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

	function wpInit() {
		wp_register_script('bfox_ajax', $this->url . '/bfox_ajax.js', array('jquery'), $this->version);
		wp_localize_script('bfox_ajax', 'BfoxAjax', $this->javaScriptVars);
	}

	private $divs = array();

	/**
	 * @return BfoxAjaxDiv
	 */
	function ajaxDiv($id) {
		if (isset($this->divs[$id])) return $this->divs[$id];
		return null;
	}

	/**
	 * @return BfoxAjaxDiv
	 */
	function registerAjaxDiv(BfoxAjaxDiv $div, $enableNoPrivilege = false) {
		if ($enableNoPrivilege) {
			$div->enableNoPrivilege();
		}
		$this->divs[$div->id] = $div;
		return $div;
	}
}

?>