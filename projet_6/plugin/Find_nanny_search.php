<?php

namespace Find_a_nanny;

class Find_nanny_search
{

    use Helper;

    public function __construct()
    {
        add_shortcode('find_nanny_search', [$this, 'find_nanny_search']);
    }

    public function find_nanny_search($atts)
    {
	    $available      = $_POST['find_nanny']['available'] ?? null;
	    $km             = $_POST['find_nanny']['km'] ?? null;
	    $ville          = $_POST['find_nanny']['ville'] ?? null;
	    $departement    = $_POST['find_nanny']['departement'] ?? null;
	    $lat            = $_POST['find_nanny']['lat'] ?? null;
	    $lng            = $_POST['find_nanny']['lng'] ?? null;
	    $customScript   = $this->script('find_nanny_search');
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

	    global $wpdb;
	    $liste = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}find_nanny");
	    $listeOnlyAccepted = [];
	    foreach ( $liste as $item ) {
			if ( (int) $item->accepted === 1 ){
				$listeOnlyAccepted[] = $item;
			}
	    }
	    $liste = $listeOnlyAccepted;

	    foreach ( $liste as $item ) {
		    $item->nanny_url = site_url().'/'.$atts['profile_url'].'?find_a_nanny_profile='.$item->id;
	    }
        return $this->render('search', compact('km', 'ville', 'departement', 'lat', 'lng', 'customScript', 'customStyle', 'js', 'link', 'liste', 'available'));
    }

}