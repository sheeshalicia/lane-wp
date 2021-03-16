<?php
/**
 * Button Styling Loader for Astra theme.
 *
 * @package     Astra Builder
 * @author      Brainstorm Force
 * @copyright   Copyright (c) 2020, Brainstorm Force
 * @link        https://www.brainstormforce.com
 * @since       Astra 3.1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Customizer Initialization
 *
 * @since 3.1.0
 */
class Astra_Ext_Footer_Button_Component_Loader {

	/**
	 * Constructor
	 *
	 * @since 3.1.0
	 */
	public function __construct() {
		add_filter( 'astra_theme_defaults', array( $this, 'theme_defaults' ) );
	}

	/**
	 * Default customizer configs.
	 *
	 * @param  array $defaults  Astra options default value array.
	 *
	 * @since 3.1.0
	 */
	public function theme_defaults( $defaults ) {
		// Button footer defaults.
		$component_limit = astra_addon_builder_helper()->component_limit;
		for ( $index = 1; $index <= $component_limit; $index++ ) {

			$_prefix = 'button' . $index;

			$defaults[ 'footer-' . $_prefix . '-size' ] = 'sm';
		}

		return $defaults;
	}
}

/**
*  Kicking this off by creating the object of the class.
*/
new Astra_Ext_Footer_Button_Component_Loader();
