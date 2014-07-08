
<ul class="menu">
	<li><?php echo $this->Html->link('Conteúdo', array('plugin' => null, 'controller' => 'contents', 'action' => 'index'), array('title' => 'Area de conteúdos, artigos...')); ?>
		<ul>
			<li><?php echo $this->Html->link('Categoria', array('plugin' => null, 'controller' => 'categorias', 'action' => 'index'), array('title' => 'Categoria de conteúdo')); ?></li>
			<li><?php echo $this->Html->link('Tipos', array('plugin' => null, 'controller' => 'types', 'action' => 'index'), array('title' => 'Tipo de conteúdo')); ?></li>
		</ul>
	</li>

	<li>
		<?php echo $this->Html->link('Menu', array('plugin' => null, 'controller' => 'menus', 'action' => 'index')); ?>
		<ul>
			<?php echo $this->Html->link('Links', array('plugin' => null, 'controller' => 'links', 'action' => 'index')); ?>
		</ul>
	</li>

	<li>
		<?php echo $this->Html->link('Mensagens', array('plugin' => null, 'controller' => 'messages', 'action' => 'index'), array('title' => 'Mensagens de usuários, enviar e-mail, contato')); ?>
		<ul>
			<li>
				<?php echo $this->Html->link('Contato', array('plugin' => null, 'controller' => 'contacts', 'action' => 'index'), array('title' => 'Contatos de usuários home page')); ?>
			</li>
		</ul>
	</li>

	<li>
		<?php echo $this->Html->link('Usuários', array('plugin' => null, 'controller' => 'users', 'action' => 'index'), array('title' => 'Area de cadastro de usuários')); ?>
		<ul>
			<li><?php echo $this->Html->link('Grupos', array('plugin' => null, 'controller' => 'groups', 'action' => 'add'), array('title' => 'Grupo de usuários')); ?></li>
			<li><?php echo $this->Html->link('Sexos', array('plugin' => null, 'controller' => 'sexos', 'action' => 'index'), array('title' => 'Cadastro de sexo de usuários')); ?></li>
		</ul>
	</li>

	<li><?php echo $this->Html->link('Cursos', array('plugin' => null, 'controller' => 'cursos', 'action' => 'index')); ?>
		<ul>
			<li><?php echo $this->Html->link('Documentos', array('plugin' => null, 'controller' => 'documents', 'action' => 'index')); ?></li>
		</ul>
	</li>

	<li>
		<?php echo $this->Html->link('Eventos', array('plugin' => null, 'controller' => 'events', 'action' => 'index'), array('title' => 'Organização de eventos')); ?>
		<ul>
			<li>
				<?php echo $this->Html->link('Participações', array('plugin' => null, 'controller' => 'usersprogramas', 'action' => 'index'), array('title' => 'Participação em programas')); ?></li>
				<!-- <ul>
					<li><?php echo $this->Html->link('Programa', array('plugin' => null, 'controller' => 'usersprogramas', 'action' => 'index'), array('title' => 'Participação em programas')); ?></li>
				</ul> -->
			</li>
			<li>
				<?php echo $this->Html->link('Programas', array('plugin' => null, 'controller' => 'programas', 'action' => 'index'), array('title' => 'Todos programas')); ?>
				<ul>
					<li><?php echo $this->Html->link('Tipo', array('plugin' => null, 'controller' => 'tipoprogramas', 'action' => 'index'), array('title' => 'Cadastro tipo de programas')); ?></li>
					<li><?php echo $this->Html->link('Palestrantes', array('plugin' => null, 'controller' => 'palestrantes', 'action' => 'index'), array('title' => 'Palestrantes em programas')); ?></li>
					<li><?php echo $this->Html->link('Horários', array('plugin' => null, 'controller' => 'horarios', 'action' => 'index'), array('title' => 'Horários programas')); ?></li>
				</ul>
			</li>
			<li>
				<?php echo $this->Html->link('Credenciar', array('plugin' => null, 'controller' => 'usersprogramas', 'action' => 'credenciamento'), array('title' => 'Credenciamento de alunos')); ?>
			</li>
			<li>
				<?php echo $this->Html->link('Presença', array('plugin' => null, 'controller' => 'usersprogramas', 'action' => 'presenca'), array('title' => 'Presença em programas')); ?>	
			</li>
		</ul>
	</li>
	
	<li><?php echo $this->Html->link('Home', array('plugin' => null, 'admin'=>false, 'controller' => 'homes', 'action' => 'index'), array('title' => 'Ir para home page')); ?></li>
	<!-- 
	<li><?php echo $this->Html->link('Configurações', '#'); ?></li>
	<li><?php echo $this->Html->link('Ajuda', '#'); ?></li>
	<li><?php echo $this->Html->link('Back-end', array('admin' => false, 'action' => 'index')); ?></li> 
	-->
	
</ul>

