<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package furniture
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function furniture_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'furniture_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function furniture_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'furniture_pingback_header' );

/**
 *  Breadcrumb
 *
 *
 */
if ( ! function_exists( 'eshop_breadcrumbs' ) ) :

    /**
     * Simple breadcrumb.
     *
     * @since 1.0.0
     *
     * @link: https://gist.github.com/melissacabral/4032941
     *
     * @param  array $args Arguments
     */
    function eshop_breadcrumbs( $args = array() ) {
        // Bail if Home Page.
        // if ( is_front_page() || is_home() ) {
        if ( is_front_page() ) {
            return;
        }

        if ( ! function_exists( 'breadcrumb_trail' ) ) {
            require_once trailingslashit(get_template_directory()) . '/inc/breadcrumbs.php';
        }

        $breadcrumb_args = array(
            'container'   => 'div',
            'show_browse' => false,
        );
        breadcrumb_trail( $breadcrumb_args );
       
    }

endif;

if ( ! function_exists( 'eshop_get_number_of_comments' ) ) {
    /**
     * Simple function used to return the number of comments a post has.
     */
    function eshop_get_number_of_comments( $post_id ) {

        $num_comments = get_comments_number( $post_id ); // get_comments_number returns only a numeric value

        if ( comments_open() ) {
            if ( 0 == $num_comments ) {
                $comments = __( 'No Comments', 'eshop' );
            } elseif ( $num_comments > 1 ) {
                $comments = $num_comments . __( ' Comments', 'eshop' );
            } else {
                $comments = __( '1 Comment', 'pixova-lite' );
            }
            $write_comments = '<a href="' . get_comments_link() . '">' . $comments . '</a>';
        } else {
            $write_comments = __( 'Comments are off for this post.', 'eshop' );
        }

        return $write_comments;

    }
}



//Comment list
function eshop_comment($comment, $args, $depth) {
    if ( 'div' === $args['style'] ) {
        $tag       = 'div';
        $add_below = 'comment';
    } else {
        $tag       = 'li';
        $add_below = 'div-comment';
    }?>
    <<?php echo $tag; ?> <?php comment_class( empty( $args['has_children'] ) ? 'reviews-i existimg' : 'reviews-i existimg parent' ); ?> id="comment-<?php comment_ID() ?>"><?php 
    if ( 'div' != $args['style'] ) { ?>
        <div id="div-comment-<?php comment_ID() ?>" class="comment-body"><?php
    } ?>
        <div class="reviews-i-img"><?php 
            if ( $args['avatar_size'] != 0 ) {
                echo get_avatar( $comment, $args['avatar_size'] ); 
            } 
            // if( $commentrating = get_comment_meta( $comment->comment_ID, 'rating', true ) ) {

            // $text .= '<div class="reviews-i-rating">';
            // for( $i=1; $i <= $commentrating; $i++ )
            //     $text .='<i class="fa fa-star"></i>';
            // $text .= '</div>';

            //     echo $text;     
            // }
        ?>
        <time datetime="<?php printf(  __('%1$s'), get_comment_date() ); ?>" class="reviews-i-date">
            <a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ); ?>">
                <?php printf(  __('%1$s'), get_comment_date() ); ?>
            </a><?php 
            edit_comment_link( __( '(Edit)' ), '  ', '' ); ?>
        </time>

        </div><?php 
        if ( $comment->comment_approved == '0' ) { ?>
            <em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.' ); ?></em><br/><?php 
        } ?>


        <div class="reviews-i-cont">
            <?php comment_text(); ?>
            <span class="reviews-i-margin"></span>
       <h3 class="reviews-i-ttl"><?php printf( __( '%s' ), get_comment_author_link() ); ?></h3>

        </div>

        <div class="reply"><?php 
                comment_reply_link( 
                    array_merge( 
                        $args, 
                        array( 
                            'add_below' => $add_below, 
                            'depth'     => $depth, 
                            'max_depth' => $args['max_depth'] 
                        ) 
                    ) 
                ); ?>
        </div><?php 
    if ( 'div' != $args['style'] ) : ?>
        </div><?php 
    endif;
}

