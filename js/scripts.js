// Page preload ------------------
$(window).load(function() {
    "use strict";
    $(".loader").fadeOut(500, function() {
        $("#main").animate({
            opacity: "1"
        }, 500);
    });
});
   
// Slider

		var ua = navigator.userAgent.toLowerCase();
		if (ua.indexOf("msie") != -1 || ua.indexOf("opera") != -1) {
			jQuery('body').css('overflow','hidden');
			jQuery('html').css('overflow','hidden');
		}	

		// ====================================================================   