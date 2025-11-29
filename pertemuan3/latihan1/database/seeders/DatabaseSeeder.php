<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void {
        // User::factory(10)->create();
        for ($i = 1; $i <= 10; $i++) {
            User::factory()->create([
                'name' => 'Test User',
                'username' => 'user' . $i,
                'email' => 'user' . $i . 'test@example.com',
                'password' => bcrypt('password'),
            ]);
        }

        // membuat 5 user secara otomatis
        User::factory(5)->create();

        // Mmebuat Catgory secara otomatis
        Category::factory(2)->create();


        Post::factory(5)->recycle(User::all())->recycle(Category::all())->create();
    }

}
