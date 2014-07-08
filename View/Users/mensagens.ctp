<?php $this->extend('/Common/Users/index'); ?>

<?php 
	$this->assign('title', 'Mensagens'); 
	$this->assign('subtitle', $this->Session->read('Auth.User.name')); 
?>

<!--
	Bloco
-->
<?php $this->start('contents'); ?>
	<script type="text/javascript">
		function view(id){
			if(document.getElementById('mensagem'+id).style.display == 'none'){
				document.getElementById('mensagem'+id).style.display = 'block';
			}else{
				document.getElementById('mensagem'+id).style.display = 'none'
			}
		}
	</script>
	<div class="users view">
	 	<h2>Ola! <?= $user['User']['name']; ?></h2>
	 	
	 	<?php if(empty($user['Message'])): ?>
	 		<h4>Não possui novas mensagens</h4>
		<?php endif; ?>
	 	<table>
	 		<tr>
				<th>Titulo</th>
				<th class="actions">Ações</th>
	 		</tr>
		 	<?php foreach ($user['Message'] as $key => $value): ?>
		 	<tr>
		 		<td onclick="view(<?= $value['id']?>)">
		 			<?php
		 				echo ($value['UsersMessage']['read']) ? $value['title']:'<b>'.$value['title'].'</b>';		 					
		 			?>
		 		</td>
		 		<td class='actions'>
		 			<a onclick="view(<?= $value['id']?>)" href="#">Detalhes</a>
		 			<?php //echo $this->Html->link(__('Visualizar'), array('#')); ?>
					<?php echo $this->Form->postLink(__('Deletar'), array('controller'=>'users_messages','action' => 'delete', $value['UsersMessage']['id']), null, __('Tem certeza de que deseja excluir # %s?', $value['title'])); ?>
		 		</td>
		 	</tr>
		 	<tr  onclick="view(<?= $value['id']?>)" >
		 		<td colspan="2" id="mensagem<?=$value['id']?>" style="display: none;">
		 			Data: <?= date('d/m/Y H:i', strtotime($value['updated'])); ?>
		 			<?= $value['body']?>
				</td>
		 	</tr>
		 	<?php endforeach; ?>
	 	</table>
	</div>

	<div class="actions">
		<h3><?php echo __('Ações'); ?></h3>
		<ul>
			<li><?php echo $this->Html->link('Voltar', array('action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('Editar cadastro'), array('action' => 'edit', $user['User']['id'])); ?> </li>
		</ul>
	</div>
<?php $this->end() ?>

<!--
	END Bloco
-->
