<?php
/**
 * Template Name: Front Page
 */

while (have_posts()) : the_post();

$flexible_content = new Carawebs\Carawebs\Display\Dynamic( get_the_ID() );

// The flexible layout
$flexible_content->the_flexible_content();
get_template_part('templates/content', 'page');

endwhile; ?>
