<?php 
/**
 * Template part for displaying a message that posts cannot be found.
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

	<header class = "entry-header">
		<h2 class = "404">
			<?php esc_html_e( 'Nothing posted yet', 'under-milligram' ); ?>
		</h2>
	</header>

	<div class = "entry-content entry-content-none">
		<?php 
		if( is_home() && current_user_can( 'publish_posts' ) ) :
		 ?>
			<p>
				<?php 
				printf(
					wp_kses(
							/* translators: 1: link to WP admin new post page. */
							__( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'under-milligram' ),
							array(
								'a'	 => array(
											'href'	 => array(),
										 ),
							 )
					 ),
					esc_url( admin_url( 'post-new.php' ) )
				 );
				 ?>
			</p>
		<?php 
		elseif( is_search() ) : ?>

			<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'under-milligram' ); ?></p>
			<?php
				get_search_form();

		else : ?>

			<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'under-milligram' ); ?></p>
			<?php
				get_search_form();

		endif; ?>



	</div>

	<footer class = "entry-footer">
	</footer>

</article><!-- #post-## -->
