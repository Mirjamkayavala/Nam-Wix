<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NotificationController;

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

Route::get('/', function () {
    \App\Jobs\speed::dispatch()->delay(4);
    return view('welcome');
});

Route::get('/home', function () {
    $post=\App\Models\Post::all();
    // return $post;
    return view('home',compact( 'post'));
});

// Route::get('/notification', function () {
//     return view('notifications.index');
// });
Route::get('/messaging', function () {
    return view('messaging');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/posts.create', function(){
    return view('create');
});
// Route::get('/posts.show', function(){
//     return view('show');
// });

Route::resource('posts', PostController::class);
Route::get('/notifications', [NotificationController::class, 'showNotifications'])->name('notifications');
// Route::get('/home', [HomeController::class, 'index'])->name('home');

// Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
// Route::patch('/post/edit', [PostController::class, 'post'])->name('posts.edit');


Route::middleware(['web'])->group(function () {
    // routes/web.php
    Route::resource('posts', PostController::class)->middleware('auth');
    Route::resource('posts.comments', CommentController::class)->middleware('auth');
    Route::post('posts/{post}/comments', [CommentController::class, 'store'])->name('comments.store');
    // Route::get('/home', [HomeController::class, 'index'])->name('home');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    // Route::resource('posts', PostController::class);
    

});

require __DIR__.'/auth.php';
