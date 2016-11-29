<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       http://www.giorgiosaud.com/me
 * @since      1.0.0
 *
 * @package    Gs_Custom_Post_Divi_Generator
 * @subpackage Gs_Custom_Post_Divi_Generator/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Gs_Custom_Post_Divi_Generator
 * @subpackage Gs_Custom_Post_Divi_Generator/includes
 * @author     Giorgiosaud <me@giorgiosaud.com>
 */
class Gs_Custom_Post_Divi_Generator_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'gs-custom-post-divi-generator',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
