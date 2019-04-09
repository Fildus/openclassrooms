<?php

namespace Find_a_nanny;

class Find_nanny_profile {

	use Helper;

	public function __construct() {
		add_shortcode('find_nanny_profile', [$this, 'find_nanny_profile']);
	}

	public function find_nanny_profile($atts) {
		$id = $_GET['find_a_nanny_profile'];
		if (isset($id) && $id !== null){
			global $wpdb;
			$person = $wpdb->get_row("SELECT * FROM {$wpdb->prefix}find_nanny WHERE id={$id}");
			$person->message = site_url().'/messages/?find_a_nanny_profile='.$person->id;
		}

		$conversation = site_url().'/'.$atts['find_nanny_conversation'].'/?find_a_nanny_conversation='.$person->id;

		$customScript = $this->script('profile');
		$customStyle    = $this->style('find_nanny_search');
		$js             = [
			'<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>',
			'<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>',
			'<script src="https://unpkg.com/leaflet@1.3.3/dist/leaflet.js" integrity="sha512-tAGcCfR4Sc5ZP5ZoVz0quoZDYX5aCtEm/eu1KhSLj2c9eFrylXZknQYmxUssFaVJKvvc0dJQixhGjG2yXWiV9Q==" crossorigin=""></script>'
		];
		$link           = [
			'<link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.3/dist/leaflet.css" integrity="sha512-Rksm5RenBEKSKFjgI3a41vrjkw4EVPlJ3+OiI65vTjIdo9brlAacEuKOiQ5OFh7cOI1bkDwLqdLw3Zg0cRJAAQ==" crossorigin=""/>',
			'<link rel="stylesheet" href="https://code.jquery.com/ui/1.7.3/themes/base/jquery-ui.css">'
		];
		return $this->render('profile', compact('person', 'customScript', 'customStyle', 'js', 'link', 'conversation', 'id'));
	}
}