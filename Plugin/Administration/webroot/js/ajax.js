administration = function() {
	
	var setings = {
		'url':'https://localhost/seminfo/administration'
	}

	// $("#click").click(function(){	
	// 	$.get( "/projeto/controllers/ajaxMsg", null, function(data) {	
	// 		$("#msg").html(data); 
	// 	} );	
	// });	

	$(".addpresence")
		.each(function(){
			$(this).click(function(event) {
				var span = $(this);
				var id = $(this).attr('value');

				$.get( 
					setings.url+"/holdings/presence/"+id+"/sum",
					null, 
					function(data) {
						span.html(data);
						span.removeClass('addpresence');
					}
				);
				return false;
			});
		});
}

$(document).ready(function() {	
	administration();
});
