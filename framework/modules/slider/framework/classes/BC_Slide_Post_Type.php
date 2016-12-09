<?php 

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}


/**
 * BC_Slide_Post_Type
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
class BC_Slide_Post_Type{
	
	/**
	*
	*/
	private $classes = array();
	
	/**
	*
	*/
	const META_PREFIX = "_bc_slide_meta_";
	
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
	public function slide_details() {

		$prefix = 'ar-ad_details_';

		$cmb_details = new_cmb2_box( array(
			'id'            => $prefix . 'metabox',
			'title'         => __( 'Ad Details', 'ar' ),
			'object_types'  => array( 'ad', ), // Post type
			'priority'   => 'core',
			'show_names' => true, // Show field names on the left
			'closed'     => false, // true to keep the metabox closed by default
		) );
	
		$cmb_details->add_field( array(
			'name'       	=> __( 'URL', 'ar' ),
			'desc'       	=> __( '', 'ar' ),
			'id'         	=> $prefix . 'url',
			'type'       	=> 'text_url',
			'attributes' 	=> array(
				
			),
		) );
		
		$cmb_details->add_field( array(
			'name'       	=> __( 'Make Ad sticky', 'ar' ),
			'desc'       	=> __( '', 'ar' ),
			'id'         	=> $prefix . 'sticky_slide',
			'type'       	=> 'checkbox',
			'attributes' 	=> array(
				
			),
		) );
		
		$cmb_details->add_field( array(
			'name'       	=> __( 'Show Ad on ', 'ar' ),
			'desc'       	=> __( '', 'ar' ),
			'id'         	=> $prefix . 'sticky_slide_on',
			'type'    => 'multicheck',
		    'options' => array(
		        'all' => 'All Pages',
		        'brand' => 'Only on Sticky Brands'
		    )
		) );
		
		$sticky_slide = get_post_meta($cmb_details->object_id, $prefix . 'sticky_slide', true);
		
		$cmb_details->add_field( array(
			'name'       	=> __( 'Sticky Brands', 'ar' ),
			'desc'       	=> __( '', 'ar' ),
			'id'         	=> $prefix . 'sticky_brand_terms',
		    'type'     => 'text'
		) );
	}
	
	/**
	 * Register cpt using custom-post-type library
	 */
	public function register_post_type(){
		if(!class_exists('CPT')) return;
	
		$this->post_type = new CPT(
			array(
			    'post_type_name' => 'slide',
			    'singular' => 'Slide',
			    'plural' => 'Slides',
			    'slug' => 'slide'
			),
			array(
				'has_archive' 			=> 	true,
				'menu_position' 		=> 	8,
				'menu_icon' 			=> 	'dashicons-layout',
				'supports' 				=> 	array('title', 'excerpt', 'content','thumbnail', 'post-formats')
			)
		);
		
		$labels = array('menu_name'=>'Types');
		$this->post_type->register_taxonomy('type',array(
			'hierarchical'               => true,
			'public'                     => true,
			'show_ui'                    => true,
			'show_admin_column'          => true,
			'show_in_nav_menus'          => true,
			'show_tagcloud'              => true,
		),$labels);
	}
	
	public function shortcode_slider(){
	    ob_start();
	    include_once(BIKE_COOP_PLUGIN_DIR.'framework/modules/slider/views/shortcodes/slider.php');
	    $html = ob_get_contents();
	    ob_end_clean();
	    
	    return $html;
	}
	
	/*
	* Load required scripts
	*/
	public function load_admin_scripts_styles(){
		
	}
	
	/**
	* Housekeeping
	*
	* @return void
	*/
	private function init(){
		$this->register_post_type();
		
		add_shortcode( 'fcbc_slider',  array(&$this, 'shortcode_slider' ) );
	}
}BC_Slide_Post_Type::get_instance();
?>