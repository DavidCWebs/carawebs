<?php
/**
* Template Name: Projects Page Template
*/
//$display = new Carawebs\Carawebs\Display\ProjectsPage( get_the_ID() );
$projects = new Carawebs\Carawebs\Loops\Projects();
$data = $projects->projects_data();
$ids = $projects->project_IDs();
//caradump( $data );
?>

<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/page', 'header'); ?>
  <div class="row">
    <div class="col-md-8">
      <?php get_template_part('templates/content', 'page'); ?>
    </div>
  </div>
  <?php $projects->projects_filter(); ?>
  <div id="mixitup-container" class="inline-container">
    <?php $projects->the_projects( -1, false ); ?>
    <div class="gap"></div>
    <div class="gap"></div>
  </div>
  <?php if( ! empty ( $projects->pagination_links ) ): ?>
  <div class="pagination">
    <?= $projects->pagination_links; ?>
  </div>
  <?php endif; ?>
<?php endwhile; ?>
