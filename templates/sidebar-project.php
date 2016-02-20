<?php
/**
 * Sidebar for Projects
 */
use Carawebs\Carawebs\Display\ProjectSingle;

echo Carawebs\Carawebs\Display\Image::featured_image( get_the_ID(), 'full' );
?>
<div class="project-details">
  <?php
  echo "<h4>The Client:" . Carawebs\Carawebs\Display\ProjectSingle::client() . "</h4>";
  echo ProjectSingle::our_work_ul();
  echo ProjectSingle::project_features_ul();
  echo ProjectSingle::project_links_ul();
  ?>
</div>
<?php
