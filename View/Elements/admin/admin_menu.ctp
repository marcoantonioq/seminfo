<div id="menu">
	<ul>
		<li>
			<?php echo $this->Html->link('Conteúdo', array('plugin' => null, 'controller' => 'contents', 'action' => 'index'), array('title' => 'Area de conteúdos, artigos...')); ?>		
		</li>
		<li>
			<?php echo $this->Html->link('Mensagens', array('plugin' => null, 'controller' => 'messages', 'action' => 'index'), array('title' => 'Mensagens de usuários, enviar e-mail, contato')); ?>
		</li>
		<li>
			<?php echo $this->Html->link('Usuários', array('plugin' => null, 'controller' => 'users', 'action' => 'index'), array('title' => 'Area de cadastro de usuários')); ?>
		</li>
		<li>
			<?php echo $this->Html->link('Cursos', array('plugin' => null, 'controller' => 'cursos', 'action' => 'index')); ?>
		</li>
		<li>
			<?php echo $this->Html->link('Eventos', array('plugin' => null, 'controller' => 'events', 'action' => 'index'), array('title' => 'Organização de eventos')); ?>
		</li>
		<li>
			<?php echo $this->Html->link('Configurações', '#'); ?>
		</li>
	</ul>
</div>


 <section class='top-nav'>
		<?php if( $this->Session->check('Auth.User.id') ): ?>
			<?php $user =  $this->Session->read('Auth.User'); ?>
			<?php 
				echo $this -> element('layout/alert-message', 
					array('user'=>$user), 
					array('cache' => array(
						'key' => 'alert-messages'.$user['id'], 
						'config' => 'brief'
					))
				); ?>
			<li>
				<?php echo $this->Html->link(
					'Sair',
					'/users/logout',
					array(
						'escape' => false
					)
				);?>
			</li>
		<?php else: ?>
			<li>
				<?php echo $this->Html->link(
					'Login', 
					'/users/login'
				);?>
			</li>
			<!-- <li><?php echo $this->Html->link('Cadastre-se', array('controller' => 'users', 'action' => 'add')); ?></li> -->
		<?php endif; ?>
</section>
<?php //$users = $this->requestAction('Users/mensagens'); ?>
<?php 
	/*pr($users);*/
?>

