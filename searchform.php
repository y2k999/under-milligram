<?php
/**
 * The template for displaying search forms.
 * @package under-milligram
 * @sinde 0.0.1
 */

/* Prepare
 ––––––––––––––––––––––––––––––
 */

	// /- Access Control
	if( !defined( 'ABSPATH' ) ) exit;
 ?>
	<!-- ====================
		<searchform>
	 ==================== -->
	<form role = "search" method = "get" action = "<?php echo esc_url( home_url( '/' ) ); ?>">

		<label class = "screen-reader-text">
			<?php echo _x( 'Search for:', 'label', 'under-milligram' ) ?>
		</label>

		<input 
				type				 = "search" 
				class				 = "search-field" 
				placeholder		 = "<?php echo esc_attr_x( 'Search ...', 'placeholder', 'under-milligram' ) ?>" 
				value				 = "<?php echo get_search_query() ?>" 
				name				 = "s"
				title				 = "<?php echo esc_attr_x( 'Search for:', 'label', 'under-milligram' ) ?>" 
			/>
		<input 
				type				 = "submit" 
				class				 = "search-submit" 
				value				 = "<?php echo esc_attr_x( 'Search', 'submit button', 'under-milligram' ) ?>"
			>

	</form>
