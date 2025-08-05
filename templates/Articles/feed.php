<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Article> $articles
 */
?>
<div class="articles-feed" id="articles-container">
    <h1 class="feed-title">Artigos Recentes</h1>

    <?php if (!$articles->isEmpty()): ?>
        <?php foreach ($articles as $article): ?>
            <article class="feed-item">
                <h2 class="feed-item-title">
                    <?= $this->Html->link($article->title, ['action' => 'view', $article->slug]) ?>
                </h2>
                <div class="feed-item-meta">
                    <span>Por <?= h($article->user->email) ?></span>
                    <span>em <?= h($article->created->format('d/m/Y')) ?></span>
                </div>
                <div class="feed-item-body">
                    <?= $this->Text->truncate($article->body, 200, ['ellipsis' => '...', 'exact' => false]) ?>
                </div>
                <div class="feed-item-tags">
                    <?php if (!empty($article->tags)): ?>
                        <?php foreach ($article->tags as $tag): ?>
                            <?= $this->Html->link($tag->title, ['action' => 'tags', $tag->title], ['class' => 'tag-link']) ?>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </article>
        <?php endforeach; ?>
    <?php else: ?>
        <p>Nenhum artigo publicado ainda.</p>
    <?php endif; ?>
</div>

<div id="loading-indicator" style="display: none; text-align: center; padding: 2rem;">
    <p>Carregando mais artigos...</p>
</div>

<div class="paginator" style="display: none;">
    <ul class="pagination">
        <?= $this->Paginator->first('<< ' . __('primeira')) ?>
        <?= $this->Paginator->prev('< ' . __('anterior')) ?>
        <?= $this->Paginator->numbers() ?>
        <?= $this->Paginator->next(__('próxima') . ' >') ?>
        <?= $this->Paginator->last(__('última') . ' >>') ?>
    </ul>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const articlesContainer = document.getElementById('articles-container');
        const loadingIndicator = document.getElementById('loading-indicator');
        let nextPageUrl = document.querySelector('.paginator .pagination .next a')?.href;
        let isLoading = false;

        const loadMoreArticles = async () => {
            if (!nextPageUrl || isLoading) {
                return;
            }

            isLoading = true;
            loadingIndicator.style.display = 'block';

            try {
                const response = await fetch(nextPageUrl);
                const html = await response.text();
                const parser = new DOMParser();
                const doc = parser.parseFromString(html, 'text/html');
                const newArticles = doc.querySelectorAll('.feed-item');
                const newNextPageLink = doc.querySelector('.paginator .pagination .next a');

                newArticles.forEach(article => {
                    articlesContainer.appendChild(article);
                });

                nextPageUrl = newNextPageLink ? newNextPageLink.href : null;

            } catch (error) {
                console.error('Erro ao carregar mais artigos:', error);
            } finally {
                isLoading = false;
                loadingIndicator.style.display = 'none';
            }
        };

        window.addEventListener('scroll', () => {
            const { scrollTop, scrollHeight, clientHeight } = document.documentElement;
            if (scrollTop + clientHeight >= scrollHeight - 200) {
                loadMoreArticles();
            }
        });
    });
</script>
