


		<?php 
                
                pr($sponsorships);
                exit();
                foreach ($sponsorships as $sponsorship): ?>
    <tr>

        <td data-th='Selecionar' >
			<?php echo $this->Form->checkbox('row.'.$sponsorship['Sponsorship']['id'], array( 'class'=>'rowfilter' ));?>
        </td>

        <td data-th="<?= ucfirst(__('id'));?>" >
			<?php echo h($sponsorship['Sponsorship']['id']); ?>
            &nbsp;
        </td>

        <td data-th="<?= ucfirst(__('name'));?>" >
			<?php echo h($sponsorship['Sponsorship']['name']); ?>
            &nbsp;
        </td>

        <td data-th="<?= ucfirst(__('website'));?>" >
			<?php echo h($sponsorship['Sponsorship']['website']); ?>
            &nbsp;
        </td>

        <td data-th="<?= ucfirst(__('description'));?>" >
			<?php echo h($sponsorship['Sponsorship']['description']); ?>
            &nbsp;
        </td>

        <td data-th="<?= ucfirst(__('file'));?>" >
			<?php echo h($sponsorship['Sponsorship']['file']); ?>
            &nbsp;
        </td>

        <td data-th="<?= ucfirst(__('file_dir'));?>" >
			<?php echo h($sponsorship['Sponsorship']['file_dir']); ?>
            &nbsp;
        </td>

        <td data-th="<?= ucfirst(__('created'));?>" >
			<?php echo h($sponsorship['Sponsorship']['created']); ?>
            &nbsp;
        </td>

        <td data-th="<?= ucfirst(__('updated'));?>" >
			<?php echo h($sponsorship['Sponsorship']['updated']); ?>
            &nbsp;
        </td>

        <td data-th='Ações' class="actions">

				<?php 
				echo $this->Html->link('<span class="icon12 brocco-icon-search"></span>', 
					array(
						'action' => 'view', 
						$sponsorship['Sponsorship']['id']
					),
					array(
						'escape'=>false,
						'title'=>'Visualizar',
						'class'=>'view',
					)
				); ?>				

				<?php 
				echo $this->Html->link('<span class="icon12 brocco-icon-pencil"></span>', 
					array(
						'action' => 'edit', 
						$sponsorship['Sponsorship']['id']
					),
					array(
						'escape'=>false,
						'class'=>'edit',
						'title'=>'Editar',
					)
				); ?>
        </td>


    </tr>

	<?php endforeach; ?>
</table>
</div>

	

	<?php echo $this->Form->end(); ?>
	<?php echo $this->element('layout/pagination'); ?>
</div>
</div>
