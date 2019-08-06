<?php 
/*
 * The template for displaying 404(not found) page.
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 * @package under-milligram
 * @since 0.0.1
 */

/* Prepare
 ––––––––––––––––––––––––––––––
 */
	// /–– Access Control
	if( !defined( 'ABSPATH' ) ) exit;


	/**
	 	Load Header Template
	 */
	get_header();
	 ?>

	<!-- ====================
		<site-content>
	 ==================== -->
	<div id = "content" class = "<?php _umx_template_the_content_attr(); ?>">
		<div class = "<?php _umx_template_the_grid_attr(); ?>">

			<!-- ===============
				<main>
			 =============== -->
			<main id = "primary" class = "site-main <?php _umx_template_the_column_attr(); ?>" role = "main">
				<?php 
				/**
				 	Start 404 Page
				 */
				 ?>
				<article class = "post error">
					<h1 class="404"><?php esc_html_e( 'Nothing posted yet', 'under-milligram' ); ?></h1>
				</article>

			</main><!-- #primary .content-area -->
		</div><!-- /.row -->
	</div><!-- / container-->

	<?php 
	/**
	 	Load Footer Template
	 */
	get_footer();
