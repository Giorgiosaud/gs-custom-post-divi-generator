<?php

/**
 *  * Register all actions and filters for the plugin
 *   *
 *    * @link       http://www.giorgiosaud.com/me
 *     * @since      1.0.0
 *      *
 *       * @package    Gs_Custom_Post_Divi_Generator
 *        * @subpackage Gs_Custom_Post_Divi_Generator/includes
 *         */

/**
 *  * Register all actions and filters for the plugin.
 *   *
 *    * Maintain a list of all hooks that are registered throughout
 *     * the plugin, and register them with the WordPress API. Call the
 *      * run function to execute the list of actions and filters.
 *       *
 *        * @package    Gs_Custom_Post_Divi_Generator
 *         * @subpackage Gs_Custom_Post_Divi_Generator/includes
 *          * @author     Giorgiosaud <me@giorgiosaud.com>
 *           */
class Gs_Custom_Post_Divi_Generator_Postifier {

	/**
	 * 	 * The array of actions registered with WordPress.
	 * 	 	 *
	 * 	 	 	 * @since    1.0.0
	 * 	 	 	 	 * @access   protected
	 * 	 	 	 	 	 * @var      array    $posts get all posts from database
	 * 	 	 	 	 	 	 */
	protected $actions;

	/**
	 * 	 * Initialize the collections used to maintain the actions and filters.
	 * 	 	 *
	 * 	 	 	 * @since    1.0.0
	 * 	 	 	 	 */
	public function __construct() {
		add_action( 'init', array($this,'run'), 0 );
		$this->posts=$this->getPosts();

	}
	/**
	 * 	 * Register Get all Posts
	 * 	 	 *
	 * 	 	 	 * @since    1.0.0
	 * 	 	 	 	 */
	protected function getPosts(){
		global $wpdb;
		$table_name = $wpdb->prefix . 'divi_cs_pst';
		$results = $wpdb->get_results (
			"
			SELECT * 
			FROM  $table_name
			"
		);
		$posts=array();
		foreach($results as $result){
			$posts[]=json_decode($result->optional_fields,true);
		}
		return $posts;
	}
	/**
	 * 	 * Register Run Posts Registers
	 * 	 	 *
	 * 	 	 	 * @since    1.0.0
	 * 	 	 	 	 */
	public function run() {
		foreach($this->posts as $post){
			$label=sanitize_title_with_dashes($post["label"]);
			register_post_type( $label, $post );
			$labels = array(
				'name'              => esc_html__( $post["label"].' Categories', 'gs-custom-post-divi-generator' ),
				'singular_name'     => esc_html__( $post["label"].' Category', 'gs-custom-post-divi-generator' ),
				'search_items'      => esc_html__( 'Search Categories', 'gs-custom-post-divi-generator' ),
				'all_items'         => esc_html__( 'All Categories', 'gs-custom-post-divi-generator' ),
				'parent_item'       => esc_html__( 'Parent Category', 'gs-custom-post-divi-generator' ),
				'parent_item_colon' => esc_html__( 'Parent Category:', 'gs-custom-post-divi-generator' ),
				'edit_item'         => esc_html__( 'Edit Category', 'gs-custom-post-divi-generator' ),
				'update_item'       => esc_html__( 'Update Category', 'gs-custom-post-divi-generator' ),
				'add_new_item'      => esc_html__( 'Add New Category', 'gs-custom-post-divi-generator' ),
				'new_item_name'     => esc_html__( 'New Category Name', 'gs-custom-post-divi-generator' ),
				'menu_name'         => esc_html__( 'Categories', 'gs-custom-post-divi-generator' ),
			);
			register_taxonomy( $label.'_tag', array( $label ), array(
				'hierarchical'      => false,
				'labels'            => $labels,
				'show_ui'           => true,
				'show_admin_column' => true,
				'query_var'         => true,
			) );
			// add_action('gs_custom_post_activate_Divi_module',array($this,'load_divi_modules',strtolower($post["label"])));
		}
	}
	public function load_divi_modules($moduleName){
		
		die(var_dump($moduleName));

	}

}

