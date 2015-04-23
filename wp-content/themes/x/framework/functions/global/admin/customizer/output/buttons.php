<?php
 
// =============================================================================
// FUNCTIONS/GLOBAL/ADMIN/CUSTOMIZER/OUTPUT/BUTTONS.PHP
// -----------------------------------------------------------------------------
// Global CSS output for buttons.
// =============================================================================

// =============================================================================
// TABLE OF CONTENTS
// -----------------------------------------------------------------------------
//   01. Base Styles
//   02. Button Style - Real
//   03. Button Style - Flat
//   04. Button Style - Transparent
//   05. Button Circle
//   06. Global Style
//   07. Global Shape
//   08. Global Size
// =============================================================================

?>

/* Base Styles
// ========================================================================== */

.x-btn,
.button,
[type="submit"] {
  color: <?php echo $x_button_color; ?>;
  border-color: <?php echo $x_button_border_color; ?>;
  background-color: <?php echo $x_button_background_color; ?>;
}

.x-btn:hover,
.button:hover,
[type="submit"]:hover {
  color: <?php echo $x_button_color_hover; ?>;
  border-color: <?php echo $x_button_border_color_hover; ?>;
  background-color: <?php echo $x_button_background_color_hover; ?>;
}



/* Button Style - Real
// ========================================================================== */

.x-btn.x-btn-real,
.x-btn.x-btn-real:hover {
  margin-bottom: 0.25em;
  text-shadow: 0 0.075em 0.075em rgba(0, 0, 0, 0.65);
}

.x-btn.x-btn-real {
  box-shadow: 0 0.25em 0 0 <?php echo $x_button_bottom_color; ?>, 0 4px 9px rgba(0, 0, 0, 0.75);
}

.x-btn.x-btn-real:hover {
  box-shadow: 0 0.25em 0 0 <?php echo $x_button_bottom_color_hover; ?>, 0 4px 9px rgba(0, 0, 0, 0.75);
}



/* Button Style - Flat
// ========================================================================== */

.x-btn.x-btn-flat,
.x-btn.x-btn-flat:hover {
  margin-bottom: 0;
  text-shadow: 0 0.075em 0.075em rgba(0, 0, 0, 0.65);
  box-shadow: none;
}



/* Button Style - Transparent
// ========================================================================== */

.x-btn.x-btn-transparent,
.x-btn.x-btn-transparent:hover {
  margin-bottom: 0;
  border-width: 3px;
  text-shadow: none;
  text-transform: uppercase;
  background-color: transparent;
  box-shadow: none;
}



/* Button Circle
// ========================================================================== */

.x-btn-circle-wrap:before {
  width: 172px;
  height: 43px;
  background: url(<?php echo X_TEMPLATE_URL; ?>/framework/img/global/btn-circle-top-small.png) center center no-repeat;
  -webkit-background-size: 172px 43px;
          background-size: 172px 43px;
}

.x-btn-circle-wrap:after {
  width: 190px;
  height: 43px;
  background: url(<?php echo X_TEMPLATE_URL; ?>/framework/img/global/btn-circle-bottom-small.png) center center no-repeat;
  -webkit-background-size: 190px 43px;
          background-size: 190px 43px;
}



/* Global Style
// ========================================================================== */

<?php if ( $x_button_style == 'real' ) : ?>

  .x-btn,
  .x-btn:hover,
  .button,
  .button:hover,
  [type="submit"],
  [type="submit"]:hover {
    margin-bottom: 0.25em;
    text-shadow: 0 0.075em 0.075em rgba(0, 0, 0, 0.5);
  }

  .x-btn,
  .button,
  [type="submit"] {
    box-shadow: 0 0.25em 0 0 <?php echo $x_button_bottom_color; ?>, 0 4px 9px rgba(0, 0, 0, 0.75);
  }

  .x-btn:hover,
  .button:hover,
  [type="submit"]:hover {
    box-shadow: 0 0.25em 0 0 <?php echo $x_button_bottom_color_hover; ?>, 0 4px 9px rgba(0, 0, 0, 0.75);
  }

<?php elseif ( $x_button_style == 'flat' ) : ?>

  .x-btn,
  .x-btn:hover,
  .button,
  .button:hover,
  [type="submit"],
  [type="submit"]:hover {
    text-shadow: 0 0.075em 0.075em rgba(0, 0, 0, 0.5);
  }

<?php elseif ( $x_button_style == 'transparent' ) : ?>

  .x-btn,
  .x-btn:hover,
  .button,
  .button:hover,
  [type="submit"],
  [type="submit"]:hover {
    border-width: 3px;
    text-transform: uppercase;
    background-color: transparent;
  }

<?php endif; ?>



/* Global Shape
// ========================================================================== */

<?php if ( $x_button_shape == 'rounded' ) : ?>

  .x-btn,
  .button,
  [type="submit"] {
    border-radius: 0.25em;
  }

<?php elseif ( $x_button_shape == 'pill' ) : ?>

  .x-btn,
  .button,
  [type="submit"] {
    border-radius: 100em;
  }

<?php endif; ?>



/* Global Size
// ========================================================================== */

<?php if ( $x_button_size == 'mini' ) : ?>

  .x-btn,
  .button,
  [type="submit"] {
    padding: 0.385em 0.923em 0.538em;
    font-size: 13px;
    font-size: 1.3rem;
  }

<?php elseif ( $x_button_size == 'small' ) : ?>

  .x-btn,
  .button,
  [type="submit"] {
    padding: 0.429em 1.143em 0.643em;
    font-size: 14px;
    font-size: 1.4rem;
  }

<?php elseif ( $x_button_size == 'large' ) : ?>

  .x-btn,
  .button,
  [type="submit"] {
    padding: 0.579em 1.105em 0.842em;
    font-size: 19px;
    font-size: 1.9rem;
  }

<?php elseif ( $x_button_size == 'x-large' ) : ?>

  .x-btn,
  .button,
  [type="submit"] {
    padding: 0.714em 1.286em 0.952em;
    font-size: 21px;
    font-size: 2.1rem;
  }

<?php elseif ( $x_button_size == 'jumbo' ) : ?>

  .x-btn,
  .button,
  [type="submit"] {
    padding: 0.643em 1.429em 0.857em;
    font-size: 28px;
    font-size: 2.8rem;
  }

<?php endif; ?>