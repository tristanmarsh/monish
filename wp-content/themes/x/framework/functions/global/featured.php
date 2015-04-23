<?php

// =============================================================================
// FUNCTIONS/GLOBAL/FEATURED.PHP
// -----------------------------------------------------------------------------
// Handles output of featured content for different post formats (e.g. images,
// audio, video, et cetera).
// =============================================================================

// =============================================================================
// TABLE OF CONTENTS
// -----------------------------------------------------------------------------
//   01. Featured Image
//   02. Featured Gallery
//   03. Featured Audio
//   04. Featured Video
//   05. Featured Portfolio
// =============================================================================

// Featured Image
// =============================================================================

//
// Output featured image in an <a> tag on index pages and a <div> for single
// posts and pages.
//

if ( ! function_exists( 'x_featured_image' ) ) :
  function x_featured_image( $cropped = '' ) {

    $stack     = x_get_stack();
    $fullwidth = ( in_array( 'x-full-width-active', get_body_class() ) ) ? true : false;

    if ( has_post_thumbnail() ) {

      if ( $cropped == 'cropped' ) {
        if ( $fullwidth ) {
          $thumb = get_the_post_thumbnail( NULL, 'entry-' . $stack . '-cropped-fullwidth', NULL );
        } else {
          $thumb = get_the_post_thumbnail( NULL, 'entry-' . $stack . '-cropped', NULL );
        }
      } else {
        if ( $fullwidth ) {
          $thumb = get_the_post_thumbnail( NULL, 'entry-' . $stack . '-fullwidth', NULL );
        } else {
          $thumb = get_the_post_thumbnail( NULL, 'entry-' . $stack, NULL );
        }
      }

      switch ( is_singular() ) {
        case true:
          printf( '<div class="entry-thumb">%s</div>', $thumb );
          break;
        case false:
          printf( '<a href="%1$s" class="entry-thumb" title="%2$s">%3$s</a>',
            esc_url( get_permalink() ),
            esc_attr( sprintf( __( 'Permalink to: "%s"', '__x__' ), the_title_attribute( 'echo=0' ) ) ),
            $thumb
          );
          break;
      }

    }

  }
endif;



// Featured Gallery
// =============================================================================

if ( ! function_exists( 'x_featured_gallery' ) ) :
  function x_featured_gallery() {

    $stack     = x_get_stack();
    $thumb     = get_post_thumbnail_id( get_the_ID() );
    $fullwidth = ( in_array( 'x-full-width-active', get_body_class() ) ) ? true : false;

    $args = array(
      'order'          => 'ASC',
      'orderby'        => 'menu_order',
      'post_parent'    => get_the_ID(),
      'post_type'      => 'attachment',
      'post_mime_type' => 'image',
      'post_status'    => null,
      'numberposts'    => -1,
      'exclude'        => $thumb
    );

    $attachments = get_posts( $args );

    if ( $attachments ) {
      echo '<div class="x-flexslider x-flexslider-featured-gallery man"><ul class="x-slides">';
        foreach ( $attachments as $attachment ) {
          echo '<li class="x-slide">';
            if ( $fullwidth ) {
              echo wp_get_attachment_image( $attachment->ID, 'entry-' . $stack . '-fullwidth', false, false );
            } else {
              echo wp_get_attachment_image( $attachment->ID, 'entry-' . $stack, false, false );
            }
          echo '</li>';
        }
      echo '</ul></div>';
    }

  }
endif;



// Featured Audio
// =============================================================================