add_filter( 'pre_get_posts', 'tgm_io_cpt_search' );
/**
 * This function modifies the main WordPress query to include an array of 
 * post types instead of the default 'post' post type.
 *
 * @param object $query  The original query.
 * @return object $query The amended query.
 */
function tgm_io_cpt_search( $query ) {
    
    if ( $query->is_search ) {
    $query->set( 'post_type', array( 'post', 'product' ) );
    }
    
    return $query;
    
}

/**
 * Get Breaking news types
 * 
 * @return array
 */
function magazil_breaking_news_type() {
  $news = array();

  $news[ 'post' ]       = esc_html__( 'Posts', 'furniture' );
  $news[ 'page' ]       = esc_html__( 'Pages', 'furniture' );
  $news[ 'product' ]       = esc_html__( 'Product', 'furniture' );
  $news[ 'category' ]   = esc_html__( 'Categories', 'furniture' );
  $news[ 'custom' ]        = esc_html__( 'Custom', 'furniture' );

  return $news;
}

/**
 * Get all pagess
 * 
 * @return array
 */
function magazil_page_list() {
  $pages    = array();
  foreach ( get_pages() as $page ) {
    $pages[ $page->ID ] = $page->post_title;
  }

  return $pages;
}

function furniture_product_list(){
  $pages    = array();
  $products = get_posts(
      array(
          'showposts' => -1,
          'post_type' => 'product',
      )
  );
  
  foreach ( $products as $page ) {
    $pages[ $page->ID ] = $page->post_title;
  }
  return $pages;
}


/**
 * Get all categories
 * 
 * @return array
 */
function magazil_cat_list() {
  $cats    = array();
  foreach ( get_categories() as $categories => $category ) {
    $cats[ $category->term_id ] = $category->name;
  }

  return $cats;
}





/**
 * Display Fontawesome icons in social links menu.
 *
 * @param  string  $item_output The menu item output.
 * @param  WP_Post $item        Menu item object.
 * @param  int     $depth       Depth of the menu.
 * @param  array   $args        wp_nav_menu() arguments.
 * @return string  $item_output The menu item output with social icon.
 */
function magazil_nav_menu_social_icons( $item_output, $item, $depth, $args ) {
  // Get supported social icons.
  $social_icons =  magazil_social_links_icons();

  // Change SVG icon inside social links menu if there is supported URL.
  if ( 'social' === $args->theme_location ) {
    foreach ( $social_icons as $attr => $value ) {
      if ( false !== strpos( $item_output, $attr ) ) {

        $item_output = str_replace( $args->link_after, '</span><i class="fa fa-'.esc_attr( $value ).'"></i>', $item_output );
      }
    }
  }

  return $item_output;
}
add_filter( 'walker_nav_menu_start_el', 'magazil_nav_menu_social_icons', 10, 4 );


/**
 * Returns an array of supported social links (URL and icon name).
 *
 * @return array $social_links_icons
 */
function magazil_social_links_icons() {
  // Supported social links icons.
  $social_links_icons = array(
    'behance.net'     => 'behance',
    'codepen.io'      => 'codepen',
    'deviantart.com'  => 'deviantart',
    'digg.com'        => 'digg',
    'docker.com'      => 'dockerhub',
    'dribbble.com'    => 'dribbble',
    'dropbox.com'     => 'dropbox',
    'facebook.com'    => 'facebook',
    'flickr.com'      => 'flickr',
    'foursquare.com'  => 'foursquare',
    'plus.google.com' => 'google-plus',
    'github.com'      => 'github',
    'instagram.com'   => 'instagram',
    'linkedin.com'    => 'linkedin',
    'mailto:'         => 'envelope-o',
    'medium.com'      => 'medium',
    'pinterest.com'   => 'pinterest-p',
    'pscp.tv'         => 'periscope',
    'getpocket.com'   => 'get-pocket',
    'reddit.com'      => 'reddit-alien',
    'skype.com'       => 'skype',
    'skype:'          => 'skype',
    'slideshare.net'  => 'slideshare',
    'snapchat.com'    => 'snapchat-ghost',
    'soundcloud.com'  => 'soundcloud',
    'spotify.com'     => 'spotify',
    'stumbleupon.com' => 'stumbleupon',
    'tumblr.com'      => 'tumblr',
    'twitch.tv'       => 'twitch',
    'twitter.com'     => 'twitter',
    'vimeo.com'       => 'vimeo',
    'vine.co'         => 'vine',
    'vk.com'          => 'vk',
    'wordpress.org'   => 'wordpress',
    'wordpress.com'   => 'wordpress',
    'yelp.com'        => 'yelp',
    'youtube.com'     => 'youtube',
  );

  /**
   * Filter Magazil social links icons.
   *
   * @since Magazil 1.0
   *
   * @param array $social_links_icons Array of social links icons.
   */
  return apply_filters( 'magazil_social_links_icons', $social_links_icons );
}




