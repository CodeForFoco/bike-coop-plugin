<?php 

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}


if ( ! class_exists( 'Awesome_Events_Post_Type' ) ) :
	/**
	 * Awesome_Events_Post_Type
	 * api and framework surrounding ads
	 *
	 * @category
	 * @package
	 * @author
	 * @copyright
	 * @license
	 * @version
	 * @link
	 * @see
	 * @since
	 */
	class Awesome_Events_Post_Type{
		/**
		*
		*/
		const META_PREFIX = "awesome_events_";
		
		/**
		 * 
		 */
		 protected static $instance;
		 
		 /** 
		  * 
		  * Return instance of Class 
		  */
		public static function get_instance() {
			if ( ! isset( self::$instance ) ) {
				self::$instance = new self;
			}
			return self::$instance;
		}

		/** 
		* Class constructor 
		*/
		public function __construct(){
			$this->init();
		}
		
		/**
		* Ad sponsor meta boxes
		*/		
		public function event_details() {

			$prefix = 'awesome_events_details_';

			$cmb_details = new_cmb2_box( array(
				'id'            => $prefix . 'metabox',
				'title'         => __( 'Event Details', 'awesome_events' ),
				'object_types'  => array( 'event', ), // Post type
				'priority'   => 'core',
				'show_names' => true, // Show field names on the left
				'closed'     => false, // true to keep the metabox closed by default
			) );
		
			$cmb_details->add_field( array(
				'name'       	=> __( 'URL', 'awesome_events' ),
				'desc'       	=> __( '', 'awesome_events' ),
				'id'         	=> $prefix . 'url',
				'type'       	=> 'text_url',
				'attributes' 	=> array(
					
				),
			) );
		}
		
		/**
		 * Register cpt using custom-post-type library
		 */
		public function register_post_type(){
			if(!class_exists('CPT')) return;
		
			$this->post_type = new CPT(
				array(
				    'post_type_name' => 'event',
				    'singular' => 'Event',
				    'plural' => 'Events',
				    'slug' => 'event'
				),
				array(
					'has_archive' 			=> 	true,
					'menu_position' 		=> 	8,
					'menu_icon' 			=> 	'dashicons-layout',
					'supports' 				=> 	array('title', 'editor','thumbnail')
				)
			);
			
			/*$labels = array('menu_name'=>'Types');
			$this->post_type->register_taxonomy('type',array(
				'hierarchical'               => true,
				'public'                     => true,
				'show_ui'                    => true,
				'show_admin_column'          => true,
				'show_in_nav_menus'          => true,
				'show_tagcloud'              => true,
			),$labels);*/
		}
		
		/*
		* Load required scripts
		*/
		public function load_admin_scripts_styles(){
			
		}
		
		/**
		 * Save the meta when the post is saved.
		 *
		 * @param int $post_id The ID of the post being saved.
		 */
		public function save_post($post_id){  
			
			// Check title submitted
			if ( empty( $_POST['post_title'] ) ) {
				return new WP_Error( 'post_data_missing', __( 'New post requires a title.' ) );
			}
			
			// If this is an autosave, our form has not been submitted
			if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
				return $post_id;

			// Check the user's permissions.
			if ( 'page' == $_POST['post_type'] ) {
				if ( ! current_user_can( 'edit_page', $post_id ) )
					return $post_id;
			} else {
				if ( ! current_user_can( 'edit_post', $post_id ) )
					return $post_id;
			}
			
			foreach($_POST as $key=> $_meta){ 
				if(! preg_match('/awesome_events_/', $key)) continue;

				/** Update the meta field. **/
				update_post_meta( $post_id, $key, sanitize_text_field($_meta) );
			}
		}
		
		
		/**
		*	Add shop columns to post type
		*/
		public function custom_event_columns( $columns ) {return $columns;
			$new_columns = array();
			// re-arrange $columns array to display columns in a specific order
			foreach( $columns as $key => $title ){
				// add the following columns before the 'date' column
				if( $key == 'date' ){
					$new_columns['ar_primary_contact'] 	= __( 'Primary Contact' );
					$new_columns['phone'] 				= __( 'Phone' );
				}
				$new_columns[$key] = $title;
			}
			return $new_columns;
		}
		
		public function shortcode_upcoming_events(){
		    ob_start();
		    include_once(BIKE_COOP_PLUGIN_DIR.'views/shortcodes/upcoming-events.php');
		    $html = ob_get_contents();
		    ob_end_clean();
		    
		    
		    return $html;
		}

		/**
		*	Add shop column data
		*/
		public function custom_event_columns_data( $column, $post_id ){ return;
			global $CAP;

			switch ( $column ) {
				case 'awesome_events_primary_contact':
				    
					break;

				case 'phone':
				    
					break;
			}
		}
		
		/**
		* Housekeeping
		*
		* @return void
		*/
		private function init(){
			$this->register_post_type();
			
			add_shortcode( 'fcbc_upcoming_events',  array(&$this, 'shortcode_upcoming_events' ) );
			
			/** Load front-end scripts and styles */
			//add_action( 'wp_enqueue_scripts', array(&$this, 'load_styles_and_scripts'), 1 );
			
			if(!is_admin()) return;
			
			/** Load custom ad details meta boxes */
			add_action('cmb2_admin_init', array(&$this,'event_details'));
			
			/** Save Post */
			add_action( 'save_post_event', array( &$this, 'save_post' ) );
			
			/** Load back-end scripts and styles */
			add_action( 'admin_enqueue_scripts', array( &$this,'load_admin_scripts_styles' ) );
			
			// Add ad columns to post type
			add_filter( 'manage_event_posts_columns' , array( &$this, 'custom_event_columns' ) );
			
			// Add ad column data
			add_action( 'manage_posts_custom_column' , array( &$this, 'custom_event_columns_data' ), 10, 2 );
		}
	}Awesome_Events_Post_Type::get_instance();
endif;?>