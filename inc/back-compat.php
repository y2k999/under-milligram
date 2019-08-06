<?php
/**
 * Theme's back compat functionality
 * Prevents theme from running on WordPress versions prior to 4.7,
 * since this theme is not meant to be backward compatible beyond that and
 * relies on many newer functions and markup changes introduced in 4.7.
 * @package WordPress
 * @subpackage under-milligram
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
	 	xxx
	 */
	add_action( 'after_switch_theme', '_umx_compat_after_switch_theme' );
	add_action( 'load-customize.php', '_umx_compat_customizer_version' );
	add_action( 'template_redirect', '_umx_compat_theme_preview' );


	/* 	[Hook] 
	–––––––––––––––––––––––––
	*/
	if( !function_exists( '_umx_compat_after_switch_theme' ) ) :
	function _umx_compat_after_switch_theme() {
		/**
		 	Prevent switching to this theme on old versions of WordPress.
		 	Switches to the default theme.
		 	@since 1.0
		 */
		switch_theme( WP_DEFAULT_THEME );
		unset( $_GET['activated'] );
		add_action( 'admin_notices', '_umx_compat_upgrade_notice' );

	}// /–– [Method:]
	endif;



	/* 	[Hook] 
	–––––––––––––––––––––––––
	*/
	if( !function_exists( '_umx_compat_upgrade_notice' ) ) :
	function _umx_compat_upgrade_notice() {
		/**
		 	Adds a message for unsuccessful theme switch.
		 	Prints an update nag after an unsuccessful attempt to switch to
		 	WP default theme on WordPress versions prior to 4.7.
		 	@since 1.0
		 	@global (string) $wp_version 	WordPress version.
		 */
		$message = sprintf( 
							__( 'This Theme requires at least WordPress version 4.7. You are running version %s. Please upgrade and try again.', 'under-milligram' ), $GLOBALS['wp_version'] );

		printf( '<div class = "error"><p>%s</p></div>', $message );

	}// /–– [Method:]
	endif;



	/* 	[Hook] 
	–––––––––––––––––––––––––
	*/
	if( !function_exists( '_umx_compat_customizer_version' ) ) :
	function _umx_compat_customizer_version() {
		/**
		 	Prevents the Customizer from being loaded on WordPress versions prior to 4.7.
		 	@since 1.0
		 	@global (string) $wp_version 	WordPress version.
		 */
		wp_die(
			sprintf(
				__( 'Twenty Nineteen requires at least WordPress version 4.7. You are running version %s. Please upgrade and try again.', 'under-milligram' ),
				$GLOBALS['wp_version']
			 ),
			'',
			['back_link' => TRUE]
		);

	}// /–– [Method:]
	endif;


	/* 	[Hook] 
	–––––––––––––––––––––––––
	*/
	function _umx_compat_theme_preview() {
		/**
		 	Prevents the Theme Preview from being loaded on WordPress versions prior to 4.7.
		 	@since 1.0
		 	@global (string) $wp_version 	WordPress version.
		 */
		if( isset( $_GET['preview'] ) ) :
			wp_die( 
				sprintf( 
					__( 'This Theme requires at least WordPress version 4.7. You are running version %s. Please upgrade and try again.', 'under-milligram' ), $GLOBALS['wp_version']
				 )
			 );
		endif;

	}// /–– [Method:]
	endif;
