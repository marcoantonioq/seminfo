<?php 
App::uses('AppHelper', 'View/Helper'); 
class EventoHelper extends AppHelper {
	public $helpers = array('Html', 'Form');

	public function status($status) {
		switch ($status) {
			case '1': $return = "Vivo";
				break;
			case '2': $return = "Morto";
				break;
			case '2': $return = "Em andamento";
				break;			
			default:
				break;
		}
		return $return;
	}
} 

?>

