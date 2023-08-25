Post::create([
    'title' => 'Blog Item Keempat',
    'slug' => 'blog-item-Keempat',
    'category_id' => 3,
    'excerpt' => 'Lorem ipsum dolor sit.',
    'body' => '<p>Lorem ipsum dolor sit, amet consectetur adipisicing elit.</p><p>Lorem ipsum dolor sit, amet consectetur adipisicing elit.</p>'
])

Category::create([
    'name' => 'Personal',
    'slug' => 'personal',
])