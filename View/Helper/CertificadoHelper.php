<?php 
App::uses('AppHelper', 'View/Helper'); 
class CertificadoHelper extends AppHelper {
	public $helpers = array('Html');

	public function certificamos($participacao = array()){
		if(empty($participacao)) 
			return null;

		$replace = array(
			"[usuario]" => $participacao['User']['name'],
			"[cpf]" => $participacao['User']['cpf'],
			"[duracao]" => $participacao['Program']['duracao'],
			"[programa]" => $participacao['Program']['name']
		);
		
		$participacao['Program']['certify'] = str_replace(
			array_keys($replace),
			array_values($replace), 
			$participacao['Program']['certify']
		);

		return $participacao['Program']['certify'];
	}
	
} 

?>

