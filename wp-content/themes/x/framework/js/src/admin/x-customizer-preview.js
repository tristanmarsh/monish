// =============================================================================
// JS/ADMIN/X-CUSTOMIZER-PREVIEW.JS
// -----------------------------------------------------------------------------
// Customizer control handling.
// =============================================================================

// =============================================================================
// TABLE OF CONTENTS
// -----------------------------------------------------------------------------
//   01. Customizer Control Handling
// =============================================================================

// Customizer Control Handling
// =============================================================================

( function( $ ) {

  //
  // Integrity.
  //

  // wp.customize( 'x_integrity_layout_site', function( value ) {
  //   value.bind( function( newval ) {
  //     if ( newval === 'full-width' ) {
  //       $( '.x-integrity' ).addClass( 'x-full-width-layout-active' );
  //       $( '.x-integrity' ).removeClass( 'x-boxed-layout-active' );
  //     } else if ( newval === 'boxed' ) {
  //       $( '.x-integrity' ).addClass( 'x-boxed-layout-active' );
  //       $( '.x-integrity' ).removeClass( 'x-full-width-layout-active' );
  //     }
  //   } );
  // } );

  wp.customize( 'x_integrity_sizing_site_max_width', function( value ) {
    value.bind( function( newval ) {
      $( '.x-integrity .x-container-fluid.max' ).css( 'max-width', newval + 'px' );
      $( '.x-integrity.x-boxed-layout-active .site' ).css( 'max-width', newval + 'px' );
    } );
  } );

  wp.customize( 'x_integrity_sizing_site_width', function( value ) {
    value.bind( function( newval ) {
      $( '.x-integrity .x-container-fluid.width' ).css( 'width', newval + '%' );
      $( '.x-integrity.x-boxed-layout-active .site' ).css( 'width', newval + '%' );
    } );
  } );

  wp.customize( 'x_integrity_sizing_content_width', function( value ) {
    value.bind( function( newval ) {
      $( '.x-integrity.x-content-sidebar-active .x-main' ).css( 'width', newval - 2.463055 + '%' );
      $( '.x-integrity.x-sidebar-content-active .x-main' ).css( 'width', newval - 2.463055 + '%' );
      $( '.x-integrity.x-content-sidebar-active .x-sidebar' ).css( 'width', 100 - 2.463055 - newval + '%' );
      $( '.x-integrity.x-sidebar-content-active .x-sidebar' ).css( 'width', 100 - 2.463055 - newval + '%' );
    } );
  } );

  wp.customize( 'x_integrity_light_bg_color', function( value ) {
    value.bind( function( newval ) {
      $( '.x-integrity.x-integrity-light' ).css( 'background-color', newval );
    } );
  } );

  wp.customize( 'x_integrity_dark_bg_color', function( value ) {
    value.bind( function( newval ) {
      $( '.x-integrity.x-integrity-dark' ).css( 'background-color', newval );
    } );
  } );

  wp.customize( 'x_integrity_blog_title', function( value ) {
    value.bind( function( newval ) {
      $( '.x-integrity.blog .h-landmark span' ).html( newval );
      $( '.x-integrity.blog .x-breadcrumbs .current' ).html( newval );
    } );
  } );

  wp.customize( 'x_integrity_blog_subtitle', function( value ) {
    value.bind( function( newval ) {
      $( '.x-integrity.blog .p-landmark-sub span' ).html( newval );
    } );
  } );

  wp.customize( 'x_integrity_portfolio_archive_sort_button_text', function( value ) {
    value.bind( function( newval ) {
      $( '.x-integrity.page-template-template-layout-portfolio-php .x-portfolio-filters span' ).html( newval );
    } );
  } );

  wp.customize( 'x_integrity_shop_title', function( value ) {
    value.bind( function( newval ) {
      $( '.x-integrity.post-type-archive-product .h-landmark span' ).html( newval );
      $( '.x-integrity.post-type-archive-product .x-breadcrumbs .current' ).html( newval );
    } );
  } );

  wp.customize( 'x_integrity_shop_subtitle', function( value ) {
    value.bind( function( newval ) {
      $( '.x-integrity.post-type-archive-product .p-landmark-sub span' ).html( newval );
    } );
  } );


  //
  // Renew.
  //

  wp.customize( 'x_renew_sizing_site_max_width', function( value ) {
    value.bind( function( newval ) {
      $( '.x-renew .x-container-fluid.max' ).css( 'max-width', newval + 'px' );
      $( '.x-renew.x-boxed-layout-active .site' ).css( 'max-width', newval + 'px' );
    } );
  } );

  wp.customize( 'x_renew_sizing_site_width', function( value ) {
    value.bind( function( newval ) {
      $( '.x-renew .x-container-fluid.width' ).css( 'width', newval + '%' );
      $( '.x-renew.x-boxed-layout-active .site' ).css( 'width', newval + '%' );
    } );
  } );

  wp.customize( 'x_renew_sizing_content_width', function( value ) {
    value.bind( function( newval ) {
      $( '.x-renew.x-content-sidebar-active .x-main' ).css( 'width', newval - 3.20197 + '%' );
      $( '.x-renew.x-sidebar-content-active .x-main' ).css( 'width', newval - 3.20197 + '%' );
      $( '.x-renew.x-content-sidebar-active .x-sidebar' ).css( 'width', 100 - 3.20197 - newval + '%' );
      $( '.x-renew.x-sidebar-content-active .x-sidebar' ).css( 'width', 100 - 3.20197 - newval + '%' );
    } );
  } );

  wp.customize( 'x_renew_bg_color', function( value ) {
    value.bind( function( newval ) {
      $( '.x-renew' ).css( 'background-color', newval );
    } );
  } );

  wp.customize( 'x_renew_blog_title', function( value ) {
    value.bind( function( newval ) {
      $( '.x-renew.blog .h-landmark span' ).html( newval );
      $( '.x-renew.blog .x-breadcrumbs .current' ).html( newval );
    } );
  } );

  wp.customize( 'x_renew_shop_title', function( value ) {
    value.bind( function( newval ) {
      $( '.x-renew.post-type-archive-product .h-landmark span' ).html( newval );
      $( '.x-renew.post-type-archive-product .x-breadcrumbs .current' ).html( newval );
    } );
  } );


  //
  // Icon.
  //

  wp.customize( 'x_icon_sizing_site_max_width', function( value ) {
    value.bind( function( newval ) {
      $( '.x-icon .x-container-fluid.max' ).css( 'max-width', newval + 'px' );
      $( '.x-icon.x-boxed-layout-active .site' ).css( 'max-width', newval + 'px' );
    } );
  } );

  wp.customize( 'x_icon_sizing_site_width', function( value ) {
    value.bind( function( newval ) {
      $( '.x-icon .x-container-fluid.width' ).css( 'width', newval + '%' );
      $( '.x-icon.x-boxed-layout-active .site' ).css( 'width', newval + '%' );
    } );
  } );

  wp.customize( 'x_icon_bg_color', function( value ) {
    value.bind( function( newval ) {
      $( '.x-icon' ).css( 'background-color', newval );
    } );
  } );

  wp.customize( 'x_icon_shop_title', function( value ) {
    value.bind( function( newval ) {
      $( '.x-icon.post-type-archive-product .entry-title' ).html( newval );
      $( '.x-icon.post-type-archive-product .x-breadcrumbs .current' ).html( newval );
    } );
  } );


  //
  // Ethos.
  //

  wp.customize( 'x_ethos_sizing_site_max_width', function( value ) {
    value.bind( function( newval ) {
      $( '.x-ethos .x-container-fluid.max' ).css( 'max-width', newval + 'px' );
      $( '.x-ethos.x-boxed-layout-active .site' ).css( 'max-width', newval + 'px' );
    } );
  } );

  wp.customize( 'x_ethos_sizing_site_width', function( value ) {
    value.bind( function( newval ) {
      $( '.x-ethos .x-container-fluid.width' ).css( 'width', newval + '%' );
      $( '.x-ethos.x-boxed-layout-active .site' ).css( 'width', newval + '%' );
    } );
  } );

  wp.customize( 'x_ethos_sizing_content_width', function( value ) {
    value.bind( function( newval ) {
      $( '.x-ethos.x-content-sidebar-active .x-container-fluid.main:before' ).css( 'right', 100 - newval + '%' );
      $( '.x-ethos.x-sidebar-content-active .x-container-fluid.main:before' ).css( 'left', 100 - newval + '%' );
      $( '.x-ethos.x-content-sidebar-active .x-main' ).css( 'width', newval + '%' );
      $( '.x-ethos.x-sidebar-content-active .x-main' ).css( 'width', newval + '%' );
      $( '.x-ethos.x-content-sidebar-active .x-sidebar' ).css( 'width', 100 - newval + '%' );
      $( '.x-ethos.x-sidebar-content-active .x-sidebar' ).css( 'width', 100 - newval + '%' );
      $( '.x-ethos.x-content-sidebar-active .x-post-slider' ).css( 'padding-right', 100 - newval + '%' );
      $( '.x-ethos.x-sidebar-content-active .x-post-slider' ).css( 'padding-left', 100 - newval + '%' );
      $( '.x-ethos .x-post-slider .x-post-slider-control-nav' ).css( 'width', 100 - newval + '%' );
    } );
  } );

  wp.customize( 'x_ethos_bg_color', function( value ) {
    value.bind( function( newval ) {
      $( '.x-ethos' ).css( 'background-color', newval );
    } );
  } );

} )( jQuery );