Bem vindo Administrador

<script class="javascipt">
$(document).ready(function() {	
	$("#click").click(function(){	
		$.get( "/urutai/seminfo/administration/homes/index", null, function(data) {	
			$("#msg").html(data); 
		} );	
	});	
});
</script>

<div>
	<a id="click">Click aqui</a>
</div>

<div id="msg"></div> 