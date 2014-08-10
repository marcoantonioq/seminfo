/*
	by: Marco Antônio Queiroz
	IFGoiano
*/

var setings = {
	'url':'https://localhost/seminfo',
	'administration':'https://localhost/seminfo/administration/'
}

/**
 * Navigation
 *
 * @return void
 */

ajax = function(){
	$("#formcomplite").hide();


	
	$("#UserCpf")
		.keyup(function(e){

			var cpf = $(this);			
			var message = $(this).val().replace(/\./gi, '').replace(/\-/gi, '');
			var messageLength = message.length;
			
			if(messageLength == 11){
				$.get(
					setings.administration+'users/getseminfo2013/'+message,
					null,
					function(data) 
					{
						var user = JSON.parse(data);
						$("#UserName").val(user.name);
						var sexo = (user.sexo_id) ? "Masculino" : "Feminino";
						$("#UserSexo").val(sexo);
						$("#UserUsername").val(user.username);
						$("#UserPassword").val();
						$("#UserEmail").val(user.email);
						$("#UserPhone").val(user.telefone);
						$("#UserWebsite").val(user.website);
						$("#UserCoursesId").val(user.curso_id);
					}
				);
				cpf.attr('readonly', 'readonly');
				$("#send").hide();
				$("#formcomplite").show();

			} else {

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



/*

2014
'course_id' : ''
'matricula' : ''
'name' : ''
'sexo' : ''
'username' : ''
'password' : ''
'email' : ''
'cpf' : ''
'phone' : ''
'status' : ''
'website' : ''
'image' : ''
'image_dir' : ''
'holding_count' : ''
'updated' : ''
'created' : ''

2013
group_id
curso_id
matricula
name
sexo
username
password
email
cpf
telefone
status
website
image
image_dir
message_count
usersprograma_count
updated
created
*/