<?php
/**
	The main template file
	This is the most generic template file in a WordPress theme and one of the two required files for a theme (the other being style.css).
	It is used to display a page when nothing more specific matches a query.
	E.g., it puts together the home page when no home.php file exists.
	@link https://developer.wordpress.org/themes/basics/template-hierarchy/
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
				<site-main>
			 =============== -->
			<main id = "primary" class = "site-main <?php __layout_the_attr_column(); ?>" role = "main">
				<?php 
				// Start the Loop.
				while(have_posts()) :
					the_post();
					get_template_part('template-parts/content','archive');
				endwhile;
				the_posts_pagination();
				?>

			</main><!-- #primary -->
		</div><!-- .row -->
	</div><!-- .container-->

	<?php get_footer(); ?>
