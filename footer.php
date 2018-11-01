<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package furniture
 */

?>
	</div><!-- #content -->




<footer>
    <div class="footer">
        <div class="container">
            <div class="row">

			<?php
				for ($i=1; $i<=5 ; $i++) { 
					if (is_active_sidebar("footer-sidebar-".($i))) :
						dynamic_sidebar("footer-sidebar-".($i));
					endif;
					echo '<div style="clear:both" class="hide visible-xs"></div>';
				}
			?>

            </div>
            <!--/.row-->
        </div>
        <!--/.container-->
    </div>
    <!--/.footer-->

    <div class="footer-bottom">
        <div class="container">
            <p class="pull-left">
                © 2018 Codedecor. All right reserved. | <span>Developed by <a style="color: #696969;" href="http://rakib.ooo" target="_blank">Rakib Hossain</a></span>
            </p>

				<?php
				/* translators: 1: Theme name, 2: Theme author. */
				// printf( esc_html__( 'Theme: %1$s by %2$s.', 'furniture' ), 'furniture', '<a href="http://underscores.me/">Underscores.me</a>' );
				?>

            <div class="pull-right paymentMethodImg">
                <img height="30" class="pull-right" src="https://www.regalfurniturebd.com/frontassets/images/site/payment/american-express.png" alt="american" style="opacity: 1;">
                <img height="30" class="pull-right" src="https://www.regalfurniturebd.com/frontassets/images/site/payment/Bikash.png" alt="Bikash" style="opacity: 1;">
                <img height="30" class="pull-right" src="https://www.regalfurniturebd.com/frontassets/images/site/payment/dbbl-nexus.png" alt="img" style="opacity: 1;">
                <img height="30" class="pull-right" src="https://www.regalfurniturebd.com/frontassets/images/site/payment/IFIC-mobile-banking.png" alt="img" style="opacity: 1;">
                <img height="30" class="pull-right" src="https://www.regalfurniturebd.com/frontassets/images/site/payment/islamic-bank--Internet-banking.png" alt="islamic" style="opacity: 1;">
                <img height="30" class="pull-right" src="https://www.regalfurniturebd.com/frontassets/images/site/payment/islamic-bank--mobile-banking.png" alt="img" style="opacity: 1;">
                <img height="30" class="pull-right" src="https://www.regalfurniturebd.com/frontassets/images/site/payment/mastercardd.png" alt="mastercardd" style="opacity: 1;">
                <img height="30" class="pull-right" src="https://www.regalfurniturebd.com/frontassets/images/site/payment/rocket.png" alt="rocket" style="opacity: 1;">
                <img height="30" class="pull-right" src="https://www.regalfurniturebd.com/frontassets/images/site/payment/visa.png" alt="visa" style="opacity: 1;">

            </div>
        </div>
    </div>
    <!--/.footer-bottom-->
</footer>


</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
