<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\PostController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\auth\RegisterController;
use App\Http\Controllers\user\CommentController;
use App\Http\Controllers\user\HomeController;
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

Route::get('/', [HomeController::class,'index'])->name('home');
Route::post('/login/store' , [LoginController :: class, 'store'])->name('login-store');
Route::post('/register/store', [RegisterController :: class, 'postRegister'])->name('register');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::middleware('is_Admin')->prefix('admin')->name('admin.')->group(function(){
    Route::get('/', [AdminController:: class, 'index'])->name('index');
    Route::prefix('user')->name('users.')->group(function(){
        Route::get('/', [UserController::class, 'index'])->name('index');
        Route::post('/add', [UserController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [UserController::class, 'edit'])->name('edit');
        Route::patch('/edit/{id}', [UserController::class, 'update'])->name('update');    
        Route::get('/show/{id}', [UserController::class, 'show'])->name('show');
        Route::get('delete/{id}', [UserController::class, 'destroy'])->name('delete');
    });
    Route::prefix('category')->name('categories.')->group(function(){
        Route::get('/', [CategoryController::class, 'index'])->name('index');
        Route::post('/add', [CategoryController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('edit');
        Route::patch('/{id}', [CategoryController::class, 'update'])->name('update');
        Route::get('/delete/{id}', [CategoryController::class, 'destroy'])->name('delete');
    });
    Route::prefix('post')->name('posts.')->group(function (){
        Route::get('/', [PostController::class, 'index'])->name('index');
        Route::get('/add', [PostController::class, 'create'])->name('add');
        Route::post('/store', [PostController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [PostController::class, 'edit'])->name('edit');
        Route::patch('{id}', [PostController::class, 'update'])->name('update');
        Route::get('/delete/{id}', [PostController::class, 'destroy'])->name('delete');

    });
});
Route::get('/category/{id}', [HomeController::class,'show'])->name('category');
Route::get('/search', [HomeController::class ,'search'])->name('search');
Route::get('/post/{id}', [HomeController::class,'detail'])->name('post_detail');
Route::post('/post/{id}', [CommentController::class, 'comment'])->name('post_comments');