<?php
/**
 * The template for displaying comments.
 * This is the template that displays the area of the page 
 * 		that contains both the current comments and the comment form.
 * @link https://codex.wordpress.org/Template_Hierarchy
 * @package under-milligram
 * @sinde 0.0.1
 */

/* Prepare
 ––––––––––––––––––––––––––––––
 */
	// /–– Access Control
	if( !defined( 'ABSPATH' ) ) exit;

	/**
	 	If the current post is protected by a password and
	 	the visitor has not yet entered the password we will
	 	return early without loading the comments.
	 */
	if( post_password_required() ) :
		return;
	endif;
	 ?>

	<!-- ====================
		<comments>
	 ==================== -->
	<h3 id = "comments">
		<?php 
		comments_number( 
							esc_html__( 'no responses', 'under-milligram' ), 
							esc_html__( 'one response', 'under-milligram' ), 
							esc_html__( '% responses', 'under-milligram' )
						 ); 
		esc_html_e( ' for ', 'under-milligram' ); the_title();
		 ?>
	</h3>

	<!-- ===============
		<comments-pagination>
	 =============== -->
	<?php 
	the_comments_pagination( 
			array(
				'prev_text'	 => '<span class="screen-reader-text">' . __( 'Previous', 'under-milligram' ) . '</span>',
				'next_text'	 => '<span class="screen-reader-text">' . __( 'Next', 'under-milligram' ) . '</span>',
			 ) );
	?>

	<!-- ===============
		<comments-list>
	 =============== -->
	<ol class = "commentlist">
		<?php 
		wp_list_comments();
		
		comment_form();
		 ?>
	</ol>
