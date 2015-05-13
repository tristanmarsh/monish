<?php

// =============================================================================
// FUNCTIONS/GLOBAL/PLUGINS/WOOCOMMERCE.PHP
// -----------------------------------------------------------------------------
// Plugin setup for theme compatibility.
// =============================================================================

// =============================================================================
// TABLE OF CONTENTS
// -----------------------------------------------------------------------------
//   01. Remove Default Wrapper
//   02. Remove Page Title
//   03. Image Sizes
//   04. Shop Link
//   05. Shop Thumbnail
//   06. Product Large Thumbnail Size
//   07. Product Small Thumbnail Size
//   08. Remove Product Sale Badge
//   09. Add Shop Wrapper
//   10. Add Product Wrapper
//   11. Remove Rating
//   12. Shop Columns
//   13. Shop Posts Per Page
//   14. Remove Add to Cart Button
//   15. Related Products Output
//   16. Upsells Output
//   17. Add/Remove Product Tabs
//   18. Cart No Shipping Available HTML
//   19. Remove Plugin Settings
// =============================================================================

// Remove Default Wrapper
// =============================================================================

remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );



// Remove Page Title
// =============================================================================

function x_woocommerce_show_page_title() {
  return false;
}

add_filter( 'woocommerce_show_page_title', 'x_woocommerce_show_page_title' );



// Image Sizes.
// =============================================================================

//
// 1. Product category thumbs.
// 2. Single product thumbs.
// 3. Image gallery thumbs.
//

GLOBAL $pagenow;

function x_woocommerce_image_dimensions() {
  $catalog = array(
    'width'  => '258',
    'height' => '275',
    'crop'   => 1
  );

  $single = array(
    'width'  => '450',
    'height' => '470',
    'crop'   => 1
  );

  $thumbnail = array(
    'width'  => '100',
    'height' => '100',
    'crop'   => 1
  );

  update_option( 'shop_catalog_image_size', $catalog ); // 1
  update_option( 'shop_single_image_size', $single ); // 2
  update_option( 'shop_thumbnail_image_size', $thumbnail ); // 3
}

if ( is_admin() && isset( $_GET['activated'] ) && $pagenow == 'themes.php' ) {
  add_action( 'init', 'x_woocommerce_image_dimensions', 1 );
}



// Get Shop Link
// =============================================================================

function x_get_shop_link() {

  $link = get_permalink( woocommerce_get_page_id( 'shop' ) );

  return $link;

}



// Shop Thumbnail
// =============================================================================

//
// $stack_shop_thumb = 'shop_catalog' and woocommerce_get_product_thumbnail()
// can be used as well to echo out the thumbnail.
//

function x_woocommerce_shop_thumbnail() {

  GLOBAL $product;

  $id     = get_the_ID();
  $thumb  = 'entry';
  $rating = $product->get_rating_html();

  woocommerce_show_product_sale_flash();
  echo '<div class="entry-featured">';
    echo '<a href="' . get_the_permalink() . '">';
      echo get_the_post_thumbnail( $id, $thumb );
      if ( ! empty( $rating ) ) {
        echo '<div class="star-rating-container aggregate">' . $rating . '</div>';
      }
    echo '</a>';
  echo "</div>";

}

remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 );
add_action( 'woocommerce_before_shop_loop_item_title', 'x_woocommerce_shop_thumbnail', 10 );



// Product Large Thumbnail Size
// =============================================================================

function x_woocommerce_single_product_large_thumbnail_size() {
  return 'entry';
}

add_filter( 'single_product_large_thumbnail_size', 'x_woocommerce_single_product_large_thumbnail_size' );



// Product Small Thumbnail Size
// =============================================================================

function x_woocommerce_single_product_small_thumbnail_size() {
  return 'shop_single';
}

add_filter( 'single_product_small_thumbnail_size', 'x_woocommerce_single_product_small_thumbnail_size' );



// Remove Product Sale Badge
// =============================================================================

remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10 );
remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10 );



// Add Shop Wrapper
// =============================================================================

function x_woocommerce_before_shop_loop_item() {
  echo '<div class="entry-product">';
}

function x_woocommerce_after_shop_loop_item() {
  echo '</div>';
}

function x_woocommerce_before_shop_loop_item_title() {
  echo '<div class="entry-wrap"><header class="entry-header">';
}

function x_woocommerce_after_shop_loop_item_title() {
  woocommerce_get_template( 'loop/add-to-cart.php' );
  echo '</header></div>';
}

