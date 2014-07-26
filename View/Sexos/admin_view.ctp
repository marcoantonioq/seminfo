<?php $this->extend('/Common/view') ?>
<?php $this->assign('title', 'Sexo'); ?>

<?php $this->start('contents'); ?>


<div class='tabbable'>
    <ul class='nav nav-tabs'>
        <li class='active'>
            <a href='#tabSexo' data-toggle='tab'><?php echo __('Sexo'); ?></a>
        </li>
    </ul>
    <div class='tab-content'>
    	<div class='tab-pane active' id='tabSexo'> 
			<dl>
				<dt><?php echo ucfirst(__('id')); ?></dt>
                <dd>
                    <?php echo h($sexo['Sexo']['id']); ?>
                    &nbsp;
                </dd>
				<dt><?php echo ucfirst(__('nome')); ?></dt>
                <dd>
                    <?php echo h($sexo['Sexo']['nome']); ?>
                    &nbsp;
                </dd>
				<dt><?php echo ucfirst(__('user_count')); ?></dt>
                <dd>
                    <?php echo h($sexo['Sexo']['user_count']); ?>
                    &nbsp;
                </dd>
			</dl>
		</div>
	</div>
</div>


<?php $this->start('box'); ?>

		<?php 
		echo $this->Link->icon(ucfirst(__('users')), 
			'bended_arrow_left',
			array('controller' => 'users', 'action' => 'index'),
			array('class'=> 'btn btn-block')
		);
		?>


<?php $this->end(); ?>


<?php $this->end(); ?>


<?php $this->start('related'); ?><div class="row-fluid">
	<div class="accordion" id="accordion1">
		
		<?php if (!empty($sexo['User'])): ?>
		<div class="accordion-group">
			<div class="accordion-heading">
				<a class="accordion-toggle" data-toggle="collapse" href="#coluna1">
				  <? echo ucfirst(__('Users'))
 ?>				  <span class="icon12 entypo-icon-minus-2 gray"></span>
				</a>
				</div>
				<div id="coluna1" class="accordion-body collapse" style="height: 0px; ">
				<div class="accordion-inner">
				  <?php 
			$displayFields = array(
						ucfirst(__('id')) => 'User.id',
						ucfirst(__('group_id')) => 'User.group_id',
						ucfirst(__('curso_id')) => 'User.curso_id',
						ucfirst(__('matricula')) => 'User.matricula',
						ucfirst(__('name')) => 'User.name',
						ucfirst(__('sexo_id')) => 'User.sexo_id',
						ucfirst(__('username')) => 'User.username',
						ucfirst(__('password')) => 'User.password',
						ucfirst(__('email')) => 'User.email',
						ucfirst(__('cpf')) => 'User.cpf',
						ucfirst(__('telefone')) => 'User.telefone',
						ucfirst(__('status')) => 'User.status',
						ucfirst(__('website')) => 'User.website',
						ucfirst(__('image')) => 'User.image',
						ucfirst(__('image_dir')) => 'User.image_dir',
						ucfirst(__('message_count')) => 'User.message_count',
						ucfirst(__('usersprograma_count')) => 'User.usersprograma_count',
						ucfirst(__('updated')) => 'User.updated',
						ucfirst(__('created')) => 'User.created',
			);
			echo $this->Table->createTable(
						'User',
						$sexo['User'],
						$displayFields,
						array('view'),
						'<h3>Atualmente você não tem propriedades enumeradas</h3>'
					);?>
				</div>
			</div>
		</div>
	   	<?php endif; ?>

		</div>
</div>
<?php $this->end(); ?>