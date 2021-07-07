<?php

use Eburkina\Blog\Http\Controllers\ActualiteController;
use Eburkina\Blog\Http\Controllers\BlogController;
use Eburkina\Blog\Http\Controllers\CategorieController;
use Illuminate\Support\Facades\Route;

Route::get('actualites', [BlogController::class, 'index'])->name('actualites');
Route::get('actualites/show/{uuid}', [BlogController::class, 'show'])->name('actualites-show');
Route::get('actualites/parcategorie/{uuid}', [BlogController::class, 'actualitebycategorie'])->name('acticlebycategorie');
Route::get('actualites/partag/{tags}', [BlogController::class, 'actualitebytags'])->name('actubystags');
Route::get('actualites/search', [BlogController::class, 'search'])->name('search');




Route::group(['middleware' => ['web']], function () {

    Route::get('/dashboard/actualite/list', [ActualiteController::class, 'index'])->name('actualite-liste');
    Route::get('/dashboard/actualite/add', [ActualiteController::class, 'create'])->name('actualite-add');
    Route::post('dashboard/actualite/store', [ActualiteController::class, 'store'])->name('actualite-store');
    Route::get('dashboard/actualite/edit/{uuid}', [ActualiteController::class, 'edit'])->name('actualite-edit');
    Route::put('dashboard/actualite/update/{uuid}', [ActualiteController::class, 'update'])->name('actualite-update');
    Route::delete('dashboard/actualite/delete/{uuid}', [ActualiteController::class, 'delete'])->name('actualite-delete');
    Route::get('/actualite/publish/{uuid}', [ActualiteController::class, 'publish'])->name('publish');
    Route::get('/actualite/brouillon', [ActualiteController::class, 'brouillon'])->name('actualite.brouillon');


    Route::get('dashboard/categorie/list', [CategorieController::class, 'index'])->name('categorie-list');
    Route::get('dashboard/categorie/add', [CategorieController::class, 'create'])->name('categorie-add');
    Route::post('dashboard/categorie/store', [CategorieController::class, 'store'])->name('categorie-store');
    Route::get('dashboard/categorie/edit/{uuid}', [CategorieController::class, 'edit'])->name('categorie-edit');
    Route::put('dashboard/categorie/update/{uuid}', [CategorieController::class, 'update'])->name('categorie-update');
    Route::delete('dashboard/categorie/delete/{uuid}', [CategorieController::class, 'delete'])->name('categorie-delete');
    });
