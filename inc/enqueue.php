<?php
/**
 * Theme's enqueue scripts
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
	 	Hooks for enque styles and scripts.
	 */
	add_action( 'wp_enqueue_scripts', '_umx_enqueue_css_framework' );
	add_action( 'wp_enqueue_scripts', '_umx_enqueue_web_fonts' );
	add_action( 'wp_enqueue_scripts', '_umx_enqueue_theme_styles' );
	add_action( 'wp_enqueue_scripts', '_umx_enqueue_get_inline_styles' );


	/* 	[Hook]
	–––––––––––––––––––––––––
	*/
	if( !function_exists( '_umx_enqueue_css_framework' ) ) :
	function _umx_enqueue_css_framework() {
		/**
		 	Enque Styles and Scripts
		 */
		if( is_admin() ) :
			return;
		endif;

		// $_css['milligram']['url']	 = 'https://cdnjs.cloudflare.com/ajax/libs/milligram/1.3.0/milligram.min.css';
		$_css['milligram']['url']	 = get_template_directory_uri() . '/assets/css/milligram.css';
		$_css['milligram']['ver']	 = '1.3.0';

		wp_enqueue_style( 
								'css-milligram', 
								$_css['milligram']['url'], 
								$_css['milligram']['ver'],
								'all'
							 );

	}// /–– [Method:]
	endif;



	/* 	[Hook]
	–––––––––––––––––––––––––
	*/
	if( !function_exists( '_umx_enqueue_web_fonts' ) ) :
	function _umx_enqueue_web_fonts() {
		/**
		 	Enque Styles and Scripts
		 */
		if( is_admin() ) :
			return;
		endif;

		$_css['fontawesome']['url']		 = 'https://use.fontawesome.com/releases/v5.6.3/css/all.css';
		$_css['fontawesome']['ver']		 = '5.6.3';

		wp_enqueue_style( 
								'css-fontawesome', 
								$_css['fontawesome']['url'], 
								$_css['fontawesome']['ver'],
								'all'
							 );

	}// /–– [Method:]
	endif;



	/* 	[Hook]
	–––––––––––––––––––––––––
	*/
	if( !function_exists( '_umx_enqueue_theme_styles' ) ) :
	function _umx_enqueue_theme_styles() {
		/**
		 	Enque Styles and Scripts
		 */
		if( is_admin() ) :
			return;
		endif;

		$_css['theme']['url']		 = get_template_directory_uri() . '/style.css';
		$_css['theme']['ver']		 = VERSION;

		wp_enqueue_style( 
								'css-theme', 
								$_css['theme']['url'], 
								$_css['theme']['ver'], 
								'all'
							 );

		if( is_singular() && comments_open() && get_option( 'thread_comments' ) ) :
			wp_enqueue_script( 'comment-reply' );
		endif;

		if( get_theme_mod( 'setting_UMX_skip_link' ) ) :

			$_js['skip']['url']	 = get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js';
			$_js['skip']['ver']	 = VERSION;

			wp_enqueue_script( 
									'skip-link', 
									$_js['skip']['url'], 
									array(), 
									$_js['skip']['ver'], 
									TRUE
								 );
		endif;

	}// /–– [Method:]
	endif;



	/* 	[Hook]
	–––––––––––––––––––––––––
	*/
	if( !function_exists( '_umx_enqueue_get_inline_styles' ) ) :
	function _umx_enqueue_get_inline_styles() {
		/**
		 	Load inline css files.
		 */
		$_list[] = get_template_directory() . '/assets/css/style-custom.css';

		if( get_theme_mod( 'setting_UMX_drawer_nav' ) ) :
			$_list[] = get_template_directory() . '/assets/css/style-drawer.css';
		endif;

		if( is_single() ) :
			$_list[] = get_template_directory() . '/assets/css/style-comment.css';
		endif;

		_umx_enqueue_the_inline_style( $_list );

	}// /–– [Method:]
	endif;


	/* 	[Method]
	–––––––––––––––––––––––––
	*/
	if( !function_exists( '_umx_enqueue_the_inline_style' ) ) :
	function _umx_enqueue_the_inline_style( $_list ) {

		require_once(ABSPATH.'wp-admin/includes/file.php');

		/**
		 	CSS読み込み
		 */
		$_list = apply_filters( 
									'_filter_inline_style', 
									$_list
								 );

		echo '<style type = "text/css">';

		if( WP_Filesystem() ) :
			global $wp_filesystem;
			$_skin = '';

			foreach( $_list as $_item ) :
				if( file_exists( $_item ) ) :
					$_skin .= $wp_filesystem->get_contents( $_item );
				endif;
			endforeach;

		endif;

		echo $_skin;

		echo '</style>';

	}// /–– [Method:]
	endif;
