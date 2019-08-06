<?php 
/**
 * The main template file.
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
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
				<site-main>
			 =============== -->
			<main id = "primary" class = "site-main <?php _umx_template_the_column_attr(); ?>" role = "main">
				<?php 
				/**
				 * Start Home loop
				 */
				if( !have_posts() ) : 
					get_template_part( 'view/content', 'none' );
				endif;

				while( have_posts() ) : the_post(); 
					get_template_part( 'view/content', 'archive' );

				endwhile;
				 ?>
				<!-- ===============
					<pagination>
				 =============== -->
				<?php 
				the_posts_pagination(
										array( 
											'prev_text'				 => '&lt; PREVIOUS',
											'next_text'				 => 'NEXT &gt;',
											'screen_reader_text '	 => 'Posts Navigation Link',
										 ) );
				 ?>

			</main><!-- #primary .content-area -->
		</div><!-- /.row -->
	</div><!-- / container-->

	<?php 
	/**
	 	Load Footer Template
	 */
	get_footer();
