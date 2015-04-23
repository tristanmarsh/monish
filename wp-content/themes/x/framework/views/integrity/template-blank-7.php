<?php

// =============================================================================
// VIEWS/INTEGRITY/TEMPLATE-BLANK-7.PHP (Container | No Header, Footer)
// -----------------------------------------------------------------------------
// A blank page for creating unique layouts.
// =============================================================================

?>

<?php x_get_view( 'global', '_header' ); ?>

  <?php x_get_view( 'global', '_slider-above' ); ?>
  <?php x_get_view( 'global', '_slider-below' ); ?>

  <div class="x-container-fluid max width offset cf">
    <div class="x-main full" role="main">

      <?php while ( have_posts() ) : the_post(); ?>

        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
          <div class="entry-wrap">
            <?php x_get_view( 'global', '_content', 'the-content' ); ?>
          </div>
        </article>

      <?php endwhile; ?>

    </div>
  </div>

<?php get_footer(); ?>