/*
Name:   	custom.js
Author:   	Team Dash
Author URI: http://wiki.tristanmarsh.net/dash/
Purpose:  	All custom scripting for Monish Dashboard
Since:    	31/7/15
*/

// jQuery(document).ready(function($) {
// 	new WOW().init();
// });


// jQuery(window).load(function($) {
// 	NProgress.done();
// });

//This is supposed to apply and remove the style when the scrollbar is not at the top and back at the top, respectively
//Note to self. Remove all CDN stuff. fonts/etc/
$(document).ready(function() {
	window.console.log('go');
	$('.header').css('box-shadow', '0 5px 10px 0px rgba(118, 170, 219, 0.8)');
})(jQuery);
