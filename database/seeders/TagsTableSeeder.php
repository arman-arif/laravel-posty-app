<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tag = new Tag(['name' => 'Tutorial']);
        $tag->save();

        $tag = new  Tag(['name' => 'Electronics']);
        $tag->save();
    }
}
