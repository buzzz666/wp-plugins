<?php 
/**
 * Plugin Name: Simple Widget
 * Description: Description
 * Plugin URI: http://#
 * Author: buzzz
 * Author URI: http://#
 * Version: 1.0.0
 */

class BZWidget{

	function __construct(){

		add_action( 'widgets_init', [$this, 'bz_init_widget'] );
	}

	function bz_init_widget(){

		include_once(__DIR__ . '/MainWidget.php');
		register_widget('MainWidget');
	}
}

$bz_widget = new BZWidget();

?>