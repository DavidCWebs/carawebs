<?php
/**
 * Template Name: Landing Page Template
 */
?>

<?php while (have_posts()) : the_post();

//$display = new Carawebs\Carawebs\Display\Frontpage( get_the_ID() );
$flexible_content = new Carawebs\Carawebs\Display\Dynamic( get_the_ID() );

// The intro
//$display->the_intro();

// The flexible layout
$flexible_content->the_flexible_content();

?>
<div class="section map">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div id="map-canvas"></div>
      </div>
    </div>
  </div>
</div>
<?php endwhile; ?>
