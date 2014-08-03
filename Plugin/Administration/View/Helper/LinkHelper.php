<?php 
App::uses('AppHelper', 'View/Helper'); 
class LinkHelper extends AppHelper {
	public $helpers = array('Html', 'Form', 'Menu');

	
	public function icon($title, $icon = null, $url = '#', $params = array(), $message = null) {
		$params += array(
			'escape'=>false,
		);
		$link = $this->Html->link(
			"<span class='{$icon}'></span>".__("{$title}"),
			$url,
			$params,
			$message
		);
		return $link;
	}

	
	public function status($value, $url = array()) {
		$icon = ($value == 1) ? 'ok' : 'remove';
		$class = ($value == 1) ? 'green' : 'red';

		return $this->icon('', 'icon-' . $icon . ' ' . $class);		
	}

	public function filter($name){

		$this->Form->inputDefaults(array(
            'label'=>false,
            'div'=>false,
            'class'=>'span6',
            'autocomplete'=>'off',
            'onfocus'=>'this.select();',
        ));

		$options = array(
            '=' => 'igual',
            'LIKE' => 'contenha',
            'NOT LIKE' => 'não contenha',
            'LIKE BEGIN' => 'começando com',
            'LIKE END' => 'terminando com',
            '!=' => 'diferente',
            '>'  => 'maior do que',
            '>=' => 'maior ou igual a',
            '<'  => 'menor que',
            '<=' => 'menor ou igual a'
        );

		echo $conditions = $this->Form->input("conditions.$name", array(
            'options' => $options,
        ));

        echo $this->Form->input('id', array(
			'autofocus' => true,
			'onkeydown'=>'bloquearCtrlJ();',
			'placeholder' => ucfirst(__($name)).'...',
		));
	}


} 

?>

