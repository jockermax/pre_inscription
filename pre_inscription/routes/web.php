<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\DepartementController;
use App\Http\Controllers\Admin\FiliereController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\personnel\PersonnelController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\user\DemandeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes;,
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('accueil');

Route::middleware(['auth'])->group(function () {
    Route::get('/activerp/{id}', [ProfilController::class, 'activer'])->name('user.activer');
    Route::get('/desactivep/{id}', [ProfilController::class, 'desactiver'])->name('user.desactiver');
    Route::post('/updatePass/{id}', [ProfilController::class, 'updatePass'])->name('user.updatePass');
    Route::resource('profil', ProfilController::class);
});

Route::middleware(['auth', 'admin-access'])->group(function () {
    Route::resource('admin',AdminController::class)->except('edit','update','show','delete');
    Route::get('/liste', [adminController::class, 'liste'])->name('admin.liste');
    Route::resource('departement',DepartementController::class)->except('create','show');
    Route::resource('filiere',FiliereController::class)->except('create','show');
});

Route::middleware(['auth', 'personnel-access'])->group(function () {
    Route::resource('personnel',PersonnelController::class);
    Route::get('/download-dossier/{id}', [PersonnelController::class, 'downloadDossier'])->name('download_dossier');
});

Route::middleware(['auth', 'user-access'])->group(function () {
    Route::resource('demande',DemandeController::class);
    Route::get('/payement/{id}', [DemandeController::class, 'payement'])->name('demandes.payement');
    Route::get('/payer/{id}', [DemandeController::class, 'payer'])->name('demandes.payer');
});



