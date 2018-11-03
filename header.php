<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package furniture
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'furniture' ); ?></a>

	<header id="masthead" class="site-header">
		<div class="header-top-area">
	        <div class="container">
	            <div class="row">
	                <div class="col-md-6">
	                	<div class="top_header_text">
						<?php 
						$magazil_header_text = get_theme_mod( 'magazil_header_text' );
						if($magazil_header_text):?>
							<?php echo wp_specialchars_decode($magazil_header_text); ?>
						<?php endif; ?>
						</div>
	                </div>
	                <div class="col-md-6 text-right fruniture-lng-area">
						<?php if ( function_exists( 'pll_the_languages' ) ) : ?>
	                    <ul class="list-lng">
	                    	<?php pll_the_languages(array( 'show_flags' => 1,'show_names' => 0 ));?></ul>
						<?php endif; ?>
	                </div>
	            </div>
	        </div>
	    </div>

		<div class="site-branding">
			<div class="navbar-top">
				<div class="container">
					<div class="row">
						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
							<?php the_custom_logo(); ?>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-8 header_search">
							<?php get_search_form(); ?>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
							<div class="header_right">
		                        <div class="s_icon social">
									<?php
									if ( has_nav_menu( 'social' ) ) {
										wp_nav_menu( array(
											'theme_location'    => 'social',
											'menu_class'        => 'social-menu',
											'container'         => false,
											'depth'          => 1,
											'link_before'    => '<span class="screen-reader-text">',
											'link_after'     => '</span><i class="fa fa-chain"></i>',
										) );
									}
									?>
		                        </div>
		                    </div>
						</div>
					</div>
				</div>
			</div>
		</div><!-- .site-branding -->

<!-- 		<nav id="site-navigation" class="main-navigation">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'furniture' ); ?></button>
			<?php
			// wp_nav_menu( array(
			// 	'theme_location' => 'menu-1',
			// 	'menu_id'        => 'primary-menu',
			// ) );
			?>
		</nav>
		#site-navigation -->

		<div class="primary-navigation">
			<div class="container main-menu" id="main-menu">
				<!-- <div class="row align-items-center justify-content-between"></div> -->

					<nav id="nav-menu-container" class="nav-menu-container">
						<?php
						wp_nav_menu( array(
							'theme_location'    => 'primary',
							'menu_class'        => 'nav-menu sf-menu',
							'container'         => false,
						) );
						?>
					</nav><!-- #nav-menu-container -->
<!--
					<div class="navbar-right">

						ln

					</div> -->

			</div>
		</div>
	</header><!-- #masthead -->

<?php
// $categories = get_terms( 'product_category', 'orderby=count&hide_empty=0' );

// var_dump($categories);

// foreach ( $categories as $category ) {
// echo $category->slug;
// }
?>


	<div id="content" class="site-content">
