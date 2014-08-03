<?php 
App::uses('AppHelper', 'View/Helper'); 
class FilterHelper extends AppHelper {
	public $helpers = array('Html', 'Form', 'Menu');

	public function conditions($name){
		echo "<td  data-th='".ucfirst(__($name))."'>";
		$this->Form->inputDefaults(array(
            'label'=>false,
            'div'=>false,
            'class'=>'span12',
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

		echo $this->Form->input("conditions.$name", array(
            'options' => $options,
        ));

        echo $this->Form->input("Filter.$name", array(
        	'type'=>'text',
			'autofocus' => true,
			'onkeydown'=>'bloquearCtrlJ();',
			'placeholder' => ucfirst(__($name)).'...',
		));
		echo "</td>";
	}

	public function row($name){
		echo $this->Form->checkbox("row.$name", array( 'class'=>'styled' ));
	}


	public function img(){
		echo "<a href='#'' onclick='show()'>";
			echo $this->Html->image(
				'/administration/img/template/icons/filters.png',
				array(
					'title'=>'Filter',
					'width'=>'20px',
					'height'=>'20px',
					'class'=>'left',
				)
			);
		echo "</a>";
	}


} 

?>

