<?php 
/**
 * Plugin Name: Related Posts
 * Description: Description
 * Plugin URI: http://#
 * Author: buzzz
 * Author URI: http://#
 * Version: 1.0.0
 */

add_filter('the_content', 'bz_related_posts');
add_action('wp_enqueue_scripts', 'wp_register_styles_scripts');

function wp_register_styles_scripts(){

	wp_register_style( 'related-posts-style', plugins_url('css/style.css', __FILE__) );

	wp_enqueue_style('related-posts-style');
}

function bz_related_posts($content){

	if (!is_single()) {
		return $content;
	}

	$id = get_the_ID();
	$categories = get_the_category($id);
	$cats_id = array();

	foreach ($categories as $category) {

		$cats_ids[] = $category->cat_ID;
	}

	$related_posts = new WP_query(

		array(
			'posts_per_page' => 3,
			'category__in' => $cats_ids,
			'orderby' => 'rand',
			'post__not_in' => array($id)
		)
	);

	if ($related_posts->have_posts()) {

		$content .= '<div class="related-posts"><h3>Related posts:</h3>';

		while ($related_posts->have_posts()) {

			$related_posts->the_post();
			if (has_post_thumbnail()) {
				
				$img = get_the_post_thumbnail( get_the_ID(), array(100, 100), array('alt' => get_the_title()));
			}
			else{
				
				$img = '<img src="' . plugins_url('img/no-image.jpg', __FILE__) . '" alt="' . get_the_title() . '" width="100" height="100">';
			}	

			$content .= '<a href="' . get_permalink() . '" class="related-image"><span class="tooltiptext">' . get_the_title() . '</span>' . $img . '</a>';		
		}

		$content .= '</div>';
	}

	wp_reset_query();

	return $content;
}

 ?>