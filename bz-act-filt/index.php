<?php 
/**
 * Plugin Name: bz Actions & Filters
 * Description: Description
 * Plugin URI: http://#
 * Author: buzzz
 * Author URI: http://#
 * Version: 1.0.0
 */

/*include_once(__DIR__ . '/plugin-setup.php');

register_activation_hook( __FILE__, 'bz_activate' );
register_deactivation_hook( __FILE__, 'bz_deactivate' );*/

/*add_filter( 'the_title', 'bz_the_title');

function bz_the_title($title){

	if (is_admin()) {
		return $title;
	}

	return $title . '))';
}*/

/*add_filter( 'the_content', 'only_authorized' );

function only_authorized($content){

	if (is_user_logged_in()) {
		return $content;
	}

	return '<div class="bz-access">Only for registered users <a href="' . home_url() . '/wp-login.php" class="access-btn">Sign in</a></div>';
}*/

/*add_action( 'comment_post ', 'mail_on_post' );

function mail_on_post(){

	wp_mail(get_bloginfo( 'admin_email' ), 'New comment', 'PRIVET');
}*/

?>