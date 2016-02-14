<?php
namespace Carawebs\Carawebs\Display;

use Carawebs\Carawebs\Fetch;

class Helpers {

  /**
   * Build the main call to action
   *
   * @see /partials/main-call-to-action.php
   * @see /partials/click-to-call.php
   *
   * @param  string $button_text Text for a button
   * @param  string $action      Phone or email - phone is default
   * @return string              HTML markup for the call to action
   */
  public static function main_CTA( $button_text = null, $action = 'phone' ) {

    if ( 'phone' === $action ) {

      $number = self::mobile_number();
      $clickable_number = self::call_number( $number );
      $button_text = empty( $button_text ) ? "Click to Call" : $button_text;

      ob_start();

      include_once( get_template_directory() . '/partials/main-call-to-action.php');

      return ob_get_clean();

    }

    elseif ( 'email' === $action ) {

      $number = self::mobile_number();
      $clickable_number = self::call_number( $number );
      $button_text = empty( $button_text ) ? "Click to Call" : $button_text;

      ob_start();

      include_once( get_template_directory() . '/partials/main-call-to-action.php');

      return ob_get_clean();

    }

  }

  public static function main_CTA_shortcode() {

    return self::main_CTA();

  }

  public static function share_this_shortcode() {

    return self::share_this();

  }

  public static function share_this() {

    ob_start();

    include( get_template_directory() . '/partials/social-buttons-justified.php');

    return ob_get_clean();

  }

  /**
 * Space separated project category terms to be added to the div class
 *
 * @return string [description]
 */
public static function project_categories_class () {

  $term_list = wp_get_object_terms( get_the_ID(), 'project-category', array("fields" => "slugs"));

  $classes = '';
  foreach ($term_list as $term) {

    $classes .= " " . $term;

  }

  return $classes;

}

public static function project_data_terms() {

  $term_list = wp_get_object_terms( get_the_ID(), 'project-category', array("fields" => "slugs"));

  $data_terms = '';
  $i = 0;

  foreach ($term_list as $term) {

    $data_terms .= $i > 0 ? "-" : null;
    $data_terms .= $term;
    $i ++;

  }

  return $data_terms;

}


  public static function address() {

    $address = Carawebs\Carawebs\Fetch\Options::get_options_array( 'carawebs_address_data' );

    caradump($address);

  }

  /**
   * Return a UL of services, linking to each service
   *
   * @return string HTML markup for a services unordered list
   */
  public static function services_ul() {

    $services = new \Carawebs\Carawebs\Loops\Services();
    $services = $services->services_data();

    ob_start();

    ?>
    <ul class="services-list">
      <?php

      foreach( $services as $service ) {

        echo "<li><a href='{$service['the_permalink']}'>{$service['the_title']}</a></li>";

      }
      ?>
    </ul>
    <?php

    return ob_get_clean();

  }

  /**
   * Return the registered mobile number for this site
   *
   * This requires the number to be set using the Carawebs Address plugin. The number is
   * stored as `carawebs_address_data['mobile']` in the options table.
   *
   * @return string Mobile number
   */
  public static function mobile_number() {

    $address = Fetch\Options::get_options_array( 'carawebs_address_data' );

    return $address['mobile'];

  }

  public static function get_facebook() {

    return Fetch\Options::get_options_array( 'carawebs_address_data' )['facebook'];

  }

  public static function get_twitter() {

    return Fetch\Options::get_options_array( 'carawebs_address_data' )['twitter'];

  }

  public static function get_email() {

    return Fetch\Options::get_options_array( 'carawebs_address_data' )['email'];

  }

  public static function call_number( $number ) {

    $number = str_replace( ' ', '', $number);
    $number = str_replace( '-', '', $number);
    return $number;

  }

  public static function click_to_call( $number = null, $prefix = null, $button_text = null ) {

    $number = empty( $number ) ? self::mobile_number() : $number;
    $clickable_number = self::call_number( $number );
    $button_text = empty( $button_text ) ? "Click to Call" : $button_text;
    $prefix = ! empty( $prefix ) ? $prefix : null;

    ob_start();

    include( get_template_directory() . '/partials/click-to-call.php' );

    return ob_get_clean();

  }

  public static function social_follow() {

    $facebook = self::get_facebook();
    $twitter = self::get_twitter();
    $email = self::get_email();

    include( get_template_directory() . '/partials/social-follow.php' );

  }

}
