administration = function() {

	$(".sendAjax").each(function(index, el) {
		$(this).click(function(event) {
			var box = $(this);
			var id = $(this).attr('value');
			$.get( 
				$(this)[0].href,
				null, 
				function(data) {
					box.html(data);
				}
			);
			return false;
		});
	});


	// para presence diferentes da data atual add class addpresence
	$(".presence").each(function(index, el) {
		var data = $(this).html();
		var date = new Date($(this).attr("date"));
		var currenteDate = new Date();
		var cd = currenteDate.getFullYear()+''+(currenteDate.getUTCMonth()+1)+''+currenteDate.getDate();
		var d = date.getFullYear()+''+(date.getUTCMonth()+1)+''+date.getDate();

		if (cd > d || data == "0") { 
			$(this).addClass('addpresence');
		};

		$(this).click(function(){
			$(this).removeClass('addpresence');
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
				  	      	icon.removeClass('icon-remove');
				        	icon.addClass('icon-ok');
				        } else {
				        	icon.removeClass('icon-ok');
				        	icon.removeClass('beforeAjax');
				        	icon.addClass('icon-remove');
				        }
				    },
				    beforeSend: function(){
				        icon.removeClass('icon-ok');
				        icon.addClass('beforeAjax');
				    },
				    error: function(data){
				    	alert("fail. :(");
				    }

				});
				return false;
			});
		})
}

$(document).ready(function() {	
	administration();
});
