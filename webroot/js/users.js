/*
	by: Marco Antônio Queiroz
	IFGoiano
*/

/**
 * Navigation
 *
 * @return void
 */


$(document).ready(function(){

	$(window).bind('scroll', function() {
   		var navHeight = 114
		if ( $(window).scrollTop() > navHeight ) {
			$('#content').css("top", "80px");
			$('#menu').addClass('fixed');
		}
		else {
			$('#content').css("top", "0px");
			$('#menu').removeClass('fixed');

		}
	});

	// alert(url);
	var url = window.location.pathname;
	// alert(url);
	if(url == "/seminfo/") {
		$('#nav a[href="'+url+'"]').parents("li").addClass('current-menu-item');		
	} else {
		url = url.substring(0, 15);
		$('#nav a[href^="'+url+'"]').parents("li").addClass('current-menu-item');
	}


	if(url.indexOf("speakers") != -1 || url.indexOf("holdings") != -1 ) {
		alert("speakers");
		$('#nav a[href^="/seminfo/programs"').parents("li").addClass('current-menu-item');
	}

});