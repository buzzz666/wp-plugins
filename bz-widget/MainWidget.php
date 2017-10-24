<?php

class MainWidget extends WP_Widget{

	function __construct(){

		$args = array(
			'name' => 'BZ Simple Widget',
			'description' => 'Simple description',
			'classname' => 'bz-class'
		);

		parent::__construct('bz_widget', '', $args);
	}

	public function widget($args, $instance){

		extract($args);
		extract($instance);

		$title = apply_filters( 'widget_title', $title );
		$text = apply_filters( 'widget_text', $text );

		$before_widget = '<div>';
		$after_widget = '</div>';

		echo $before_widget;
		echo $before_title . $title . $after_title;
		echo $text;
		echo $after_widget;
	}

	function form($instance){

		extract($instance);
		// var_dump($instance);
		?>
			<p>
				<label for="<?= $this->get_field_id('title') ?>">Widget Title</label>
				<input type="text" name="<?= $this->get_field_name('title') ?>" id="<?= $this->get_field_id('title') ?>" value="<?php if(isset($title)) echo esc_attr($title); ?>" class="widefat">
			</p>
			<p>
				<label for="<?= $this->get_field_id('text') ?>">Text</label>
				<textarea class="widefat" colls="20" rows="5" name="<?= $this->get_field_name('text') ?>" id="<?= $this->get_field_id('text') ?>" cols="30" rows="5"><?php if(isset($text)) echo esc_attr($text); ?></textarea>
			</p>
		<?php 
	}
}

?>