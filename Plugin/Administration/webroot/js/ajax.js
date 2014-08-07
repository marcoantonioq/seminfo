$(document).ready(function() {	
	$("#click").click(function(){	
		$.get( "/projeto/controllers/ajaxMsg", null, function(data) {	
			$("#msg").html(data); 
		} );	
	});	
});
