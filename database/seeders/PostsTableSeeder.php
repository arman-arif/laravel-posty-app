<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $post = new Post([
           'title' => 'Cupidatat quo suscip',
           'content' => 'Optio qui consequat Cupidatat quo suscip'
        ]);
        $post->save();

        $post = new Post([
            'title' => 'Quia debitis sed exe',
            'content' => 'Autem enim velit qui Quia debitis sed exe quo suscip'
        ]);
        $post->save();

        $post = new Post([
            'title' => 'Laborum labore eiusm',
            'content' => 'Velit nobis atque Na velit qui debitis sed exe quo suscip'
        ]);
        $post->save();
    }
}
