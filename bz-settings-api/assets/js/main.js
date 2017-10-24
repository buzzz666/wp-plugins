jQuery(document).ready(function($){

	if (bzObj.bz_theme_options_body) {

		$('body').css('background-color', bzObj.bz_theme_options_body);
	}

	if (bzObj.bz_theme_options_header) {

		$('#masthead').css('background-color', bzObj.bz_theme_options_header);
	}
});