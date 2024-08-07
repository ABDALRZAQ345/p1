<?php

use App\Http\Controllers\PasswordController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\Searchcontroller;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');
///       Password
Route::middleware('guest')->name('password.')->controller(PasswordController::class)->group('/password', function () {
    Route::post('/store/{user}', ['store'])->name('store');
    Route::get('/update', ['update'])->name('update');
    Route::post('/check', ['check'])->name('check');
});
Route::get('/verify/{user}', [PasswordController::class, 'verify'])->name('password.verify')->middleware('guest');
///         search
Route::get('/search', [SearchController::class, 'index'])->name('search');
///         Posts
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::post('/posts', [PostController::class, 'store'])->name('posts.store')->middleware('auth');
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create')->middleware('auth');
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');
Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit')->middleware('auth')->can('edit', 'post');
Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update')->middleware('auth')->can('edit', 'post');
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy')->middleware(['auth', 'can:edit,post']);
Route::get('posts/search/{post}', [PostController::class, 'search'])->name('posts.search');
///         Register
Route::get('/register', [RegisteredUserController::class, 'create'])->name('auth.register')->middleware('guest');
Route::post('/register', [RegisteredUserController::class, 'store'])->name('auth.store')->middleware('guest');
///         Session
Route::get('/login', [SessionController::class, 'login'])->name('auth.login')->middleware('guest');
Route::post('/login', [SessionController::class, 'check'])->name('auth.check')->middleware('guest');
Route::post('/logout', [SessionController::class, 'logout'])->name('auth.logout')->middleware('auth');
//1- definea new route
//2 - define controller
//3- define view
//4- delete static html data from view

/*
another definition
Route::controller(PostController::class)->group(function (){
    Route::get('/posts', 'index' )->name('posts.index');
    Route::post('/posts','store')->name('posts.store');
    Route::get('/posts/creat','creat')->name('posts.creat');
    Route::get('/posts/{post}','show')->name('posts.show');
    Route::get('/posts/{post}/edit', 'edit')->name('posts.edit');
    Route::put('/posts/{post}','update')->name('posts.update');
    Route::delete('/posts/{post}','destroy')->name('posts.destroy');
    Route::get('posts/search/{post}','search')->name('posts.search');
});
*/
/*
Other definition

Route::resource('posts',PostController::class);


*/
