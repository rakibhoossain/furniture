<div class="product">
  <div class="product-image">
            <a href="<?php the_permalink(); ?>">
          <?php if(has_post_thumbnail()){ 
        // $image_url = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'magazil-feature-image' );
        // $image = esc_url($image_url[0]);
            $image = wp_get_attachment_url( get_post_thumbnail_id() );
            printf('<img src="'.esc_url($image).'" alt="img" class="img-responsive primaryImage">');
      }
            ?>
          </a>
  </div>
  <div class="product-describ">
              <h4>
            <a href="<?php echo get_the_permalink(); ?>">
              <?php echo get_the_title(); ?>
            </a>
          </h4>
          <span><a href="<?php echo get_the_permalink(); ?>" class="btn btn-primary product-btn">Details</a></span>
  </div>
</div>