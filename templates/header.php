<?php require_once( get_template_directory() . '/lib/nav.php' ); ?>
<header class="banner navbar navbar-inverse navbar-fixed-top navbar-shrink" role="banner">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only"><?= __('Toggle navigation', 'sage'); ?></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?= esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a>
    </div>

    <nav class="collapse navbar-collapse" role="navigation">
      <?php
      if (has_nav_menu('primary_navigation')) :

        wp_nav_menu(['theme_location' => 'primary_navigation', 'walker' => new Carawebs\Carawebs\Nav\NavWalker(), 'menu_class' => 'nav navbar-nav']);

      endif;

      //wp_bootstrap_navwalker
      ?>
    </nav>
  </div>
</header>
