/*
	by: Marco Antônio Queiroz
	IFGoiano
*/

/**
 * Navigation
 *
 * @return void
 */

ajax = function(){
	$("#formcomplite").hide();

	function validaCPF(cpf){

    	if( cpf.length == 11) {

	    	var digitoA = 0;
	    	var digitoB = 0;

	    	var i = 0;
	    	var x = 0;
	    	for (i=0, x=10;  i <= 8;  i++, x--) {
	    		digitoA += cpf[i] * x;
	    	};

	    	i = 0;
	    	x = 0;
	    	for (i=0, x=11;  i <= 9;  i++, x--) {
	    		digitoB += cpf[i] * x;
	    	};

	    	somaA = ( (digitoA % 11) < 2 ) ? 0 : 11-(digitoA % 11);
	    	somaB = ( (digitoB % 11) < 2 ) ? 0 : 11-(digitoB % 11);

	    	if(somaA != cpf[9] || somaB != cpf[10]){
	    		return false;
	    	}
	    	else{
	    		switch(cpf){
	    			case '00000000000':
	    			case '11111111111': 
	    			case '22222222222':
	    			case '33333333333':
	    			case '44444444444':
	    			case '55555555555':
	    			case '66666666666':
	    			case '77777777777':
	    			case '88888888888':
	    			case '99999999999':
	    				return false;
	    		}
	    		return true;
	    	}	    	
    	}
	    return false;
	}


	
	$("#UserCpf")
		.keyup(function(e){

			var cpf = $(this);			
			var getCpf = $(this).val().replace(/\./gi, '').replace(/\-/gi, '');
			var getCpfLength = getCpf.length;

			if(getCpfLength == 11){

				$(".cpfinvalido").hide();
				var v = cpf.parent();
				
				if( validaCPF(getCpf) )
				{
					v.removeClass('error');

					$.get(
						$("#sendgetseminfo2013")[0]+'/'+getCpf,
						null,
						function(data) 
						{
							var user = JSON.parse(data);
							$("#UserName").val(user.name);
							var sexo = (user.sexo_id) ? "Masculino" : "Feminino";
							$("#UserSexo").val(sexo);
							$("#UserUsername").val(user.username);
							$("#UserPassword").val("");
							$("#UserEmail").val(user.email);
							$("#UserPhone").val(user.telefone);
							$("#UserWebsite").val(user.website);
							$("#UserCoursesId").val(user.curso_id);
						}
					);
					cpf.attr('readonly', 'readonly');
					$("#sendgetseminfo2013").hide();
					$("#formcomplite").show();
				}
				else
				{
					v.addClass('error');
					v.append('<div class="cpfinvalido error-message">CPF inválido!!!</div>');
				}
			}

		})
		.focus();

	
}


plugins = function()
{
	// Mascara
    $("form:not(#FilterIndexForm) :input[id$=Cpf]").mask("999.999.999-99");
    $("form:not(#FilterIndexForm) :input[id$=Phone]").mask("(99) 9999-9999");
    $("form:not(#FilterIndexForm) :input[id$=Password]").val("");
}


$(document).ready(function(){
	plugins();
	ajax();
});