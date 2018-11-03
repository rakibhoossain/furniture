<?php
/**
 * Template part for displaying results single post
 liink https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package furniture
 */

?>
    <!--Single post-->
    <h1 class="main-ttl"><span><?php the_title(); ?></span></h1>
    <!-- Blog Post - start -->
    <div class="post-wrap stylization">
        <?php the_post_thumbnail('post-single'); ?>
        <?php the_content(); ?>
        <!-- Share Links -->
        <div class="post-share-wrap">
            <?php furniture_social_share(); ?>
            <ul class="post-info">

                <?php
                printf(

                                // Translators: 1 is the post author, 2 is the category list.
                    __( '<li><time datetime="%1$s">%1$s</time></li><li>%2$s</li><li>Comments: %3$s</li>', 'eshop' ),
                                // Translators: Post time
                    get_the_date( get_option( 'date_format' ), $post->ID ),
                                // Translators: tag list
                    get_the_tag_list( 'Tags: ',', ','' ),
                                // Translators: Number of com,ments
                    eshop_get_number_of_comments( $post->ID )                       

                );
                ?>
            </ul>
        </div>
    </div>
    <!-- Blog Post - end -->