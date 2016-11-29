<?php

/**
 * Fired during plugin deactivation
 *
 * @link       http://www.giorgiosaud.com/me
 * @since      1.0.0
 *
 * @package    Gs_Custom_Post_Divi_Generator
 * @subpackage Gs_Custom_Post_Divi_Generator/includes
 */

/**
 * Fired during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @since      1.0.0
 * @package    Gs_Custom_Post_Divi_Generator
 * @subpackage Gs_Custom_Post_Divi_Generator/includes
 * @author     Giorgiosaud <me@giorgiosaud.com>
 */
class Gs_Custom_Post_Divi_Generator_Deactivator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function deactivate() {
		//	dd('desactivsado');
			global $wpdb;
			$table_name = $wpdb->prefix . 'divi_cs_pst';
			$sql="SELECT column_name,ordinal_position,data_type,column_type FROM ".$table_name;

			// $sql = "DROP TABLE $table_name";
			// dd($wpdb->query($sql));
		//	delete_option("my_plugin_db_version");

	}

}
