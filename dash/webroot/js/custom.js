/*
Name:     custom.js
Author:     Team Dash
Author URI: http://wiki.tristanmarsh.net/dash/
Purpose:    All custom scripting for Monish Dashboard
Since:      31/7/15
Note:       This file prepends multiple javascript libraries using Codekit!
Prepends:   Jquery, bootstrap, NProgress, wow
*/

// jQuery(document).ready(function($) {
//  new WOW().init();
// });


// jQuery(window).load(function($) {
//  NProgress.done();
// });

//This is supposed to apply and remove the style when the scrollbar is not at the top and back at the top, respectively
//Note to self. Remove all CDN stuff. fonts/etc/
// $(document).ready(function() {
//  window.console.log('go');
//  $('.header').css('box-shadow', '0 5px 10px 0px rgba(118, 170, 219, 0.8)');
// })(jQuery);


// #### COOKIES ####
function setCookie(cname, cvalue, exhours) {
  var d = new Date();
  d.setTime(d.getTime() + (exhours*60*60*1000));
  var expires = "expires="+d.toUTCString();
  document.cookie = cname + "=" + cvalue + "; " + expires;
}

function getCookie(cname) {
  var name = cname + "=";
  var ca = document.cookie.split(';');
  for (var i=0; i<ca.length; i++) {
    var c = ca[i];
    while (c.charAt(0) === ' ') {
      c = c.substring(1);
    }
    if (c.indexOf(name) === 0) {
      return c.substring(name.length, c.length);
    }
  }
  return "";
}

$(document).ready(function() {
  $('#navigation-toggle').on('click', '#navigation-toggle', function(event) {
  // event.preventDefault();
  /* Act on the event */
  if (getCookie('navigation') == 'active') {
    setCookie('navigation','inactive', 24);
    window.console.log('cookie set to innactive');
  } else {
    setCookie('navigation','active', 24);
    window.console.log('cookie set to active');
  }
  });
}(jQuery));


//Search box expand
$(document).ready(function(){
  var submitIcon = $('.searchbox-icon');
  var inputBox = $('.searchbox-input');
  var searchBox = $('.searchbox');
  var isOpen = false;
  submitIcon.click(function(){
  if(isOpen == false){
    searchBox.addClass('searchbox-open');
    inputBox.focus();
    isOpen = true;
  } else {
    searchBox.removeClass('searchbox-open');
    inputBox.focusout();
    isOpen = false;
  }
  });  
  submitIcon.mouseup(function(){
  return false;
  });
  searchBox.mouseup(function(){
  return false;
  });
  $(document).mouseup(function(){
  if(isOpen == true){
    $('.searchbox-icon').css('display','block');
    submitIcon.click();
  }
  });
});
function buttonUp(){
  var inputVal = $('.searchbox-input').val();
  inputVal = $.trim(inputVal).length;
  if( inputVal !== 0){
  $('.searchbox-icon').css('display','block');
  } else {
    // $('.searchbox-input').val('');
    $('.searchbox-icon').css('display','block');
    }
  }


//Reference: 
// http://codepen.io/wallaceerick/pen/fEdrz
$(document).ready(function(){

  ;(function($) {

  // Browser supports HTML5 multiple file?
  var multipleSupport = typeof $('<input/>')[0].multiple !== 'undefined',
  isIE = /msie/i.test( navigator.userAgent );

  $.fn.customFile = function() {

    return this.each(function() {

    var $file = $(this).addClass('custom-file-upload-hidden'), // the original file input
    $wrap = $('<div class="file-upload-wrapper">'),
    $input = $('<input type="text" class="file-upload-input" />'),
      // Button that will be used in non-IE browsers
      $button = $('<button type="button" class="file-upload-button">Select Image</button>'),
      // Hack for IE
      $label = $('<label class="file-upload-button" for="'+ $file[0].id +'">Select Image</label>');

    // Hide by shifting to the left so we
    // can still trigger events
    $file.css({
      position: 'absolute',
      left: '-9999px'
    });

    $wrap.insertAfter( $file )
    .append( $file, $input, ( isIE ? $label : $button ) );

    // Prevent focus
    $file.attr('tabIndex', -1);
    $button.attr('tabIndex', -1);

    $button.click(function () {
      $file.focus().click(); // Open dialog
    });

    $file.change(function() {

      var files = [], fileArr, filename;

      // If multiple is supported then extract
      // all filenames from the file array
      if ( multipleSupport ) {
      fileArr = $file[0].files;
      for ( var i = 0, len = fileArr.length; i < len; i++ ) {
        files.push( fileArr[i].name );
      }
      filename = files.join(', ');

      // If not supported then just take the value
      // and remove the path to just show the filename
    } else {
      filename = $file.val().split('\\').pop();
    }

      $input.val( filename ) // Set the value
      .attr('title', filename) // Show filename in title tootlip
      .focus(); // Regain focus

      });

    $input.on({
      blur: function() { $file.trigger('blur'); },
      keydown: function( e ) {
      if ( e.which === 13 ) { // Enter
        if ( !isIE ) { $file.trigger('click'); }
      } else if ( e.which === 8 || e.which === 46 ) { // Backspace & Del
        // On some browsers the value is read-only
        // with this trick we remove the old input and add
        // a clean clone with all the original events attached
        $file.replaceWith( $file = $file.clone( true ) );
        $file.trigger('change');
        $input.val('');
      } else if ( e.which === 9 ){ // TAB
        return;
      } else { // All other keys
        return false;
      }
      }
    });

    });

};

  // Old browser fallback
  if ( !multipleSupport ) {
    $( document ).on('change', 'input.customfile', function() {

    var $this = $(this),
      // Create a unique ID so we
      // can attach the label to the input
      uniqId = 'customfile_'+ (new Date()).getTime(),
      $wrap = $this.parent(),

      // Filter empty input
      $inputs = $wrap.siblings().find('.file-upload-input')
      .filter(function(){ return !this.value }),

      $file = $('<input type="file" id="'+ uniqId +'" name="'+ $this.attr('name') +'"/>');

    // 1ms timeout so it runs after all other events
    // that modify the value have triggered
    setTimeout(function() {
      // Add a new input
      if ( $this.val() ) {
      // Check for empty fields to prevent
      // creating new inputs when changing files
      if ( !$inputs.length ) {
        $wrap.after( $file );
        $file.customFile();
      }
      // Remove and reorganize inputs
    } else {
      $inputs.parent().remove();
      // Move the input so it's always last on the list
      $wrap.appendTo( $wrap.parent() );
      $wrap.find('input').focus();
      }
    }, 1);

    });
}

}(jQuery));

$('input[type=file]').customFile();

});
