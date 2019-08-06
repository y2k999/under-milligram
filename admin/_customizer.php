<?php 
/**
 * Theme Customizer
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
if( !class_exists( '_customizer' ) ) :
class _customizer {

	/**
	 	[Property]
	 */
	const PFX_PANEL		 = 'panel_UMX_';
	const PFX_SECTION	 = 'section_UMX_';
	const PFX_SETTING	 = 'setting_UMX_';


	/* 	[Constructor] 
	–––––––––––––––––––––––––
	*/
	public function __construct() {
		/**
		 	Init Property
		 */

		/**
		 	Hooks
		 */
		add_action( 
						'customize_register', 
						[$this, '_hook_register_customizer_settings']
					 );

	}// /–– [Method:]



	/* 	[Hook] Add our panels, sections, and settings to the customizer./ WeCodeArt
	–––––––––––––––––––––––––
	*/
	public function _hook_register_customizer_settings( $wp_customize ) {	

		// /–– Panel Counter
		$_i = 200;

		$_panels = _customizer_key::_get_panels();

		/**
		 	[PANEL] Loop
		 */
		foreach( (array)$_panels as $_panel ) :
			$_panel_args['title']			 = '[UMX' . $_i . '] ' . ucfirst( $_panel ) . __( ' Setting', 'under-milligram' );
			$_panel_args['description']	 = '
<style type="text/css">
	.customize-control-title{ color: #0073AA; border-bottom: #0073AA 1px solid; margin: 1rem auto; line-height: 2.5; text-indent: 1rem; overflow: hidden; }
	.customize-control select,
	.customize-control input,
	.customize-control textarea {font-size:12px;}
	.customize-control select,
	.customize-control radio,
	.customize-control checkbox,
	.customize-control input[type=number]{width: auto !important;}
	.customize-control + .customize-control-checkbox{margin-top: -12px;}
</style>';
			$_i = $_i + 10;
			$_panel_args['priority']	 = $_i;

			// /–– Register Panel
			$wp_customize -> add_panel( 
												self::PFX_PANEL . $_panel, 
												$_panel_args
											 );

			/**
			 	[SECTION] Loop
			 */
			$_sections = _customizer_key::_get_sections( $_panel );
			$_k = 0;

			foreach( (array)$_sections as $_section_key => $_section_value ) :
				$_k = $_k + 10;
				$_section_args['panel']		 = self::PFX_PANEL . $_panel;
				$_section_args['title']			 = '[UMX' . $_k . '] ' . $_section_value;
				$_section_args['priority']		 = $_k;

				// /–– Register Section
				$wp_customize -> add_section( 
														self::PFX_SECTION . $_section_key, 
														$_section_args 
													 );

					/**
						[SETTING] Loop
					 */
					$_settings = _customizer_key::_get_settings( $_section_key );

					// $_setting_args['type']					 = 'theme_mod';
					// $_setting_args['transport']			 = 'postMessage';

					foreach( (array)$_settings as $_setting ) :

						// $_setting_args['sanitize_callback']	 = self::_get_sanitize_callback( $_setting_value['type'] );
						// $_setting_args['sanitize_callback']	 = 'sanitize_text_field';

/*
						if( self::_get_sanitize_callback( $_setting_value['type'] ) ) :
							//$_setting_args['sanitize_callback']	 = self::_get_sanitize_callback( $_setting_value['type'] );
						else :
							$_setting_args['sanitize_callback']	 = 'esc_attr';
						endif;
*/
						// $_setting_args = array();
						$_props = _customizer_key::_get_props( $_setting );

						switch( $_props['type'] ) :
							case 'checkbox' :
								$_setting_args	 = '_umx_utilities_sanitize_checkbox';
								break;
							case 'select' :
								$_setting_args	 = '_umx_utilities_sanitize_select';
								break;
							case 'image' :
								$_setting_args	 = '_umx_utilities_sanitize_image';
								break;
							case 'number' :
								$_setting_args	 = '_umx_utilities_sanitize_number_range';
								break;
							case 'text' :
								$_setting_args	 = 'sanitize_text_field';
								break;
							default :
								$_setting_args	 = "sanitize_text_field";
								break;
						endswitch;

						// /–– Register Setting
						$wp_customize->add_setting( 
															self::PFX_SETTING . $_setting,
															array( 
																'type'						 => 'theme_mod',
																'transport'				 => 'postMessage',
																'sanitize_callback'		 => $_sanitize
															 )
														 );

						$_control_args['setting']	 = self::PFX_SETTING . $_setting;
						$_control_args['section']	 = self::PFX_SECTION . $_section_key;
						$_control_args['label']	 = $_props['label'];
						$_control_args['type']		 = $_props['type'];

						// /–– Control Args
						$_method = '_get_customizer_' . $_setting;

						switch( $_props['type'] ) :
							case 'number' :
								$_control_args['input_attrs']	 = _customizer_option::$_method();
								// /–– Register Control
								$wp_customize->add_control( new WP_Customize_Control( 
																	$wp_customize, 
																	self::PFX_SETTING . $_setting, 
																	$_control_args 
																 ) );
								break;

							case 'select' :
								$_control_args['choices']	 = _customizer_option::$_method();

								// /–– Register Control
								$wp_customize->add_control( 
																	self::PFX_SETTING . $_setting, 
																	$_control_args 
																 );
								break;

							case 'radio' :
								$_control_args['options']	 = _customizer_option::$_method();

								// /–– Register Control
								$wp_customize->add_control( new _beans_customizer_control( 
																	$wp_customize, 
																	self::PFX_SETTING . $_setting, 
																	$_control_args 
																 ) );
								break;

							case 'image' :
								// /–– Register Control
								$wp_customize->add_control( new WP_Customize_Image_Control( 
																	$wp_customize, 
																	self::PFX_SETTING . $_setting, 
																	$_control_args 
																 ) );
								break;

							case 'textarea' :
								// /–– Register Control
								$wp_customize->add_control( new WP_Customize_Textarea_Control( 
																	$wp_customize, 
																	self::PFX_SETTING . $_setting, 
																	$_control_args 
																 ) );
								break;

							case 'text' :
							case 'checkbox' :
							case 'hidden' :
							default :
								// /–– Register Control
								$wp_customize->add_control( 
																	self::PFX_SETTING . $_setting, 
																	$_control_args 
																 );
								break;
						endswitch;

					// /–– [SETTING] Loop
					endforeach;

				// /–– [SECTION] Loop
				endforeach;

			// /–– [PANEL] Loop
			endforeach;

	}// /–– [Method:]



}// /–– [Class:]
endif;
new _customizer();


/* Exec
 –––––––––––––––––––––––––
 */
if( class_exists( 'WP_Customize_Control' ) ):
class WP_Customize_Textarea_Control extends WP_Customize_Control {

	/**
		[Property] 
	 */
	public $type = 'textarea';


	/* 	[Constructor]
	–––––––––––––––––––––––––
	*/
	public function __construct() {
		/**
			Init Property
		 */


	}// /–– [Method:]


	/* 	[Method] 
	–––––––––––––––––––––––––
	*/
	public function render_content() {
		/**
		 	https://mekemoke.jp/2012/10/313.html
		 	WP_Customize_Control を拡張したクラスを作成し、	render_content() を上書きします。
		 */
		 ?>
		<label>
			<span class = "customize-control-title"><?php echo esc_html( $this->label ); ?></span>
			<textarea rows = "5" style = "width:100%;" <?php $this->link(); ?>><?php echo esc_textarea( $this->value() ); ?></textarea>
		</label>

		<?php 
	}// /–– [Method:]


}// /–– [Class: ]
endif;
