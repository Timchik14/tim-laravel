<?php

use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\FeedbacksController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TagsController;

Route::get('/posts/tags/{tag}', [TagsController::class, 'index'])->name('tags');
Route::get('/about', [ArticlesController::class, 'about'])->name('about');

Route::view('/', 'index')->name('main');
Route::resource('/articles', ArticlesController::class);

Route::get('/contacts', [FeedbacksController::class, 'create'])->name('contacts');
Route::post('/contacts', [FeedbacksController::class, 'store']);
Route::get('/admin/feedbacks', [FeedbacksController::class, 'show'])->name('admin.feedbacks');

Auth::routes();
