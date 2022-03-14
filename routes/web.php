<?php

use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\FeedbacksController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TagsController;
use App\Http\Controllers\MainPageController;

Route::get('/articles/tags/{tag}', [TagsController::class, 'index'])->name('tags');
Route::get('/about', [ArticlesController::class, 'about'])->name('about');

Route::get('/', [MainPageController::class, 'index'])->name('main');

Route::resource('/articles', ArticlesController::class);

Route::get('/contacts', [FeedbacksController::class, 'create'])->name('contacts');
Route::post('/contacts', [FeedbacksController::class, 'store']);

Route::get('/admin', [FeedbacksController::class, 'index'])->name('admin');
Route::get('/admin/articles', [FeedbacksController::class, 'adminShowArticles'])->name('admin.articles');
Route::get('/admin/feedbacks', [FeedbacksController::class, 'show'])->name('admin.feedbacks');

Auth::routes();
