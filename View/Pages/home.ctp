Bem vindo ao Nucleo
<?php if(AuthComponent::user()): ?>
     <p><?php echo __('Logado como:') . ' ' . $this->Session->read('Auth.User.username'); ?></p>
<?php else: ?>
    <p>Clique <?php echo $this->Html->link('aqui', '/users/login'); ?> para fazer login</p>
<?php endif; ?>