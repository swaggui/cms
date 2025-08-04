<?php
/**
 * @var \App\View\AppView $this
 */

$identity = $this->request->getAttribute('identity');

$this->assign('title', 'Bem-vindo');
?>

<div class="welcome-hero">
    <h1>Bem-vindo ao seu CMS</h1>
    <p>Um sistema simples construído com CakePHP para gerenciar seus artigos.</p>
</div>

<div class="action-links">
    <h3>O que você gostaria de fazer?</h3>
    <div class="links-container">

        <?= $this->Html->link(
            'Ver Artigos',
            ['controller' => 'Articles', 'action' => 'index'],
            ['class' => 'action-button']
        ) ?>

        <?php if ($identity):?>

            <?= $this->Html->link(
                'Escrever Novo Artigo',
                ['controller' => 'Articles', 'action' => 'add'],
                ['class' => 'action-button']
            ) ?>

        <?php else:?>

            <?= $this->Html->link(
                'Login',
                ['controller' => 'Users', 'action' => 'login'],
                ['class' => 'action-button']
            ) ?>

            <?= $this->Html->link(
                'Registrar',
                ['controller' => 'Users', 'action' => 'add'],
                ['class' => 'action-button']
            ) ?>

        <?php endif; ?>

    </div>
</div>
