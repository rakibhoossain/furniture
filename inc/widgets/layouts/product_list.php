<?php
if ( ! defined( 'WPINC' ) ) {
	die;
}
?>
<?php
if ( $posts->have_posts() && $posts->found_posts >=2): ?>
			<?php
			$idObj = get_category_by_slug( $instance['magazil_category'] );
			?>
			<h3 class="cat-title  mb-20">
				<?php
				if ( ! empty( $instance['title'] ) ) {
					?>
                     <?php echo esc_html( $instance['title'] ); ?>
					<?php
				} else {
					?>
                    <a href="<?php echo esc_url( get_category_link( $idObj->term_id ) ) ?>">
						<?php echo ( empty( $instance['title'] ) && $idObj !== false ) ? esc_html( $idObj->name ) : esc_html( $instance['title'] ); ?>
                    </a>
				<?php } ?>
            </h3>
            <div class="product-container">
            	<ul class="un-sty product-slider">
					<?php while ( $posts->have_posts() ) : $posts->the_post(); ?>
						<li>
	            		<?php get_template_part( 'template-parts/content', 'product' ); ?>
	            		</li>
					<?php endwhile; wp_reset_postdata();?>
				</ul>
			</div>
			<div class="clearfix" style="margin: 40px 0 0 0;"></div>

<?php endif; ?>
