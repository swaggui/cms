<?php
declare(strict_types=1);

use Migrations\BaseMigration;

class CreateArticlesTags extends BaseMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/migrations/4/en/migrations.html#the-change-method
     * @return void
     */
    public function change(): void
    {
        $table = $this->table('articles_tags', ['id' => false, 'primary_key' => ['article_id', 'tag_id']]);

        $table->addColumn('article_id', 'integer', [
            'null' => false,
        ]);
        $table->addColumn('tag_id', 'integer', [
            'null' => false,
        ]);
        $table->addForeignKey('article_id', 'articles', 'id', [
            'delete' => 'CASCADE',
        ]);
        $table->addForeignKey('tag_id', 'tags', 'id', [
            'delete' => 'CASCADE',
        ]);

        $table->create();
    }
}