if ( ! function_exists( 'x_featured_audio' ) ) :
  function x_featured_audio() {

    $entry_id = get_the_ID();
    $mp3      = get_post_meta( $entry_id, '_x_audio_mp3', true );
    $ogg      = get_post_meta( $entry_id, '_x_audio_ogg', true );
    $embed    = get_post_meta( $entry_id, '_x_audio_embed', true );

    ?>

    <?php if ( $embed != '' ) { ?>

      <div class="x-responsive-audio-embed">
        <?php echo stripslashes( htmlspecialchars_decode( $embed ) ); ?>
      </div>

    <?php } else { ?>

      <script>
        jQuery(document).ready(function($){
          if($().jPlayer) {
            $('#x_jplayer_<?php echo $entry_id; ?>').jPlayer({
              ready: function () {
                $(this).jPlayer('setMedia', {
                  <?php if ( $mp3 != '' ) : ?>
                  mp3: '<?php echo $mp3; ?>',
                  <?php endif; ?>
                  <?php if ( $ogg != '' ) : ?>
                  oga: '<?php echo $ogg; ?>',
                  <?php endif; ?>
                  end: ''
                });
              },
              size: {
                width: '100%',
                height: '0'
              },
              swfPath: '<?php echo X_TEMPLATE_URL; ?>/framework/js/src/site/vendor/jplayer',
              cssSelectorAncestor: '#jp_interface_<?php echo $entry_id; ?>',
              supplied: '<?php if( $mp3 != "" ) : ?>mp3, <?php endif; ?><?php if ( $ogg != "" ) : ?>oga,<?php endif; ?> all'
            });
          }
        });
      </script>

      <div id="x_jplayer_<?php echo $entry_id; ?>" class="jp-jplayer jp-jplayer-audio"></div>
      <div class="jp-controls-container jp-controls-container-audio">
        <div id="jp_interface_<?php echo $entry_id; ?>" class="jp-interface">
          <ul class="jp-controls">
            <li><a href="#" class="jp-play" tabindex="1"><span>Play</span></a></li>
            <li><a href="#" class="jp-pause" tabindex="1"><span>Pause</span></a></li>
          </ul>
          <div class="jp-progress-container">
            <div class="jp-progress">
              <div class="jp-seek-bar">
                <div class="jp-play-bar"></div>
              </div>
            </div>
          </div>
        </div>
      </div>

    <?php } ?>

  <?php

  }
endif;



// Featured Video
// =============================================================================

