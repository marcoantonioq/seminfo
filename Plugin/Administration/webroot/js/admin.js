/*
	by: Marco Antônio Queiroz
	IFGoiano
*/


/**
 * Navigation
 *
 * @return void
 */


navigation = function(){
	$('.close').click(function(){
		$('.alert-message').fadeToggle();
		return false;
	});

	// tables
	$('#filter').hide();
	$('table th:first').click(function(){
		$('#filter').fadeToggle();
		$('#FilterId').focus();
		return false;
	});

	$('#rowmenus').hide();
	$('#btnmenu').click(function(){
		$('#rowmenus').fadeToggle();
		return false;
	});


	function filterTable(){
		return true;
	}

	$("table.rwd-table tbody tr")
		// row checked
		.each(ativaRow)
		.click(function() {
		    var checkbox = $(this).find("input[id^=row]");
		    checkbox.trigger('click');
		    if(checkbox[1].checked){
				$(this).addClass('active');
		    }
		    else{
		    	$(this).removeClass('active');
		    }
		})
		.dblclick(function(){
		    var view = $(this).find("td:last a[class=view]");
		    view[0].click();
		})
		.find("input[id^=row]")
			.click(function(e){
				e.stopPropagation();
			});


	function ativaRow( ){
		var checkbox = $(this).find("input[id^=row]");
		if(checkbox[1].checked){
			$(this).addClass('active');
	    }
	    else{
	    	$(this).removeClass('active');
	    }
	}

	/*$("input[type=checkbox][checked]").each(function(index, element){
			var id = $(this).attr('id');
			var row = $("table.rwd-table tbody tr")
				.find("input[id="+id+"]");
	}).this.append("<h1 class='red'>Marco</h1>");*/
}


plugins = function()
{
	// Gerando Barcode js
    $("#barcode").EAN13(
    	$('#barcode').attr('value')
    );
}

$(document).ready(function(){
	navigation();
	plugins();
	// Admin.form();
	// Admin.extra();	
});


$(window).keydown(function(e){
	// bloquear ctrl + j, 
	// para o leitor de codigo de barras
	if (e.ctrlKey && e.keyCode==74){
	    return false;
	}

	// Decla ctrl + f: filtro avançado
	if (e.ctrlKey && e.keyCode == 70) 
	{
		$("#filter").show(1000);
		$("#FilterId").focus();
		return false;
	};

	// F5: reload page
	if (e.keyCode == 116) 
	{
		location.reload(true);
		return false;
	}
	
})