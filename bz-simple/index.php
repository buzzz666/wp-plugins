<?php 
/**
 * Plugin Name: bz-simple
 * Description: Description
 * Plugin URI: http://#
 * Author: buzzz
 * Author URI: http://#
 * Version: 1.0.0
 */

/*register_activation_hook( __FILE__, 'bz_activate' );
register_deactivation_hook( __FILE__, 'bz_deactivate' );

function bz_activate(){

	wp_mail(get_bloginfo( 'admin_email' ), 'plugin activated', 'Hello');
}

function bz_deactivate(){

	wp_mail(get_bloginfo( 'admin_email' ), 'plugin deactivated', 'Bye');
}*/



/*class BzActivate{

	function __construct(){

		register_activation_hook( __FILE__, array( $this, 'bz_activate') );
	}

	public function bz_activate(){

		$date = date("Y-m-d H:i:s");

		error_log($date . " Plugin activated", 3, dirname(__FILE__) . '/error_log.log');

	}
}

$bz_activate = new BzActivate;*/



/*register_activation_hook( __FILE__, array( 'BzActivate', 'bz_activate') );

class BzActivate{

	public static function bz_activate(){

		$date = date("Y-m-d H:i:s");

		error_log($date . " Plugin activated", 3, dirname(__FILE__) . '/error_log.log');

	}
}*/


include_once(__DIR__ . '/plugin-setup.php');

register_activation_hook( __FILE__, 'bz_activate' );
register_deactivation_hook( __FILE__, 'bz_deactivate' );

 ?>