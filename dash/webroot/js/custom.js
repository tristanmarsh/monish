/*
Name:   	custom.js
Author:   	Team Dash
Author URI: http://wiki.tristanmarsh.net/dash/
Purpose:  	All custom scripting for Monish Dashboard
Since:    	31/7/15
Note:       This file prepends multiple javascript libraries using Codekit!
Prepends:   Jquery, bootstrap, NProgress, wow
*/

// jQuery(document).ready(function($) {
// 	new WOW().init();
// });


// jQuery(window).load(function($) {
// 	NProgress.done();
// });

//This is supposed to apply and remove the style when the scrollbar is not at the top and back at the top, respectively
//Note to self. Remove all CDN stuff. fonts/etc/
// $(document).ready(function() {
// 	window.console.log('go');
// 	$('.header').css('box-shadow', '0 5px 10px 0px rgba(118, 170, 219, 0.8)');
// })(jQuery);


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
        $('.searchbox-icon').css('display','none');
    } else {
        $('.searchbox-input').val('');
        $('.searchbox-icon').css('display','block');
    }
}
