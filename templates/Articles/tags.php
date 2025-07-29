<h1>
    Artigos com a(s) tag(s):
    <?= implode(', ', $tags) ?>
</h1>

<section>
    <table>
        <tr>
            <th>Título</th>
            <th>Data de Criação</th>
        </tr>
        <?php foreach ($articles as $article): ?>
            <tr>
                <td>
                    <?= $this->Html->link($article->title, ['action' => 'view', $article->slug]) ?>
                </td>
                <td>
                    <?= $article->created->format(DATE_RFC850) ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</section>
