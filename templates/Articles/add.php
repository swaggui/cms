<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Article $article
 * @var \Cake\Collection\CollectionInterface|string[] $tags
 */
?>
<div class="page-container">
    <aside class="page-sidebar">
        <h4 class="heading"><?= __('Ações') ?></h4>
        <?= $this->Html->link(__('Listar Artigos'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
    </aside>

    <main class="page-content">
        <div class="articles form content">
            <?= $this->Form->create($article) ?>
            <fieldset>
                <legend><?= __('Adicionar Artigo') ?></legend>
                <?php
                echo $this->Form->control('title', ['label' => 'Título']);
                echo $this->Form->control('body', ['rows' => '5', 'label' => 'Conteúdo']);
                echo $this->Form->control('published', ['label' => 'Publicado']);
                ?>
                <div class="form-group" style="margin-top: 1.5rem;">
                    <label><?= __('Tags') ?></label>

                    <?= $this->Form->hidden('tags._ids', ['value' => '']); ?>

                    <div class="tag-checkbox-container">
                        <?php foreach ($tags as $tagId => $tagTitle): ?>
                            <div class="tag-checkbox-wrapper">
                                <?= $this->Form->checkbox('tags._ids[]', [
                                    'value' => $tagId,
                                    'id' => 'tag-' . $tagId,
                                    'hiddenField' => false,
                                ]); ?>
                                <label for="tag-<?= $tagId ?>"><?= h($tagTitle) ?></label>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </fieldset>
            <div class="form-buttons">
                <?= $this->Form->button(__('Salvar Artigo'), ['class' => 'action-button']) ?>
            </div>
            <?= $this->Form->end() ?>
        </div>
    </main>
</div>
