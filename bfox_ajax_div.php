<?php

class BfoxAjaxDiv extends BfoxObject {
	var $name;
	var $id;
	var $classes = array('bfox-ajax-div');

	function __construct($name) {
		$this->name = $name;
		$this->id = 'bfox-ajax-div-' . $this->name;

		parent::__construct();
	}

	function init() {
		parent::init();

		$this->addAction('wp_ajax_' . $this->id, 'sendResponse');
	}

	function enableNoPrivilege() {
		$this->addAction('wp_ajax_nopriv_' . $this->id, 'sendResponse');
	}

	function jsonResponseForContent($content, $error = '') {
		header('Content-Type: application/json');

		$nonce = $this->nonce();

		$json = json_encode(array(
			'html' => $content,
			'refreshUrl' => $this->refreshUrl($nonce),
			'nonce' => $nonce,
		));

		if (!empty($error)) $json['error'] = $error;

		return $json;
	}

	function echoContent() {
	}

	function content() {
		ob_start();
		$this->echoContent();
		$content = ob_get_clean();

		return $content;
	}

	function echoInitialContent() {
		?>
		<div id="<?php echo $this->id; ?>" class="<?php echo implode(' ', $this->classes); ?>" data-url="<?php echo $this->refreshUrl(); ?>">
			<?php $this->echoContent(); ?>
		</div>
		<?php
	}

	function response() {
		return $this->jsonResponseForContent($this->content());
	}

	function sendResponse() {
		echo $this->response();
		exit;
	}

	function nonce() {
		$nonce = wp_create_nonce($this->id);
		return $nonce;
	}

	function refreshUrl($nonce = '') {
		if (empty($nonce)) $nonce = $this->nonce();
		$url = add_query_arg(array('action' => $this->id, 'nonce' => $nonce), admin_url('admin-ajax.php'));
		return $url;
	}

	function addClass($class) {
		if (!in_array($class, $this->classes)) {
			$this->classes []= $class;
		}
	}
}

?>