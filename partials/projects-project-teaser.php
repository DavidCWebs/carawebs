<?php
use Carawebs\Carawebs\Display;
$post_ID = get_the_ID();
?>
<div class="mix item<?= Display\Helpers::project_categories_class();?>" data-terms="<?= Display\Helpers::project_data_terms();?>">
  <a href="<?php the_permalink(); ?>">
    <?= Carawebs\Carawebs\Display\Image::featured_image( $post_ID, 'w800' ); ?>
  </a>

  <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
  <p><?php echo wp_trim_words( get_the_excerpt(), $num_words = 20, $more = '…' ); ?></p>
  <p><a href="<?php the_permalink(); ?>">Read More &raquo;</a></p>
  <p><i class="glyphicon glyphicon-tag"></i>&nbsp;<?php echo get_the_term_list( $post_ID, 'project-category', '', ', ', '' ) ?></p>
</div>
