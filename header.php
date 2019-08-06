<?php 
/**
 * The template for displaying the header.
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
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
	<document>
 ==================== -->
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset = "<?php bloginfo( 'charset' ); ?>" />
	<meta name = "viewport" content = "width=device-width" />
	<link rel = "profile" href = "http://gmpg.org/xfn/11" />
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php 
if( function_exists( 'wp_body_open' ) ) :
	wp_body_open();
else :
	do_action( 'wp_body_open' );
endif;

if( get_theme_mod( 'setting_UMX_drawer_nav' ) ) :
	get_template_part( 'view/overlay', 'nav' );
endif;
 ?>

<div id = "page" class = "site">
	<?php 
	if( get_theme_mod( 'setting_UMX_skip_link' ) ) :
	 ?>
		<a class = "screen-reader-text skip-link" href = "#content"><?php esc_html_e( 'Skip to content', 'under-milligram' ); ?></a>
	<?php 
	endif;
	 ?>

	<!-- ====================
		<header>
	 ==================== -->
	<header id = "masthead" class = "<?php _umx_template_the_masthead_attr(); ?>" role = "banner">
		<div class = "<?php _umx_template_the_grid_attr(); ?>">
			<!-- ===============
				<site-branding>
			 =============== -->
			<div class = "site-branding <?php _umx_template_the_column_attr(); ?>">
				<a class = "site-branding-link" href = "<?php echo esc_url( home_url( '/' ) ); ?>" title = "<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel = "home">
					<h1 class = "site-title">
						<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>
					</h1>
				</a>
			</div><!-- /brand -->
		</div><!--/.row -->
	</header><!-- #masthead .site-header -->
