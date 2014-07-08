<ul class="filter">
	<li>Saiba mais: </li>
	<li><?= $this->Html->link("Eventos", array('controller' => 'events', 'action' => 'index'), array('title' => 'Veja todos eventos'));  ?></li>
	<li><?= $this->Html->link("<span class='red'>Inscrição/Horários</span>", array('controller' => 'horarios', 'action' => 'index'), array('title' => 'Consulte horários ativos ou faça sua inscrição', 'escape'=>false));  ?></li>
	<li><?= $this->Html->link("Participações", array('controller' => 'usersprogramas', 'action' => 'index'), array('title' => 'Veja suas pariticipações'));  ?></li>	
	<li><?= $this->Html->link("Programas", array('controller' => 'programas', 'action' => 'index'), array('title' => 'Veja todos programas'));  ?></li>
	<li><?= $this->Html->link("Palestrantes", array('controller' => 'palestrantes', 'action' => 'index'), array('title' => 'Todos palestrantes em eventos no IFGoiano - Urutaí'));  ?></li>	
</ul>