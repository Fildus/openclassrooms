<?php

namespace Find_a_nanny;

class Find_nanny_register{

	use Helper;

	public function __construct() {
		add_shortcode('find_nanny_register', [$this, 'find_nanny_register']);
	}

	public function find_nanny_register() {

		global $wpdb;
		$user = $wpdb->get_row("SELECT * FROM {$wpdb->prefix}find_nanny WHERE id = ".wp_get_current_user()->ID);

		$nextDateAvailable = $_POST['find_nanny_register']['nextDateAvailable'] ?? $user->nextDateAvailable ?? null;
		$price = $_POST['find_nanny_register']['price'] ?? $user->price;
		$nbrChildren = $_POST['find_nanny_register']['nbrChildren'] ?? $user->nbrChildren;
		$days        = $_POST['find_nanny_register']['days'] ?? unserialize($user->days);
		$ville       = $_POST['find_nanny_register']['ville'] ?? $user->adresse ?? null;
		$lat         = $_POST['find_nanny_register']['lat'] ?? $user->lat ?? null;
		$lng         = $_POST['find_nanny_register']['lng'] ?? $user->lng ?? null;
		$description = $_POST['find_nanny_register']['description'] ?? $user->description ?? null;
		$isAvailable = $_POST['find_nanny_available']['updateAvailable'];
		$available   = $user->available;
		$accepted    = (int) $user->accepted;

		$ville !== null && !empty($ville) ? $wantTobeNanny = 'checked="checked"' : $wantTobeNanny = '' ;

		if ($isAvailable && null !== $user){
			if ( $isAvailable === 'available' ){
				$data = ['available' => date_format(new \DateTime(), 'Y-m-d')];
				$available = date_format(new \DateTime(), 'Y-m-d');
			}elseif( $isAvailable === 'unavailable' ){
				$data = ['available' => null];
			}
			$wpdb->update("{$wpdb->prefix}find_nanny", $data,[ 'id' => wp_get_current_user()->ID ]);
		}

		if ($available && $isAvailable !== 'unavailable'){
			$diffAvailable = date_diff(new \DateTime($available), new \DateTime())->days;
			if ($diffAvailable === 0){
				$diffAvailable = 'Votre êtes actuellement actualise. Pour réster visible sur la plateforme vous devez vous actualiser au minimum tous les 7 jours';
			}else{
				$diffAvailable = '<strong style="color: #a00;">Votre dernière actualisation date de '.$diffAvailable.' jours.</strong> Pour réster visible sur la plateforme vous devez vous actualiser au minimum tous les 7 jours';
			}
		}else{
			$diffAvailable = 'Vous n\'êtes plus visibles sur la plateforme. Pour être visible clickez sur actualiser';
		}

		if (isset($_POST['find_nanny_register']) && !empty($_POST['find_nanny_register'])){
			if ($_POST['whenYouAreReadyInput'] === 'on' || $nextDateAvailable === ''){
				$nextDateAvailable = null;
			}
			$data = [
				'id'          => wp_get_current_user()->ID,
				'nom'         => wp_get_current_user()->nickname,
				'lat'         => (float) $lat,
				'lng'         => (float) $lng,
				'adresse'     => $ville,
				'description' => $description,
				'days'        => serialize($days),
				'nbrChildren' => (int) $nbrChildren,
				'nextDateAvailable' => $nextDateAvailable,
				'price'       => (int) $price
			];
			if (wp_get_current_user()->exists()){
				if (!empty($wpdb->get_row("SELECT * FROM {$wpdb->prefix}find_nanny WHERE id=".(int) wp_get_current_user()->ID))){
					$wpdb->update("{$wpdb->prefix}find_nanny", $data,[ 'id' => wp_get_current_user()->ID ]);
				}else{
					$wpdb->insert("{$wpdb->prefix}find_nanny", $data,[ 'id' => wp_get_current_user()->ID ]);
					$wpdb->update("{$wpdb->prefix}find_nanny", $data,[ 'id' => wp_get_current_user()->ID ]);
				}
			}
		}

		$customScriptRegister = $this->script('register');
		$customScriptDatePicker = $this->script('datePicker');
		$customStyle = $this->style('find_nanny_search');
		$js = [
			'<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>',
			'<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>',
			'<script src="https://unpkg.com/leaflet@1.3.3/dist/leaflet.js" integrity="sha512-tAGcCfR4Sc5ZP5ZoVz0quoZDYX5aCtEm/eu1KhSLj2c9eFrylXZknQYmxUssFaVJKvvc0dJQixhGjG2yXWiV9Q==" crossorigin=""></script>'
		];
		$link = [
			'<link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.3/dist/leaflet.css" integrity="sha512-Rksm5RenBEKSKFjgI3a41vrjkw4EVPlJ3+OiI65vTjIdo9brlAacEuKOiQ5OFh7cOI1bkDwLqdLw3Zg0cRJAAQ==" crossorigin=""/>',
			'<link rel="stylesheet" href="https://code.jquery.com/ui/1.7.3/themes/base/jquery-ui.css">'
		];
		return $this->render('register', compact(
			'customScriptRegister','customStyle', 'js', 'link', 'ville', 'lat', 'lng', 'price', 'description',
			'wantTobeNanny', 'diffAvailable', 'customScriptDatePicker', 'days', 'nbrChildren', 'nextDateAvailable', 'accepted'
		));
	}
}