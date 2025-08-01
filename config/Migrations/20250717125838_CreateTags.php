<?php
declare(strict_types=1);

use Migrations\BaseMigration;

class CreateTags extends BaseMigration
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
        $table = $this->table('tags');
        $table->addColumn('title', 'string', [
            'null' => false,
        ]);
        $table->addTimestamps();
        $table->addIndex(['title'], ['unique' => true]);

        $table->create();
    }
}
