<?php
/**
 * @var \App\View\AppView $this
 */

$cakeDescription = 'CMS';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

    <?= $this->Html->css('custom.css') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
<nav class="top-nav">
    <div class="top-nav-title">
        <a href="<?= $this->Url->build('/') ?>"><span>CMS</span> Tutorial</a>
    </div>
    <div class="top-nav-links">
        <?php
        $identity = $this->request->getAttribute('identity');
        if ($identity) {
            echo $this->Html->link('Meu Perfil', ['controller' => 'Users', 'action' => 'profile']);
            echo '<span>' . h($identity->get('email')) . '</span>';
            echo $this->Html->link('Logout', ['controller' => 'Users', 'action' => 'logout']);
        } else {
            echo $this->Html->link('Login', ['controller' => 'Users', 'action' => 'login']);
        }
        ?>
    </div>
</nav>
<main class="main">
    <div class="container">
        <?= $this->Flash->render() ?>
        <?= $this->fetch('content') ?>
    </div>
</main>
<footer>
    <div class="container">
        <p>Nenhum direito reservado℗.</p>
    </div>
</footer>
</body>
</html>
