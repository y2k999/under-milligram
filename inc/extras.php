<?php 
/**
 * Custom functions that act independently of the theme templates.
 * Eventually, some of the functionality here could be replaced by core features.
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

	/**
	 	Register Hooks for enhance the theme by hooking into WordPress.
	 */
	add_filter( 'body_class', '_umx_extras_body_classes' );
	add_filter( 'script_loader_tag','_umx_extras_script_loader_tag' );
	add_action( 'pre_ping', '_umx_extras_pre_ping' );
	add_filter( 'document_title_separator', '_umx_extras_document_title_separator' );
	add_filter( 'excerpt_length', '_umx_extras_excerpt_length', 999 );
	add_filter( 'excerpt_more', '_umx_extras_excerpt_more' );
	// add_filter( 'wp_trim_excerpt', '_umx_extras_excerpt_more' );

	add_filter( 'comment_form_fields', '_umx_extras_comment_form_fields' );
	add_action( 'wp_list_comments_args', '_umx_extras_wp_list_comments_args' );
	add_filter( 'get_the_archive_title', '_umx_extras_get_the_archive_title' );



	/* [Hook] 
	–––––––––––––––––––––––––
	 */
	if( !function_exists( '_umx_extras_body_classes' ) ) :
	function _umx_extras_body_classes( $classes ) {
		/**
		 	Adds custom classes to the array of body classes.
		 */

		if( is_singular() ) :
			/**
			 	Adds `singular` to singular pages.
			 */
			$classes[] = 'singular';
		else :
			/**
			 	Adds `hfeed` to non singular pages.
			 */
			$classes[] = 'hfeed';
		endif;

		if( get_background_image() ) :
			$classes[] = 'custom-background-image';
		endif;

		return apply_filters(
								'_filter_body_classes',
								$classes
							 );

	}// /–– [Method:]
	endif;



	/* [Hook] 
	–––––––––––––––––––––––––
	 */
	if( !function_exists( '_umx_extras_script_loader_tag' ) ) :
	function _umx_extras_script_loader_tag( $tag ) {
		/**
		 	Add async to javascripts other than jquery.
		 */

		if( is_admin() ) :
			return $tag;
		endif;

		if( strpos( $tag, 'jquery' ) !== FALSE ) :
			return $tag;
		endif;

		return str_replace( "src", "async src", $tag );

	}// /–– [Method:]
	endif;



	/* [Hook] 
	–––––––––––––––––––––––––
	 */
	if( !function_exists( '_umx_extras_pre_ping' ) ) :
	function _umx_extras_pre_ping( &$links ) {
		/**
		 	Disable Self Pings with pre_ping Hook
		 */

		$home = home_url();

		foreach( $links as $l => $link ) :
			if( 0 === strpos( $link, $home ) ) :
				unset( $links[$l] );
			endif;
		endforeach;

	}// /–– [Method:]
	endif;



	/* [Hook] 
	–––––––––––––––––––––––––
	 */
	if( !function_exists( '_umx_extras_document_title_separator' ) ) :
	function _umx_extras_document_title_separator( $sep ) {
		/**
		 	Filters the separator for the document title.
		 	Default '-'.
		 */

		//$sep_option = ys_get_setting( 'ys_title_separate' );

		$sep_option = ' | ';
		if( '' != $sep_option ) :
			$sep = $sep_option;
		endif;

		return apply_filters( 
								'_filter_document_title_separator', 
								$sep
							 );

	}// /–– [Method:]
	endif;



	/* [Hook] 
	–––––––––––––––––––––––––
	 */
	if( !function_exists( '_umx_extras_excerpt_length' ) ) :
	function _umx_extras_excerpt_length( $length ) {
		/**
		 	Filters the number of words in an excerpt.
		 	Default 55.
		 */
		$length = get_theme_mod( 'setting_UMX_excerpt_length', 100 );	

		return apply_filters( 
								'_filter_excerpt_length', 
								$length
							 );

	}// /–– [Method:]
	endif;



	/* [Hook] 
	–––––––––––––––––––––––––
	 */
	if( !function_exists( '_umx_extras_excerpt_more' ) ) :
	function _umx_extras_excerpt_more( $more ) {
		/**
		 	Filters the string in the "more" link displayed after a trimmed excerpt.
		 */
		$_button = set_theme_mod( 'setting_UMX_excerpt_more', TRUE );

		if( $_button === TRUE ) :
			$more = '...<a class = "button" href = "' . esc_url( get_permalink() ) . '">' . '>>Read More' . '</a>';
		else :
			$more = "…";
		endif;

		return apply_filters( 
								'_filter_excerpt_more', 
								$more
							 );

	}// /–– [Method:]
	endif;



	/* [Hook] 
	–––––––––––––––––––––––––
	 */
	if( !function_exists( '_umx_extras_excerpt_more' ) ) :
	function _umx_extras_excerpt_more( $post_excerpt ) {
		/**
		 	Adds a custom read more link to all excerpts, manually or automatically generated
		 	@param (string) $post_excerpt Posts's excerpt.
		 	@return (string)
		 */
		if( ! is_admin() ) :
			$post_excerpt = $post_excerpt . ' [...]<p><a class = "button" href = "' . esc_url( get_permalink( get_the_ID() ) ) . '">' . __( 'Read More...', 'under-milligram' ) . '</a></p>';
		endif;

		return $post_excerpt;

	}// /–– [Method:]
	endif;



	/* [Hook] 
	–––––––––––––––––––––––––
	 */
	if( !function_exists( '_umx_extras_comment_form_fields' ) ) :
	function _umx_extras_comment_form_fields( $fields ) {
		/**
		 	Rearrange fields in comment_form() for WP v4.4 -. 
		 */

		$_temp = $fields['comment'];

		unset( $fields['comment'] );

		$fields['comment'] = $_temp;

		return apply_filters( 
								'_filter_comment_form_fields', 
								$fields
							 );

	}// /–– [Method:]
	endif;



	/* [Hook] 
	–––––––––––––––––––––––––
	 */
	if( !function_exists( '_umx_extras_wp_list_comments_args' ) ) :
	function _umx_extras_wp_list_comments_args( $r ) {

		$_args = array(
					'style'					 => 'ol',
					'short_ping'			 => TRUE,
					//'per_page'			 => 3,
					'avatar_size'			 => 64,
					'reverse_top_level'	 => TRUE,
					// 'callback'			 => array( &$this, '_beans_comment_callback' ),
					'echo'				 => TRUE,
			);
		$r = wp_parse_args( $_args, $r );
		return $r;

	}// /–– [Method:]
	endif;



	/* [Hook] 
	–––––––––––––––––––––––––
	 */
	if( !function_exists( '_umx_extras_get_the_archive_title' ) ) :
	function _umx_extras_get_the_archive_title() {
		/**
		 	Filters the default archive titles.
		 */

		if( is_category() ) :
			$title = __( 'Category Archives: ', 'under-milligram' ) . single_term_title( '', FALSE );

		elseif( is_tag() ) :
			$title = __( 'Tag Archives: ', 'under-milligram' ) . single_term_title( '', FALSE );

		elseif( is_author() ) :
			$title = __( 'Author Archives: ', 'under-milligram' ) . get_the_author_meta( 'display_name' );

		elseif( is_year() ) :
			$title = __( 'Yearly Archives: ', 'under-milligram' ) . get_the_date( _x( 'Y', 'yearly archives date format', 'under-milligram' ) );

		elseif( is_month() ) :
			$title = __( 'Monthly Archives: ', 'under-milligram' ) . get_the_date( _x( 'F Y', 'monthly archives date format', 'under-milligram' ) );

		elseif( is_day() ) :
			$title = __( 'Daily Archives: ', 'under-milligram' ) . get_the_date();

		elseif( is_post_type_archive() ) :
			$title = __( 'Post Type Archives: ', 'under-milligram' ) . post_type_archive_title( '', FALSE );

		elseif( is_tax() ) :
			$tax = get_taxonomy( get_queried_object()->taxonomy );
			/* translators: %s: Taxonomy singular name */
			$title = sprintf( 
								esc_html__( '%s Archives:', 'under-milligram' ), 
								$tax->labels->singular_name
							 );
		else :
			$title = __( 'Archives:', 'under-milligram' );

		endif;

		return apply_filters( 
								'_filter_get_the_archive_title', 
								$title
							 );

	}// /–– [Method:]
	endif;
