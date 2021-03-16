<?php
/**
 * Content Spacing Options for our theme.
 *
 * @package     Astra
 * @author      Brainstorm Force
 * @copyright   Copyright (c) 2020, Brainstorm Force
 * @link        https://www.brainstormforce.com
 * @since       Astra 1.4.3
 */

// Block direct access to the file.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Bail if Customizer config base class does not exist.
if ( ! class_exists( 'Astra_Customizer_Config_Base' ) ) {
	return;
}

/**
 * Customizer Sanitizes
 *
 * @since 1.4.3
 */
if ( ! class_exists( 'Astra_Customizer_Container_Layout_Spacing_Configs' ) ) {

	/**
	 * Register Content Spacing Customizer Configurations.
	 */
	class Astra_Customizer_Container_Layout_Spacing_Configs extends Astra_Customizer_Config_Base {

		/**
		 * Register Content Spacing Customizer Configurations.
		 *
		 * @param Array                $configurations Astra Customizer Configurations.
		 * @param WP_Customize_Manager $wp_customize instance of WP_Customize_Manager.
		 * @since 1.4.3
		 * @return Array Astra Customizer Configurations with updated configurations.
		 */
		public function register_configuration( $configurations, $wp_customize ) {

			$_configs = array(

				/**
				 * Option - Content Space
				 */
				array(
					'name'              => ASTRA_THEME_SETTINGS . '[container-outside-spacing]',
					'default'           => astra_get_option( 'container-outside-spacing' ),
					'type'              => 'control',
					'control'           => 'ast-responsive-spacing',
					'sanitize_callback' => array( 'Astra_Customizer_Sanitizes', 'sanitize_responsive_spacing' ),
					'transport'         => 'postMessage',
					'section'           => 'section-container-layout',
					'context'           => astra_addon_builder_helper()->is_header_footer_builder_active ?
						astra_addon_builder_helper()->design_tab : astra_addon_builder_helper()->general_tab,
					'priority'          => 95,
					'title'             => __( 'Outside Container Spacing', 'astra-addon' ),
					'linked_choices'    => true,
					'unit_choices'      => array( 'px', 'em', '%' ),
					'choices'           => array(
						'top'    => __( 'Top', 'astra-addon' ),
						'right'  => __( 'Right', 'astra-addon' ),
						'bottom' => __( 'Bottom', 'astra-addon' ),
						'left'   => __( 'Left', 'astra-addon' ),
					),
				),

				/**
				 * Option: Divider
				 */
				array(
					'name'     => ASTRA_THEME_SETTINGS . '[site-content-container-spacing-divider]',
					'type'     => 'control',
					'control'  => 'ast-divider',
					'section'  => 'section-container-layout',
					'priority' => 97,
					'settings' => array(),
					'context'  => astra_addon_builder_helper()->is_header_footer_builder_active ?
						astra_addon_builder_helper()->design_tab : astra_addon_builder_helper()->general_tab,
				),

				/**
				 * Option - Content Space
				 */
				array(
					'name'           => ASTRA_THEME_SETTINGS . '[container-inside-spacing]',
					'default'        => astra_get_option( 'container-inside-spacing' ),
					'type'           => 'control',
					'control'        => 'ast-responsive-spacing',
					'context'        => astra_addon_builder_helper()->is_header_footer_builder_active ?
						astra_addon_builder_helper()->design_tab : astra_addon_builder_helper()->general_tab,
					'transport'      => 'postMessage',
					'section'        => 'section-container-layout',
					'priority'       => 100,
					'title'          => __( 'Inside Container Spacing', 'astra-addon' ),
					'linked_choices' => true,
					'unit_choices'   => array( 'px', 'em', '%' ),
					'choices'        => array(
						'top'    => __( 'Top', 'astra-addon' ),
						'right'  => __( 'Right', 'astra-addon' ),
						'bottom' => __( 'Bottom', 'astra-addon' ),
						'left'   => __( 'Left', 'astra-addon' ),
					),
				),
			);

			if ( astra_addon_builder_helper()->is_header_footer_builder_active ) {

				array_push(
					$_configs,
					/**
					 * Option: Container Tabs
					 */
					array(
						'name'        => 'section-container-layout-ast-context-tabs',
						'section'     => 'section-container-layout',
						'type'        => 'control',
						'control'     => 'ast-builder-header-control',
						'priority'    => 0,
						'description' => '',

					)
				);

			} else {

				array_push(
					$_configs,
					/**
					 * Option: Divider
					 */
					array(
						'name'     => ASTRA_THEME_SETTINGS . '[content-spacing-divider]',
						'section'  => 'section-container-layout',
						'type'     => 'control',
						'control'  => 'ast-heading',
						'title'    => __( 'Spacing', 'astra-addon' ),
						'priority' => 90,
						'settings' => array(),
						'context'  => astra_addon_builder_helper()->is_header_footer_builder_active ?
							astra_addon_builder_helper()->design_tab : astra_addon_builder_helper()->general_tab,
					)
				);
			}

			return array_merge( $configurations, $_configs );
		}
	}
}

/**
 * Kicking this off by calling 'get_instance()' method
 */
new Astra_Customizer_Container_Layout_Spacing_Configs();
