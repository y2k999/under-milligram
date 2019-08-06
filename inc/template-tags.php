<?php 
/**
 * Custom template tags for this theme
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


	/* 	[Method] 
	–––––––––––––––––––––––––
	 */
	if( !function_exists( '_umx_template_the_masthead_attr' ) ) :
	function _umx_template_the_masthead_attr() {
		/**
		 	Custom Attr / #masthead
		 */
		if( get_theme_mod( 'setting_UMX_header_width' ) === 'fluid' ) :
			$_width = 'container-fluid';
		else :
			$_width = 'container';
		endif;

		echo apply_filters( 
								'_filter_masthead_attr',
								'site-header ' . $_width
							 );

	}// /–– [Method:]
	endif;



	/* 	[Method] 
	–––––––––––––––––––––––––
	 */
	if( !function_exists( '_umx_template_the_content_attr' ) ) :
	function _umx_template_the_content_attr() {
		/**
		 	Custom Attr / #content
		 */
		if( get_theme_mod( 'setting_UMX_content_width' ) === 'fluid' ) :
			$_width = 'container-fluid';
		else :
			$_width = 'container';
		endif;

		echo apply_filters( 
								'_filter_content_attr',
								'site-content ' . $_width
							 );

	}// /–– [Method:]
	endif;



	/* 	[Method] 
	–––––––––––––––––––––––––
	 */
	if( !function_exists( '_umx_template_the_sidebar_attr' ) ) :
	function _umx_template_the_sidebar_attr() {
		/**
		 	Custom Attr / .sidebar
		 */
		echo apply_filters( 
								'_filter_sidebar_attr',
								'sidebar column'
							 );

	}// /–– [Method:]
	endif;



	/* 	[Method] 
	–––––––––––––––––––––––––
	 */
	if( !function_exists( '_umx_template_the_colophone_attr' ) ) :
	function _umx_template_the_colophone_attr() {
		/**
		 	Custom Attr / #colophone
		 */
		if( get_theme_mod( 'setting_UMX_footer_width' ) === 'fluid' ) :
			$_width = 'container-fluid';
		else :
			$_width = 'container';
		endif;

		echo apply_filters( 
								'_filter_colophone_attr',
								'site-footer ' . $_width
							 );

	}// /–– [Method:]
	endif;


	/* 	[Method] 
	–––––––––––––––––––––––––
	 */
	if( !function_exists( '_umx_template_the_grid_attr' ) ) :
	function _umx_template_the_grid_attr() {
		/**
		 	Custom Attr / .grid
		 */
		echo apply_filters( 
								'_filter_grid_attr',
								'row'
							 );

	}// /–– [Method:]
	endif;



	/* 	[Method] 
	–––––––––––––––––––––––––
	 */
	if( !function_exists( '_umx_template_the_column_attr' ) ) :
	function _umx_template_the_column_attr() {
		/**
		 	Custom Attr / .column
		 */
		echo apply_filters( 
								'_filter_column_attr',
								'column'
							 );

	}// /–– [Method:]
	endif;


	/* 	[Method] 
	–––––––––––––––––––––––––
	 */
	if( !function_exists( '_umx_template_the_column_img_attr' ) ) :
	function _umx_template_the_column_img_attr() {
		/**
		 	Custom Attr / .column
		 */
		echo apply_filters( 
								'_filter_column_attr',
								'column column-40'
							 );

	}// /–– [Method:]
	endif;


	/* 	[Method] 
	–––––––––––––––––––––––––
	 */
	if( !function_exists( '_umx_template_the_column_dscr_attr' ) ) :
	function _umx_template_the_column_dscr_attr() {
		/**
		 	Custom Attr / .column
		 */
		echo apply_filters( 
								'_filter_column_attr',
								'column column-60'
							 );

	}// /–– [Method:]
	endif;


	/* 	[Method] 
	–––––––––––––––––––––––––
	 */
	if( !function_exists( '_umx_template_the_posted_on' ) ) :
	function _umx_template_the_posted_on() {
		/**
		 	Prints HTML with meta information for the current post-date/time and author.
		 */
		$time_string = '<time class = "entry-date published updated" datetime = "%1$s">%2$s</time>';
		if( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) :
			$time_string = '<time class = "entry-date published" datetime = "%1$s">%2$s</time>';
			/* <time class="updated" datetime="%3$s">%4$s</time> */
		endif;

		$time_string = sprintf( 
								$time_string,
								esc_attr( get_the_date( 'c' ) ),
								esc_html( get_the_date() ),
								esc_attr( get_the_modified_date( 'c' ) ),
								esc_html( get_the_modified_date() )
							 );

		$posted_on = sprintf(
								/* translators: %s: post date. */
								esc_html_x( 'Posted on %s', 'post date', 'under-milligram' ),
								'<a href = "' . esc_url( get_permalink() ) . '" rel = "bookmark">' . $time_string . '</a>'
							 );

		$byline = sprintf(
							/* translators: %s: post author. */
							esc_html_x( 'by %s', 'post author', 'under-milligram' ),
							'<span class = "author vcard"><a class = "url fn n" href = "' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
						 );

		// WPCS: XSS OK.
		echo '<span class = "posted-on">' . $posted_on . '</span>';
		echo '<span class = "byline"> ' . $byline . '</span>';

	}// /–– [Method:]
	endif;



	/* 	[Method] 
	–––––––––––––––––––––––––
	*/
	if( !function_exists( '_umx_template_the_entry_footer' ) ) :
	function _umx_template_the_entry_footer() {
		/**
		 	Prints HTML with meta information for the categories, tags and comments.
		 */

		// Hide category and tag text for pages.
		if( 'post' === get_post_type() ) :
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( esc_html__( ', ', 'under-milligram' ) );
			if( $categories_list ) :
				/* translators: 1: list of categories. */
				printf( 
						'<span class = "cat-links">' . esc_html__( 'Posted in %1$s', 'under-milligram' ) . '</span>', 
						 // WPCS: XSS OK.
						$categories_list
					 );
			endif;

			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'under-milligram' ) );
			if( $tags_list ) :
				/* translators: 1: list of tags. */
				printf( 
						'<span class = "tags-links">' . esc_html__( 'Tagged %1$s', 'under-milligram' ) . '</span>', 
						// WPCS: XSS OK.
						$tags_list
					 );
			endif;
		endif;

		if( !is_single() && !post_password_required() && ( comments_open() || get_comments_number() ) ) :
			echo '<span class = "comments-link">';
			comments_popup_link(
				sprintf(
					wp_kses(
							/* translators: %s: post title */
							__( 'Leave a Comment<span class = "screen-reader-text"> on %s</span>', 'under-milligram' ),
							array(
								'span'	 => array(
													'class' => array(),
												 ),
							 )
					 ),
					get_the_title()
				 )
			 );
			echo '</span>';
		endif;

		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Edit <span class="screen-reader-text">%s</span>', 'under-milligram' ),
					array(
						'span'	 => array(
											'class'	 => array(),
										 ),
						 )
				 ),
				get_the_title()
			 ),
			'<span class = "edit-link">',
			'</span>'
		 );

	}// /–– [Method:]
	endif;


	/* 	[Method] 
	–––––––––––––––––––––––––
	*/
	if( !function_exists( '_umx_template_the_custom_excerpt' ) ) :
	function _umx_template_the_custom_excerpt( $content, $_length = 110 ) {
		/**
		 	Special Thanks to： http://nelog.jp/get_the_custom_excerpt
		 */
		if( empty( $content ) ) :
			return;
		endif;

		if( !isset( $_length ) ) :
			$_length = get_theme_mod( 'setting_UMX_excerpt_length', 100 );
		endif;

		// $content = preg_replace( '/<!--more-->.+/is',"", $content );
		$content = wp_strip_all_tags( $content, TRUE );

		// /–– shortcode
		$content = strip_shortcodes( $content );

		// /–– tags
		$content = strip_tags( $content );

		// /–– special characters
		$content = str_replace( "&nbsp;", "", $content );

		if( mb_strlen( $content ) > $_length ) :
			$content = mb_substr( $content, 0, $_length );
		endif;

		/**
		 	Filter
		 */
		echo apply_filters( 
								"_filter_custom_excerpt", 
								$content
							 );

	}// /–– [Method:]
	endif;



	/* 	[Method] 
	–––––––––––––––––––––––––
	*/
	if( !function_exists( '_umx_template_the_credit' ) ) :
	function _umx_template_the_credit() {

		$_credit	 = get_theme_mod( 'setting_UMX_start_year', '2017' );
		$_credit	 .= '-';
		$_credit	 .= date_i18n( "Y" );

		$_credit	 .= ' ';
		$_credit	 .= get_theme_mod( 'setting_UMX_copyright', get_bloginfo('name') . 'All Rights Reserved.' );
		$_credit	 .= ' ';
		$_credit	 .= '/';

		$_lisence['url']		 = 'https://wordpress.org/';
		$_lisence['icon']	 = '<i class = "fab fa-wordpress fa-fw fa-md credit" style = " color: #9b4dca; "></i>';
			?>
		<p>
			<a href = "<?php home_url(); ?>">
				<?php echo $_credit; ?>
			</a>
	
			Powered by 
			<a href = "<?php echo $_lisence['url']; ?>" target = "_blank" rel = "nofollow">
				<?php echo $_lisence['icon']; ?>
			</a>
		</p>

		<?php

	}// /–– [Method:]
	endif;
