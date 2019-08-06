<?php 
/*
 * Template part for displaying post meta.
 * @link https://developer.wordpress.org/themes/basics/template-tags/
 * @package under-milligram
 * @sinde 0.0.1
 */

/* Prepare
 ––––––––––––––––––––––––––––––
 */

	// /–– Access Control
	if( !defined( 'ABSPATH' ) ) exit;

	// /–– Variables
	$_year		 = get_the_time( 'Y' ); 
	$_month		 = get_the_time( 'm' ); 
	$_day			 = get_the_time( 'd' ); 	

 ?>
<!-- ====================
	<entry-meta> Parts File for Entry Content
 ==================== -->
<ul class = "entry-meta">
	<li class = "date">
		<i class = "fas fa-calendar-alt"></i>
		<a href = "<?php echo get_day_link( $_year, $_month, $_day ); ?>">
			<time datetime = "<?php the_time( 'c' ); ?>" itemprop = "datePublished">
				<?php the_time( get_option( 'date_format' ) ); ?>
			</time>
		</a>
	</li>
	<li class = "category">
		<i class = "fas fa-folder-open"></i>
		<?php the_category(', '); ?>
	</li>

	<li class = "tags">
		<i class = "fas fa-tags"></i>
		<?php the_tags( '| &nbsp;', '&nbsp;' ); ?>
	</li>

	<li class = "comments">
		<i class = "fas fa-comment-dots"></i>
		<a href = "<?php echo get_comments_link(); ?>">
			<?php echo 'Comments(' . get_comments_number('0','1','%') . ')'; ?>
		</a>
	</li>
</ul><!--/post-meta -->
