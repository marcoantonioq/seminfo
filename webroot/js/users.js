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
	// alert(url);
	var url = window.location.pathname;
	// alert(url);
	if(url == "/seminfo/") {
		$('#nav a[href="'+url+'"]').parents("li").addClass('current-menu-item');		
	} else {
		url = url.substring(0, 15);
		$('#nav a[href^="'+url+'"]').parents("li").addClass('current-menu-item');		
	}

});