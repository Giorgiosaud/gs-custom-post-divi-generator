<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://www.giorgiosaud.com/me
 * @since      1.0.0
 *
 * @package    Gs_Custom_Post_Divi_Generator
 * @subpackage Gs_Custom_Post_Divi_Generator/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Gs_Custom_Post_Divi_Generator
 * @subpackage Gs_Custom_Post_Divi_Generator/admin
 * @author     Giorgiosaud <me@giorgiosaud.com>
 */
class Gs_Custom_Post_Divi_Generator_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}
	/**
	 * Register The Admin Pages Sub Pages And Configuration
	 */
	public function admin_pages(){
		add_menu_page('Divi Custom Post Generator','Divi Custom Post Generator','activate_plugins','divi-custom-post',array($this,'main_posts_page'),'dashicons-feedback');
		add_submenu_page( 'divi-custom-post', 'List Custom Post', 'List Custom Post', 'activate_plugins', 'divi-list-custom-post', array($this,'list_posts_page'));
		add_submenu_page( 'divi-custom-post', 'Create Custom Post', 'Create Custom Post', 'activate_plugins', 'divi-create-custom-post', array($this,'create_posts_page'));


	}

	public function main_posts_page(){
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/partials/gs-custom-post-divi-generator-admin-display.php';
	}

	public function create_posts_page(){
		if(count($_POST)==0):
			require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/partials/gs-custom-post-divi-generator-admin-create-post-form.php';
		else:
			$plural=$_POST['plural'];
		$singular=$_POST['singular'];
		$name=$_POST['name'];
		$description=$_POST['description'];
		$optional_fields=array(
			'label'                 => sprintf( __('%s', 'gs-custom-post-divi-generator' ),$singular),
			'description'           => sprintf( __('%s', 'gs-custom-post-divi-generator' ),$description),
			'labels'                => array(
				'name'                  => sprintf( __('%s', 'gs-custom-post-divi-generator'), $singular ),
				'singular_name'         => sprintf( __('%s', 'gs-custom-post-divi-generator'), $singular ),
				'menu_name'             => sprintf(__( '%s', 'gs-custom-post-divi-generator' ),$plural),
				'name_admin_bar'        => sprintf(__( '%s', 'gs-custom-post-divi-generator' ),$plural),
				'archives'              => __( 'Item Archives', 'gs-custom-post-divi-generator' ),
				'parent_item_colon'     => __( 'Parent Item:', 'gs-custom-post-divi-generator' ),
				'all_items'             => __( 'All Items', 'gs-custom-post-divi-generator' ),
				'add_new_item'          => __( 'Add New Item', 'gs-custom-post-divi-generator' ),
				'add_new'               => __( 'Add New', 'gs-custom-post-divi-generator' ),
				'new_item'              => __( 'New Item', 'gs-custom-post-divi-generator' ),
				'edit_item'             => __( 'Edit Item', 'gs-custom-post-divi-generator' ),
				'update_item'           => __( 'Update Item', 'gs-custom-post-divi-generator' ),
				'view_item'             => __( 'View Item', 'gs-custom-post-divi-generator' ),
				'search_items'          => __( 'Search Item', 'gs-custom-post-divi-generator' ),
				'not_found'             => __( 'Not found', 'gs-custom-post-divi-generator' ),
				'not_found_in_trash'    => __( 'Not found in Trash', 'gs-custom-post-divi-generator' ),
				'featured_image'        => __( 'Featured Image', 'gs-custom-post-divi-generator' ),
				'set_featured_image'    => __( 'Set featured image', 'gs-custom-post-divi-generator' ),
				'remove_featured_image' => __( 'Remove featured image', 'gs-custom-post-divi-generator' ),
				'use_featured_image'    => __( 'Use as featured image', 'gs-custom-post-divi-generator' ),
				'insert_into_item'      => __( 'Insert into item', 'gs-custom-post-divi-generator' ),
				'uploaded_to_this_item' => __( 'Uploaded to this item', 'gs-custom-post-divi-generator' ),
				'items_list'            => __( 'Items list', 'gs-custom-post-divi-generator' ),
				'items_list_navigation' => __( 'Items list navigation', 'gs-custom-post-divi-generator' ),
				'filter_items_list'     => __( 'Filter items list', 'gs-custom-post-divi-generator' ),
			),
			'supports'              => array( 'title', 'editor', 'excerpt', 'thumbnail', 'trackbacks', 'custom-fields', 'page-attributes', ),
			'taxonomies'            => array( 'post_tag' ),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 5,
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => true,		
			'exclude_from_search'   => false,
			'publicly_queryable'    => true,
			'capability_type'       => 'page',
		);
		$json=json_encode($optional_fields);
		global $wpdb;

		$table_name = $wpdb->prefix . 'divi_cs_pst';
		$wpdb->insert( 
			$table_name, 
			array( 
				'name' => $name, 
				'plural' => $plural, 
				'singular' => $singular, 
				'description' => $description, 
				'optional_fields' => $json, 
			)); 
endif;
	}

	public function list_posts_page(){
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/partials/gs-custom-post-divi-generator-admin-list-post-form.php';
	}
	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles($hook) {
		//die($hook);
		die(var_dump(strpos($hook,'divi-custom-post')!==false));

		if(strpos($hook,'divi-custom-post')!== false){
			/**
			 * This function is provided for demonstration purposes only.
			 *
			 * An instance of this class should be passed to the run() function
			 * defined in Gs_Custom_Post_Divi_Generator_Loader as all of the hooks are defined
			 * in that particular class.
			 *
			 * The Gs_Custom_Post_Divi_Generator_Loader will then create the relationship
			 * between the defined hooks and the functions defined in this
			 * class.
			 */

			wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/gs-custom-post-divi-generator-admin.css', array('materializr'), $this->version, 'all' );
			wp_enqueue_style('materializr','//cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/css/materialize.min.css',array(),'v0.97.8','all');
		}
		return;

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Gs_Custom_Post_Divi_Generator_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Gs_Custom_Post_Divi_Generator_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script('materializr',"//cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/js/materialize.min.js",array('jquery'),'v0.97.8',false);
		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/gs-custom-post-divi-generator-admin.js', array( 'jquery','materializr' ), $this->version, false );


	}

}
