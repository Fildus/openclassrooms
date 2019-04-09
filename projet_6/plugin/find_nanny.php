<?php
/*
Plugin Name: Find a nanny
Plugin URI: https://findnanny.com/
Description: Easiest way to find a nanny.
Version: 0.1
Author: David-GASTALDELLO
Author URI: http://davidgastaldello.dev-fou.ovh
License: GPLv2
*/

namespace Find_a_nanny;

class Find_nanny
{
    public function __construct()
    {
        new Find_nanny_search();
        new Find_nanny_register();
        new Find_nanny_profile();
        new Find_nanny_messages();
        new Find_nanny_conversation();
        new Find_nanny_admin();
	    register_activation_hook(__FILE__, [ __CLASS__, 'install' ] );
	    register_uninstall_hook(__FILE__, [ __CLASS__, 'uninstall' ] );
    }

	public static function install()
	{
		global $wpdb;

		$wpdb->query("
			CREATE TABLE IF NOT EXISTS {$wpdb->prefix}find_nanny (
			id INT AUTO_INCREMENT PRIMARY KEY,
		    nom VARCHAR(255) NOT NULL,
		    lat FLOAT(24) DEFAULT NULL,
		    lng FLOAT(24) DEFAULT NULL,
		    adresse VARCHAR(255) DEFAULT NULL,
		    available DATE DEFAULT NULL,
		    description TEXT DEFAULT NULL, 
		    days varchar (255) DEFAULT NULL ,
		    nbrChildren smallint DEFAULT NULL ,
		    nextDateAvailable DATE DEFAULT NULL,
		    price INT(255) DEFAULT NULL 
			 );");

		$wpdb->query("
			CREATE TABLE IF NOT EXISTS {$wpdb->prefix}find_nanny_messages (
			id INT AUTO_INCREMENT PRIMARY KEY,
			idTransmitter INT(255),
		    idReceiver INT(255),
		    message TEXT DEFAULT NULL,
		    readMessage INT(1) DEFAULT 0,
		    dateMessage TIMESTAMP 
			 );");
    }

	public static function uninstall()
	{
		global $wpdb;

		$wpdb->query("
			DROP TABLE IF EXISTS {$wpdb->prefix}find_nanny
			;");
		$wpdb->query("
			DROP TABLE IF EXISTS {$wpdb->prefix}find_nanny_messages
			;");
	}
}

require plugin_dir_path(__FILE__).'/Autoload.php';

new Find_nanny();