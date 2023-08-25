<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Post;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        

        User::create([
            'name' => 'Martinus',
            'username' => 'martin',
            'email' => 'martin@gmail.com',
            'password' => bcrypt('password')
        ]);

        // User::create([
        //     'name' => 'Abdool',
        //     'email' => 'abszz@gmail.com',
        //     'password' => bcrypt('123456')
        // ]);

        User::factory(3)->create();


        Category::create([
            'name' => 'Web Programming',
            'slug' => 'web-progamming',
        ]);

        Category::create([
            'name' => 'Web design',
            'slug' => 'web-design',
        ]);

        Category::create([
            'name' => 'Personal',
            'slug' => 'personal',
        ]);

        Post::factory(20)->create();

        // Post::create ([
        //     'title' => 'Judul Pertama',
        //     'slug' => 'judul-pertama',
        //     'excerpt' => 'Loremw ipsum dolor sit amet consectetur adipisicing elit. Accusamus, atque?',
        //     'body' => 'Lorem ipsumw dolor sit amet, consectetur adipisicing elit. Iusto incidunt ipsum fuga optio nisi. Laborum perspiciatis sunt provident harum deserunt, nulla, laboriosam modi sed eaque quis, doloribus doloremque at quae?',
        //     'category_id' => 1,
        //     'user_id' => 1,
        // ]);

        // Post::create ([
        //     'title' => 'Judul kedua',
        //     'slug' => 'judul-kedua',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus, atque?',
        //     'body' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto incidunt ipsum fuga optio nisi. Laborum perspiciatis sunt provident harum deserunt, nulla, laboriosam modi sed eaque quis, doloribus doloremque at quae?',
        //     'category_id' => 1,
        //     'user_id' => 1,
        // ]);

        // Post::create ([
        //     'title' => 'Judul ketiga',
        //     'slug' => 'judul-ketiga',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus, atque?',
        //     'body' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto incidunt ipsum fuga optio nisi. Laborum perspiciatis sunt provident harum deserunt, nulla, laboriosam modi sed eaque quis, doloribus doloremque at quae?',
        //     'category_id' => 2,
        //     'user_id' => 2,
        // ]);
    }
}
