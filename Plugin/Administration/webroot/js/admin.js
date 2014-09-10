
/*
	by: Marco Antônio Queiroz
	IFG - Campus Cidade de Goias
*/


/**
 * Navigation
 *
 * @return void
 */


navigation = function(){

	// alert(url);
	var url = window.location.pathname;
	if(url == "/seminfo/administration" || url == "/seminfo/administration/") {
		$('#menu a[href="'+url+'"]').addClass('current-menu-item');		
	} else {
		url = url.substring(0, 29);
		$('#menu a[href^="'+url+'"]').addClass('current-menu-item');
	}

	$('.close').click(function(){
		$('.alert-message').fadeToggle();
		return false;
	});

	// filter
	$('#filter').hide();
	$('#FilterId').focus();
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
		    $(this).find("input[id^=row]")
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
	var settings = {
      barWidth: 2,
      barHeight: 50
    };

    $(".barcode").each(function(index, el) {
    	var code = $(this).attr('value');
    	$(this).barcode(code, 'code128', settings);
    });
}

form = function()
{
	if ( $("form:not(#FilterIndexForm)") ) {
    	$("form:not(#FilterIndexForm) :input[id$=Cpf]").mask("999.999.999-99")
    	$("form:not(#FilterIndexForm) :input[id$=Phone]").mask("(99) 9999-9999")
    	$("form:not(#FilterIndexForm) :input[id$=Password]").val("")
    	$("form:not(#FilterIndexForm) textarea").attr('class', 'ckeditor')
    	$("form:not(#FilterIndexForm) :input[id$=Password]").val("")
    	// input file
    	$("form:not(#FilterIndexForm) :input[id$=Image]")
    	.attr('type', 'file')
    	$("form:not(#FilterIndexForm) :input[id$=File]")
    	.attr('type', 'file')
    	$("form:not(#FilterIndexForm) :input[type=file]")
    	.addClass('btn btn-file')
    	$("form:not(#FilterIndexForm) :input[id$=ImageDir]").parent().hide()
    	$("form:not(#FilterIndexForm) :input[id$=FileDir]").parent().hide()
    	// input count
    	$("form:not(#FilterIndexForm) :input[id$=Count]").parent().hide()

	};


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
	varkey();
	// Admin.extra();
});

var varkey = function(){

	$(window).keydown(function(e){
		// bloquear ctrl + j, 
		// para o leitor de codigo de barras

		// alert(e.ctrlKey);
		// alert(e.keyCode);

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

		if( (e.keyCode > 95 && e.keyCode < 106 ) || (e.keyCode > 47 && e.keyCode < 58 ) )
		{			
			if( ! $("#FilterId").is(":visible") )
			{
				$("#filter").show(1000);
				$("#FilterId").focus();
				$("#FilterUserId").focus();
			}

		}

		// F5: reload page
		if (e.keyCode == 116) 
		{
			location.reload(true);
			return false;
		}


		// alert(e.keyCode);
		if(e.keyCode == 13)
		{
			// return false;
			$("#FilterIndexForm").submit();
		}
		
	})
}