add_action( 'woocommerce_before_shop_loop_item', 'x_woocommerce_before_shop_loop_item', 10 );
add_action( 'woocommerce_after_shop_loop_item', 'x_woocommerce_after_shop_loop_item', 10 );
add_action( 'woocommerce_before_shop_loop_item_title', 'x_woocommerce_before_shop_loop_item_title', 10 );
add_action( 'woocommerce_after_shop_loop_item_title', 'x_woocommerce_after_shop_loop_item_title', 10 );



// Add Product Wrapper
// =============================================================================

function x_woocommerce_before_single_product() {
  echo '<div class="entry-wrap"><div class="entry-content">';
}

function x_woocommerce_after_single_product() {
  echo '</div></div>';
}

add_action( 'woocommerce_before_single_product', 'x_woocommerce_before_single_product', 10 );
add_action( 'woocommerce_after_single_product', 'x_woocommerce_after_single_product', 10 );



// Remove Rating
// =============================================================================

remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );



// Shop Columns
// =============================================================================

function x_woocommerce_shop_columns() {
  return x_get_option( 'x_woocommerce_shop_columns', '3' );
}

add_filter( 'loop_shop_columns', 'x_woocommerce_shop_columns' );



// Shop Posts Per Page
// =============================================================================

function x_woocommerce_shop_posts_per_page() {
  return x_get_option( 'x_woocommerce_shop_count', '12' );
}

add_filter( 'loop_shop_per_page', 'x_woocommerce_shop_posts_per_page' );



// Remove Add to Cart Button
// =============================================================================

remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );



// Related Products Output
// =============================================================================

function x_woocommerce_output_related_products() {

  $count   = x_get_option( 'x_woocommerce_product_related_count', '4' );
  $columns = x_get_option( 'x_woocommerce_product_related_columns', '4' );

  $args = array(
    'posts_per_page' => $count,
    'columns'        => $columns,
    'orderby'        => 'rand'
  );

  woocommerce_related_products( $args, true, true );

}

remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
remove_action( 'woocommerce_after_single_product', 'woocommerce_output_related_products', 10 );
add_action( 'woocommerce_after_single_product_summary', 'x_woocommerce_output_related_products', 20 );



// Upsells Output
// =============================================================================

function x_woocommerce_output_upsells() {

  $count   = x_get_option( 'x_woocommerce_product_upsell_count', '4' );
  $columns = x_get_option( 'x_woocommerce_product_upsell_columns', '4' );

  woocommerce_upsell_display( $count, $columns, 'rand' );

}

remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );
remove_action( 'woocommerce_after_single_product', 'woocommerce_upsell_display', 10 );
add_action( 'woocommerce_after_single_product_summary', 'x_woocommerce_output_upsells', 21 );



// Add/Remove Product Tabs
// =============================================================================
 
function x_woocommerce_add_remove_product_tabs( $tabs ) {

  if ( x_get_option( 'x_woocommerce_product_tab_description_enable', '1' ) == '' ) {
    unset( $tabs['description'] );
  }

  if ( x_get_option( 'x_woocommerce_product_tab_additional_info_enable', '1' ) == '' ) {
    unset( $tabs['additional_information'] );
  }

  if ( x_get_option( 'x_woocommerce_product_tab_reviews_enable', '1' ) == '' ) {
    unset( $tabs['reviews'] );
  }

  return $tabs;

}

add_filter( 'woocommerce_product_tabs', 'x_woocommerce_add_remove_product_tabs', 98 );



// Cart No Shipping Available HTML
// =============================================================================

function x_woocommerce_cart_no_shipping_available_html() {

  if ( is_cart() ) {
    return '<div class="woocommerce-info x-alert x-alert-info x-alert-block"><p>' . __( 'There doesn&lsquo;t seem to be any available shipping methods. Please double check your address, or contact us if you need any help.', '__x__' ) . '</p></div>';
  } else {
    return '<p>' . __( 'There doesn&lsquo;t seem to be any available shipping methods. Please double check your address, or contact us if you need any help.', '__x__' ) . '</p>';
  }

}

add_filter( 'woocommerce_cart_no_shipping_available_html', 'x_woocommerce_cart_no_shipping_available_html' );



// Remove Plugin Settings
// =============================================================================

function x_woocommerce_remove_plugin_settings( $settings ) {

  foreach ( $settings as $key => $setting ) {

    $id = $setting['id'];

    if ( $id == 'image_options' || $id == 'shop_catalog_image_size' || $id == 'shop_single_image_size' || $id == 'shop_thumbnail_image_size' ) {
      unset( $settings[$key] );
    }

  }

  return $settings;

}

add_filter( 'woocommerce_product_settings', 'x_woocommerce_remove_plugin_settings', 10 );