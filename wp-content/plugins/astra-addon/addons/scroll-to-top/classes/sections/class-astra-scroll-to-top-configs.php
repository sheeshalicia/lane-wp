<?php
/**
 * Scroll To Top Options for our theme.
 *
 * @package     Astra Addon
 * @author      Brainstorm Force
 * @copyright   Copyright (c) 2020, Brainstorm Force
 * @link        https://www.brainstormforce.com
 * @since       1.0.0
 */

// Block direct access to the file.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Bail if Customizer config base class does not exist.
if ( ! class_exists( 'Astra_Customizer_Config_Base' ) ) {
	return;
}

if ( ! class_exists( 'Astra_Scroll_To_Top_Configs' ) ) {

	/**
	 * Register Scroll To Top Customizer Configurations.
	 */
	class Astra_Scroll_To_Top_Configs extends Astra_Customizer_Config_Base {

		/**
		 * Register Scroll To Top Customizer Configurations.
		 *
		 * @param Array                $configurations Astra Customizer Configurations.
		 * @param WP_Customize_Manager $wp_customize instance of WP_Customize_Manager.
		 * @since 1.4.3
		 * @return Array Astra Customizer Configurations with updated configurations.
		 */
		public function register_configuration( $configurations, $wp_customize ) {

			$_configs = array(

				/**
				 * Option: Scroll to Top Display On
				 */
				array(
					'name'       => ASTRA_THEME_SETTINGS . '[scroll-to-top-on-devices]',
					'default'    => astra_get_option( 'scroll-to-top-on-devices' ),
					'type'       => 'control',
					'control'    => Astra_Theme_Extension::$selector_control,
					'section'    => 'section-scroll-to-top',
					'priority'   => 10,
					'title'      => __( 'Display On', 'astra-addon' ),
					'choices'    => array(
						'desktop' => __( 'Desktop', 'astra-addon' ),
						'mobile'  => __( 'Mobile', 'astra-addon' ),
						'both'    => __( 'Desktop + Mobile', 'astra-addon' ),
					),
					'renderAs'   => 'text',
					'responsive' => false,
				),

				/**
				 * Option: Divider
				 */
				array(
					'name'     => ASTRA_THEME_SETTINGS . '[scroll-to-top-on-devices-divider]',
					'type'     => 'control',
					'control'  => 'ast-divider',
					'section'  => 'section-scroll-to-top',
					'priority' => 10,
					'settings' => array(),
				),

				/**
				 * Option: Scroll to Top Position
				 */
				array(
					'name'       => ASTRA_THEME_SETTINGS . '[scroll-to-top-icon-position]',
					'default'    => astra_get_option( 'scroll-to-top-icon-position' ),
					'type'       => 'control',
					'control'    => Astra_Theme_Extension::$selector_control,
					'transport'  => 'postMessage',
					'section'    => 'section-scroll-to-top',
					'title'      => __( 'Position', 'astra-addon' ),
					'choices'    => array(
						'left'  => __( 'Left', 'astra-addon' ),
						'right' => __( 'Right', 'astra-addon' ),
					),
					'priority'   => 11,
					'responsive' => false,
					'renderAs'   => 'text',
				),

				/**
				 * Option: Divider
				 */
				array(
					'name'     => ASTRA_THEME_SETTINGS . '[scroll-to-top-icon-position-divider]',
					'type'     => 'control',
					'control'  => 'ast-divider',
					'section'  => 'section-scroll-to-top',
					'priority' => 11,
					'settings' => array(),
				),

				/**
				 * Option: Scroll To Top Icon Size
				 */
				array(
					'name'      => ASTRA_THEME_SETTINGS . '[scroll-to-top-icon-size]',
					'default'   => astra_get_option( 'scroll-to-top-icon-size' ),
					'type'      => 'control',
					'control'   => 'ast-slider',
					'transport' => 'postMessage',
					'section'   => 'section-scroll-to-top',
					'title'     => __( 'Icon Size', 'astra-addon' ),
					'suffix'    => 'px',
					'priority'  => 12,
				),

				/**
				 * Option: Scroll To Top Radius
				 */
				array(
					'name'      => ASTRA_THEME_SETTINGS . '[scroll-to-top-icon-radius]',
					'default'   => astra_get_option( 'scroll-to-top-icon-radius' ),
					'type'      => 'control',
					'control'   => 'ast-slider',
					'transport' => 'postMessage',
					'section'   => 'section-scroll-to-top',
					'title'     => __( 'Border Radius', 'astra-addon' ),
					'suffix'    => 'px',
					'priority'  => 1,
					'context'   => astra_addon_builder_helper()->is_header_footer_builder_active ?
						astra_addon_builder_helper()->design_tab : astra_addon_builder_helper()->general_tab,
				),

				/**
				 * Option: Divider
				 */
				array(
					'name'     => ASTRA_THEME_SETTINGS . '[scroll-to-top-icon-size-divider]',
					'type'     => 'control',
					'control'  => 'ast-divider',
					'section'  => 'section-scroll-to-top',
					'priority' => 2,
					'settings' => array(),
					'context'  => astra_addon_builder_helper()->is_header_footer_builder_active ?
						astra_addon_builder_helper()->design_tab : astra_addon_builder_helper()->general_tab,
				),

				array(
					'name'      => ASTRA_THEME_SETTINGS . '[scroll-on-top-color-group]',
					'default'   => astra_get_option( 'scroll-on-top-color-group' ),
					'type'      => 'control',
					'control'   => Astra_Theme_Extension::$group_control,
					'title'     => __( 'Icon Color', 'astra-addon' ),
					'section'   => 'section-scroll-to-top',
					'transport' => 'postMessage',
					'context'   => astra_addon_builder_helper()->is_header_footer_builder_active ?
						astra_addon_builder_helper()->design_tab : astra_addon_builder_helper()->general_tab,
					'priority'  => 15,
				),

				/**
				 * Option: Divider
				 */
				array(
					'name'     => ASTRA_THEME_SETTINGS . '[scroll-on-top-color-group-divider]',
					'type'     => 'control',
					'control'  => 'ast-divider',
					'section'  => 'section-scroll-to-top',
					'priority' => 15,
					'settings' => array(),
					'context'  => astra_addon_builder_helper()->is_header_footer_builder_active ?
						astra_addon_builder_helper()->design_tab : astra_addon_builder_helper()->general_tab,
				),

				array(
					'name'      => ASTRA_THEME_SETTINGS . '[scroll-on-top-bg-color-group]',
					'default'   => astra_get_option( 'scroll-on-top-bg-color-group' ),
					'type'      => 'control',
					'control'   => Astra_Theme_Extension::$group_control,
					'title'     => __( 'Background Color', 'astra-addon' ),
					'section'   => 'section-scroll-to-top',
					'transport' => 'postMessage',
					'context'   => astra_addon_builder_helper()->is_header_footer_builder_active ?
						astra_addon_builder_helper()->design_tab : astra_addon_builder_helper()->general_tab,
					'priority'  => 16,
				),

				/**
				 * Option: Icon Color
				 */
				array(
					'name'              => 'scroll-to-top-icon-color',
					'default'           => astra_get_option( 'scroll-to-top-icon-color' ),
					'type'              => 'sub-control',
					'priority'          => 1,
					'parent'            => ASTRA_THEME_SETTINGS . '[scroll-on-top-color-group]',
					'section'           => 'section-scroll-to-top',
					'control'           => 'ast-color',
					'sanitize_callback' => array( 'Astra_Customizer_Sanitizes', 'sanitize_alpha_color' ),
					'transport'         => 'postMessage',
					'title'             => __( 'Color', 'astra-addon' ),
				),

				// Check Astra_Control_Color is exist in the theme.
				/**
				 * Option: Icon Background Color
				 */
				array(
					'name'              => 'scroll-to-top-icon-bg-color',
					'default'           => astra_get_option( 'scroll-to-top-icon-bg-color' ),
					'type'              => 'sub-control',
					'priority'          => 1,
					'parent'            => ASTRA_THEME_SETTINGS . '[scroll-on-top-bg-color-group]',
					'section'           => 'section-scroll-to-top',
					'transport'         => 'postMessage',
					'control'           => 'ast-color',
					'sanitize_callback' => array( 'Astra_Customizer_Sanitizes', 'sanitize_alpha_color' ),
					'title'             => __( 'Color', 'astra-addon' ),
				),

				/**
				 * Option: Icon Hover Color
				 */
				array(
					'name'              => 'scroll-to-top-icon-h-color',
					'default'           => astra_get_option( 'scroll-to-top-icon-h-color' ),
					'type'              => 'sub-control',
					'priority'          => 1,
					'parent'            => ASTRA_THEME_SETTINGS . '[scroll-on-top-color-group]',
					'section'           => 'section-scroll-to-top',
					'control'           => 'ast-color',
					'sanitize_callback' => array( 'Astra_Customizer_Sanitizes', 'sanitize_alpha_color' ),
					'transport'         => 'postMessage',
					'title'             => __( 'Hover Color', 'astra-addon' ),
				),

				// Check Astra_Control_Color is exist in the theme.
				/**
				 * Option: Link Hover Background Color
				 */

				array(
					'name'              => 'scroll-to-top-icon-h-bg-color',
					'default'           => astra_get_option( 'scroll-to-top-icon-h-bg-color' ),
					'type'              => 'sub-control',
					'priority'          => 1,
					'parent'            => ASTRA_THEME_SETTINGS . '[scroll-on-top-bg-color-group]',
					'section'           => 'section-scroll-to-top',
					'control'           => 'ast-color',
					'sanitize_callback' => array( 'Astra_Customizer_Sanitizes', 'sanitize_alpha_color' ),
					'transport'         => 'postMessage',
					'title'             => __( 'Hover Color', 'astra-addon' ),
				),

			);

			if ( astra_addon_builder_helper()->is_header_footer_builder_active ) {

				array_push(
					$_configs,
					/**
					 * Option: Scroll To Top Tabs
					 */
					array(
						'name'        => 'section-scroll-to-top-ast-context-tabs',
						'section'     => 'section-scroll-to-top',
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
						'name'     => ASTRA_THEME_SETTINGS . '[scroll-to-top-icon-radius-divider]',
						'type'     => 'control',
						'control'  => 'ast-divider',
						'section'  => 'section-scroll-to-top',
						'priority' => 14,
						'settings' => array(),
					)
				);
			}

			$configurations = array_merge( $configurations, $_configs );

			return $configurations;
		}
	}
}

new Astra_Scroll_To_Top_Configs();


