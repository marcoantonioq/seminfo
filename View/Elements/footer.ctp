<body>
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id))
                return;
            js = d.createElement(s);
            js.id = id;
            js.src = "//connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v2.0";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>
</body>
<ul id="footer-cols">
    <li class="col">
        <h6>Pages</h6>
        <ul>
            <li class="page_item">
					<?php echo $this->Html->link(
						'Home',
						array(
							'controller' => 'users',
							'action' => 'add'
						),
						array('escape' => false)
					); ?>

            </li>
            <li class="page_item">
					<?php echo $this->Html->link(
						'Conteúdo',
						array(
							'controller' => 'contents',
							'action' => 'index'
						),
						array('escape' => false)
					); ?>

            </li>

            <li class="page_item">
					<?php echo $this->Html->link(
						'Cursos',
						array(
							'controller' => 'courses',
							'action' => 'index'
						),
						array('escape' => true)
					); ?>
            </li>

            <li class="page_item">
					<?php echo $this->Html->link(
						'Eventos',
						array(
							'controller' => 'events',
							'action' => 'index'
						),
						array('escape' => true)
					); ?>
            </li>

            <li class="page_item">
					<?php echo $this->Html->link(
						'Contato',
						array(
							'controller' => 'contacts',
							'action' => 'index'
						),
						array('escape' => false)
					); ?>
            </li>

        </ul>
    </li>

    <li class="col">
        <h6 >Organização</h6>
    <center> 
		<?php 
			$img = $this->Html->image("/files/home/ifg.png",array('height' =>'60px')).' ';
			echo $this->Html->link($img, 'http://www.ifgoiano.edu.br/', array( 'escape'=>false,'target'=>'_blank'));

			$img = $this->Html->image("/files/home/nucleo.png", array('height' =>'60px',)).' ';
			echo $this->Html->link($img, '/', array( 'escape'=>false,'target'=>'_blank'));
			
			$img = $this->Html->image("/files/home/tads.png", array('height' =>'60px')).' ';
			echo $this->Html->link($img,  array('controller'=>'courses', 'action'=>'view', 1), array( 'escape'=>false,'target'=>'_blank'));

			$img = $this->Html->image("/files/home/gti.png", array('height' =>'60px')).' ';
			echo $this->Html->link($img,  array('controller'=>'courses', 'action'=>'view', 2), array( 'escape'=>false,'target'=>'_blank'));
                        
                        $img = $this->Html->image("/files/home/selo61",array('height' =>'60px')).' ';
			echo $this->Html->link($img, 'http://www.ifgoiano.edu.br/', array( 'escape'=>false,'target'=>'_blank'));


//			$img = $this->Html->image("/files/home/ptv.png", array('height' =>'60px')).' ';
//			echo $this->Html->link($img, 'http://www.ptvnet.com.br/', array( 'escape'=>false,'target'=>'_blank'));
//
//			$img = $this->Html->image("/files/home/stefanini.png", array('height' =>'60px')).' ';
//			echo $this->Html->link($img, 'http://stefanini.com/br/', array( 'escape'=>false,'target'=>'_blank'));
                      ?>  

    </center>
</li>
<li class="col" >
    <h6>Facebook</h6>
    <ul>
        <div>
            <div class="fb-like-box" data-href="https://www.facebook.com/Seminfoifgoiano" data-width="280" 
                 data-height="400" data-colorscheme="light" data-show-faces="true" 
                 data-header="true" data-stream="false" data-show-border="false">
            </div>
        </div>
    </ul>
</li>
<!-- <li class="col">
        <h6>Nucleo de informática</h6>
        Esta pagina pertence ao Nucleo de Irmormática		
</li> -->

</ul>