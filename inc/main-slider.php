<?php

$query 				= get_theme_mod( 'magazil_breaking_news_type', 'post' );
$page 				= get_theme_mod( 'magazil_breaking_news_page', 0 );
$product 			= get_theme_mod( 'magazil_breaking_product_page', 0 );
$cat 				= get_theme_mod( 'magazil_breaking_news_category', 0 );
$breaking_custom 	= get_theme_mod( 'magazil_breaking_news_custom');

$number 			= get_theme_mod( 'magazil_breaking_news_limit', 5 );

if( $query != 'custom' ):
	if( $query == 'page' ){
		$args = array('post_type' => 'page', 'post__in' => $page, 'no_found_rows' => 1 );
	}else if($query == 'product'){
		if (count($product)>1) {
			$args = array('post_type' => 'product', 'post__in' => $product, 'no_found_rows' => 1 );
		}else{
			$args = array('post_type' => 'product', 'posts_per_page'=> $number, 'no_found_rows' => 1);
		}

	}else if($query == 'category'){
		$args = array('category__in' => $cat, 'posts_per_page'=> $number, 'no_found_rows' => 1 );
	}else{
		$args = array('post_type' => 'post', 'posts_per_page'=> $number, 'no_found_rows' => 1 );
	}
	$breaking_query = new wp_query( $args  );

	if( $breaking_query->have_posts()) : ?>

		<div class="homepage-slides">
			<?php
			while( $breaking_query->have_posts() ) : $breaking_query->the_post();

				if ( has_post_thumbnail() ) {
					$image_url = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'furniture-large' );
					$image = esc_url($image_url[0]);
					?>
					<div class="single-slide-item" style="background: url('<?php echo esc_url($image); ?>');">
						<div class="slide-item-table">
							<div class="slide-item-tablecell"></div>
						</div>
					</div>
					<?php
				}

			endwhile;
			wp_reset_postdata();
			wp_reset_query();
			?>
		</div>
	<?php endif; ?>

<?php else:
	if( !empty($breaking_custom) ){
		echo wp_specialchars_decode($breaking_custom);
	}
endif;
