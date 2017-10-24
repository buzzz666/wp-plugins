<?php 

if (!defined('WP_UNINSTALL_PLUGIN')) {
	die();
}

include(__DIR__ . '/index.php');
BZThemeSettings::sweeper();

?>