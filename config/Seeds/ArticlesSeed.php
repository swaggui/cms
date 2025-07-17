<?php
declare(strict_types=1);

use Migrations\BaseSeed;

/**
 * Articles seed.
 */
class ArticlesSeed extends BaseSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * https://book.cakephp.org/migrations/4/en/seeding.html
     *
     * @return void
     */
    public function run(): void
    {
            $data[] = [
                'user_id'   => (1),
                'title'     => 'teste',
                'slug'      => 'apenas teste',
                'body'      => 'teste',
                'published' => (true),
                'created'   => date('Y-m-d H:i:s'),
                'modified'  => date('Y-m-d H:i:s'),
            ];


        $table = $this->table('articles');
        $table->insert($data)->save();
    }
}
