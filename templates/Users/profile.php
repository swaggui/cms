<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="page-container">
    <aside class="page-sidebar">
        <h4 class="heading"><?= __('Ações do Perfil') ?></h4>
        <?= $this->Html->link(__('Editar Perfil'), ['action' => 'edit', $user->id], ['class' => 'side-nav-item']) ?>
    </aside>

    <main class="page-content">
        <div class="users profile content">
            <h3>Perfil de <?= h($user->email) ?></h3>

            <div class="profile-card">
                <div class="profile-photo">
                    <?php
                    $photo = $user->photo ? 'user_photos/' . $user->photo : 'placeholder.png';
                    echo $this->Html->image($photo, ['alt' => 'Foto do Perfil', 'class' => 'profile-img']);
                    ?>
                </div>
                <div class="profile-info">
                    <p><strong>Email:</strong> <?= h($user->email) ?></p>
                    <p><strong>Membro desde:</strong> <?= h($user->created->format('d/m/Y')) ?></p>
                </div>
            </div>

            <div class="profile-actions">
                <?= $this->Html->link(__('Escrever Novo Artigo'),
                    ['controller' => 'Articles', 'action' => 'add'],
                    ['class' => 'action-button'])
                ?>
            </div>

        </div>
    </main>
</div>
