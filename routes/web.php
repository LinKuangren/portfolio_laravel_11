<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\CertificationsController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\ExperiencesController;
use App\Http\Controllers\ProductionsController;
use App\Http\Controllers\SkillsController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\RedirectLogin;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

Route::get('/', function () {
    return view('main.home');
})->name('home');
Route::get('/contact', [ContactController::class, 'contact'])->name('contact');

Route::prefix('categories')->name('categories.')->controller(CategoriesController::class)->group(function() {
    Route::get('/', 'index')->name('index')->middleware(RedirectLogin::class);

    Route::get('/{categorie}/detail', 'show')->name('show');

    Route::get('/{name}-{categorie}', 'show')->where([
        'categorie' => '[0-9]+',
        'name' => '[A-Za-z0-9\-\%]+',
    ])->name('show');

    Route::middleware([RedirectLogin::class])->group(function() {
        Route::get('/ajout', 'create')->name('add');
        Route::post('/ajout', 'store');

        Route::get('/{categorie}/modifier', 'edit')->name('edit');
        Route::post('/{categorie}/modifier', 'update');

        Route::delete('/{categorie}/supprimer', 'destroy')->name('delete');
    });
});

Route::prefix('certifications')->name('certifications.')->controller(CertificationsController::class)->group(function() {
    Route::get('/', 'index')->name('index');

    Route::middleware([RedirectLogin::class])->group(function() {
        Route::get('/ajout', 'create')->name('add');
        Route::post('/ajout', 'store');

        Route::get('/{certification}/modifier', 'edit')->name('edit');
        Route::post('/{certification}/modifier', 'update');

        Route::delete('/{certification}/supprimer', 'destroy')->name('delete');
    });
});

Route::prefix('skills')->name('skills.')->controller(SkillsController::class)->group(function() {
    Route::get('/', 'index')->name('index');

    Route::middleware([RedirectLogin::class])->group(function() {
        Route::get('/ajout', 'create')->name('add');
        Route::post('/ajout', 'store');

        Route::get('/{skill}/modifier', 'edit')->name('edit');
        Route::post('/{skill}/modifier', 'update');

        Route::delete('/{skill}/supprimer', 'destroy')->name('delete');
    });
});

Route::prefix('productions')->name('productions.')->controller(ProductionsController::class)->group(function() {
    Route::get('/', 'index')->name('index');

    Route::get('/{slug}-{production}', 'show')->where([
        'production' => '[0-9]+',
        'slug' => '[A-Za-z0-9\-\%]+',
    ])->name('show');

    Route::middleware([RedirectLogin::class])->group(function() {
        Route::get('/ajout', 'create')->name('add');
        Route::post('/ajout', 'store');

        Route::get('/{production}/modifier', 'edit')->name('edit');
        Route::post('/{production}/modifier', 'update');

        Route::delete('/{production}/supprimer', 'destroy')->name('delete');
    });
});

Route::prefix('experiences')->name('experiences.')->controller(ExperiencesController::class)->group(function() {
    Route::get('/', 'index')->name('index');

    Route::get('/{slug}-{experience}', 'show')->where([
        'experience' => '[0-9]+',
        'slug' => '[A-Za-z0-9\-\%]+',
    ])->name('show');

    Route::middleware([RedirectLogin::class])->group(function() {
        Route::get('/ajout', 'create')->name('add');
        Route::post('/ajout', 'store');
    
        Route::get('/{experience}/modifier', 'edit')->name('edit');
        Route::post('/{experience}/modifier', 'update');
    
        Route::delete('/{experience}/supprimer', 'destroy')->name('delete');
    });
});

Route::prefix('auth')->name('auth.')->controller(AuthController::class)->group(function() {
    Route::get('/connexion', 'login')->name('login');
    Route::post('connexion', 'loginPush');

    Route::get('/inscription', 'register')->name('register');
    Route::post('inscription', 'registerPush');

    Route::delete('/deconnexion', 'logout')->name('logout');
});

Route::middleware([RedirectLogin::class])->group(function() {
    Route::get('user', [UserController::class, 'profil'])->name('user.profil');
});

Route::get('/download_cv', [DownloadController::class, 'download'])->name('download_cv');