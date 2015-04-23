<?php

// =============================================================================
// VIEWS/GLOBAL/_SCRIPT-ISOTOPE-INDEX.PHP
// -----------------------------------------------------------------------------
// Isotope script call for index output.
// =============================================================================

?>

<script>

  jQuery(document).ready(function($){

    var $container = $('#x-iso-container');

    $container.before('<span id="x-isotope-loading"><span>');

    $(window).load(function(){
      $container.isotope({
        itemSelector   : '.x-iso-container > .hentry',
        resizable      : true,
        filter         : '*',
        containerStyle : {
          overflow : 'hidden',
          position : 'relative'
        }
      });
      $('#x-isotope-loading').stop(true,true).fadeOut(300);
      $('#x-iso-container .hentry').each(function(i){
        $(this).delay(i*150).animate({'opacity':1},300);
      });
    });

    $(window).smartresize(function(){
      $container.isotope({  });
    });

  });

</script>