function furniture_social_share(){

  $url    = get_the_permalink();
  $title  = get_the_title();
  ?>
  <ul class="post-share">
    <li>
      <a onclick="window.open('https://www.facebook.com/sharer.php?s=100&amp;p[url]=<?php echo $url; ?>','sharer', 'toolbar=0,status=0,width=620,height=280');" data-toggle="tooltip" title="<?php echo __('Share on Facebook', 'furniture'); ?>" href="javascript:">
        <i class="fa fa-facebook"></i>
      </a>
    </li>
    <li>
      <a onclick="popUp=window.open('http://twitter.com/home?status=<?php echo $title; ?><?php echo $url; ?>','sharer','scrollbars=yes,width=800,height=400');popUp.focus();return false;" data-toggle="tooltip" title="<?php echo __('Share on Twitter', 'furniture'); ?>" href="javascript:;">
        <i class="fa fa-twitter"></i>
      </a>
    </li>
    <li>
      <a onclick="popUp=window.open('http://vk.com/share.php?url=<?php echo $url; ?>','sharer','scrollbars=yes,width=800,height=400');popUp.focus();return false;" data-toggle="tooltip" title="<?php echo __('Share on VK', 'furniture'); ?>" href="javascript:;">
        <i class="fa fa-vk"></i>
      </a>
    </li>
<?php
  if ( has_post_thumbnail() ){
    
    $imsh_url = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'furniture-large' );
    $share_image_url = esc_url($imsh_url[0]);
?>
  <li>
    <a data-toggle="tooltip" title="Share on Pinterest" onclick="popUp=window.open('http://pinterest.com/pin/create/button/?url=<?php echo $url; ?>&amp;description=<?php echo $title; ?>&amp;media=<?php echo $share_image_url; ?>','sharer','scrollbars=yes,width=800,height=400');popUp.focus();return false;" href="javascript:;">
      <i class="fa fa-pinterest"></i>
    </a>
  </li>

<?php
  }
?>
  <li>
    <a data-toggle="tooltip" title="<?php echo __('Share on Google +1', 'furniture'); ?>" href="javascript:;" onclick="popUp=window.open('https://plus.google.com/share?url=<?php echo $url; ?>','sharer','scrollbars=yes,width=800,height=400');popUp.focus();return false;">
      <i class="fa fa-google-plus"></i>
    </a>
  </li>
  <li>
    <a data-toggle="tooltip" title="Share on Linkedin" onclick="popUp=window.open('http://linkedin.com/shareArticle?mini=true&amp;url=<?php echo $url; ?>&amp;title=<?php echo $title; ?>','sharer','scrollbars=yes,width=800,height=400');popUp.focus();return false;" href="javascript:;">
      <i class="fa fa-linkedin"></i>
    </a>
  </li>
  <li>
    <a data-toggle="tooltip" title="Share on Tumblr" onclick="popUp=window.open('http://www.tumblr.com/share/link?url=<?php echo $url; ?>&amp;name=<?php echo $title; ?>&amp;description=<?php echo wp_trim_words( get_the_content(), 40, '...' ); ?>','sharer','scrollbars=yes,width=800,height=400');popUp.focus();return false;" href="javascript:;">
      <i class="fa fa-tumblr"></i>
    </a>
  </li>
</ul>
  <?php
}



// product url
// function wpse_5308_post_type_link( $link, $post ) {
//     if ( $post->post_type === 'product' ) {
//         if ( $terms = get_the_terms( $post->ID, 'product-category' ) )
//             $link = str_replace( 'product-category', current( $terms )->slug, $link );
//     }

//     return $link;
// }

// add_filter( 'post_type_link', 'wpse_5308_post_type_link', 10, 2 );