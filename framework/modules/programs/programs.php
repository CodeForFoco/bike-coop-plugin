<?php

if(!defined('BIKE_COOP_MODULE_PROGRAMS_DIR')) define('BIKE_COOP_MODULE_PROGRAMS_DIR', dirname(__FILE__));
if(!defined('BIKE_COOP_MODULE_PROGRAMS_URI')) define('BIKE_COOP_MODULE_PROGRAMS_URI', str_replace( WP_CONTENT_DIR, WP_CONTENT_URL, dirname(__FILE__) ) );


class Programs{
    
    /**
	 * Instance of class
	 * 
	 * Limit intance of class to one
	 */
	protected static $instance;
	
	/**
	 * get_instance
	 * Insert description here
	 *
	 *
	 * @return
	 *
	 * @access
	 * @static
	 * @see
	 * @since
	 */
	public static function get_instance() {
		if ( ! isset( self::$instance ) ) {
			self::$instance = new self;
		}
		return self::$instance;
	}
    
    protected function __construct(){
        $this->load_classes();
        $this->init();
    }
    
    public function _wp_enqueue_scripts(){
		wp_register_style('programs-module', BIKE_COOP_MODULE_PROGRAMS_URI.'/assets/css/programs-module.css', array(), BikeCoopPlugin::$plugin_data['Version']);
	}
    
    /**
     * load_classes
     * Insert description here
     *
     *
     * @return
     *
     * @access
     * @static
     * @see
     * @since
     */
    private function load_classes(){ 
        foreach(glob(BIKE_COOP_MODULE_PROGRAMS_DIR."/framework/classes/*.php") as $file):	 			
			require_once($file); 
			
			/** Load Widgets */
			if(strpos( strtolower( $file), 'widget') !== false){ 
				add_action('widgets_init', function() use ($file){
					register_widget( str_replace('.php', '', basename($file)) );
				});
			}
		endforeach;
    }
    
    protected function init(){
        add_action('wp_enqueue_scripts', array(&$this, '_wp_enqueue_scripts'));
    }
}Programs::get_instance();