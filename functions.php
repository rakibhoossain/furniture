<?php
/**
 * furniture functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package furniture
 */
flush_rewrite_rules( false );
if ( ! function_exists( 'furniture_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function furniture_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on furniture, use a find and replace
		 * to change 'furniture' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'furniture', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'primary' => esc_html__( 'Primary', 'furniture' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'furniture_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'furniture_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function furniture_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'furniture_content_width', 640 );
}
add_action( 'after_setup_theme', 'furniture_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function furniture_widgets_init() {
		register_sidebar( array(
		'name'          => esc_html__( 'Front page area', 'magazil' ),
		'id'            => 'content-area',
		'description'   => esc_html__( 'Add widgets to front page.', 'magazil' ),
		'before_widget' => '<div id="%1$s" class="single-post-wrap pd-20 %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="cat-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Slider Right Area', 'furniture' ),
		'id'            => 'slider-sidebar',
		'description'   => esc_html__( 'Add widgets to slider right area.', 'furniture' ),
		'before_widget' => '<div class="slider_right img-responsive">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'furniture' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'furniture' ),
		'before_widget' => '<section id="%1$s" class="sidebar widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer sidebar-1', 'furniture' ),
		'id'            => 'footer-sidebar-1',
		'description'   => esc_html__( 'Add widget to footer-2', 'furniture' ),
		'before_widget' => '<section id="%1$s" class="col-lg-3 col-md-3 col-sm-4 col-xs-12 widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
		register_sidebar( array(
		'name'          => esc_html__( 'Footer sidebar-2', 'furniture' ),
		'id'            => 'footer-sidebar-2',
		'description'   => esc_html__( 'Add widget to footer-2', 'furniture' ),
		'before_widget' => '<section id="%1$s" class="col-lg-2 col-md-2 col-sm-4 col-xs-12 widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
			register_sidebar( array(
		'name'          => esc_html__( 'Footer sidebar-3', 'furniture' ),
		'id'            => 'footer-sidebar-3',
		'description'   => esc_html__( 'Add widget to footer-3', 'furniture' ),
		'before_widget' => '<section id="%1$s" class="col-lg-2 col-md-2 col-sm-4 col-xs-12 widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
		register_sidebar( array(
		'name'          => esc_html__( 'Footer sidebar-4', 'furniture' ),
		'id'            => 'footer-sidebar-4',
		'description'   => esc_html__( 'Add widget to footer-4', 'furniture' ),
		'before_widget' => '<section id="%1$s" class="col-lg-3 col-md-3 col-sm-4 col-xs-12 widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer sidebar-5', 'furniture' ),
		'id'            => 'footer-sidebar-5',
		'description'   => esc_html__( 'Add widget to footer 5', 'furniture' ),
		'before_widget' => '<section id="%1$s" class="col-lg-2 col-md-2 col-sm-4 col-xs-12 widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

}
add_action( 'widgets_init', 'furniture_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function furniture_scripts() {
	

	wp_enqueue_style( 'furniture-bootstrap', get_theme_file_uri( '/assets/css/bootstrap.min.css' ), array(), '1.0' );
	wp_enqueue_style( 'furniture-linearicons', get_theme_file_uri( '/assets/css/linearicons.css' ), array(), '1.0' );
	wp_enqueue_style( 'furniture-font-awesome', get_theme_file_uri( '/assets/css/font-awesome.min.css' ), array(), '1.0' );
	wp_enqueue_style( 'furniture-carousel', get_theme_file_uri( '/assets/css/owl.carousel.css' ), array(), '1.0' );
	wp_enqueue_style( 'furniture-superfish', get_theme_file_uri( '/assets/css/superfish.css' ), array(), '1.0' );

	wp_enqueue_style( 'furniture-magnific-popup', get_theme_file_uri( '/assets/css/magnific-popup.css' ), array(), '1.0' );
	wp_enqueue_style( 'furniture-xzoom', get_theme_file_uri( '/assets/css/xzoom.css' ), array(), '1.0' );

	wp_enqueue_style( 'furniture-style', get_stylesheet_uri() );
	wp_enqueue_style( 'furniture-style-theme', get_theme_file_uri( '/assets/css/theme.css' ), array(), '1.0' );


	wp_enqueue_script( 'jquery');
	wp_enqueue_script( 'furniture-bootstrap-js', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array(), '20151215', true );
	wp_enqueue_script( 'furniture-carousel-js', get_template_directory_uri() . '/assets/js/owl.carousel.min.js', array(), '20151215', true );

	wp_enqueue_script( 'furniture-hoverIntent', get_template_directory_uri() . '/assets/js/hoverIntent.js', array(), '20151215', true );
	wp_enqueue_script( 'furniture-superfish', get_template_directory_uri() . '/assets/js/superfish.min.js', array(), '20151215', true );

	wp_enqueue_script( 'furniture-xzoom', get_template_directory_uri() . '/assets/js/xzoom.min.js', array(), '20151215', true );
	wp_enqueue_script( 'furniture-magnific-popup', get_template_directory_uri() . '/assets/js/magnific-popup.js', array(), '20151215', true );
	wp_enqueue_script( 'furniture-setup', get_template_directory_uri() . '/assets/js/setup.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	wp_enqueue_script( 'furniture-main-scr', get_template_directory_uri() . '/assets/js/active.js', array(), '20151215', true );
}
add_action( 'wp_enqueue_scripts', 'furniture_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Functions which enhance for related post.
 */
require get_template_directory() .'/inc/class-eshop-related-posts.php';


/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/widgets/widgets.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

