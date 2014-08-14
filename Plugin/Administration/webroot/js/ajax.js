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

	$(".statusAjax")
		.each(function(){

			var icon = $(this);
			
			icon.click(function(event) {				
				$.ajax({
				type: "GET",
				    url: $(this)[0].href,
				    success: function(data) {
				        if(data == 1) {
				        	icon.removeAttr('class', 'icon-remove');
				        	icon.attr('class', 'icon-ok');
				        } else {
				        	icon.removeAttr('class', 'icon-ok');
				        	icon.attr('class', 'icon-remove');
				        }
				    },
				    error: function(data){
				    	alert("fail");
				    }

				});
				return false;
			});
		})
}

$(document).ready(function() {	
	administration();
});
