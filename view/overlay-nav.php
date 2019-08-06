<?php 
/**
 * The drawer sidebar for our theme.
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
		<drawer-nav>
	 ==================== -->
	<input type = "checkbox" class = "drawer-check" id = "checked">

	<label class = "menu-btn" for = "checked">
		<span class = "bar top"></span>
		<span class = "bar middle"></span>
		<span class = "bar bottom"></span>
		<span class = "menu-btn__text">MENU</span>
	</label>

	<label class = "close-menu" for = "checked"></label>

	<nav class = "drawer-menu">
		<?php 
		wp_nav_menu( 
							array( 
								'theme_location'	 => 'drawer_nav'
							 ) );
		 ?>

		<?php 
		if( is_active_sidebar( 'sidebar_top' ) ) : 
			dynamic_sidebar( 'sidebar_top' );
		endif;

		if( is_active_sidebar( 'sidebar_primary' ) ) : 
			dynamic_sidebar( 'sidebar_primary' );
		endif;

		if( is_active_sidebar( 'sidebar_secondary' ) ) : 
			dynamic_sidebar( 'sidebar_secondary' );
		endif;

		if( is_active_sidebar( 'sidebar_bottom' ) ) : 
			dynamic_sidebar( 'sidebar_bottom' );
		endif;

		 ?>
	</nav>

