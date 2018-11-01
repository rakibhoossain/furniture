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
	<div class="row mt-30">
		<div class="col-md-9">
<?php if ( have_posts() ) : ?>
    	
		<?php while ( have_posts() ) : the_post(); get_template_part( 'template-parts/content', 'single' );?>
			<div class="clearfix"></div>
			<!-- Related Posts -->
			<?php do_action( 'magazil_single_after_article' );
				the_post_navigation(array( 
					'prev_text' => '%title',
					'next_text' => '%title',
				));
                // If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) : comments_template(); endif;

		  endwhile;
		else:
			get_template_part( 'template-parts/content', 'none' );?>
	<?php endif; ?>			
		</div>
		<div class="col-md-3">
			<?php get_sidebar(); ?>
		</div>
	</div>
</div>

		</main><!-- #main -->
	</div><!-- #primary -->
<?php
get_footer();