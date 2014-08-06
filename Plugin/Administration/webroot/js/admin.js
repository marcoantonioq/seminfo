/*
	by: Marco Antônio Queiroz
	IFGoiano
*/


window.onload = function(){

	// eventos
	selectRow();

	// Filtros Controller/index
	var filtro = document.getElementById('filter');
	if(filtro){		
		display(filtro);
		var ths = document.getElementsByTagName('th');
		if( ths ){
			ths[0].onclick = function(){
				display(filtro);
				document.getElementById("FilterId").focus();
			}
		}
	}

	// Mensagens (fechar messagem)
	var message = document.getElementsByClassName('alert-message')[0];
	if (message) {
		var close = document.getElementsByClassName('close')[0];
		close.onclick = function(){
			display(message);
		}
	};
}

window.onkeydown = function (e) {

	// bloquear ctrl + j, para o leitor de codigo de bara
	if (e.ctrlKey && e.keyCode==74){    //Evita teclar ctrl + j  
	    return false;
	}

	// Decla ctrl + f: filtro avançado
	if (e.ctrlKey && e.keyCode == 70) {
		display(document.getElementById('filter'));
		document.getElementById("FilterId").focus();
		return false;
	};

}

// Mostrar ou ocultar campos
function display(element){
    if(element.style.display == "none"){  
        element.style.display = ''; // DOM HTML
        // element.setAttribute('style', ''); // DOM CORE
    }else{  
        element.style.display = 'none';  
    }
}


function selectRow() {
	if (document.getElementById("tableid1")) 
	{
	    var table = document.getElementById("tableid1");
	    var rows = table.rows;

	    for (var i = 0; i < rows.length; i++) 
	    {
	        rows[i].ondblclick = (function() 
	        {
	            return function() 
	            {
	            	var action = this.cells[this.cells.length-1];
	            	var view = action.getElementsByClassName('view').item(0);
	            	view.click();
	            }    
	        })(i);
	    }
		
	};
}