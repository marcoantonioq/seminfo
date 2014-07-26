<?php 
App::uses('AppHelper', 'View/Helper'); 
class LinkHelper extends AppHelper {
	public $helpers = array('Html', 'Form', 'Menu');

	public function dropdown($title, $icon = null, $params = array()) {
		$params += array(
			'escape'=>false,
			'class'=>'dropdown-toggle',
			'data-toggle'=>'dropdown',
		);
		$link = $this->Html->link(
			"<span class='{$icon}'></span>".__("{$title}").'<span class="caret"></span>',
			'#',
			$params
		); 
		return $link;
	}

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

	public function iconPost( $title, $icon = null, $url = '#', $params = array(), $message = 'Tem certeza?') {
		$params += array(
			'escape'=>false,
		);
		$link = $this->Form->postLink(
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

	public function atalho2($grupo, $image, $txt, $url = '#', $params = array(), $span = null, $message = null) 
	{
		$link = "";
		if($this->Menu->permission($grupo, $url))
		{			
			$params += array(
				'escape'=>false,
				'title'=>''
			);		
			$link = "<li>".$this->Html->link(
		        "<span class='icon'>".
		            $this->Html->image($image).
		        "</span>".
		        "<span class='txt'>".$txt."</span>".$span,
			    $url,
			    $params
			)."<li>";
		}
		return $link;
	}

	public function atalho($image, $txt, $url = '#', $params = array(), $span = null, $message = null) 
	{
		$link = "";
		$params += array(
			'escape'=>false,
			'title'=>''
		);		
		$link = $this->Html->link(
	        "<span class='icon'>".
	            $this->Html->image($image).
	        "</span>".
	        "<span class='txt'>".$txt."</span>".$span,
		    $url,
		    $params
		);
		return $link;
	}

} 

?>

