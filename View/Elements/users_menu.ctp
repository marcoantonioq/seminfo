<div id="menu">
	<!-- ENDS menu-holder -->
	<div id="menu-holder">
		<!-- wrapper-menu -->
		<div class="wrapper">
			<!-- Navigation -->
			<ul id="nav" class="sf-menu sf-js-enabled sf-shadow">

				<li>
					<?php echo $this->Html->link(
						'Home <span class="subheader">Bem vindo</span>',
						array(
							'controller' => 'users',
							'action' => 'add'
						),
						array(
							'escape' => false, 
							'title' => 'Bem vindo'
						)
					); ?>
					
				</li>
				<li>
					<?php echo $this->Html->link(
						'Conteúdo <span class="subheader">Artigos, Notícias...</span>',
						array(
							'controller' => 'contents',
							'action' => 'index'
						),
						array('escape' => false)
					); ?>
					
				</li>
				
				<li>
					<?php echo $this->Html->link(
						'Cursos <span class="subheader">Nossos Cursos</span>',
						array(
							'controller' => 'courses',
							'action' => 'index'
						),
						array('escape' => false)
					); ?>
				</li>
				
				<li>
					<?php echo $this->Html->link(
						'Eventos <span class="subheader">IFGoiano - Urutaí</span>',
						array(
							'controller' => 'events',
							'action' => 'index'
						),
						array('escape' => false)
					); ?>
				</li>
              	<li>
					<?php echo $this->Html->link(
						'Programação <span class="subheader">A mais Diversa</span>',
						array(
							'controller' => 'programs',
							'action' => 'index'
						),
						array(
							'escape' => false, 
							'title' => 'Confira todos os enventos'
						)
					); ?>
					
				</li>
                                
                             
				<li>
					<?php echo $this->Html->link(
						'Contato <span class="subheader">Pagina de Contato</span>',
						array(
							'controller' => 'contacts',
							'action' => 'index'
						),
						array('escape' => false)
					); ?>
				</li>
				

				<!-- <li><a href="/">Exemplos<span class="subheader">Exemplo de menu</span></a>
					<ul style="display: none; visibility: hidden;">
						<li><a href="features-columns.html"><span> Item 1</span></a></li>
						<li><a href="features-accordion.html"><span> Item 2</span></a></li>
						<li><a href="features-toggle.html"><span> Item 3</span></a></li>
					</ul>
				</li> -->
			</ul>
			<!-- Navigation -->
		</div>
		<!-- wrapper-menu -->
	</div>
	<!-- ENDS menu-holder -->
</div>