<?php
declare(strict_types=1);

use Migrations\BaseMigration;

class CreateArticles extends BaseMigration
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
        $table = $this->table('articles');
        $table->addColumn('user_id', 'integer', [
            'null' => false,
        ]);
        $table->addColumn('title', 'string', [
            'limit' => 255,
            'null' => false,
        ]);
        $table->addColumn('slug', 'string', [
            'limit' => 191,
            'null' => false,
        ]);
        $table->addColumn('body', 'text', [
            'null' => true,
        ]);
        $table->addColumn('published', 'boolean', [
            'default' => false,
        ]);
        $table->addColumn('created', 'datetime');
        $table->addColumn('modified', 'datetime');
        $table->addIndex(['slug'], ['unique' => true]);
        $table->addForeignKey('user_id', 'users', 'id', [
            'delete' => 'CASCADE',
            'update' => 'NO_ACTION',
        ]);

        $table->create();
    }
}
