<?php

class FCBC_Mailing_List_Widget extends WP_Widget {

	/**
	 * Sets up the widgets name etc
	 */
	public function __construct() {
		$widget_ops = array( 
			'classname' => 'FCBC_Mailing_List_Widget',
			'description' => 'To load the mailing list',
		);
		parent::__construct( 'FCBC_Mailing_List_Widget', 'FCBC Mailing List Widget', $widget_ops );
	}

	/**
	 * Outputs the content of the widget
	 *
	 * @param array $args
	 * @param array $instance
	 */
	public function widget( $args, $instance ) {
		echo $args['before_widget'];
		echo $args['before_title'] . 'Join our mailing list' . $args['after_title'];
		echo '<p>Want to keep up with the latest news from the Bike Co-op? Join our News mailing list.</p>'
		echo do_shortcode('[fcbc_mailing_list]');
		echo $args['after_widget'];
	}

	/**
	 * Outputs the options form on admin
	 *
	 * @param array $instance The widget options
	 */
	public function form( $instance ) {
		// outputs the options form on admin
	}

	/**
	 * Processing widget options on save
	 *
	 * @param array $new_instance The new options
	 * @param array $old_instance The previous options
	 */
	public function update( $new_instance, $old_instance ) {
		// processes widget options to be saved
	}
}