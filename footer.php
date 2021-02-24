<?php
/**
	The template for displaying the footer
	Contains the closing of the #content div and all content after.
	@link https://developer.wordpress.org/themes/basics/template-files/#template-partials
	@package WordPress
	@subpackage Under Milligram
	@since 1.0.1
*/
?>
	<!-- ====================
		<colophone>
	 ==================== -->
	<footer id = "colophone" class = "site-footer <?php __layout_the_attr_container(); ?>" role = "contentinfo">

		<!-- ===============
			<footer-nav>
		 =============== -->
		<div class = "<?php __layout_the_attr_grid(); ?>">
			<ul class = "footer-nav <?php __layout_the_attr_column(); ?>">
				<?php 
				wp_nav_menu(array(
					'theme_location'	 => 'footer_nav',
					'container' => FALSE,
					'fallback_cb' => FALSE,
					'depth' => 1,
					'items_wrap'	 => '%3$s',
					'echo' => TRUE,
				));
				?>
			</ul>
		</div>

		<!-- ===============
			<footer-content>
		 =============== -->
		<div class = "<?php __layout_the_attr_grid(); ?>">
			<?php if(is_active_sidebar('footer-1')) : ?>
				<?php dynamic_sidebar('footer-1'); ?>
			<?php endif; ?>
		</div><!-- .row -->

		<!-- ===============
			<credit>
		 =============== -->
		<div class = "<?php __layout_the_attr_grid(); ?>">
			<div class = "site-info <?php __layout_the_attr_column(); ?>">
				<?php $blog_info = get_bloginfo('name'); ?>
				<?php if(!empty($blog_info)) : ?>
					<a class = "site-name" href = "<?php echo esc_url(home_url('/')); ?>" rel = "home"><?php bloginfo('name'); ?></a>,
				<?php endif; ?>
				<a href = "<?php echo esc_url(__('https://wordpress.org/','under-milligram')); ?>" class = "imprint">
					<?php
					/* translators: %s: WordPress. */
					printf(__('Proudly powered by %s.','under-milligram'),'WordPress');
					?>
				</a>
				<?php
				if(function_exists('the_privacy_policy_link')) :
					the_privacy_policy_link('','<span role="separator" aria-hidden="true"></span>');
				endif;
				?>
			</div><!-- .site-info -->
		</div>

	</footer><!-- #colophon -->

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
