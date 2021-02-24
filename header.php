<?php
/**
	The header.
	This is the template that displays all of the <head> section and everything up until main.
	@link https://developer.wordpress.org/themes/basics/template-files/#template-partials
	@package WordPress
	@subpackage Under Milligram
	@since 1.0.1
*/
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset = "<?php bloginfo('charset'); ?>" />
	<meta name = "viewport" content = "width=device-width, initial-scale=1" />
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<?php get_template_part('template-parts/drawer'); ?>

<div id = "page" class = "site">
	<a class = "screen-reader-text skip-link" href = "#content"><?php esc_html_e('Skip to content','under-milligram'); ?></a>

	<!-- ====================
		<masthead>
	 ==================== -->
	<header id = "masthead" class = "site-header <?php __layout_the_attr_container(); ?>" role = "banner">
		<div class = "<?php __layout_the_attr_grid(); ?>">
			<!-- ===============
				<site-branding>
			 =============== -->
			<div class = "site-branding">

				<?php if(has_custom_logo()) : ?>
					<div class = "site-logo"><?php the_custom_logo(); ?></div>
				<?php endif; ?>

				<?php $blog_info = get_bloginfo('name'); ?>
				<?php if(!empty($blog_info)) : ?>
					<?php if(is_front_page() && is_home()) : ?>
						<h1 class = "site-title"><a href = "<?php echo esc_url(home_url('/')); ?>" rel = "home"><?php bloginfo('name'); ?></a></h1>
					<?php else : ?>
						<p class = "site-title"><a href = "<?php echo esc_url(home_url('/')); ?>" rel = "home"><?php bloginfo('name'); ?></a></p>
					<?php endif; ?>
				<?php endif; ?>

				<?php $description = get_bloginfo('description','display'); ?>
				<?php if($description || is_customize_preview()) : ?>
					<p class = "site-description"><?php echo $description; ?></p>
				<?php endif; ?>

			</div><!-- .site-branding -->
		</div><!-- .row -->
	</header><!-- #masthead -->
