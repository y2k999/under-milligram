<?php
/**
	The template for displaying comments
	This is the template that displays the area of the page that contains both the current comments and the comment form.
	@link https://developer.wordpress.org/themes/basics/template-hierarchy/
	@package WordPress
	@subpackage Under Milligram
	@since 1.0.1
*/

/**
	@description
		If the current post is protected by a password and the visitor has not yet entered the password we will return early without loading the comments.
*/
if(post_password_required()){return;}
?>

<div id = "comments" class = "comments-area">

	<?php // You can start editing here -- including this comment! ?>

	<?php if(have_comments()) : ?>
		<h2 class = "comments-title">
			<?php
			printf(
				// WPCS: XSS OK.
				esc_html(_nx('One Comment','%1$s Comments',get_comments_number(),'comments title','under-milligram')),
				number_format_i18n(get_comments_number())
			);
			?>
		</h2>

		<ol class = "comments-list">
			<?php wp_list_comments(); ?>
		</ol><!-- .comment-list -->

		<?php if(get_comment_pages_count() > 1 && get_option('page_comments')) : // Are there comments to navigate through? ?>
			<nav id = "comment-nav-below" class = "navigation comment-navigation" role = "navigation">
				<h2 class = "screen-reader-text"><?php esc_html_e('Comment navigation','under-milligram'); ?></h2>
				<div class = "nav-links">
					<div class = "nav-previous"><?php previous_comments_link(esc_html__('Older Comments','under-milligram')); ?></div>
					<div class = "nav-next"><?php next_comments_link(esc_html__('Newer Comments','under-milligram')); ?></div>
				</div><!-- .nav-links -->
			</nav><!-- #comment-nav-below -->
		<?php endif; ?>

	<?php endif; ?>

	<?php // If comments are closed and there are comments, let's leave a little note, shall we? ?>
	<?php if(!comments_open() && get_comments_number() && post_type_supports(get_post_type(),'comments')) : ?>
		<p class = "no-comments"><?php esc_html_e('Comments are closed.','under-milligram'); ?></p>
	<?php endif; ?>

	<?php comment_form(); ?>

</div><!-- #comments -->
