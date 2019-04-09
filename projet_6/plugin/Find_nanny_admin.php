<?php

namespace Find_a_nanny;


class Find_nanny_admin {

	use Helper;

	public function __construct() {
		add_action('admin_menu', [ $this, 'add_admin_menu' ] );
	}

	public function add_admin_menu() {
		add_menu_page(
			'Configuration',
			'Find a nanny',
			'manage_options',
			'Find_a_nanny'
		);

		add_submenu_page(
			'Find_a_nanny',
			'Utilisateurs',
			'Utilisateurs',
			'manage_options',
			'Find_a_nanny',
			[ $this, 'menu_html_utilisateurs' ] );

		add_submenu_page(
			'Find_a_nanny',
			'Style',
			'Style',
			'manage_options',
			'Find_a_nanny_style',
			[ $this, 'menu_html_style' ] );

	}

	public function menu_html_utilisateurs() {
		global $wpdb;

		if ($_POST['find_nanny_back']){
			global $wpdb;

			/**
			 * Accepter ou refuser le dossier
			 */
			$isAccepted         = $_POST['find_nanny_back']['isAccepted'];
			if ($isAccepted){
				$idIsAccepted       = key($isAccepted);
				$valueIsAccepted    = $isAccepted[$idIsAccepted];
				$valueIsAccepted === "accepted" ? $accepted = 1 : $accepted = 0;
				if ($valueIsAccepted){
					$wpdb->update("{$wpdb->prefix}find_nanny",[
						'accepted'  => $accepted
					],[
						'id'        => (int) $idIsAccepted
					]);
				}
			}

			/**
			 * Mettre un dossier à la poubelle
			 */
			$isDashed = $_POST['find_nanny_back']['dash'];
			if ($isDashed){
				if ($isDashed[key($isDashed)] === "dashed"){
					$wpdb->delete("{$wpdb->prefix}find_nanny",[
						'id' => key($isDashed)
					]);
					echo '<p class="alert alert-warning" role="alert">le compte a bien été <strong>supprimé</strong></p>' ;
				}
			}
		}

		$customStyle = $this->style('find_nanny_admin');

		if (isset($_GET['id'])){
			$id = $_GET['id'];
			$person = $wpdb->get_results("Select * from {$wpdb->prefix}find_nanny where id={$id}")[0];
			$js             = [
				'<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>',
				'<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>',
				'<script src="https://unpkg.com/leaflet@1.3.3/dist/leaflet.js" integrity="sha512-tAGcCfR4Sc5ZP5ZoVz0quoZDYX5aCtEm/eu1KhSLj2c9eFrylXZknQYmxUssFaVJKvvc0dJQixhGjG2yXWiV9Q==" crossorigin=""></script>'
			];
			$link           = [
				'<link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.3/dist/leaflet.css" integrity="sha512-Rksm5RenBEKSKFjgI3a41vrjkw4EVPlJ3+OiI65vTjIdo9brlAacEuKOiQ5OFh7cOI1bkDwLqdLw3Zg0cRJAAQ==" crossorigin=""/>',
				'<link rel="stylesheet" href="https://code.jquery.com/ui/1.7.3/themes/base/jquery-ui.css">'
			];
			$customScript = $this->script('user');
			echo $this->render('admin/user', compact('person', 'customStyle', 'js', 'link', 'customScript'));
		}else{
			$liste = $wpdb->get_results("Select * from {$wpdb->prefix}find_nanny");
			echo $this->render('admin/users', compact('liste' , 'customStyle'));
		}

	}

	public function menu_html_style() {
		$pathCustomCss = __DIR__.'/assets/css/custom.css';

		$customCss =   $_POST['find_nanny']['customCss'] ?? file_get_contents($pathCustomCss);
		file_put_contents($pathCustomCss, $customCss);

		echo $this->render('admin/reglages', compact('customCss'));
	}

}