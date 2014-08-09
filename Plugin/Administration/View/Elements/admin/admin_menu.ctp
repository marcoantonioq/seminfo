<div id="menu">
	<ul>
		<li>
			<?php 
				echo $this->Html->link(
				'Conteúdo', 
				array(
					'plugin' => 'administration', 
					'controller' => 'contents',
					'action' => 'index'),
				 array('title' => 'Area de conteúdos, artigos...'));
				 ?>		
		</li>
		<li>
			<?php 
				echo $this->Html->link(
				'Mensagens', 
				array(
					'plugin' => 'administration', 
					'controller' => 'messages',
					'action' => 'index'),
				 array('title' => 'Mensagens de usuários, enviar e-mail, contato'));
				 ?>
		</li>
		<li>
			<?php 
				echo $this->Html->link(
				'Usuários', 
				array(
					'plugin' => 'administration', 
					'controller' => 'users',
					'action' => 'index'),
				 array('title' => 'Area de cadastro de usuários'));
				 ?>
		</li>
		<li>
			<?php 
				echo $this->Html->link(
				'Cursos', 
				array(
					'plugin' => 'administration', 
					'controller' => 'courses',
					'action' => 'index')
				)
			;?>
		</li>
		<li>
			<?php 
				echo $this->Html->link(
				'Eventos', 
				array(
				'plugin' => 'administration', 
				'controller' => 'events',
				'action' => 'index'),
			 array('title' => 'Organização de eventos')); ?>
		</li>
		<li>
			<?php 
				echo $this->Html->link(
					'Sobre', 
					array(
						'controller'=>'homes',
						'action'=>'sobre'
					)
				);
				 ?>
		</li>
	</ul>
</div>