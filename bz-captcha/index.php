<?php 
/**
 * Plugin Name: Captcha in comments section
 * Description: Description
 * Plugin URI: http://#
 * Author: buzzz
 * Author URI: http://#
 * Version: 1.0.0
 */


class Captcha{

	function __construct(){

		add_filter( 'comment_form_default_fields', [$this, 'bz_edit_form'] );
		add_filter( 'preprocess_comment', [$this, 'bz_check_captcha'] );
		add_filter( 'comment_form_field_comment', [$this, 'bz_locate_captcha'] );
		add_action( 'wp_head', [$this, 'bz_generate_captcha_values']);
	}

	function bz_generate_captcha_values(){

		if (!session_id())
    		session_start();

		$_SESSION['captcha_1'] = rand(1, 10);
		$_SESSION['captcha_2'] = rand(1, 10);
		$_SESSION['captcha_res'] = $_SESSION['captcha_1'] + $_SESSION['captcha_2'];
	}

	function bz_edit_form($fields){

		unset($fields['url']);

		return $fields;
	}

	function bz_check_captcha($commentdata){

		if (!session_id())
    		session_start();

		unset($commentdata['comment_author_uri']);

		if (is_user_logged_in()) {

			return $commentdata;
		}

		if (!isset($_POST['captcha'])) {

			wp_die( $message = '<b>Error:</b> Fill captcha.<br><a href="javascript:history.back()">« Back</a>', $title = 'Error: fill captcha' );		
		}

		if (intval($_POST['captcha']) !== $_SESSION['captcha_res']) {
			wp_die( $message = '<b>Error:</b> Wrong captcha.<br><a href="javascript:history.back()">« Back</a>', $title = 'Error: wrong captcha' );
		}

		return $commentdata;
	}

	function bz_locate_captcha($commentfield){

		if (is_user_logged_in()) {

			return $commentfield;
		}

		$commentfield .= '<p class="">
							<label for="captcha">Captcha <span class="required">*</span></label>
							<div>
								<p style="display: inline-block;">' . $_SESSION['captcha_1'] . ' + ' . $_SESSION['captcha_2'] . ' =  </p><input type="text" name="captcha" id="captcha" maxlength="2" style="width: 40px; display: inline-block; margin-left: 10px;">
							</div>
						  </p>';

		return $commentfield;
	}
}

$bz_captcha = new Captcha();

?>