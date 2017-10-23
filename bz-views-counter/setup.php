<?php 

class Setup{

	static function create_field(){

		if (!self::check_field()) {
			
			global $wpdb;

			$query = "ALTER TABLE $wpdb->posts ADD bz_views INT NOT NULL DEFAULT '0'";

			$wpdb->query($query);	
		}		
	}

	static function delete_field(){

		if (self::check_field()) {
			
			if(!defined('WP_UNINSTALL_PLUGIN')){

				die();
			}

			global $wpdb;

			$query = "ALTER TABLE $wpdb->posts DROP COLUMN bz_views";

			$wpdb->query($query);	
		}		
	}

	static function check_field(){

		global $wpdb;

		$fields = $wpdb->get_results("SHOW fields FROM $wpdb->posts", ARRAY_A);
		foreach ($fields as $field) {
			if ($field['Field'] == 'bz_views'){
				return true;
			}
		}
		return false;
	}
}

?>