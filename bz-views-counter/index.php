<?php 
/**
 * Plugin Name: Views Counter
 * Description: Description
 * Plugin URI: http://#
 * Author: buzzz
 * Author URI: http://#
 * Version: 1.0.0
 */

include_once(__DIR__ . '/setup.php');

class Counter{

	function __construct(){

		register_activation_hook( __FILE__, [$this, 'bz_create_field'] );
		add_filter( 'the_content', [$this, 'bz_insert_counter'] );
		add_action('wp_head', [$this, 'bz_incrementation'] );
	}

	function bz_create_field(){

		Setup::create_field();
	}

	function bz_insert_counter($content){

		if (!is_single()) {
			return $content;
		}

		global $post;

		$views = $post->bz_views;

		$result = '<div class="bz-counter"><p>Views count: ' . $views . '</p></div>';
		return $content . $result;
	}

	function bz_incrementation(){

		if (!is_single()) {
			return;
		}
		
		global $post, $wpdb;

		$bz_id = $post->ID;

		$views = $post->bz_views + 1;

		$wpdb->update(
			$wpdb->posts,
			['bz_views' => $views],
			['ID' => $bz_id]
		);

	}
}

$bz_counter = new Counter();

?>