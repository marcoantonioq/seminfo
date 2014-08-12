administration = function() {
	
	$(".addpresence")
		.each(function(){
			$(this).click(function(event) {
				var span = $(this);
				var id = $(this).attr('value');
				$.get( 
					$(this)[0].href,
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
