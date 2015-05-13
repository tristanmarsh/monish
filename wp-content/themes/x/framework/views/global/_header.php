<?php

// =============================================================================
// VIEWS/GLOBAL/_HEADER.PHP
// -----------------------------------------------------------------------------
// Declares the DOCTYPE for the site and include the <head>.
// =============================================================================

?>

<!DOCTYPE html>
<!--[if IE 9]><html class="no-js ie9" <?php language_attributes(); ?>><![endif]-->
<!--[if gt IE 9]><!--><html class="no-js" <?php language_attributes(); ?>><!--<![endif]-->

<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php wp_title(''); ?></title>
  <link rel="profile" href="http://gmpg.org/xfn/11">
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

  <?php do_action( 'x_before_site_begin' ); ?>

  <div id="top" class="site">

  <?php do_action( 'x_after_site_begin' ); ?>