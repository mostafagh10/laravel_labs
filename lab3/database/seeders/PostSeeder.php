<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use app\Models\Post;
use App\Models\User;


class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $users = User::factory()->count(10)->create();
        //
        \App\Models\Post::factory(500)->create([
            'creator' => function () use ($users) {
                return $users->random()->id;
            },
        ]);

    }
}
