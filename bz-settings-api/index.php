<?php 
/**
 * Plugin Name: Settings API
 * Description: Description
 * Plugin URI: http://#
 * Author: buzzz
 * Author URI: http://#
 * Version: 1.0.0
 */

/*class BZSettingsAPI{

	function __construct(){

		// add_option( 'bz_test', $value = '111' );
		// update_option( 'bz_test', $value = '111' );
		// delete_option( 'bz_test', $value = '111' );

	}

	function bz_create_options(){

		add_action( 'admin_init', [$this, 'bz_add_option']);
		add_action( 'admin_init', [$this, 'bz_add_option_2']);
	}

	function bz_add_option(){

		// $option_group, $option_name, $args = array
		register_setting('general', 'bz_first_option');

		// $id, $title, $callback, $page, $section = 'default', $args = array 
		add_settings_field('bz_first_option', 'BZ Option', [$this, 'bz_option_callback'], 'general');
	}

	function bz_add_option_2(){

		// $option_group, $option_name, $args = array
		register_setting('general', 'bz_first_option_2');

		// $id, $title, $callback, $page, $section = 'default', $args = array 
		add_settings_field('bz_first_option_2', 'BZ Option 2', [$this, 'bz_option_callback_2'], 'general');
	}

	function bz_option_callback(){

		?>
			
			<input class="regular-text" type="text" name="bz_first_option" id="bz_first_option" value="<?= esc_attr(get_option('bz_first_option')); ?>">

		<?php
	}

	function bz_option_callback_2(){

		?>
			
			<input class="regular-text" type="text" name="bz_first_option_2" id="bz_first_option_2" value="<?= esc_attr(get_option('bz_first_option_2')); ?>">

		<?php
	}
}

$bz_settings = new BZSettingsAPI();
$bz_settings->bz_create_options();*/

class BZThemeSettings{

	function __construct(){

		// add_option( 'bz_test', $value = '111' );
		// update_option( 'bz_test', $value = '111' );
		// delete_option( 'bz_test', $value = '111' );

		add_action( 'admin_init', [$this, 'bz_theme_options']);
		add_action( 'wp_enqueue_scripts', [$this, 'bz_hook_up']);
	}

	static function sweeper(){

		delete_option('bz_theme_options');
	}

	function bz_hook_up(){

		$bz_theme_options = get_option('bz_theme_options');
		wp_register_script( 'bz-main', plugins_url('/assets/js/main.js', __FILE__), ['jquery']);
		wp_enqueue_script( 'bz-main' );
		wp_localize_script( 'bz-main', 'bzObj', $bz_theme_options );
	}

	function bz_theme_options(){

		// $option_group, $option_name, $args = array
		register_setting('general', 'bz_theme_options');

		// $id, $title, $callback, $page 
		add_settings_section('bz_theme_options_section', 'Theme option', [$this, 'bz_theme_option_section_cb'], 'general');

		// $id, $title, $callback, $page, $section = 'default', $args = array 
		add_settings_field('bz_theme_options_body', 'Body color', [$this, 'bz_theme_body_cb'], 'general', 'bz_theme_options_section');
		add_settings_field('bz_theme_options_header', 'Header color', [$this, 'bz_theme_header_cb'], 'general', 'bz_theme_options_section');
	}

	function bz_theme_option_section_cb(){
		?>

			<p>Changes body &amp; header background</p>

		<?php
	}

	function bz_theme_body_cb(){

		$options = get_option('bz_theme_options');

		?>

			<input type="text" name="bz_theme_options[bz_theme_options_body]" id="bz_theme_options_body" value="<?= esc_attr($options['bz_theme_options_body']); ?>">

		<?php
	}

	function bz_theme_header_cb(){

		$options = get_option('bz_theme_options');

		?>

			<input type="text" name="bz_theme_options[bz_theme_options_header]" id="bz_theme_options_header" value="<?= esc_attr($options['bz_theme_options_header']); ?>">

		<?php
	}
}

$settings = new BZThemeSettings();

?>