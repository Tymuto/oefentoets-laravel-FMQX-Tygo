<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $users = User::factory(5)->create();

        for ($i = 0; $i < 10; $i++) {
            $user = $users->random();
            $post = Post::factory()->create(['user_id' => $user]);

            Comment::factory(random_int(0, 5))->create(['user_id' => $users->random(), 'post_id' => $post]);
        }

        $this->command->info('Data seeded successfully');
    }
}
