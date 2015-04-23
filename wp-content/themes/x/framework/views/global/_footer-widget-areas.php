<?php

// =============================================================================
// VIEWS/GLOBAL/_FOOTER-WIDGET-AREAS.PHP
// -----------------------------------------------------------------------------
// Outputs the widget areas for the footer.
// =============================================================================

$n = x_footer_widget_areas_count();

?>

<?php if ( $n != 0 ) : ?>

  <footer class="x-colophon top" role="contentinfo">
    <div class="x-container-fluid max width">
      <div class="x-row-fluid">

        <?php

        $i = 0; while ( $i < $n ) : $i++;
          switch ( $n ) {
            case 4 : $span = 'x-span3';  break;
            case 3 : $span = 'x-span4';  break;
            case 2 : $span = 'x-span6';  break;
            case 1 : $span = 'x-span12'; break;
          }
          echo '<div class="' . $span . '">';
            dynamic_sidebar( 'footer-' . $i );
          echo '</div>';
        endwhile;

        ?>

      </div> <!-- end .x-row-fluid -->
    </div> <!-- end .x-container-fluid.max.width -->
  </footer> <!-- end .x-colophon.top -->

<?php endif; ?>