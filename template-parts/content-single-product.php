    <!-- magnific start -->
    <section id="magnific">
    <div class="row">
      <div class="large-5 column">
        <div class="xzoom-container">
<?php
      $image_sm_url = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'furniture-xsm' );
      $product_sm = esc_url($image_sm_url[0]);

      $image_lg_url = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'furniture-product' );
      $product_lg = esc_url($image_lg_url[0]);
      $ttitle = get_the_title();

?>
          <img class="xzoom5" id="xzoom-magnific" src="<?php echo $product_lg; ?>" xoriginal="<?php echo $product_lg; ?>" />

          
<?php
    $gallery_array = explode(',', get_post_meta(get_the_ID(),'shift8_portfolio_gallery',true));
    if (is_array($gallery_array) && count($gallery_array)>1) { 

      echo '<div class="xzoom-thumbs">';
    ?>


<a href="<?php echo $product_lg; ?>"><img class="xzoom-gallery5" width="80" src="<?php echo $product_sm; ?>"  xpreview="<?php echo $product_lg; ?>" title="<?php echo $ttitle; ?>"></a>

      <?php
      foreach ($gallery_array as $gallery_item) {
        // $gallary_product = wp_get_attachment_thumb_url($gallery_item);
        $thumb_url = wp_get_attachment_image_src( $gallery_item, 'furniture-xsm' );
        $product_full_url = wp_get_attachment_image_src( $gallery_item, 'furniture-product' );
?>
            <a href="<?php echo esc_url($product_full_url[0]); ?>"><img class="xzoom-gallery5" width="80" src="<?php echo esc_url($product_full_url[0]); ?>" title="<?php echo $ttitle; ?>"></a>
<?php       
      }

    echo '</div>';
    }

?>

          


        </div>        
      </div>
    </div>
    </section>   
    <!-- magnific end -->