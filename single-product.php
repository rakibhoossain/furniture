<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package furniture
 */

get_header();
?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main">
	<div class="container">
	<?php eshop_breadcrumbs(); ?>

 

<?php if ( have_posts() ) : ?>
    <div class="row">
		<div class="col-md-9">

		<?php while ( have_posts() ) : the_post(); 

			$post_id = get_the_ID();
            $post_custom = get_post_custom($post_id);

            $product_price = $product_code = '';          

            if ($post_custom["product_price"][0]) {
            	$product_price = $post_custom["product_price"][0];
            }
            if ($post_custom["product_code"][0]) {
            	$product_code = $post_custom["product_code"][0];
            }
            

    	get_template_part( 'template-parts/content-single', 'product' );

	?>
			<div class="clearfix"></div>

			
			<!-- Related Posts -->


			<?php
				// the_post_navigation(array( 
				// 	'prev_text' => '%title',
				// 	'next_text' => '%title',
				// ));
?>
		</div>
		<div class="col-md-3">
			<div class="product-sigle-details">
				<h2 class="widget-title"><?php echo get_the_title(); ?></h2>
					<ul>
						<li>Price: <?php echo  $product_price; ?></li>
						<li>Product Code: <?php echo  $product_code; ?></li>
					</ul>
			</div>
		</div>
		<div class="col-md-12">
			<div class="product-single-details">
				<?php the_content(); ?>
				<!-- Share Links -->
		        <div class="post-share-wrap">
		            <?php furniture_social_share(); ?>
		        </div>
			</div>
		</div>
		<div class="col-md-12">
			<?php do_action( 'magazil_single_after_product' );?>
		</div>
	</div>
<?php
		  endwhile;
		else:
			get_template_part( 'template-parts/content', 'none' );?>
	<?php endif; ?>			
		
</div>

		</main><!-- #main -->
	</div><!-- #primary -->
<?php
get_footer();