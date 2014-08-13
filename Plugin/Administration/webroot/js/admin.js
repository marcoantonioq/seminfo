
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
			$("table.rwd-table tr").find('td:eq('+column+'), th:eq('+column+')').show();
			$(this).hide();
		})		
	});

	// variavel tabela
	var table = $("table.rwd-table");

	table
	.find("tr th")
		.each(function(column, el) {
			// navegation table tr th:eq(x)
			var th = $(this);
			var tds = $("table.rwd-table tr").find('td:eq('+column+'), th:eq('+column+')');

			// add elements
			table.before('<a value="'+column+'" class="columnfilter label"> + '+$(this).text()+'</a> ');
			th.find('a').prepend("<span class='icomoon-icon-checkbox'><span>");

			// get elements
			var filter = $("a.columnfilter[value="+column+"]");

			// evento de click span link
			th.find('span').click(function(){			
				tds.hide();
				filter.show();
				return false;
			});

			// ocutar tr hide
			if(th.attr('class') == "hide")
			{
				tds.hide();
			} else {
				filter.hide();
			}
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
    $(".barcode").each(function(index, el) {
    	var code = $(this).attr('value');
    	$(this).EAN13(code);
    });
}

form = function()
{
	// Gerando Barcode js
    $("form:not(#FilterIndexForm) :input[id$=Cpf]").mask("999.999.999-99");
    $("form:not(#FilterIndexForm) :input[id$=Phone]").mask("(99) 9999-9999");
    $("form:not(#FilterIndexForm) :input[id$=Password]").val("");
    $("form:not(#FilterIndexForm) textarea").attr('class', 'ckeditor');;

    //  input int
    $("input[type=number]").bind('keydown', function(e){
    	// alert(keyCode);
    	var keyCode = e.which;
    	var isStandart = (keyCode > 47 && keyCode < 58);
    	var isOther = (",8,46,37,38,39,40,".indexOf(","+keyCode+",") > -1);
    	if (isStandart || isOther) {
    		return true;
    	};
    	return false;
    });
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