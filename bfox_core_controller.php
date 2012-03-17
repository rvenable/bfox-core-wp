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
	 * @var BfoxIndexController
	 */
	var $index = null;

	/**
	 * @var BfoxToolsController
	 */
	var $tools = null;

	function init() {
		parent::init();

		$this->refDir = $this->dir . '/external/biblefox-ref';

		require_once $this->dir . '/bfox_ref_linker.php';
		require_once $this->refDir . '/biblefox-ref.php';
		require_once $this->apiDir . '/bfox_ref-functions.php';
		require_once $this->apiDir . '/bfox_ref-template.php';

		$this->pushRefLinker($this->basicLinker());
	}

	private $linkerStack = array();

	/**
	 * @var BfoxRefLinker
	 */
	private $currentLinker = null;

	function pushRefLinker(BfoxRefLinker $linker) {
		if (!is_null($this->currentLinker)) $this->linkDefaults []= $this->currentLinker;
		$this->currentLinker = $linker;
	}

	/**
	 * @return BfoxRefLinker
	 */
	function popLinker() {
		$this->currentLinker = array_pop($this->linkDefaults);
		return $this->currentLinker;
	}

	/**
	 * @return BfoxRefLinker
	 */
	function currentLinker() {
		return $this->currentLinker;
	}

	function refReplaceCallback() {
		$linker = $this->currentLinker();
		return $linker->refReplaceCallback();
	}

	/**
	 * @return BfoxRefLinker
	 */
	function basicLinker() {
		$linker = new BfoxRefLinker();
		$linker->attributeCallbacks['href'] = $this->functionWithName('urlForRefStr');
		return $linker;
	}

	function linkForRefStr($refStr, $attributes = array()) {
		$linker = $this->currentLinker();
		return $linker->linkForRefStr($refStr, $attributes);
	}

	function urlForRefStr($refStr) {
		$url = '';
		if (!is_null($this->tools)) {
			$url = $this->tools->urlForRefStr($refStr);
		}
		else if (!is_null($this->index)) {
			$url = $this->index->urlForRefStr($refStr);
		}
		return $url;
	}

	/**
	 * Replaces bible references with bible links in a given html string
	 * @param string $content
	 * @return string
	 */
	function replaceRefsInHTML($html, $callback = '') {
		if (empty($callback)) $callback = $this->refReplaceCallback();
		return BfoxRefParser::simple_html($html, null, $callback);
	}

	function linkForTextAndRef($text, BfoxRef $ref) {
		return $this->linkForRefStr($ref->get_string(), array('text' => $text));
	}

	/**
	 * Finds any bible references in an array of tag links and replaces them with the result of a callback
	 *
	 * @param array $tag_links
	 * @return array
	 */
	function replaceRefsInTagLinks($tag_links, $callback = '') {
		if (empty($callback)) $callback = $this->refReplaceCallback();
		if (!empty($tag_links)) foreach ($tag_links as &$tag_link) if (preg_match('/<a.*>(.*)<\/a>/', $tag_link, $matches)) {
			$tag = $matches[1];
			$ref = $this->core->refFromTag($tag);
			if ($ref->is_valid()) {
				$tag_link = call_user_func_array($callback, array($tag, $ref));
			}
		}
		return $tag_links;
	}

	/**
	 * Returns a BfoxRef for the given tag string
	 *
	 * @param string $tag
	 * @return BfoxRef
	 */
	function refFromTag($tag) {
		return BfoxRefParser::simple($tag);
	}

	/**
	 * Returns a BfoxRef for the given post content string
	 *
	 * @param string $content
	 * @return BfoxRef
	 */
	function refFromPostContent($content) {
		$ref = new BfoxRef;
		BfoxRefParser::simple_html($content, $ref);
		return $ref;
	}
}

?>