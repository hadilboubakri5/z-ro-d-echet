<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Controllers
|--------------------------------------------------------------------------
*/

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ScanController;

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\AdminProduitController;
use App\Http\Controllers\AdminDefiController;

/*
|--------------------------------------------------------------------------
| Web Routes - Zéro Déchet
|--------------------------------------------------------------------------
*/

/*
|--------------------------------------------------------------------------
| Pages publiques
|--------------------------------------------------------------------------
*/

Route::view('/', 'home')->name('home');

Route::view('/solutions', 'solutions')->name('solutions');

Route::view('/impact', 'impact')->name('impact');

Route::view('/blog', 'blog')->name('blog');

Route::view('/contact', 'contact')->name('contact');


/*
|--------------------------------------------------------------------------
| SCAN PRODUITS
|--------------------------------------------------------------------------
*/

Route::get('/scan', [ScanController::class, 'index'])
    ->name('scan');

Route::post('/scan/search', [ScanController::class, 'search'])
    ->name('scan.search');


/*
|--------------------------------------------------------------------------
| AUTHENTIFICATION CUSTOM
|--------------------------------------------------------------------------
*/

Route::middleware('guest')->group(function () {

    /*
    |--------------------------------------------------------------------------
    | Register
    |--------------------------------------------------------------------------
    */

    Route::get('/register', [AuthController::class, 'showRegister'])
        ->name('register');

    Route::post('/register', [AuthController::class, 'register'])
        ->name('register.store');

    /*
    |--------------------------------------------------------------------------
    | Login
    |--------------------------------------------------------------------------
    */

    Route::get('/login', [AuthController::class, 'showLogin'])
        ->name('login');

    Route::post('/login', [AuthController::class, 'login'])
        ->name('login.store');
});


/*
|--------------------------------------------------------------------------
| Logout
|--------------------------------------------------------------------------
*/

Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');


/*
|--------------------------------------------------------------------------
| DASHBOARD UTILISATEUR
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::view('/dashboard', 'dashboard')
        ->name('dashboard');
});


/*
|--------------------------------------------------------------------------
| ADMIN PANEL
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        /*
        |--------------------------------------------------------------------------
        | Dashboard Admin
        |--------------------------------------------------------------------------
        */

        Route::get('/dashboard', [AdminDashboardController::class, 'index'])
            ->name('dashboard');

        /*
        |--------------------------------------------------------------------------
        | CRUD UTILISATEURS
        |--------------------------------------------------------------------------
        */

        Route::resource('/users', AdminUserController::class);

        /*
        |--------------------------------------------------------------------------
        | CRUD PRODUITS
        |--------------------------------------------------------------------------
        */

        Route::resource('/produits', AdminProduitController::class);

        /*
        |--------------------------------------------------------------------------
        | CRUD DEFIS
        |--------------------------------------------------------------------------
        */

        Route::resource('/defis', AdminDefiController::class);
    });