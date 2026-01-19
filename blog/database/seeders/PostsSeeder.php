<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\User;

class PostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
 public function run(): void
    {
        $users = User::all();
        Post::factory()->count(10)->make()->each(function ($post) use ($users) {
            $post->usuario_id = $users->random()->id;
            $post->save();
        });
    }
}
