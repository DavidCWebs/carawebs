<?php
namespace Carawebs\Carawebs\Widgets;
use Carawebs\Carawebs\Display;

class Services extends \WP_Widget {

	/**
	 * Sets up the widgets name etc
	 */
	public function __construct() {

		$widget_ops = array(
			'classname' => 'services-list',
			'description' => 'List of site services',
		);
		parent::__construct( 'services-list', 'Services List', $widget_ops );

	}

	/**
	 * Outputs the content of the widget
	 *
	 * @param array $args
	 * @param array $instance
	 */
	public function widget( $args, $instance ) {

		// outputs the content of the widget
		extract( $args );
    $title = apply_filters('widget_title', $instance['title']);

    echo $before_widget;
		echo "<h3>{$instance['title']}</h3>";
    echo ! empty( $instance['intro'] ) ? "<p>{$instance['intro']}</p>" : null;
    echo Display\Helpers::services_ul();
    echo $after_widget;

	}

	/**
	 * Outputs the options form on admin
	 *
	 * @param array $instance The widget options
	 */
	public function form( $instance ) {

    //var_dump($instance);

		// outputs the options form on admin
		$title = ! empty( $instance['title'] ) ? esc_attr( $instance['title'] ) : null;
    $intro = ! empty( $instance['intro'] ) ? esc_attr( $instance['intro'] ) : null;

    ?>
    <p>Enter the widget title here.</p>
    <p>
      <label for="<?= $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
      <input class="widefat" id="<?= $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
    </p>
    <p>Enter an introductory sentence if required.</p>
    <p>
      <label for="<?= $this->get_field_id('intro'); ?>"><?php _e('Intro:'); ?></label>
      <input class="widefat" id="<?= $this->get_field_id('intro'); ?>" name="<?php echo $this->get_field_name('intro'); ?>" type="text" value="<?php echo $intro; ?>" />
    </p>
    <input type="hidden" name="nonce" value="<?php echo wp_create_nonce('services_nonce'); ?>"/>
    <?php

	}

	/**
	 * Processing widget options on save
	 *
	 * @param array $new_instance The new options
	 * @param array $old_instance The previous options
	 */
	public function update( $new_instance, $old_instance ) {

    $formNonce = $_POST['nonce'];

    if (!wp_verify_nonce($formNonce, 'services_nonce')) {

      echo json_encode(array(
        'success' => false,
        'message' => __('Nonce was not verified!', 'Carawebs')
      ));
      die;

    }

		// processes widget options to be saved
		$instance = $old_instance;
		$instance['title'] = strip_tags( $new_instance['title'] );
    $instance['intro'] = strip_tags( $new_instance['intro'] );

    return $instance;

	}

}
