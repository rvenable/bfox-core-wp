<?php

function push_bfox_ref_link_defaults($defaults) {
	$refController = BfoxRefController::sharedInstance();
	$refController->pushLinkDefaults($defaults);
}

function bfox_ref_link_defaults_tooltip() {
	$attrs['class'] = 'bfox-ref-tooltip';

	return array('attrs' => $attrs);
}

function bfox_ref_link_defaults_update_selector($selector) {
	$attrs['class'] = 'bfox-ref-update';
	$attrs['data-selector'] = $selector;

	return array('attrs' => $attrs);
}

function pop_bfox_ref_link_defaults() {
	$refController = BfoxRefController::sharedInstance();
	$refController->popLinkDefaults();
}

function bfox_ref_links(BfoxRef $ref, $options = array()) {
	$serializer = new BfoxRefSerializer();
	$serializer->setCombineNone();
	$elements = $serializer->elementsForRef($ref);

	$str = '';
	foreach ($elements as $index => $element) {
		if ($index % 2 == 0) $str .= bfox_ref_link($element, $options);
		else $str .= $element;
	}

	return $str;
}

function list_bfox_ref_chapters(BfoxRef $ref = null, $options = array()) {
	$defaults = array(
		'format' => BibleMeta::name_none,
		'first_format' => false,
		'before' => '<li>',
		'after' => '</li>',
		'between' => '',
		'link_cb' => 'bfox_ref_link',
		'link_cb_options' => array(),
	);
	extract(wp_parse_args($options, $defaults));

	$chapters = $ref->get_sections(1);

	$strs = array();
	foreach ($chapters as $chapter) {
		if ($first_format !== false) {
			$ref_str = $chapter->get_string($first_format);
			$first_format = false;
		}
		else {
			$ref_str = $chapter->get_string($format);
		}
		$link_cb_options['text'] = $ref_str;

		if ($link_cb && is_callable($link_cb)) $ref_str = call_user_func($link_cb, $chapter->get_string(), $link_cb_options);
		$strs []= $before . $ref_str . $after;
	}

	return implode($between, $strs);
}

?>