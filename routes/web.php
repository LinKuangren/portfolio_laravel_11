<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\CertificationsController;
use App\Http\Controllers\ExperiencesController;
use App\Http\Controllers\ProductionsController;
use App\Http\Controllers\SkillsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('main.home');
})->name('home');

Route::prefix('categories')->name('categories.')->controller(CategoriesController::class)->group(function() {
    Route::get('/', 'index')->name('index');

    Route::get('/ajout', 'create')->name('add');
    Route::post('/ajout', 'store');

    Route::get('/{categorie}/modifier', 'edit')->name('edit');
    Route::post('/{categorie}/modifier', 'update');

    Route::get('/{categorie}/detail', 'show')->name('show');

    Route::delete('/{categorie}/supprimer', 'destroy')->name('delete');
});

Route::prefix('certifications')->name('certifications.')->controller(CertificationsController::class)->group(function() {
    Route::get('/', 'index')->name('index');

    Route::get('/ajout', 'create')->name('add');
    Route::post('/ajout', 'store');

    Route::get('/{certification}/modifier', 'edit')->name('edit');
    Route::post('/{certification}/modifier', 'update');

    Route::delete('/{certification}/supprimer', 'destroy')->name('delete');
});

Route::prefix('skills')->name('skills.')->controller(SkillsController::class)->group(function() {
    Route::get('/', 'index')->name('index');

    Route::get('/ajout', 'create')->name('add');
    Route::post('/ajout', 'store');

    Route::get('/{skill}/modifier', 'edit')->name('edit');
    Route::post('/{skill}/modifier', 'update');

    Route::delete('/{skill}/supprimer', 'destroy')->name('delete');
});

Route::prefix('productions')->name('productions.')->controller(ProductionsController::class)->group(function() {
    Route::get('/', 'index')->name('index');

    Route::get('/ajout', 'create')->name('add');
    Route::post('/ajout', 'store');

    Route::get('/{production}/modifier', 'edit')->name('edit');
    Route::post('/{production}/modifier', 'update');

    Route::get('/{slug}-{production}', 'show')->where([
        'production' => '[0-9]+',
        'slug' => '[A-Za-z0-9\-\%]+',
    ])->name('show');

    Route::delete('/{production}/supprimer', 'destroy')->name('delete');
});

Route::prefix('experiences')->name('experiences.')->controller(ExperiencesController::class)->group(function() {
    Route::get('/', 'index')->name('index');

    Route::get('/ajout', 'create')->name('add');
    Route::post('/ajout', 'store');

    Route::get('/{experience}/modifier', 'edit')->name('edit');
    Route::post('/{experience}/modifier', 'update');

    Route::get('/{slug}-{experience}', 'show')->where([
        'experience' => '[0-9]+',
        'slug' => '[A-Za-z0-9\-\%]+',
    ])->name('show');

    Route::delete('/{experience}/supprimer', 'destroy')->name('delete');
});