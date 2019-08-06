<?php 
/**
 * Theme customizer settings options
 * @package under-milligram
 * @since 0.0.1
 */

/* Prepare
 –––––––––––––––––––––––––
 */
	// /–– Access Control
	if( !defined( 'ABSPATH' ) ) exit;


/* Exec
 –––––––––––––––––––––––––
 */
if( !class_exists( '_customizer_option' ) ) :
class _customizer_option {

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



	/* 	[Method] Wrapper Width
	–––––––––––––––––––––––––
	*/
	public static function _get_customizer_width() {

		$_return['non']			 = esc_html__( 'Not Selected', 'under-milligram' );
		$_return['default']		 = esc_html__( 'Container Default', 'under-milligram' );
		$_return['fluid']		 = esc_html__( 'Container Fluid', 'under-milligram' );

		return $_return;

	}// /–– [Method:]

	public static function _get_customizer_header_width() {
		return self::_get_customizer_width();
	}

	public static function _get_customizer_content_width() {
		return self::_get_customizer_width();
	}

	public static function _get_customizer_footer_width() {
		return self::_get_customizer_width();
	}


	/* 	[Method] Length
	–––––––––––––––––––––––––
	*/
	public static function _get_customizer_length( $_type ) {
		switch( $_type ) :
			case 'title' :
				$_return['step']		 = 1;
				$_return['min'	]	 = 1;
				$_return['max']		 = 100;
				break;
			case 'excerpt' :
				$_return['step']		 = 5;
				$_return['min'	]	 = 10;
				$_return['max']		 = 200;
				break;
			case 'per_page' :
			case 'modules' :
				$_return['step']		 = 1;
				$_return['min'	]	 = 1;
				$_return['max']		 = 10;
				break;
			case 'speed' :
				$_return['step']		 = 100;
				$_return['min'	]	 = 1000;
				$_return['max']		 = 6000;
				break;
			case 'year' :
				$_return['step']		 = 1;
				$_return['min'	]	 = 1990;
				$_return['max']		 = 2030;
				break;
			default :
				break;
		endswitch;

		return $_return;

	}// /–– [Method:]


	// /–– excerpt
	public static function _get_customizer_excerpt_length() {
		return self::_get_customizer_length( 'excerpt' );
	}


	// /–– start year
	public static function _get_customizer_start_year() {
		return self::_get_customizer_length( 'year' );
	}


}// /–– [Class: ]
endif;
new _customizer_option();
