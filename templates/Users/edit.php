<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="page-container">
    <aside class="page-sidebar">
        <h4 class="heading"><?= __('Ações') ?></h4>
        <?= $this->Form->postLink(
            __('Apagar Utilizador'),
            ['action' => 'delete', $user->id],
            ['confirm' => __('Tem a certeza que quer apagar # {0}?', $user->id), 'class' => 'side-nav-item']
        ) ?>
        <?= $this->Html->link(__('Listar Utilizadores'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
    </aside>

    <main class="page-content">
        <div class="users form content">
            <?= $this->Form->create($user, ['type' => 'file']) ?>
            <fieldset>
                <legend><?= __('Editar Utilizador') ?></legend>
                <?php
                echo $this->Form->control('email');
                echo $this->Form->control('password', ['label' => 'Nova Senha (deixe em branco para não alterar)', 'value' => '']);
                echo $this->Form->control('photo_file', ['type' => 'file', 'label' => 'Foto de Perfil (Opcional)']);
                ?>
            </fieldset>
            <div class="form-buttons">
                <?= $this->Form->button(__('Salvar Alterações'), ['class' => 'action-button']) ?>
            </div>
            <?= $this->Form->end() ?>
        </div>
    </main>
</div>
