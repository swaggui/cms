<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Article> $articles
 */
?>
<div class="page-container">
    <aside class="page-sidebar">
        <?= $this->Html->link(__('New'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
    </aside>

    <main class="page-content">
        <div class="articles index content">
            <h3><?= __('Artigos') ?></h3>
            <div class="table-responsive">
                <table>
                    <thead>
                    <tr>
                        <th><?= $this->Paginator->sort('title', 'Título') ?></th>
                        <th><?= $this->Paginator->sort('published', 'Publicado') ?></th>
                        <th><?= $this->Paginator->sort('created', 'Criado em') ?></th>
                        <th class="actions"><?= __('Ações') ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($articles as $article): ?>
                        <tr>
                            <td data-label="Título"><?= h($article->title) ?></td>
                            <td data-label="Publicado"><?= $article->published ? 'Sim' : 'Não' ?></td>
                            <td data-label="Criado em"><?= h($article->created->format('d/m/Y')) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('Ver'), ['action' => 'view', $article->slug]) ?>
                                <?= $this->Html->link(__('Editar'), ['action' => 'edit', $article->slug]) ?>
                                <?= $this->Form->postLink(__('Apagar'), ['action' => 'delete', $article->slug], ['confirm' => __('Você tem certeza que quer apagar: {0}?', $article->title)]) ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="paginator">
                <ul class="pagination">
                    <?= $this->Paginator->first('<< ' . __('primeira')) ?>
                    <?= $this->Paginator->prev('< ' . __('anterior'), ['class' => 'button-pagination']) ?>
                    <?= $this->Paginator->numbers() ?>
                    <?= $this->Paginator->next(__('próxima') . ' >', ['class' => 'button-pagination']) ?>
                    <?= $this->Paginator->last(__('última') . ' >>') ?>
                </ul>
            </div>
        </div>
    </main>
</div>
