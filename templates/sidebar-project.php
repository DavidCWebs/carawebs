<?php
/**
 * Sidebar for Projects
 */
?>
<div class="project-details">
  <?= Carawebs\Carawebs\Display\Image::featured_image( get_the_ID(), 'full' );
  echo "<h4>The Client:" . Carawebs\Carawebs\Display\ProjectSingle::client() . "</h4>";
  echo "</p>";
  //$our_work = Carawebs\Carawebs\Display\ProjectSingle::our_work();
  echo Carawebs\Carawebs\Display\ProjectSingle::our_work_ul();
  echo Carawebs\Carawebs\Display\ProjectSingle::project_features_ul();
  echo Carawebs\Carawebs\Display\ProjectSingle::project_links_ul();
  //echo Carawebs\Carawebs\Display\Carousel::the_carousel( 'carousel', 'full', 'basic' ); ?>
</div>
<?php
