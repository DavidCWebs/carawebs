<?php
if ( is_singular( 'project' ) ) {

  include( get_template_directory() . '/templates/sidebar-project.php' );

} else {

  dynamic_sidebar('sidebar-primary');

}
?>
