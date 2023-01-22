<?php

use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\DashboardPostController;
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

Route::get('/', function () {
    // dd($user);
    return view('home', [
        'title' => 'home',
        'active' => 'home',
        'users' => User::all(),
    ]);
});
Route::get('/about', function () {
    return view('about', [
        'title' => 'about',
        'active' => 'about',
    ]);
});

Route::get('/posts', [PostController::class, 'index']);
Route::get('/posts/{post:slug}', [PostController::class, 'show']);

Route::get('/categories', function () {
    return view('categories', [
        'title' => 'categories',
        'active' => 'categories',
        'categories' => Category::all(),
    ]);
});

Route::get('/categories/{category:slug}', function (Category $category) {
    return view('posts', [
        'title' => $category->slug,
        'posts' => $category->posts->load('category', 'user'),
        'active' => 'categories',
        'category' => $category->name,
    ]);
});
Route::get('/authors/{user}', function (User $user) {
    return view('posts', [
        'title' => 'User Posts',
        'active' => 'posts',
        'posts' => $user->posts->load('category', 'user'),
    ]);
});

Route::get('/login', [LoginController::class, 'index'])->middleware('guest')->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [LoginController::class, 'register'])->middleware('guest');
Route::post('/register', [LoginController::class, 'create']);


Route::get('/dashboard', function () {
    return view('dashboard/index');
})->middleware('auth');

Route::get('/dashboard/posts/checkSlug', [DashboardPostController::class, 'checkSlug'])->middleware('auth');
Route::get('/dashboard/categories/checkSlug', [AdminCategoryController::class, 'checkSlug'])->middleware('is_admin');

Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');
Route::resource('/dashboard/categories', AdminCategoryController::class)->except('show')->middleware('is_admin');
