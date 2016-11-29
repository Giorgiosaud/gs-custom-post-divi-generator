<?php

/**
 * Fired during plugin activation
 *
 * @link       http://www.giorgiosaud.com/me
 * @since      1.0.0
 *
 * @package    Gs_Custom_Post_Divi_Generator
 * @subpackage Gs_Custom_Post_Divi_Generator/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Gs_Custom_Post_Divi_Generator
 * @subpackage Gs_Custom_Post_Divi_Generator/includes
 * @author     Giorgiosaud <me@giorgiosaud.com>
 */
class Gs_Custom_Post_Divi_Generator_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {
		global $wpdb;
		$table_name = $wpdb->prefix . 'divi_cs_pst';
		$charset_collate = $wpdb->get_charset_collate();

		$sql = "CREATE TABLE $table_name (
		id mediumint(9) NOT NULL AUTO_INCREMENT,
		name tinytext NOT NULL,
		plural tinytext NOT NULL,
		singular tinytext NOT NULL,
		description text NOT NULL,
		optional_fields text NOT NULL,
		PRIMARY KEY  (id)
		) $charset_collate;";

		require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
		dbDelta( $sql );

	}

}