if ( ! function_exists( 'x_featured_video' ) ) :
  function x_featured_video( $post_type = 'video' ) {

    $entry_id     = get_the_ID();
    $stack        = x_get_stack();
    $aspect_ratio = get_post_meta( $entry_id, '_x_' . $post_type . '_aspect_ratio', true );
    $m4v          = get_post_meta( $entry_id, '_x_' . $post_type . '_m4v', true );
    $ogv          = get_post_meta( $entry_id, '_x_' . $post_type . '_ogv', true );
    $embed        = get_post_meta( $entry_id, '_x_' . $post_type . '_embed', true );
    $fullwidth    = ( in_array( 'x-full-width-active', get_body_class() ) ) ? true : false;

    if ( $fullwidth ) {
      $poster = wp_get_attachment_image_src( get_post_thumbnail_id( $entry_id ), 'entry-' . $stack . '-fullwidth', false );
    } else {
      $poster = wp_get_attachment_image_src( get_post_thumbnail_id( $entry_id ), 'entry-' . $stack, false );
    }

    switch ( $aspect_ratio ) {
      case '16:9' :
        $aspect_ratio_class = '';
        break;
      case '5:3' :
        $aspect_ratio_class = 'five-by-three';
        break;
      case '5:4' :
        $aspect_ratio_class = 'five-by-four';
        break;
      case '4:3' :
        $aspect_ratio_class = 'four-by-three';
        break;
      case '3:2' :
        $aspect_ratio_class = 'three-by-two';
        break;
    }

    if ( $embed != '' ) {

    ?>

      <div class="x-responsive-video man">
        <div class="x-responsive-video-inner <?php echo $aspect_ratio_class; ?>">
          <?php echo stripslashes( htmlspecialchars_decode( $embed ) ); ?>
        </div>
      </div>

    <?php } else { ?>

      <script>
        jQuery(document).ready(function($){
          if($().jPlayer) {
            $('#x_jplayer_<?php echo $entry_id; ?>').jPlayer({
              ready: function () {
                $(this).jPlayer('setMedia', {
                  <?php if ( $m4v != '' ) : ?>
                  m4v: '<?php echo $m4v; ?>',
                  <?php endif; ?>
                  <?php if ( $ogv != '' ) : ?>
                  ogv: '<?php echo $ogv; ?>',
                  <?php endif; ?>
                  <?php if ( $poster != '' ) : ?>
                  poster: '<?php echo $poster[0]; ?>'
                  <?php endif; ?>
                });
              },
              size: {
                width: '100%',
                height: '100%'
              },
              swfPath: '<?php echo X_TEMPLATE_URL; ?>/framework/js/src/site/vendor/jplayer',
              cssSelectorAncestor: '#jp_interface_<?php echo $entry_id; ?>',
              supplied: '<?php if( $m4v != "" ) : ?>m4v, <?php endif; ?><?php if( $ogv != "" ) : ?>ogv<?php endif; ?>'
            });
            
            $('#x_jplayer_<?php echo $entry_id; ?>').bind($.jPlayer.event.playing, function(event) {
              $(this).add('#jp_interface_<?php echo $entry_id; ?>').hover( function() {
                $('#jp_interface_<?php echo $entry_id; ?>').stop().animate({ opacity: 1 }, 400);
              }, function() {
                $('#jp_interface_<?php echo $entry_id; ?>').stop().animate({ opacity: 0 }, 400);
              });
            });
            
            $('#x_jplayer_<?php echo $entry_id; ?>').bind($.jPlayer.event.pause, function(event) {
              $('#x_jplayer_<?php echo $entry_id; ?>').add('#jp_interface_<?php echo $entry_id; ?>').unbind('hover');
              $('#jp_interface_<?php echo $entry_id; ?>').stop().animate({ opacity: 1 }, 400);
            });
          }
        });
      </script>

      <div class="x-responsive-video man">
        <div class="x-responsive-video-inner <?php echo $aspect_ratio_class; ?>">
          <div id="x_jplayer_<?php echo $entry_id; ?>" class="jp-jplayer jp-jplayer-video"></div>
          <div class="jp-controls-container jp-controls-container-video">
            <div id="jp_interface_<?php echo $entry_id; ?>" class="jp-interface">
              <ul class="jp-controls">
                <li><a href="#" class="jp-play" tabindex="1"><span>Play</span></a></li>
                <li><a href="#" class="jp-pause" tabindex="1"><span>Pause</span></a></li>
              </ul>
              <div class="jp-progress-container">
                <div class="jp-progress">
                  <div class="jp-seek-bar">
                    <div class="jp-play-bar"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    <?php

    }
  }
endif;



// Featured Portfolio
// =============================================================================

if ( ! function_exists( 'x_featured_portfolio' ) ) :
  function x_featured_portfolio( $cropped = '' ) {

    $entry_id    = get_the_ID();
    $media       = get_post_meta( $entry_id, '_x_portfolio_media', true );
    $index_media = get_post_meta( $entry_id, '_x_portfolio_index_media', true );

    if ( is_singular() ) {
      switch ( $media ) {
        case 'Image' :
          x_featured_image();
          break;
        case 'Gallery' :
          x_featured_gallery();
          break;
        case 'Video' :
          x_featured_video( 'portfolio' );
          break;
      }
    } else {
      if ( $index_media == 'Media' ) {
        switch ( $media ) {
          case 'Image' :
            ( $cropped == 'cropped' ) ? x_featured_image( 'cropped' ) : x_featured_image();
            break;
          case 'Gallery' :
            x_featured_gallery();
            break;
          case 'Video' :
            x_featured_video( 'portfolio' );
            break;
        }
      } else {
        ( $cropped == 'cropped' ) ? x_featured_image( 'cropped' ) : x_featured_image();
      }
    }

  }
endif;