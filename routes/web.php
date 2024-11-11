<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserPostController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Public Routes
Route::get('/', [HomeController::class, 'home'])->name("index");
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/posts_details/{post}', [PostController::class, 'details'])->name('posts_details');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/blog', [HomeController::class, 'blog'])->name('blog');

// Profile Routes (Protected by auth middleware)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/posts', [UserPostController::class, 'index'])->name('posts.index'); // View all posts
    Route::get('/posts/create', [UserPostController::class, 'create'])->name('posts.create'); // Show form to create a new post
    Route::post('/posts', [UserPostController::class, 'store'])->name('posts.store'); // Store a new post
    Route::get('/posts/{post}', [UserPostController::class, 'show'])->name('posts.show'); // View a single post
    Route::get('/posts/{post}/edit', [UserPostController::class, 'edit'])->name('posts.edit'); // Show form to edit post
    Route::put('/posts/{post}', [UserPostController::class, 'update'])->name('posts.update'); // Update a post
    Route::delete('/posts/{post}', [UserPostController::class, 'destroy'])->name('posts.destroy'); // Delete a post
});

// Admin routes
Route::middleware(['auth'])->group(function () {
    Route::get('/admin/posts', [PostController::class, 'index'])->name('admin.posts.index');
    Route::get('/admin/posts/create', [PostController::class, 'create'])->name('admin.posts.create');
    Route::post('/admin/posts', [PostController::class, 'store'])->name('admin.posts.store');
    Route::get('/admin/posts/{post}/edit', [PostController::class, 'edit'])->name('admin.posts.edit');
    Route::put('/admin/posts/{post}', [PostController::class, 'update'])->name('admin.posts.update');
    Route::delete('/admin/posts/{post}', [PostController::class, 'destroy'])->name('admin.posts.destroy');

    // Accept/Reject posts
    Route::post('/admin/posts/{post}/accept', [PostController::class, 'acceptPost'])->name('admin.posts.accept');
    Route::post('/admin/posts/{post}/reject', [PostController::class, 'rejectPost'])->name('admin.posts.reject');
});



// Include Auth Routes
require __DIR__.'/auth.php';


