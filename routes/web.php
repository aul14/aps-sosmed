<?php

use App\Http\Controllers\Post\DeleteCommentController;
use App\Http\Controllers\Post\StoreCommentController;
use App\Http\Controllers\Post\StorePostController;
use App\Http\Controllers\ShowPostController;
use App\Http\Controllers\TimelineController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', TimelineController::class)->middleware(['auth'])->name('dashboard');

Route::post('post', StorePostController::class)->middleware(['auth'])->name('post.store');
Route::get('post/{post}', ShowPostController::class)->middleware(['auth'])->name('post.show');
Route::post('post/{post}/comment', StoreCommentController::class)->middleware(['auth'])->name('post.comment.store');
Route::delete('post/{post}/comment/{comment}', DeleteCommentController::class)->middleware(['auth'])->name('post.comment.destroy');

require __DIR__ . '/auth.php';
