<?php

use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\UserController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// GET - Request a Resource
// POST - Create a New Resource
// PUT - Update a Resource (Change all data inside)
// PATCH - Modify a Resource (Change some data only inside the row)
// DELETE - Delete Resource


Route::get('/', function () {
    return view('home', [
        "title" => "Home",
        'active' => 'home',
    ]);
});

Route::get('/about-us', function () {
    return view('about', [
        "title" => "About",
        "name" => "Dhany Martin Dharmawan",
        'active' => 'about',
        "email" => "dhanymartin@gmail.com",
        "image" => "dangerous.png"

    ]);
});

Route::get('/posts', [PostController::class, 'index']);
Route::get('posts/{post:slug}', [PostController::class, 'show']);

Route::get('/categories', function(){
    return view('categories', [
        'title' => "Post Categories",
        'active' => 'categories',
        'categories' => Category::all(),
    ]);
});

// not used anymore because handled in model already
// Route::get('/categories/{category:slug}', function(Category $category){
//     return view('posts', [
//         'title' => "Post by Category : $category->name",
//         'active' => 'categories',
//         'posts' => $category->posts->load('category', 'author'),
//     ]);
// });

// not used anymore because handled in model already
// Route::get('/authors/{author:username}', function(User $author) {
//     return view('posts', [
//         'title' => "Post By Author : $author->name",
//         'active' => 'posts',
//         'posts' => $author->posts->load('category', 'author'),
//     ]);
// });

Route::get('/login', [LoginController::class, 'index'])->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->name('login')->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/dashboard', function(){
    return view('dashboard.index');
})->middleware('auth');

// this checkSlug will connect into DashboardPostController
// Route::get('/dashboard/posts/{id}', [DashboardPostController::class, 'checkSlug'])->middleware('auth')->name('checkSlug');
// backup
// Route::get('/dashboard/posts/{id}', [DashboardPostController::class, 'edit'])->middleware('auth')->name('checkSlug');
// Route::get('/dashboard/posts/{slug}', [DashboardPostController::class, 'destroy'])->middleware('auth');
// Route::get('/dashboard/posts', [DashboardPostController::class, 'postView'])->name('post.postView');
Route::get('/dashboard/posts/checkSlug', [DashboardPostController::class, 'checkSlug'])->middleware('auth');
Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');

// Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');
// Route::get('users', [UserController::class, 'index'])->name('userss.index');

Route::resource('/dashboard/users', UserController::class);
Route::post('delete-user', [UserController::class, 'destroy']);