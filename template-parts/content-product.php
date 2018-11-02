    <!-- magnific start -->
    <section id="magnific">
    <div class="row">
      <div class="large-5 column">
        <div class="xzoom-container">
<?php
$product_image_url = wp_get_attachment_url( get_post_thumbnail_id() );
?>
          <img class="xzoom5" id="xzoom-magnific" src="<?php echo $product_image_url; ?>" xoriginal="<?php echo $product_image_url; ?>" />

          <div class="xzoom-thumbs">

<?php
    $gallery_array = explode(',', get_post_meta(get_the_ID(),'shift8_portfolio_gallery',true));
    if (is_array($gallery_array)) {
      ?>
<a href="<?php echo $product_image_url; ?>"><img class="xzoom-gallery5" width="80" src="<?php echo $product_image_url; ?>" title="image title"></a>

      <?php
      foreach ($gallery_array as $gallery_item) {
        $gallary_product = wp_get_attachment_thumb_url($gallery_item);
?>

            <a href="<?php echo $gallary_product; ?>"><img class="xzoom-gallery5" width="80" src="<?php echo $gallary_product; ?>" title="image title"></a>

<?php       
      }
    }

?>

          </div>
        </div>        
      </div>
      <div class="large-7 column">gg</div>
    </div>
    </section>   
    <!-- magnific end -->