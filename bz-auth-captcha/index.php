<?php 
/**
 * Plugin Name: Captcha in auth form
 * Description: Description
 * Plugin URI: http://#
 * Author: buzzz
 * Author URI: http://#
 * Version: 1.0.0
 */


class Captcha{

	function __construct(){

		add_action('login_form', [$this, 'bz_auth_captcha']);
		add_action('wp_head', [$this, 'bz_generate_captcha_values']);
		add_action('init', [$this, 'bz_start_session'], 1);

		add_filter('authenticate', [$this, 'wp_auth_signon'], 30, 3);	
	}

	function bz_auth_captcha(){

		$this->bz_generate_captcha_values();

		echo $this->bz_locate_captcha();		
	}

	function bz_start_session(){

		if (!session_id())
    		session_start();
	}

	function wp_auth_signon($user, $username, $password){

		$status = $this->bz_check_captcha();

		if ($status == 1) {
			
			$user = new WP_error('broke', 'ERROR: Fill captcha.');
		}
		if ($status == 2) {
			
			$user = new WP_error('broke', 'ERROR: Wrong captcha.');
		}
		if (isset($user->errors['invalid_username']) || isset($user->errors['incorrect_password'])) {
			
			return new WP_error('broke', 'ERROR: Wrong auth data.');
		}

		return $user;
	}	

	function bz_generate_captcha_values(){

		$_SESSION['captcha_1'] = rand(1, 10);
		$_SESSION['captcha_2'] = rand(1, 10);
		$_SESSION['captcha_res'] = $_SESSION['captcha_1'] + $_SESSION['captcha_2'];
	}

	function bz_check_captcha(){

    	if(!isset($_POST['captcha'])){
    		return 0;
    	}

		if ($_POST['captcha'] == '') {

			// wp_die( $message = '<b>Error:</b> Fill captcha.<br><a href="' . $_SERVER['HTTP_REFERER'] . '">« Back</a>', $title = 'Error: fill captcha' );
			return 1;	
		}

		if (intval($_POST['captcha']) !== $_SESSION['captcha_res']) {
			// wp_die( $message = '<b>Error:</b> Wrong captcha.<br><a href="' . $_SERVER['HTTP_REFERER'] . '">« Back</a>', $title = 'Error: wrong captcha' );
			return 2;
		}

		return 0;
	}

	function bz_locate_captcha(){

		return '<p class="">
							<label for="captcha">Captcha <span class="required">*</span></label>
							<div>
								<p style="display: inline-block; font-size: 22px;">' . $_SESSION['captcha_1'] . ' + ' . $_SESSION['captcha_2'] . ' =  </p><input type="text" name="captcha" id="captcha" maxlength="2" style="width: 40px; display: inline-block; margin-left: 10px;">
							</div>
						  </p>';
	}
}

$bz_captcha = new Captcha();

?>