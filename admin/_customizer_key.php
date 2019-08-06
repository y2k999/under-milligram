<?php 
/**
 * Theme customizer settings keys
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
if( !class_exists( '_customizer_key' ) ) :
class _customizer_key {

	/**
	 	[Property]
	 */


	/* 	[Constructor]
	–––––––––––––––––––––––––
	*/
	public function __construct() {

		/**
		 	Init Property
		 */


	}// /–– [Method:]



	/* 	[Method]
	–––––––––––––––––––––––––
	*/
	public static function _get_panels() {

		$_panels[]	 = 'header';
		$_panels[]	 = 'page';
		$_panels[]	 = 'footer';

		return $_panels;

	}// /–– [Method:]



	/* 	[Method]
	–––––––––––––––––––––––––
	*/
	public static function _get_sections( $_panel = '' ) {
		/**
		 	Check
		 */
		if( empty( $_panel ) ) :
			return;
		endif;

		$_sections = array();

		switch( $_panel ) :
			case 'header' :
				$_sections['header']	 = __( 'Common Setting', 'under-milligram' );
				$_sections['drawer']	 = __( 'Drawer Setting', 'under-milligram' );
				return $_sections;
				break;

			case 'page' :
				$_sections['page']		 = __( 'Common Setting', 'under-milligram' );
				$_sections['excerpt']	 = __( 'Excerpt Setting', 'under-milligram' );
				return $_sections;
				break;

			case 'footer' :
				$_sections['footer']	 = __( 'Common Setting', 'under-milligram' );
				$_sections['credit']	 = __( 'Credit Setting', 'under-milligram' );
				return $_sections;
				break;

			default: 
				return $_sections;
				break;
		endswitch;

	}// /–– [Method:]



	/* 	[Method]
	–––––––––––––––––––––––––
	*/
	public static function _get_settings( $_section = '' ) {
		/**
		 	Check
		 */
		if( empty( $_section ) ) :
			return;
		endif;

		$_settings = array();

		switch( $_section ) :

			case 'header' :
				$_settings[]	 = 'header_width';
				return $_settings;
				break;

			case 'drawer' :
				$_settings[]	 = 'drawer_nav';
				return $_settings;
				break;

			case 'page' :
				$_settings[]	 = 'content_width';
				$_settings[]	 = 'skip_link';
				return $_settings;
				break;

			case 'excerpt' :
				$_settings[]	 = 'excerpt_length';
				$_settings[]	 = 'excerpt_more';
				return $_settings;
				break;

			case 'footer' :
				$_settings[]	 = 'footer_width';
				$_settings[]	 = 'footer_nav';
				return $_settings;
				break;

			case 'credit' :
				$_settings[]	 = 'credit';
				$_settings[]	 = 'start_year';
				$_settings[]	 = 'copyright';
				$_settings[]	 = 'lisence';
				return $_settings;
				break;

			default: 
				return $_settings;
				break;
		endswitch;

	}// /–– [Method:]



	/* 	[Method]
	–––––––––––––––––––––––––
	*/
	public static function _get_props( $_setting = '' ) {
		/**
		 	Check
		 */
		if( empty( $_setting ) ) :
			return;
		endif;

		$_props = array();

		switch( $_setting ) :

			case 'header_width' :
				$_props['label']		 = esc_html__( 'Header Width', 'under-milligram' );
				$_props['type']		 = 'select';
				return $_props;
				break;

			case 'drawer_nav' :
				$_props['label']		 = esc_html__( 'Display Drawer Nav ?', 'under-milligram' );
				$_props['type']		 = 'checkbox';
				return $_props;
				break;

			case 'content_width' :
				$_props['label']		 = esc_html__( 'Content Width', 'under-milligram' );
				$_props['type']		 = 'select';
				return $_props;
				break;

			case 'skip_link' :
				$_props['label']		 = esc_html__( 'Activate Skip to Link ?', 'under-milligram' );
				$_props['type']		 = 'checkbox';
				return $_props;
				break;

			case 'excerpt_length' :
				$_props['label']		 = esc_html__( 'Excerpt Length', 'under-milligram' );
				$_props['type']		 = 'number';
				return $_props;
				break;

			case 'excerpt_more' :
				$_props['label']		 = esc_html__( 'Display Readmore Button ?', 'under-milligram' );
				$_props['type']		 = 'checkbox';
				return $_props;
				break;

			case 'footer_width' :
				$_props['label']		 = esc_html__( 'Footer Width', 'under-milligram' );
				$_props['type']		 = 'select';
				return $_props;
				break;

			case 'footer_nav' :
				$_props['label']		 = esc_html__( 'Display Footer Nav ?', 'under-milligram' );
				$_props['type']		 = 'checkbox';
				return $_props;
				break;

			case 'credit' :
				$_props['label']		 = esc_html__( 'Display Credit ?', 'under-milligram' );
				$_props['type']		 = 'checkbox';
				return $_props;
				break;

			case 'start_year' :
				$_props['label']		 = esc_html__( 'Start Year', 'under-milligram' );
				$_props['type']		 = 'number';
				return $_props;
				break;

			case 'copyright' :
				$_props['label']		 = esc_html__( 'CopyRight Text', 'under-milligram' );
				$_props['type']		 = 'text';
				return $_props;
				break;

			case 'lisence' :
				$_props['label']		 = esc_html__( 'Display WP Lisence ?', 'under-milligram' );
				$_props['type']		 = 'checkbox';
				return $_props;
				break;

		endswitch;

	}// /–– [Method:]


}// /–– [Class:]
endif;
new _customizer_key();
