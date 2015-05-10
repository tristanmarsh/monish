<?php

// =============================================================================
// VIEWS/RENEW/_CONTENT-POST-FOOTER.PHP
// -----------------------------------------------------------------------------
// Standard <footer> output for various posts.
// =============================================================================

?>

<?php if ( has_tag() ) : ?>
  <footer class="entry-footer cf">
    <?php echo get_the_tag_list( '<p><i class="x-icon-tags"></i> Tags: ', ', ', '</p>' ); ?>
  </footer>
<?php endif; ?>