<?php 
/**
 * The template for displaying all pages and all single posts.
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 * @package under-milligram
 * @sinde 0.0.1
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
			 ===============-->
			<main id = "primary" class = "site-main <?php _umx_template_the_column_attr(); ?>" role = "main">
				<?php 
				/**
				 	Start the Loop
				 */
				if( !have_posts() ) :
					get_template_part( 'view/content', 'none' );

				endif;

				while( have_posts() ) : the_post();
					get_template_part( 'view/content', 'page' );
				endwhile;
				 ?>

			</main><!-- #primary .content-area -->
		</div><!-- /.row -->
	</div><!-- / container-->

	<?php 
	/**
	 	Load Footer Template
	 */
	get_footer();
