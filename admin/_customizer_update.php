<?php 
/**
 * Theme customizer initial/deefault values.
 * @package under-milligram
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
if( !class_exists( '_customizer_update' ) ) :
class _customizer_update {

	/**
	 	[Property]
	 */
	const HOOK_NAME		 = 'after_setup_theme';
	// const HOOK_NAME	 = 'after_switch_theme';



	/* 	[Constructor]
	–––––––––––––––––––––––––
	*/
	public function __construct() {
		/**
		 	Init Property
		 */


		/**
		 	Hooks: 
		 */
		add_action( 
						self::HOOK_NAME, 
						array( $this, '_hook_update_customizer_header' )	
					 );

		add_action( 
						self::HOOK_NAME, 
						array( $this, '_hook_update_customizer_page' )
					 );

		add_action( 
						self::HOOK_NAME, 
						array( $this, '_hook_update_customizer_footer' )
					 );

	}// /–– [Method:]



	/* 	[Hook]  Update Value
	–––––––––––––––––––––––––
	*/
	public function _hook_update_customizer_header() {

		set_theme_mod( 'setting_UMX_header_width', 'default' );
		// set_theme_mod( 'setting_UMX_header_nav', FALSE );
		set_theme_mod( 'setting_UMX_drawer_nav', TRUE );

	}// /–– [Method:]


	/* 	[Hook]  Update Value
	–––––––––––––––––––––––––
	*/
	public function _hook_update_customizer_page() {

		set_theme_mod( 'setting_UMX_content_width', 'default' );
		set_theme_mod( 'setting_UMX_excerpt_length', 100 );	
		set_theme_mod( 'setting_UMX_excerpt_more', TRUE );
		set_theme_mod( 'setting_UMX_skip_link', TRUE );

	}// /–– [Method:]



	/* 	[Hook]  footer
	–––––––––––––––––––––––––
	*/
	public function _hook_update_customizer_footer() {

		set_theme_mod( 'setting_UMX_footer_width', 'default' );
		set_theme_mod( 'setting_UMX_footer_nav', TRUE );
		set_theme_mod( 'setting_UMX_credit', TRUE );
		set_theme_mod( 'setting_UMX_start_year', 2017 );
		set_theme_mod( 'setting_UMX_copyright', get_bloginfo( 'name' ) );
		set_theme_mod( 'setting_UMX_lisence', TRUE );


	}// /–– [Method:]


}// /–– [Class:]
endif;
new _customizer_update();
