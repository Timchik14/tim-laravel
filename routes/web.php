<?php

use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\FeedbacksController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TagsController;
use App\Http\Controllers\MainPageController;
use App\Http\Controllers\AdminController;

Route::get('/articles/tags/{tag}', [TagsController::class, 'index'])->name('tags');
Route::get('/about', [ArticlesController::class, 'about'])->name('about');

Route::get('/', [MainPageController::class, 'index'])->name('main');

Route::resource('/articles', ArticlesController::class);

Route::get('/contacts', [FeedbacksController::class, 'create'])->name('contacts');
Route::post('/contacts', [FeedbacksController::class, 'store']);
Route::get('/admin/feedbacks', [FeedbacksController::class, 'show'])->name('admin.feedbacks')->middleware('admin');

Route::get('/admin', [AdminController::class, 'index'])->name('admin');
Route::get('/admin/articles', [AdminController::class, 'showArticles'])->name('admin.articles');
Route::get('/admin/articles/{article}/', [AdminController::class, 'show'])->name('admin.article');
Route::get('/admin/articles/{article}/edit', [AdminController::class, 'edit'])->name('admin.edit');

Auth::routes();
