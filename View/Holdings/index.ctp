<?php

$this->extend('/Common/Events/index'); ?>

<?php 
	$this->assign('title', $this->Session->read('Auth.User.name'));
 	$this->assign('subtitle', 'Participações em eventos');
 ?>

<!--
        Bloco
-->
<?php $this->start('contents'); ?>
<?php
 	echo $this->Html->css('timeline/timeline');
	echo $this -> fetch('css');
 ?>

<div>
     <?php if (empty($holdings)): ?>
    <h3>Não está á inscrito em nenhum programa</h3>
            <?php $this->Html->link(
                    'Veja os progrmas e inscreva-se em algums deles!',array(
                            'controller' => 'programs',
                            'action' => 'index'
            )); ?>
        <?php else: ?>

    <table cellpadding="0" cellspacing="0" >
        <tr>
        <h2><?php echo $this->Paginator->sort('program_id', 'Meu Programas'); ?></h2>
        </tr>
        <tr>
            <th>Horario</th>
            <th>Programa</th>
            <th>Duração</th>
            <th>Situação</th>
            <th>Local</th>
        </tr>


            <?php foreach ($holdings as $holding): ?>

        <tr>
            <th><?php
                
                    if(date('d', strtotime($holding['Program']['time_begin'])) == date('d', strtotime($holding['Program']['time_end']))):
                                                        echo '<strong> '.
                                                        date('d/m H:i', strtotime($holding['Program']['time_begin'])).'</strong>';
                                                else:
                                                        echo '<strong>'.
                                                                date('d/m ', strtotime($holding['Program']['date_begin'])).' á '.
                                                                date('d/m', strtotime($holding['Program']['date_begin'])).'<br> as '.
                                                                date('H:i ', strtotime($holding['Program']['time_end'])).'</strong>';
                                                endif;
       
                ?>
            </th>
            <th><?php echo $this->Html->link($holding['Program']['name'],
		    		array(
			    		'controller' => 'programs', 
			    		'action' => 'view', 
			    		$holding['Program']['id']
		    		)
	    		);
                ?>
            </th>
            <th> 
                <?php echo $holding['Program']['duration']; ?>
            </th>
            <th> 
                <?php if($holding['Holding']['certificado'] == true): ?>
                    <?= $this->Html->link(
                                ' <span>Certificado</span>', 
                                array('controller' => 'holdings', 'action' => 'certificados', $holding['Holding']['id']),
                                array('target' => '_blank', 'escape' => false)

                        );
                        ?>
                <?php endif; ?>
		<?php if(($holding['Program']['status'] == true) && ($holding['Holding']['certificado'] != true)): ?>			
                        <?php echo $this->Form->postLink(
                                ' Cancelar',
                                array(
                                        'action' => 'delete', 
                                        $holding['Holding']['id']), 
                                        null, 
                                        __('Tem certeza de que deseja sair do programa # %s?', $holding['Program']['name']
                                )
                        );
                        ?>
                <?php endif; ?>

            </th>
            <th><?php echo $holding['Program']['local']; ?></th>
        </tr>
        <?php endforeach; ?>

    </table>
<?php endif; ?>

</div>	


















</table>
</div>


<div class="actions">
    <h3><?php echo __('Mais'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('Perfil'), array('controller' => 'users','action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('Mensagens'), array('controller' => 'users', 'action' => 'mensagens')); ?> </li>
    </ul>
</div>
<div class='clearfix'></div>

	<?php echo $this->element('pagination'); ?>
<?php $this->end() ?>

<!--
        END Bloco
-->
