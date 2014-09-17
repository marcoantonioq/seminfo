<?php $this->extend('/Common/Users/index'); ?>

<?php 
	$this->assign('title', 'Perfil'); 
	$this->assign('subtitle', $this->Session->read('Auth.User.name')); 
?>

<!--
	Bloco
-->
<?php $this->start('contents'); ?>
	<div class="users view">
	<!-- <?php if(AuthComponent::user()): ?>
	     <p><?php echo __('Logado como:') . ' ' . $this->Session->read('Auth.User.name'); ?></p>
	<?php else: ?>
	    <p>Clique <?php echo $this->Html->link('aqui', '/users/login'); ?> para fazer login</p>
	<?php endif; ?>
	 -->
	 	<br></p>
		<dl>
			<dt><?php echo __('Grupo'); ?></dt>
			<dd>
				<?php 
					echo $this->Html->link($user['Group']['name'], array('controller' => 'groups', 'action' => 'view', $user['Group']['id'])); 
					if($user['Group']['id'] == 1)
					echo '<br />'.
					$this->Html->link('Painel administrador', array('plugin'=>'administration', 'controller'=>'homes'));
				?>
				&nbsp;
			</dd>
			<dt><?php echo __('Nome'); ?></dt>
			<dd>
				<?php echo h($user['User']['name']); ?>
				&nbsp;
			</dd>
			<?php if($user['Course']['name']): ?>
			<dt><?php echo __('Curso'); ?></dt>
			<dd>
				<?php echo $this->Html->link($user['Course']['name'], array('controller' => 'courses', 'action' => 'view', $user['Course']['id'])); ?>
				&nbsp;
			</dd>
			<?php endif; ?>
			<dt><?php echo __('Username'); ?></dt>
			<dd>
				<?php echo h($user['User']['username']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Email'); ?></dt>
			<dd>
				<?php echo h($user['User']['email']); ?>
				&nbsp;
			</dd>
			<?php if($user['User']['matricula']): ?>
			<dt><?php echo __('Matricula'); ?></dt>
			<dd>
				<?php echo h($user['User']['matricula']); ?>
				&nbsp;
			</dd>
			<?php endif; ?>
			<dt><?php echo __('Cpf'); ?></dt>
			<dd>
				<?php 
                                    $parte_um     = substr($user['User']['cpf'], 0, 3);
                                    $parte_dois   = substr($user['User']['cpf'], 3, 3);
                                    $parte_tres   = substr($user['User']['cpf'], 6, 3);
                                    $parte_quatro = substr($user['User']['cpf'], 9, 2);

                                    $user['User']['cpf'] = "$parte_um.$parte_dois.$parte_tres-$parte_quatro";

                                    echo h($user['User']['cpf']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Telefone'); ?></dt>
			<dd>
				<?php 
                      
                                $pattern = '/(\d{2})(\d{4})(\d*)/';
                                $user['User']['phone'] = preg_replace($pattern, '($1) $2-$3', $user['User']['phone']);
           
                                echo h($user['User']['phone']); 
                     
                                ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Status'); ?></dt>
			<dd>
				<?= ($user['User']['status']) ? 'Ativado' : 'Bloqueado'; ?>
				&nbsp;
			</dd>
		</dl>
	</div>
	<div class="actions">
		<h3><?php echo __('Ações'); ?></h3>
		<ul>
			<li><?php echo $this->Html->link(__('Editar cadastro'), array('action' => 'edit', $user['User']['id'])); ?> </li>
			<!-- <li><?php echo $this->Form->postLink(__('Apagar meu Cadastro'), array('action' => 'delete', $user['User']['id']), null, __('Tem certeza de que deseja excluir # %s?', $user['User']['name'])); ?> </li> -->
		</ul>
	</div>
<?php $this->end() ?>

<!--
	END Bloco
-->
