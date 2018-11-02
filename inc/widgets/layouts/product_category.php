<div class="category-products">
<ul class="un-sty product-slider">
	<?php
    foreach ( $ridianur_terms as $ridianur_term ) { 

		$image_id = get_term_meta ( $ridianur_term->term_id, 'product_image', true );
		// Echo the image
		$image = esc_url(wp_get_attachment_image_url ( $image_id, 'furniture-feature' ));
		$cat_url = esc_url( get_category_link( $ridianur_term->term_id ) );

		if ($image) {

		?>
<li>
<div class="product">
  <div class="product-image">
            <a href="<?php echo esc_url($cat_url); ?>">
          <?php 
            printf('<img src="'.esc_url($image).'" alt="'.$ridianur_term->name.'" class="img-responsive primaryImage">');
            ?>
          </a>
  </div>
  <div class="product-describ">
            <h4><?php echo $ridianur_term->name; ?></h4>
          <span><a href="<?php echo esc_url($cat_url); ?>" class="btn btn-primary product-btn"><i class="fa fa-search"></i> View</a></span>
  </div>
</div>
</li>
		<?php
		}
    }
    ?>
</ul>
</div>

