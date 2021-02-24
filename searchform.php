<?php
/**
	The searchform.php template.
	Used any time that get_search_form() is called.
	@link https://developer.wordpress.org/reference/functions/wp_unique_id/
	@link https://developer.wordpress.org/reference/functions/get_search_form/
	@package WordPress
	@subpackage Under Milligram
	@since 1.0.1
*/
?>
	<!-- ====================
		<searchform>
	 ==================== -->
	<form role = "search" method = "get" action = "<?php echo esc_url(home_url('/')); ?>">
		<label class = "screen-reader-text">
			<?php echo _x('Search for:','label','under-milligram'); ?>
		</label>
		<input type = "search" 	class = "search-field" placeholder = "<?php echo esc_attr_x('Search ...','placeholder','under-milligram'); ?>" value = "<?php echo get_search_query(); ?>" name = "s" />
		<input type = "submit" class = "search-submit" value = "<?php echo esc_attr_x('Search','submit button','under-milligram'); ?>">
	</form>
