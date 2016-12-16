<?php
/*
Plugin Name: Bike-Coop Site Plugin
Description: A plugin for all the Bike Co-op Functionality that shouldn't be in a theme
Version: 0.3.0
Author: Code for Fort Collins
Author URI: http://codeforfoco.org/
Text Domain: coop-plugin
Domain Path: /languages
*/

if ( ! defined( 'ABSPATH' ) ) exit;

if(!defined('BIKE_COOP_PLUGIN_DIR')) define('BIKE_COOP_PLUGIN_DIR',  plugin_dir_path( __FILE__ ));
if(!defined('BIKE_COOP_PLUGIN_URI')) define('BIKE_COOP_PLUGIN_URI',  plugin_dir_url( __FILE__ ));

class BikeCoopPlugin{
	
	public static $plugin_data;
	
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
		require_once(BIKE_COOP_PLUGIN_DIR."framework/vendor/autoload.php");
		
		$this->load_template_tags();
		$this->load_classes();
		$this->init();	
		$this->load_modules();
	}
	
	public function _wp_enqueue_scripts(){
		wp_register_style('bike-coop-plugin', BIKE_COOP_PLUGIN_URI.'/assets/css/bike-coop-plugin.css', array(), self::$plugin_data['Version']);
		wp_enqueue_scripts('mailing-list-form',  BIKE_COOP_PLUGIN_URI.'/assets/js/mailing-list.js', array('jquery'));
	}
	
	public function fcbc_volunteer_form() {
		ob_start();
		include 'volunteer-legacy-processor.php';
		include 'volunteer-form.php';
		return ob_get_clean();
	 }
	
	public function fcbc_abandoned_bike_form() {
		ob_start();
		include 'abandoned-bike.php';
		return ob_get_clean();
	}
	
	public function fcbc_mailing_list() {
		ob_start();
		include 'mailing-list.php';
		return ob_get_clean();
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
    private function load_template_tags(){ 
        foreach(glob(BIKE_COOP_PLUGIN_DIR."framework/inc/*.php") as $file):	 			
			include_once($file); 
		endforeach;
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
        foreach(glob(BIKE_COOP_PLUGIN_DIR."framework/classes/*.php") as $file):	 			
			require_once($file); 
			
			/** Load Widgets */
			if(strpos( strtolower($file), 'widget') !== false){ 
				add_action('widgets_init', function() use ($file){
					register_widget( str_replace('.php', '', basename($file)) );
				});
			}
		endforeach;
    }
    
    private function load_modules(){
    	$module_dirs = $dirs = array_filter(glob(BIKE_COOP_PLUGIN_DIR.'framework/modules/*'), 'is_dir');
    	
    	if(!is_array($module_dirs) && !empty($module_dirs))
    		return;
    	
    	foreach($module_dirs as $dir){
    		$dir = explode('/', trim($dir, '/') );
    		$dir = $dir[count($dir) -1];
    		
    		include_once(BIKE_COOP_PLUGIN_DIR."framework/modules/$dir/$dir.php");
    	}
    }
	
	protected function init(){
		self::$plugin_data = fcbc_get_plugin_data(BIKE_COOP_PLUGIN_DIR.'bike-coop-plugin.php', false);
		
		add_shortcode( 'fcbc_volunteer_form', array(&$this, 'fcbc_volunteer_form') );
		add_shortcode( 'fcbc_abandoned_bike_form',  array(&$this, 'fcbc_abandoned_bike_form') );
		add_shortcode( 'fcbc_mailing_list',  array(&$this, 'fcbc_mailing_list' ) );
		add_action('wp_enqueue_scripts', array(&$this, '_wp_enqueue_scripts'));
	}
}

BikeCoopPlugin::get_instance();

function is_valid_email($field) {
	//filter_var() sanitizes the e-mail
	//address using FILTER_SANITIZE_EMAIL
	$field = filter_var($field, FILTER_SANITIZE_EMAIL);
	//filter_var() validates the e-mail
	//address using FILTER_VALIDATE_EMAIL
	return filter_var($field, FILTER_VALIDATE_EMAIL);
}

add_action( 'wp_ajax_fcbc_mailing_list', 'fcbc_mailing_list_process' );
add_action( 'wp_ajax_no_priv_fcbc_mailing_list', 'fcbc_mailing_list_process' );
function fcbc_mailing_list_process() {
	if (isset($_POST['email'])) {//if "email" is filled out, proceed
		if (!is_valid_email($_POST['email'])) {
			echo "Invalid input";
			$note = "Invalid Email Address";
		} else {//send email
			$email = $_POST['email'] ;
			wp_mail("news-join@fcbikecoop.org", "Subject: Subscribe", 'Subscribe', "From: $email" );
			echo "<p><em>Thank you! A confirmation email will be sent. Please follow the instructions in that email to finish getting signed up.</em></p>";
			$show_form = false;
		}
	}

	wp_die();
}