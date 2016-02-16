<?php while (have_posts()) : the_post(); ?>
  <article <?php post_class(); ?>>
    <div class="project-content">
      <header class="page-header">
        <h1 class="entry-title"><?php the_title(); ?></h1>
        <?php get_template_part('templates/entry-meta'); ?>
      </header>
      <div class="entry-content">
        <?php if ( has_excerpt() ) : ?>
          <div class="lead">
            <?php the_excerpt(); ?>
          </div><!-- .entry-summary -->
        <?php endif; ?>
        <?php the_content(); ?>
      </div>
    </div>
    <footer>
      <?php wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); ?>
    </footer>
  </article>
<?php endwhile; ?>
