<?php 

/**
 * Plugin Name: Theme settings page
 * Description: Description
 * Plugin URI: http://#
 * Author: Author
 * Author URI: http://#
 * Version: 1.0.0
 */

class BZThemeOptions {
 
    function __construct() {
        add_action( 'admin_menu', array( $this, 'bz_init_admin' ) );
    }
 
    /**
     * Registers a new settings page under Settings.
     */
    function bz_init_admin() {
        add_options_page(
            __( 'Theme Settings', 'textdomain' ),
            __( 'Theme Settings', 'textdomain' ),
            'manage_options',
            'bz-options',
            array(
                $this,
                'bz_settings_page'
            )
        );
    }
 
    /**
     * Settings page display callback.
     */
    function bz_settings_page() {
        echo __( 'This is the page content', 'textdomain' );
    }
}
 
new BZThemeOptions();

?>