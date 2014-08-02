 <section class='top-nav'>
		<?php if( $this->Session->check('Auth.User.id') ): ?>
			<?php $user =  $this->Session->read('Auth.User'); ?>
			<?php 
				echo $this -> element(
					'layout/alert-message', 
					array('user'=>$user), 
					array(
						'cache' => array(
							'key' => 'alert-messages'.$user['id'], 
							'config' => 'brief'
						)
					)
				); ?>
			<li>
				<?php echo $this->Html->link(
					'Sair',//$this->Html->image('template/buttons.png', array('alt' => 'Sair')), 
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


