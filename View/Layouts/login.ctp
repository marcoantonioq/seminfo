<?php

$cakeDescription = 'NUCLEO'; ?>

<!DOCTYPE html>
<html>
    <head>
    <?php echo $this -> Html -> charset('UTF-8'); ?>
        <title><?php echo $cakeDescription ?>:
      <?php echo $title_for_layout; ?></title>
    <?php echo $this -> Html -> meta('icon');

    echo $this -> Html -> css('login');
    
    echo $this -> fetch('meta');
    echo $this -> fetch('css');
    echo $this -> fetch('script');
    echo $this -> fetch('script');
  ?>
    </head>
    <body>
        <div id="container">
            <div id="header">
                <div class="wrapper">
          <?php echo $this -> element('layout/logo', array('cache' => '+1 day')); ?>
                </div>
            </div>

            <div class='clearfix'></div>

            <div id="content">
          <?php // echo $this->Html->nestedList($menu); ?>
          <?php echo $this -> Session -> flash(); ?>
          <?php echo $this -> Session -> flash('auth'); ?>
          <?php echo $this -> fetch('content'); ?>
            </div>
        </div>
    </body>
</html>
