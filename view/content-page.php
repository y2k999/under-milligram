<?php 
/**
 * Template part for displaying posts and pages.
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
			<a href = "<?php the_permalink(); ?>" title = "<?php the_title_attribute(); ?>">
				<?php the_title() ?>
			</a>
		</h2>
		<?php if( is_single() ) : ?>
			<?php get_template_part( 'view/entry', 'meta' ); ?>
		<?php endif; ?>
	</header>

	<!-- ===============
		<entry-content-page>
	 =============== -->
	<div class = "entry-content entry-content-page">
		<?php 
		the_content();

		wp_link_pages( 
			array(
				'before'	 => '<div class = "page-links">' . esc_html__( 'Pages:', 'under-milligram' ),
				'after'		 => '</div>',
			 ) );
		 ?>
	</div><!-- /.entry-content-page -->

	<!-- ===============
		<entry-footer>
	 =============== -->
	<footer class = "entry-footer">
		<?php 
		if ( get_edit_post_link() ) : 
			edit_post_link(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Edit <span class="screen-reader-text">%s</span>', 'under-milligram' ),
						array(
								'span'	 => array(
													'class'	 => array(),
												 ),
						 )
					 ),
					get_the_title()
				 ),
				'<span class = "edit-link">',
				'</span>'
			 );
		endif;

		if( is_single() ) :
			/**
			 	If comments are open or we have at least one comment, 
			 	load up the comment template.
			 */
			if( comments_open() || get_comments_number() ) :
				comments_template();
			endif;
		endif;
		 ?>
	</footer>

</article><!-- #post-## -->
