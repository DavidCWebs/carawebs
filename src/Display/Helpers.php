<?php
namespace Carawebs\Carawebs\Display;

use Carawebs\Carawebs\Fetch;

class Helpers {

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

}
