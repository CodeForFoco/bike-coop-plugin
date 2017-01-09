<?php

define('BC_Slider_URI', BIKE_COOP_PLUGIN_URI.'framework/modules/slider');
define('BC_Slider_DIR', BIKE_COOP_PLUGIN_DIR.'framework/modules/slider');

class BC_Slider{
    
    protected static $instance;
    
    public static function get_instance() {
		if ( ! isset( self::$instance ) ) {
			self::$instance = new self;
		}
		return self::$instance;
	}
	
	public function __construct(){
	    $this->load_dependencies();
	    $this->init();
	}
	
	public function wp_enqueue_scripts(){
	    // Slick slider
	    wp_enqueue_style( 'bc-module-slick', BC_Slider_URI . '/assets/css/vendor/slick/slick.css', array(), '1' );
	    wp_enqueue_style( 'bc-module-slick-theme', BC_Slider_URI . '/assets/css/vendor/slick/slick-theme.css', array(), '1' );
	    wp_enqueue_style( 'bc-module-slick-overrides', BC_Slider_URI . '/assets/css/slider-module.min.css', array(), '1' );
	}

  // TODO: create instructions for user (custom fields, etc.)
	
	public function browser_body_class($classes) {
		$classes[]	= 'bc-slider';
		
		return $classes;
	}
	
	/**
	* Load Requires.
	* Loads all files that are required by the theme.
	*
	* @return none
	* @see __construct
	*/
	private function load_dependencies(){
		/** Load includes */
		foreach(glob(BC_Slider_DIR."/framework/inc/*.php") as $file):				
			require_once($file);
		endforeach;
		
		//var_dump(BC_Slider_DIR); die();
	    /** Load Classes */
    	foreach(glob(BC_Slider_DIR."/framework/classes/*.php") as $file):				
    		require_once($file);
    	endforeach;
	}
    
    private function init(){
        add_action('wp_enqueue_scripts', array(&$this,'wp_enqueue_scripts'), 100);
        
        add_filter('body_class', array(&$this,'browser_body_class'));
    }
} BC_Slider::get_instance(); ?>