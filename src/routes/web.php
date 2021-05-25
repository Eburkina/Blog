<?php

use Eburkina\Blog\Http\Controllers\ActualiteController;
use Eburkina\Blog\Http\Controllers\BlogController;
use Eburkina\Blog\Http\Controllers\CategorieController;
use Illuminate\Support\Facades\Route;

Route::get('actualites', [BlogController::class, 'index']);
Route::get('actualites/show/{uuid}', [BlogController::class, 'show'])->name('actualites-show');
Route::get('actualites/parcategorie/{uuid}', [BlogController::class, 'actualitebycategorie'])->name('acticlebycategorie');
Route::get('actualites/search', [BlogController::class, 'search'])->name('search');




Route::get('actualite/list', [ActualiteController::class, 'index'])->name('actualite-liste');
Route::get('actualite/add', [ActualiteController::class, 'create'])->name('actualite-add');
Route::post('actualite/store', [ActualiteController::class, 'store'])->name('actualite-store');
Route::get('actualite/edit/{uuid}', [ActualiteController::class, 'edit'])->name('actualite-edit');
Route::put('actualite/update/{uuid}', [ActualiteController::class, 'update'])->name('actualite-update');
Route::delete('actualite/delete/{uuid}', [ActualiteController::class, 'delete'])->name('actualite-delete');

Route::get('categorie/list', [CategorieController::class, 'index'])->name('categorie-list');
Route::get('categorie/add', [CategorieController::class, 'create'])->name('categorie-add');
Route::post('categorie/store', [CategorieController::class, 'store'])->name('categorie-store');
Route::get('categorie/edit/{uuid}', [CategorieController::class, 'edit'])->name('categorie-edit');
Route::put('categorie/update/{uuid}', [CategorieController::class, 'update'])->name('categorie-update');
Route::delete('categorie/delete/{uuid}', [CategorieController::class, 'delete'])->name('categorie-delete');