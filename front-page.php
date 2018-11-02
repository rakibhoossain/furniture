<?php

get_header();
?>

<div class="container banner-area headerOffset">
    <div class="row">
        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
            <div class="homepage-slides-wrapper">
                <div class="homepage-slides">
                <?php
                    $query = new WP_Query( array( 'post_type' => 'product','posts_per_page' => 5 ) );

                    if ( $query->have_posts() ) :
                        while ( $query->have_posts() ) : $query->the_post();
                            if ( has_post_thumbnail() ) {   
                                // $image = wp_get_attachment_url( get_post_thumbnail_id() );
                                $image_url = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'furniture-large' );
                                $image = esc_url($image_url[0]);
                            ?>
                                <div class="single-slide-item" style="background: url('<?php echo esc_url($image); ?>');">
                                    <div class="slide-item-table">
                                        <div class="slide-item-tablecell"></div>
                                    </div>
                                </div>
                            <?php
                            }
                            
                        endwhile;
                        wp_reset_postdata();
                        wp_reset_query();
                    endif;
                ?> 
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
            <div class="slider_right img-responsive">
                <!-- widget -->
                <?php if ( is_active_sidebar( 'slider-sidebar' ) ) { ?>
                    <?php dynamic_sidebar( 'slider-sidebar' ); ?>
                <?php } ?>            

            </div>
        </div>
    </div>
</div>

<!-- Content widgetarea -->
<div class="container contnt-area">
    <div class="row">
        <div class="col-md-12">
            <?php if ( is_active_sidebar( 'content-area' ) ) { ?>
                <?php dynamic_sidebar( 'content-area' ); ?>
            <?php } ?>            
        </div>
    </div>
</div>

    <!-- Testimonials -->
<section class="testimonials ">
        <div class="testimonials-inner">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        
                        <div class="testimonials-slider">
                            <div class="caroufredsel_wrapper">
                                <ul id="testimonials">


                <?php $args = array( 'post_type' => 'testimonial', 'posts_per_page' => 3 );
                $loop = new WP_Query( $args );
                while ( $loop->have_posts() ) : $loop->the_post();
                    $post_id = get_the_ID();
                    $post_custom = get_post_custom($post_id);
                    $post_name = $post_custom["name"][0];
                    $post_position = $post_custom["position"][0];
                    $post_rating = $post_custom["rating"][0];
               if ( has_post_thumbnail() ) {
                // $testimonial_image_url = wp_get_attachment_url( get_post_thumbnail_id() );

                $image_url = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'furniture-xsm' );
                $testimonial_image_url = esc_url($image_url[0]);

?>
<li>
    <div class="testimonials-avatar">
        <img src="<?php echo $testimonial_image_url; ?>" alt="<?php echo $post_name; ?>">
        <span class="fw-after-no-ratio" style="padding-bottom: 108.75%"></span>
    </div>
        <div class="testimonials-text">
<?php the_content()?>
                            <div class="rating">

                                <?php for ($i=1; $i <= $post_rating; $i++) { echo '<i class="fa fa-star"></i>';}?>

                            </div>
        </div>
        <div class="testimonials-author"><?php echo get_the_title(); ?></div>
        <div class="testimonials-organization"><?php echo $post_name; ?>, <a target="_blank" href="https://www.hostingadvice.com/" hidefocus="true" style="outline: none;"><?php echo $post_position; ?></a></div>
    </li>
<?php



                }?>


                <?php endwhile;
                wp_reset_postdata();
            wp_reset_query();
                ?>












                                </ul>
                            </div>

                        </div>


                     </div>


                </div>
                <!--/ row-->
            </div>

        </div>
    </section>






    <!-- Partner -->
    <div class="container partner-area">
        <div class="row">
            <div class="col-md-12">
                <ul class="partner-slider">
                <?php $args = array( 'post_type' => 'partner');
                $loop = new WP_Query( $args );
                while ( $loop->have_posts() ) : $loop->the_post();
                    $post_id = get_the_ID();
                    $post_custom = get_post_custom($post_id);
                    $partner_name = get_the_title();
                    $partner_url = $post_custom["website"][0];
                if ( has_post_thumbnail() ){

                    // $partner_image_url = wp_get_attachment_url( get_post_thumbnail_id() );
                $image_url = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'furniture-xsm' );
                $partner_image_url = esc_url($image_url[0]);

                    ?>

<li>
    <div class="partner">
        <a href="<?php echo $partner_url; ?>" target="_blank">
           <img src="<?php echo $partner_image_url; ?>" class="img-responsive" alt="<?php echo $partner_name; ?>">
       </a>
    </div>    
</li>


                    <?php
                }
                
                ?>
                        
                <?php endwhile;wp_reset_postdata();
            wp_reset_query();?> 
                </ul>
            </div>
        </div>
    </div>
<?php
get_footer();