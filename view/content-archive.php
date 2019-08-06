<?php 
/**
 * Template part for displaying archive pages.
 * @link https://codex.wordpress.org/Template_Hierarchy
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
	<article>
 ==================== -->
<article id = "post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<!-- ===============
		<entry-header>
	 =============== -->
	<header class = "entry-header">
		<h2 class = "entry-title">
			<a href = "<?php the_permalink(); ?>" title = "<?php the_title(); ?>">
				<?php the_title() ?>
			</a>
		</h2>
		<?php get_template_part( 'view/entry', 'meta' ); ?>
	</header>

	<!-- ===============
		<entry-content-archive>
	 =============== -->
	<div class = "entry-content entry-content-archive">
		<div class = "<?php _umx_template_the_grid_attr(); ?>">
			<div class = "<?php _umx_template_the_column_img_attr(); ?>">
				<?php 
				the_post_thumbnail();
				 ?>
			</div>
			<div class ="<?php _umx_template_the_column_dscr_attr(); ?>">
				<?php 
				_umx_template_the_custom_excerpt( get_the_content() );
				/**
				 	pagination
				 */
				wp_link_pages();
				 ?>
			</div>
		</div>
	</div><!-- /.entry-content-page -->

	<!-- ===============
		<entry-footer>
	 =============== -->
	<footer class = "entry-footer">
	</footer>

</article><!-- #post-## -->
