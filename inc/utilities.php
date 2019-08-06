<?php 
/**
 * Helper functions which enhance the theme.
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


	/* 	[Method] 
	–––––––––––––––––––––––––
	*/
	if( !function_exists( '_umx_utilities_sanitize_checkbox' ) ) :
	function _umx_utilities_sanitize_checkbox( $checked ) {

		return ( ( isset( $checked ) && TRUE == $checked ) ? TRUE : FALSE );

	}// /–– [Method:]
	endif;


	/* 	[Method] 
	–––––––––––––––––––––––––
	*/
	if (!function_exists( '_umx_utilities_sanitize_select' ) ) :
	function _umx_utilities_sanitize_select( $input, $setting ) {

		$input		 = sanitize_key( $input );
		$choices		 = $setting->manager->get_control( $setting->id )->choices;
		return ( array_key_exists( $input, $choices ) ? $input : $setting->default );

	}// /–– [Method:]
	endif;


	/* 	[Method] 
	–––––––––––––––––––––––––
	*/
	if (!function_exists( '_umx_utilities_sanitize_image' ) ) :
	function _umx_utilities_sanitize_image( $image, $setting ) {

		$mimes['jpg|jpeg|jpe']	 = 'image/jpeg';
		$mimes['gif']			 = 'image/gif';
		$mimes['png']			 = 'image/png';
		$mimes['bmp']			 = 'image/bmp';
		$mimes['tif|tiff']		 = 'image/tiff';
		$mimes['ico'	]			 = 'image/x-icon';

		$file = wp_check_filetype( $image, $mimes );
		return ( $file['ext'] ? $image : $setting->default );

	}// /–– [Method:]
	endif;


	/* 	[Method] 
	–––––––––––––––––––––––––
	*/
	if (!function_exists( '_umx_utilities_sanitize_number_range' ) ) :
	function _umx_utilities_sanitize_number_range( $number, $setting ) {

		$number		 = absint( $number );
		$atts			 = $setting->manager->get_control( $setting->id )->input_attrs;
		$min			 = ( isset( $atts['min'] ) ? $atts['min'] : $number );
		$max			 = ( isset( $atts['max'] ) ? $atts['max'] : $number );
		$step			 = ( isset( $atts['step'] ) ? $atts['step'] : 1 );
		return ( $min <= $number && $number <= $max && is_int( $number / $step ) ? $number : $setting->default );

	}// /–– [Method:]
	endif;


	/* 	[Method] 
	–––––––––––––––––––––––––
	*/
	if (!function_exists( '_umx_utilities_sanitize_integer' ) ) :
	function _umx_utilities_sanitize_integer( $input ) {

		if( is_numeric( $input ) ):
			return intval( $input );
		endif;

	}// /–– [Method:]
	endif;
