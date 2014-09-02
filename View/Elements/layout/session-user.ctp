 <section class='top-nav'>
		<?php if( $this->Session->check('Auth.User.id') ): ?>
			<?php $user =  $this->Session->read('Auth.User'); ?>
			<li>
				<?php echo $this->Html->link($user['name'],array(
					'controller' => 'users', 
					'action' => 'index'
				),
				array(
					'escape' => false,
				));?>
			</li>

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
					array(
						// 'plugin'=>'administration',
						'controller'=>'users',
						'action'=>'login'
					)
				);?>
			</li>
			<!-- <li><?php echo $this->Html->link('Cadastre-se', array('controller' => 'users', 'action' => 'add')); ?></li> -->
		<?php endif; ?>
</section>


