<?php
/**
 * Astra Theme Customizer Configuration Button.
 *
 * @package     astra-builder
 * @author      Astra
 * @copyright   Copyright (c) 2020, Astra
 * @link        https://wpastra.com/
 * @since       3.1.0
 */

// No direct access, please.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Bail if Customizer config button base class is already present.
if ( class_exists( 'Astra_Ext_Button_Component_Configs' ) ) {
	return;
}

/**
 * Register Builder Customizer Configurations.
 *
 * @since 3.1.0
 */
class Astra_Ext_Button_Component_Configs {

	/**
	 * Register Builder Customizer Configurations.
	 *
	 * @param Array  $configurations Configurations.
	 * @param string $builder_type Builder Type.
	 * @param string $section Section.
	 *
	 * @since 3.1.0
	 * @return Array Astra Customizer Configurations with updated configurations.
	 */
	public static function register_configuration( $configurations, $builder_type = 'header', $section = 'section-hb-button-' ) {

		$class_obj = '';

		if ( 'footer' === $builder_type && class_exists( 'Astra_Builder_Footer' ) ) {
			$class_obj = Astra_Builder_Footer::get_instance();
		} elseif ( 'header' === $builder_type && class_exists( 'Astra_Builder_Header' ) ) {
			$class_obj = Astra_Builder_Header::get_instance();
		}

		$html_config = array();

		$component_limit = astra_addon_builder_helper()->component_limit;
		for ( $index = 1; $index <= $component_limit; $index++ ) {

			$_section = $section . $index;
			$_prefix  = 'button' . $index;

			/**
			 * These options are related to Header Section - Button.
			 * Prefix hb represents - Header Section.
			 */
			$_configs = array(

				/**
				 * Option: Divider
				 */
				array(
					'name'     => ASTRA_THEME_SETTINGS . '[' . $builder_type . '-' . $_prefix . '-size-divider]',
					'type'     => 'control',
					'section'  => $_section,
					'control'  => 'ast-divider',
					'priority' => 30,
					'settings' => array(),
					'context'  => astra_addon_builder_helper()->general_tab,
				),

				/**
				 * Option: Button size
				 */
				array(
					'name'      => ASTRA_THEME_SETTINGS . '[' . $builder_type . '-' . $_prefix . '-size]',
					'default'   => astra_get_option( $builder_type . '-' . $_prefix . '-size' ),
					'type'      => 'control',
					'control'   => 'select',
					'section'   => $_section,
					'priority'  => 30,
					'title'     => __( 'Size', 'astra-addon' ),
					'choices'   => array(
						'xs' => __( 'Extra Small', 'astra-addon' ),
						'sm' => __( 'Small', 'astra-addon' ),
						'md' => __( 'Medium', 'astra-addon' ),
						'lg' => __( 'Large', 'astra-addon' ),
						'xl' => __( 'Extra Large', 'astra-addon' ),
					),
					'transport' => 'postMessage',
					'context'   => astra_addon_builder_helper()->general_tab,
					'partial'   => array(
						'selector'            => '.ast-' . $builder_type . '-button-' . $index,
						'container_inclusive' => false,
						'render_callback'     => array( $class_obj, 'button_' . $index ),
						'fallback_refresh'    => false,
					),
				),

			);

			$html_config[] = $_configs;
		}

		$html_config    = call_user_func_array( 'array_merge', $html_config + array( array() ) );
		$configurations = array_merge( $configurations, $html_config );

		return $configurations;
	}
}

/**
 * Kicking this off by creating object of this class.
 */

new Astra_Ext_Button_Component_Configs();
