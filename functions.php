<?php
/**
 * Theme functions and definitions.
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 * @package under-milligram
 * @sinde 0.0.1
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
	 	Define Theme Constants
	 	Define Theme Consntants so we can easily replace it throughout the theme
	 */
	$_get_theme = wp_get_theme();
	define( 'DOMAIN', $_get_theme->get( 'TextDomain' ) );
	define( 'VERSION', 1.0 );



	/**
	 	Back Compat
	 */
	if( version_compare( $GLOBALS['wp_version'], '4.7', '<' ) ) :
		require_once get_template_directory() . '/inc/back-compat.php';
		return;
	endif;


	/**
	 	Hooks for check and setup theme's default settings.
	 */
	add_action( 'after_setup_theme', '_umx_settings_content_width', 0 );
	add_action( 'after_setup_theme', '_umx_settings_load_theme_textdomain' );
	add_action( 'after_setup_theme', '_umx_settings_add_theme_support' );
	add_action( 'after_setup_theme', '_umx_settings_add_theme_support_custom_header' );
	add_action( 'after_setup_theme', '_umx_settings_add_theme_support_custom_logo' );
	add_action( 'after_setup_theme', '_umx_settings_add_image_size' );
	add_action( 'after_setup_theme', '_umx_settings_register_nav_menus' );



	/* 	[Hook] 
	–––––––––––––––––––––––––
	*/
	if( !function_exists( '_umx_settings_content_width' ) ) :
	function _umx_settings_content_width() {
		/**
		 	Set the content width in pixels, based on the theme's design and stylesheet.
		 	Priority 0 to make it available to lower priority callbacks.
		 	@global (int) $content_width
		 */
		$GLOBALS['content_width'] = apply_filters( 
																'_filter_content_width', 
																960
															 );
	}// /–– [Method:]
	endif;



	/* 	[Hook] 
	–––––––––––––––––––––––––
	*/
	if( !function_exists( '_umx_settings_load_theme_textdomain' ) ) :
	function _umx_settings_load_theme_textdomain() {
		/**
		 	Make theme available for translation.
		 	Translations can be filed in the /languages/ directory.
		 	If you're building a theme based on Light Skeleton, use a find and replace
		 	to change 'light-skeleton' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'under-milligram', get_template_directory() . '/languages' );

	}// /–– [Method:]
	endif;



	/* 	[Hook] 
	–––––––––––––––––––––––––
	*/
	if( !function_exists( '_umx_settings_add_theme_support' ) ) :
	function _umx_settings_add_theme_support() {
		/**
		 	Sets up theme defaults and registers support for various WordPress features.
		 */

		/**
		 	Let WordPress manage the document title.
		 	By adding theme support, we declare that this theme does not use a
		 	hard-coded <title> tag in the document head, and expect WordPress to
		 	provide it for us.
		 */
		add_theme_support( 'title-tag' );


		/**
		 	Add default posts and comments RSS feed links to head.
		 */
		add_theme_support( 'automatic-feed-links' );


		/**
		 	Switch default core markup for search form, comment form, and comments
		 	to output valid HTML5.
		 */
		add_theme_support( 
							'html5',
							array(
								'search-form',
								'comment-form',
								'comment-list',
								'gallery',
								'caption',
								'widgets',
						 ) );


		/**
		 	Enable support for Post Formats.
		 	See http://codex.wordpress.org/Post_Formats
		 */
		add_theme_support( 
							'post-formats',
							array(
								'aside',
								'gallery',
								'link',
								'image',
								'quote',
								'status',
								'video',
								'audio',
								'chat',
						 ) );


		/**
		 	Enable support for Post Thumbnails on posts and pages.
		 	@link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );


		/**
		 	Set up the WordPress core custom background feature.
		 */
		add_theme_support( 'custom-background' );


		/**
		 	Add support for responsive embedded content.
		 */
		add_theme_support( 'responsive-embeds' );


		/**
		 	Add theme support for selective refresh for widgets.
		 */
		add_theme_support( 'customize-selective-refresh-widgets' );


		/**
		 	Editor/Gutenberg
		 */
		add_theme_support( 'wp-block-styles' );
		add_theme_support( 'editor-styles' );
		add_editor_style();


	}// /–– [Method:]
	endif;



	/* 	[Hook] 
	–––––––––––––––––––––––––
	*/
	if( !function_exists( '_umx_settings_add_theme_support_custom_header' ) ) :
	function _umx_settings_add_theme_support_custom_header() {
		/**
		 	Custom Header
		 */
		add_theme_support( 'custom-header' );

	}// /–– [Method:]
	endif;


	/* 	[Hook] 
	–––––––––––––––––––––––––
	*/
	if( !function_exists( '_umx_settings_add_theme_support_custom_logo' ) ) :
	function _umx_settings_add_theme_support_custom_logo() {
		/**
		 	Add support for core custom logo.
		 	@link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 
								'custom-logo', 
								array(
									'flex-height'	 => TRUE,
									'flex-width'	 => TRUE,
							 ) );

	}// /–– [Method:]
	endif;


	/* 	[Hook] 
	–––––––––––––––––––––––––
	*/
	if( !function_exists( '_umx_settings_add_image_size' ) ) :
	function _umx_settings_add_image_size() {
		/**
		 	Register a new image size.
		 */
		if( !has_image_size( 'thumbnail' ) ) :
			add_image_size( 
								'thumbnail', 
								200, 
								133
							 );
		endif;

		if( !has_image_size( 'medium' ) ) :
			add_image_size( 
								'medium', 
								360, 
								240
							 );
		endif;

		if( !has_image_size( 'large' ) ) :
			add_image_size( 
								'large', 
								600, 
								400
							 );
		endif;

		if( !has_image_size( 'xlarge' ) ) :
			add_image_size( 
								'xlarge', 
								1200, 
								900
							 );
		endif;

		if( !has_image_size( 'avatar' ) ) :
			add_image_size( 
								'avatar', 
								100, 
								100, 
								TRUE
							 );
		endif;

		// /–– iPhone6/Retina
		//add_image_size('retina',686,412,TRUE);

	}// /–– [Method:]
	endif;



	/* 	[Hook]
	–––––––––––––––––––––––––
	*/
	if( !function_exists( '_umx_settings_register_nav_menus' ) ) :
	function _umx_settings_register_nav_menus() {
		/**
		 	This theme uses wp_nav_menu() in one location.
		 */
		register_nav_menus( 
								array(
									'drawer_nav'	 => esc_html__( 'Drawer Navigation', 'under-milligram' ),
									'footer_nav'		 => esc_html__( 'Footer Navigation', 'under-milligram' ),
							 ) );

	}// /–– [Method:]
	endif;



	/**
	 	Load required filed  for this theme.
	 */
	require_once get_template_directory() . '/inc/enqueue.php';
	require_once get_template_directory() . '/inc/widgets.php';
	require_once get_template_directory() . '/inc/template-tags.php';
	require_once get_template_directory() . '/inc/utilities.php';
	require_once get_template_directory() . '/inc/extras.php';


	/**
	 	Load Customizer Settings
	 */
	if( is_admin() || is_customize_preview() ) :
		// require_once get_template_directory() . '/inc/admin.php';
		require_once get_template_directory() . '/admin/_customizer_key.php';
		require_once get_template_directory() . '/admin/_customizer_option.php';
		require_once get_template_directory() . '/admin/_customizer.php';
		// optional
		require_once get_template_directory() . '/admin/_customizer_update.php';

	endif;

	/**
	 	Load Jetpack compatibility file.
	 */
	if( defined( 'JETPACK__VERSION' ) ) :
		require_once get_template_directory() . '/inc/jetpack.php';
	endif;
