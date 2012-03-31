<?php

class BfoxRefsController extends BfoxPluginController {

	/**
	 * @var BfoxCoreController
	 */
	var $core;

	/**
	 * @var BfoxOptions
	 */
	var $options;

	function init() {
		parent::init();

		$this->options = new BfoxOptions('bfox_refs');
	}

	function link($refStr, $attributes = array()) {
		if (is_a($refStr, 'BfoxRef')) {
			$refStr = $refStr->get_string();
		}
		return $this->linkForRefStr($refStr, $attributes);
	}

	function url($refStr) {
		if (is_a($refStr, 'BfoxRef')) {
			$refStr = $refStr->get_string();
		}
		return $this->urlForRefStr($refStr);
	}

	function linkForRefStr($refStr, $attributes = array()) {
		$linker = $this->currentLinker();
		return $linker->linkForRefStr($refStr, $attributes);
	}

	function urlForRefStr($refStr) {
		$url = '';
		if (!is_null($this->core->tools)) {
			$url = $this->core->tools->urlForRefStr($refStr);
		}
		else if (!is_null($this->core->index)) {
			$url = $this->core->index->urlForRefStr($refStr);
		}
		return $url;
	}

	function linkForTextAndRef($text, BfoxRef $ref) {
		return $this->linkForRefStr($ref->get_string(), array('text' => $text));
	}

	function pushLinker(BfoxRefLinker $linker) {
		$this->core->stackGroup->push('refLinker', $linker);
	}

	/**
	 * @return BfoxRefLinker
	 */
	function popLinker() {
		return $this->core->stackGroup->pop('refLinker');
	}

	/**
	 * @return BfoxRefLinker
	 */
	function currentLinker() {
		return $this->core->stackGroup->current('refLinker');
	}

	private $contexts = array();
	var $mainContextName = 'main';

	/**
	 * @param string $name
	 * @return BfoxRefContext
	 */
	function contextForName($name) {
		if (empty($name)) return null;

		if (!isset($this->contexts[$name])) {
			$context = new BfoxRefContext($name, $this);
			$this->contexts[$name] = $context;
		}
		return $this->contexts[$name];
	}

	/**
	 * @return BfoxRefContext
	 */
	function mainContext() {
		return $this->contextForName($this->mainContextName);
	}

	function pushContext(BfoxRefContext $context) {
		$this->core->stackGroup->push('refContext', $context);

		$linker = $this->basicLinkerForContext($context);
		$this->pushLinker($linker);
	}

	/**
	 * @return BfoxRefContext
	 */
	function popContext() {
		$this->popLinker();

		return $this->core->stackGroup->pop('refContext');
	}

	/**
	 * @return BfoxRefContext
	 */
	function currentContext() {
		return $this->core->stackGroup->current('refContext');
	}

	function replaceCallback() {
		$linker = $this->currentLinker();
		return $linker->replaceCallback();
	}

	/**
	 * @return BfoxRefLinker
	 */
	function basicLinker($useTooltips = true) {
		$linker = new BfoxRefLinker();
		$linker->attributeCallbacks['href'] = $this->functionWithName('urlForRefStr');

		if ($useTooltips && !is_null($this->core->tooltips)) {
			$linker->addClass($this->core->tooltips->linkClass);
		}

		return $linker;
	}

	/**
	 * @return BfoxRefLinker
	 */
	function basicLinkerForContext(BfoxRefContext $context, $useTooltips = false) {
		$linker = $this->basicLinker($useTooltips);
		$linker->addClass('bfox-ref-context-updater');
		$linker->attributeValues['data-selector'] = '.' . $context->dependencyName;
		return $linker;
	}

	/**
	 * Replaces bible references with bible links in a given html string
	 * @param string $content
	 * @return string
	 */
	function replaceInHTML($html, $callback = '') {
		if (empty($callback)) $callback = $this->replaceCallback();
		return BfoxRefParser::simple_html($html, null, $callback);
	}

	/**
	 * Finds any bible references in an array of tag links and replaces them with the result of a callback
	 *
	 * @param array $tag_links
	 * @return array
	 */
	function replaceInTagLinks($tag_links, $callback = '') {
		if (empty($callback)) $callback = $this->replaceCallback();
		if (!empty($tag_links)) foreach ($tag_links as &$tag_link) if (preg_match('/<a.*>(.*)<\/a>/', $tag_link, $matches)) {
			$tag = $matches[1];
			$ref = $this->refFromTag($tag);
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

	function wpInit() {
		$this->pushLinker($this->basicLinker());
	}
}

?>