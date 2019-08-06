<?php
/*
 * The template for displaying the footer.
 * Contains the closing of the #content div and all content after.
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 * @package under-milligram
 * @sinde 0.0.1
 */

/* Prepare
 ––––––––––––––––––––––––––––––
 */
	// /–– Access Control
	if( !defined( 'ABSPATH' ) ) exit;

	 ?>
	<!-- ====================
		<colophone>
	 ==================== -->
	<footer id = "colophone" class = "<?php _umx_template_the_colophone_attr(); ?>" role = "contentinfo">

		<!-- ===============
			<footer-nav>
		 =============== -->
		<div class = "<?php _umx_template_the_grid_attr(); ?>">
			<ul class = "footer-nav <?php _umx_template_the_column_attr(); ?>">
			<?php 
			if( get_theme_mod( 'setting_UMX_footer_nav' ) ) :
				$_args = array( 
								'theme_location'	 => 'footer_nav',
								'container'			 => FALSE,
								'fallback_cb'		 => FALSE,
								'depth'				 => 1,
								'items_wrap'			 => '%3$s',
								'echo'					 => TRUE,
							 );
				wp_nav_menu( $_args );
			endif;
			 ?>
			</ul>
		</div>

		<!-- ===============
			<footer-content>
		 =============== -->
		<div class = "footer-content <?php _umx_template_the_grid_attr(); ?>">
			<?php 
			if( is_active_sidebar( 'footer' ) ) : 
				dynamic_sidebar( 'footer' );
			endif;
			 ?>
		</div><!-- /.row -->


		<!-- ===============
			<credit>
		 =============== -->
		<div class = "<?php _umx_template_the_grid_attr(); ?>">

			<div class = "credit <?php _umx_template_the_column_attr(); ?>">
				<?php _umx_template_the_credit(); ?>
			</div><!-- /.site-info -->

		</div>

	</footer><!-- /#colophon .site-footer -->

</div><!-- /#page -->

<?php wp_footer(); ?>

</body>
</html>
