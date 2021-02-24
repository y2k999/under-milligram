<?php
/**
	Functions and definitions
	@link https://developer.wordpress.org/themes/basics/theme-functions/
	@package WordPress
	@subpackage Under Milligram
	@since 1.0.1
*/

/**
	Special thanks to Twenty Twenty-One WordPress Theme.
	@link https://wordpress.org/themes/twentytwentyone/
	@author AWordPress team
	@license http://www.gnu.org/licenses/gpl-2.0.html GPL v2 or later
*/


/* Prepare
______________________________
*/

	// If this file is called directly,abort.
	if(!defined('WPINC')){die;}


/* Exec
______________________________
*/

	/**
		@description
			This theme requires WordPress 5.3 or later.
	*/
	if(version_compare($GLOBALS['wp_version'],'5.3','<')){
		require get_theme_file_path() . '/inc/back-compat.php';
	}// endif


	/**
		@since 1.0.1
			Sets up theme defaults and registers support for various WordPress features.
			Note that this function is hooked into the after_setup_theme hook, which runs before the init hook.
			The init hook is too late for some features, such as indicating support for post thumbnails.
	*/
	add_action('after_setup_theme',function()
	{
		/**
			@description
				Make theme available for translation.
				Translations can be filed in the /languages/ directory.
				If you're building a theme based on this theme, use a find and replace to change 'under-milligram' to the name of your theme in all the template files.
		*/
		load_theme_textdomain('under-milligram',get_theme_file_path() . '/languages');

		/**
			@description
				Add default posts and comments RSS feed links to head.
		*/
		add_theme_support('automatic-feed-links');

		/**
			@description
				Let WordPress manage the document title.
				By adding theme support, we declare that this theme does not use a hard-coded <title> tag in the document head, and expect WordPress to provide it for us.
		*/
		add_theme_support('title-tag');
		
		/**
			@description
				Enable support for custom logo.
		*/
		add_theme_support('custom-logo',array(
			'height' => 240,
			'width' => 240,
			'flex-height' => TRUE,
		));

		/**
			@description
				Enable support for Post Thumbnails on posts and pages.
		*/
		add_theme_support('post-thumbnails');
		set_post_thumbnail_size(1568,9999);

		/**
			@description
				This theme uses wp_nav_menu() in two locations.
		*/
		register_nav_menus(array(
			'drawer_nav' => esc_html__('Drawer Navigation','under-milligram'),
			'footer_nav' => esc_html__('Footer Navigation','under-milligram'),
		));

		/**
			@description
				Switch default core markup for search form, comment form, and comments to output valid HTML5.
		*/
		add_theme_support('html5',array(
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
			'navigation-widgets',
		));

		/**
			@description
				Enable support for Post Formats.
		*/
		add_theme_support('post-formats',array(
			'aside',
			'image',
			'video',
			'quote',
			'link',
			'gallery',
			'status',
			'audio',
			'chat',
		));

		/**
			@description
				Set up the WordPress core custom background feature.
		*/
		add_theme_support('custom-background',apply_filters('under_milligram_custom_background_args',array(
			'default-color' => 'ffffff',
			'default-image' => '',
		)));

		/**
			@description
				Add editor styles
		*/
		add_editor_style(array('css/editor-style.css','fonts/custom-fonts.css'));

		/**
			@description
				Add theme support for selective refresh for widgets.
		*/
		add_theme_support('customize-selective-refresh-widgets');

	});


	/**
		@since 1.0.1
			Filters Twenty Seventeen custom-header support arguments.
		@param array $args{
			An array of custom-header support arguments.
		@type (string) $default-image
			Default image of the header.
		@type (int) $width
			Width in pixels of the custom header image.
			Default 954.
		@type (int) $height
			Height in pixels of the custom header image.
			Default 1300.
		@type (string) $flex-height
			Flex support for height of header.
		@type (string) $video
			Video support for header.
		@type (string) $wp-head-callback
			Callback function used to styles the header image and text displayed on the blog.
	}
	*/
	add_action('after_setup_theme',function()
	{
		add_theme_support('custom-header',apply_filters('under_milligram_custom_header_args',array(
			// 'default-image' => get_parent_theme_file_uri( '/assets/images/header.jpg' ),
			'width' => 2000,
			'height' => 1200,
			'flex-height' => TRUE,
			'video' => TRUE,
			// 'wp-head-callback' => 'twentyseventeen_header_style',
		)));

		register_default_headers(array(
			'default-image' => array(
				// 'url' => '%s/assets/images/header.jpg',
				// 'thumbnail_url' => '%s/assets/images/header.jpg',
				'description' => __('Default Header Image','under-milligram'),
			),
		));
	});


	/**
		@since 1.0.1
			Set the content width in pixels, based on the theme's design and stylesheet.
	*/
	add_action('after_setup_theme',function()
	{
		$GLOBALS['content_width'] = apply_filters('under_milligram_content_width',960);
	},0);



	/**
		@since 1.0.1
			Enqueue scripts and styles.
	*/
	add_action('wp_enqueue_scripts',function()
	{
		wp_enqueue_style('milligram',get_theme_file_uri() . '/assets/css/milligram.min.css');

		// wp_enqueue_style('under-milligram-fonts',get_theme_file_uri() . '/assets/fonts/custom-fonts.css');

		wp_enqueue_style('under-milligram-style',get_stylesheet_uri());
		wp_enqueue_style('under-milligram-custom',get_theme_file_uri() . '/assets/css/theme.css');

		if(is_singular() && comments_open() && get_option('thread_comments')){
			wp_enqueue_script('comment-reply');
		}// endif

		wp_enqueue_script('skip-link-focus-fix',get_theme_file_path() . '/assets/js/skip-link-focus-fix.min.js',array(),wp_get_theme()->get('Version'),TRUE);
	});


	/**
		@description
			Custom template tags for this theme.
	*/
	require get_theme_file_path() . '/inc/gutenberg.php';

	/**
		@description
			Apply layout class.
	*/
	require get_theme_file_path() . '/inc/layout.php';

	/**
		@description
			Custom template tags for this theme.
	*/
	require get_theme_file_path() . '/inc/template-tags.php';

	/**
		@description
			Custom functions that act independently of the theme templates.
	*/
	require get_theme_file_path() . '/inc/extras.php';

	/**
		@description
			Widget area.
	*/
	require get_theme_file_path() . '/inc/widgets.php';

	/**
		@description
			Customizer additions.
	*/
	require get_theme_file_path() . '/inc/customizer.php';


	/**
		Load Jetpack compatibility file.
	*/
	if(defined('JETPACK__VERSION')) :
		require_once get_template_directory() . '/inc/jetpack.php';
	endif;
