<?php

namespace Find_a_nanny;


class Find_nanny_messages {

	use Helper;

	public function __construct() {
		add_shortcode('messages', [$this, 'messages']);
	}

	public function messages() {
		global $wpdb;
		$userId = wp_get_current_user()->ID;
		$listeDiscuss = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}find_nanny_messages WHERE idTransmitter={$userId} OR idReceiver={$userId}");

		$personId = [];
		foreach ( $listeDiscuss as $person ) {
			array_push($personId, (int) $person->idTransmitter);
			array_push($personId, (int) $person->idReceiver);
		}
		$personId = array_unique(array_filter($personId, function ($value){
			if((int) $value !== (int) wp_get_current_user()->ID){
				return true;
			}
			return false;
		}));

		$listePersons = [];
		foreach ( $personId as $item ) {
			$a = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}find_nanny WHERE id={$item}");
			if ($a !== null){
				$listePersons[$item]['nanny'] = $a;
			}
			$b = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}users WHERE id={$item}");
			if ($b !== null){
				$listePersons[$item]['user'] = $b;
			}
			$listePersons[$item]['url'] = site_url().'/conversation/?find_a_nanny_conversation='.$item;
		}

		$nbrNotView = (int) 0;
		foreach ($listePersons as $k => $v){
			$rows= $wpdb->get_results("SELECT * FROM {$wpdb->prefix}find_nanny_messages WHERE idTransmitter={$k}");
			foreach ($rows as $result){
				if ((int) $result->readMessage === (int) 0){
					$nbrNotView += 1;
				}
			}
		}

		$customScript   = $this->script('messages');
		$customStyle    = $this->style('find_nanny_search');

		return $this->render('messages', compact('listePersons', 'b', 'customScript', 'customStyle', 'nbrNotView'));
	}

}