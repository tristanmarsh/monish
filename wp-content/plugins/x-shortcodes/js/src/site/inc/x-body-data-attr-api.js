// =============================================================================
// JS/SRC/SITE/INC/X-BODY-DATA-ATTR-API.JS
// -----------------------------------------------------------------------------
// Sets up the data attribute API used by certain X shortcodes to ease the
// implementation of specific functionality.
// =============================================================================

// =============================================================================
// TABLE OF CONTENTS
// -----------------------------------------------------------------------------
//   01. Data Attribute API
// =============================================================================

// Data Attribute API
// =============================================================================

window.xData = window.xData || {};

(function(exports, $) {

  var base;
  var api;  


  //
  // API to map a callback to an element.
  //

  api = {

    map: function( elementName, callback ) {
      base.mappedFunctions[elementName] = callback;
    },

    process: function() {
      $(base).trigger('ready');
    }

  };


  //
  // The core of the data API. Searches the DOM for uninitialized elements and
  // initializes them with their respective mapped function.
  //

  base = {

    mappedFunctions: [],

    init: function() {
      $(this).on('ready', this.processElements);
    },

    processElements: function() {

      //
      // 1. Find X elements.
      // 2. Filter out anything already processed.
      // 3. Grab the parameters passed along from PHP.
      // 4. Locate the mapped callback for this element.
      // 5. Execute callback.
      // 6. Mark this element as initialized, preventing it from being
      //    processed in the future.
      //

      $elements = $('[data-x-element]').each(function(index, element) { // 1

        if( ! $(element).data('x-initialized') ) { // 2

          var params = $(element).data('x-params') || {};               // 3
          callback = base.lookupCallback($(element).data('x-element')); // 4
          callback(element, params);                                    // 5
          $(element).data('x-initialized', true);                       // 6

        }

      });

    },

    lookupCallback: function( elementName ) {
      return this.mappedFunctions[elementName] || function() { console.log('X element not found.'); };
    }

  };

  base.init();


  //
  // Process all elements on $.ready. Call xData.api.process() to reprocess
  // page when needed.
  //

  $(function($) {
    api.process();
  });

  exports.base = base;
  exports.api  = api;
  exports.fn   = {};

})( xData, jQuery );