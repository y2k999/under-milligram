<?php
/**
 * Custom widget for this theme
 * @package under_milligram
 * @since 0.0.1
 */


/* Prepare
 ––––––––––––––––––––––––––––––
 */

	// /–– Access Control
	if( !defined( 'ABSPATH' ) ) exit;


/* Exec
 ––––––––––––––––––––––––––––––
 */

	/**
	 	Hooks for widgets.
	 */
	add_action( 'widgets_init', '_umx_widgets_register_sidebar' );
	add_action( 'dynamic_sidebar_params', '_umx_widgets_dynamic_sidebar_params' );



	/* 	[Hook]
	–––––––––––––––––––––––––
	*/
	if( !function_exists( '_umx_widgets_register_sidebar' ) ) :
	function _umx_widgets_register_sidebar() {
		/**
		 	Register widget area.
		 	@link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
		 */
		register_sidebar( 
						array(
							'id'					 => 'sidebar_primary',
							'name'			 => esc_html__( 'Primary Sidebar', 'under-milligram' ),
							'description'		 => esc_html__( 'Widget Area for Primary Sidebar.', 'under-milligram' ),
					 ) );

		register_sidebar( 
						array(
							'id'					 => 'sidebar_secondary',
							'name'			 => esc_html__( 'Secondary Sidebar', 'under-milligram' ),
							'description'		 => esc_html__( 'Widget Area for Secondary Sidebar.', 'under-milligram' ),
						 ) );

		register_sidebar( 
						array(
							'id'					 => 'sidebar_top',
							'name'			 => esc_html__( 'Sidebar Top', 'under-milligram' ),
							'description'		 => esc_html__( 'Widget Area for Sidebar Top.', 'under-milligram' ),
					 ) );

		register_sidebar( 
						array(
							'id'					 => 'sidebar_bottom',
							'name'			 => esc_html__( 'Sidebar Top', 'under-milligram' ),
							'description'		 => esc_html__( 'Widget Area for Sidebar Bottom.', 'under-milligram' ),
					 ) );

		register_sidebar( 
						array(
							'id'					 => 'footer',
							'name'			 => esc_html__( 'Footer', 'under-milligram' ),
							'description'		 => esc_html__( 'Widget Area for Footer.', 'under-milligram' ),
					 ) );

	}// /–– [Method:]
	endif;


	/* 	[Hook]
	–––––––––––––––––––––––––
	*/
	if( !function_exists( '_umx_widgets_dynamic_sidebar_params' ) ) :
	function _umx_widgets_dynamic_sidebar_params( $params ) {
		/**
		 	Filters the parameters passed to a widget’s display callback.
		 	@link https://developer.wordpress.org/reference/hooks/dynamic_sidebar_params/
		 */
		$params[0]['before_widget']	 = '<div class = "widget widget-area">';
		$params[0]['after_widget']		 = '</div>';
		$params[0]['before_title']		 = '<h4 class = "section-headline">';
		$params[0]['after_title']			 = '</h4>';

		return $params;

	}// /–– [Method:]
	endif;

