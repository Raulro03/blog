<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $user = User::factory(5)->create();

        $comments = Comment::factory(5)->create();

        $categories = Category::factory(5)->create();

        // Paso 2: Crear 5 usuarios
       $user->each(function ($user) use ($categories) {
            // Para cada usuario, crear 2 posts
            Post::factory(2)->create([
                'user_id' => $user->id, // Asignar el post al usuario actual
                'category_id' => $categories->random()->id, // Asignar una categoría aleatoria al post
            ]);
        });

        //Category::factory(5)->create();

        //User::factory(5)->has(Post::factory()->count(10))->create();

        //Category::factory(5)->has(Post::factory()->count(2))->create();

        //Tambien se puede hacer con el each

        /*User::factory(5)->create()->each(function ($user) {
            Post::factory()->count(10)->create(['user_id' => $user->id]);
        });*/

        /*User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);*/
    }
}
