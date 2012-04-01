/*global jQuery, BfoxAjax */

jQuery(document).ready(function () {
	'use strict';

	/*
	 * Add BfoxAjax functions
	 */

	BfoxAjax.appendUrlWithParamString = function (url, paramString) {
		return url + ((url.indexOf('?') === -1) ? '?' : '&') + paramString;
	};

	BfoxAjax.refreshDivWithUrl = function (div, url) {
		jQuery(div).fadeTo(BfoxAjax.refreshAnimationDuration, BfoxAjax.refreshAnimationOpacity, function () {
		});
		jQuery.get(url, function (response) {
			jQuery(div).attr('data-url', response.refreshUrl);
			jQuery(div).html(response.html);
			jQuery(div).fadeTo(BfoxAjax.refreshAnimationDuration, 1.0);
		});

		return false;
	};

	BfoxAjax.refreshDivForParameters = function (div, parameters) {
		var url;
		url = jQuery(div).attr('data-url');
		url = BfoxAjax.appendUrlWithParamString(url, parameters);
		return BfoxAjax.refreshDivWithUrl(div, url);
	};

	BfoxAjax.refreshDivForKeyValue = function (div, key, value) {
		var parameters, obj;

		obj = {};
		obj[key] = value;
		parameters = jQuery.param(obj);
		return BfoxAjax.refreshDivForParameters(div, parameters);
	};

	BfoxAjax.refreshSelectorForKeyValue = function (selector, key, value) {
		jQuery(selector).each(function () {
			BfoxAjax.refreshDivForKeyValue(this, key, value);
		});
		return false;
	};

	/*
	 * Set up DOM elements
	 */

	jQuery('a.bfox-ref-context-updater').live('click', function () {
		return BfoxAjax.refreshSelectorForKeyValue(jQuery(this).attr('data-selector'), 'ref', jQuery(this).attr('data-ref'));
	});
});
