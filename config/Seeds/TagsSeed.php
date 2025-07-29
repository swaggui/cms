<?php
declare(strict_types=1);

use Migrations\BaseSeed;

/**
 * Tags seed.
 */
class TagsSeed extends BaseSeed
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
        $data = [
            ['title' => 'Bom', 'created' => date('Y-m-d H:i:s'), 'updated' => date('Y-m-d H:i:s'),],
            ['title' => 'Ruim', 'created' => date('Y-m-d H:i:s'), 'updated' => date('Y-m-d H:i:s'),]
        ];

        $table = $this->table('tags');
        $table->insert($data)->save();
    }
}
