<?php

use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\FeedbacksController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TagsController;
use App\Http\Controllers\MainPageController;
use App\Http\Controllers\AdminsArticlesController;
use App\Http\Controllers\TidingsController;
use App\Http\Controllers\AdminsTidingsController;
use App\Http\Controllers\StatisticsController;
use App\Http\Controllers\ReportsController;

Route::get('/articles/tags/{tag}', [TagsController::class, 'index'])->name('tags');
Route::get('/about', [ArticlesController::class, 'about'])->name('about');

Route::get('/', [MainPageController::class, 'index'])->name('main');

Route::resource('/articles', ArticlesController::class);
Route::resource('/tidings', TidingsController::class);

Route::get('/contacts', [FeedbacksController::class, 'create'])->name('contacts');
Route::post('/contacts', [FeedbacksController::class, 'store']);
Route::get('/admin/feedbacks', [FeedbacksController::class, 'show'])
    ->name('admin.feedbacks')
    ->middleware('admin');

Route::post('/comments/{article}/', [ArticlesController::class, 'comment'])->name('article.comments');
Route::post('/comments/{tiding}/', [TidingsController::class, 'comment'])->name('tiding.comments');

Route::get('/admin', [AdminsArticlesController::class, 'index'])->name('admin');

Route::get('/admin/articles', [AdminsArticlesController::class, 'showArticles'])->name('admin.articles');
Route::get('/admin/articles/{article}/', [AdminsArticlesController::class, 'show'])->name('admin.article');
Route::get('/admin/articles/{article}/edit', [AdminsArticlesController::class, 'edit'])->name('admin.edit');

Route::get('/admin/tidings', [AdminsTidingsController::class, 'showTidings'])->name('admin.tidings');
Route::get('/admin/tidings/{tiding}/', [AdminsTidingsController::class, 'show'])->name('admin.tiding');
Route::get('/admin/tidings/{tiding}/edit', [AdminsTidingsController::class, 'edit'])->name('admin.tiding.edit');

Route::get('/statistics', [StatisticsController::class, 'index'])->name('statistics');

Route::get('/reports', [ReportsController::class, 'index'])->name('reports');
Route::get('/reports/total', [ReportsController::class, 'total'])->name('reports.total');
Route::get('/reports/total/send', [ReportsController::class, 'create'])->name('reports.send');

Auth::routes();
