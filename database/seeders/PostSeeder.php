<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Post::create([
            'author' => '1',
            'title' => 'title1',
            'content' => 'content1',
        ]);
        Post::create([
            'author' => '1',
            'title' => 'title1',
            'content' => 'content1',
        ]);
        Post::create([
            'author' => '2',
            'title' => 'title1',
            'content' => 'content1',
        ]);
        Post::create([
            'author' => '1',
            'title' => 'title1',
            'content' => 'content1',
        ]);
        Post::create([
            'author' => '2',
            'title' => 'title1',
            'content' => 'content1',
        ]);
    }
}
