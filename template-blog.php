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
  if ( '1' == $paged ) {

    get_template_part('templates/content', 'page');

  } else {

    echo "<h3>Page $paged of our blog</h3>";

  }

  echo Carawebs\Carawebs\Display\Helpers::social_follow();
  echo "<hr>";

  $posts_list->custom_loop( '3', true, '', '/partials/post-teaser.php' );

  ?>
  <?php if( ! empty ( $posts_list->pagination_links ) ): ?>
  <div class="pagination">
    <?= $posts_list->pagination_links; ?>
  </div>
  <?php endif; ?>
<?php endwhile; ?>
