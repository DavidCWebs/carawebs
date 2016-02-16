<?php

namespace Carawebs\Carawebs\Display;

use Carawebs\Carawebs\Fetch;

class ProjectSingle {

  public function __construct() {


  }

  public static function get_our_work() {

    $data = new Fetch\PostMeta( get_the_ID() );
    $subfields = ['work_bullet' => 'text' ];

    return $data->repeater( 'our_work', $subfields );

  }

  public static function get_project_links() {

    $data = new Fetch\PostMeta( get_the_ID() );
    $subfields = ['sub_url' => 'text', 'description' => 'text'];
    return $data->repeater( 'project_url', $subfields );

  }

  public static function get_project_features() {

    $data = new Fetch\PostMeta( get_the_ID() );
    $subfields = ['features_bullet' => 'text'];
    return $data->repeater( 'features', $subfields );

  }

  public static function project_links_ul() {

    $links = self::get_project_links();

    ob_start();
    ?>
    <h4>Project Link<?= count($links) > 1 ? 's' : null; ?></h4>
    <ul class="list-unstyled icon-list project-links">
      <?php
      foreach( $links as $link ) {

        ?>
        <li><a target="_blank" title="Link to <?= $link['description']; ?>" href="<?= $link['sub_url']; ?>"><?= $link['description']; ?></a></li>
        <?php

      }
      ?>
    </ul>
    <?php
    return ob_get_clean();

  }

  public static function project_features_ul() {

    $features = self::get_project_features();

    if ( empty ( $features ) ) {

      return;

    }

    ob_start();
    ?>
    <h4>Project Features</h4>
    <ul class="list-unstyled icon-list project-features">
      <?php
      foreach( $features as $feature ) {

        echo "<li>{$feature['features_bullet']}</li>";

      }
      ?>
    </ul>
    <?php
    return ob_get_clean();

  }

  public static function client() {

    return Fetch\PostMeta::field_output( 'client', 'text' );

  }

  public static function our_work_ul() {

    $data = self::get_our_work();

    if ( empty ( $data ) ) {

      return;

    }

    ob_start();

    ?>
    <h4>Our Work</h4>
    <ul class="list-unstyled icon-list project-our-work">
      <?php
    foreach( $data as $value ) {

      echo "<li>{$value['work_bullet']}</li>";

    }

    ?>
  </ul>
  <?php

  return ob_get_clean();

  }

}
