<?php

namespace App\Models;

class Post
{
    private static $blog_posts = [
        [
            "title" => 'Post Pertama Lorem',
            "slug" => 'post-pertama-lorem',
            "author" => 'Martin',
            "body" => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. At quis, voluptates sunt ex, repellendus hic obcaecati voluptatum doloribus dolor est consequatur dolore, perferendis minus minima molestias sapiente nam ab nihil iure dignissimos vero eveniet facere a explicabo! Veritatis magnam ullam ratione dicta aspernatur dolorem iste nobis id beatae dolore sit ipsa, a odio ex qui? Impedit ratione animi maxime consequuntur molestias aliquid nemo, quasi at blanditiis cumque neque sequi debitis minus amet repellendus facilis illo error repudiandae voluptatibus totam beatae?',
        ],
        [
            "title" => 'Post Kedua Loremss',
            "slug" => 'post-kedua-lorem',
            "author" => 'Dh',
            "body" => 'ZZZ Lorem ipsum dolor sit amet consectetur adipisicing elit. At quis, voluptates sunt ex, repellendus hic obcaecati voluptatum doloribus dolor est consequatur dolore, perferendis minus minima molestias sapiente nam ab nihil iure dignissimos vero eveniet facere a explicabo! Veritatis magnam ullam ratione dicta aspernatur dolorem iste nobis id beatae dolore sit ipsa, a odio ex qui? Impedit ratione animi maxime consequuntur molestias aliquid nemo, quasi at blanditiis cumque neque sequi debitis minus amet repellendus facilis illo error repudiandae voluptatibus totam beatae?',
        ],
    ];

    public static function all()
    {
        return collect(self::$blog_posts);
    }

    public static function find($slug)
    {
        $posts = static::all();

        return $posts -> firstWhere('slug', $slug);
    }
}
