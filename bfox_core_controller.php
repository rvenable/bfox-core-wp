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
			'refreshAnimationDuration' => 0,
			'refreshAnimationOpacity' => 1.0,
		);
	}

	function wpInit() {
		wp_register_script('bfox_ajax', $this->url . '/bfox_ajax.js', array('jquery'), $this->version);
	}

	/**
	 * When the scripts are about to be printed, add the BfoxAjax localization
	 *
	 * Doing this on wp_print_scripts allows us to wait until the last moment
	 * for changes to be made to $this->javaScriptVars
	 *
	 * WP does a similar thing with the function wp_just_in_time_script_localization()
	 *
	 */
	function wpWpPrintScripts() {
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

	/**
	 * Setup jQuery fade in/out animations when an ajax div is refreshed
	 *
	 * @param mixed $duration Number of seconds, or 'slow' or 'fast'; 0 will have no animation
	 * @param float $opacity Value between 0.0 and 1.0 for the opacity the animation should fade to
	 */
	function setAjaxRefreshAnimations($duration, $opacity = 0.5) {
		$this->javaScriptVars['refreshAnimationDuration'] = $duration;
		$this->javaScriptVars['refreshAnimationOpacity'] = $opacity;
	}
}

?>