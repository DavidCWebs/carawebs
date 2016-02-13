<?php
/**
 * Template Name: Elaine
 *
 */
?>

<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/page', 'header'); ?>
  <?php echo Carawebs\Carawebs\Display\Helpers::services_ul(); ?>
  <div class="well">
    <h2><?php the_title(); ?></h2>
  </div>
  <?php get_template_part('templates/content', 'page'); ?>
<?php endwhile; ?>
