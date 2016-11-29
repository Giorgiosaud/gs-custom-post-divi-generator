<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://www.giorgiosaud.com/me
 * @since             1.0.0
 * @package           Gs_Custom_Post_Divi_Generator
 *
 * @wordpress-plugin
 * Plugin Name:       Custom Post Divi Generator
 * Plugin URI:        http://www.giorgiosaud.com/gs-custom-post-divi-generator
 * Description:       Generate custom post compatibles with carousel show in admin page.
 * Version:           1.0.0
 * Author:            Giorgiosaud
 * Author URI:        http://www.giorgiosaud.com/me
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       gs-custom-post-divi-generator
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}



/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-gs-custom-post-divi-generator-activator.php
 */
function activate_gs_custom_post_divi_generator() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-gs-custom-post-divi-generator-activator.php';
	Gs_Custom_Post_Divi_Generator_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-gs-custom-post-divi-generator-deactivator.php
 */
function deactivate_gs_custom_post_divi_generator() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-gs-custom-post-divi-generator-deactivator.php';
	Gs_Custom_Post_Divi_Generator_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_gs_custom_post_divi_generator' );
register_deactivation_hook( __FILE__, 'deactivate_gs_custom_post_divi_generator' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-gs-custom-post-divi-generator.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_gs_custom_post_divi_generator() {

	$plugin = new Gs_Custom_Post_Divi_Generator();
	$plugin->run();

}
run_gs_custom_post_divi_generator();
