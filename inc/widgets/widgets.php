<?php

require get_template_directory() . '/inc/widgets/class-widget-magazil-posts-list-horizontal.php';
require get_template_directory() . '/inc/widgets/class-widget-magazil-product-category.php';

function magazil_companion_recent_posts(){
	
	register_widget('Widget_Magazil_Posts_List_Horizontal');
	register_widget('Widget_Magazil_Product_Category');
						
}
add_action( 'widgets_init', 'magazil_companion_recent_posts' );

?>