<?php
/**
 * furniture Theme Customizer
 *
 * @package furniture
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function furniture_customize_register( $wp_customize ) {


    /** Custom-Customizer additions **/
    require_once get_template_directory() . '/inc/customizer/sanitize.php';

    /** Toggle additions **/
    require_once get_template_directory() . '/inc/customizer/class/class-customizer-toggle-control.php';

    /** Dropdown additions **/
    require_once get_template_directory() . '/inc/customizer/class/class-customizer-select-dropdown-control.php';

    /** Range slider additions **/
    require_once get_template_directory() . '/inc/customizer/class/class-customizer-range-control.php';

    /** Textarea control additions **/
    require_once get_template_directory() . '/inc/customizer/class/class-customizer-text-editor-control.php';

    /** International phone picker additions **/
    require_once get_template_directory() . '/inc/customizer/class/calss-customizer-phone-control.php';
    
    // Load customize callback.
    require_once get_template_directory() . '/inc/customizer/callback.php';




	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';


    $wp_customize->selective_refresh->add_partial( 'magazil_testimonial_text', array(
        'selector' => '.testimonial_section .section-title_h'
    ));


	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'furniture_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'furniture_customize_partial_blogdescription',
		) );
	}

    if (class_exists('WP_Customize_Panel')):
        $wp_customize->add_panel('magazil_panel', array(
            'priority' => 7,
            'capability' => 'edit_theme_options',
            'title' => __('Theme Settings', 'furniture'),
        	'description' => __( 'Magazil Theme settings', 'furniture' )
        ));

        //  ===================================
        //  ====     Header      ====
        //  ===================================
        $wp_customize->add_section('magazil_header_controls', array(
            'title' => __('Header settings', 'furniture'),
            'panel' => 'magazil_panel',
            'priority' => 5,
        ));

        $wp_customize->add_setting( 'magazil_header_text', array(
            'sanitize_callback' => 'wp_kses_post',
            // 'default'        => 0,
            'transport'  => 'postMessage'
        ) );
        $wp_customize->add_control( new Customizer_Text_Editor_Control(
            $wp_customize,
            'magazil_header_text',
            array(
                'label'           => esc_html__( 'Custom text', 'furniture' ),
                'description'     => esc_html__( 'Custom text to display at header top area.', 'furniture' ),
                'section'         => 'magazil_header_controls',
                'settings'        => 'magazil_header_text',
                'type'            => 'editor'
            )
        ));


        //  ===================================
        //  ====      Breaking news Settings      ====
        //  ===================================
        $wp_customize->add_section('magazil_breaking_news_controls', array(
            'title' => __('Slider settings', 'furniture'),
            'panel' => 'magazil_panel',
            'priority' => 7,
        ));
        
        /**
         * Display Breaking type
         */
        $wp_customize->add_setting( 'magazil_breaking_news_type', array(
            'sanitize_callback' => 'magazil_sanitize_array_breaking_type',
            'default'           => 'post',
            'transport'  => 'postMessage'
        ));
        
        /**
         * Display Breaking page
         */
        $wp_customize->add_setting( 'magazil_breaking_news_page', array(
            'sanitize_callback' =>  'magazil_sanitize_array_page',
            // 'default'           => '',
            'transport'  => 'postMessage'
        ));

        /**
         * Display Breaking product
         */
        $wp_customize->add_setting( 'magazil_breaking_product_page', array(
            'sanitize_callback' =>  'magazil_sanitize_array_product',
            // 'default'           => '',
            'transport'  => 'postMessage'
        ));        

        /**
         * Display Breaking category
         */
        $wp_customize->add_setting( 'magazil_breaking_news_category', array(
            'sanitize_callback' => 'magazil_sanitize_array_catagory',
            // 'default'        => 0,
            'transport'  => 'postMessage'
        ) );

        /**
         * Display Breaking custom
         */
        $wp_customize->add_setting( 'magazil_breaking_news_custom', array(
            'sanitize_callback' => 'wp_kses_post',
            // 'default'        => 0,
            'transport'  => 'postMessage'
        ) );


        /**
         * Breaking news limit
         */
        $wp_customize->add_setting( 'magazil_breaking_news_limit', array(
            'sanitize_callback' => 'magazil_sanitize_int',
            'default'           => absint(5),
            'transport'  => 'postMessage'
        ));

        /**
         * Breaking news type
         */
        $wp_customize->add_control( new Customizer_Select_Dropdown_Control( $wp_customize, 'magazil_breaking_news_type', array(
            'label'       => esc_html__( 'Slider type', 'furniture' ),
            'description' => esc_html__( 'Select what type of post you want to use', 'furniture' ),
            'section' => 'magazil_breaking_news_controls',
            'settings'   => 'magazil_breaking_news_type',
            'type'     => 'single',
            'choices'  => magazil_breaking_news_type()
        ) ) );

        /**
         * Breaking news page
         */
        $wp_customize->add_control( new Customizer_Select_Dropdown_Control( $wp_customize, 'magazil_breaking_news_page', array(
            'label'   => __('Slider pages', 'furniture'),
            'section' => 'magazil_breaking_news_controls',
            'settings'   => 'magazil_breaking_news_page',
            'type'     => 'multiple',
            'choices'  => magazil_page_list(),
            'active_callback' => 'breaking_page_callback',
        ) ) );

        /**
         * Breaking news product
         */
        $wp_customize->add_control( new Customizer_Select_Dropdown_Control( $wp_customize, 'magazil_breaking_product_page', array(
            'label'   => __('Select product', 'furniture'),
            'section' => 'magazil_breaking_news_controls',
            'settings'   => 'magazil_breaking_product_page',
            'type'     => 'multiple',
            'choices'  => furniture_product_list(),
            'active_callback' => 'breaking_product_callback',
        ) ) );

        /**
         * Breaking news category
         */
        $wp_customize->add_control( new Customizer_Select_Dropdown_Control( $wp_customize, 'magazil_breaking_news_category', array(
            'label'   => __('Slider category', 'furniture'),
            'section' => 'magazil_breaking_news_controls',
            'settings'   => 'magazil_breaking_news_category',
            'type'     => 'multiple',
            'choices'  => magazil_cat_list(),
            'active_callback' => 'breaking_cat_callback',
        ) ) );

        /**
         * Breaking news custom
         */
        $wp_customize->add_control( new Customizer_Text_Editor_Control(
            $wp_customize,
            'magazil_breaking_news_custom',
            array(
                'label'           => esc_html__( 'Custom text', 'furniture' ),
                'description'     => esc_html__( 'Custom text to display as slider. Must use list element to display properly.', 'furniture' ),
                'section'         => 'magazil_breaking_news_controls',
                'settings'        => 'magazil_breaking_news_custom',
                'type'            => 'editor-news',
                'active_callback' => 'breaking_custom_callback'
            )
        ));

        /**
         * Breaking news limit
         */
        $wp_customize->add_control( new WP_Customize_Range_Control( $wp_customize, 'magazil_breaking_news_limit', array(
            'label'           => esc_html__( 'Slider limit:', 'furniture' ),
            'description'     => esc_html__( 'How much post do you want to show.', 'furniture' ),
            'section'         => 'magazil_breaking_news_controls',
            'settings'        => 'magazil_breaking_news_limit',
            'type'        => 'magazil_range',
            'input_attrs' => array(
                'min' => 1,
                'max' => 50,
            ),
            'active_callback' => 'breaking_limit_callback',
        ) ) );



        //  ===================================
        //  ====     Testimonial      ====
        //  ===================================
        $wp_customize->add_section('magazil_testimonial_controls', array(
            'title' => __('Testimonial settings', 'furniture'),
            'panel' => 'magazil_panel',
            'priority' => 8,
        ));

        $wp_customize->add_setting( 'magazil_testimonial_text', array(
            'sanitize_callback' => 'wp_kses_post',
            // 'default'        => 0,
            'transport'  => 'postMessage'
        ) );
        $wp_customize->add_control( new Customizer_Text_Editor_Control(
            $wp_customize,
            'magazil_testimonial_text',
            array(
                'label'           => esc_html__( 'Header title content', 'furniture' ),
                'description'     => '',
                'section'         => 'magazil_testimonial_controls',
                'settings'        => 'magazil_testimonial_text',
                'type'            => 'editor'
            )
        ));


	endif;
}
add_action( 'customize_register', 'furniture_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function furniture_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function furniture_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function furniture_customize_preview_js() {
	wp_enqueue_script( 'furniture-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'furniture_customize_preview_js' );

/**
 * Enqueue script for custom customize control.
 */
function magazil_customize_enqueue() {
	wp_enqueue_script( 'magazil-custom-customize', get_template_directory_uri() . '/inc/customizer/js/magazil-customize.js', array( 'jquery', 'customize-controls' ), false, true );
}
add_action( 'customize_controls_enqueue_scripts', 'magazil_customize_enqueue' );
