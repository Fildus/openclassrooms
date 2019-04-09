<?php

namespace Find_a_nanny;


class Find_nanny_conversation {

	use Helper;

	public function __construct() {
		add_shortcode('conversation', [$this, 'conversation']);
	}

	public function conversation() {
		$idContact  = $_GET['find_a_nanny_conversation'];
		$id         = wp_get_current_user()->ID;
		if (isset($_POST['find_nanny']['message']) && $_POST['find_nanny']['message'] !== null){
			global $wpdb;
			$data = [
				'idTransmitter' => (int) $id,
				'idReceiver'    => (int) $idContact,
				'message'       => $_POST['find_nanny']['message'],
			];
			if (wp_get_current_user()->exists()){
				$wpdb->insert("{$wpdb->prefix}find_nanny_messages", $data, ['%d', '%d', '%s', '%d']);
				$post = $_POST['find_nanny']['message'];
				unset($_POST['find_nanny']['message']);
			}
		}
		if (isset($id) && $id !== null){
			global $wpdb;
			$messages = [];
			if ($wpdb->get_row("SELECT * FROM {$wpdb->prefix}users WHERE id={$idContact}")){
				foreach ($wpdb->get_results("SELECT * FROM {$wpdb->prefix}find_nanny_messages WHERE idTransmitter={$idContact} AND idReceiver={$id}") as $v){
					$v->name = $wpdb->get_row("SELECT * FROM {$wpdb->prefix}users WHERE id={$idContact}")->user_nicename;
					$messages[(new \DateTime($v->dateMessage))->getTimestamp()] = $v;
				}
				foreach ($wpdb->get_results("SELECT * FROM {$wpdb->prefix}find_nanny_messages WHERE idTransmitter={$id} AND idReceiver={$idContact}") as $t){
					$t->name = $wpdb->get_row("SELECT * FROM {$wpdb->prefix}users WHERE id={$id}")->user_nicename;
					$messages[(new \DateTime($t->dateMessage))->getTimestamp()] = $t;
				}
			}
			$wpdb->update("{$wpdb->prefix}find_nanny_messages",['readMessage'=>1],[
				'idTransmitter' => $idContact,
				'idReceiver'    => $id
			]);
		}
		ksort($messages);

		$customScript   = $this->script('conversation');
		$customStyle    = $this->style('find_nanny_search');

		return $this->render('conversation', compact('messages', 'id', 'idContact', 'customStyle', 'customScript', 'post'));
	}
}