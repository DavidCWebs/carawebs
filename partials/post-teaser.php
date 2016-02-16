<article <?php post_class(); ?>>
  <div class="row">
    <div class="col-md-6">
      <a href="<?php the_permalink(); ?>">
        <?= Carawebs\Carawebs\Display\Image::featured_image( get_the_ID(), 'w800', ['bottom-margin'] ); ?>
      </a>
    </div>
    <div class="col-md-6">
      <header>
        <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        <?php get_template_part('templates/entry-meta'); ?>
      </header>
      <div class="entry-summary">
        <?php //the_excerpt(); ?>
        <?php echo wp_trim_words( get_the_excerpt(), $num_words = 25, $more = '…' ); ?>
        <p><a class="btn btn-default" href="<?php the_permalink(); ?>">Read More &raquo;</a></p>
      </div>
    </div>
  </div>
</article>
