<?php
/**
 * Astra Divider Component Dynamic CSS.
 *
 * @package     astra-builder
 * @author      Astra
 * @copyright   Copyright (c) 2020, Astra
 * @link        https://wpastra.com/
 * @since       3.0.0
 */

// No direct access, please.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Bail if Customizer divider dynamic CSS class is already present.
if ( class_exists( 'Astra_Divider_Component_Dynamic_CSS' ) ) {
	return;
}

/**
 * Register Builder Dynamic CSS.
 *
 * @since 3.0.0
 */
class Astra_Divider_Component_Dynamic_CSS {

	/**
	 * Dynamic CSS
	 *
	 * @param string $builder_type Builder Type.
	 * @return String Generated dynamic CSS for Heading Colors.
	 *
	 * @since 3.0.0
	 */
	public static function astra_divider_dynamic_css( $builder_type = 'header' ) {

		$generated_css = '';

		$number_of_divider = ( 'header' === $builder_type ) ? astra_addon_builder_helper()->num_of_header_divider : astra_addon_builder_helper()->num_of_footer_divider;

		for ( $index = 1; $index <= $number_of_divider; $index++ ) {

			if ( ! Astra_Addon_Builder_Helper::is_component_loaded( 'divider-' . $index, $builder_type ) ) {
				continue;
			}

			$_section = ( 'header' === $builder_type ) ? 'section-hb-divider-' . $index : 'section-fb-divider-' . $index;

			$selector = ( 'header' === $builder_type ) ? '.ast-header-divider-' . $index : '.footer-widget-area[data-section="section-fb-divider-' . $index . '"]';

			$divider_style = astra_get_option( $builder_type . '-divider-' . $index . '-style' );
			$divider_color = astra_get_option( $builder_type . '-divider-' . $index . '-color' );

			$divider_thickness = astra_get_option( $builder_type . '-divider-' . $index . '-thickness' );
			$divider_size      = astra_get_option( $builder_type . '-divider-' . $index . '-size' );

			$margin = astra_get_option( $_section . '-margin' );

			/**
			 * Desktop CSS.
			 */
			$css_output_desktop = array(

				/**
				 * Button Colors.
				 */
				$selector . ' .ast-divider-wrapper' => array(
					'border-style' => $divider_style,
					'border-color' => astra_get_option( $builder_type . '-divider-' . $index . '-color' ),
				),

				$selector . ' .ast-divider-layout-vertical' => array(
					'border-right-width' => astra_get_css_value( $divider_thickness['desktop'], 'px' ),
					'height'             => astra_get_css_value( $divider_size['desktop'], '%' ),
				),

				$selector . ' .ast-divider-layout-horizontal' => array(
					'border-top-width' => astra_get_css_value( $divider_thickness['desktop'], 'px' ),
				),

				$selector . '.ast-fb-divider-layout-horizontal .ast-divider-layout-horizontal' => array(
					'width' => astra_get_css_value( $divider_size['desktop'], '%' ),
				),

				$selector . '.ast-hb-divider-layout-horizontal' => array(
					'width' => astra_get_css_value( $divider_size['desktop'], '%' ),
				),

				$selector                           => array(
					// Margin.
					'margin-top'    => astra_responsive_spacing( $margin, 'top', 'desktop' ),
					'margin-bottom' => astra_responsive_spacing( $margin, 'bottom', 'desktop' ),
					'margin-left'   => astra_responsive_spacing( $margin, 'left', 'desktop' ),
					'margin-right'  => astra_responsive_spacing( $margin, 'right', 'desktop' ),
				),
			);

			/**
			 * Tablet CSS.
			 */
			$css_output_tablet = array(

				/**
				 * Button Colors.
				 */
				$selector . ' .ast-divider-wrapper' => array(
					'border-style' => $divider_style,
					'border-color' => astra_get_option( $builder_type . '-divider-' . $index . '-color' ),
				),

				'.ast-mobile-popup-content ' . $selector . ' .ast-divider-wrapper' => array(
					'border-color' => astra_get_option( $builder_type . '-divider-' . $index . '-color' ),
				),

				$selector . ' .ast-divider-layout-vertical' => array(
					'border-right-width' => astra_get_css_value( $divider_thickness['tablet'], 'px' ),
					'height'             => astra_get_css_value( $divider_size['tablet'], '%' ),
				),

				$selector . ' .ast-divider-layout-horizontal' => array(
					'border-top-width' => astra_get_css_value( $divider_thickness['tablet'], 'px' ),
				),

				$selector . '.ast-fb-divider-layout-horizontal .ast-divider-layout-horizontal' => array(
					'width' => astra_get_css_value( $divider_size['tablet'], '%' ),
				),

				$selector . '.ast-hb-divider-layout-horizontal' => array(
					'width' => astra_get_css_value( $divider_size['tablet'], '%' ),
				),

				$selector                           => array(
					// Margin CSS.
					'margin-top'    => astra_responsive_spacing( $margin, 'top', 'tablet' ),
					'margin-bottom' => astra_responsive_spacing( $margin, 'bottom', 'tablet' ),
					'margin-left'   => astra_responsive_spacing( $margin, 'left', 'tablet' ),
					'margin-right'  => astra_responsive_spacing( $margin, 'right', 'tablet' ),
				),
			);

			/**
			 * Tablet CSS.
			 */
			$css_output_mobile = array(

				/**
				 * Button Colors.
				 */
				$selector . ' .ast-divider-wrapper' => array(
					'border-style' => $divider_style,
					'border-color' => astra_get_option( $builder_type . '-divider-' . $index . '-color' ),
				),

				'.ast-mobile-popup-content ' . $selector . ' .ast-divider-wrapper' => array(
					'border-color' => astra_get_option( $builder_type . '-divider-' . $index . '-color' ),
				),

				$selector . ' .ast-divider-layout-vertical' => array(
					'border-right-width' => astra_get_css_value( $divider_thickness['mobile'], 'px' ),
					'height'             => astra_get_css_value( $divider_size['mobile'], '%' ),
				),

				$selector . ' .ast-divider-layout-horizontal' => array(
					'border-top-width' => astra_get_css_value( $divider_thickness['mobile'], 'px' ),
				),

				$selector . '.ast-fb-divider-layout-horizontal .ast-divider-layout-horizontal' => array(
					'width' => astra_get_css_value( $divider_size['mobile'], '%' ),
				),

				$selector . '.ast-hb-divider-layout-horizontal' => array(
					'width' => astra_get_css_value( $divider_size['mobile'], '%' ),
				),

				$selector                           => array(
					// Margin CSS.
					'margin-top'    => astra_responsive_spacing( $margin, 'top', 'mobile' ),
					'margin-bottom' => astra_responsive_spacing( $margin, 'bottom', 'mobile' ),
					'margin-left'   => astra_responsive_spacing( $margin, 'left', 'mobile' ),
					'margin-right'  => astra_responsive_spacing( $margin, 'right', 'mobile' ),
				),
			);

			/* Parse CSS from array() */
			$css_output  = astra_parse_css( $css_output_desktop );
			$css_output .= astra_parse_css( $css_output_tablet, '', astra_addon_get_tablet_breakpoint() );
			$css_output .= astra_parse_css( $css_output_mobile, '', astra_addon_get_mobile_breakpoint() );

			$generated_css .= $css_output;

			if ( class_exists( 'Astra_Builder_Base_Dynamic_CSS' ) && method_exists( 'Astra_Builder_Base_Dynamic_CSS', 'prepare_visibility_css' ) ) {
				$generated_css .= Astra_Builder_Base_Dynamic_CSS::prepare_visibility_css( $_section, $selector );
			}
		}

		return $generated_css;
	}
}

/**
 * Kicking this off by creating object of this class.
 */

new Astra_Divider_Component_Dynamic_CSS();
