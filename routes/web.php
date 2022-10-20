<?php

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CategoryController;
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

Route::get('/', [HomeController::class,'index']);

Route::get('/about', function () {
    return view('about',[
        "title" => "About",
        "active" => "Home",
        "name" => "Aidityas Adhakim",
        "email" => "aidityasadhakim250@gmail.com",
        "image" => "img1.jpg"
    ]);
});


Route::get('/blog', [PostController::class,'index']);

Route::get('/blog/{post:slug}', [PostController::class, 'show']);

Route::get('/categories/{category:slug}', [CategoryController::class,'categoryPost']);

Route::get('/categories',[CategoryController::class,'index']);

Route::get('/authors/{author:username}', function(User $author){
    return view('blog',[
        "title" => "Post by Author : $author->name",
        "post" => $author->post->load('category','author')
    ]);
});

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);

Route::post('/logout',[LoginController::class,'logout']);
Route::get('/dashboard',function(){
    return view('dashboard.index',[
        "title" => "Dashboard"
    ]);
})->middleware('auth');

Route::get('dashboard/posts/checkSlug',[DashboardPostController::class],'checkSlug');
Route::resource('/dashboard/posts',DashboardPostController::class);


Route::resource('/dashboard/categories', AdminCategoryController::class)->middleware('admin');