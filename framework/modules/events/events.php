<?php

if(!defined('BIKE_COOP_MODULE_EVENTS_DIR')) define('BIKE_COOP_MODULE_EVENTS_DIR', BIKE_COOP_PLUGIN_DIR.'framework/modules/events');
if(!defined('BIKE_COOP_MODULE_EVENTS_URI')) define('BIKE_COOP_MODULE_EVENTS_URI', BIKE_COOP_PLUGIN_URI.'/framework/modules/events');


class Events{
    
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
        foreach(glob(BIKE_COOP_MODULE_EVENTS_DIR."/framework/classes/*.php") as $file):	 			
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
        
    }
}Events::get_instance();