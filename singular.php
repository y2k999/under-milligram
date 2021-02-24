<?php
/**
	The template for displaying all single posts
	@link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
	@package WordPress
	@subpackage Under Milligram
	@since 1.0.1
*/
?>
	<?php get_header(); ?>

	<!-- ====================
		<site-content>
	 ==================== -->
	<div id = "content" class = "<?php __layout_the_attr_container(); ?>">
		<div class = "<?php __layout_the_attr_grid(); ?>">

			<!-- ===============
				<main>
			 ===============-->
			<main id = "primary" class = "site-main <?php __layout_the_attr_column(); ?>" role = "main">
				<?php 
				// Start the Loop.
				while(have_posts()) :
					the_post();
					get_template_part('template-parts/content',get_post_format());

					// Previous/next post navigation.
					the_post_navigation();

					// If comments are open or we have at least one comment, load up the comment template.
					if(comments_open() || get_comments_number()) :
						comments_template();
					endif;
				endwhile;
				?>

			</main><!-- #primary -->
		</div><!-- .row -->
	</div><!-- .container-->

	<?php get_footer(); ?>
