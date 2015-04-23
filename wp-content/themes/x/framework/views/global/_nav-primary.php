<?php

// =============================================================================
// VIEWS/GLOBAL/_NAV-PRIMARY.PHP
// -----------------------------------------------------------------------------
// Outputs the primary nav.
// =============================================================================

?>

<a href="#" class="x-btn-navbar collapsed" data-toggle="collapse" data-target=".x-nav-collapse">
  <i class="x-icon-bars"></i><span class="visually-hidden"><?php _e( 'Navigation', '__x__' ); ?></span>
</a>

<nav class="x-nav-collapse collapse" role="navigation">

  <?php

  if ( x_is_one_page_navigation() ) :
    wp_nav_menu( array(
      'menu'       => x_get_one_page_navigation_menu(),
      'container'  => false,
      'menu_class' => 'x-nav x-nav-scrollspy sf-menu'
    ) );
  elseif ( has_nav_menu( 'primary' ) ) :
    wp_nav_menu( array(
      'theme_location' => 'primary',
      'container'      => false,
      'menu_class'     => 'x-nav sf-menu',
    ) );
  else :
    echo '<ul class="x-nav"><li><a href="' . home_url( '/' ) . 'wp-admin/nav-menus.php">Assign a Menu</a></li></ul>';
  endif;

  ?>

</nav> <!-- end .x-nav-collapse.collapse -->