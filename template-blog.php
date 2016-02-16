<?php
/**
 * Template Name: Blog Index Template
 */

while (have_posts()) : the_post();
$posts_list = new Carawebs\Carawebs\Loops\Loop();

$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
?>
  <?php get_template_part('templates/page', 'header'); ?>
  <?php
  get_template_part('templates/content', 'page');
  echo "<h3>Page $paged</h3>";
  if( ! empty ( $posts_list->pagination_links ) ) {

    ?>
    <h2>Hello</h2>
    <div class="pagination">
    <?= $posts_list->pagination_links; ?>
    </div>
    <?php

  }

  echo Carawebs\Carawebs\Display\Contact::social_follow();

  $posts_list->custom_loop( '10', true, '', '/partials/post-teaser.php' );

  ?>
  <?php if( ! empty ( $posts_list->pagination_links ) ): ?>
  <div class="pagination">
    <?= $posts_list->pagination_links; ?>
  </div>
  <?php endif; ?>
<?php endwhile; ?>
