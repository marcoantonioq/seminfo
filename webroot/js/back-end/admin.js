/*
by: Marco Antônio Queiroz
Evento do teclado :) 
	var asciiF2		= 113;
	var asciiF3		= 114;
	var asciiF4		= 115;
	var asciiF5		= 116;
	var asciiF6		= 117;
	var asciiF11		= 122;
	var asciiF12		= 123;
	var asciiF1		= 112;

*/
window.onkeydown = function (e) {

	// alert(e.keyCode);

	// Decla ctrl + f: filtro avançado
	if (e.ctrlKey && e.keyCode == 70) {
		show();
		e.keyCode=0;  
        e.returnValue=false;  
		document.getElementById("FilterId").focus();
	};

	// Desativar tecla F5	
	if (e.keyCode === 116) 
	{
		// var r = confirm("Confirmar reenvio do formulário???\nPode causar ERROR CAKE SECURITY\n\n A página que está atualizando usou as informação inseridas. Esta ação por padrão e bloqueada pelo cake security. Deseja continuar?");
		// if(r == false){
		// 	e.keyCode = 0;
		// 	e.returnValue = false;
		// 	return false;
		// }
		location.reload(true);
		return true;
	}
	
	
	if (e.keyCode === 115)
	{
		alert("Menu F4");
	}	 

}

function bloquearCtrlJ(){   // Verificação das Teclas  
    var tecla=window.event.keyCode;   //Para controle da tecla pressionada  
    var ctrl=window.event.ctrlKey;    //Para controle da Tecla CTRL  

    if (ctrl && tecla==74){    //Evita teclar ctrl + j  
        event.keyCode=0;  
        event.returnValue=false;  
    }  
}  

function show(){
    if(document.getElementById('filter').style.display == "none"){  
        document.getElementById('filter').style.display = '';
    }else{  
        document.getElementById('filter').style.display = 'none';  
    }  
}