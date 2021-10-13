<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ArticleController;

Route::get('/', [PageController::class, 'index'])->name('index');
Route::get('about', [PageController::class, 'about'])->name('about');
Route::get('clients', [PageController::class, 'clients'])->name('clients');
Route::get('conditions', [PageController::class, 'conditions'])->name('conditions');
Route::get('finance', [PageController::class, 'finance'])->name('finance');
Route::get('contacts', [PageController::class, 'contacts'])->name('contacts');
Route::get('salons', [PageController::class, 'salons'])->name('salons');
Route::get('catalog', [PageController::class, 'catalog'])->name('catalog');
Route::get('products/{id}', [PageController::class, 'detailCar'])->name('detailCar');

Route::resource('article', ArticleController::class);


