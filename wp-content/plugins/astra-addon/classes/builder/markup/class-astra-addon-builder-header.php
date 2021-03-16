<?php
/**
 * Astra Addon Builder Loader.
 *
 * @package astra-builder
 */

// No direct access, please.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Astra_Addon_Builder_Header' ) ) {

	/**
	 * Class Astra_Addon_Builder_Header.
	 */
	final class Astra_Addon_Builder_Header {

		/**
		 * Member Variable
		 *
		 * @var instance
		 */
		private static $instance = null;

		/**
		 * Dynamic Methods.
		 *
		 * @var dynamic methods
		 */
		private static $methods = array();

		/**
		 *  Initiator
		 */
		public static function get_instance() {

			if ( is_null( self::$instance ) ) {
				self::$instance = new self();
			}

			return self::$instance;
		}

		/**
		 * Constructor
		 */
		public function __construct() {

			if ( astra_addon_builder_helper()->is_header_footer_builder_active ) {

				$component_limit = astra_addon_builder_helper()->component_limit;
				for ( $index = 1; $index <= $component_limit; $index++ ) {
					add_action( 'astra_header_divider_' . $index, array( $this, 'header_divider_' . $index ) );
					self::$methods[] = 'header_divider_' . $index;
				}

				add_action( 'astra_header_language_switcher', array( $this, 'header_language_switcher' ) );
			}
		}

		/**
		 * Callback when method not exists.
		 *
		 * @param  string $func function name.
		 * @param array  $params function parameters.
		 */
		public function __call( $func, $params ) {

			if ( in_array( $func, self::$methods, true ) ) {

				if ( 0 === strpos( $func, 'header_divider_' ) ) {
					$index = (int) substr( $func, strrpos( $func, '_' ) + 1 );
					if ( $index ) {
						Astra_Addon_Builder_UI_Controller::render_divider_markup( str_replace( '_', '-', $func ) );
					}
				}
			}
		}

		/**
		 * Render language switcher.
		 */
		public function header_language_switcher() {
			Astra_Addon_Builder_UI_Controller::render_language_switcher_markup( 'header-language-switcher', 'header' );
		}
	}

	/**
	 *  Prepare if class 'Astra_Addon_Builder_Header' exist.
	 *  Kicking this off by calling 'get_instance()' method
	 */
	Astra_Addon_Builder_Header::get_instance();
}
