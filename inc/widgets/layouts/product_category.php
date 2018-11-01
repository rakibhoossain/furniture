<div class="category_products">
	<?php
    foreach ( $ridianur_terms as $ridianur_term ) { 

		$image_id = get_term_meta ( $ridianur_term->term_id, 'product_image', true );
		// Echo the image
		$image = esc_url(wp_get_attachment_image_url ( $image_id, 'large' ));
		$cat_url = esc_url( get_category_link( $ridianur_term->term_id ) );

		if ($image) {

		?>
	
	<figure class="fourSlide_Caption">
	          <a href="<?php echo $cat_url; ?>"><img src="<?php echo $image; ?>" alt="<?php echo $ridianur_term->name; ?>"></a>
	         <figcaption>
	           <ul class="list-inline">
	                <li><?php echo $ridianur_term->name; ?></li>
	                <li><a href="<?php echo $cat_url; ?>"><i class="fa fa-search"></i>View </a></li>
	           </ul>
	         </figcaption>
	      </figure>


		

		<?php
		}
    }
    ?>
    </div>