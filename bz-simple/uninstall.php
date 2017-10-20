<?php 

if (!defined('WP_UNINSTALL_PLUGIN')) {
	die();
}

wp_mail(get_bloginfo( 'admin_email' ), 'plugin uninstalled', 'Bye((');

?>