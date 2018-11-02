<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package furniture
 */

get_header();
?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<div class="container">
	<?php eshop_breadcrumbs(); ?>
		<?php	if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
				the_archive_title( '<h1 class="page-title">', '</h1>' );
				the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</header><!-- .page-header -->
		<?php endif; ?>
	<div class="row">
		<div class="col-md-9">
			



		<?php
		if ( have_posts() ) : ?>

			<div class="posts-list blog-page">
			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();
				?>
				<div class="cf-sm-6 cf-lg-4 col-xs-6 col-sm-6 col-md-4 posts2-i">
				<?php
				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_type() );
				?>
				</div>
			<?php

			endwhile;
			?>
			</div>
			<?php
// the_posts_navigation();
			// pagination
			the_posts_pagination( array(
                'mid_size' => 3,
                'prev_text' => '<i class="fa fa-angle-double-left"></i> ',
                'next_text' => ' <i class="fa fa-angle-double-right"></i>',
            ) );

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>




		</div>
		<div class="col-md-3">
			<?php get_sidebar();?>
		</div>
	</div>
</div>
		</main><!-- #main -->
	</div><!-- #primary -->
<?php
get_footer();
