<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    public function index()
    {
        $title = '';
        if(request('category')){
            $category = Category::firstWhere('slug', request('category'));
            $title = ' in ' . $category->name;
        }

        if(request('author')){
            $author = User::firstWhere('username', request('author'));
            $title = '  by ' . $author->name;
        }
        // dd(requ est('search'));
        return view('posts', [
            "title" => "All Posts" . $title, //atur H1 Title pada view
            "active" => 'posts',
            "posts" => Post::latest()->filter(request(['search', 'category', 'author']))->paginate(6)->withQueryString(),
            // gett all post
            // "posts" => Post::latest()->filter(request(['search', 'category', 'author']))->get(),
            // "posts" => Post::with(['author', 'category'])->latest()->get(),
        ]);
    }

    public function show(Post $post){
        return view('post', [
            'title' => "Single Post",
            "active" => 'posts',
            'post' => $post,
        ]);
    }
}
