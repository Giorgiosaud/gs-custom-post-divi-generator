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


function Prep_DS_Custom_Modules2(){
 global $pagenow;

$is_admin = is_admin();
 $action_hook = $is_admin ? 'wp_loaded' : 'wp';
 $required_admin_pages = array( 'edit.php', 'post.php', 'post-new.php', 'admin.php', 'customize.php', 'edit-tags.php', 'admin-ajax.php', 'export.php' ); // list of admin pages where we need to load builder files
 $specific_filter_pages = array( 'edit.php', 'admin.php', 'edit-tags.php' );
 $is_edit_library_page = 'edit.php' === $pagenow && isset( $_GET['post_type'] ) && 'et_pb_layout' === $_GET['post_type'];
 $is_role_editor_page = 'admin.php' === $pagenow && isset( $_GET['page'] ) && 'et_divi_role_editor' === $_GET['page'];
 $is_import_page = 'admin.php' === $pagenow && isset( $_GET['import'] ) && 'wordpress' === $_GET['import']; 
 $is_edit_layout_category_page = 'edit-tags.php' === $pagenow && isset( $_GET['taxonomy'] ) && 'layout_category' === $_GET['taxonomy'];

if ( ! $is_admin || ( $is_admin && in_array( $pagenow, $required_admin_pages ) && ( ! in_array( $pagenow, $specific_filter_pages ) || $is_edit_library_page || $is_role_editor_page || $is_edit_layout_category_page || $is_import_page ) ) ) {
	do_action('gs_custom_post_activate_Divi_module',$module_name=null);
 }
}
Prep_DS_Custom_Modules2();

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
