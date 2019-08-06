<?php 
/**
 * Jetpack compatibility file.
 * @link https://jetpack.com/
 * @package Jetpack
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


	add_action( 'after_setup_theme', '_umx_jetpack_setup' );



	/* 	[Hook] 
	–––––––––––––––––––––––––
	 */
	if( !function_exists( '_umx_jetpack_setup' ) ) :
	function _umx_jetpack_setup() {
		/**
		 	Jetpack setup function.
		 	See: https://jetpack.com/support/infinite-scroll/
		 	See: https://jetpack.com/support/responsive-videos/
		 	See: https://jetpack.com/support/content-options/
		 */

		/**
		 	Add theme support for Infinite Scroll.
		 */
		add_theme_support( 
								'infinite-scroll', 
								array(
									'container'	 => 'main',
									'render'		 => '_umx_jetpack_infinite_scroll_render',
									'footer'		 => 'page',
								 ) );

		/**
		 	Add theme support for Responsive Videos.
		 */
		add_theme_support( 'jetpack-responsive-videos' );

		/**
		 	Add theme support for Content Options.
		 */
		add_theme_support( 
								'jetpack-content-options', 
								array(
										'post-details'		 => array(
																		'stylesheet'	 => 'under-milligram-style',
																		'date'			 => '.posted-on',
																		'categories'	 => '.cat-links',
																		'tags'			 => '.tags-links',
																		'author'		 => '.byline',
																		'comment'	 => '.comments-link',
																 ),
							 ) );

	}// /–– [Method:]
	endif;


	/* 	[Method] 
	–––––––––––––––––––––––––
	 */
	if( !function_exists( '_umx_jetpack_infinite_scroll_render' ) ) :
	function _umx_jetpack_infinite_scroll_render() {
		/**
		 	Custom render function for Infinite Scroll.
		 */
		while( have_posts() ) :
			the_post();
			if( is_search() ) :
				get_template_part( 'template-parts/content', 'archive' );
			else :
				// get_template_part( 'template-parts/content', get_post_format() );
				get_template_part( 'template-parts/content', 'page' );
			endif;
		endwhile;

	}// /–– [Method:]
	endif;

