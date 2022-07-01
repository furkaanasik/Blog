<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

// HOME PAGE OR SHOW ALL POSTS
Route::get("/", function (){
    return view('Component.posts', [
        'posts' => \App\Models\BlogPost::all(),
    ]);
})->name('get.all.post');

// Auth
Route::namespace('Auth')->group(function (){
    Route::get('/login', [AuthController::class, 'showLoginPage'])->name('login');
    Route::post('/post-login', [AuthController::class, 'loginUser'])->name('login.post');
    Route::get('/registration', [AuthController::class, 'showRegistrationPage'])->name('register');
    Route::post('/post-registration', [AuthController::class, 'registerUser'])->name('register.post');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});

// ADMIN CRUD PROCESS AND DASHBOARD
Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function (){
    // CRUD
    Route::get("/post/create", [AdminController::class, 'showCreateBlogPostPage'])->name('admin.show.create.page');
    Route::post('/post/create-post', [AdminController::class, 'createBlogPost'])->name('admin.create.post');
    Route::get('/post/{blog_post}/edit', [AdminController::class, 'showEditPostPage'])->name('admin.edit.post');
    Route::patch('/post/{post}/update', [AdminController::class, 'updateBlogPost'])->name('admin.update.post');
    Route::delete('/post/{post}/delete', [AdminController::class, 'deleteBlogPost'])->name('admin.delete.post');

    // DASHBOARD
    Route::get('/dashboard', function (){
        return view('Component.admins', [
            'admins' => \App\Models\User::all()->where('role_as', '1'),
        ]);
    })->name('admin.dashboard');

    // SHOW ALL POSTS
    Route::get('/posts', function (){
        // TODO add posts blade.
        return view('Admin.allPosts', [
            'posts' => \App\Models\BlogPost::all(),
        ]);
    })->name('admin.posts');

    // CREATE CATEGORY
    Route::get('/category/create', function (){
       return view('Component.createCategory');
    })->name('admin.show.create.category');
    Route::post('category/create-post', [AdminController::class, 'createCategory'])->name('admin.create.category');

    // USER SHOW ALL USERS, CHANGE ROLE AND DELETE
    Route::get('/users', function (){
        return view('Component.adminUsers', [
            'users' => \App\Models\User::all()->where('role_as', '0'),
        ]);
    })->name('admin.users');
    Route::patch('/change/{user}/role', [AdminController::class, 'changeUserRole'])->name('admin.change.user.role');
    Route::delete('/delete/{user}/', [AdminController::class, 'deleteUser'])->name('admin.delete.user');
});

// BLOG POST
Route::prefix('post')->group(function (){
    // SHOW SINGLE POST BY SLUG
    Route::get("/{blog_post:slug}", function (\App\Models\BlogPost $blogPost){
        return view('Component.post', [
            'post' => $blogPost,
            'comments' => $blogPost->comments,
            'categories' => $blogPost->category()->get(),
        ]);
    })->name('get.post');

    // CREATE POST COMMENT
    Route::post('/{blog_post:id}}/{slug}/post-comment', [
        UserController::class, 'createComment'
    ])->name('create.comment');
});

// CATEGORY
Route::prefix('category')->group(function (){
    // SHOW CATEGORY POSTS BY SLUG
    Route::get('/{category:slug}', function (\App\Models\Category $category){
        return view('Component.categoryBlogPost', [
            'categoryPosts' => $category->blog_posts()->get(),
        ]);
    })->name('get.categories.posts');
});







