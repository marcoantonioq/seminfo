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

	// filter
	$('#filter').hide();
	$('table th:first').click(function(){
		$('#filter').fadeToggle();
		$('#FilterId').focus();
		return false;
	});

	// menu
	$('#rowmenus').hide();
	$('#btnmenu').click(function(){
		$('#rowmenus').fadeToggle();
		return false;
	});

	/*
		Table.rwd-table
	*/


	// Delegação de tarefas

	// mostra coluna
	$("body").delegate('a.columnfilter', 'click', function(event) {
		$(this).each(function(index){
			column = $(this).attr('value');

			$("table.rwd-table thead th:eq('"+column+"')").show();
			$("table.rwd-table thead td:eq('"+column+"')").show();
			$("table.rwd-table tbody td:eq('"+column+"')").show();
			// $("table.rwd-table thead th:contains('"+column+"')").append('Some text');
			$(this).hide();
		})
		
	});

	// variavel tabela
	var table = $("table.rwd-table");
		table
		.find(" thead tr th")
			.each(function(index, el) {

				var th = $(this);

				$(this).find('a').prepend("<span class='icomoon-icon-checkbox'><span>");
				table.before('<a value="'+index+'" class="columnfilter label"> + '+$(this).text()+'</a> ');
				$('a.columnfilter').hide();

				$(this).find('span').click(function(event){
					$("a.columnfilter[value="+index+"]").show();
					th.hide();
					table.find('thead tr td:eq('+index+')').hide();
					table.find('tbody tr td:eq('+index+')').hide();

					return false;
					event.stopPropagation();
				});
			});



	$("table.rwd-table tbody tr")
		.click(function() {
		    var checkbox = $(this).find("input[id^=row]");
		    checkbox.trigger('click');
		})
		.dblclick(function(){
		    var view = $(this).find("td:last a[class=view]");
		    view[0].click();
		})
		.find("td").each(function(index, el) {
			var data = $(this).attr('data-th');
			$(this).attr('title', data);
		})
		.find("input[id^=row]").each(function(index, el) {				
			var input = $(this);
			var tr = input.parents('tr');
			ativar(tr, input[0].checked);
			$(this).click(function(e){
				ativar(tr, input[0].checked);
				e.stopPropagation();
			});
		});

	function ativar(elemento, check){
		if(check){
			elemento.addClass('active');
	    }
	    else{
	    	elemento.removeClass('active');
	    }
	}

	// função para manter fadetaglle antigos na view (codigo js em html)
	function display(alement){
		alert(element);
		// element.show();
		return false;
	}

	// Marcar todas celulas
	$("#allrow").click(function(event) {
		var check = this.checked;
		var rows = $(":input[id^=row]");
		rows.each(function(){
			this.checked = check;
		});
	});

}


plugins = function()
{
	// Gerando Barcode js
    $("#barcode").EAN13(
    	$('#barcode').attr('value')
    );
}

form = function()
{
	// Gerando Barcode js
    $("form:not(#FilterIndexForm) :input[id$=Cpf]").mask("999.999.999-99");
    $("form:not(#FilterIndexForm) :input[id$=Phone]").mask("(99) 9999-9999");
    $("form:not(#FilterIndexForm) :input[id$=Password]").val("");
}


$(document).ready(function(){
	navigation();
	plugins();
	form();
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