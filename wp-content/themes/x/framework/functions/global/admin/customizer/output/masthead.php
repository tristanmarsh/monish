<?php
 
// =============================================================================
// FUNCTIONS/GLOBAL/ADMIN/CUSTOMIZER/OUTPUT/MASTHEAD.PHP
// -----------------------------------------------------------------------------
// Global CSS output for the masthead.
// =============================================================================

// =============================================================================
// TABLE OF CONTENTS
// -----------------------------------------------------------------------------
//   01. Body Layout
//   02. Widgetbar
//   03. Navbar
//   04. Navbar - Wrapper
//   05. Navbar - Inner Container
//   06. Navbar - Logo and Navigation Layout
//   07. Navbar - Brand
//   08. Navbar - Navigation
//   09. Responsive Styling
// =============================================================================

?>

/* Body Layout
// ========================================================================== */

<?php if ( $x_navbar_positioning == 'fixed-left' ) : ?>

  body.x-navbar-fixed-left-active {
    padding-left: <?php echo $x_navbar_width . 'px'; ?>;
  }

<?php endif; ?>

<?php if ( $x_navbar_positioning == 'fixed-right' ) : ?>

  body.x-navbar-fixed-right-active {
    padding-right: <?php echo $x_navbar_width . 'px'; ?>;
  }

<?php endif; ?>



/* Widgetbar
// ========================================================================== */

<?php if ( $x_header_widget_areas != 0 ) : ?>

  .x-btn-widgetbar {
    border-top-color: <?php echo $x_widgetbar_button_background; ?>;
    border-right-color: <?php echo $x_widgetbar_button_background; ?>;
  }

  .x-btn-widgetbar:hover {
    border-top-color: <?php echo $x_widgetbar_button_background_hover; ?>;
    border-right-color: <?php echo $x_widgetbar_button_background_hover; ?>;
  }

<?php endif; ?>



/* Navbar
// ========================================================================== */

.x-navbar {
  font-size: <?php echo $x_navbar_font_size . 'px'; ?>;
}

<?php if ( $x_navbar_positioning == 'fixed-left' || $x_navbar_positioning == 'fixed-right' ) : ?>

  .x-navbar {
    width: <?php echo $x_navbar_width . 'px'; ?>;
  }

<?php endif; ?>



/* Navbar - Wrapper
// ========================================================================== */

<?php if ( $x_navbar_positioning == 'fixed-top' ) : ?>

  body.x-navbar-fixed-top-active .x-navbar-wrap {
    height: <?php echo $x_navbar_height . 'px'; ?>;
  }

<?php endif; ?>



/* Navbar - Inner Container
// ========================================================================== */

.x-navbar-inner {
  min-height: <?php echo $x_navbar_height . 'px'; ?>;
}



/* Navbar - Logo and Navigation Layout
// ========================================================================== */

<?php if ( $x_logo_navigation_layout == 'stacked' ) : ?>

  .x-logobar-inner {
    padding-top: <?php echo $x_logobar_adjust_spacing_top . 'px'; ?>;
    padding-bottom: <?php echo $x_logobar_adjust_spacing_bottom . 'px'; ?>;
  }

<?php endif; ?>



/* Navbar - Brand
// ========================================================================== */

.x-brand {
  font-size: <?php echo $x_logo_font_size . 'px'; ?>;
  font-size: <?php echo $x_logo_font_size / 10 . 'rem'; ?>;
}

<?php if ( $x_navbar_positioning == 'static-top' || $x_navbar_positioning == 'fixed-top' ) : ?>

  .x-navbar .x-brand {
    margin-top: <?php echo $x_logo_adjust_navbar_top . 'px'; ?>;
  }

<?php endif; ?>

<?php if ( $x_navbar_positioning == 'fixed-left' || $x_navbar_positioning == 'fixed-right' ) : ?>

  .x-navbar .x-brand {
    margin-top: <?php echo $x_logo_adjust_navbar_side . 'px'; ?>;
  }

<?php endif; ?>



/* Navbar - Navigation
// ========================================================================== */

.x-navbar .x-nav > li > a {
  font-style: <?php echo ( $x_navbar_font_is_italic ) ? 'italic' : 'normal'; ?>;
  font-weight: <?php echo $x_navbar_font_weight; ?>;
  <?php if ( x_get_option( 'x_navbar_uppercase_enable', '' ) == '1' ) : ?>
    text-transform: uppercase;
  <?php endif; ?>
}

.x-btn-navbar {
  margin-top: <?php echo $x_navbar_adjust_button . 'px'; ?>;;
}

.x-btn-navbar,
.x-btn-navbar.collapsed {
  font-size: <?php echo $x_navbar_adjust_button_size . 'px'; ?>;
}



/* Responsive Styling
// ========================================================================== */

@media (max-width: 979px) {

  <?php if ( $x_navbar_positioning == 'fixed-left' || $x_navbar_positioning == 'fixed-right' ) : ?>

    body.x-navbar-fixed-left-active,
    body.x-navbar-fixed-right-active {
      padding: 0;
    }

    .x-navbar {
      width: auto;
    }

    .x-navbar .x-brand {
      margin-top: <?php echo $x_logo_adjust_navbar_top . 'px'; ?>;
    }

  <?php endif; ?>

  <?php if ( $x_navbar_positioning == 'fixed-top' ) : ?>

    body.x-navbar-fixed-top-active .x-navbar-wrap {
      height: auto;
    }

  <?php endif; ?>

}