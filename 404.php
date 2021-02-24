<?php
/**
	The template for displaying 404 pages (not found)
	@link https://codex.wordpress.org/Creating_an_Error_404_Page
	@package WordPress
	@subpackage Under Milligram
	@since 1.0.1
*/
?>
	<?php get_header(); ?>

	<!-- ====================
		<site-content>
	 ==================== -->
	<div id = "content" class = "site-content <?php __layout_the_attr_container(); ?>">
		<div class = "<?php __layout_the_attr_grid(); ?>">

			<!-- ===============
				<main>
			 =============== -->
			<main id = "primary" class = "site-main <?php __layout_the_attr_column(); ?>" role = "main">
				<h2 class="page-title"><?php esc_html_e('Nothing posted yet','under-milligram'); ?></h2>

			</main><!-- #primary -->
		</div><!-- .row -->
	</div><!-- .container-->

	<?php get_footer(); ?>
