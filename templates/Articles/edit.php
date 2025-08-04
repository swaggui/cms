<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Article $article
 * @var string[]|\Cake\Collection\CollectionInterface $users
 * @var string[]|\Cake\Collection\CollectionInterface $tags
 */
?>
<div class="row">
    <div class="column column-80">
        <div class="articles form content">
            <?= $this->Form->create($article) ?>
            <fieldset>
                <legend><?= __('Edit Article') ?></legend>
                <?php
                    echo $this->Form->control('title');
                    echo $this->Form->control('slug');
                    echo $this->Form->control('body');
                    echo $this->Form->control('published');
                ?>
                <div class="form-group" style="margin-top: 1.5rem;">
                    <label><?= __('Tags') ?></label>

                    <?= $this->Form->hidden('tags._ids', ['value' => '']); ?>

                    <div class="tag-checkbox-container">
                        <?php if (!empty($tags)): ?>
                            <?php foreach ($tags as $tagId => $tagTitle): ?>
                                <div class="tag-checkbox-wrapper">
                                    <?= $this->Form->checkbox('tags._ids[]', [
                                        'value' => $tagId,
                                        'id' => 'tag-' . $tagId,
                                        // AQUI ESTÁ A CORREÇÃO: desativa o campo oculto automático
                                        'hiddenField' => false,
                                        'checked' => !empty($article->tags) && in_array($tagId, array_column($article->tags, 'id')),
                                    ]); ?>
                                    <label for="tag-<?= $tagId ?>"><?= h($tagTitle) ?></label>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <p>Nenhuma tag encontrada. Adicione tags primeiro.</p>
                        <?php endif; ?>
                    </div>
                </div>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
