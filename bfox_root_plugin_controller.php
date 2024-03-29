<?php

/**
 * All Biblefox plugins have a root controller which extends from this class
 *
 * @author richard
 *
 */
class BfoxRootPluginController extends BfoxBaseRootPluginController {

	/**
	 * @var BfoxCoreController
	 */
	var $core;

	/**
	 * @var BfoxOptions
	 */
	var $options;

	function __construct($core, $slug, $prefix, $version, $buildVersion) {
		$this->core = $core;
		parent::__construct($slug, $prefix, $version, $buildVersion);

		$this->options = new BfoxOptions($prefix);
	}

	/**
	 * Returns a path for a Biblefox theme template file, first trying to load from the theme, then from the plugin
	 */
	function templatePath($template) {
		$template .= '.php';
		$path = locate_template(array($template));
		if (empty($path)) $path = $this->dir . '/theme/' . $template;
		return apply_filters($this->filterName('template_path'), $path, $template);
	}

	/**
	 * Loads a Biblefox theme template file, first trying to load from the theme, then from the plugin
	 */
	function loadTemplate($template) {
		$path = $this->templatePath($template);
		load_template($path);
	}
}

?>